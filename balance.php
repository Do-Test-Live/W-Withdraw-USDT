<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
if (isset($_POST["id"])) {
    $balance = $db_handle->runQuery("SELECT * FROM balance where client_id='{$_POST["id"]}'");
    $row_count = $db_handle->numRows("SELECT * FROM balance where client_id='{$_POST["id"]}'");
    $total_balance = 0;

    for ($i = 0; $i < $row_count; $i++) {
        if($balance[$i]["balance_type"]=='Deposit'){
            $total_balance+=$balance[$i]["balance"]/$balance[$i]["conversion_rate"];
        }else{
            $total_balance-=$balance[$i]["balance"];
        }
    }

    echo abs(round($total_balance,2));
}



