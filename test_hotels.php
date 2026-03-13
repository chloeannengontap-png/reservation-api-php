<?php
include_once '../config/database.php';

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->hotel_id) && !empty($data->date)){

    $query = "SELECT * FROM disponibilites 
              WHERE hotel_id=:hotel_id 
              AND :date BETWEEN date_debut AND date_fin";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":hotel_id",$data->hotel_id);
    $stmt->bindParam(":date",$data->date);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        echo json_encode(["status"=>"taken","message"=>"Salle non disponible"]);
    }else{
        echo json_encode(["status"=>"available","message"=>"Salle libre"]);
    }

}else{
    echo json_encode(["status"=>"error","message"=>"Données manquantes"]);
}
?>