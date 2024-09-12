<?php
require_once ('vendor/autoload.php');
use FurnitureStoreApi\Services\HeaderService;
use FurnitureStoreApi\Products\ProductHydrator;
use FurnitureStoreApi\Services\ResponseService;
use FurnitureStoreApi\Exceptions\InvalidProductIdException;
try
{
    if ($_GET['id']>ProductHydrator::getMaxProducts()
    )
    {
        throw new InvalidProductIdException();
    }
    else
    {
        $resultsArray = ProductHydrator::getProductById($_GET['id']);
        ResponseService::makeResponse("Successfully retrieved product",$resultsArray,200);
    }
}
catch (InvalidProductIdException $exception)
{
    ResponseService::makeResponse($exception-> getMessage(),[],400);
}
