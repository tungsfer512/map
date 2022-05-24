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
    

    // $upload_location = "uploads/";
    // echo $_POST['id'];
    // $filename = $_FILES['files']['name'][0];
    
    // $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    // $valid_ext = array("png","jpeg","jpg");
    // if(in_array($ext, $valid_ext)){
        // File path
        // $path = $upload_location.$filename;
        // move_uploaded_file($_FILES['files']['tmp_name'][0],$path);
        // $post->images = $path;

        $post->id = $_POST['id'];
        $post->code = $_POST['code'];
        $post->typed= $_POST['typed'];
        $post->license= $_POST['license'];
        $post->imei = $_POST['imei'];
        // $post->timestamps= $_POST['timestamps'];
        $post->latitude = $_POST['lat'];
        $post->longitude = $_POST['long'];
        $post->weights = $_POST['weights'];
        $post->addresses= $_POST['addresses'];
        $post->statuses = $_POST['status'];
        // $post->create();
        // Create array
        $query="INSERT INTO `vehicle` (ID, CODE, TYPED, LICENSE, IMEI, LATITUDE, LONGITUDE, WEIGHTS, ADDRESSES, STATUSES) VALUES ('$post->id', '$post->code', '$post->typed', '$post->license', '$post->imei',$post->latitude, $post->longitude, $post->weights, '$post->addresses', '$post->statuses')";
        
        $stmt=$db->prepare($query);
        $stmt->execute();
        $yn = array(
            'true'=>"true"
        );
        echo json_encode($yn);
    // }
    

    
    // Make JSON
    // print_r(json_encode($post_arr));

?>