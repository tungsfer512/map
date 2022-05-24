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
    $upload_location = "uploads/";

    $filename = $_FILES['files']['name'][0];
    
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $valid_ext = array("png","jpeg","jpg");
    if(in_array($ext, $valid_ext)){
        // File path
        $path = $upload_location.$filename;
        move_uploaded_file($_FILES['files']['tmp_name'][0],$path);
        $post->images = $filename;
        $post->id = $_POST['id'];
        $post->update_img();
    }
    // Create array
    $yn = array(
        'true'=>"true"
    );
    echo json_encode($yn);
?>