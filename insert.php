<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");

if(!isset($_SESSION["userid"])){
    echo "<script>
                window.location.href='Login';
                </script>";
}

if (isset($_POST["addCategory"])) {
    $name = $db_handle->checkValue($_POST['c_name']);

    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db_handle->insertQuery("INSERT INTO `category`(`c_name`,  `inserted_at`) VALUES ('$name','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Category';
                </script>";
}

if (isset($_POST["addStore"])) {
    $category_id = $db_handle->checkValue($_POST['category_id']);

    $s_name = $db_handle->checkValue($_POST['s_name']);

    $s_domain = $db_handle->checkValue($_POST['s_domain']);

    $meta_title = $db_handle->checkValue($_POST['meta_title']);

    $meta_description = $db_handle->checkValue($_POST['meta_description']);

    $meta_keyword = $db_handle->checkValue($_POST['meta_keyword']);

    $about = $db_handle->checkValue($_POST['about']);

    $annual = $db_handle->checkValue($_POST['annual']);

    $image='';

    if (!empty($_FILES['image']['name'])){
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber."_" . $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {
            move_uploaded_file($file_tmp, "../assets/images/store/" .$file_name);
            $image = "assets/images/store/" . $file_name;
        }
    }

    $inserted_at = date("Y-m-d H:i:s");


    $insert = $db_handle->insertQuery("INSERT INTO `store`(`category_id`, `s_domain`, `s_name`, `meta_title`, `meta_description`, `meta_keyword`, `image`, `about`, `annual`, `inserted_at`) VALUES ('$category_id','$s_domain','$s_name','$meta_title','$meta_description','$meta_keyword','$image','$about','$annual','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Store';
                </script>";
}

if (isset($_POST["addTrendingDeal"])) {

    $title = $db_handle->checkValue($_POST['title']);

    $subtitle = $db_handle->checkValue($_POST['subtitle']);

    $t_link = $db_handle->checkValue($_POST['t_link']);

    $image='';

    if (!empty($_FILES['image']['name'])){
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber."_" . $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {
            move_uploaded_file($file_tmp, "../assets/images/trendingdeal/" .$file_name);
            $image = "assets/images/trendingdeal/" . $file_name;
        }
    }

    $inserted_at = date("Y-m-d H:i:s");


    $insert = $db_handle->insertQuery("INSERT INTO `trending`(`title`, `subtitle`, `image`, `t_link`, `inserted_at`) VALUES('$title','$subtitle','$image','$t_link','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Trending-Deal';
                </script>";
}

if (isset($_POST["addOffer"])) {

    $category_id = $db_handle->checkValue($_POST['category_id']);

    $store_id = $db_handle->checkValue($_POST['store_id']);

    $title = $db_handle->checkValue($_POST['title']);

    $subtitle = $db_handle->checkValue($_POST['subtitle']);

    $o_link = $db_handle->checkValue($_POST['o_link']);

    $offer_text = $db_handle->checkValue($_POST['offer_text']);

    $image='';

    if (!empty($_FILES['image']['name'])){
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber."_" . $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {
            move_uploaded_file($file_tmp, "../assets/images/trendingdeal/" .$file_name);
            $image = "assets/images/trendingdeal/" . $file_name;
        }
    }

    $inserted_at = date("Y-m-d H:i:s");


    $insert = $db_handle->insertQuery("INSERT INTO `offer`(`store_id`, `category_id`, `title`, `subtitle`, `image`, `o_link`, `offer_text`, `inserted_at`) VALUES('$store_id','$category_id','$title','$subtitle','$image','$o_link','$offer_text','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Offer';
                </script>";
}

if (isset($_POST["addStoreOffer"])) {

    $category_id = $db_handle->checkValue($_POST['category_id']);

    $store_id = $db_handle->checkValue($_POST['store_id']);

    $offer_text= $db_handle->checkValue($_POST['offer_text']);

    $offer_submit_name = $db_handle->checkValue($_POST['offer_submit_name']);

    $title = $db_handle->checkValue($_POST['title']);

    $details = $db_handle->checkValue($_POST['details']);

    $code = $db_handle->checkValue($_POST['code']);


    $inserted_at = date("Y-m-d H:i:s");


    $insert = $db_handle->insertQuery("INSERT INTO `store_offer`(`category_id`, `store_id`, `offer_text`, `offer_submit_name`, `title`, `details`, `code`, `inserted_at`) VALUES('$category_id','$store_id','$offer_text','$offer_submit_name','$title','$details','$code','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Data-Add-Offer';
                </script>";
}

if (isset($_POST["addBlogCategory"])) {
    $name = $db_handle->checkValue($_POST['bc_name']);

    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db_handle->insertQuery("INSERT INTO `blog_category`(`bc_name`,  `inserted_at`) VALUES ('$name','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Blog-Category';
                </script>";
}

if (isset($_POST["addBlog"])) {
    $blog_cate_id = $db_handle->checkValue($_POST['blog_cate_id']);

    $title= $db_handle->checkValue($_POST['title']);

    $description = $db_handle->checkValue($_POST['description']);

    $image='';

    if (!empty($_FILES['image']['name'])){
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber."_" . $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {
            move_uploaded_file($file_tmp, "../assets/images/blog/" .$file_name);
            $image = "assets/images/blog/" . $file_name;
        }
    }

    $inserted_at = date("Y-m-d H:i:s");


    $insert = $db_handle->insertQuery("INSERT INTO `blog`(`blog_cate_id`, `title`, `description`, `image`, `inserted_at`) VALUES ('$blog_cate_id','$title','$description','$image','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Blog';
                </script>";
}
