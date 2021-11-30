<?php
require "./controller/score_upload_logic.php";
$title = "BCA | Edit Mock Scores";
include_once './model/inc/dashboard_header.php';

?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Student's Score Input</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>

        <?php
        include_once 'controller/score_upload_logic.php';

        if (isset($_SESSION['upload'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                <li><?php echo $_SESSION['upload'] ?></li>
                <?php unset($_SESSION['upload']);
                ?>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h6>Modify Student's Mock Scores</h6>
                    </div>
                    <form action="mock_scores_edit.php" method="POST">
                        <div class="card-body input-group input-group-sm">

                            <div class="row mt-1 ml-auto mr-2">

                                <input type="hidden" class="form-control " name="id" value="<?php echo $id ?>">
                                <div class="col-md-2">
                                    <div class="form-group ">

                                        <input type=" text" name="student_name" class="form-control" readonly value="<?php echo $student_name ?>">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group ">

                                        <input type=" text" name="admin_no" class="form-control" readonly value="<?php echo $admission_no ?>">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">

                                        <input type="number" name="score" value="<?php echo $score; ?>" placeholder=" Enter Score " class=" form-control" max="100">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">

                                        <input type="text" readonly name="subject" value="<?php echo $subject ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group ">

                                        <input type=" text" name="student_class" class="form-control" readonly value="<?php echo $class ?>">
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

                                <div class="col-md-2">
                                    <div class="form-group ">

                                        <input type=" text" name="mock_no" class="form-control" readonly value="<?php echo $mock_no ?>" hidden>
                                    </div>
                                </div>
                            </div>




                        </div>
                        <div class=" card-footer">
                            <div class="row">
                                <div class=" col-md-3 form-group">
                                    <button class="btn btn-primary" name="update_mock">Update Mock Scores</button>
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