<?php
require_once('vendor/autoload.php');

use FurnitureStoreApi\Products\ProductHydrator;
use FurnitureStoreApi\Services\ResponseService;
use FurnitureStoreApi\Exceptions\InvalidProductIdException;
use FurnitureStoreApi\Exceptions\InvalidUnitOfMeasureException;
use FurnitureStoreApi\Services\UnitConversionService;
use FurnitureStoreApi\Services\CurrencyConversionClass;
use FurnitureStoreApi\Exceptions\InvalidCurrencyException;
use FurnitureStoreApi\Services\HeaderService;
HeaderService::setHeaders();

try {
    if ($_GET['id'] > ProductHydrator::getMaxProducts() || !is_numeric($_GET['id'])) {
        throw new InvalidProductIdException();
    } else {
        if (isset($_GET['unit'])) {
            UnitConversionService::setUnit($_GET['unit']);
        }

        if (isset($_GET['currency'])) {
                CurrencyConversionClass::setCurrency($_GET['currency']);
            }
        $resultsArray = ProductHydrator::getProductById($_GET['id']);
        ResponseService::makeResponse("Successfully retrieved product", $resultsArray, 200);
    }
    }
 catch (InvalidProductIdException $exception) {
    ResponseService::makeResponse($exception->getMessage(), [], 400);
} catch (InvalidUnitOfMeasureException $exception) {
    ResponseService::makeResponse($exception->getMessage(), [], 400);
} catch (InvalidCurrencyException $exception) {
    ResponseService::makeResponse($exception->getMessage(), [], 400);
}