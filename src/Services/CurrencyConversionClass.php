<?php

namespace FurnitureStoreApi\Services;
use FurnitureStoreApi\Exceptions\InvalidCurrencyException;
HeaderService::setHeaders();
class CurrencyConversionClass
{
    private static string $currency = 'GBP';

    public static function setCurrency(string $currency): void
    {
        if (in_array($currency, ['GBP', 'USD', 'EUR', 'YEN']))
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
           $price = number_format($price * 1.19, 2);
        }
        else if (self::$currency === 'EUR')
        {
            $price = number_format($price * 1.16, 2);
        }
        else if (self::$currency === 'YEN')
        {
            $price = number_format($price * 162.16);
        }

        return $price;
    }
}