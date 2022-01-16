<?php
require_once 'controller/bill_upload_logic.php';
$title = "BCA | Fees Payment";
include_once './model/inc/dashboard_header.php';

$student_arm = $_SESSION['student_arm'];
$student_class = $_SESSION['student_class'];
$term = $_SESSION['term'];
$a_session = $_SESSION['aSession'];


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


        if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                <li><?php echo $_SESSION['message'] ?></li>
                <?php unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-12">


                <div class="row">
                    <div class="col-md-12">

                        <h5>Fees Report for
                            <?php
                            echo $student_class  . " " . $term . " " . $a_session;

                            ?></h5>
                    </div>
                </div>


                <!-- card body begins here-->
                <div class="row">
                    <div class="col-md-12">

                        <table class="table  table-bordered " id="example">
                            <thead class="thead-dark ">
                                <tr style="font-size: 14px;">

                                    <th scope="col">Total Expected Bill</th>
                                    <th scope="col">Total Discount</th>
                                    <th scope="col">Total Actual Bill</th>
                                    <th scope="col">Total Payment Made</th>
                                    <th scope="col">Total Balance</th>


                                </tr>
                            </thead>
                            <tbody class="ml-1 pt-2" style="font-size: 25px;">
                                <?php

                                //query
                                $sql = "SELECT 
                                        sum(total_fees + discount)as  total_bill,
                                        sum(total_fees )as  actual_bill,
                                        sum(amount_paid)as  total_paid, 
                                        sum(discount)as  total_discount,
                                        sum(balance) as total_balance, term, 
                                        a_session 
                                        FROM fees_total 
                                        WHERE term ='$term'  &&  student_class = '$student_class' ";
                                $result = $conn->query($sql);
                                ?>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <tr style="text-align: center;">
                                        <td id="data">&#8358; <?php echo $row['total_bill']  ?> </td>
                                        <td>&#8358; <?php echo $row['total_discount'] ?> </td>
                                        <td>&#8358; <?php echo $row['actual_bill'] ?> </td>
                                        <td>&#8358; <?php echo $row['total_paid']  ?> </td>
                                        <td>&#8358; <?php echo $row['total_balance']  ?> </td>

                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>

                    </div>

                </div>
                <!--card footer begins here-->
                <div class=" row">
                    <div class="col-md-12">
                        <a href="fees_view_init.php"><button type="button" class="btn btn-primary">Back</button></a>
                    </div>
                </div>


            </div>


        </div>





    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>