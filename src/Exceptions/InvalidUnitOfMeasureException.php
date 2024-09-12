<?php

namespace FurnitureStoreApi\Exceptions;

use \Exception;

class InvalidUnitOfMeasureException extends Exception
{
    public function __construct(string $message = "Invalid unit of measure, please use mm,cm,in or ft")
    {
        parent::__construct($message);
    }
}