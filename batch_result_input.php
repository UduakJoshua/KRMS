<?php
require "./controller/score_upload_init.php";
require "./controller/student_logic.php";
$title = "BCA | Score Input";
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

        if (isset($_SESSION['upload'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                <?php echo $_SESSION['upload'];
                unset($_SESSION['upload']);
                ?>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="batch_result_input.php" method="POST">
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
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="student_class">Student's Class</label>

                                            <?php
                                            require_once "controller/class_logic.php";
                                            $select_sql = "SELECT * FROM classes ";
                                            $sql_result = $conn->query($select_sql);
                                            ?>
                                            <select name="student_class" id="student_class" class="form-control ">
                                                // using a while loop to iterate the class table
                                                <?php
                                                while ($row = $sql_result->fetch_assoc()) : ?>
                                                    <option value="<?php echo $row['className']; ?>"><?php echo $row['className']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>

                                        <div class="col-md-2 form-group">
                                            <label for="class">Arm</label>
                                            <select name="arm" id="arm" class="form-control ">

                                                <option value="Faithfulness"> Faithfulness</option>
                                                <option value="Gracefulness"> Gracefulness</option>
                                                <option value="Goodness"> Goodness</option>
                                                <option value="Holiness"> Holiness</option>
                                                <option value="Humility"> Humility</option>
                                                <option value="Joyfulness"> Joyfulness</option>
                                                <option value="Kindness"> Kindness</option>
                                                <option value="Love"> Love</option>
                                                <option value="Meekness"> Meekness</option>
                                                <option value="Peace"> Peace</option>
                                                <option value="Purity"> Purity</option>
                                                <option value="Virtue"> Virtue</option>
                                                <option value="Science"> Science</option>
                                                <option value="Art"> Art</option>


                                            </select>
                                        </div>
                                        <!-- subject select-->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="subject">Subject</label>

                                                <?php
                                                require_once "controller/subject_logic.php";
                                                $select_sql = "SELECT * FROM subject ";
                                                $sql_result = $conn->query($select_sql);
                                                ?>
                                                <select name="subject" id="subject" class="form-control ">
                                                    // using a while loop to iterate the subject table
                                                    <?php
                                                    while ($row = $sql_result->fetch_assoc()) : ?>
                                                        <option value="<?php echo $row['subject_title']; ?>"><?php echo $row['subject_title']; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="term">Term</label>

                                            <select name="term" id="term" class="form-control ">

                                                <option value="1st-Term"> 1st Term </option>
                                                <option value="2nd-Term"> 2nd Term </option>
                                                <option value="3rd-Term"> 3rd Term </option>

                                            </select>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="aSession">Session</label>

                                            <select name="aSession" id="aSession" class="form-control ">

                                                <option value="2020/2021"> 2020/2021 </option>
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
                                    <button type="submit" class="btn btn-primary" name="initialize">Initialize</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>

        </div>

    </section>

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
                <form action="batch_result_input.php" method="POST">

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
                                    $sql = "SELECT * FROM student WHERE classArm =  '$c_arm' && class_name = '$class'";
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
                                        <div class="row">
                                            <input type="number" name="T1[]" class="input-sm form-control" placeholder="T1" value="" maxlength="4" max="20">
                                            <input type="number" name="T2[]" class="input-sm form-control" placeholder="T2" value="" maxlength="4" max="20">
                                            <input type="number" name="project[]" class="input-sm form-control" placeholder="Proj" value="" maxlength="4" max="10">
                                            <input type="number" name="assign[]" class="input-sm form-control" placeholder="Ass" value="" maxlength="4" max="20">
                                            <input type="number" name="exam[]" class="input-sm form-control" placeholder="Exam" value="" maxlength="4" max="60">
                                        </div>

                                </div>
                            <?php endwhile; ?>

                            </div>
                        </div>

                    </div>
                    <!--card footer begins here-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="save_scores">Save Score</button>
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