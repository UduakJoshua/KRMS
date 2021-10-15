<?php
require_once "./controller/e_videos_logic.php";
$title = "BCA | E-Learning";
include_once './model/inc/dashboard_header.php';




?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Set Assignment</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>

        <div class="row justify-content-center">
            <div class="col-md-9">
                <form action="e_assignment.php" method="POST">
                    <input type="hidden" class="form-control " name="id" value="<?php echo $id ?>">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <?php
                                require_once './controller/subject_logic.php';
                                $select_sql = "SELECT * FROM subject";
                                $sql_result = $conn->query($select_sql);
                                ?>
                                <select name="subject" id="subject" class="form-control " value>
                                    // using a while loop to iterate the class table
                                    <?php
                                    while ($row = $sql_result->fetch_assoc()) : ?>
                                        <option value="<?php echo $row['subject_title'] ?>"><?php echo $row['subject_title']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student_class">Class</label>
                                <?php
                                require_once './controller/class_logic.php';
                                $select_sql = "SELECT * FROM classes ";
                                $sql_result = $conn->query($select_sql);
                                ?>
                                <select name="student_class" id="student_class" class="form-control " value>
                                    // using a while loop to iterate the class table
                                    <?php
                                    while ($row = $sql_result->fetch_assoc()) : ?>
                                        <option value="<?php echo $row['className'] ?>"><?php echo $row['className']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="term">Term:</label>
                                <select name="term" id="term" class="form-control " value>
                                    <option value="1st Term">1<sup>st</sup> Term </option>
                                    <option value="2nd Term">2<sup>nd</sup> Term </option>
                                    <option value="3rd Term">3<sup>rd</sup> Term </option>
                                </select>
                            </div>
                        </div>



                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">

                                <textarea class="form-control " name="instruction" value="" rows="4" placeholder="Give Instructions to the assignment here"></textarea>

                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <?php if ($update == true) :
                                ?>
                                    <button type="submit" class="btn btn-primary " name="update_v">Update</button>
                                <?php else : ?>

                                    <button type="submit" class="btn btn-primary " name="set_assignment">Set Assignment</button>
                                <?php endif; ?>


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