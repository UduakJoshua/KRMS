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
                <form action="mock_view_teacher.php" method="POST">
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
                                                $select_sql = "SELECT * FROM subject ORDER BY subject_title ASC";
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
                                    <button type="submit" class="btn btn-primary" name="mock_scores_teacher">Display Mock Scores</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <?php $conn->close(); ?>
    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>