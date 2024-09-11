<?php
require_once ('vendor/autoload.php');
use FurnitureStoreApi\Services\HeaderService;
HeaderService::setHeaders();
use \FurnitureStoreApi\Categories\CategoryHydrator;
use FurnitureStoreApi\Services\ResponseService;

try
{
    $jsonString = CategoryHydrator::getCategories();
    ResponseService::responseToJson('Successfully retrieved products', $jsonString,200);
}
catch(Exception $exception)
{
    $jsonString = [];
    ResponseService::responseToJson('Unexpected error',$jsonString, 500);
}