<?php
require "./controller/score_upload_logic_test.php";
$title = "BCA | Manage Exam Scores";
include_once './model/inc/dashboard_header.php';

?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Student's Score Management</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>

        <?php
        //include_once 'controller/score_upload_logic_test.php';

        if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                <li><?php echo $_SESSION['message'] ?></li>
                <?php unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h6>Modify Student's Exam Scores</h6>
                    </div>
                    <form action="scores_edit.php" method="POST">
                        <div class="card-body input-group input-group-sm">

                            <div class="row mt-1 ml-auto mr-2">

                                <input type="hidden" class="form-control " name="id" value="<?php echo $id ?>">
                                <div class="col-md-3">
                                    <div class="form-group ">

                                        <input type=" text" name="student_name" class="form-control" readonly value="<?php echo $student_name ?>">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group ">

                                        <input type=" text" name="admin_no" class="form-control" readonly value="<?php echo $admission_no ?>">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">

                                        <input type="text" name="subject" value="<?php echo $subject; ?>" readonly class=" form-control">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">

                                        <input type="text" readonly name="student_class" value="<?php echo $class ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group ">

                                        <input type=" text" name="class_arm" class="form-control" readonly value="<?php echo $class_arm ?>">
                                    </div>
                                </div>


                            </div>
                            <div class="row mt-1 ml-auto mr-2">

                                <div class="col-md-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">T1</span>
                                        </div>
                                        <input type="number" name="T1" class="form-control" value="<?php echo $T1 ?>" aria-label="T1" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">T2</span>
                                        </div>
                                        <input type="number" name="T2" class="form-control" value="<?php echo $T2 ?>" aria-label="T1" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Assign</span>
                                        </div>
                                        <input type="number" name="assignment" class="form-control" value="<?php echo $assignment ?>" aria-label="T1" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Pro</span>
                                        </div>
                                        <input type="number" name="project" class="form-control" value="<?php echo $project ?>" aria-label="T1" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Exam</span>
                                        </div>
                                        <input type="number" name="exam" class="form-control" value="<?php echo $exam ?>" aria-label="T1" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group ">

                                        <input type=" text" name="term" class="form-control" readonly value="<?php echo $term ?>">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group ">

                                        <input type=" text" name="a_session" class="form-control" readonly value="<?php echo $a_session ?>" hidden>
                                    </div>
                                </div>
                            </div>




                        </div>
                        <div class=" card-footer">
                            <div class="row">
                                <div class=" col-md-2 form-group">
                                    <button class="btn btn-primary" name="update_ex_scores">Update Scores</button>
                                </div>

                            </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>

    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>