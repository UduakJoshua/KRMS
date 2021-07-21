<?php
require "controller/score_logic.php";
$title = "BCA | Result Management";
include_once 'model/inc/dashboard_header.php';
?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Result Management / Class Select</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>



    <section>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h6>Select a Class and Subject then click the Initialize button to input student's scores.</h6>
                    </div>
                    <div class="card-body">
                        <form action="result.php" method="POST">
                            <div class="row">

                                <div class="col-md-2">
                                    <div class="form-group">
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
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="arm">Arm</label>

                                        <select name="arm" id="arm" class="form-control ">

                                            <option value="Joyfulness"> Joyfulness</option>
                                            <option value="Peace"> Peace</option>
                                            <option value="Holiness"> Holiness</option>
                                            <option value="Virtue"> Virtue</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="subject_r">Subject</label>
                                        <?php
                                        require_once "controller/subject_logic.php";
                                        $subject_sql = "SELECT * FROM subject ";
                                        $subject_result = $conn->query($subject_sql);
                                        ?>
                                        <select name="subject_r" id="subject_r" class=" form-control selectpicker dropup" data-dropup-auto="false">
                                            // using a while loop to iterate the class table
                                            <?php
                                            while ($row = $subject_result->fetch_assoc()) : ?>
                                                <option value="<?php echo $row['subject_title']; ?>"><?php echo $row['subject_title']; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="term">Term</label>

                                        <select name="term" id="term" class="form-control ">

                                            <option value="1st Term"> 1st Term </option>
                                            <option value="2nd Term"> 2nd Term </option>
                                            <option value="3rd Term"> 3rd Term </option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="a_session">Session</label>

                                        <select name="a_session" id="a_session" class="form-control ">

                                            <option value="2020/2021"> 2020/2021 </option>
                                            <option value="2021/2022"> 2021/2022 </option>
                                            <option value="2022/2023"> 2022/2023</option>

                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary " name="init_score">Initialize</button>
                            </div>

                        </form>
                    </div>

                </div>

                <hr>

            </div>

        </div>

        <!-- display section for Input-->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h6>Input Student's score</h6>
                    </div>
                    <form action="result.php" method="POST">
                        <div class="card-body input-group input-group-sm">


                            <?php
                            include_once 'controller/student_logic.php';


                            $c_arm = $_SESSION['arm'];
                            $class = $_SESSION['class'];
                            $s_subject = $_SESSION['subject'];


                            // create a select query
                            $sql = "SELECT * FROM student WHERE classArm =  '$c_arm' && class_name = '$class'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) : ?>

                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>

                                    <!--?php foreach ($row as $rowa) : ?-->


                                    <div class="score ">
                                        <div class="row mt-2 ml-auto mr-2">
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="sc_name">Name:</label>
                                                    <input type=" text" name="sc-name" class="form-control" value="<?php echo $row['surname'] . " " . $row['firstname'] . " " . $row['middlename']; ?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="sc_class">Class:</label>
                                                    <input type=" text" name="sc-class" class="form-control" value="<?php echo $class . " " . $c_arm; ?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="sc_name">Admission no:</label>
                                                    <input type=" text" name="sc-name" class="form-control" value="<?php echo $row['admissionNo']; ?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="sc_name">Subject:</label>
                                                    <input type=" text" name="sc-name" class="form-control" value="<?php echo $s_subject; ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- row 2 -->
                                        <div class="row ml-auto mr-2">
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="sc_name">T1:</label>
                                                    <input type=" number" name="t1[]" id="t1" class=" form-control" value="<?php echo $t1 ?>" placeholder="0">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="sc_name">T2:</label>
                                                    <input type=" number" name="t2[]" id="t2" class=" form-control" value="<?php echo $t2 ?>" placeholder="0">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="sc_name">Exam:</label>
                                                    <input type=" number" name="ex[]" id="ex" class=" form-control" value="<?php echo $exam ?>" placeholder="0">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="sc_name">Tot:</label>
                                                    <input type=" number" name="tot[]" id="tot" class=" form-control" value="<?php echo $total ?>" placeholder="0" max="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--?php endforeach; ?-->
                                <?php endwhile; ?>

                            <?php endif; ?>






                        </div>
                        <div class=" card-footer">
                            <div class="row">
                                <div class=" col-md-2 form-group">
                                    <button class="btn btn-primary" name="save_score">Save Scores</button>
                                </div>

                                <div class=" col-md-2 form-group">
                                    <button class="btn btn-warning" name="clear_score">Reset Scores</button>
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
    $title = 'BCA | Dashboard';
    include_once 'model/inc/dashboard_footer.php';
    ?>