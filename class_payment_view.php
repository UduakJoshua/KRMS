<?php
require_once './controller/student_result_list_init.php';
require './controller/student_result_list_init.php';
$title = "BCA | Class Payment Summary";
include_once './model/inc/dashboard_header.php';

$student_arm = $_SESSION['student_arm'];
$student_class = $_SESSION['student_class'];
$term = $_SESSION['term'];
$a_session = $_SESSION['aSession'];

?>

<main role="main" class="col-lg-10 ml-sm-auto col-lg-10.b.gb./b/vbV//b px-md-4"">
    <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h4">Class Payment Summary</h1>
    <div class=" mb-2 mb-md-0">
        <div class="mr-2">

            <p><?php echo $_SESSION['username']; ?></p>
        </div>

    </div>
    </div>


    <section class=" row print-container container-fluid section_border report_background border mt-4">
        <?php


        if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                <li><?php echo $_SESSION['message'] ?></li>
                <?php unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="school-header">

                    <div class="head1">
                        <img src="assets/img/bca_logo.png" alt="school_logo" class="portal_logo img-responsive">
                    </div>
                    <div class="text-right pl-3 head2">
                        <h1 class="title-head">Blessed Children Academy</h1>

                    </div>

                </div>
                <hr>

                <div class="row">
                    <div class="col-md-12 text-center">

                        <h5>Fees Payment Report for
                            <?php
                            echo $student_class . " " . $student_arm . " " . $term . " " . $a_session;

                            ?></h5>
                    </div>
                </div>
                <hr>
                <!-- card body begins here-->
                <div class="row">
                    <div class="col-md-12 justify-content-center">

                        <table class="table  table-bordered table-receipt">
                            <thead class="thead-dark ">
                                <tr style="font-size: 14px;">

                                    <th scope="col">Name</th>
                                    <th scope="col">Admission No</th>
                                    <th scope="col">Total Fees</th>
                                    <th scope="col">Amount Paid</th>
                                    <th scope="col">Balance</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Processed By</th>
                                </tr>
                            </thead>
                            <tbody class="ml-1 pt-1">
                                <?php

                                //query
                                $sql = "SELECT * FROM fees_total WHERE term =? && student_arm = ? && student_class = ? && a_session =?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param('ssss', $term, $student_arm, $student_class, $a_session);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                if ($row = $result->num_rows > 0)
                                ?>

                                <?php
                            while ($row = mysqli_fetch_assoc($result)) :

                                ?>
                                    <tr style="font-size: 18px;">

                                        <td><?php echo $row['student_name']; ?></td>
                                        <td><?php echo $row['admission_no'];  ?></td>
                                        <td><?php echo number_format(($row['total_fees']), 2) ?></td>
                                        <td><?php echo number_format(($row['amount_paid']), 2) ?></td>
                                        <td><?php echo number_format(($row['balance']), 2) ?></td>
                                        <td>
                                            <?php if ($row['balance'] == 0) : ?>
                                                <p> Cleared</p>
                                            <?php else : ?>
                                                <p> Indebted</p>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $row['processed_by'] ?></td>
                                    </tr>
                                <?php endwhile; ?>

                                <tr style="font-size: 19px; font-weight:500;">

                                    <?php
                                    $sql = "SELECT
                                sum(total_fees )as actual_bill,
                                sum(amount_paid)as total_paid,
                                sum(balance) as total_balance
                                FROM fees_total WHERE term =? && student_arm = ? && student_class = ? && a_session =?";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param('ssss', $term, $student_arm, $student_class, $a_session);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    if ($row = $result->num_rows > 0);

                                    while ($row = mysqli_fetch_assoc($result)) :
                                        $total = $row['actual_bill'];
                                        $total_paid = $row['total_paid'];
                                        $balance = $row['total_balance'];

                                        // formatting the number to thousand separators
                                        $formatted_total = number_format($total, 2);
                                        $formatted_paid = number_format($total_paid, 2);
                                        $formatted_balance = number_format($balance, 2);

                                    ?>

                                        <td>Total Fees for this class</td>
                                        <td>&#8358; <?php echo $formatted_total; ?></td>
                                        <td>Total Paid</td>
                                        <td>&#8358; <?php echo $formatted_paid; ?></td>
                                        <td>Total Balance</td>
                                        <td>&#8358; <?php echo $formatted_balance; ?></td>
                                    <?php endwhile; ?>
                                </tr>
                            </tbody>

                        </table>

                    </div>


                </div>
                <hr>
                <!--card footer begins here-->



            </div>
            <div class=" row mb-3 print_button">
                <div class="col-md-6">
                    <a href="fees_view_init.php"><button type="button" class="btn btn-primary">Back</button></a>
                </div>

                <div class=" col-md-6  d-flex ">
                    <button class=" btn btn-primary mr-2 " onclick="window.print()">Print</button>

                </div>
            </div>

        </div>

    </section>

    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>