<?php
require_once ('vendor/autoload.php');
use FurnitureStoreApi\Services\HeaderService;
use FurnitureStoreApi\Products\ProductHydrator;
use FurnitureStoreApi\Services\ResponseService;
use FurnitureStoreApi\Services\DbConnection;
use FurnitureStoreApi\Categories\CategoryHydrator;
use FurnitureStoreApi\Exceptions\InvalidCategoryException;
HeaderService::setHeaders();

try
{
    $jsonArray = [];
    if ($_GET['cat']>CategoryHydrator::getMaxCategory()||$_GET['cat']<0||!is_numeric($_GET['cat']))
    {
        throw new InvalidCategoryException();
    }
    else
    {
        $jsonArray = ProductHydrator::getProductsByCategory($_GET['cat']);
        ResponseService::makeResponse('Successfully retrieved products', $jsonArray, 200);
    }
}
catch (InvalidCategoryException $exception)
{
    ResponseService::makeResponse($exception->getMessage(), $jsonArray, 400);
}
catch(Exception $exception)
    {
        ResponseService::makeResponse('Unexpected Error', $jsonArray, 500);
    }