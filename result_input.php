<?php
require "./controller/result_input_logic.php";
$title = "BCA | Student Management";
include_once './model/inc/dashboard_header.php';
?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Upload Student Result</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>

        <div class="row justify-content-center">
            <?php

            if (isset($_SESSION['upload'])) : ?>
                <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                    <?php echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                    ?>
                </div>
            <?php endif ?>
            <div class="col-md-9">
                <form action="result_input.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="mt_result">Input Result</label>
                                <input type="file" name="mt_result">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="admission_no">Admission No:</label>
                                <input type="text" name="admission_no" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="classes">Class:</label>
                                <input type="text" name="classes" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="term">Term:</label>
                                <input type="text" name="term" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="aSession">Session:</label>
                                <input type="text" name="aSession" class="form-control">
                            </div>
                        </div>

                    </div>
                    <hr>

                    <div class="form-group">
                        <button class="btn btn-primary " name="mt_upload">Upload Result</button>
                    </div>


                </form>

            </div>

        </div>

    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>