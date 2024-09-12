<?php

namespace FurnitureStoreApi\Services;
class ResponseService
{
    public static function makeResponse($message, $resultsArray, $responseCode)
    {
        $results = ['message'=>$message,
            'data' => $resultsArray];
        http_response_code($responseCode);
        echo json_encode($results);
    }
}