<?php
require_once('vendor/autoload.php');

use FurnitureStoreApi\Services\HeaderService;
use FurnitureStoreApi\Products\ProductHydrator;
use FurnitureStoreApi\Services\ResponseService;
use FurnitureStoreApi\Categories\CategoryHydrator;
use FurnitureStoreApi\Exceptions\InvalidCategoryException;
use FurnitureStoreApi\Exceptions\InvalidCurrencyException;
use FurnitureStoreApi\Services\CurrencyConversionClass;

HeaderService::setHeaders();

try {
    if ($_GET['cat'] > CategoryHydrator::getMaxCategory() || $_GET['cat'] < 1 || !is_numeric($_GET['cat']) || !isset($_GET['cat'])) {
        throw new InvalidCategoryException();
    } else {
        if (isset($_GET['currency'])) {
            CurrencyConversionClass::setCurrency($_GET['currency']);
        }
        $inStockOnly = 0;
        if (isset($_GET['instockonly'])) {
            $inStockOnly = $_GET['instockonly'];
        }
        $resultsArray = ProductHydrator::getProducts($_GET['cat'], $inStockOnly);
        echo ResponseService::makeResponse('Successfully retrieved products', $resultsArray, 200);
    }

} catch (InvalidCategoryException|InvalidCurrencyException $exception) {
    echo ResponseService::makeResponse($exception->getMessage(), [], 400);
} catch (Exception $exception) {
    echo ResponseService::makeResponse('Unexpected Error', [], 500);
}