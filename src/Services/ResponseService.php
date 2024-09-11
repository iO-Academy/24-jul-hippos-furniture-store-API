<?php

namespace FurnitureStoreApi\Services;
class ResponseService
{
    public static function makeResponse($message, $jsonString, $responseCode)
    {
        $results = ['message'=>$message,
            'data' => $jsonString];
        http_response_code($responseCode);
        echo json_encode($results);
    }
}