<?php
// headers_list
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    include ($_SERVER["DOCUMENT_ROOT"]."/majestic/Dashboard/php/config/Database.php");
    include ($_SERVER["DOCUMENT_ROOT"]."/majestic/Dashboard/php/models/Post_bin.php");
    // instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // instantiate blog post object 
    $post  = new Post_bin($db);
    // Get id
    $post->id = $_GET['id'];
    $post->createddate = $_GET['date'];
    $post->owners= $_GET['owners'];
    $post->names = $_GET['names'];
    $post->weights = $_GET['weight'];
    $post->height = $_GET['height'];
    $post->latitude = $_GET['lat'];
    $post->longitude = $_GET['long'];
    $post->statuses = $_GET['statuses'];
    $post->addresses= $_GET['address'];

    $post->update();

    // Create array
    $yn = array(
        'true'=>"true"
    );
    echo json_encode($yn);
    // Make JSON
    // print_r(json_encode($post_arr));
