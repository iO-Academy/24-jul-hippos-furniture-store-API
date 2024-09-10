<?php
require_once ('vendor/autoload.php');

use \FurnitureStoreApi\Categories\CategoryHydrator;

$result = CategoryHydrator::getCategories();

print_r($result);
