<?php
require './controller/dbase_conn.php';
require './controller/student_result_list_init.php';
$title = "BCA | Bill Students";
include_once './model/inc/dashboard_header.php';

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Bill Students </h1>
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
                    <form action="fees_billing.php" method="POST">
                        <div class="card">
                            <!--card header begins here-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <h5>Select Class to Bill</h5>
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
                                        <button type="submit" class="btn btn-primary" name="fees_bill">Initialize</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>

            </div>

            <hr>

            <?php
            include_once 'controller/bill_upload_logic.php';

            if (isset($_SESSION['upload'])) : ?>
                <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                    <li><?php echo $_SESSION['upload'] ?></li>
                    <?php unset($_SESSION['upload']);
                    ?>
                </div>
            <?php endif; ?>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <form action="fees_billing.php" method="POST">

                        <div class="card">
                            <!--card header begins here-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <h5>Students Bill for
                                            <?php
                                            echo $_SESSION['class'] . " " . $_SESSION['arm'];

                                            ?></h5>
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
                                        $sql = "SELECT * FROM student WHERE classArm =  '$c_arm' && class_name = '$class'";
                                        $result = $conn->query($sql);
                                        ?>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) : ?>
                                            <div class="row" style="font-size: 10px;">
                                                <div class="col-md-3">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1" style="font-size: 13px;">Name</span>
                                                        </div>
                                                        <input type=" text" name="student_name[]" value="<?php echo $row['surname'] . " " . $row['firstname'] ?>" readonly class="form-control" ria-describedby="basic-addon1">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon2" style="font-size: 13px;">Admission No</span>
                                                        </div>
                                                        <input type="text" name="admin_no" value="<?php echo $row['admissionNo']  ?>" readonly class="form-control" size="30"></td>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon3" style="font-size: 13px;">Class</span>
                                                        </div>
                                                        <input type="text" name="student_class" value="<?php echo $row['class_name'] . " " . $row['classArm'] ?>" readonly class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon4" style="font-size: 13px;">Fees</span>
                                                        </div>
                                                        <input type="number" name="fees" id="fees" value=0 class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- second row-->
                                            <div class="row" style="font-size: 10px;">
                                                <div class="col-md-2">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon5" style="font-size: 13px;">Discount</span>
                                                        </div>
                                                        <input type="discount" name="discount" id="discount" value=0 class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon6" style="font-size: 13px;">Books</span>
                                                        </div>
                                                        <input type="number" name="books" id="books" value=0 class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon7" style="font-size: 13px;">Bus</span>
                                                        </div>
                                                        <input type="number" name="bus" id="bus" value=0 class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon8" style="font-size: 13px;">Arrears</span>
                                                        </div>
                                                        <input type="number" name="arrears" id="arrears" value=0 class="form-control">
                                                    </div>
                                                </div>

                                            </div>
                                            <hr>
                                        <?php endwhile; ?>


                                    </div>
                                </div>

                            </div>
                            <!--card footer begins here-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-footer">
                                        <td><button type="button" class="btn btn-primary" name="bill_student">Bill Students</button></td>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>

            </div>

        </section>
    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>