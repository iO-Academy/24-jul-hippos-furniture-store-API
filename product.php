<?php
require_once ('vendor/autoload.php');
use FurnitureStoreApi\Services\HeaderService;
use FurnitureStoreApi\Products\ProductHydrator;
use FurnitureStoreApi\Services\ResponseService;

HeaderService::setHeaders();
$jsonString = ProductHydrator::getProductById($_GET['id']);
ResponseService::makeResponse("Successfully retrieved product",$jsonString,200);