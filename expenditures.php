<?php
require_once './controller/accounts-management.php';
$title = "BCA | Expenditures";
include_once './model/inc/dashboard_header.php';

?>


<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Expenditure Management</h1>
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
                <form action="expenditures.php" method="POST">

                    <h5>Expenditure Details</h5>
                    <hr>
                    <!-- student's contact information begins here -->
                    <div class="row">

                        <div class="col-md-3">

                            <label for="expenditure_item">Select Item:</label>
                            <select name="expenditure_item" id="expenditure_item" class="form-control ">
                                <option value="Buildings"> Building Maintenance</option>
                                <option value="CSR"> CSR</option>
                                <option value="Depreciation"> Depreciation</option>
                                <option value="Electrical Maintenance"> Electrical Maintenance </option>
                                <option value="Fuel"> Fuel</option>
                                <option value="Furnitures"> Furnitures & Fittings</option>
                                <option value="Hostel"> Hostel</option>
                                <option value="Imprest"> Imprest Account</option>
                                <option value="Loan"> Loan Repayment</option>
                                <option value="MDA"> MDA</option>
                                <option value="Office Equipment"> Office Equipment Maintenance </option>
                                <option value="PHED"> PHED</option>
                                <option value="Salary"> Salary</option>
                                <option value="Stationaries"> Stationaries</option>
                                <option value="Vehicle Maintenace"> Vehicle Maintenance </option>
                            </select>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="amount_spent">Amount Spent: </span></label>
                                <input type="int" class="form-control " name="amount_spent" id="amount_spent" aria-describedby="amount spent">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_ex">Date:</span></label>
                                <input type="date" class="form-control " name="date_ex" id="date_ex" aria-describedby="date expense was made">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="month_ex">Month:</label>
                                <select name="month_ex" id="month_ex" class="form-control ">
                                    <option value="January"> January</option>
                                    <option value="February"> February</option>
                                    <option value="March"> March</option>
                                    <option value="April"> April </option>
                                    <option value="May"> May</option>
                                    <option value="June"> June</option>
                                    <option value="July"> July</option>
                                    <option value="August"> August</option>
                                    <option value="September"> September</option>
                                    <option value="October"> Octber</option>
                                    <option value="November"> November </option>
                                    <option value="December"> December</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <hr>
                    <!--row 4-->
                    <!-- payment details -->
                    <div class=" row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="aSession">Session</label>

                                <select name="aSession" id="aSession" class="form-control ">
                                    <option value="2021/2022"> 2021/2022 </option>
                                    <option value="2022/2023"> 2022/2023</option>
                                </select>

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="term">Term:</span></label>
                                <select name="term" id="term" class="form-control ">
                                    <option value="1st term">1st Term</option>
                                    <option value="2nd term"> 2nd Term</option>
                                    <option value="3rd term"> 3rd Term</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <label for="remark">Remarks:</label>
                            <div class="form-group">

                                <textarea class="form-control " name="remark" value="" rows="4" placeholder="Remark goes here..."></textarea>


                            </div>
                        </div>
                    </div>


                    <hr>
                    <div class="row">
                        <div class=" col-md-6 form-group  mb-4">
                            <button type="submit" class="btn btn-primary" name="postEx">Post Expenditure</button>

                        </div>
                        <div class=" col-md-6 form-group  mb-4">
                            <a href="fees_management.php"><button type="button" class="btn btn-warning">Back to Fees Management</button></a>

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