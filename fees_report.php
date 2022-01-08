<?php
require_once './controller/dbase_conn.php';
require_once './controller/student_result_list_init.php';
require_once 'controller/bill_upload_logic.php';
$title = "BCA | Fees Payment";
include_once './model/inc/dashboard_header.php';
$c_arm = $_SESSION['arm'];
$c_arm = $_SESSION['arm'];
$class = $_SESSION['class'];
$term = $_SESSION['term'];
$aSession = $_SESSION['aSession'];


?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Fees Report</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p><?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>

        <?php


        if (isset($_SESSION['upload'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                <li><?php echo $_SESSION['upload'] ?></li>
                <?php unset($_SESSION['upload']);
                ?>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="fees_payment.php" method="POST">

                    <div class="row">
                        <div class="col-md-12">

                            <h5>Fees Report for
                                <?php
                                echo $term . " " . $aSession;

                                ?></h5>
                        </div>
                    </div>


                    <!-- card body begins here-->
                    <div class="row">
                        <div class="col-md-12">

                            <table class="table  table-bordered ">
                                <thead class="thead-dark ">
                                    <tr style="font-size: 14px;">

                                        <th scope="col">Total Billed Fees</th>
                                        <th scope="col">Total Discount</th>
                                        <th scope="col">Total Payment Made</th>
                                        <th scope="col">Total Balance</th>


                                    </tr>
                                </thead>
                                <tbody class="ml-1 pt-2" style="font-size: 40px;">
                                    <?php

                                    //query
                                    $sql = "SELECT sum(total_fees)as  total_bill, sum(amount_paid)as  total_paid, 
                                    sum(balance) as total_balance, term, a_session FROM fees_total WHERE term ='$term' ";
                                    $result = $conn->query($sql);
                                    ?>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) : ?>
                                        <tr style="text-align: center;">
                                            <td><?php echo $row['total_bill']  ?></td>
                                            <td><?php echo $bus ?></td>
                                            <td><?php echo $row['total_paid']  ?></td>
                                            <td><?php echo $row['total_balance']  ?></td>

                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <!--card footer begins here-->
                    <div class=" row">
                        <div class="col-md-12">
                            <td><button type="submit" class="btn btn-primary" name="bill_student">Print</button></td>
                        </div>
                    </div>

                </form>
            </div>


        </div>





    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>