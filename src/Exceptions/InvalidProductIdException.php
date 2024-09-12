<?php
namespace FurnitureStoreApi\Exceptions;
use Exception;

class InvalidProductIdException extends Exception
{
    public function __construct($message = "Invalid product id")
    {
        parent::__construct($message);
    }
}