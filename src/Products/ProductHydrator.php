<?php
namespace FurnitureStoreApi\Products;
use FurnitureStoreApi\Services\DbConnection;
use FurnitureStoreApi\Products\DetailedProductEntity;
use \PDO;

class ProductHydrator
{
    public static function getProductById($productId)
    {
        $db = DbConnection::getConnection();
        $query = $db->prepare('SELECT `id`,`name`,`category_id`,`width`,`height`,`depth`,`price`,`stock`,`related`,`color` FROM `products` WHERE `id`= :productId');
        $query->execute(['productId'=>$productId]);
        $query->setFetchMode(PDO::FETCH_CLASS, DetailedProductEntity::class);
        return $query->fetch();
    }
    public static function getMaxProducts()
    {
        $db = DbConnection::getConnection();
        $query = $db->prepare('SELECT MAX(`id`) AS max_id FROM `products`');
        $query->execute();
        $maxProducts = $query->fetch();
        $maxProducts = $maxProducts['max_id'];
        return $maxProducts;
    }

    public static function getProducts($categoryID, $isInStock)
    {
        $db = DbConnection::getConnection();
        if (!$isInStock)
        {
            $query = $db->prepare('SELECT `id`, `name`,`price`, `stock`, `color` FROM `products` WHERE `category_id` = :categoryID');
        }
        else
        {
            $query = $db->prepare('SELECT `id`, `name`,`price`, `stock`, `color` FROM `products` WHERE `category_id` = :categoryID AND `stock`>0');
        }
        $query->execute(['categoryID'=>$categoryID]);
        $query->setFetchMode(PDO::FETCH_CLASS, SimpleProductEntity::class);
        return $query->fetchALL();
    }
}