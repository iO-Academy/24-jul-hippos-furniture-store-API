<?php

namespace FurnitureStoreApi\Exceptions;

use TheSeer\Tokenizer\Exception;

class InvalidUnitOfMeasureException extends Exception
{
    public function __construct(string $message = "Invalid unit of measure")
    {
        parent::__construct($message);
    }
}