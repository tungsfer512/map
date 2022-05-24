<?php
// headers_list
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    include ($_SERVER["DOCUMENT_ROOT"]."/majestic/Dashboard/php/config/Database.php");
    include ($_SERVER["DOCUMENT_ROOT"]."/majestic/Dashboard/php/models/Post_vehicle.php");
    $database = new Database();
    $db = $database->connect();
    $post = new Post_vehicle($db);
    
    $id = $_GET["id"];
    $lat = $_GET["lat"];
    $long = $_GET["long"];
    $post->id = $id;
    $post->latitude = $lat;
    $post->longitude = $long;

    $post->updateService();
    $item = array('yes' => "ok");
    echo json_encode($item);