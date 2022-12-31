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
    $client_id = $db_handle->checkValue($_POST['client_ID']);

    $conversion_rate = $db_handle->checkValue($_POST['conversion_rate']);

    $input_method = $db_handle->checkValue($_POST['input_method']);

    $account_number = $db_handle->checkValue($_POST['account_number']);

    $bank_name = $db_handle->checkValue($_POST['bank_name']);

    $bank_holder = $db_handle->checkValue($_POST['bank_holder']);

    $amount = $db_handle->checkValue($_POST['amount']);

    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db_handle->insertQuery("INSERT INTO `deposit_cny`(`client_id`, `conversion_rate`, `input_method`, `account_number`, `bank_name`, `bank_holder`, `amount`,  `inserted_at`) VALUES ('$client_id','$conversion_rate','$input_method','$account_number','$bank_name','$bank_holder','$amount','$inserted_at')");

    $insert = $db_handle->insertQuery("INSERT INTO `balance`( `client_id`, `balance`, `conversion_rate`, `balance_type`, `inserted_at`) VALUES ('$client_id','$amount','$conversion_rate','Deposit','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Client';
                </script>";
}

if (isset($_POST["addClient"])) {
    $client_name = $db_handle->checkValue($_POST['client_name']);

    $phone= $db_handle->checkValue($_POST['phone']);

    $transferee='';

    $transferee_1 = $db_handle->checkValue($_POST['transferee_1']);

    $transferee_2 = $db_handle->checkValue($_POST['transferee_2']);

    $transferee_3 = $db_handle->checkValue($_POST['transferee_3']);

    if($transferee_1!=''){
        $transferee.=$transferee_1.', ';
    }

    if($transferee_2!=''){
        $transferee.=$transferee_2.', ';
    }

    if($transferee_3!=''){
        $transferee.=$transferee_3.', ';
    }

    $inserted_at = date("Y-m-d H:i:s");


    $insert = $db_handle->insertQuery("INSERT INTO `client`(`client_name`, `phone`, `trasferee`, `inserted_at`) VALUES ('$client_name','$phone','$transferee','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Client';
                </script>";
}

if (isset($_POST["stakeCNY"])) {
    $client_id = $db_handle->checkValue($_POST['clientID']);

    $staking_days = $db_handle->checkValue($_POST['staking_days']);

    $cny_data = $db_handle->runQuery("SELECT sum(balance) as user_balance, conversion_rate FROM balance where client_id='$client_id' and balance_type='Deposit'");

    $available_amount=(double) $cny_data[0]["user_balance"];

    $conversion_rate = $db_handle->checkValue($_POST['conversion_rate']);

    $cny_data = $db_handle->runQuery("SELECT sum(balance) as user_balance, conversion_rate FROM balance where client_id='$client_id' and balance_type='Withdraw'");

    $available_amount-=(double) $cny_data[0]["user_balance"];

    $cny_data = $db_handle->runQuery("SELECT sum(balance) as user_balance, conversion_rate FROM balance where client_id='$client_id' and balance_type='Stake'");

    $available_amount-=(double) $cny_data[0]["user_balance"];


    $amount = (double) $db_handle->checkValue($_POST['amount']);

    $start_time = $db_handle->checkValue($_POST['start_time']);

    $inserted_at = date("Y-m-d H:i:s");

    if($amount<=$available_amount){
        $insert = $db_handle->insertQuery("INSERT INTO `stake`( `client_id`, `conversion_rate`, `amount`, `staking_days`, `inserted_at`) VALUES ('$client_id','$conversion_rate','$amount','$staking_days','$start_time')");

        $insert = $db_handle->insertQuery("INSERT INTO `balance`( `client_id`, `balance`, `conversion_rate`, `balance_type`, `inserted_at`) VALUES ('$client_id','$amount','$conversion_rate','Stake','$inserted_at')");

        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Stake-CNY';
                </script>";
    }else{
        echo "<script>
                alert('Stake amount not more than available amount');
                window.location.href='Stake-CNY';
                </script>";
    }


}

