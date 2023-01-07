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
    <title>Deposit CNY | CNY/HKD</title>

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
                            Deposit CNY
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
                <?php if (isset($_GET['todayCheck'])) {
                    $today='%'.date('Y-m-d').'%';
                    ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Client Deposit Record <?php echo  $today?></h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example4" class="display" style="min-width: 845px">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Client Name</th>
                                            <th>Transferee</th>
                                            <th>HKD/CNY</th>
                                            <th>Input Method</th>
                                            <th>Account Number</th>
                                            <th>Bank Name</th>
                                            <th>Bank Holder</th>
                                            <th>Deposit CNY</th>
                                            <th>Payout HKD</th>
                                            <th>Bank in Proof</th>
                                            <th>Inserted Time</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $client = $db_handle->runQuery("SELECT * FROM deposit_cny as d, client as c where d.client_id=c.id and d.inserted_at like '$today' order by d.id desc");
                                        $row_count = $db_handle->numRows("SELECT * FROM deposit_cny as d, client as c where d.client_id=c.id and d.inserted_at like '$today' order by d.id desc");

                                        for ($i = 0; $i < $row_count; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $client[$i]["client_name"]; ?></td>
                                                <td><?php echo $client[$i]["trasferee"]; ?></td>
                                                <td><?php echo $client[$i]["conversion_rate"]; ?></td>
                                                <td><?php echo $client[$i]["input_method"]; ?></td>
                                                <td><?php echo $client[$i]["account_number"]; ?></td>
                                                <td><?php echo $client[$i]["bank_name"]; ?></td>
                                                <td><?php echo $client[$i]["bank_holder"]; ?></td>
                                                <td><?php echo $client[$i]["amount"]; ?></td>
                                                <td>
                                                    <?php
                                                    echo round($client[$i]["amount"] / $client[$i]["conversion_rate"], 4);
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo $client[$i]["proof"]; ?>"
                                                       target="_blank">Bank in Proof</a>
                                                </td>
                                                <td>
                                                    <?php
                                                    $insert_time = new DateTime($client[$i]["inserted_at"]);

                                                    $new = $insert_time->format('d/m/Y h:i:s a');

                                                    echo $new;
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
    function calculateBalance(balance) {
        let total_amount = parseFloat(document.getElementById('total_amount').value);
        document.getElementById('remain_withdraw').value = parseFloat(total_amount - balance).toFixed(2);
    }

    function usdtDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'get',
                    url: 'Delete',
                    data: {
                        depositId: id
                    },
                    success: function (data) {
                        if (data.toString() === 'P') {
                            Swal.fire(
                                'Not Deleted!',
                                'Your have store in this category.',
                                'error'
                            ).then((result) => {
                                window.location = 'Staking-USDT';
                            });
                        } else {
                            Swal.fire(
                                'Deleted!',
                                'Your Deposit USDT has been deleted.',
                                'success'
                            ).then((result) => {
                                window.location = 'Staking-USDT';
                            });
                        }
                    }
                });
            } else {
                Swal.fire(
                    'Cancelled!',
                    'Your Deposit USDT is safe :)',
                    'error'
                ).then((result) => {
                    window.location = 'Staking-USDT';
                });
            }
        })
    }
</script>
<script>
    async function showRecord(id, name) {
        $.ajax({
            type: "POST",
            url: "View-Record",
            data: {id: id},
            success: async function (msg) {
                $("#viewRecord").html(msg)
                $("#client_name").html(name)
            },
            error: function () {
                alert("failure");
            }
        });
    }
</script>
</body>
</html>
