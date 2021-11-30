<?php
require './controller/e_videos_logic.php';
$title = "BCA | E-Learning";
include_once './model/inc/dashboard_header.php';

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Video List</h1>
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


            <?php

            $select_sql = "SELECT * FROM student_assignments ORDER BY time_posted DESC";
            $sql_result = $conn->query($select_sql);
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-sm display " id="example" style="width:100%">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">Target Class</th>
                            <th scope="col">Assignment</th>
                            <th scope="col">Date Posted</th>
                            <th scope="col">Instructions</th>
                            <th scope="col">Download Status</th>
                            <th colspan="2" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="ml-2">
                        <?php
                        while ($row = $sql_result->fetch_assoc()) : ?>

                            <tr>
                                <td><?php echo $row['subject'] ?></td>
                                <td><?php echo $row['student_class'] ?></td>
                                <td><a href="<?php echo $row['file_path'] ?>" target="_blank"><?php echo $row['assignment'] ?></a></td>
                                <td><?php echo $row['date_posted'] ?></td>
                                <td><?php echo $row['instructions'] ?></td>
                                <td><?php echo $row['downloads'] ?></td>

                                <td>
                                    <!--a href="e_assignment.php?edit=php echo $row['id']; ?>" class=" btn btn-info btn-sm"> Edit</a-->
                                    <a href="./controller/e_videos_logic.php?deleteAss=<?php echo $row['id']; ?>" class=" btn btn-danger btn-sm">Delete</i></a>
                                </td>
                            </tr>

                        <?php endwhile; ?>

                    </tbody>
                </table>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-md-9">

                <div>
                    <a href="e_assignment.php"><button class="btn btn-primary mt-4 " name="addMore"> Post Another Assignment</button></a>
                </div>

            </div>
        </div>



    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>