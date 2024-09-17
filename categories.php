<?php
require_once ('vendor/autoload.php');
use FurnitureStoreApi\Services\HeaderService;
use \FurnitureStoreApi\Categories\CategoryHydrator;
use FurnitureStoreApi\Services\ResponseService;
HeaderService::setHeaders();

try
{
    $resultsArray = CategoryHydrator::getCategories();
    echo ResponseService::makeResponse('Successfully retrieved products', $resultsArray,200);
}
catch(Exception $exception)
{
    echo ResponseService::makeResponse("Unexpected Error",[], 500);
}