<?php
require('vendor/autoload.php');
$jsonRequest = file_get_contents('https://dev.io-academy.uk/resources/furniture/furniture.json');
$json = json_decode($jsonRequest);

try
{
    $db = new PDO('mysql:host=db;dbname=furniture_store', 'root', 'password');
}
catch (Exception $exception)
{
    $logPath = 'error.log';
    $errorMessage = PHP_EOL.$exception->getMessage();
    file_put_contents($logPath,$errorMessage, FILE_APPEND);
    echo '<h1>Database Connection Error, look at error.log</h1>';
}

//print_r($json);

foreach ($json as $eachJson)
{
    var_dump($eachJson);
    echo '<br>';
    $query = $db->prepare(
        'INSERT INTO `products` (`name`, `width`, `height`, `depth`, `price`, `stock`, `related`, `colour`)
                                 VALUES (:name, :width,:height,:depth,
                                         :price,:stock,:related,:colour)');
    $query->execute(['name' =>$eachJson['name'], ]);
}