<?php

namespace FurnitureStoreApi\Products;
use \PDO;
class ProductHydrator
{
    public static function getProductsByCategory($PDO, $db)
    {
        $query = $db -> prepare ('SELECT `id`, `name`,`price`, `stock`, `color`, `currency` FROM `products` WHERE `furniture_store`');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, SimpleProductEntity::class);
        return $query->fetchALL();
    }
}