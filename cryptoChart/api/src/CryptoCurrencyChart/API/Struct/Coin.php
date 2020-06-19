<?php
declare(strict_types=1);

namespace CryptoCurrencyChart\API\Struct;


class Coin extends Struct {
	/** @var int The coin id */
	public $id;
	/** @var string The name of the coin */
	public $name;
	/** @var string The symbol for the coin. */
	public $symbol;
	/** @var string|null The base currency used in the coins values. */
	public $baseCurrency;
	/** @var string|null The date for the price data formatted as YYYY-mm-dd.  */
	public $date;
	/** @var float|null The volume weighted average price for the coin on the provided date. */
	public $price;
	/** @var float|null The open price for the coin on the provided date. */
	public $openPrice;
	/** @var float|null The last price for the coin on the provided date, if the date is the current day it is the most recent price for the day. */
	public $closePrice;
	/** @var float|null The highest price for the coin on the provided date. */
	public $highPrice;
	/** @var float|null The lowest price for the coin on the provided date. */
	public $lowPrice;
	/** @var float|null The market capitalization for the coin on the provided date. */
	public $marketCap;
	/** @var float|null The trade volume for the coin on the provided date. */
	public $tradeVolume;
	/** @var float|null The trade volume in markets against a fiat coin for the coin on the provided date. */
	public $fiatTradeVolume;
	/** @var int|null The coin rank by market capitalization on the provided date. */
	public $rank;
	/** @var float|null The number of coins available on the provided date. */
	public $supply;
	/** @var float|null The percentage of the market capitalization of the coin that was traded on the provided date. */
	public $tradeHealth;
	/** @var string|null A sentiment indication for the coins market on the provided date. */
	public $sentiment;
	/** @var string|null The date of the first available data for the coin in the format of YYYY-mm-dd. */
	public $firstData;
	/** @var string|null The date of the most recent data for the coin in the format of YYYY-mm-dd. */
	public $mostRecentData;
	/** @var string|null The status of the coin. */
	public $status;
}