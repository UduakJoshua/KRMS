<?php
require './controller/dbase_conn.php';
require './controller/student_result_list_init.php';

$title = "BCA | Spreadsheet";
include_once './model/inc/dashboard_header.php';

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Print/View Spreadsheet</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


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
                                <h5>Display Spreadsheet</h5>
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
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) : ?>

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
                                            while ($row = mysqli_fetch_assoc($result)) : ?>
                                                <tr>

                                                    <td><input type="checkbox" name="chk[]" value="<?php echo $row['admissionNo'] ?>" /></td>
                                                    <td><input type="text" name="student_name[]" value="<?php echo $row['surname'] . " " . $row['firstname'] ?>" readonly class="form-control" size="50"></td>
                                                    <td><input type="text" name="admin_no" value="<?php echo $row['admissionNo']  ?>" readonly class="form-control" size="30"></td>
                                                    <td><input type="text" name="student_class" value="<?php echo $row['class_name'] . " " . $row['classArm'] ?>" readonly class="form-control" size="30"></td>
                                                    <td><input type="text" name="a_session" value="<?php echo $aSession ?>" readonly class="form-control" size="30"></td>
                                                    <td><input type="text" name="term" value="<?php echo $term ?>" readonly class="form-control" size="30"></td>
                                                    <td>
                                                        <?php if ($row['section'] == "High") :
                                                        ?>
                                                            <a href="re_spreadsheet_high.php?display=<?php echo $row['admissionNo']; ?>"><button type="button" class="btn btn-primary" name="get_spreadsheet">Spreadsheet</button></a>
                                                        <?php else : ?>

                                                            <a href="re_spreadsheet_basic.php?display=<?php echo $row['admissionNo']; ?>"><button type="button" class="btn btn-warning" name="get_spreadsheet">Spreadsheet</button></a>
                                                        <?php endif; ?>


                                                    </td>
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
                <?php else : ?>
                    <div class="col-md-12 bg-warning text-center mt-4 pt-4">
                        <h3>Result for the Selected Class is Not Available</h3>
                        <a href="result_display_init.php"><button type="button" class="btn btn-primary m-4">Select Another Class</button></a>
                    </div>
                <?php endif ?>
                </div>



            </div>

        </div>

    </section>

    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>