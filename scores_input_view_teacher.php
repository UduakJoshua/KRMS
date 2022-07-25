<?php
require_once 'controller/score_upload_logic.php';
$title = "BCA | Uploaded Scores";
include_once './model/inc/staff_dashboard_header.php';

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">View Uploaded Scores</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p><?php echo $_SESSION['staff-username']; ?></p>
            </div>

        </div>
    </div>



    <section>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="scores_input_view_teacher.php" method="POST">
                    <div class="card">
                        <!--card header begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <h5>Select Class to view Scores</h5>
                                </div>
                            </div>
                        </div>
                        <!-- card body begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- class select logic begins here-->
                                        <?php include_once './model/inc/select_class.php';?>
                                        <!-- class select logic ends here-->

                                        <!-- subject select begins here-->
                                        <?php include_once './model/inc/select_subject.php';?>
                                        <!-- subject select ends here-->

                                        <!-- select term-->
                                        <div class="col-md-2">
                                            <label for="term">Term</label>
                                            <select name="term" id="term" class="form-control ">
                                                <option value="1st Term"> 1st Term </option>
                                                <option value="2nd Term"> 2nd Term </option>
                                                <option value="3rd Term"> 3rd Term </option>
                                            </select>
                                        </div>
                                        <!-- select session-->
                                        <div class="col-md-2">
                                            <label for="aSession">Session</label>
                                            <select name="aSession" id="aSession" class="form-control ">
                                                <option value="2021/2022"> 2021/2022 </option>
                                                <option value="2022/2023"> 2022/2023</option>
                                                <option value="2023/2024"> 2023/2024</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--card footer begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="scores_view_teacher">Display Scores</button>
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