<?php
require_once './controller/dbase_conn.php';
require_once './controller/student_result_list_init.php';
require_once 'controller/bill_upload_logic.php';
$title = "BCA | Edit Bill";
include_once './model/inc/dashboard_header.php';
$c_arm = $_SESSION['arm'];
$c_arm = $_SESSION['arm'];
$class = $_SESSION['class'];
$term = $_SESSION['term'];
$aSession = $_SESSION['aSession'];

?>


<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Edit Student Bill</h1>
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
            <div class="col-md-9">
                <form action="edit_bill.php" method="POST">
                    <input type="hidden" class="form-control " name="id" value="<?php echo $id ?>">
                    <h5>Billing Details</h5>
                    <hr>
                    <!-- student's contact information begins here -->
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student_name">Name:</label>
                                <input type="text" class="form-control " readonly value=" <?php echo $student_name; ?>" name="student_name" id="student_name" aria-describedby="student_name">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="admission_no">Admission No: </span></label>
                                <input type="text" class="form-control " readonly value=" <?php echo $admission_no; ?>" name="admission_no" id="admission_no" aria-describedby="admission_no">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student_class">Class:</span></label>
                                <input type="text" class="form-control " readonly value=" <?php echo $student_class ?>" name="student_class" id="student_class" aria-describedby="student_class">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student_arm">Arm: </span></label>
                                <input type="text" class="form-control " readonly value=" <?php echo $student_arm ?>" name="student_arm" id="student_arm" aria-describedby="student_arm">
                            </div>
                        </div>
                    </div>

                    <hr>
                    <!--row 2-->
                    <!-- payment details -->
                    <div class=" row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="school_fees">School Fees (N)</label>
                                <input type="text" class="form-control " value=" <?php echo $school_fees; ?>" name="school_fees" id="school_fees">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="discount">Discount</span></label>
                                <input type="text" class="form-control " value=" <?php echo $discount; ?>" name="discount" id="discount">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="boarding_fees">Boarding Fees</span></label>
                                <input type="text" class="form-control " value=" <?php echo $boarding_fees; ?>" name="boarding_fees" id="boarding_fees">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bus_fees">Bus Fare</span></label>
                                <input type="text" class="form-control " value=" <?php echo $bus_fees; ?>" name="bus_fees" id="bus_fees">
                            </div>
                        </div>



                    </div>
                    <hr>
                    <!--row 3-->
                    <!-- payment details -->
                    <div class=" row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="books">Books</span></label>
                                <input type="text" class="form-control " value=" <?php echo $books_fees; ?>" name="books" id="3rd_depo">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="wears">Wears</span></label>
                                <input type="text" class="form-control " value=" <?php echo $wears; ?>" name="wears" id="wears" aria-describedby="amount_paid">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="arrears">Arrears</span></label>
                                <input type="text" class="form-control " value=" <?php echo $arrears; ?>" name="arrears" id="arrears" aria-describedby="amount_paid">
                            </div>
                        </div>


                    </div>


                    <hr>

                    <div class="form-group ">

                        <button type="submit" class="btn btn-primary " name="edit_bill">Update Student Bill</button>

                    </div>

                </form>

            </div>

        </div>

    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>