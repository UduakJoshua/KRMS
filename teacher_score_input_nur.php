<?php
require "./controller/score_upload_init.php";
require "./controller/student_logic.php";
$title = "BCA | Score Input";
include_once './model/inc/staff_dashboard_header.php';
?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Student's Score Input</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p><?php echo $_SESSION['staff-username']; ?></p>
            </div>

        </div>
    </div>


    <section class="container-fluid">
        <div class="bg-info p-2 text-white">
            <h5><strong>Attention!</strong></h5>
            <ul>
                <li>Type in the scores for each column</li>
                <li>For columns without scores type in <strong>ZERO</strong></li>
                <li>Skip any student without score</li>
                <li>Click the Save Scores Button to upload score</li>
                <li>Click the Input Another Score Button below the return message to input another score</li>
            </ul>
        </div>
        <hr>

        <?php
        include_once 'controller/score_upload_logic.php';

        ?>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="teacher_score_input_nur.php" method="POST">

                    <div class="card">
                        <!--card header begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <h5>Input Scores</h5>
                                </div>
                            </div>
                        </div>
                        <!-- card body begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">

                                    <?php
                                    include_once 'controller/score_upload_init.php';


                                    $c_arm = $_SESSION['arm'];
                                    $class = $_SESSION['class'];
                                    $term = $_SESSION['term'];
                                    $aSession = $_SESSION['aSession'];
                                    $subject = $_SESSION['subject'];
                                    //query
                                    $sql = "SELECT * FROM student WHERE classArm =  '$c_arm' && class_name = '$class' ORDER BY surname ASC";
                                    $result = $conn->query($sql);
                                    ?>

                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) : ?>
                                        <div class="row mt-1 ml-auto mr-2">
                                            <div class="col-md-2">
                                                <input type="text" name="student_name[]" value="<?php echo $row['surname'] . " " . $row['firstname'] ?>" readonly class="form-control" size="50">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="admin_no[]" value="<?php echo $row['admissionNo']  ?>" readonly class="form-control" size="30">
                                            </div>

                                            <div class="col-md-2">
                                                <input type="text" name="student_class" value="<?php echo $row['class_name'] ?>" readonly class="form-control" size="40">
                                            </div>

                                            <div class="col-md-2">
                                                <input type="text" name="class_arm" value="<?php echo $row['classArm'] ?>" readonly class="form-control" size="40">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="subject" value="<?php echo $subject ?>" readonly class="form-control" size="30">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="text" name="term" value="<?php echo $term ?>" readonly class="form-control" size="30">
                                            </div>
                                            <div class="col-md-1">
                                                <td><input type="text" name="a_session" value="<?php echo $aSession ?>" readonly class="form-control" size="30">
                                            </div>

                                        </div>
                                        <div class="row mt-1 ml-auto mr-2">
                                            <div class="col-md-2">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">T1</span>
                                                    </div>
                                                    <input type="number" name="T1[]" class="form-control" placeholder="0" aria-label="T1" aria-describedby="basic-addon1" maxlength="2" max="10">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">T2</span>
                                                    </div>
                                                    <input type="number" name="T2[]" class="form-control" placeholder="0" aria-label="T2" aria-describedby="basic-addon1" maxlength="2" max="20">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Exam</span>
                                                    </div>
                                                    <input type="number" name="exam[]" class="form-control" placeholder="0" aria-label="exam" aria-describedby="basic-addon1" maxlength="2" max="70">
                                                </div>
                                            </div>
                                            <div class="col-md-2" hidden>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Project</span>
                                                    </div>
                                                    <input type="number" name="project[]" class="form-control" value="0" aria-label="project" aria-describedby="basic-addon1" maxlength="2" max="10" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md-2" hidden>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Ass</span>
                                                    </div>
                                                    <input type="number" name="assign[]" class="form-control" value="0" aria-label="assignment" aria-describedby="basic-addon1" maxlength="2" max="20" hidden>
                                                </div>
                                            </div>

                                        </div>
                                        <hr>
                                    <?php endwhile; ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="save_exam_scores">Save Score</button>
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