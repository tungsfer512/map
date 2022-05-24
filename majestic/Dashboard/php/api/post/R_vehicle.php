<?php
// headers_list
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
include $_SERVER["DOCUMENT_ROOT"]."/majestic/Dashboard/php/config/Database.php";
include $_SERVER["DOCUMENT_ROOT"]."/majestic/Dashboard/php/models/Post_vehicle.php";
// instantiate DB & connect
$database = new Database();
$db = $database->connect();
// instantiate blog post object
$post = new Post_vehicle($db);
$result = $post->read();
// Get row count
$num = $result->rowCount();
// echo $num;
if ($num > 0) {
    $post_arr = array();
    $posts_arr['data'] = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $post_item = array(
            'id' => $id,
            'code' => $code,
            'license' => $license,
            'typed' => $typed,
            'addresses' => $addresses,
            'statuses' => $statuses,
            'lat' => $latitude,
            'long' => $longitude,
            'images' => $images
        );
        // push to 'data'
        array_push($posts_arr['data'], $post_item);
    }
    echo json_encode($posts_arr);
} else {
    // No posts
    echo json_encode(
        array('message' => 'No posts found')
    );
}
