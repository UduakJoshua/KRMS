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


<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Post Fees Payment</h1>
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
                <form action="make_pay.php" method="POST">
                    <input type="hidden" class="form-control " name="id" value="<?php echo $id ?>">
                    <h5>Payment Details</h5>
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
                                <label for="total_fees">Total Due (N)</label>
                                <input type="text" class="form-control " readonly value=" <?php echo $total_fees; ?>" name="total_fees" id="total_fees">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="1st_depo">1st Payment</span></label>
                                <input type="text" class="form-control " value=" <?php echo $first_deposit; ?>" name="1st_depo" id="1st_depo">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="2nd_depo">2nd Payment</span></label>
                                <input type="text" class="form-control " value=" <?php echo $second_deposit; ?>" name="2nd_depo" id="2nd_depo">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="3rd_depo">3rd Payment</span></label>
                                <input type="text" class="form-control " value=" <?php echo $third_deposit; ?>" name="3rd_depo" id="3rd_depo">
                            </div>
                        </div>


                    </div>
                    <hr>
                    <!--row 3-->
                    <!-- payment details -->
                    <div class=" row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="amount_paid">Total Amount Paid:</span></label>
                                <input type="text" class="form-control " value=" <?php echo $amount_paid; ?>" readonly name="amount_paid" id="amount_paid" aria-describedby="amount_paid">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_paid1">Date of 1st Payment</span></label>
                                <input type="date" class="form-control " value="<?php echo date('Y-m-d', strtotime($date1)) ?>" name="date_paid1" id="date_paid">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_paid2">Date of 2nd Payment</span></label>
                                <input type="date" class="form-control " value="<?php echo date('Y-m-d', strtotime($date2)) ?>" name="date_paid2" id="date_paid">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_paid3">Date of 3rd Payment</span></label>
                                <input type="date" class="form-control " value="<?php echo date('Y-m-d', strtotime($date3)) ?>" name="date_paid3" id="date_paid">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!--row 4-->
                    <!-- payment details -->
                    <div class=" row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="balance">Total Balance:</span></label>
                                <input type="text" class="form-control " value=" <?php echo $balance; ?>" readonly name="balance" id="balance" aria-describedby="amount_paid">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <label for="mode_pay">Mode of Payment</label>
                            <select name="mode_pay" id="mode_pay" class="form-control ">
                                <option value="Cash"> Cash Deposit </option>
                                <option value="Heritage POS"> Heritage POS </option>
                                <option value="Heritage POS"> FBN POS </option>
                                <option value="Ecobank POS"> Ecobank POS </option>
                                <option value="FBN Deposit"> FBN Deposit </option>
                                <option value="FCMB Deposit"> FCMB Deposit </option>
                                <option value="GTB Deposit"> GTB Deposit </option>
                                <option value="FBN Transfer"> FBN Transfer </option>
                                <option value="FCMB Transfer"> FCMB Transfer </option>
                                <option value="GTB Transfer"> GTB Transfer </option>
                                <option value="Ecobank Transfer"> Ecobank Transfer</option>
                            </select>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_issued">Date Issued</span></label>
                                <input type="date" class="form-control " name="date_issued" id="date_issued">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="bursar">Processed By:</label>
                            <select name="bursar" id="bursar" class="form-control ">
                                <option value="Mrs. Bare"> Mrs. Bare</option>
                                <option value="Mr. James"> Mr. James Alawa </option>
                                <option value="Mr. Joshua"> Mr. Joshua </option>
                                <option value="Mrs. Nwosu"> Mrs. Nwosu </option>
                                <option value="Mrs. Olabisi"> Mrs. Olabisi </option>
                            </select>
                        </div>
                    </div>


                    <hr>

                    <div class="form-group ">

                        <button type="submit" class="btn btn-primary " name="make_pay">Make Payment</button>

                    </div>

                </form>

            </div>

        </div>

    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>