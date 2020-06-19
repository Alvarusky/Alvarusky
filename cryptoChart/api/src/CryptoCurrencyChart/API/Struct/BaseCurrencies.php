<?php
declare(strict_types=1);

namespace CryptoCurrencyChartClient\src\CryptoCurrencyChart\API\Struct;


use CryptoCurrencyChart\API\Struct\Struct;

class BaseCurrencies extends Struct {
	/** @var string[] The available base currencies. */
	public $baseCurrencies;
}