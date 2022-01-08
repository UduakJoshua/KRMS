<?php
require_once './controller/dbase_conn.php';
require_once './controller/student_result_list_init.php';
require_once 'controller/bill_upload_logic.php';
$title = "BCA | Bill Students";
include_once './model/inc/dashboard_header.php';
$c_arm = $_SESSION['arm'];
$c_arm = $_SESSION['arm'];
$class = $_SESSION['class'];
$term = $_SESSION['term'];
$aSession = $_SESSION['aSession'];


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

        <?php


        if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                <li><?php echo $_SESSION['message'] ?></li>
                <?php unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="fees_billing.php" method="POST">


                    <div class="row">
                        <div class="col-md-12">

                            <h5>Students Bill for
                                <?php
                                echo $_SESSION['class'] . " " . $_SESSION['arm'];

                                ?></h5>
                        </div>
                    </div>

                    <!-- card body begins here-->
                    <div class="row">
                        <div class="col-md-12">

                            <table class="table table-responsive ">
                                <thead class="thead-dark ">
                                    <tr style="font-size: 12px;">

                                        <th scope="col">Name</th>
                                        <th scope="col">Admission No</th>
                                        <th scope="col">School Fees</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Bus</th>
                                        <th scope="col">Books</th>
                                        <th scope="col">Wears</th>
                                        <th scope="col">Arrears</th>
                                        <th scope="col">Status</th>

                                    </tr>
                                </thead>
                                <tbody class="ml-1 pt-2" style="font-size: 10px;">
                                    <?php

                                    //query
                                    $sql = "SELECT surname, firstname, admissionNo, fatherMail, motherMail,
                                     (SELECT fees FROM fees_schedule WHERE student_class = '$class' && term='$term' ) AS fees 
                                     FROM student WHERE classArm =  '$c_arm' && class_name = '$class'";
                                    $result = $conn->query($sql);
                                    ?>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) : ?>
                                        <tr>
                                            <input type="hidden" name="student_class" value="<?php echo $class ?>" class="form-control">
                                            <input type="hidden" name="student_arm" value="<?php echo $c_arm ?>" class="form-control">
                                            <input type="hidden" name="a_session" value="<?php echo $aSession ?>" class="form-control">
                                            <input type="hidden" name="term" value="<?php echo $term ?>" class="form-control">
                                            <input type="hidden" name="email_dad" value="<?php echo $row['fatherMail'] ?>" class="form-control">
                                            <input type="hidden" name="email_mom" value="<?php echo $row['motherMail'] ?>" class="form-control">
                                            <td><input type="text" name="student_name[]" value="<?php echo $row['surname'] . " " . $row['firstname'] ?>" readonly class="form-control" size="50"></td>
                                            <td><input type="text" name="admin_no[]" value="<?php echo $row['admissionNo']  ?>" readonly class="form-control" size="30"></td>
                                            <td><input type="text" name="school_fees" value="<?php echo $row['fees'] ?>" class="form-control" size="50"></td>
                                            <td><input type="text" name="discount[]" value="<?php echo $discount ?>" class="form-control" size="50"></td>
                                            <td><input type="text" name="bus[]" value="<?php echo $bus ?>" class="form-control" size="50"></td>
                                            <td><input type="text" name="books[]" value="<?php echo $books ?>" class="form-control" size="50"></td>
                                            <td><input type="text" name="wears[]" value="<?php echo $wears ?>" class="form-control" size="50"></td>
                                            <td><input type="text" name="arrears[]" value="<?php echo $arrears ?>" class="form-control" size="50"></td>
                                            <td><button type="button" class="btn btn-primary btn-sm" disabled>Not Billed</button></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <!--card footer begins here-->
                    <div class="row">
                        <div class="col-md-12">
                            <td><button type="submit" class="btn btn-primary" name="bill_student">Bill Students</button></td>
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