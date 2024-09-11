<?php
namespace FurnitureStoreApi\Products;
use FurnitureStoreApi\Services\DbConnection;
use \PDO;

class ProductHydrator
{
    public static function getProductsByCategory($categoryID)
    {
        $db = DbConnection::setConnection();
        $query = $db -> prepare ('SELECT `id`, `name`,`price`, `stock`, `color` FROM `products` WHERE `category_id` = :categoryID');
        $query->execute(['categoryID'=>$categoryID]);
        $query->setFetchMode(PDO::FETCH_CLASS, SimpleProductEntity::class);
        return $query->fetchALL();
    }
}