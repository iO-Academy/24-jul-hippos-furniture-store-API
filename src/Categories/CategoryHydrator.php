<?php

namespace FurnitureStoreApi\Categories;

use FurnitureStoreApi\Categories\CategoryEntity;
use \PDO;

class CategoryHydrator
{
    public static function getCategories()
    {
        $db = new PDO('mysql:host=db;dbname=furniture_store', 'root', 'password');
        $query = $db->prepare('SELECT `categories`.`id`, `category`, COUNT(`categories`.`id`) AS `cid` FROM `categories`
                            JOIN `products` ON `products`.`name`= `categories`.`category`
                            GROUP BY `category`
                            ORDER BY `categories`.`id`');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, CategoryEntity::class);
        return $query->fetchAll();
    }




}