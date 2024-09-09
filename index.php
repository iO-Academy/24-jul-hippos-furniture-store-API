<?php
require('vendor/autoload.php');
$jsonRequest = file_get_contents('https://dev.io-academy.uk/resources/furniture/furniture.json');
$json = json_decode($jsonRequest);

var_dump($json);
