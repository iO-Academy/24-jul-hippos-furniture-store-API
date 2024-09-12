<?php
require_once ('vendor/autoload.php');
use FurnitureStoreApi\Services\HeaderService;
use FurnitureStoreApi\Products\ProductHydrator;
use FurnitureStoreApi\Services\ResponseService;
use FurnitureStoreApi\Exceptions\InvalidProductIdException;
HeaderService::setHeaders();

try
{
    $jsonArray = [];
    if ($_GET['id']>ProductHydrator::getMaxProducts()
    )
    {
        throw new InvalidProductIdException();
    }
    else
    {
        $jsonArray = ProductHydrator::getProductById($_GET['id']);
        ResponseService::makeResponse("Successfully retrieved product",$jsonArray,200);
    }
}
catch (InvalidProductIdException $exception)
{
    ResponseService::makeResponse($exception-> getMessage(),$jsonArray,400);
}