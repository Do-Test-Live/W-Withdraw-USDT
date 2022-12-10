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

if (isset($_POST['updateUSDT'])) {
    $id = $db_handle->checkValue($_POST['id']);

    $d_usdt = $db_handle->checkValue($_POST['d_usdt']);

    $days = $db_handle->checkValue($_POST['staking_days']);

    $w_usdt = $d_usdt;

    if ($days >= 7) {
        $w_usdt = ((8 / 10000) * $days) + (double)$d_usdt;
    }

    $status = $db_handle->checkValue($_POST['status']);

    $update = $db_handle->insertQuery("update deposit_usdt set d_usdt='$d_usdt',w_usdt='$w_usdt',days='$days', status='$status' where id='{$id}'");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Staking-USDT';
                </script>";

}

if (isset($_GET['withdrawId'])) {
    $id = $db_handle->checkValue($_GET['withdrawId']);

    $today = date("Y-m-d");

    $inserted_at = date("Y-m-d H:i:s");

    $row = $db_handle->numRows("SELECT * FROM withdraw_usdt where date='$today'");

    if ($row > 0) {
        $usdt_data = $db_handle->runQuery("SELECT sum(amount) as withdraw_amount FROM withdraw_usdt where date='$today'");
        $amount = $usdt_data[0]['withdraw_amount'];

        if ($amount <= 3000000) {
            $update = $db_handle->insertQuery("update withdraw_usdt set amount= amount+'$amount' where date='$today'");

            $update_deposit = $db_handle->insertQuery("update deposit_usdt set status= 'Withdraw' where id='{$id}'");

            echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Staking-USDT';
                </script>";
        } else {
            echo "<script>
                document.cookie = 'alert = 4;';
                window.location.href='Staking-USDT';
                </script>";
        }
    } else {
        $usdt_data = $db_handle->runQuery("SELECT * FROM deposit_usdt where id='{$id}'");
        $amount = $usdt_data[0]['w_usdt'];

        if ($amount <= 3000000) {
            $update = $db_handle->insertQuery("INSERT INTO `withdraw_usdt`(`date`, `amount`, `inserted_at`) VALUES ('$today','$amount','$inserted_at')");

            $update_deposit = $db_handle->insertQuery("update deposit_usdt set status= 'Withdraw' where id='{$id}'");

            echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Staking-USDT';
                </script>";
        } else {
            echo "<script>
                document.cookie = 'alert = 4;';
                window.location.href='Staking-USDT';
                </script>";
        }
    }
}

if (isset($_POST['updatePassword'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $old_pwd = $db_handle->checkValue($_POST['old_pwd']);
    $new_pwd = $db_handle->checkValue($_POST['new_pwd']);
    $cnfrm_pwd = $db_handle->checkValue($_POST['cnfrm_pwd']);

    $row = $db_handle->numRows("select * FROM `admin_login` WHERE id='{$id}' and password='$old_pwd'");
    if ($row > 0) {
        if ($new_pwd == $cnfrm_pwd) {
            $update = $db_handle->insertQuery("update admin_login set password='$new_pwd' where id='{$id}'");

            echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Profile';
                </script>";
        } else {
            echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Profile';
                </script>";
        }
    } else {
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Profile';
                </script>";
    }
}
