<?php

//RUN ONCE AFTER DB (furniture_store) STRUCTURE HAS BEEN BUILT
require('vendor/autoload.php');

try
{

    $db = new PDO('mysql:host=db;dbname=furniture_store_test', 'root', 'password');
    $jsonRequest = file_get_contents('furnitureStore.json');
    $json = json_decode($jsonRequest, true);
    foreach ($json as $eachJson)
    {
        $query = $db->prepare(
            'INSERT INTO `products` (`name`, `width`, `height`, `depth`, `price`, `stock`, `related`, `color`)
                                 VALUES (:name, :width,:height,:depth,
                                         :price,:stock,:related,:color)');
        $query->execute(['name' =>$eachJson['name'],
            'width'=>$eachJson['width'],
            'height'=>$eachJson['height'],
            'depth'=>$eachJson['depth'],
            'price'=>$eachJson['price'],
            'stock'=>$eachJson['stock'],
            'related'=>$eachJson['related'],
            'color'=>$eachJson['color']]);
    }
    $categories = ['Chair', 'Office Chair', 'Book case', 'Table', 'Draws', 'Wardrobe', 'Chest', 'Tv Stand', 'Shelves', 'Desk', 'Sofa'];
    foreach ($categories as $i=>$category)
    {
        $query = $db->prepare(
            'UPDATE `products` SET `category_id` = :index WHERE `name` = :name '
        );
        $query->execute(['index' => ($i+1), 'name' => $category]);
    }
}
catch (Exception $exception)
{
    $logPath = 'error.log';
    $errorMessage = PHP_EOL.$exception->getMessage();
    file_put_contents($logPath,$errorMessage, FILE_APPEND);
    echo '<h1>Database Connection Error, look at error.log</h1>';
}