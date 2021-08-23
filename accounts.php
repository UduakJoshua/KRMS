<?php
require "./controller/subject_logic.php";

$title = "BCA | Student List";
include_once './model/inc/dashboard_header.php';

$query = "SELECT * FROM student order by class_name";
$result = $conn->query($query);

?>
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
        <div class="container-fluid">

            <?php
            include_once "./controller/accounts-management.php";
            ?>
            <div class="card-header">
                <h6>Please select a student to activate or suspend the account</h6>
            </div>

            <br />
            <form action="accounts.php" method="post">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="dark">
                            <tr style="font-size: 12px;">
                                <th scope="col">Select</th>
                                <th scope="col">Image</th>
                                <th scope="col">Admission No</th>
                                <th>Name</th>
                                <th scope="col">Class</th>
                                <th scope="col">Status</th>
                                <th>Account Action</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                    <td><?php echo $row['surname'] . " " . $row['firstname'] ?></td>
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
                </div>

            </form>
        </div>

    </section>
    <hr>


    <?php include_once './model/inc/dashboard_footer.php'; ?>