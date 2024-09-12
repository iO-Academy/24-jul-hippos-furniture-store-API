<?php

namespace FurnitureStoreApi\Services;

class CurrencyConversionClass
{
    private static string $currency = 'GBP';

    public static function setCurrency(string $currency): void
    {
        self::$currency = $currency;
    }
    public static function currencyConverter(string $price): string
    {
        if (self::$currency === 'USD')
        {
           $price = number_format($price * 1.19,2);
        }
        else if (self::$currency === 'EUR')
        {
            $price = number_format($price * 1.16,2);
        }
        else if (self::$currency === 'YEN')
        {
            $price = number_format($price * 162.16, 2);
        }
        return $price;
    }
}