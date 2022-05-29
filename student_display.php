<?php
require "./controller/student_logic.php";
$title = "BCA | Student List";
include_once './model/inc/dashboard_header.php';

$query = "SELECT * FROM student order by class_name ";
$result = $conn->query($query);

?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Student / List</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>
        <div class="container">
            <?php

            if (isset($_SESSION['message'])) : ?>
                <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                    <?php echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif ?>

            <br />

            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead class="dark">
                        <tr style="font-size: 12px;">
                        <th scope="col">S/N</th>
                            <th scope="col">Image</th>
                            <th scope="col">Admission No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Sex</th>
                            <th scope="col">Date Of Birth</th>
                            <th scope="col">Class</th>
                            <th scope="col">Section</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;

                        while ($row = mysqli_fetch_assoc($result)) : 
                            $id = $row['id'];?>
                            <tr>
                            <td><?php echo $count; ?></td>
                                <td style="width:auto;">
                                    <div id="content">
                                        <?php
                                        echo "<div class = 'img_div'>";
                                        echo "<img src='assets/img/" . $row['image'] . "' >";
                                        echo "</div>";
                                        ?>
                                </td>
                                <td><?php echo $row['admissionNo'] ?></td>
                                <td><?php echo $row['surname'] . " " . $row['firstname'] ?></td>
                                <td><?php echo $row['gender'] ?></td>
                                <td><?php echo $row['dob'] ?></td>
                                <td><?php echo $row['class_name'] . " " . $row['classArm'] ?></td>
                                <td><?php echo $row['section'] ?></td>
                                <td>
                                    <a href="edit_student.php?edit=<?php echo $row['id']; ?>" class=" btn btn-info btn-sm"> Edit</a>
                                    <button class="delete btn btn-sm btn-danger" id="del_<?php echo $id ?>" data-id="<?php echo $id ?>">Del</button>
                                </td>
                            </tr>
                        <?php $count++;
                                            endwhile ?>
                    </tbody>
                </table>
            </div>


        </div>

    </section>


    <?php include_once './model/inc/dashboard_footer.php'; ?>