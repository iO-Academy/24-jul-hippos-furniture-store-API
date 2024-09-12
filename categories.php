<?php
require_once ('vendor/autoload.php');
use FurnitureStoreApi\Services\HeaderService;
use \FurnitureStoreApi\Categories\CategoryHydrator;
use FurnitureStoreApi\Services\ResponseService;
HeaderService::setHeaders();

try
{
    $jsonString = CategoryHydrator::getCategories();
    ResponseService::makeResponse('Successfully retrieved products', $jsonString,200);
}
catch(Exception $exception)
{
    $jsonString = [];
    ResponseService::makeResponse("Unexpected Error",$jsonString, 500);
}