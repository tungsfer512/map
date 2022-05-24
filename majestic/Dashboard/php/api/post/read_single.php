<?php
// headers_list
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    include ($_SERVER["DOCUMENT_ROOT"]."/majestic/Dashboard/php/config/Database.php");
    include ($_SERVER["DOCUMENT_ROOT"]."/majestic/Dashboard/php/models/Post.php");
    // instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // instantiate blog post object 
    $post  = new Post($db);
    // Get id
    $post->vehicle_id = isset($_GET['vehicle_id']) ? $_GET['vehicle_id']:die();
    // Get post data
    $post->read_single();

    // Create array
    $post_arr = array(
        'yes/no' => isset($_GET['vehicle_id']),
        'vehicle_id' => $post->vehicle_id,
        'bin_id' => $post->bin_id,
        'bin_address' => $post->bin_address,
        'driver_fullname' => $post->driver_fullname,
        'driver_id' => $post->driver_id
    );
    // Make JSON
    print_r(json_encode($post_arr));
