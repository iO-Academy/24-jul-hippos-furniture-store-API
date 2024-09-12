<?php

namespace FurnitureStoreApi\Exceptions;

use \Exception;


class InvalidCategoryException extends Exception
{
  public function __construct($message = "Invalid Category")
  {
      parent::__construct($message);
  }
}