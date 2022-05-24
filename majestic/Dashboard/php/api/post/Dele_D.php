<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    include ($_SERVER["DOCUMENT_ROOT"]."/majestic/Dashboard/php/config/Database.php");
    include ($_SERVER["DOCUMENT_ROOT"]."/majestic/Dashboard/php/models/Post_driver.php");
    // instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // instantiate blog post object 
    $post  = new Post_driver($db);
    // Get id
    $post->id = $_GET['id'];

    $post->delete();
    // Create array
    $yn = array(
        'true'=>"true"
    );
    echo json_encode($yn);
