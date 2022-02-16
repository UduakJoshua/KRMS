<?php
require './controller/dbase_conn.php';
require './controller/bill_upload_logic.php';
$title = "BCA | Fees Report";
include_once './model/inc/dashboard_header.php';

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Fees Report Initialization</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p> <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>

        <div class="bg-info p-2 text-white">
            <h5><strong>How to use!</strong></h5>
            <p>To view the termly fees report, simply follow the steps below</p>
            <ul>
                <li>Select the current Term</li>
                <li>Select the current Academic Session</li>
                <li>Click the Display Report by school button to view Fees Report</li>
                <li>Click the Expenditure Report button to view Termly Expenditures</li>
            </ul>
        </div>
        <hr>
        <?php

        if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                <?php echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="fees_report_init.php" method="POST">
                    <div class="card">
                        <!--card header begins here-->

                        <!-- card body begins here-->





                        <!--report by school begins here-->
                        <div class="card">
                            <!--card header begins here-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header text-danger">
                                        <h6>View Report by School</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- card body begins here-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <label for="termRe">Term</label>

                                                <select name="termRe" id="termRe" class="form-control ">
                                                    <option value="1st Term"> 1st Term </option>
                                                    <option value="2nd Term"> 2nd Term </option>
                                                    <option value="3rd Term"> 3rd Term </option>

                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <label for="a_session">Session</label>

                                                <select name="a_session" id="a_session" class="form-control ">
                                                    <option value="2021/2022"> 2021/2022 </option>
                                                    <option value="2021/2022"> 2021/2022 </option>
                                                    <option value="2022/2023"> 2022/2023</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--card footer begins here-->

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary" name="school_report">Display Report by School</button>
                                    </div>

                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-secondary" name="expenditure_report">Expenditures Report </button>
                                    </div>

                                    <div class="col-md-4">
                                        <a href="fees_report.php"><button type="button" style="width:30%;" class="btn btn-warning">Back</button></a>
                                    </div>


                                </div>
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