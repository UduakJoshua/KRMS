<?php
require "./controller/score_upload_init.php";
require "./controller/student_logic.php";
$title = "BCA | Mid-Term Score Input";
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
                        <h6>Input Student's Mid-Term Scores</h6>
                    </div>
                    <form action="mid_term_score.php" method="POST">
                        <div class="card-body input-group input-group-sm">

                            <?php
                            $c_arm = $_SESSION['arm'];
                            $class = $_SESSION['class'];
                            $term = $_SESSION['term'];
                            $aSession = $_SESSION['aSession'];
                            $subject = $_SESSION['subject'];
                            // create a select query
                            $sql = "SELECT *  FROM student   
                            WHERE class_name = ? && classArm = ? ORDER BY surname ASC";

                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param('ss', $class, $c_arm);
                            $stmt->execute();

                            $result = $stmt->get_result();
                            //$row = $result->fetch_assoc();
                            if (mysqli_num_rows($result) > 0) : ?>

                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>

                                    <!--?php foreach ($row as $rowa) : ?-->


                                    <div class="score ">
                                        <div class="row mt-1 ml-auto mr-2">

                                            <input type="hidden" class="form-control " name="id" value="<?php echo $id ?>">
                                            <div class="col-md-2">
                                                <div class="form-group ">

                                                    <input type=" text" name="student_name[]" class="form-control" readonly value="<?php echo $row['surname'] . " " . $row['firstname']; ?>">
                                                </div>
                                            </div>



                                            <div class="col-md-2">
                                                <div class="form-group ">

                                                    <input type=" text" name="admin_no[]" class="form-control" readonly value="<?php echo $row['admissionNo']; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">

                                                    <input type="number" name="T2[]" value="<?php echo $row['T2']; ?>" placeholder=" Enter T2 " class=" form-control" max="20">
                                                </div>
                                            </div>


                                            <div class="col-md-2">
                                                <div class="form-group">

                                                    <input type="text" readonly name="subject" value="<?php echo $subject ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group ">

                                                    <input type=" text" name="student_class" class="form-control" readonly value="<?php echo $class  ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <input type=" text" name="class_arm" class="form-control" readonly value="<?php echo $c_arm ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group ">

                                                    <input type=" text" name="term" class="form-control" readonly value="<?php echo $term ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group ">

                                                    <input type=" text" name="a_session" class="form-control" readonly value="<?php echo $aSession ?>" hidden>
                                                </div>
                                            </div>
                                        </div>

                                        <!--?php endforeach; ?-->
                                    </div>

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <div class=" card-footer">
                            <div class="row">
                                <div class=" col-md-2 form-group">
                                    <button class="btn btn-primary" name="save_mid">Save Scores</button>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="reset" class="btn btn-secondary">
                                    </div>

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