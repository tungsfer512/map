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

    $post->delete();
    // Create array
    $yn = array(
        'true'=>"true"
    );
    echo json_encode($yn);
    // Make JSON
    // print_r(json_encode($post_arr));
