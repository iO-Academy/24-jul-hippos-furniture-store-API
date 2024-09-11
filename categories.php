<?php
require_once ('vendor/autoload.php');
use FurnitureStoreApi\Services\HeaderService;
HeaderService::setHeaders();
use \FurnitureStoreApi\Categories\CategoryHydrator;
use FurnitureStoreApi\Services\ResponseService;
use FurnitureStoreApi\Exceptions\CustomException;

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