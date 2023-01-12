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

    $proof_image = '';
    if (!empty($_FILES['proof_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);

        $file_name = $RandomAccountNumber . "_" . $_FILES['proof_image']['name'];
        $file_size = $_FILES['proof_image']['size'];
        $file_tmp = $_FILES['proof_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $proof_image = '';
        } else {
            move_uploaded_file($file_tmp, "assets/images/proof/" . $file_name);
            $proof_image = "assets/images/proof/" . $file_name;
        }

    } else {
        $proof_image = '';
    }

    $insert = $db_handle->insertQuery("INSERT INTO `deposit_cny`(`client_id`, `conversion_rate`, `input_method`, `account_number`, `bank_name`, `bank_holder`, `amount`, `proof_image`,  `inserted_at`) VALUES ('$client_id','$conversion_rate','$input_method','$account_number','$bank_name','$bank_holder','$amount','$proof_image','$inserted_at')");

    $insert = $db_handle->insertQuery("INSERT INTO `balance`( `client_id`, `balance`, `conversion_rate`, `balance_type`, `inserted_at`) VALUES ('$client_id','$amount','$conversion_rate','Deposit','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Client';
                </script>";
}

if (isset($_POST["addClient"])) {
    $client_name = $db_handle->checkValue($_POST['client_name']);

    $phone = $db_handle->checkValue($_POST['phone']);

    $transferee = $db_handle->checkValue($_POST['transferee_1']);


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

    $cny_data = $db_handle->runQuery("SELECT * FROM balance where client_id='$client_id'");
    $conversion_rate = $db_handle->checkValue($cny_data[0]['conversion_rate']);

    $available_amount = (double)$db_handle->checkValue($_POST['available_balance']);

    $amount = (double)$db_handle->checkValue($_POST['amount']);


    $inserted_at = date("Y-m-d H:i:s");

    if ($amount <= $available_amount) {
        $insert = $db_handle->insertQuery("INSERT INTO `stake`( `client_id`, `conversion_rate`, `amount`, `staking_days`, `inserted_at`) VALUES ('$client_id','$conversion_rate','$amount','$staking_days','$inserted_at')");

        $insert = $db_handle->insertQuery("INSERT INTO `balance`( `client_id`, `balance`, `conversion_rate`, `balance_type`, `inserted_at`) VALUES ('$client_id','$amount','$conversion_rate','Stake','$inserted_at')");

        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Stake-CNY';
                </script>";
    } else {
        echo "<script>
                alert('Stake amount not more than available amount');
                window.location.href='Stake-CNY';
                </script>";
    }
}

if (isset($_POST["withdrawCNY"])) {
    $client_id = $db_handle->checkValue($_POST['client_id']);
    $amount = (double)$db_handle->checkValue($_POST['amount']);

    $cny_data = $db_handle->runQuery("SELECT sum(balance) as user_balance, conversion_rate FROM balance where client_id='$client_id' and balance_type='Deposit'");
    $conversion_rate = $cny_data[0]['conversion_rate'];

    $available_amount = (double)$cny_data[0]["user_balance"];

    $cny_data = $db_handle->runQuery("SELECT sum(balance) as user_balance, conversion_rate FROM balance where client_id='$client_id' and balance_type='Withdraw'");

    $available_amount -= (double)$cny_data[0]["user_balance"];

    $cny_data = $db_handle->runQuery("SELECT sum(balance) as user_balance, conversion_rate FROM balance where client_id='$client_id' and balance_type='Stake'");

    $available_amount -= (double)$cny_data[0]["user_balance"];


    $inserted_at = date("Y-m-d H:i:s");

    $proof_image = '';
    if (!empty($_FILES['proof_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);

        $file_name = $RandomAccountNumber . "_" . $_FILES['proof_image']['name'];
        $file_size = $_FILES['proof_image']['size'];
        $file_tmp = $_FILES['proof_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $proof_image = '';
        } else {
            move_uploaded_file($file_tmp, "assets/images/proof/" . $file_name);
            $proof_image = "assets/images/proof/" . $file_name;
        }

    } else {
        $proof_image = '';
    }


    if ($amount <= $available_amount) {
        $insert = $db_handle->insertQuery("INSERT INTO `withdraw`(`client_id`, `proof`,`conversion_rate`, `amount`, `inserted_at`) VALUES ('$client_id','$proof_image','$conversion_rate','$amount','$inserted_at')");

        $insert = $db_handle->insertQuery("INSERT INTO `balance`( `client_id`, `balance`, `conversion_rate`, `balance_type`, `inserted_at`) VALUES ('$client_id','$amount','$conversion_rate','Withdraw','$inserted_at')");

        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Client';
                </script>";
    } else {
        echo "<script>
                alert('Withdraw amount not more than available amount');

                </script>";
    }
}

if (isset($_GET["withdrawStakeID"])) {
    $cny_data = $db_handle->runQuery("SELECT * FROM stake as s, client as c where s.client_id=c.id and s.id={$_GET["withdrawStakeID"]}");


    $d_usdt = $cny_data[0]["amount"];
    $w_usdt = $cny_data[0]["amount"];
    $days = 0;


    $today = date("Y-m-d H:i:s");

    $earlier = new DateTime($today);
    $later = new DateTime($cny_data[0]["inserted_at"]);

    $days = $later->diff($earlier)->format("%a"); //3

    if ($days >= 7) {
        $w_usdt = ((8 / 10000) * $days) + (double)$d_usdt;
    }

    $startTime = strtotime($cny_data[0]["inserted_at"] . ' + ' . $cny_data[0]["staking_days"] . ' days');
    $endTime = strtotime($today);

    $amount = round(($w_usdt * $cny_data[0]["conversion_rate"]), 4);
    $conversion_rate = $cny_data[0]["conversion_rate"];
    $client_id = $cny_data[0]["client_id"];
    $inserted_at = date("Y-m-d H:i:s");
    if ($endTime >= $startTime) {
        $delete = $db_handle->insertQuery("delete from stake where id='{$_GET["depositStakeID"]}'");

        $insert = $db_handle->insertQuery("INSERT INTO `balance`( `client_id`, `balance`, `conversion_rate`, `balance_type`, `inserted_at`) VALUES ('$client_id','$amount','$conversion_rate','Withdraw','$inserted_at')");

        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Stake-CNY';
                </script>";
    } else {
        echo "<script>
                document.cookie = 'alert = 7;';
                window.location.href='Stake-CNY';
                </script>";
    }

}

if (isset($_GET["depositStakeID"])) {
    $cny_data = $db_handle->runQuery("SELECT * FROM stake as s, client as c where s.client_id=c.id and s.id={$_GET["depositStakeID"]}");


    $d_usdt = $cny_data[0]["amount"];
    $w_usdt = $cny_data[0]["amount"];
    $days = 0;


    $today = date("Y-m-d H:i:s");

    $earlier = new DateTime($today);
    $later = new DateTime($cny_data[0]["inserted_at"]);

    $days = $later->diff($earlier)->format("%a"); //3

    if ($days >= 7) {
        $w_usdt = ((8 / 10000) * $days) + (double)$d_usdt;
    }

    $startTime = strtotime($cny_data[0]["inserted_at"] . ' + ' . $cny_data[0]["staking_days"] . ' days');
    $endTime = strtotime($today);

    $amount = round(($w_usdt * $cny_data[0]["conversion_rate"]), 4);
    $conversion_rate = $cny_data[0]["conversion_rate"];
    $client_id = $cny_data[0]["client_id"];
    $inserted_at = date("Y-m-d H:i:s");

    if ($endTime >= $startTime) {

        $delete = $db_handle->insertQuery("delete from stake where id='{$_GET["depositStakeID"]}'");

        $insert = $db_handle->insertQuery("INSERT INTO `balance`( `client_id`, `balance`, `conversion_rate`, `balance_type`, `inserted_at`) VALUES ('$client_id','$amount','$conversion_rate','Deposit','$inserted_at')");

        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Stake-CNY&days=$days';
                </script>";
    } else {
        echo "<script>
                document.cookie = 'alert = 7;';
                window.location.href='Stake-CNY';
                </script>";
    }

}

