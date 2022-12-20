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

if (isset($_POST["depositCNY"])) {
    $client_name = $db_handle->checkValue($_POST['client_name']);

    $conversion_rate = $db_handle->checkValue($_POST['conversion_rate']);

    $input_method = $db_handle->checkValue($_POST['input_method']);

    $account_number = $db_handle->checkValue($_POST['account_number']);

    $bank_name = $db_handle->checkValue($_POST['bank_name']);

    $bank_holder = $db_handle->checkValue($_POST['bank_holder']);

    $amount = $db_handle->checkValue($_POST['amount']);

    $w_amount = $amount;

    $staking_days = $db_handle->checkValue($_POST['staking_days']);

    $transfer_fee = $db_handle->checkValue($_POST['transfer_fee']);

    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db_handle->insertQuery("INSERT INTO `deposit_cny`(`client_name`, `conversion_rate`, `input_method`, `account_number`, `bank_name`, `bank_holder`, `amount`, `w_amount`, `staking_days`,`transfer_fee`, `inserted_at`) VALUES ('$client_name','$conversion_rate','$input_method','$account_number','$bank_name','$bank_holder','$amount','$w_amount','$staking_days','$transfer_fee','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Staking-USDT';
                </script>";
}
