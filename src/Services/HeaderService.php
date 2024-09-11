<?php

namespace FurnitureStoreApi\Services;

class HeaderService
{
    public static function setHeaders()
    {
        header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Allow-Origin: *");
    }
}