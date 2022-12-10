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
                document.cookie = 'alert = 6;';
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
                document.cookie = 'alert = 6;';
                window.location.href='Staking-USDT';
                </script>";
        }
    }
}

if (isset($_POST['updateBuySell'])) {
    $id = 1;

    $buy_price = $db_handle->checkValue($_POST['buy_price']);

    $sell_price = $db_handle->checkValue($_POST['sell_price']);

    $update = $db_handle->insertQuery("update buysell set buy_price='$buy_price',sell_price='$sell_price' where id='{$id}'");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Today-Buy-Sell';
                </script>";

}

if (isset($_POST['updateProfile'])) {
    $id = $db_handle->checkValue($_POST['id']);

    $name = $db_handle->checkValue($_POST['name']);

    $image='';
    $query='';

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

            $data = $db_handle->runQuery("select * FROM `admin_login` WHERE id='{$id}'");
            unlink($data[0]['image']);

            move_uploaded_file($file_tmp, "assets/images/admin/" .$file_name);
            $image = 'assets/images/admin/' . $file_name;
            $query.=",`image`='".$image."'";
        }
    }

    $update = $db_handle->insertQuery("UPDATE `admin_login` SET `name`='$name'".$query." WHERE `id`='{$id}'");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Profile';
                </script>";

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
