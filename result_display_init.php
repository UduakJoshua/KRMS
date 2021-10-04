<?php
require './controller/dbase_conn.php';
require './controller/student_result_list_init.php';

$title = "BCA | Result View";
include_once './model/inc/dashboard_header.php';

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Print/View Result</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>
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
                    <form action="result_display_init.php" method="POST">
                        <div class="card">
                            <!--card header begins here-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <h5>Select Class to view result</h5>
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


                    <div class="card">
                        <!--card header begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <h5>Display Result</h5>
                                </div>
                            </div>
                        </div>
                        <!-- card body begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <table class="table table-condensed table-responsive ">
                                        <thead class="thead-dark ">
                                            <tr style="font-size: 12px;">
                                                <th scope="col">Select</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Admission No</th>
                                                <th scope="col">Class</th>
                                                <th scope="col">Session</th>
                                                <th scope="col">Term</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="ml-1 pt-2" style="font-size: 10px;">
                                            <?php



                                            $c_arm = $_SESSION['arm'];
                                            $class = $_SESSION['class'];
                                            $term = $_SESSION['term'];
                                            $aSession = $_SESSION['aSession'];

                                            //query
                                            $sql = "SELECT * FROM student WHERE classArm =  '$c_arm' && class_name = '$class'";
                                            $result = $conn->query($sql);
                                            ?>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) : ?>
                                                <tr>
                                                    <td><input type="checkbox" name="chk[]" value="<?php echo $row['admissionNo'] ?>" /></td>
                                                    <td><input type="text" name="student_name[]" value="<?php echo $row['surname'] . " " . $row['firstname'] ?>" readonly class="form-control" size="50"></td>
                                                    <td><input type="text" name="admin_no" value="<?php echo $row['admissionNo']  ?>" readonly class="form-control" size="30"></td>
                                                    <td><input type="text" name="student_class" value="<?php echo $row['class_name'] . " " . $row['classArm'] ?>" readonly class="form-control" size="30"></td>
                                                    <td><input type="text" name="a_session" value="<?php echo $aSession ?>" readonly class="form-control" size="30"></td>
                                                    <td><input type="text" name="term" value="<?php echo $term ?>" readonly class="form-control" size="30"></td>
                                                    <td><a href="result_display.php?display=<?php echo $row['admissionNo']; ?>"><button type="button" class="btn btn-primary" name="display_result">Display</button></a></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
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
    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>