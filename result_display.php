<?php

use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

require './controller/dbase_conn.php';
require './controller/result_display_logic.php';
require './controller/score_upload_logic.php';
$title = "BCA | Result View";
include_once './model/inc/dashboard_header.php';

?>

<main role="main" class="col-lg-10 ml-sm-auto col-lg-10.b.gb./b/vbV//b px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Print/View Result</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section class=" row print-container container-fluid section_border report_background">



        <div class=" container-fluid  ">
            <?php

            if (isset($_SESSION['message'])) : ?>
                <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                    <?php echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif ?>
            <div class="school-header">

                <div>
                    <img src="assets/img/bca_logo.png" alt="school_logo" class="portal_logo img-responsive">
                </div>
                <div class="text-center pl-4 ">
                    <h1>Blessed Children Academy</h1>
                    <p class="head-text">18 Amaehule Street, Eliogbolo, Rumuokoro | 1 kono Close Rumuodomaya, Port Harcourt</p>
                    <p class="head-text">07061666648 | 08179484262 |adminbca@blessedchildrenacademy.com</p>

                </div>



            </div>

            <div class="student-info">


                <?php

                if (isset($_GET['display'])) {
                    $admission_no = $_GET['display'];

                    $select_sql = "SELECT * FROM student WHERE admissionNo='$admission_no' ";
                    $sql_result = $conn->query($select_sql);
                }
                ?>

                <div class="bg-danger text-white pt-2 " style="height: 50px;">
                    <?php
                    while ($row = $sql_result->fetch_assoc()) :
                    ?>

                        <h4 class="text-center">Termly Report For <?php echo $row['surname'] . " " . $row['firstname'] . " " . $row['middlename']; ?>
                        </h4>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <div>
                        <p>Registeration Number: <?php echo $row['admissionNo'] ?></p>
                        <p>Name: <?php echo $row['surname'] . " " . $row['firstname'] . " " . $row['middlename']; ?> </p>
                        <p>Class: <?php echo $row['class_name']; ?> </p>
                        <p>Class Arm: <?php echo $row['classArm']; ?> </p>
                        <p>Sex: <?php echo $row['gender']; ?> </p>

                    </div>

                    <div>
                        <?php
                        echo "<div class = 'img_div_2'>";
                        echo "<img src='assets/img/" . $row['image'] . "' >";
                        echo "</div>";
                        ?>
                    <?php endwhile; ?>

                    </div>
                </div>
            </div>

            <?php

            if (isset($_GET['display'])) {
                $admission_no = $_GET['display'];

                $select_sql = "SELECT subject,T1,T2,project,assignment,exam , (T1+T2+project+assignment+exam) AS Total FROM students_score WHERE admission_no='$admission_no' && term= '1st-Term'";
                $sql_result = $conn->query($select_sql);
            }
            ?>

            <table class="table table-striped table-sm table-bordered display">
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">T1<br> (10%)</th>
                        <th scope="col">T2<br> (20%)</th>
                        <th scope="col">Project<br> (10%)</th>
                        <th scope="col">Assignment<br> (20%)</th>
                        <th scope="col">Exam<br> (40%)</th>
                        <th scope="col">Total<br> (100%)</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Subject <br> Position</th>


                    </tr>
                </thead>
                <tbody class="ml-2">
                    <?php

                    while ($row = $sql_result->fetch_assoc()) :


                        $T1 = $row['T1'];
                        $T2 = $row['T2'];
                        $project = $row['project'];
                        $assignment = $row['assignment'];
                        $exam = $row['exam'];
                        $total = $row['Total'];

                    ?>

                        <tr>
                            <td><?php echo $row['subject'] ?></td>
                            <td><?php echo $T1 ?></td>
                            <td><?php echo $T2 ?></td>
                            <td><?php echo $project ?></td>
                            <td><?php echo $assignment ?></td>
                            <td><?php echo $exam ?></td>
                            <td><?php echo $total ?></td>
                            <td>
                                <?php
                                if ($total >= 80) {
                                    echo "A";
                                } elseif ($total >= 60) {
                                    echo "B";
                                } elseif ($total >= 50) {
                                    echo "C";
                                } elseif ($total >= 40) {
                                    echo "P";
                                } else {
                                    echo "F";
                                } ?>
                            </td>
                            <!--remarks-->
                            <td>
                                <?php
                                if ($total >= 80) {
                                    echo "Excellent";
                                } elseif ($total >= 60) {
                                    echo "Very Good";
                                } elseif ($total >= 50) {
                                    echo "Credit";
                                } elseif ($total >= 40) {
                                    echo "Pass";
                                } else {
                                    echo "Fail";
                                } ?>
                            </td>


                        </tr>

                    <?php endwhile; ?>

                </tbody>
            </table>
            <div class="row">
                <div class="col-md-4">


                    <?php
                    $select_sql = "SELECT COUNT(subject) AS no_subjects, SUM(T1+T2+project+assignment+exam) AS overall FROM students_score WHERE admission_no='$admission_no' && term= '1st-Term'";
                    $sql_result = $conn->query($select_sql);
                    ?>
                    <table class=" table table-stripped ">

                        <thead class="thead-dark ">

                            <tr>
                                <th colspan="2">
                                    <h6>Report Summary</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="ml-2 table-bordered">
                            <?php

                            while ($row = $sql_result->fetch_assoc()) :



                                $overalTot = $row['overall'];
                                $overasubject = $row['no_subjects'];
                                $average_score = ($overalTot / $overasubject);
                                $no_subject = 4;
                                $total_mark = $no_subject * 100;

                                //echo $row(SUM['Total']);


                            ?>
                                <tr>
                                    <td>Overall Total Score</td>
                                    <td><?php echo $overalTot; ?> out of <?php echo $total_mark; ?> </td>

                                </tr>
                                <tr>
                                    <td>Average Score</td>
                                    <td><?php echo $average_score; ?>%</td>
                                </tr>
                                <tr>
                                    <td>Total Subjects Offered in Class</td>
                                    <td><?php echo $no_subject; ?></td>
                                </tr>
                                <tr>
                                    <td>Total Subjects Taken</td>
                                    <td><?php echo $overasubject; ?></td>
                                </tr>
                                <tr>
                                    <td>Teacher's Comment</td>
                                    <td>
                                        <?php
                                        if ($average_score  >= 80) {
                                            echo "Excellent Performance, Keep the fire burning";
                                        } elseif ($average_score  >= 60) {
                                            echo "Great Performance, do not relent!";
                                        } elseif ($average_score >= 50) {
                                            echo "An Average Performance. Work harder!";
                                        } else {
                                            echo "Poor Performance, put in more effort and don't quit!";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Principal's Comment</td>
                                    <td>
                                        <?php
                                        if ($average_score  >= 80) {
                                            echo "Excellent Performance, Keep the fire burning";
                                        } elseif ($average_score  >= 60) {
                                            echo "Great Performance, do not relent!";
                                        } elseif ($average_score >= 50) {
                                            echo "An Average Performance. Work harder!";
                                        } else {
                                            echo "Poor Performance, put in more effort and don't quit!";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </section>
    <div>
        <button class=" btn btn-primary" onclick="window.print()">Print Result</button>
    </div>
    <hr>
</main>
</div>
</div>
<footer>
    <p class="text-center">Powered by Blessed Children Academy | Designed by KodeNet Solutions</p>
</footer>





<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/img_preview.js"></script>
<script src="assets/dist/js/hide_show.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="dashboard.js"></script>
</body>

</html>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>