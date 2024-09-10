<?php
require_once ('vendor/autoload.php');
use FurnitureStoreApi\Services\HeaderService;
HeaderService::setHeaders();
use \FurnitureStoreApi\Categories\CategoryHydrator;

try
{
    $results = ['message'=>'Successfully retrieved products',
        'data' => CategoryHydrator::getCategories()];
    echo json_encode($results);
    http_response_code(200);
}
catch(Exception $exception)
{
    http_response_code(500);
    $results = ["message" => 'Unexpected error',  "data"=> []];
    echo json_encode($results);
}