<?php
// headers_list
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
include $_SERVER["DOCUMENT_ROOT"] . "/majestic/Dashboard/php/config/Database.php";
include $_SERVER["DOCUMENT_ROOT"] . "/majestic/Dashboard/php/models/Post_acc.php";

$database = new Database();
$db = $database->connect();
$post = new Post_acc($db);
$post->id = $_POST['id'];
$post->username = $_POST['username'];
$post->password = $_POST['password'];
$post->fullname = $_POST['fullname'];
?>
