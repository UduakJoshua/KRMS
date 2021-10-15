<?php
require "./controller/staff_logic.php";
$title = "BCA | Staff List";
include_once './model/inc/dashboard_header.php';

$query = "SELECT * FROM staff order by staff_id ";
$result = $conn->query($query);

?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Staff List</h1>
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
                            <th scope="col">Image</th>
                            <th scope="col">Staff ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Sex</th>
                            <th scope="col">Date Of Birth</th>
                            <th scope="col">Section</th>
                            <th scope="col">Phone</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                <td><?php echo $row['staff_id'] ?></td>
                                <td><?php echo $row['surname'] . " " . $row['firstname'] ?></td>
                                <td><?php echo $row['gender'] ?></td>
                                <td><?php echo $row['dob'] ?></td>
                                <td><?php echo $row['section'] ?></td>
                                <td><?php echo $row['phone']  ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td>
                                    <a href="staff_registeration.php?edit=<?php echo $row['id']; ?>" class=" btn btn-info btn-sm"> Edit</a>
                                    <a href="./controller/staff_logic.php?delete=<?php echo $row['id']; ?>" class=" btn btn-danger btn-sm">Del</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>


        </div>

    </section>


    <?php include_once './model/inc/dashboard_footer.php'; ?>