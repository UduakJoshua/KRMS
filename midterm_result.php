<?php
require './controller/result_display_logic.php';
require './controller/score_upload_logic.php';
$title = "BCA | Mid-Term Result View";
include_once './model/inc/student_dash_header.php';
$term =    $_SESSION['term'];
$academic_session =    $_SESSION['a_session'];
$ad_no = $_SESSION['admin_no'];

?>

<main role="main" class="col-lg-10 ml-sm-auto col-lg-10 px-md-4">
    <div class=" page-head d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Print/View Mid-term Result</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['st-username']; ?></p>
            </div>

        </div>
    </div>


    <section class=" row print-container container-fluid section_border report_background" id="print-container">



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
                $select_sql = "SELECT * FROM student WHERE admissionNo='$ad_no' ";
                $sql_result = $conn->query($select_sql);
                ?>

                <div class="bg-danger text-white pt-2 mt-4" style="height: 60px;">
                    <?php
                    while ($row = $sql_result->fetch_assoc()) : ?>

                        <h4 class="text-center head3">Mid-Term Result Sheet For <i><?php echo $row['surname'] . " " . $row['firstname'] . " " . $row['middlename']; ?></i>
                        </h4>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class=" student-details">
                        <p><strong>Admission Number:</strong> <?php echo $row['admissionNo'] ?></p>
                        <p><strong>Name:</strong> <?php echo $row['surname'] . " " . $row['firstname'] . " " . $row['middlename']; ?> </p>
                        <p><strong>Class:</strong> <?php echo $row['class_name'] . " " . $row['classArm']; ?> </p>
                        <p><strong>Term: </strong><?php echo $term; ?> | <span><strong>Academic Session: </strong> <?php echo $academic_session; ?></span></p>
                        <p>
                            <strong>Date:</strong> <?php if ($term == "1st Term") {
                                                        echo "5<sup>th</sup> - November - 2021 ";
                                                    } elseif ($term == "2nd Term") {
                                                        echo "21<sup>st</sup> - February - 2022 ";
                                                    }
                                                    else {
                                                        echo "4<sup>th</sup> - July - 2022 ";
                                                    } ?>
                            |
                            <span><strong>Sex:</strong> <?php echo $row['gender']; ?> </span>

                        </p>

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
            $count = 1;
            $select_sql = "SELECT * FROM mid_term_scores WHERE admission_no='$ad_no' && term= '$term' && session = '$academic_session' ORDER BY subject ASC";
            $sql_result = $conn->query($select_sql);
            if (mysqli_num_rows($sql_result) > 0) : ?>


                <table class="table table-striped table-sm display">
                    <thead class="thead-dark ">
                        <tr style="font-size: 18px; text-align:center;">
                            <th scope="col" >S/N</th>
                            <th scope="col " style="font-size: 18px; text-align:left;">Subject</th>
                            <th scope="col">T2 (20%)</th>
                            <th scope="col">Grade</th>
                            <th scope="col">Remarks</th>

                        </tr>
                    </thead>
                    <tbody class="ml-2 table-bordered">
                        <?php

                        while ($row = $sql_result->fetch_assoc()) :

                            $T2 = $row['T2'];


                        ?>

                            <tr style="font-size: 17px; text-align:center;">
                                <td><?php echo $count; ?></td>
                                <td style=" text-align:left; width:30%"><?php echo $row['subject'] ?></td>

                                <td><?php echo $T2 ?></td>

                                <td>
                                    <?php
                                    if ($T2 >= 18) {
                                        echo "A";
                                    } elseif ($T2 >= 15) {
                                        echo "B";
                                    } elseif ($T2 >= 10) {
                                        echo "C";
                                    } elseif ($T2 >= 7) {
                                        echo "P";
                                    } else {
                                        echo "F";
                                    } ?>
                                </td>
                                <!--remarks-->
                                <td>
                                    <?php
                                    if ($T2 >= 18) {
                                        echo "Excellent";
                                    } elseif ($T2 >= 15) {
                                        echo "Very Good";
                                    } elseif ($T2 >= 10) {
                                        echo "Credit";
                                    } elseif ($T2 >= 7) {
                                        echo "Pass";
                                    } else {
                                        echo "Fail";
                                    } ?>
                                </td>


                            </tr>

                        <?php 
                     $count++;

                     endwhile; ?>

                    </tbody>

                </table>
            <?php else : ?>
                <div class="col-md-12 bg-warning text-center mt-4 pt-4 mb-4">
                    <h4>The Mid Term Result for the selected term or session is not available! <br> Kindly Select another term or contact the School Admin.</h4>
                    <a href="select_term.php"><button type="button" class="btn btn-primary m-4">Back</button></a>
                </div>

            <?php
                exit();
            endif; ?>

            <div class="school-header">

                <div class="grading-system">
                    <table class="table table-sm table-condensed  table-striped">
                        <thead class=" thead-dark ">
                            <tr>
                                <th scope=" col" colspan="3">Grading System</th>
                            </tr>
                        </thead>
                        <tbody class="ml-2 table-bordered">
                            <tr>
                                <td>Key</td>
                                <td>Grade</td>
                                <td>Remark</td>
                            </tr>
                            <tr>
                                <td>18 - 20</td>
                                <td>A</td>
                                <td>Excellent</td>
                            </tr>
                            <tr>
                                <td>15 - 17</td>
                                <td>B</td>
                                <td>Very Good</td>
                            </tr>
                            <tr>
                                <td>10 - 14</td>
                                <td>C</td>
                                <td>Credit</td>
                            </tr>
                            <tr>
                                <td>7 - 9</td>
                                <td>P</td>
                                <td>Pass</td>
                            </tr>
                            <tr>
                                <td>0 - 6</td>
                                <td>F</td>
                                <td>Fail</td>
                            </tr>

                        </tbody>

                    </table>


                </div>
                <!--comments-->




                <div class="mt-2 bg-danger p-2">
                    <?php
                    $arm = $_SESSION['class_arm'];
                    $class = $_SESSION['student_class'];
                    $select_sql = "SELECT * FROM form_teachers WHERE class ='$class' && arm= '$arm'  && term = '$term' && a_session = '$academic_session'";
                    $sql_result = $conn->query($select_sql);

                    ?>
                    <?php

                    while ($row = $sql_result->fetch_assoc()) :



                    ?>
                        <p class="bg-danger text-center text-white h6 p-2"> Form Teacher: <br>
                            <?php echo $row['teachers_name'] ?></p>

                    <?php endwhile; ?>

                </div>


                <!-- stamp-->
                <div class=" school-header school-header2">
                    <img src="assets/img/bca-stamp.png" alt="" style="width: 70%;">
                    <h6 class="bg-danger text-center text-white mt-2 p-3">BCA Exams & Records</h6>
                </div>


            </div>

        </div>


    </section>
    <div id="editor"></div>
    <div class="print_button d-flex justify-content-center mt-3">
        <button class=" btn btn-primary mr-2 " onclick="window.print()">Download Result</button>

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
<script type="text/javascript">
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function(element, renderer) {
            return true;
        }
    };


    $('#generatePDF').click(function() {
        doc.fromHTML($('#print-container').html(), 15, 15, {
            'width': 700,
            'elementHandlers': specialElementHandlers
        });
        doc.save('sample_file.pdf');
    });
</script>