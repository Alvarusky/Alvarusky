<?php
declare(strict_types=1);

spl_autoload_register(static function(string $class) {
	if (strpos($class, 'CryptoCurrencyChart') !== 0) {
		return;
	}

	/** @noinspection PhpIncludeInspection */
	require_once __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
});