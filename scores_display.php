<?php
require "./controller/dbase_conn.php";
$title = "BCA | MidTerm Scores";
include_once './model/inc/dashboard_header.php';

$query = "SELECT * FROM mid_term_scores  ";
$result = $conn->query($query);

?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Student Mid-Term Scores</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>
        <div class="container">
            <div class="mt-1">
                <?php
                include_once "./controller/score_upload_logic.php";
                ?>
            </div>


            <br />
            <form action="scores_display.php" method="post">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="dark">
                            <tr style="font-size: 12px;">
                                <th scope="col">Select</th>
                                <th scope="col">Admission No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Class</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Scores (20%)</th>
                                <th scope="col">Term</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($row = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <td><input type="checkbox" name="chk[]" value="<?php echo $row['id'] ?>" /></td>
                                    <td><?php echo $row['admission_no'] ?></td>
                                    <td><?php echo $row['student_name'] ?></td>
                                    <td><?php echo $row['student_class'] ?></td>
                                    <td><?php echo $row['subject'] ?></td>
                                    <td><?php echo $row['T2']  ?></td>
                                    <td><?php echo $row['term']  ?></td>
                                    <td>
                                        <a href="midterm_edit.php?edit_score=<?php echo $row['id']; ?>" class=" btn btn-info btn-sm"> Edit</a>
                                        <button class="btn btn-sm btn-danger" name="delete_score">Del</button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </form>

        </div>

    </section>


    <?php include_once './model/inc/dashboard_footer.php'; ?>