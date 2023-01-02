<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
if (isset($_POST["id"])) {
    $balance = $db_handle->runQuery("SELECT * FROM balance where client_id='{$_POST["id"]}' and balance_type='Deposit'");
    $row_count = $db_handle->numRows("SELECT * FROM balance where client_id='{$_POST["id"]}' and balance_type='Deposit'");
    $total_balance = 0;
    for ($i = 0; $i < $row_count; $i++) {
        $total_balance+=$balance[$i]["balance"];
    }

    echo round($total_balance,2);
}



