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
    $post->id = isset($_GET['id']) ? $_GET['id']:die();
    // Get post data
    $post->read_single();

    // Create array
    $post_arr = array(
        // 'yes/no' => isset($_GET['id']),
        'id' => $post->id,
        'createddate' => $post->createddate,
        'owners' => $post->owners,
        'names' => $post->names,
        'weights' => $post->weights,
        'height' => $post->height,
        'lat' => $post->latitude,
        'long' => $post->longitude,
        'statuses' => $post->statuses,
        'addresses' => $post->addresses,
    );
    // Make JSON
    print_r(json_encode($post_arr));
