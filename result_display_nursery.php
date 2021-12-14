<?php

use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

require './controller/dbase_conn.php';
require './controller/result_display_logic.php';
require './controller/score_upload_logic.php';
require './controller/student_result_list_init.php';
require './controller/psychomotor_logic.php';
$title = "BCA | Result View";
include_once './model/inc/dashboard_header.php';

$c_arm = $_SESSION['arm'];
$class = $_SESSION['class'];
$term = $_SESSION['term'];
$aSession = $_SESSION['aSession'];
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

                <div class="head1">
                    <img src="assets/img/bca_logo.png" alt="school_logo" class="portal_logo img-responsive">
                </div>
                <div class="text-right pl-3 head2">
                    <h1 class="title-head">Blessed Children Academy</h1>
                    <p class="head-text"><span class="fa fa-home"></span> 18 Amaehule Street, Eliogbolo, Rumuokoro | 1 Kono Close Rumuodomaya, Port Harcourt</p>
                    <p class="head-text"><span class="fa fa-phone"></span> 07061666648 | 08180810162 | 08037808626 | <span class="fa fa-whatsapp text-gray"> 08179484262</span></p>
                    <p class="head-text"><span class="fa fa-envelope"></span> academyblessedhigh@gmail.com | https://www.blessedchildrenacademy.com</p>

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

                <div class="bg-danger text-white pt-3 " style="height: 80px;">
                    <?php
                    while ($row = $sql_result->fetch_assoc()) :
                    ?>

                        <h2 class="text-center">Termly Report For <?php echo $row['surname'] . " " . $row['firstname'] . " " . $row['middlename']; ?>
                        </h2>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <div class=" student-details">
                        <p><strong>Admission Number:</strong> <?php echo $row['admissionNo'] ?></p>
                        <p><strong>Name:</strong> <?php echo $row['surname'] . " " . $row['firstname'] . " " . $row['middlename']; ?> </p>
                        <p><strong>Class:</strong> <?php echo $row['class_name'] . " " . $row['classArm']; ?> </p>
                        <p><strong>Academic Session: </strong> <?php echo $aSession; ?> <span> | </span> <span> <strong>Term:</strong> <?php echo $term; ?></span> </p>
                        <p><strong>Sex:</strong> <?php echo $row['gender']; ?> </p>
                        <p>Next Term Begins: 3<sup>rd</sup> January, 2022. </p>
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
            <div class="row">
                <div class="col-md-9">
                    <?php

                    if (isset($_GET['display'])) {
                        $admission_no = $_GET['display'];

                        $select_sql = "SELECT * FROM (SELECT *, rank() OVER ( partition by subject order by total desc ) 
                AS 'rank'   FROM students_score WHERE  term= '$term' && student_class = '$class' && class_arm = '$c_arm' && 
                session = '$aSession') as temp WHERE admission_no= '$admission_no'";
                        $sql_result = $conn->query($select_sql);
                    }
                    ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm table-bordered display">
                            <thead class="thead-dark ">
                                <tr>
                                    <th scope="col">Subject</th>
                                    <th scope="col">T1<br> (10%)</th>
                                    <th scope="col">T2<br> (20%)</th>
                                    <th scope="col">Exam<br> (70%)</th>
                                    <th scope="col">Total<br> (100%)</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Subject <br> Position</th>
                                    <th scope="col">Remarks</th>



                                </tr>
                            </thead>
                            <tbody class="ml-2">
                                <?php

                                while ($row = $sql_result->fetch_assoc()) :


                                    $T1 = $row['T1'];
                                    $T2 = $row['T2'];
                                    $exam = $row['exam'];
                                    $total = $row['total'];
                                    $sp = $row['rank'];
                                    //$subject_position = $row['subject_position'];

                                ?>

                                    <tr>
                                        <td><strong><?php echo $row['subject'] ?></strong></td>
                                        <td class="td_center"><?php echo $T1 ?></td>
                                        <td class="td_center"><?php echo $T2 ?></td>
                                        <td class="td_center"><?php echo $exam ?></td>
                                        <td class="td_center"><?php echo $total ?></td>
                                        <td class="td_center">
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
                                        <td class="td_center"><?php
                                                                $ordinals = ['th', 'st', 'nd', 'rd'];
                                                                $sp_split = str_split($sp);
                                                                $num_digits = strlen($sp);
                                                                if ($num_digits == 1 && $sp_split[0] == 1) {
                                                                    echo $sp . "<sup>" . $ordinals[1] . "</sup>";
                                                                } else if ($num_digits == 1 && $sp_split[0] == 2) {
                                                                    echo $sp . "<sup>" . $ordinals[2] . "</sup>";
                                                                } else if ($num_digits == 1 && $sp_split[0] == 3) {
                                                                    echo $sp . "<sup>" . $ordinals[3] . "</sup>";
                                                                } else if ($num_digits == 2 && $sp_split[0] != 1 && $sp_split[1] == 3) {
                                                                    echo $sp . "<sup>" . $ordinals[3] . "</sup>";
                                                                } else if ($num_digits == 2 && $sp_split[0] != 1 && $sp_split[1] == 2) {
                                                                    echo $sp . "<sup>" . $ordinals[2] . "</sup>";
                                                                } else if ($num_digits == 2 && $sp_split[0] != 1 && $sp_split[1] == 1) {
                                                                    echo $sp . "<sup>" . $ordinals[1] . "</sup>";
                                                                } else {
                                                                    echo $sp . "<sup>" . $ordinals[0] . "</sup>";
                                                                }
                                                                ?></td>

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
                    </div>
                </div>
                <!-- score end here-->
                <!-- Psychomotor section-->
                <div class="col-md-3">
                    <table class=" table table-stripped table-sm  tab">
                        <?php

                        if (isset($_GET['display'])) {
                            $admission_no = $_GET['display'];

                            $select_sql = "SELECT * FROM psychomotor WHERE admission_no= '$admission_no'";
                            $sql_result = $conn->query($select_sql);
                        }
                        ?>

                        <thead class="thead-dark ">

                            <tr>
                                <th colspan="2">
                                    <h6>AFFECTIVE DOMAIN</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="ml-2 table-bordered">
                            <?php

                            while ($row = $sql_result->fetch_assoc()) :



                            ?>
                                <tr class="p-2">
                                    <td>Punctuality</td>
                                    <td class="td_align"><?php echo $row['punctuality'] ?></td>
                                </tr>
                                <tr>
                                    <td>Mental Alertness</td>
                                    <td class="td_align"><?php echo $row['alertness'] ?></td>
                                </tr>
                                <tr>
                                    <td>Attentiveness</td>
                                    <td class="td_align"><?php echo $row['attentiveness'] ?></td>
                                </tr>
                                <tr>
                                    <td>Respect</td>
                                    <td class="td_align"><?php echo $row['respect'] ?></td>
                                </tr>
                                <tr>
                                    <td>Neatness</td>
                                    <td class="td_align"><?php echo $row['neatness'] ?></td>
                                </tr>
                                <tr>
                                    <td>Politeness</td>
                                    <td class="td_align"><?php echo $row['politeness'] ?></td>
                                </tr>
                                <tr>
                                    <td>Honesty</td>
                                    <td class="td_align"><?php echo $row['honesty'] ?></td>
                                </tr>
                                <tr>
                                    <td>Relationship with Peers</td>
                                    <td class="td_align"><?php echo $row['relationship'] ?></td>
                                </tr>
                                <tr>
                                    <td>Attitude to School</td>
                                    <td class="td_align"><?php echo $row['attitude'] ?></td>
                                </tr>
                                <tr>
                                    <td>Spirit of Team Work</td>
                                    <td class="td_align"><?php echo $row['team_work'] ?></td>
                                </tr>
                                <tr>
                                    <td>Completes School Work Promptly</td>
                                    <td class="td_align"><?php echo $row['school_work'] ?></td>
                                </tr>




                                <tr>
                                    <th colspan="2" class="table-dark text-center">
                                        <h6>PSYCHOMOTOR SKILLS</h6>
                                    </th>
                                </tr>

                                <tr>
                                    <td>Reading</td>
                                    <td class="td_align"><?php echo $row['reading'] ?></td>
                                </tr>
                                <tr>
                                    <td>Verbal Fluency / Diction</td>
                                    <td class="td_align"><?php echo $row['diction'] ?></td>
                                </tr>
                                <tr>
                                    <td>Handwriting</td>
                                    <td class="td_align"><?php echo $row['handwriting'] ?></td>
                                </tr>
                                <tr>
                                    <td>Musical Skills</td>
                                    <td class="td_align"><?php echo $row['music'] ?></td>
                                </tr>
                                <tr>
                                    <td>Creative Art</td>
                                    <td class="td_align"><?php echo $row['art'] ?></td>
                                </tr>
                                <tr>
                                    <td>Physical Education</td>
                                    <td class="td_align"><?php echo $row['phe'] ?></td>
                                </tr>
                                <tr>
                                    <td>General Reasoning</td>
                                    <td class="td_align"><?php echo $row['punctuality'] ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div>


                    <?php

                    $class = $_SESSION['class'];

                    $select_sql = "SELECT COUNT(subject) AS no_subjects, SUM(T1+T2+exam) AS overall,  (SELECT no_of_subjects FROM no_of_subjects WHERE class_name = '$class') subject_total , student_name   FROM students_score WHERE admission_no='$admission_no' && term= '1st Term'";
                    $sql_result = $conn->query($select_sql);

                    ?>
                    <table class=" table table-stripped table-sm ">

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
                                $no_subject = $row['subject_total'];
                                $average_score = round(($overalTot / $no_subject), 2);
                                $total_mark = $no_subject * 100;
                                $name = $row['student_name'];




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
                                    <td style="width: 40%;">Total Subjects Offered in Class</td>
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
                                            echo "Superlative Performance, Keep Soaring Higher!";
                                        } elseif ($average_score  >= 60) {
                                            echo "Brilliant Output, Keep the Fire Burning!";
                                        } elseif ($average_score >= 50) {
                                            echo "Nice Result, Keep working hard!";
                                        } elseif ($average_score >= 40) {
                                            echo "Fairly average output, More effort is highly needed!";
                                        } else {
                                            echo "Fair Performance, put in more effort and don't quit!";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Head Teacher's Comment</td>
                                    <td>
                                        <?php
                                        if ($average_score  >= 80) {
                                            echo "Bravo $name!, Keep the flag flying.";
                                        } elseif ($average_score  >= 60) {
                                            echo "Beautiful performance $name!, Keep it up!";
                                        } elseif ($average_score >= 50) {
                                            echo "Good output $name, Keep pushing forward and strive to do better.";
                                        } elseif ($average_score >= 40) {
                                            echo "Don't relent $name, Keep pushing forward.";
                                        } else {
                                            echo "This is a weak performance $name, put in more effort next term, I believe in you!";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                        <tfoot class="thead-dark ">

                            <tr>
                                <th colspan="3">
                                    <?php
                                    $c_arm = $_SESSION['arm'];
                                    $class = $_SESSION['class'];
                                    $term = $_SESSION['term'];
                                    $aSession = $_SESSION['aSession'];

                                    $select_sql = "SELECT * FROM form_teachers WHERE class ='$class' && arm= '$c_arm' ";
                                    $sql_result = $conn->query($select_sql);

                                    ?>
                                    <?php

                                    while ($row = $sql_result->fetch_assoc()) :



                                    ?>
                                        <p class=" text-center text-white h6 p-2"> Form Teacher: <br>
                                            <?php echo $row['teachers_name'] ?></p>

                                    <?php endwhile; ?>


                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="mb-2 bg-danger ">

                </div>
            </div>
            <div class="col-md-3">



                <table class=" table table-stripped table-sm ">

                    <thead class="thead-dark ">

                        <tr>
                            <th colspan="3">
                                <h6>Grading System</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="ml-2 table-bordered">
                        <tr>
                            <td>Key</td>
                            <td class="td_center">Grade</td>
                            <td>Remark</td>
                        </tr>
                        <tr>
                            <td>80 - 100</td>
                            <td class="td_center">A</td>
                            <td>Excellent</td>
                        </tr>
                        <tr>
                            <td>60 - 79</td>
                            <td class="td_center">B</td>
                            <td>Very Good</td>
                        </tr>
                        <tr>
                            <td>50 - 59</td>
                            <td class="td_center">C</td>
                            <td>Credit</td>
                        </tr>
                        <tr>
                            <td>40 - 49</td>
                            <td class="td_center">P</td>
                            <td>Pass</td>
                        </tr>
                        <tr>
                            <td>0 - 39</td>
                            <td class="td_center">F</td>
                            <td>Fail</td>
                        </tr>





                    </tbody>
                    <tfoot class="thead-dark ">

                        <tr>
                            <th colspan="3" style="padding: 10px;">
                                <p style="font-size: 12px; text-align:left ; margin-bottom:2px;">CAT : Continuous Assessment Test</p>
                                <p style="font-size: 12px; text-align:left; margin-bottom:2px;">Average Score : <br>Total Score / Total Subjects Offered </p>

                            </th>
                        </tr>
                    </tfoot>
                </table>

            </div>
            <div class="col-md-3">
                <div class=" school-header school-header2">
                    <img src="assets/img/bca-stamp.png" alt="" style="width: 80%;">
                    <h6 class="bg-danger text-center text-white mt-2 p-3">BCA Exams & Records</h6>
                </div>
            </div>
        </div>

    </section>
    <div>
        <button class=" btn btn-primary " onclick="window.print()">Print Result</button>
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