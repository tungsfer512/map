<?php
// headers_list
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
include($_SERVER["DOCUMENT_ROOT"] . "/majestic/Dashboard/php/config/Database.php");
include($_SERVER["DOCUMENT_ROOT"] . "/majestic/Dashboard/php/models/Post_acc.php");
// instantiate DB & connect
$database = new Database();
$db = $database->connect();
// instantiate blog post object 
$post  = new Post_acc($db);
$post->username = $_GET['username'];
$post->password = $_GET['password'];
$post->read_single();
// Get row count
// $num = $result->rowCount();
// echo $num;
// if ($num > 0) {
    // $post_arr = array();
    // $posts_arr['data'] = array();
    // while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // extract($row);
        $post_item = array(
            'id' => $post->id,
            'username' => $post->username,
            'password' => $post->password,
            'fullname' => $post->fullname,
        );
        // push to 'data'
        // array_push($posts_arr['data'], $post_item);
    // }
    echo json_encode($post_item);
// } else {/
    // No posts
    // echo json_encode(
        // array('message' => 'No posts found')
    // );
// }
?>