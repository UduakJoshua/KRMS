<?php
require_once 'controller/bill_upload_logic.php';
$title = "BCA | Fees Payment";
include_once './model/inc/dashboard_header.php';

$term = $_SESSION['term'];
$a_session = $_SESSION['a_session'];

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
                            echo $term . " " . $a_session;

                            ?></h5>
                    </div>
                </div>


                <!-- card body begins here-->
                <div class="row">
                    <div class="col-md-12">

                        <table class="table  table-bordered ">
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
                                        FROM fees_total WHERE term ='$term'  && a_session ='$a_session'";
                                $result = $conn->query($sql);

                                while ($row = mysqli_fetch_assoc($result)) :
                                    $total = $row['total_bill'];
                                    $total_discount =   $row['total_discount'];
                                    $actual_bill = $row['actual_bill'];
                                    $total_paid = $row['total_paid'];
                                    $balance = $row['total_balance'];
                                    // formatting the number to thousand separators
                                    $formatted_total = number_format($total, 2);
                                    $formatted_discount = number_format($total_discount, 2);
                                    $formatted_bill = number_format($actual_bill, 2);
                                    $formatted_paid = number_format($total_paid, 2);
                                    $formatted_balance = number_format($balance, 2);

                                ?>
                                    <tr style="text-align: center;">
                                        <td> &#8358; <?php echo $formatted_total ?> </td>
                                        <td> &#8358; <?php echo $formatted_discount ?> </td>
                                        <td> &#8358; <?php echo $formatted_bill ?> </td>
                                        <td> &#8358; <?php echo $formatted_paid ?> </td>
                                        <td> &#8358; <?php echo $formatted_balance ?> </td>

                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>

                    </div>

                </div>
                <!--card footer begins here-->
                <div class=" row">
                    <div class="col-md-12">
                        <a href="fees_report_init.php"><button type="button" style="width:30%;" class="btn btn-primary">Back</button></a>
                    </div>


                </div>



            </div>


        </div>





    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>