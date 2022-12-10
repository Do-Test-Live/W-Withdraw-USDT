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
    $d_usdt = (double)$db_handle->checkValue($_POST['d_usdt']);

    $days = $db_handle->checkValue($_POST['staking_days']);

    $w_usdt = $d_usdt;

    if ($days >= 7) {
        $w_usdt = ((8 / 10000) * $days) + $d_usdt;
    }

    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db_handle->insertQuery("INSERT INTO `deposit_usdt`(`d_usdt`, `w_usdt`, `days`, `inserted_at`) VALUES ('$d_usdt','$w_usdt','$days','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Deposit-USDT';
                </script>";
}
