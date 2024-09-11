<?php
namespace FurnitureStoreApi\Categories;
use FurnitureStoreApi\Services\DbConnection;
use \PDO;

class CategoryHydrator
{
    public static function getCategories()
    {
        $db = DbConnection::setConnection();
        $query = $db->prepare('SELECT `id`, `name`, COUNT(`category_id`) AS `productCount` FROM `products`
                            GROUP BY `category_id`
                            ORDER BY `category_id`
                            ');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, CategoryEntity::class);
        return $query->fetchAll();
    }
}


