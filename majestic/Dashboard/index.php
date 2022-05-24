<?php
session_start();
if (isset($_POST["btn-submit"])) {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    include($_SERVER["DOCUMENT_ROOT"] . "/majestic/Dashboard/php/config/Database.php");
    include($_SERVER["DOCUMENT_ROOT"] . "/majestic/Dashboard/php/models/Post_acc.php");
    // instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // instantiate blog post object 
    $post  = new Post_acc($db);
    $post->username = $_POST['username'];
    $post->password = $_POST['password'];
    // SQL injection
    // $username = strip_tags($username);
    // $username = addslashes($username);
    // $password = strip_tags($password);
    // $password = addslashes($password);

    $post->read_single();
    if ($post->id != null) {
        $post_item = array(
            'id' => $post->id,
            'username' => $post->username,
            'password' => $post->password,
            'fullname' => $post->fullname,
        );
        $_SESSION['username'] = $post->username;
        $_SESSION['fullname'] = $post->fullname;
        header('Location: dashboard.php');
        // echo("<script>location.href = '/majestic/Dashboard/dashboard.php';</script>");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <title>Map - Đăng nhập hoặc đăng ký</title>
    <!-- css  --------------------------------------------------------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hubballi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style-for-login.css">
</head>

<body>

    <div class="box-parent">
        <div class="box-left">
            <div class="box-logo">
                <img src="images/logo-ua.png" alt="">
            </div>
            <div class="box-introduce">
                <span>Hãy đổ rác đúng nơi qui định.</span>
            </div>
        </div>
        <form id="form-full" action="index.php" method='POST'>
            <div class="box-input-infomation box-right">
                <div class="form-group">
                    <input type="text" placeholder="Username" id="username" name="username">
                    <span class="form-message"></span>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" id="password" name="password">
                    <span class="form-message"></span>
                </div>

                <input type="text" name="id" id="id" placeholder="id" style="display:none">
                <input type="text" name="fullname" id="fullname" placeholder="fullname" style="display:none">

                <button class="login" id="login" name="btn-submit" type="submit">Đăng nhập</button>
                <a href="#">Quên mật khẩu?</a>
                <div class="line"></div>
                <button class="Sign-up" id="Sign-up">Tạo tài khoản mới</button>
            </div>
        </form>

    </div>


    <!-- script---------------- -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--<script src="js/getData-login.js"></script>-->
    <!-- <script src="js/validator.js"></script> -->
    <script>
        // $("#login").click( () => {
        //     console.log("true");
        // });
        //  Validator({
        //     form: "#form-full",
        //     errorSelector:".form-message",
        //     rules: [
        //         Validator.isUsernameRequired('#username'),
        //         Validator.isPasswordRequired('#password')
        //     ]
        // });
    </script>
</body>

</html>