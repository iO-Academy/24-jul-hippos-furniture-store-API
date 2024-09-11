<?php
namespace FurnitureStoreApi\Products;
use FurnitureStoreApi\Services\DbConnection;
use \PDO;

class ProductHydrator
{
    public static function getProductsByCategory()
    {
        $db = DbConnection::setConnection();
        $query = $db -> prepare ('SELECT `id`, `name`,`price`, `stock`, `color`, `currency` FROM `products`');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, SimpleProductEntity::class);
        return $query->fetchALL();
    }
}