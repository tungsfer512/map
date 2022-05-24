<?php
// headers_list
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    include ($_SERVER["DOCUMENT_ROOT"]."/majestic/Dashboard/php/config/Database.php");
    include ($_SERVER["DOCUMENT_ROOT"]."/majestic/Dashboard/php/models/Post_vehicle.php");
    // instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // instantiate blog post object 
    $post  = new Post_vehicle($db);
    // Get id
    $post->id = $_GET['id'];
    $post->code = $_GET['code'];
    $post->typed= $_GET['typed'];
    $post->license= $_GET['license'];
    $post->imei = $_GET['imei'];
    $post->timestamps= $_GET['timestamps'];
    $post->latitude = $_GET['lat'];
    $post->longitude = $_GET['long'];
    $post->weights = $_GET['weights'];
    $post->addresses= $_GET['addresses'];
    $post->statuses = $_GET['status'];
    $post->update();

    // Create array
    $yn = array(
        'true'=>"true",
        "status" => $post->statuses
    );
    // echo json_encode($yn);
    // Make JSON
    // print_r(json_encode($post_arr));
