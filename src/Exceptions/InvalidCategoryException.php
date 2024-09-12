<?php

namespace FurnitureStoreApi\Exceptions;

class InvalidCategoryException extends \Exception
{
  public function __construct($message = "Invalid Category")
  {
      parent::__construct($message);
  }
}