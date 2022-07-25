<?php
require "./controller/score_upload_init.php";
$title = "BCA | Score Input";
include_once './model/inc/staff_dashboard_header.php';
?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Student's Scores Initialization</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p><?php echo $_SESSION['staff-username']; ?></p>
            </div>

        </div>
    </div>


    <section>

        <?php

        if (isset($_SESSION['upload'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                <?php echo $_SESSION['upload'];
                unset($_SESSION['upload']);
                ?>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="teacher_exam_init.php" method="POST">
                    <div class="card">
                        <!--card header begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <h5>Select Parameters</h5>
                                </div>
                            </div>
                        </div>
                        <!-- card body begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div class="row">
                                   <?php include_once './model/inc/select_class.php';?>

                                                <!-- subject select-->
                                   <?php include_once './model/inc/select_subject.php';?>
                                       

                                        <div class="col-md-2">
                                            <label for="term">Term</label>

                                            <select name="term" id="term" class="form-control ">

                                                <option value="1st Term"> 1st Term </option>
                                                <option value="2nd Term"> 2nd Term </option>
                                                <option value="3rd Term"> 3rd Term </option>

                                            </select>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="aSession">Session</label>

                                            <select name="aSession" id="aSession" class="form-control ">


                                                <option value="2021/2022"> 2021/2022 </option>
                                                <option value="2022/2023"> 2022/2023</option>

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
                                    <?php
                                    $section = $_SESSION['section'];
                                    if ($section == "Secondary" || $section == "General") :
                                    ?>
                                        <button type="submit" class="btn btn-secondary" name="teacher_ex_init">Initialize</button>
                                    <?php
                                    elseif ($section == "Primary") :
                                    ?>
                                        <button type="submit" class="btn btn-primary" name="teacher_ex_init_pry">Initialize</button>
                                    <?php
                                    else :
                                    ?>
                                        <button type="submit" class="btn btn-warning" name="teacher_ex_init_nur">Initialize</button>
                                    <?php endif; ?>
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