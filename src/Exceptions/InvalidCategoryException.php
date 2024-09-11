<?php

namespace FurnitureStoreApi\Exceptions;

use Throwable;

class InvalidCategoryException extends \Exception
{
  public function __construct($message = "Invalid Category")
  {
      parent::__construct($message);
  }
}