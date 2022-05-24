<?php
// headers_list
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
    $post->id = isset($_GET['id']) ? $_GET['id']:die();
    // Get post data
    $post->read_single();

    // Create array
    $post_arr = array(
        // 'yes/no' => isset($_GET['id']),
        'id' => $post->id,
        'fullname' => $post->fullname,
        'addresses' => $post->addresses,
        'phone' => $post->phone,
        'gender' => $post->gender,
        'birth' => $post->birth,        
        'images' => $post->images,
        'statuses' => $post->statuses,
    );
    // Make JSON
    print_r(json_encode($post_arr));
