<?php
require_once ('vendor/autoload.php');
use FurnitureStoreApi\Services\HeaderService;
HeaderService::setHeaders();
use FurnitureStoreApi\Products\ProductHydrator;
use FurnitureStoreApi\Services\ResponseService;
use FurnitureStoreApi\Services\DbConnection;

$db = DbConnection::setConnection();
$query = $db->prepare('SELECT MAX(`category_id`) FROM `products`');
$query->execute();
$maxCategory = $query->fetch();
$maxCategory = $maxCategory[0];
try
{
    $jsonString = [];
    if ($_GET['cat']>$maxCategory)
    {
        ResponseService::makeResponse('Invalid category id', $jsonString, 400);
    }
    else
    {
        $jsonString = ProductHydrator::getProductsByCategory($_GET['cat']);
        ResponseService::makeResponse('Successfully retrieved products', $jsonString, 200);
    }
}
catch(Exception $exception)

    {
        ResponseService::makeResponse('Unexpected error', $jsonString, 400);
    }