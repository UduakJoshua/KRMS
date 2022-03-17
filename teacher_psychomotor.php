<?php
require_once "./controller/score_upload_init.php";
require_once "./controller/student_logic.php";
require "./controller/psychomotor_logic.php";
$title = "BCA | Psychomotor Input";
include_once './model/inc/staff_dashboard_header.php';


?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Student's Psychomotor Input</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p><?php echo $_SESSION['staff-username']; ?></p>
            </div>

        </div>
    </div>


    <section>
        <div class=" container-fluid  ">
            <?php

            if (isset($_SESSION['message'])) : ?>
                <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                    <?php echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif ?>

            <div class="row justify-content-center">
                <div class="col-md-12">


                    <div class="card">
                        <!--card header begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <h5>Add Psychomotor</h5>
                                </div>
                            </div>
                        </div>
                        <!-- card body begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">

                                    <?php
                                    $c_arm = $_SESSION['arm'];
                                    $class = $_SESSION['class'];
                                    $term = $_SESSION['term'];
                                    $aSession = $_SESSION['aSession'];

                                    //query 
                                    $sql = "SELECT *  FROM student WHERE classArm =  '$c_arm' && class_name = '$class'";
                                    $result = $conn->query($sql);
                                    ?>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) : ?>

                                        <div class="row">
                                            <div class="col-md-2">
                                                <input type="text" name="student_name[]" value="<?php echo $row['surname'] . " " . $row['firstname'] ?>" readonly class="form-control" size="50">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="student_class" value="<?php echo $row['class_name'] ?>" readonly class="form-control" size="40">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="class_arm" value="<?php echo $row['classArm'] ?>" readonly class="form-control" size="40">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="a_session" value="<?php echo $aSession ?>" readonly class="form-control" size="30">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="term" value="<?php echo $term ?>" readonly class="form-control" size="30">
                                            </div>

                                            <div class="col-md-2 mt-1">
                                                <!-- this can be wrapped up based on the term, for any new term the approval button should show-->
                                                <?php if ($row['approval'] != " "  && $row['approval'] != 2) : ?>
                                                    <a href="psychomotor_teacher.php?display=<?php echo $row['admissionNo']; ?>"><button type="button" class="btn btn-sm btn-warning" name="display_result">Approve Now</button></a>
                                                <?php else : ?>
                                                    <button type="button" disabled class="btn btn-sm btn-success">Approved</button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <hr>
                                    <?php endwhile; ?>
                                    <?php $conn->close(); ?>

                                </div>
                            </div>

                        </div>
                        <!--card footer begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-footer">

                                </div>
                            </div>
                        </div>
                    </div>



                </div>

            </div>


    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>