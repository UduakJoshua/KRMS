<?php
require_once 'controller/bill_upload_logic.php';
$title = "BCA | Expenditure Report";
include_once './model/inc/dashboard_header.php';

$term = $_SESSION['term'];
$a_session = $_SESSION['a_session'];

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Expenditure Report</h1>
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

                        <h5>Expenditures Report for
                            <?php
                            echo $term . " " . $a_session;

                            ?></h5>
                    </div>
                </div>


                <!-- card body begins here-->
                <div class="row">
                    <div class="col-md-12">

                        <table class="table  table-bordered " id="example">
                            <thead class="thead-dark ">
                                <tr style="font-size: 14px;">

                                    <th scope="col">Expenditure Item</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Month</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Remark</th>


                                </tr>
                            </thead>
                            <tbody class="ml-1 pt-2" style="font-size: 25px;">
                                <?php

                                //query
                                $sql = "SELECT  expenditure_item,
                                amount_spent, expenditure_month, expenditure_date,
                                remark FROM expenditures WHERE 
                                term ='$term'  && academic_session ='$a_session'";
                                $result = $conn->query($sql);

                                while ($row = mysqli_fetch_assoc($result)) :
                                    $expenditure = $row['expenditure_item'];
                                    $amount =   $row['amount_spent'];
                                    $month = $row['expenditure_month'];
                                    $date = $row['expenditure_date'];
                                    $remark = $row['remark'];


                                    // formatting the number to thousand separators
                                    $formatted_amount = number_format($amount, 2);
                                ?>
                                    <tr>
                                        <td> <?php echo $expenditure ?> </td>
                                        <td> &#8358; <?php echo $formatted_amount ?> </td>
                                        <td> <?php echo $month ?> </td>
                                        <td> <?php echo $date ?> </td>
                                        <td> <?php echo $remark ?> </td>

                                    </tr>
                                <?php endwhile; ?>

                            </tbody>
                            <tfoot class="thead-dark ">
                                <?php
                                $sql = "SELECT SUM(amount_spent)AS total_expenditures 
                                FROM expenditures WHERE term ='$term' && academic_session ='$a_session'";
                                $result = $conn->query($sql);
                                while ($row = mysqli_fetch_assoc($result)) :
                                    $total_expense = $row['total_expenditures'];
                                    $formated_total_expense = number_format($total_expense, 2);
                                    $_SESSION['expense'] = $formated_total_expense;
                                ?>

                                    <tr>
                                        <th scope="col" style="font-size: 20px;">Total Expenditures</th>
                                        <th scope=" col" style="font-size: 24px;"> &#8358; <?php echo $formated_total_expense; ?></th>
                                    </tr>
                            </tfoot>
                        <?php endwhile; ?>
                        </table>

                    </div>

                </div>
                <!--card footer begins here-->
                <div class=" row">
                    <div class="col-md-6">
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