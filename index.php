<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
if (isset($_POST["submit"])) {
    $email = $db_handle->checkValue($_POST['email']);
    $password = $db_handle->checkValue($_POST['password']);

    $login = $db_handle->numRows("SELECT * FROM admin_login WHERE email='$email' and password='$password'");

    $login_data = $db_handle->runQuery("SELECT * FROM admin_login WHERE email='$email' and password='$password'");

    if($login==1){
        $_SESSION['userid']=$login_data[0]["id"];

        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Dashboard';
                </script>";
    }else{
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Login';
                </script>";
    }
}

if(isset($_SESSION["userid"])){
    echo "<script>
                window.location.href='Dashboard';
                </script>";
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
    <meta name="author" content=""/>
    <meta name="robots" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="USDT"/>
    <meta property="og:title" content="USDT"/>
    <meta property="og:description" content="USDT"/>
	<meta property="og:image" content="social-image.png" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
    <title>Login | USDT</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="public/images/favicon.png" />
    <link href="public/css/style.css" rel="stylesheet">
    <link href="public/vendor/toastr/css/toastr.min.css" rel="stylesheet" type="text/css"/>
    <style>
        .toast-success {
            background-color: #5fb46e;
        }

        .toast-error {
            background-color: #b50000;
        }
    </style>

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
                                        <h1>USDT</h1>
									</div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form action="Login" method="post">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control" name="email" placeholder="hello@example.com">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block" name="submit">Sign Me In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="public/vendor/global/global.min.js"></script>
    <script src="public/js/custom.min.js"></script>
    <script src="public/js/dlabnav-init.js"></script>
	<script src="public/js/styleSwitcher.js"></script>
    <script src="public/vendor/toastr/js/toastr.min.js" type="text/javascript"></script>
    <script src="public/js/plugins-init/toastr-init.js" type="text/javascript"></script>
</body>
</html>
