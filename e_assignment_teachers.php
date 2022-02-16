<?php
require_once "./controller/e_videos_logic.php";
$title = "BCA | E-Learning";
include_once './model/inc/staff_dashboard_header.php';




?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Set Assignment</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p> <?php echo $_SESSION['staff-username']; ?></p>
            </div>

        </div>
    </div>


    <section class="container-fluid">
        <div class="bg-info p-2 text-white">
            <h5><strong>Attention!</strong></h5>
            <ul>
                <li>Select the Subject, Class and Term to give Assignment</li>
                <li>Type in the instructions on how to do the assignment and the due date</li>
                <li>Set the Exercise no e.g Ex 1, Ex 2 ...</li>
                <li>Attach the assignment ( PDF, DOC, PNG or JPG Format Only)</li>
                <li>Click the Set Assignment Button</li>
            </ul>
        </div>
        <hr>
        <?php

        if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                <?php echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>

        <div class="row justify-content-center">

            <div class="col-md-9">
                <form action="e_assignment_teachers.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" class="form-control " name="id" value="<?php echo $id ?>">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <?php
                                require_once './controller/subject_logic.php';
                                $select_sql = "SELECT * FROM subject ORDER BY subject_title ASC";
                                $sql_result = $conn->query($select_sql);
                                ?>
                                <select name="subject" id="subject" class="form-control " value="<?php echo $row['subject_title'] ?>">
                                    // using a while loop to iterate the class table
                                    <?php
                                    while ($row = $sql_result->fetch_assoc()) : ?>
                                        <option value="<?php echo $row['subject_title'] ?>"><?php echo $row['subject_title']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student_class">Class</label>
                                <?php
                                require_once './controller/class_logic.php';
                                $select_sql = "SELECT * FROM classes ORDER BY className ASC";
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

                        <div class="col-md-3">
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
                            <label for="instruction">Outline Instruction/guideline</label>
                            <div class="form-group">

                                <textarea class="form-control " name="instruction" value="" rows="4" placeholder="Instruction goes here..."></textarea>

                            </div>
                        </div>
                        <div class="col-md-2">

                            <div class="form-group">
                                <label for="assignment_no">Assignment Type:</label>
                                <select name="assignment_no" id="assignment_no" class="form-control " value>
                                    <option value="Weekend Assignment"> Weekend Assignment </option>
                                    <option value="Weekly Assignment"> Weekly Assignment </option>
                                    <option value="MidTerm Assignment"> Mid-Term Assignment </option>
                                    <option value="Holiday Project"> Holiday Project </option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date">Date Posted:</label>
                                <input type="date" name="ass_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="file">Select Assignment</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <?php if ($update == true) :
                                ?>
                                    <button type="submit" class="btn btn-primary " name="update_te">Update</button>
                                <?php else : ?>

                                    <button type="submit" class="btn btn-primary " name="t_assignment">Set Assignment</button>
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