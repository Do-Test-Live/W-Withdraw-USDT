<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");
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
    <title>Stake Update | CNY/HKD</title>

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
                            Stake Update
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
                <?php if (isset($_GET['stake_id'])) {
                    $id = $_GET['stake_id'];
                    $cny_data = $db_handle->runQuery("SELECT * FROM client as c,stake as s where s.client_id=c.id and s.id={$id} order by s.id desc");
                    ?>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Stake Update</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="Update" method="post">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Client Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?php echo $cny_data[0]["client_name"]; ?>" readonly>
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Inserted AT</label>
                                            <div class="col-sm-9">
                                                <input type="datetime-local" class="form-control" id="inserted_at"
                                                       name="inserted_at" value="<?php echo date('Y-m-d\TH:i',strtotime($cny_data[0]["inserted_at"])); ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-6 mx-auto">
                                                <button type="submit" class="btn btn-primary w-25" name="updateDate">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>

                    <?php
                }
                ?>
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
<script>
    async function availableBalance(id) {
        $.ajax({
            type: "POST",
            url: "balance.php",
            data: {id: id},
            success: async function (msg) {
                $("#available_balance").val(msg);
            },
            error: function () {
                alert("failure");
            }
        });
    }
</script>

</body>
</html>
