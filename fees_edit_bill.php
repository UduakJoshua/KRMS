<?php
require_once './controller/dbase_conn.php';
require_once './controller/student_result_list_init.php';

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
        include_once './controller/bill_upload_logic.php';

        ?>

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

                            <table class="table ">
                                <thead class="thead-dark ">
                                    <tr style="font-size: 12px;">

                                        <th scope="col">Name</th>
                                        <th scope="col">School Fees</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Boarding</th>
                                        <th scope="col">Bus</th>
                                        <th scope="col">Books</th>
                                        <th scope="col">Wears</th>
                                        <th scope="col">Arrears</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody class="ml-1 pt-2" style="font-size: 10px;">
                                    <?php

                                    //query
                                    $sql = "SELECT * FROM fees_total 
                                    WHERE term ='$term' && student_arm =  '$c_arm' && student_class = '$class'
                                    ORDER BY student_name ASC";
                                    $result = $conn->query($sql);
                                    ?>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) : ?>
                                        <tr>
                                            <input type="hidden" name="student_class" value="<?php echo $class ?>" class="form-control">
                                            <input type="hidden" name="student_arm" value="<?php echo $c_arm ?>" class="form-control">
                                            <input type="hidden" name="a_session" value="<?php echo $aSession ?>" class="form-control">
                                            <input type="hidden" name="term" value="<?php echo $term ?>" class="form-control">
                                            <td style="width:20%;"><input type="text" name="student_name[]" value="<?php echo $row['student_name'] ?>" readonly class="form-control" size="50"></td>
                                            <input type="hidden" name="admin_no[]" value="<?php echo $row['admission_no']  ?>" readonly class="form-control" size="30">
                                            <td><input type="text" name="school_fees" value="<?php echo $row['school_fees'] ?>" class="form-control" size="50"></td>
                                            <td><input type="text" name="discount[]" value="<?php echo $row['discount'] ?>" class="form-control" size="50" placeholder="discount"></td>
                                            <td><input type="text" name="boarding[]" value="<?php echo $row['boarding_fees'] ?>" class="form-control" size="50" placeholder="boarding"></td>
                                            <td><input type="text" name="bus[]" value="<?php echo $row['bus_fees'] ?>" class="form-control" size="50" placeholder="bus"></td>
                                            <td><input type="text" name="books[]" value="<?php echo $row['books_fees'] ?>" class="form-control" size="50" placeholder="books"></td>
                                            <td><input type="text" name="wears[]" value="<?php echo $row['wears_fees'] ?>" class="form-control" size="50" placeholder="wears"></td>
                                            <td><input type="text" name="arrears[]" value="<?php echo $row['arrears'] ?>" class="form-control" size="50" placeholder="arrears"></td>
                                            <td> <a href="edit_bill.php?edit-bill=<?php echo $row['id']; ?>" class=" btn btn-warning btn-sm">Edit</a></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <!--card footer begins here-->


                </form>
            </div>


        </div>





    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>