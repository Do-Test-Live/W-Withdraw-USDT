<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>
    <meta name="robots" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="USDT"/>
    <meta property="og:title" content="USDT"/>
    <meta property="og:description" content="USDT"/>
    <meta property="og:image" content="social-image.png"/>
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Profile | USDT</title>

    <?php require_once('include/css.php'); ?>

</head>
<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="waviy">
        <span style="--i:1">L</span>
        <span style="--i:2">o</span>
        <span style="--i:3">a</span>
        <span style="--i:4">d</span>
        <span style="--i:5">i</span>
        <span style="--i:6">n</span>
        <span style="--i:7">g</span>
        <span style="--i:8">.</span>
        <span style="--i:9">.</span>
        <span style="--i:10">.</span>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <?php require_once('include/header.php'); ?>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="dashboard_bar">
                            Profile
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <?php require_once('include/navbar.php'); ?>
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row invoice-card-row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="Update" method="post" enctype="multipart/form-data">
                                    <?php $data = $db_handle->runQuery("SELECT * FROM admin_login where id={$_SESSION['userid']}"); ?>
                                    <input type="hidden" value="<?php echo $data[0]["id"]; ?>" name="id" required>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" value="<?php echo $data[0]["name"]; ?>" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Image</label>
                                        <div class="col-sm-6">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input" name="image"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <img src="../<?php echo $data[0]["image"]; ?>" class="img-fluid" alt=""/>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-6 mx-auto">
                                            <button type="submit" class="btn btn-primary w-25" name="updateProfile">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row invoice-card-row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Change Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="Update" method="post">
                                    <?php $data = $db_handle->runQuery("SELECT * FROM admin_login where id={$_SESSION['userid']}"); ?>
                                    <input type="hidden" value="<?php echo $data[0]["id"]; ?>" name="id" required>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Old Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="old_pwd" placeholder="Old Password" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">New Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="new_pwd" placeholder="New Password" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Confirm Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="cnfrm_pwd" placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-6 mx-auto">
                                            <button type="submit" class="btn btn-primary w-25" name="updatePassword">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
    <?php require_once('include/footer.php'); ?>
    <!--**********************************
        Footer end
    ***********************************-->


</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<?php require_once('include/js.php'); ?>

</body>
</html>
