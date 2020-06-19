<?php
declare(strict_types=1);

namespace CryptoCurrencyChart\API\Struct;

use function get_class_vars;

abstract class Struct {
	public function toArray(): array {
		return get_object_vars($this);
	}

	/**
	 * @param array $data
	 *
	 * @return static
	 */
	public static function fromArray(array $data): self {
		$struct = new static();
		foreach (get_class_vars(static::class) as $property => $defaultValue) {
			$struct->$property = $data[$property] ?? $defaultValue ?? null;
		}

		return $struct;
	}
}