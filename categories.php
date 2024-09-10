<?php
require_once ('vendor/autoload.php');
header('Content-Type: application/json; charset=utf-8');

use \FurnitureStoreApi\Categories\CategoryHydrator;

$results = CategoryHydrator::getCategories();

echo json_encode($results);
//print_r($results);
//
//echo '<br>';
//echo '<br>';
//echo '<br>';
//echo '<br>';

//foreach ($results as $result)
//{
//    echo json_encode($result);
//}
