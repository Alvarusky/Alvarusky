<?php
declare(strict_types=1);

namespace CryptoCurrencyChartClient\src\CryptoCurrencyChart\API\Struct;


use CryptoCurrencyChart\API\Struct\Struct;

class Coins extends Struct {
	/** @var \CryptoCurrencyChart\API\Struct\Coin[] The available coins. */
	public $coins;
}