<?php
// headers_list
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
include $_SERVER["DOCUMENT_ROOT"] . "/majestic/Dashboard/php/config/Database.php";
include $_SERVER["DOCUMENT_ROOT"] . "/majestic/Dashboard/php/models/Post_acc.php";

$database = new Database();
$db = $database->connect();
$post = new Post_acc($db);
$array_item = array(
    'id' => $post->id,
    'username' => $post->username,
    'password' => $post->password,
    'fullname' => $post->fullname
);
echo json_encode($array_item);
?>
