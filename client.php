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
                <?php if (isset($_GET['withdrawId'])) { ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Withdraw CNY</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="Insert" enctype="multipart/form-data">

                                        <input type="hidden" value="<?php echo $_GET['withdrawId']; ?>" name="client_id"
                                               required>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Available Withdraw Amount</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                       value="<?php echo $_GET['total']; ?>" id="total_amount" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Client Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                       placeholder="Client Name"
                                                       value="<?php echo $_GET['name']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Withdraw Amount <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="amount"
                                                       placeholder="Withdraw Amount"
                                                       onkeyup="calculateBalance(this.value)"
                                                       onkeydown="calculateBalance(this.value)" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Remaining Withdraw Amount</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                       value="0" id="remain_withdraw" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Proof Image (Optional)</label>
                                            <div class="col-sm-9">
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input" name="proof_image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-6 mx-auto">
                                                <button type="submit" class="btn btn-primary w-25"
                                                        name="withdrawCNY">Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Deposit Record</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="Record" method="get">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Date<span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="date"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-6 mx-auto">
                                                <button type="submit" class="btn btn-primary w-50" name="depositRecord">
                                                    Show Record
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Withdraw Record</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="Record" method="get">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Date<span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="date"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-6 mx-auto">
                                                <button type="submit" class="btn btn-primary w-50" name="withdrawRecord">
                                                    Show Record
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
                                <h4 class="card-title">Add Client</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="Insert" method="post">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Client Name <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="client_name"
                                                       placeholder="Client Name"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Phone <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="phone"
                                                       placeholder="Phone"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Transferee 1 (Optional)</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="transferee_1"
                                                       placeholder="Transferee">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Transferee 2 (Optional)</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="transferee_2"
                                                       placeholder="Transferee">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Transferee 3 (Optional)</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="transferee_3"
                                                       placeholder="Transferee">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-6 mx-auto">
                                                <button type="submit" class="btn btn-primary w-25" name="addClient">
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
                                <h4 class="card-title">Deposit CNY</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="Insert" method="post">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Client Name <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <select class="default-select form-control wide mb-3"
                                                        style="display: none;" required name="client_ID">
                                                    <option>Choose..</option>
                                                    <?php
                                                    $client = $db_handle->runQuery("SELECT * FROM client order by id desc");
                                                    $row_count = $db_handle->numRows("SELECT * FROM client order by id desc");

                                                    for ($i = 0; $i < $row_count; $i++) {
                                                        ?>
                                                        <option value="<?php echo $client[$i]["id"]; ?>"><?php echo $client[$i]["client_name"]; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">CNY/HKD Rate <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="conversion_rate"
                                                       placeholder="CNY/HKD Rate"
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
                                            <label class="col-sm-3 col-form-label">Amount <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="amount"
                                                       placeholder="Amount" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Bank in Proof Image (Optional)</label>
                                            <div class="col-sm-9">
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input" name="proof_image">
                                                </div>
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
                                            <th>Withdraw</th>
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
                                                <td><?php echo $client[$i]["trasferee"]; ?></td>
                                                <td>
                                                    <?php

                                                    $balance = $db_handle->runQuery("SELECT * FROM balance where client_id={$client[$i]["id"]} order by id desc");
                                                    $row = $db_handle->numRows("SELECT * FROM balance where client_id={$client[$i]["id"]} order by id desc");
                                                    $total = 0;
                                                    for ($j = 0; $j < $row; $j++) {

                                                        if ($balance[$j]["balance_type"] == 'Deposit') {
                                                            $total += $balance[$j]["balance"] / $balance[$j]["conversion_rate"];
                                                        } else {
                                                            $total -= $balance[$j]["balance"] / $balance[$j]["conversion_rate"];
                                                        }

                                                    }

                                                    echo round($total, 4);
                                                    ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary mb-2"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".bd-example-modal-lg"><i
                                                                class="fa fa-eye"
                                                                onclick="showRecord(<?php echo $client[$i]["id"]; ?>,'<?php echo $client[$i]["client_name"]; ?>');"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($total > 0) {
                                                        ?>
                                                        <a href="Client?withdrawId=<?php echo $client[$i]["id"]; ?>&total=<?php echo round($total, 4); ?>&name=<?php echo $client[$i]["client_name"]; ?>"
                                                           class="btn btn-primary">Withdraw
                                                        </a>
                                                        <?php
                                                    }
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Client Deposit Record</h4>
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
                                        $client = $db_handle->runQuery("SELECT * FROM deposit_cny as d, client as c where d.client_id=c.id order by d.id desc");
                                        $row_count = $db_handle->numRows("SELECT * FROM withdraw as d, client as c where d.client_id=c.id order by d.id desc");

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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Client Withdraw Record</h4>
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
                                            <th>Withdraw CNY</th>
                                            <th>Payout HKD</th>
                                            <th>Proof</th>
                                            <th>Inserted Time</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $client = $db_handle->runQuery("SELECT * FROM withdraw as d, client as c where d.client_id=c.id order by d.id desc");
                                        $row_count = $db_handle->numRows("SELECT * FROM withdraw as d, client as c where d.client_id=c.id order by d.id desc");

                                        for ($i = 0; $i < $row_count; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $client[$i]["client_name"]; ?></td>
                                                <td><?php echo $client[$i]["trasferee"]; ?></td>
                                                <td><?php echo $client[$i]["conversion_rate"]; ?></td>
                                                <td><?php echo $client[$i]["amount"]; ?></td>
                                                <td>
                                                    <?php
                                                    echo round($client[$i]["amount"] / $client[$i]["conversion_rate"], 4);
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo $client[$i]["proof"]; ?>"
                                                       target="_blank">Proof</a>
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

    <div class="modal fade bd-example-modal-lg" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">View Record <span class="h4" id="client_name"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12" id="viewRecord">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
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

<script>
    function calculateBalance(balance) {
        let total_amount = parseFloat(document.getElementById('total_amount').value);
        document.getElementById('remain_withdraw').value = parseFloat(total_amount - balance).toFixed(4);
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
