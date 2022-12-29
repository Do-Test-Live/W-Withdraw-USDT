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
    <title>Client | CNY/HKD</title>

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
                            Client
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
                                            <label class="col-sm-3 col-form-label">Transferee</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="transferee"
                                                       value="<?php echo $data[0]["transferee"]; ?>"
                                                       placeholder="Transferee">
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
                                <h4 class="card-title">Add Client</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="Insert" method="post">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Client Name <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="client_name"
                                                       placeholder="Client Name"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Phone <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="phone"
                                                       placeholder="Phone"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Transferee 1 (Optional)</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="transferee"
                                                       placeholder="Transferee">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Transferee 2 (Optional)</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="transferee"
                                                       placeholder="Transferee">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Transferee 3 (Optional)</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="transferee"
                                                       placeholder="Transferee">
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Client Balance Record</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example4" class="display" style="min-width: 845px">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Client Name</th>
                                            <th>Transferee</th>
                                            <th>Total Balance</th>
                                            <th>View Records</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $client = $db_handle->runQuery("SELECT * FROM client order by id desc");
                                        $row_count = $db_handle->numRows("SELECT * FROM client order by id desc");

                                        for ($i = 0; $i < $row_count; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $client[$i]["client_name"]; ?></td>
                                                <td><?php echo $client[$i]["transferee"]; ?></td>
                                                <td>
                                                    <?php

                                                    $balance= $db_handle->runQuery("SELECT * FROM balance where client_id={$client[$i]["id"]} order by id desc");
                                                    $row = $db_handle->numRows("SELECT * FROM balance where client_id={$client[$i]["id"]} order by id desc");
                                                    $total=0;
                                                    for($j=0;$j<$row;$j++){

                                                        if($balance[$j]["balance_type"]=='Deposit'){
                                                            $total+=$balance[$j]["balance"]/$balance[$j]["conversion_rate"];
                                                        }else{
                                                            $total-=$balance[$j]["balance"]/$balance[$j]["conversion_rate"];
                                                        }

                                                    }

                                                    echo round($total, 4);
                                                    ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-secondary shadow btn-xs sharp mr-1"
                                                            data-toggle="modal" data-target=".bd-example-modal-xl"><i
                                                                class="fa fa-eye" onclick="showRecord(<?php echo $client[$i]["id"]; ?>);"></i></button>
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
<script>
    async function showRecord(id) {
        $.ajax({
            type: "POST",
            url: "View-Record",
            data: {id: id},
            success:async function(msg){
                $("#viewRecord").html(msg)
            },
            error: function(){
                alert("failure");
            }
        });
    }
</script>
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Record</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12" id="viewRecord">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
