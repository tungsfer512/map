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
    $result = $post->read();
    // Get row count
    $num = $result->rowCount();	
    // echo $num;
    if($num > 0) {
        $post_arr = array();   
        $posts_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $post_item = array(
                'vehicle_id' => $vehicle_id,
                'bin_id' => $bin_id,
                'bin_address'=> $bin_address,
                'driver_fullname' => $driver_fullname,
                'driver_id' => $driver_id
            );
            // push to 'data'
            array_push($posts_arr['data'],$post_item);
        }
        echo json_encode($posts_arr);
    }
    else {
        // No posts
        echo json_encode(
            array('message' => 'No posts found')
        );
    }