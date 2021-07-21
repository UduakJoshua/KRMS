<?php
require "./controller/student_logic.php";
require "./controller/accounts-management.php";
require "./controller/pagination.php";
$title = "BCA | Student List";
include_once './model/inc/dashboard_header.php';
?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Account Management / List</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>
        <div class=" container-fluid  justify-content-center">
            <!-- search table -->
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-title ml-4">
                            <p>Search Student's Record</p>
                            <form action="accounts.php" method="POST">
                                <div class="input-group mb-3 p-4">
                                    <input type="text" name="search" class="form-control" value="<?php echo $search; ?>">
                                    <button type="submit" name="submit" class="btn btn-primary"> Search</button>
                                </div>



                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <!-- end of search table -->
            <hr>
            <div>


            </div>



            <div class="card mt-4">

                <?php

                if (isset($_SESSION['update'])) : ?>
                    <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                        <?php echo $_SESSION['update'];
                        unset($_SESSION['update']);
                        ?>
                    </div>
                <?php endif ?>

                <div class="card-header">
                    <p>Please select a student to activate or suspend the account</p>
                </div>

                <div class="card-body">
                    <form action="accounts.php" method="post">
                        <table class="table table-striped table-sm w-auto table-responsive width-auto" id="example">
                            <thead class="thead-dark ">
                                <tr style="font-size: 12px;">
                                    <th scope="col">Select</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Admission No</th>
                                    <th scope="col">Surname</th>
                                    <th scope="col">Firstname</th>
                                    <th scope="col">Middlename</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Status</th>
                                    <th colspan="2" scope="col">Account Action</th>
                                </tr>
                            </thead>
                            <tbody class="ml-2 pt-2" style="font-size: 12px;">
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <tr>
                                        <td><input type="checkbox" name="chk[]" value="<?php echo $row['id'] ?>" /></td>
                                        <td style="width:auto;">
                                            <div id="content">
                                                <?php
                                                echo "<div class = 'img_div'>";
                                                echo "<img src='assets/img/" . $row['image'] . "' >";
                                                echo "</div>";
                                                ?>
                                        </td>

                                        <td><?php echo $row['admissionNo'] ?></td>
                                        <td><?php echo $row['surname'] ?></td>
                                        <td><?php echo $row['firstname'] ?></td>
                                        <td><?php echo $row['middlename'] ?></td>
                                        <td><?php echo $row['class_name'] . " " . $row['classArm'] ?></td>
                                        <td>
                                            <?php if ($row['stat'] == 1) : ?>

                                                <button class="btn btn-primary btn-sm " disabled>Active</button>

                                            <?php else : ?>
                                                <button class="btn btn-danger btn-sm " disabled>Suspended</button>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-success btn-sm" name="activate">Activate</button>
                                            <button type="submit" class="btn btn-warning btn-sm" name="suspend">Suspend</button>

                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <div>
                            <button type="submit" class="btn btn-success" name="activate">Activate</button>
                            <button type="submit" class="btn btn-warning" name="suspend">Suspend</button>

                        </div>
                    </form>

                </div>
                <div class="bg-light pt-2">
                    <?php
                    $page_query =    "SELECT * FROM student ORDER BY class_name ASC";
                    $page_result = $conn->query($page_query);

                    $total_records = mysqli_num_rows($page_result);

                    $total_pages = ceil($total_records / $record_per_page);

                    for ($i = 1; $i <= $total_pages; $i++) {

                        echo  "<a href='accounts.php?page=" . $i . "' class='btn btn-primary ml-2 mb-2'>$i </a>";
                    }
                    ?>


                </div>
            </div>
        </div>

    </section>
    <hr>

    <?php
    include_once './model/inc/dashboard_footer.php';
    ?>