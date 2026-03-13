<?php
// ===========================
// 1️⃣ Ajouter un client
// ===========================
$data_client = [
    "nom"=>"Anne",
    "email"=>"anne@gmail.com",
    "telephone"=>"690000000"
];

$options_client = [
    "http" => [
        "header"=>"Content-Type: application/json",
        "method"=>"POST",
        "content"=>json_encode($data_client)
    ]
];

$context_client = stream_context_create($options_client);
$result_client = file_get_contents("http://localhost/reservation-api/clients/create.php", false, $context_client);

echo "➤ Client : $result_client\n\n";

// ===========================
// 2️⃣ Ajouter un hôtel / salle
// ===========================
$data_hotel = [
    "nom"=>"Hotel Central",
    "type"=>"Hôtel",
    "capacite"=>50,
    "description"=>"Hôtel 3 étoiles",
    "prix"=>100
];

$options_hotel = [
    "http"=>[
        "header"=>"Content-Type: application/json",
        "method"=>"POST",
        "content"=>json_encode($data_hotel)
    ]
];

$context_hotel = stream_context_create($options_hotel);
$result_hotel = file_get_contents("http://localhost/reservation-api/hotels/create.php", false, $context_hotel);

echo "➤ Hôtel / Salle : $result_hotel\n\n";

// ===========================
// 3️⃣ Ajouter une disponibilité
// ===========================
$data_dispo = [
    "hotel_id"=>1, // ID de l'hôtel créé (ici le 1er)
    "date_debut"=>"2026-03-15",
    "date_fin"=>"2026-03-20"
];

$options_dispo = [
    "http"=>[
        "header"=>"Content-Type: application/json",
        "method"=>"POST",
        "content"=>json_encode($data_dispo)
    ]
];

$context_dispo = stream_context_create($options_dispo);
$result_dispo = file_get_contents("http://localhost/reservation-api/disponibilites/create.php", false, $context_dispo);

echo "➤ Disponibilité : $result_dispo\n\n";

// ===========================
// 4️⃣ Vérifier si la salle est libre
// ===========================
$data_check = [
    "hotel_id"=>1,
    "date"=>"2026-03-16"
];

$options_check = [
    "http"=>[
        "header"=>"Content-Type: application/json",
        "method"=>"POST",
        "content"=>json_encode($data_check)
    ]
];

$context_check = stream_context_create($options_check);
$result_check = file_get_contents("http://localhost/reservation-api/disponibilites/check.php", false, $context_check);

echo "➤ Vérification disponibilité : $result_check\n\n";

?>