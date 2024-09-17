<?php

namespace FurnitureStoreApi\Services;
class ResponseService
{
    public static function makeResponse($message, $resultsArray, $responseCode): string
    {
        $results = ['message'=>$message,
            'data' => $resultsArray];
        http_response_code($responseCode);
        return json_encode($results);
    }
}