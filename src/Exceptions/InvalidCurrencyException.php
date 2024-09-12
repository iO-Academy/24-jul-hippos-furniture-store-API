<?php

namespace FurnitureStoreApi\Exceptions;

use \Exception;
class InvalidCurrencyException extends Exception
{
    public function __construct(string $message = "Invalid currency, please use GBP, EUR, USD or YEN")
    {
        parent::__construct($message);
    }
}