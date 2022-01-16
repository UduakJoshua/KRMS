<?php
require './controller/dbase_conn.php';
require './controller/bill_upload_logic.php';
$title = "BCA | Class Payments";
include_once './model/inc/dashboard_header.php';

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">View Class Payment </h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>
        <div class="bg-info p-2 text-white">
            <h5><strong>How to use!</strong></h5>
            <p>To view the termly fees payment by class, simply follow the steps below</p>
            <ul>
                <li>Select the Desired Class </li>
                <li>Select the Arm</li>
                <li>Select the current Term</li>
                <li>Select the current Academic Session</li>
                <li>Click the Display Payments button</li>
            </ul>
        </div>
        <hr>

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
                <form action="fees_view_init.php" method="POST">
                    <div class="card">
                        <!--card header begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <h5>Select Class to view fees payment details</h5>
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
                                            $select_sql = "SELECT * FROM classes ORDER BY className ASC";
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
                                            <label for="arm">Arm</label>
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

                                                <option value="2021/2022">2021/2022</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--card footer begins here-->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">

                                    <button type="submit" class="btn btn-primary" name="class_report">Display Payments</button>
                                </div>

                                <div class="col-md-6">
                                    <a href="fees_report.php"><button type="button" style="width:30%;" class="btn btn-warning">Back</button></a>
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