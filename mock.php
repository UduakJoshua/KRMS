<?php
require "./controller/score_upload_init.php";
require "./controller/student_logic.php";
$title = "BCA | Mock Input";
include_once './model/inc/staff_dashboard_header.php';

?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Student's Score Input</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['staff-username']; ?></p>
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
                <form action="mock.php" method="POST">
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
                                        <div class="col-md-2">
                                            <label for="student_class">Student's Class</label>

                                            <?php
                                            require_once "controller/class_logic.php";
                                            $select_sql = "SELECT * FROM classes WHERE className = 'JSS Three' || className = 'SSS Three' ";
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


                                                <option value="Goodness"> Goodness</option>
                                                <option value="Holiness"> Holiness</option>
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
                                        <div class="col-md-2">
                                            <label for="mock_no">Mock</label>

                                            <select name="mock_no" id="mock_no" class="form-control ">

                                                <option value="1st Mock"> Mock I </option>
                                                <option value="2nd Mock"> Mock II </option>
                                                <option value="3rd Mock"> Mock III </option>
                                                <option value="1st Mock"> Mock IV </option>
                                                <option value="2nd Mock"> Mock V </option>
                                                <option value="3rd Mock"> Mock VI </option>

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
                                    <button type="submit" class="btn btn-primary" name="mock_init">Initialize</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>

        </div>



        <hr>

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
                        <h6>Input Student's Mock Scores</h6>
                    </div>
                    <form action="mock.php" method="POST">
                        <div class="card-body input-group input-group-sm">


                            <?php

                            include_once 'controller/score_upload_init.php';


                            $c_arm = $_SESSION['arm'];
                            $class = $_SESSION['class'];
                            $term = $_SESSION['term'];
                            $aSession = $_SESSION['aSession'];
                            $subject = $_SESSION['subject'];
                            $mock_no =  $_SESSION['mock_no'];
                            //$_SESSION['term'] = "";



                            // create a select query
                            $sql = "SELECT * FROM student WHERE classArm =  '$c_arm' && class_name = '$class' ORDER BY surname ASC";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) : ?>

                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>

                                    <!--?php foreach ($row as $rowa) : ?-->


                                    <div class="score ">
                                        <div class="row mt-1 ml-auto mr-2">


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

                                                    <input type="number" name="score[]" max="100" placeholder="Enter Score " class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">

                                                    <input type="text" readonly name="subject" value="<?php echo $subject ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group ">

                                                    <input type=" text" name="term" class="form-control" readonly value="<?php echo $term ?>">
                                                </div>
                                            </div>


                                            <div class="col-md-2">
                                                <div class="form-group ">

                                                    <input type=" text" name="student_class" class="form-control" readonly value="<?php echo $class . " " . $c_arm ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group ">

                                                    <input type=" text" name="a_session" class="form-control" readonly value="<?php echo $aSession ?>" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group ">

                                                    <input type=" text" name="mock_no" class="form-control" readonly value="<?php echo $mock_no ?>" hidden>
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
                                    <button class="btn btn-primary" name="save_mock">Save Scores</button>
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