<?php
namespace FurnitureStoreApi\Categories;
use FurnitureStoreApi\Services\DbConnection;
use \PDO;

class CategoryHydrator
{
    public static function getCategories()
    {
        $db = DbConnection::setConnection();
        $query = $db->prepare('SELECT `category_id` AS `id`, `name`, COUNT(`category_id`) AS `productCount` FROM `products`
                            GROUP BY `category_id`
                            ORDER BY `category_id`
                            ');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, CategoryEntity::class);
        return $query->fetchAll();
    }

    public static function getMaxCategory()
    {
        $db = DbConnection::setConnection();
        $query = $db->prepare('SELECT MAX(`category_id`) AS max_id FROM `products`');
        $query->execute();
        $maxCategory = $query->fetch();
        $maxCategory = $maxCategory['max_id'];
        return $maxCategory;
    }
}


