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
    $post->id = $_GET['id'];
    $post->fullname = $_GET['fullname'];
    $post->addresses = $_GET['address'];
    $post->phone = $_GET['phone'];
    $post->gender = $_GET['gender'];
    $post->birth = $_GET['birth'];
    // $post->images = $_GET['images'];
    $post->statuses = $_GET['status'];

    $post->update();

    // Create array
    $yn = array(
        'true'=>"true"
    );
    echo json_encode($yn);
