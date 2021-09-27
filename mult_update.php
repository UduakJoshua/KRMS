<?php
require "./controller/multiple_upload_init2.php";
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
                        <form action="mult_update.php" method="POST">
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
                                            <option value="Art"> Art</option>
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
                                            <option value="Science"> Science</option>
                                            <option value="Virtue"> Virtue</option>


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
                                        <label for="aSession">Session</label>

                                        <select name="aSession" id="aSession" class="form-control ">

                                            <option value="2020/2021"> 2020/2021 </option>
                                            <option value="2021/2022"> 2021/2022 </option>
                                            <option value="2022/2023"> 2022/2023</option>

                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary " name="initialize">Initialize</button>
                            </div>


                        </form>
                    </div>

                </div>

                <hr>

            </div>

        </div>

        <!-- display section for Input-->



        <?php
        include_once 'controller/multiple_upload_logic_update.php';

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
                        <h6>Input Student's score</h6>
                    </div>
                    <form action="mult_update.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body input-group input-group-sm">


                            <?php
                            include_once 'controller/student_logic.php';


                            $c_arm = $_SESSION['arm'];
                            $class = $_SESSION['class'];
                            $term = $_SESSION['term'];
                            $aSession = $_SESSION['aSession'];
                            //$_SESSION['term'] = "";



                            // create a select query
                            $sql = "SELECT * FROM student WHERE classArm =  '$c_arm' && class_name = '$class'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) : ?>

                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>

                                    <!--?php foreach ($row as $rowa) : ?-->


                                    <div class="score ">
                                        <div class="row mt-1 ml-auto mr-2">


                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="sc_name">Name:</label>
                                                    <input type=" text" name="sc-name" class="form-control" value="<?php echo $row['surname'] . " " . $row['firstname']; ?>">
                                                </div>
                                            </div>



                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="admission_no">Admission no:</label>
                                                    <input type=" text" name="admission_no[]" class="form-control" value="<?php echo $row['admissionNo']; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="term">Term:</label>
                                                    <input type=" text" name="term[]" class="form-control" value="<?php echo $term ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="a_session">Session:</label>
                                                    <input type=" text" name="a_session" class="form-control" value="<?php echo $aSession ?>">
                                                </div>
                                            </div>



                                        </div>
                                        <div class="row mt-1 ml-auto mr-2">
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="class_name">Class:</label>
                                                    <input type=" text" name="class_name" class="form-control" value="<?php echo $class ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label for="class_arm">Arm:</label>
                                                    <input type=" text" name="class_arm" class="form-control" value="<?php echo $c_arm ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="mt_result[]">Input Result</label>
                                                    <input type="file" name="mt_result[]" multiple class="form-control">
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
                                    <button class="btn btn-primary" name="save_result">Upload Results</button>
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
    $title = 'BCA | Dashboard';
    include_once 'model/inc/dashboard_footer.php';
    ?>