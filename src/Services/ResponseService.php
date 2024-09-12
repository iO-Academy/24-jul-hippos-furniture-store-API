<?php

namespace FurnitureStoreApi\Services;
class ResponseService
{
    public static function makeResponse($message, $jsonArray, $responseCode)
    {
        $results = ['message'=>$message,
            'data' => $jsonArray];
        http_response_code($responseCode);
        echo json_encode($results);
    }
}