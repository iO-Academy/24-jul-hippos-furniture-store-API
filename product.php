<?php
require_once ('vendor/autoload.php');
use FurnitureStoreApi\Services\HeaderService;
use FurnitureStoreApi\Products\ProductHydrator;
use FurnitureStoreApi\Services\ResponseService;
use FurnitureStoreApi\Exceptions\InvalidProductIdException;
use FurnitureStoreApi\Exceptions\InvalidUnitOfMeasureException;
try
{
    if ($_GET['id']>ProductHydrator::getMaxProducts())
    {
        throw new InvalidProductIdException();
    }
    else
    {
        if ($_GET['unit'] === 'mm'||$_GET['unit'] === 'cm'||$_GET['unit'] === 'in'||$_GET['unit'] === 'ft')
        {
            $resultsArray = ProductHydrator::getProductById($_GET['id']);
            ResponseService::makeResponse("Successfully retrieved product", $resultsArray, 200);
        }
        else
        {
            throw new InvalidUnitOfMeasureException();
        }
    }
}
catch (InvalidProductIdException $exception)
{
    ResponseService::makeResponse($exception-> getMessage(),[],400);
}
catch (InvalidUnitOfMeasureException $exception)
{
    ResponseService::makeResponse($exception->getMessage(),[],400);
}
