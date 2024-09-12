<?php
require_once ('vendor/autoload.php');
use FurnitureStoreApi\Services\HeaderService;
use FurnitureStoreApi\Products\ProductHydrator;
use FurnitureStoreApi\Services\ResponseService;
use FurnitureStoreApi\Exceptions\InvalidProductIdException;
HeaderService::setHeaders();


try
{
    $jsonString = [];
    if ($_GET['id']>ProductHydrator::getMaxProducts()
    )
    {
        throw new InvalidProductIdException();
    }
    else
    {
        $jsonString = ProductHydrator::getProductById($_GET['id']);
        ResponseService::makeResponse("Successfully retrieved product",$jsonString,200);
    }
}
catch (InvalidProductIdException $exception)
{
    ResponseService::makeResponse($exception-> getMessage(),$jsonString,400);
}