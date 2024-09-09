<?php

namespace Example\Products;
use \PDO;
class ProductHydrator
{
    public static function getProductsByCategory($PDO, $db)
    {
        $query = $db -> prepare ('SELECT `id`, `price`, `stock`, `colour`, `currency` FROM `products` WHERE `furniture_store`');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, SimpleProductEntity::class);
        return $query->fetchALL();
    }
}