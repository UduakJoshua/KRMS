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

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Class Payment Summary</h1>
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

                        <h5>Fees Payment for
                            <?php
                            echo $student_class . " " . $student_arm;

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
                                    <th scope="col">Amount Paid</th>
                                    <th scope="col">Balance</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>


                                </tr>
                            </thead>
                            <tbody class="ml-1 pt-2" style="font-size: 10px;">
                                <?php

                                //query
                                $sql = "SELECT * FROM fees_total WHERE term ='$term' && student_arm =  '$student_arm' && student_class = '$student_class'";

                                $result = $conn->query($sql);
                                ?>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) :

                                ?>
                                    <tr>
                                        <input type="hidden" name="a_session" value="<?php echo $aSession ?>" class="form-control">
                                        <input type="hidden" name="term" value="<?php echo $term ?>" class="form-control">
                                        <input type="hidden" name="student_class" value="<?php echo $class ?>" readonly class="form-control">
                                        <input type="hidden" name="student_arm" value="<?php echo $c_arm ?>" readonly class="form-control">
                                        <td><input type="text" name="student_name[]" value="<?php echo $row['student_name'] ?>" readonly class="form-control"></td>
                                        <td><input type="text" name="admin_no[]" value="<?php echo $row['admission_no']  ?>" readonly class="form-control"></td>
                                        <td><input type="text" name="school_fees" value="<?php echo $row['total_fees'] ?>" readonly class="form-control"></td>
                                        <td><input type="text" name="1st_depo" value="<?php echo $row['amount_paid'] ?>" readonly class="form-control"></td>

                                        <td><input type="text" name="balance" value="<?php echo $row['balance'] ?>" readonly class="form-control"></td>

                                        <td>
                                            <?php if (($row['school_fees'] == ($row['discount'])) && ($row['balance'] == 0)) : ?>

                                                <button class="btn btn-success btn-sm " disabled>MGT</button>
                                           
                                            <?php elseif($row['balance'] == 0)  : ?>

                                                <button class="btn btn-success btn-sm " disabled>Cleared</button>
                                            
                                            <?php elseif ($row['balance'] < 0) : ?>

                                                <button class="btn btn-success btn-sm " disabled>Cl/Excess </button>

                                            <?php else : ?>
                                                <button class="btn btn-danger btn-sm " disabled>Indebted</button>
                                                
                                            <?php endif; ?>
                                        </td>
                                        <td> <a href="fees_receipt.php?receipt=<?php echo $row['admission_no']; ?>"><button type="button" class="btn btn-secondary">ViewReceipt</button></a> </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>

                    </div>
                    <div class=" row">
                        <div class="col-md-12">
                            <a href="fees_view_init.php"><button type="button" class="btn btn-primary">Back</button></a>
                        </div>
                    </div>

                </div>
                <!--card footer begins here-->



            </div>


        </div>





    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>