<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();

if(!isset($_SESSION["userid"])){
    echo "<script>
                window.location.href='Login';
                </script>";
}

if (isset($_POST['updateCategory'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $name = $db_handle->checkValue($_POST['c_name']);
    $status = $db_handle->checkValue($_POST['status']);

    $update = $db_handle->insertQuery("update category set c_name='$name', status='$status' where id='{$id}'");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Category';
                </script>";

}

if (isset($_POST['updatePassword'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $old_pwd = $db_handle->checkValue($_POST['old_pwd']);
    $new_pwd = $db_handle->checkValue($_POST['new_pwd']);
    $cnfrm_pwd = $db_handle->checkValue($_POST['cnfrm_pwd']);

    $row = $db_handle->numRows("select * FROM `admin_login` WHERE id='{$id}' and password='$old_pwd'");
    if($row>0){
        if($new_pwd==$cnfrm_pwd){
            $update = $db_handle->insertQuery("update admin_login set password='$new_pwd' where id='{$id}'");

            echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Profile';
                </script>";
        }else{
            echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Profile';
                </script>";
        }
    }else{
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Profile';
                </script>";
    }
}
