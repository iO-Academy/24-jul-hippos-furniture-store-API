<?php

namespace FurnitureStoreApi\Services;
use FurnitureStoreApi\Exceptions\InvalidCurrencyException;
class CurrencyConversionClass
{
    private static string $currency = 'GBP';

    public static function setCurrency(string $currency): void
    {
        if (in_array($_GET['currency'], ['GBP', 'USD', 'EUR', 'YEN']))
        {
            self::$currency = $currency;
        }
        else
        {
            throw new InvalidCurrencyException();

        }
    }
    public static function currencyConverter(float $price): string
    {
        if (self::$currency === 'USD')
        {
           $price = $price * 1.19;
        }
        else if (self::$currency === 'EUR')
        {
            $price = $price * 1.16;
        }
        else if (self::$currency === 'YEN')
        {
            $price = $price * 162.16;
        }

        return number_format($price,2);
    }
}