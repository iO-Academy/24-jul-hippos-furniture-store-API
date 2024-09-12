<?php
require_once ('vendor/autoload.php');
use FurnitureStoreApi\Services\HeaderService;
use FurnitureStoreApi\Products\ProductHydrator;
use FurnitureStoreApi\Services\ResponseService;
use FurnitureStoreApi\Exceptions\InvalidProductIdException;
use FurnitureStoreApi\Exceptions\InvalidUnitOfMeasureException;
use FurnitureStoreApi\Services\UnitConversionService;
use FurnitureStoreApi\Services\CurrencyConversionClass;
try
{
    if ($_GET['id']>ProductHydrator::getMaxProducts())
    {
        throw new InvalidProductIdException();
    }
    else
    {
        if (in_array($_GET['unit'], ['mm', 'cm', 'in', 'ft']))
        {
            $resultsArray = ProductHydrator::getProductById($_GET['id']);
            UnitConversionService::setUnit($_GET['unit']);
            CurrencyConversionClass::setCurrency($_GET['currency']);
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
