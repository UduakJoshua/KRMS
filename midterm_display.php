<?php



require './controller/dbase_conn.php';
require './controller/result_display_logic.php';
require './controller/score_upload_logic.php';
$title = "BCA | Mid-Term Result View";
include_once './model/inc/dashboard_header.php';

?>

<main role="main" class="col-lg-10 ml-sm-auto col-lg-10 px-md-4">
    <div class=" page-head d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Print/View Mid-term Result</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
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

                <div>
                    <img src="assets/img/bca_logo.png" alt="school_logo" class="portal_logo img-responsive">
                </div>
                <div class="text-right pl-3 ">
                    <h1 class="title-head">Blessed Children Academy</h1>
                    <p class="head-text"><span class="fa fa-home"></span> 18 Amaehule Street, Eliogbolo, Rumuokoro | 1 kono Close Rumuodomaya, Port Harcourt</p>
                    <p class="head-text"><span class="fa fa-phone"></span> 07061666648 | 08180810162 | 08037808626 | <span class="fa fa-whatsapp text-gray"> 08179484262</span></p>
                    <p class="head-text"><span class="fa fa-envelope"></span> academyblessedhigh@gmail.com | https://www.blessedchildrenacademy.com</p>

                </div>



            </div>

            <div class="student-info">


                <?php

                if (isset($_GET['displayMT'])) {
                    $admission_no = $_GET['displayMT'];

                    $select_sql = "SELECT * FROM student WHERE admissionNo='$admission_no' ";
                    $sql_result = $conn->query($select_sql);
                }
                ?>

                <div class="bg-danger text-white pt-2 " style="height: 50px;">
                    <?php
                    while ($row = $sql_result->fetch_assoc()) :
                    ?>

                        <h4 class="text-center">Mid-Term Result Sheet For <i><?php echo $row['surname'] . " " . $row['firstname'] . " " . $row['middlename']; ?></i>
                        </h4>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <div class=" student-details">
                        <p><strong>Admission Number:</strong> <?php echo $row['admissionNo'] ?></p>
                        <p><strong>Name:</strong> <?php echo $row['surname'] . " " . $row['firstname'] . " " . $row['middlename']; ?> </p>
                        <p><strong>Class:</strong> <?php echo $row['class_name'] . " " . $row['classArm']; ?> </p>

                        <p><strong>Term: </strong><?php echo $_SESSION['term']; ?></p>
                        <p><strong>Academic Session:</strong> <?php echo $_SESSION['aSession']; ?> </p>

                        <p><strong>Sex:</strong> <?php echo $row['gender']; ?> </p>

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

            if (isset($_GET['displayMT'])) {
                $admission_no = $_GET['displayMT'];

                $select_sql = "SELECT * FROM mid_term_scores WHERE admission_no='$admission_no' && term= '1st Term'";
                $sql_result = $conn->query($select_sql);
            }
            ?>

            <table class="table table-striped table-sm display">
                <thead class="thead-dark ">
                    <tr style="font-size: 18px; text-align:center;">
                        <th scope="col " style="font-size: 18px; text-align:left;">Subject</th>
                        <th scope="col">T2<br> (20%)</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Remarks</th>

                    </tr>
                </thead>
                <tbody class="ml-2 table-bordered">
                    <?php

                    while ($row = $sql_result->fetch_assoc()) :

                        $T2 = $row['T2'];


                    ?>

                        <tr style="font-size: 18px; text-align:center;">
                            <td style=" text-align:left;"><?php echo $row['subject'] ?></td>

                            <td><?php echo $T2 ?></td>

                            <td>
                                <?php
                                if ($T2 >= 18) {
                                    echo "A";
                                } elseif ($T2 >= 15) {
                                    echo "B";
                                } elseif ($T2 >= 10) {
                                    echo "C";
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
                                } else {
                                    echo "Fail";
                                } ?>
                            </td>


                        </tr>

                    <?php endwhile; ?>

                </tbody>
            </table>
            <div class="school-header">
                <?php

                if (isset($_GET['displayMT'])) {
                    $admission_no = $_GET['displayMT'];

                    $select_sql = "SELECT * FROM mid_term_scores WHERE admission_no='$admission_no' && term= '1st Term' && T2 <= '5'";
                    $sql_result = $conn->query($select_sql);
                }
                ?>
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
                                <td>Very Goood</td>
                            </tr>
                            <tr>
                                <td>10 - 14</td>
                                <td>C</td>
                                <td>Credit</td>
                            </tr>
                            <tr>
                                <td>0 - 9</td>
                                <td>F</td>
                                <td>Fail</td>
                            </tr>

                        </tbody>

                    </table>


                </div>
                <!--comments-->
                <div>
                    <table class="table table-sm table-condensed  table-striped">
                        <thead class=" thead-dark text-center ">
                            <tr>
                                <th scope=" col" colspan="2">Subjects to improve on</th>
                            </tr>
                        </thead>
                        <tbody class="ml-2 table-bordered">
                            <tr>
                                <td>You need to put in more effort in the subject(s) listed below before the examination!</td>
                            </tr>
                            <?php

                            while ($row = $sql_result->fetch_assoc()) :

                                $T2 = $row['T2'];
                                $subject = $row['subject'];
                            ?>

                                <td>
                                    <?php
                                    if ($T2 = $T2) {
                                        echo " $subject ";
                                    } elseif ($T2 > $row['T2']) {
                                        echo "This is a beautiful performance";
                                    } ?>
                                </td>


                        </tbody>
                    <?php endwhile; ?>

                    </table>
                    <div class="mt-2 bg-danger">

                        <p class="bg-danger text-center text-white h6 p-2"> Form Teacher: <br>
                            Mr. Joshua </p>



                    </div>

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
    <div class="print_button">
        <button class=" btn btn-primary mr-2" onclick="window.print()">Print Result</button>
        <button class=" btn btn-primary ml-2" id="generatePDF">Download</button>
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