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
        <h1 class="h4">Process Fees Payment</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p><?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>
        <div class="bg-info p-2 text-white">
            <h5><strong>How to Post Payment!</strong></h5>

            <ul>
                <li>Click the Pay Now button against the student you want to post pay</li>
                <li>Enter the amount paid and the date</li>
                <li>Select the Mode of Payment</li>
                <li>Click the Make Payment button</li>
            </ul>
        </div>
        <hr>

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
                <form action="fees_payment.php" method="POST">


                    <div class="row">
                        <div class="col-md-12">

                            <h5>Fees Payment for
                                <?php
                                echo $_SESSION['class'] . " " . $_SESSION['arm'];

                                ?></h5>
                        </div>
                    </div>

                    <!-- card body begins here-->
                    <div class="row">
                        <div class="col-md-12">

                            <table class="table table-responsive ">
                                <thead class="thead-dark ">
                                    <tr style="font-size: 12px;">

                                        <th scope="col">Name</th>
                                        <th scope="col">Admission No</th>
                                        <th scope="col">Total Fees</th>
                                        <th scope="col">1st Deposit</th>
                                        <th scope="col">2nd Deposit</th>
                                        <th scope="col">3rd Deposit</th>
                                        <th scope="col">Balance</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Status</th>

                                    </tr>
                                </thead>
                                <tbody class="ml-1 pt-2" style="font-size: 10px;">
                                    <?php

                                    //query
                                    $sql = "SELECT * FROM fees_total WHERE term ='$term' && student_arm =  '$c_arm' && student_class = '$class'";
                                    $result = $conn->query($sql);
                                    ?>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) : ?>
                                        <tr>
                                            <input type="hidden" name="a_session" value="<?php echo $aSession ?>" class="form-control">
                                            <input type="hidden" name="term" value="<?php echo $term ?>" class="form-control">
                                            <input type="hidden" name="student_class" value="<?php echo $class ?>" readonly class="form-control">
                                            <input type="hidden" name="student_arm" value="<?php echo $c_arm ?>" readonly class="form-control">
                                            <td><input type="text" name="student_name[]" value="<?php echo $row['student_name'] ?>" readonly class="form-control"></td>
                                            <td><input type="text" name="admin_no[]" value="<?php echo $row['admission_no']  ?>" readonly class="form-control"></td>
                                            <td><input type="text" name="school_fees" value="<?php echo $row['total_fees'] ?>" readonly class="form-control"></td>
                                            <td><input type="text" name="1st_depo" value="<?php echo $row['first_deposit'] ?>" readonly class="form-control"></td>
                                            <td><input type="text" name="2nd_depo" value="<?php echo $row['second_deposit'] ?>" readonly class="form-control"></td>
                                            <td><input type="text" name="3rd_depo" value="<?php echo $row['third_deposit'] ?>" readonly class="form-control"></td>
                                            <td><input type="text" name="balance" value="<?php echo $row['balance'] ?>" readonly class="form-control"></td>
                                            <td> <a href="make_pay.php?pay=<?php echo $row['id']; ?>" class=" btn btn-info btn-sm">PayNow</a></td>
                                            <td>
                                                <?php if ($row['balance'] == 0) : ?>

                                                    <button class="btn btn-success btn-sm " disabled>Cleared</button>

                                                <?php else : ?>
                                                    <button class="btn btn-danger btn-sm " disabled>Indebted</button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <!--card footer begins here-->
                    <div class="card-footer">

                        <div class="col-md-6">
                            <a href="fees_payment_init.php"><button style="width:30%;" type="button" class="btn btn-warning">Back </button></a>
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