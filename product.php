<?php
require_once ('vendor/autoload.php');
use FurnitureStoreApi\Services\HeaderService;
use FurnitureStoreApi\Products\ProductHydrator;
use FurnitureStoreApi\Services\ResponseService;
use FurnitureStoreApi\Products\DetailedProductEntity;
use FurnitureStoreApi\Services\UnitConversionService;
HeaderService::setHeaders();
$jsonString = ProductHydrator::getProductById($_GET['id']);
ResponseService::makeResponse("Successfully retrieved product",$jsonString,200);