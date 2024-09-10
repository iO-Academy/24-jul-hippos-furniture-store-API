<?php

namespace FurnitureStoreApi\Services;
use \PDO;
class DbConnection
{
    private static $dbConnection;

    public static function setConnection()
    {
        if (empty(self::$dbConnection))
        {
            self::$dbConnection = new PDO('mysql:host=db;dbname=furniture_store', 'root', 'password');
        }
        return self::$dbConnection;
    }
}

