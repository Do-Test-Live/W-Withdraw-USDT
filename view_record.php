<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
if (isset($_POST["id"])) {
    ?>
    <div class="card mt-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">Serial</th>
                        <th>CNY Balance</th>
                        <th>Conversion Rate</th>
                        <th>Type</th>
                        <th>HKD Balance</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $balance = $db_handle->runQuery("SELECT * FROM balance where client_id='{$_POST["id"]}'");
                    $row_count = $db_handle->numRows("SELECT * FROM balance where client_id='{$_POST["id"]}'");
                    $total_deposit = 0;
                    $total_withdraw = 0;
                    $total_stake = 0;
                    $remain_balance = 0;
                    for ($i = 0; $i < $row_count; $i++) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $i + 1; ?></td>
                            <td class="strong"><?php echo $balance[$i]["balance"]; ?></td>
                            <td><?php echo $balance[$i]["conversion_rate"]; ?></td>
                            <td><?php echo $balance[$i]["balance_type"]; ?></td>
                            <td><?php echo $balance[$i]["balance"] / $balance[$i]["conversion_rate"]; ?></td>
                        </tr>
                        <?php
                        if ($balance[$i]["balance_type"] == 'Deposit') {
                            $total_deposit += $balance[$i]["balance"] / $balance[$i]["conversion_rate"];
                        } else if ($balance[$i]["balance_type"] == 'Withdraw') {
                            $total_withdraw += $balance[$i]["balance"] / $balance[$i]["conversion_rate"];
                        } else if ($balance[$i]["balance_type"] == 'Stake') {
                            $total_stake += $balance[$i]["balance"] / $balance[$i]["conversion_rate"];
                        }
                    }
                    $remain_balance = $total_deposit - $total_withdraw - $total_stake;
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5"></div>
                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                        <tr>
                            <td class="left"><strong>Total Deposit HKD</strong></td>
                            <td class="text-right">
                                <?php
                                echo $total_deposit;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="left"><strong>Total Stake HKD</strong></td>
                            <td class="text-right">
                                <strong>
                                    <?php
                                    echo $total_stake;
                                    ?>
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td class="left"><strong>Total Withdraw HKD</strong></td>
                            <td class="text-right">
                                <strong>
                                    <?php
                                    echo $total_withdraw;
                                    ?>
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td class="left"><strong>Total Balance HKD</strong></td>
                            <td class="text-right">
                                <strong>
                                    <?php
                                    echo $total_withdraw;
                                    ?>
                                </strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
