<?php
namespace FurnitureStoreApi\Categories;
use \PDO;

class CategoryHydrator
{
    public static function getCategories()
    {
        $db = new PDO('mysql:host=db;dbname=furniture_store', 'root', 'password');
        $query = $db->prepare('SELECT `id`, `name`, COUNT(`category_id`) AS `products` FROM `products`
                            GROUP BY `category_id`
                            ORDER BY `category_id`
                            ');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, CategoryEntity::class);
        return $query->fetchAll();
    }
}


