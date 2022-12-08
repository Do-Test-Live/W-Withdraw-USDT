<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();

if (!isset($_SESSION["userid"])) {
    echo "<script>
                window.location.href='Login';
                </script>";
}

if (isset($_GET['catId'])) {
    $row = $db_handle->numRows("select * FROM `store` WHERE category_id='{$_GET['catId']}'");

    if ($row == 0) {
        $db_handle->insertQuery("delete from category where id=" . $_GET['catId'] . "");
        echo 'success';
    } else {
        echo 'P';
    }
}

if (isset($_GET['storeId'])) {
    $row = $db_handle->numRows("select * FROM `offer` WHERE store_id='{$_GET['storeId']}'");

    $row += $db_handle->numRows("select * FROM `rating` WHERE store_id='{$_GET['storeId']}'");

    $row += $db_handle->numRows("select * FROM `store_offer` WHERE store_id='{$_GET['storeId']}'");

    if ($row == 0) {
        $data = $db_handle->runQuery("select * FROM `store` WHERE id='{$_GET['storeId']}'");
        unlink('../'.$data[0]['image']);

        $db_handle->insertQuery("delete from store where id=" . $_GET['storeId'] . "");
        echo 'success';
    } else {
        echo 'P';
    }
}

if (isset($_GET['ratingId'])) {
    $db_handle->insertQuery("delete from rating where id=" . $_GET['ratingId'] . "");
    echo 'success';
}

if (isset($_GET['trendingDealId'])) {
    $data = $db_handle->runQuery("select * FROM `trending` WHERE id='{$_GET['trendingDealId']}'");
    unlink('../'.$data[0]['image']);

    $db_handle->insertQuery("delete from trending where id=" . $_GET['trendingDealId'] . "");
    echo 'success';
}

if (isset($_GET['offerId'])) {
    $data = $db_handle->runQuery("select * FROM `offer` WHERE id='{$_GET['offerId']}'");
    unlink('../'.$data[0]['image']);

    $db_handle->insertQuery("delete from offer where id=" . $_GET['offerId'] . "");
    echo 'success';
}

if (isset($_GET['storeOfferId'])) {
    $db_handle->insertQuery("delete from store_offer where id=" . $_GET['storeOfferId'] . "");
    echo 'success';
}

if (isset($_GET['blogCategoryId'])) {
    $row = $db_handle->numRows("select * FROM `blog` WHERE blog_cate_id='{$_GET['blogCategoryId']}'");

    if ($row == 0) {
        $db_handle->insertQuery("delete from blog_category where id=" . $_GET['blogCategoryId'] . "");
        echo 'success';
    } else {
        echo 'P';
    }
}

if (isset($_GET['blogId'])) {
    $data = $db_handle->runQuery("select * FROM `blog` WHERE id='{$_GET['blogId']}'");
    unlink('../'.$data[0]['image']);

    $db_handle->insertQuery("delete from blog where id=" . $_GET['blogId'] . "");
    echo 'success';
}

if (isset($_GET['newsletterId'])) {
    $db_handle->insertQuery("delete from newsletter where id=" . $_GET['newsletterId'] . "");
    echo 'success';
}

