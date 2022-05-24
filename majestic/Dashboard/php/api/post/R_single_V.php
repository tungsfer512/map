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
    $post->id = isset($_GET['id']) ? $_GET['id']:die();
    // Get post data
    $post->read_single();

    // Create array
    $post_arr = array(
        // 'yes/no' => isset($_GET['id']),
        'id' => $post->id,
        'code' => $post->code,
        'typed' => $post->typed,
        'license' => $post->license,
        'imei' => $post->imei,
        'timestamps' => $post->timestamps,        
        'lat' => $post->latitude,
        'long' => $post->longitude,
        'weights' => $post->weights,
        'addresses' => $post->addresses,
        'images' => $post->images,
        'statuses' => $post->statuses,
    );
    // Make JSON
    print_r(json_encode($post_arr));
