<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();

if (!isset($_SESSION["userid"])) {
    echo "<script>
                window.location.href='Login';
                </script>";
}

if (isset($_GET['depositId'])) {
    $db_handle->insertQuery("delete from deposit_usdt where id=" . $_GET['depositId'] . "");
    echo 'success';
}

