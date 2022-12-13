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
    <title>CNY | CNY/HKD</title>

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
                            CNY
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
                <?php if (isset($_GET['depositId'])) { ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Staking CNY</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="Update">

                                        <?php $data = $db_handle->runQuery("SELECT * FROM deposit_cny where id={$_GET['depositId']}"); ?>

                                        <input type="hidden" value="<?php echo $data[0]["id"]; ?>" name="id" required>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Client Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="client_name"
                                                       placeholder="Client Name"
                                                       value="<?php echo $data[0]["client_name"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">CNY/HKD Rate</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="conversion_rate"
                                                       placeholder="CNY/HKD Rate"
                                                       value="<?php echo $data[0]["conversion_rate"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Input Method</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="input_method"
                                                       value="<?php echo $data[0]["input_method"]; ?>"
                                                       placeholder="Input Method">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Account Number</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="account_number"
                                                       value="<?php echo $data[0]["account_number"]; ?>"
                                                       placeholder="Account Number">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Bank Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="bank_name"
                                                       value="<?php echo $data[0]["bank_name"]; ?>"
                                                       placeholder="Bank Name">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Bank Holder</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="bank_holder"
                                                       value="<?php echo $data[0]["bank_holder"]; ?>"
                                                       placeholder="Bank Holder">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Amount</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="amount"
                                                       value="<?php echo $data[0]["amount"]; ?>"
                                                       placeholder="Amount">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Staking Days (T3, T7, T10 etc.)</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="staking_days"
                                                       value="<?php echo $data[0]["staking_days"]; ?>"
                                                       placeholder="Staking Days (T3, T7, T10 etc.)">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <select class="default-select  form-control wide" name="status"
                                                        required>
                                                    <option value="Pending" <?php echo ($data[0]["status"] == 'Pending') ? "selected" : ""; ?>>
                                                        Pending
                                                    </option>
                                                    <option value="Withdraw" <?php echo ($data[0]["status"] == 'Approve') ? "selected" : ""; ?>>
                                                        Approve
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-6 mx-auto">
                                                <button type="submit" class="btn btn-primary w-25"
                                                        name="updateCNY">Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Stake CNY</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="Insert" method="post">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Client Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="client_name" placeholder="Client Name"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">CNY/HKD Rate</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="conversion_rate" placeholder="CNY/HKD Rate"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Input Method</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="input_method"
                                                       placeholder="Input Method">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Account Number</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="account_number"
                                                       placeholder="Account Number">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Bank Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="bank_name"
                                                       placeholder="Bank Name">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Bank Holder</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="bank_holder"
                                                       placeholder="Bank Holder">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Amount</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="amount"
                                                       placeholder="Amount">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Staking Days (T3, T7, T10 etc.)</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="staking_days"
                                                       placeholder="Staking Days (T3, T7, T10 etc.)">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-6 mx-auto">
                                                <button type="submit" class="btn btn-primary w-25" name="depositCNY">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Today Buy and Sell Price</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="Update" method="post">

                                        <?php $data = $db_handle->runQuery("SELECT * FROM buysell where id=1;"); ?>


                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Buy Price (USDT)</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="buy_price"
                                                       value="<?php echo $data[0]["buy_price"]; ?>"
                                                       placeholder="Buy Price (USDT)" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Sell Price (USDT)</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="sell_price"
                                                       value="<?php echo $data[0]["sell_price"]; ?>"
                                                       placeholder="Sell Price (USDT)" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-6 mx-auto">
                                                <button type="submit" class="btn btn-primary w-25" name="updateBuySell">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Staking CNY</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example4" class="display" style="min-width: 845px">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Client Name</th>
                                            <th>Conversion Rate</th>
                                            <th>Input Method</th>
                                            <th>Account Number</th>
                                            <th>Bank Name</th>
                                            <th>Bank Holder</th>
                                            <th>Deposit CNY</th>
                                            <th>Payout HKD</th>
                                            <th>Staking Days</th>
                                            <th>Status</th>
                                            <th>Withdraw</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $cny_data = $db_handle->runQuery("SELECT * FROM deposit_cny order by id desc");
                                        $row_count = $db_handle->numRows("SELECT * FROM deposit_cny order by id desc");

                                        for ($i = 0; $i < $row_count; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $cny_data[$i]["client_name"]; ?></td>
                                                <td><?php echo $cny_data[$i]["conversion_rate"]; ?></td>
                                                <td><?php echo $cny_data[$i]["input_method"]; ?></td>
                                                <td><?php echo $cny_data[$i]["account_number"]; ?></td>
                                                <td><?php echo $cny_data[$i]["bank_name"]; ?></td>
                                                <td><?php echo $cny_data[$i]["bank_holder"]; ?></td>
                                                <td><?php echo $cny_data[$i]["amount"]; ?></td>
                                                <td><?php
                                                    $d_usdt = $cny_data[$i]["amount"];
                                                    $w_usdt = $cny_data[$i]["w_amount"];

                                                    if ($cny_data[$i]["status"] == 'Pending') {

                                                        $today = date("Y-m-d H:i:s");

                                                        $earlier = new DateTime($today);
                                                        $later = new DateTime($cny_data[$i]["inserted_at"]);

                                                        $days = $later->diff($earlier)->format("%a"); //3

                                                        if ($days >= 7) {
                                                            $w_usdt = ((8 / 10000) * $days) + (double)$d_usdt;
                                                        }

                                                    }

                                                    echo ($w_usdt * $cny_data[$i]["conversion_rate"]);
                                                    ?>
                                                </td>
                                                <td><?php echo $days; ?></td>
                                                <td>
                                                    <?php
                                                    if ($cny_data[$i]["status"] == 'Pending') {
                                                        ?>
                                                        <span class="badge light badge-info">Pending</span>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <span class="badge light badge-success">Approve</span>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($cny_data[$i]["status"] == 'Pending') {
                                                        ?>
                                                        <a href="Update?withdrawId=<?php echo $cny_data[$i]["id"]; ?>"
                                                           class="btn btn-primary">Withdraw Available
                                                        </a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <button type="button" class="btn btn-success">Withdraw
                                                            Successful
                                                        </button>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="Staking-USDT?depositId=<?php echo $cny_data[$i]["id"]; ?>"
                                                           class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                    class="fa fa-pencil"></i></a>
                                                        <a onclick="usdtDelete(<?php echo $cny_data[$i]["id"]; ?>);"
                                                           class="btn btn-danger shadow btn-xs sharp"><i
                                                                    class="fa fa-trash"></i></a>
                                                    </div>
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
</body>
</html>
