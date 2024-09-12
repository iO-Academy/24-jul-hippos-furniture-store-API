<?php
require_once ('vendor/autoload.php');
use FurnitureStoreApi\Services\HeaderService;
HeaderService::setHeaders();
use \FurnitureStoreApi\Categories\CategoryHydrator;
use FurnitureStoreApi\Services\ResponseService;

try
{
    $jsonArray = CategoryHydrator::getCategories();
    ResponseService::makeResponse('Successfully retrieved products', $jsonArray,200);
}
catch(Exception $exception)
{
    $jsonArray = [];
    ResponseService::makeResponse("Unexpected Error",$jsonArray, 500);
}