<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");

if (!isset($_SESSION["userid"])) {
    echo "<script>
                window.location.href='Login';
                </script>";
}

if (isset($_POST["depositUSDT"])) {
    $d_usdt = $db_handle->checkValue($_POST['d_usdt']);

    $usdt_price = $db_handle->checkValue($_POST['usdt_price']);

    $cny_price = $db_handle->checkValue($_POST['cny_price']);

    $days = $db_handle->checkValue($_POST['staking_days']);

    $w_usdt = $d_usdt;

    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db_handle->insertQuery("INSERT INTO `deposit_usdt`(`d_usdt`, `w_usdt`, `usdt_price`,`cny_price`, `days`, `inserted_at`) VALUES ('$d_usdt','$w_usdt','$usdt_price','$cny_price','$days','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Staking-USDT';
                </script>";
}
