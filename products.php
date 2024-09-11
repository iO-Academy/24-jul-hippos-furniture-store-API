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
    $jsonString = [];
    if ($_GET['cat']>CategoryHydrator::getMaxCategory()||$_GET['cat']<0||!is_numeric($_GET['cat']))
    {
        throw new InvalidCategoryException();
    }
    else
    {
        $jsonString = ProductHydrator::getProductsByCategory($_GET['cat']);
        ResponseService::makeResponse('Successfully retrieved products', $jsonString, 200);
    }
}
catch (InvalidCategoryException $exception)
{
    ResponseService::makeResponse($exception->getMessage(), $jsonString, 400);
}
catch(Exception $exception)
    {
        ResponseService::makeResponse('Unexpected Error', $jsonString, 500);
    }