<?php

use FurnitureStoreApi\Categories\CategoryHydrator;
use \PDO;

try {

    $db = new PDO('mysql:host=db;dbname=furnitureStoreProject', 'root', 'password');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $query = $db->prepare('SELECT `categories`.`id`, `category`, COUNT(`categories`.`id`) FROM `categories`
                            JOIN `products` ON `products`.`name`= `categories`.`category`
                            GROUP BY `category`
                            ORDER BY `categories`.`id`');
    $query->execute();

} catch (Exception $exception) {
    $logPath = 'error.log';
    $errorMessage = PHP_EOL . $exception->getMessage();
    file_put_contents($logPath, $errorMessage, FILE_APPEND);
    echo '<h1>Database Connection Error, look at error.log</h1>';
}