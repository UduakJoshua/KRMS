<?php
include_once './controller/dbase_conn.php';
$title = "BCA | Check Exam Result";
include_once './model/inc/student_dash_header.php';
?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="mr-2">

            <?php

            $admin_no = $_SESSION['st-user_id'];
            $sql = "SELECT * FROM student WHERE id = '$admin_no' ";
            $result = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($result)) : ?>
                <div>
                    <?php
                    echo "<div class = 'img_div'>";
                    echo "<img src='assets/img/" . $row['image'] . "' >";
                    echo "</div>";
                    ?>
                <?php endwhile; ?>

                </div>
        </div>

        <div>
            <p>Term: 3rd Term <br>
                Session: 2020/2021</p>
        </div>
    </div>


    <section>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header bg-info">
                        <h6> How to View/Download the result</h6>
                        <ul>
                            <li>Simply click the Download Result button</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-4">


                <?php
                $ad_no = $_SESSION['admin_no'];


                $sql = "SELECT * FROM exam_result WHERE admissionNo = '$ad_no' ";

                if ($result = $conn->query($sql)) {
                    // Fetch all
                    while ($row = mysqli_fetch_assoc($result)) {

                        $file = $row['path'];
                        $fileName = $row['exam_file'];
                    }
                    $result->free_result();
                } else {
                    echo "No result found";
                }

                $conn->close();
                ?>

                <a href="<?php echo $file; ?>" target="_blank">
                    <button class="btn btn-primary">Download Examination Result for: <br> <?php echo $fileName; ?></button></a>
            </div>

        </div>








    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>