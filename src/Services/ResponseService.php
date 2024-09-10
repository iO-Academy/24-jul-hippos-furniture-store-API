<?php

namespace FurnitureStoreApi\Services;
class ResponseService
{
    public static function responseToJson($message, $jsonString, $responseCode)
    {
        $results = ['message'=>$message,
            'data' => $jsonString];
        http_response_code($responseCode);
        echo json_encode($results);
    }
}