<?php
namespace FurnitureStoreApi\Products;
use FurnitureStoreApi\Services\DbConnection;
use FurnitureStoreApi\Products\DetailedProductEntity;
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

    public static function getProductById($productId)
    {
        $db = DbConnection::setConnection();
        $query = $db -> prepare ('SELECT `id`,`name`,`category_id`,`width`,`height`,`depth`,`price`,`stock`,`related`,`color` FROM `products` WHERE `id`= :productId');
        $query->execute(['productId'=>$productId]);
        $query->setFetchMode(PDO::FETCH_CLASS, DetailedProductEntity::class);
        return $query->fetch();
    }
}