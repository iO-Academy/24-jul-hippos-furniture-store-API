<?php
require_once ('vendor/autoload.php');
use FurnitureStoreApi\Services\HeaderService;
use FurnitureStoreApi\Products\ProductHydrator;
use FurnitureStoreApi\Services\ResponseService;
use FurnitureStoreApi\Categories\CategoryHydrator;
use FurnitureStoreApi\Exceptions\InvalidCategoryException;
HeaderService::setHeaders();

try
{
    if ($_GET['cat']>CategoryHydrator::getMaxCategory()||$_GET['cat']<0||!is_numeric($_GET['cat']))
    {
        throw new InvalidCategoryException();
    }
    else
    {
        $resultsArray = ProductHydrator::getProductsByInStock($_GET['cat'], $_GET['instockonly']);
        ResponseService::makeResponse('Successfully retrieved products', $resultsArray, 200);
    }
}
catch (InvalidCategoryException $exception)
{
    ResponseService::makeResponse($exception->getMessage(), [], 400);
}
catch(Exception $exception)
    {
        ResponseService::makeResponse('Unexpected Error', [], 500);
    }