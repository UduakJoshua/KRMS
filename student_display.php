<?php
require "./controller/student_logic.php";
require "./controller/pagination.php";
$title = "BCA | Student List";
include_once './model/inc/dashboard_header.php';
?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Student Management / List</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>
        <div class=" container-fluid  justify-content-center">
            <?php

            if (isset($_SESSION['message'])) : ?>
                <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                    <?php echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif ?>



            <div class="card">
                <div class="card-title ml-4">
                    <p>Search Student's Record</p>
                    <form action="">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" style="width: 50%;">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"> Display Record</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr>


            <div class="card ">

                <div class="card-body">
                    <table class="table table-striped table-sm w-auto table-bordered table-responsive display" id="example">
                        <thead class="thead-dark  thd">
                            <tr style="font-size: 11px;">
                                <th scope="col">Image</th>
                                <th scope="col">Admission No</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Firstname</th>
                                <th scope="col">Middlename</th>
                                <th scope="col">Sex</th>
                                <th colspan "2" scope="col">Date Of Birth</th>
                                <th scope="col">Class</th>
                                <th scope="col">Arm</th>
                                <th scope="col">Father's Name</th>
                                <th scope="col">Father's No</th>
                                <th colspan="2" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="ml-2 pt-2" style="font-size: 11px;">
                            <?php

                            while ($row = mysqli_fetch_assoc($result)) : ?>
                                <tr>
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
                                    <td><?php echo $row['gender'] ?></td>
                                    <td><?php echo $row['dob'] ?></td>
                                    <td><?php echo $row['class_name'] ?></td>
                                    <td><?php echo $row['classArm'] ?></td>
                                    <td><?php echo $row['fatherName'] ?></td>
                                    <td><?php echo $row['fatherNo'] ?></td>
                                    <td>

                                        <a href="./controller/student_logic.php?delete=<?php echo $row['id']; ?>" class=" btn btn-danger btn-sm">Del</a>

                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>


                </div>
                <div class="bg-light pt-2">
                    <?php
                    $page_query =    "SELECT * FROM student ORDER BY class_name ASC";
                    $page_result = $conn->query($page_query);

                    $total_records = mysqli_num_rows($page_result);

                    $total_pages = ceil($total_records / $record_per_page);

                    for ($i = 1; $i <= $total_pages; $i++) {

                        echo  "<a href='student_display.php?page=" . $i . "' class='btn btn-primary ml-2 mb-2'>$i </a>";
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