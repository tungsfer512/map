<?php
// headers_list
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
include $_SERVER["DOCUMENT_ROOT"] . "/majestic/Dashboard/php/config/Database.php";
include $_SERVER["DOCUMENT_ROOT"] . "/majestic/Dashboard/php/models/Post_bin.php";
// instantiate DB & connect
$database = new Database();
$db = $database->connect();
// instantiate blog post object
$post = new Post_bin($db);

$post->id = $_POST['id'];
$post->createddate = $_POST['date'];
$post->owners = $_POST['owners'];
$post->names = $_POST['name'];
$post->weights = $_POST['weight'];
$post->height = $_POST['height'];
$post->latitude = $_POST['lat'];
$post->longitude = $_POST['long'];
$post->addresses = $_POST['address'];
$post->statuses = $_POST['status'];
// $post->create();
// Create array
$query = "INSERT INTO `bin` (ID, CREATEDDATE, OWNERS, NAMES, WEIGHTS,HEIGHT, LATITUDE, LONGITUDE, ADDRESSES, STATUSES) 
VALUES ('$post->id', '$post->createddate', '$post->owners', '$post->names', $post->weights,$post->height,$post->latitude, $post->longitude, '$post->addresses', '$post->statuses')";

$stmt = $db->prepare($query);
$stmt->execute();
$yn = array(
    'true' => "true",
);
echo json_encode($yn);
