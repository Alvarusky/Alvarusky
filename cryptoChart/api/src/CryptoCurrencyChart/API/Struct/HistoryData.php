<?php
declare(strict_types=1);

namespace CryptoCurrencyChart\API\Struct;


class HistoryData extends Struct {
	/** @var string The date for the value in the format of YYYY-mm-dd. */
	public $date;
	/** @var float|null The value, the type depends on the dataType */
	public $value;
}