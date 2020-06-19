<?php
declare(strict_types=1);

namespace CryptoCurrencyChart\API;


use CryptoCurrencyChart\API\Exception\InvalidParameterException;
use CryptoCurrencyChart\API\Exception\InvalidResponseException;
use CryptoCurrencyChart\API\Exception\RateLimitExceededException;
use CryptoCurrencyChart\API\Exception\RequestMethodNotAllowedException;
use CryptoCurrencyChart\API\Exception\ServerException;
use CryptoCurrencyChart\API\Exception\UnauthorizedRequestException;
use CryptoCurrencyChart\API\Exception\UnknownException;
use CryptoCurrencyChart\API\Struct\Coin;
use CryptoCurrencyChart\API\Struct\CoinHistory;
use CryptoCurrencyChart\API\Struct\HistoryData;

class Client {
	public const API_PROTOCOL = 'https';
	public const API_DOMAIN = 'www.cryptocurrencychart.com';
	public const API_PATH = 'api';

	protected $apiKey;
	protected $apiSecret;


	public function __construct(string $apiKey, string $apiSecret) {
		$this->apiKey = $apiKey;
		$this->apiSecret = $apiSecret;
	}

	/**
	 * @return \CryptoCurrencyChart\API\Struct\Coin[]
	 */
	public function getCoins(): array {
		$response = $this->apiCall('getCoins');
		if (!isset($response['coins']) || !\is_array($response['coins'])) {
			throw new ServerException('Invalid response for getCoins, missing or invalid `coins`.');
		}
		$coins = [];
		foreach ($response['coins'] as $coinData) {
			$coins[] = Coin::fromArray($coinData);
		}

		return $coins;
	}

	/**
	 * @return string[]
	 */
	public function getDataTypes(): array {
		$response = $this->apiCall('getDataTypes');
		if (!isset($response['dataTypes']) || !\is_array($response['dataTypes'])) {
			throw new ServerException('Invalid response for getDataTypes, missing or invalid `dataTypes`.');
		}

		return $response['dataTypes'];
	}

	/**
	 * @return string[]
	 */
	public function getBaseCurrencies(): array {
		$response = $this->apiCall('getBaseCurrencies');
		if (!isset($response['baseCurrencies']) || !\is_array($response['baseCurrencies'])) {
			throw new ServerException('Invalid response for getBaseCurrencies, missing or invalid `baseCurrencies`.');
		}

		return $response['baseCurrencies'];
	}

	public function viewCoin(int $coinId, \DateTime $date = null, string $baseCurrency = 'USD'): Coin {
		$response = $this->apiCall('viewCoin', [$coinId, $date, $baseCurrency]);
		if (!isset($response['coin']) || !\is_array($response['coin'])) {
			throw new ServerException('Invalid response for viewCoin, missing or invalid `coin`.');
		}

		return Coin::fromArray($response['coin']);
	}

	public function viewCoinHistory(int $coinId, \DateTime $start, \DateTime $end, string $dataType = 'price', string $baseCurrency = 'USD'): CoinHistory {
		$response = $this->apiCall('viewCoinHistory', [$coinId, $start, $end, $dataType, $baseCurrency]);
		if (!isset($response['coin'], $response['dataType'], $response['baseCurrency'], $response['data']) || !\is_array($response['coin']) || !\is_array($response['data'])) {
			throw new ServerException('Invalid response for viewCoinHistory, missing or invalid properties.');
		}
		$historyData = [];
		foreach ($response['data'] as $day) {
			$day['value'] = $day[$response['dataType']];
			$historyData[] = HistoryData::fromArray($day);
		}

		$coinHistory = new CoinHistory();
		$coinHistory->coin = Coin::fromArray($response['coin']);
		$coinHistory->baseCurrency = $response['baseCurrency'];
		$coinHistory->dataType = $response['dataType'];
		$coinHistory->data = $historyData;

		return $coinHistory;
	}

	public static function getFiatSymbol(string $currency): string {
		$mapping = [
			'KRW' => '₩',
			'USD' => '$',
			'EUR' => '€',
			'GBP' => '£',
			'CNY' => '￥',
			'YEN' => '￥',
			'INR' => '₹',
			'BRL' => 'R$',
			'CAD' => 'C$',
			'AUD' => 'A$',
			'RUB' => '₽',
			'ILS' => '₪',
			'IDR' => 'Rp',
			'MXN' => 'Mex$',
			'ZAR' => 'R',
			'TRY' => '₺',
		];

		return $mapping[$currency] ?? $currency;
	}

	protected function apiCall(string $method, array $parameters = []): array {
		\array_walk( $parameters, static function(&$value): void {
			if ($value === null) {
				$value = '';
			} elseif ($value instanceof \DateTime) {
				$value = $value->format('Y-m-d');
			} else {
				if (!\is_string($value)) {
					$value = (string) $value;
				}
				$value = \rawurlencode($value);
			}
		});
		$response = @\file_get_contents(
			static::API_PROTOCOL .
			'://' .
			$this->apiKey .
			':' .
			$this->apiSecret .
			'@' .
			\implode('/', array_merge([static::API_DOMAIN, static::API_PATH, $method], $parameters))
		);

		if ($http_response_header === null) {
			throw new UnknownException(vsprintf('Failed to get a response for API call: `%s`.', [$method]));
		}

		$httpStatusCode = $this->getHttpStatus($http_response_header);
		switch ($httpStatusCode) {
			case 200:
				$json = \json_decode($response, true);
				if ($json === null || !\is_array($json)) {
					throw new InvalidResponseException(vsprintf('Non JSON response received from API for method `%s`, response: `%s`.', [$method, $response]));
				}

				return $json;
			case 400:
				throw new InvalidParameterException(vsprintf('Invalid parameter provided for method `%s`.', [$method]));
			case 401:
				throw new UnauthorizedRequestException(vsprintf('Unauthorized request `%s`, make sure you provided a valid key and secret.', [$method]));
			case 405:
				throw new RequestMethodNotAllowedException(vsprintf('Invalid request method for `%s`.', [$method]));
			case 429:
				throw new RateLimitExceededException(vsprintf('API rate limit was exceeded with call to `%s`, make fewer request in close succession or check your monthly request limit.', [$method]));
			case 500:
				throw new ServerException(vsprintf('Server exception for method `%s`.', [$method]));
			default:
				throw new UnknownException(vsprintf('Unknown exception for method `%s`, HTTP status code: %d.', [$method, $httpStatusCode]));
		}
	}

	protected function getHttpStatus(array $headers): int {
		foreach ($headers as $header) {
			if (\preg_match( '/HTTP\/\d(\.\d)?\s(?<httpStatus>\d{3})/',$header, $matches)) {
				return (int) $matches['httpStatus'];
			}
		}

		throw new UnknownException('Could not determine HTTP status response code for API request.');
	}
}