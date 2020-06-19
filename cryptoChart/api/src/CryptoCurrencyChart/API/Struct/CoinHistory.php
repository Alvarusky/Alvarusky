<?php
declare(strict_types=1);

namespace CryptoCurrencyChart\API\Struct;


class CoinHistory extends Struct {
	/** @var \CryptoCurrencyChart\API\Struct\Coin The coin which the data belongs to. */
	public $coin;
	/** @var string The type of data. */
	public $dataType;
	/** @var string The base currency used for the data. */
	public $baseCurrency;
	/** @var \CryptoCurrencyChart\API\Struct\HistoryData[] The historical data. */
	public $data;


	public function toArray(): array {
		$data = parent::toArray();

		if ($this->coin !== null) {
			$data['coin'] = $this->coin->toArray();
		}

		$data['data'] = [];
		foreach ($this->data as $historyData) {
			$data['data'][] = $historyData->toArray();
		}

		return $data;
	}

	public static function fromArray(array $data): Struct {
		if (isset($data['coin'])) {
			$data['coin'] = Coin::fromArray($data['coin']);
		}
		if (isset($data['data']) && is_array($data['data'])) {
			$historyData = [];
			foreach ($data['data'] as $historyDataItem) {
				$historyData[] = HistoryData::fromArray($historyDataItem);
			}
			$data['data'] = $historyData;
		}
		return parent::fromArray($data);
	}
}