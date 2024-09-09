<?php

namespace FurnitureStoreApi\Categories;

use FurnitureStoreApi\Categories\CategoryEntity;
use \PDO;

class CategoryHydrator
{
    public static function getCategories(PDO $db)
    {
        $query = $db->prepare('SELECT `category_id`, `category` FROM `Category`');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, CategoryEntity::class);
        return $query->fetchAll();
    }
}