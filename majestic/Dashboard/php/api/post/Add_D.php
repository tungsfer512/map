<?php
// headers_list
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
include $_SERVER["DOCUMENT_ROOT"] . "/majestic/Dashboard/php/config/Database.php";
include $_SERVER["DOCUMENT_ROOT"] . "/majestic/Dashboard/php/models/Post_driver.php";
// instantiate DB & connect
$database = new Database();
$db = $database->connect();
// instantiate blog post object
$post = new Post_driver($db);

$post->id = $_POST['id'];
$post->fullname = $_POST['fullname'];
$post->addresses = $_POST['address'];
$post->phone = $_POST['phone'];
$post->gender = $_POST['gender'];
$post->birth = $_POST['birth'];
$post->statuses = $_POST['status'];
$query = "INSERT INTO `driver` (ID, FULLNAME, ADDRESSES, PHONE, GENDER, BIRTH, STATUSES) VALUES ('$post->id', '$post->fullname', '$post->addresses', '$post->phone', '$post->gender','$post->birth', '$post->statuses')";

$stmt = $db->prepare($query);
$stmt->execute();
$yn = array(
    'true' => "true",
);
echo json_encode($yn);
// }

// Make JSON
// print_r(json_encode($post_arr));
