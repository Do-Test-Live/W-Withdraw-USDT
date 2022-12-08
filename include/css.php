<?php
if(!isset($_SESSION["userid"])){
    echo "<script>
                window.location.href='Login';
                </script>";
}
?>
<!-- FAVICONS ICON -->
<link rel="shortcut icon" type="image/png" href="public/images/favicon.png"/>
<!-- Datatable -->
<link href="public/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="public/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
<link rel="stylesheet" href="public/vendor/nouislider/nouislider.min.css">
<!-- Style css -->
<link href="public/css/style.css" rel="stylesheet">
<!-- Custom Stylesheet -->
<link href="public/vendor/toastr/css/toastr.min.css" rel="stylesheet" type="text/css"/>
<style>
    .toast-success {
        background-color: #5fb46e;
    }

    .toast-error {
        background-color: #b50000;
    }
</style>