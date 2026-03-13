<?php

$data = [
    "nom" => "Anne",
    "email" => "anne@gmail.com",
    "telephone" => "690000000"
];

$options = [
    "http" => [
        "header" => "Content-Type: application/json",
        "method" => "POST",
        "content" => json_encode($data)
    ]
];

$context = stream_context_create($options);

$result = file_get_contents("http://localhost/reservation-api/clients/create.php", false, $context);

echo $result;

?>