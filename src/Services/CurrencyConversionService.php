<?php

namespace FurnitureStoreApi\Services;

class CurrencyConversionService
{
    public static function currencyConverter($currency, $price)
    {
        if ($currency === 'USD')
        {
             $price * 1.19;
        }
        else if ($currency === 'EUR')
        {
             $price * 1.16;
        }
        else if ($currency === 'YEN')
        {
             $price * 162.16;
        }
        else if ($currency === 'GPB')
        {
            return $price;
        }
        return $price;
    }
}