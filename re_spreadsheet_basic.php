<?php

use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

require './controller/dbase_conn.php';
require './controller/result_display_logic.php';
require './controller/score_upload_logic.php';
require './controller/psychomotor_logic.php';
$title = "BCA | Spreadsheet View";
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

                <div class="head1">
                    <img src="assets/img/bca_logo.png" alt="school_logo" class="portal_logo img-responsive">
                </div>
                <div class="text-right pl-3 head2">
                    <h1 class="title-head">Blessed Children Academy</h1>
                    <p class="head-text"><span class="fa fa-home"></span> 18 Amaehule Street, Eliogbolo, Rumuokoro | 1 kono Close Rumuodomaya, Port Harcourt</p>
                    <p class="head-text"><span class="fa fa-phone"></span> 07061666648 | 08180810162 | 08037808626 | <span class="fa fa-whatsapp text-gray"> 08179484262</span></p>
                    <p class="head-text"><span class="fa fa-envelope"></span> academyblessedhigh@gmail.com | https://www.blessedchildrenacademy.com</p>

                </div>



            </div>


            <div class="row">
                <div class="col-md-9">
                    <?php

                    $c_arm = $_SESSION['arm'];
                    $class = $_SESSION['class'];
                    $term = $_SESSION['term'];
                    $aSession = $_SESSION['aSession'];
                    $select_sql = "SELECT *, count(admission_no)as ta FROM students_score Group by admission_no
                    WHERE  term= '$term' && student_class = '$class' && class_arm = '$c_arm' && 
                session = '$aSession'";

                    $sql_result = $conn->query($select_sql);



                    ?>

                    <div>
                        <table class="table table-striped table-sm table-bordered ">
                            <thead class="thead-dark ">

                                <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col" nowrap="nowrap" style="width: 80%;">STUDENT NAME</th>
                                    <th scope=" col">ADMISSION NO</th>
                                    <th scope="col" colspan="5">Agricultural Science</th>
                                    <th scope="col" colspan="5">Basic Science</th>
                                    <th scope="col" colspan="5">Bible Knowledge</th>
                                    <th scope="col" colspan="5">Civic Education</th>
                                    <th scope="col" colspan="5">Computer Studies</th>
                                    <th scope="col" colspan="5">English Language</th>
                                    <th scope="col" colspan="5">French</th>
                                    <th scope="col" colspan="5">General Knowledge</th>
                                    <th scope="col" colspan="5">Health Education</th>
                                    <th scope="col" colspan="5">Home Economics</th>
                                    <th scope="col" colspan="5">Literature</th>
                                    <th scope="col" colspan="5">Mathematics</th>
                                    <th scope="col" colspan="5">Quantitative Reasoning</th>
                                    <th scope="col" colspan="5">Social Studies</th>
                                    <th scope="col" colspan="5">Verbal Reasoning</th>
                                    <th scope="col" colspan="5">Vocational Studies</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Average</th>
                                    <th scope="col">Position</th>
                                </tr>
                            </thead>
                            <tbody class="ml-2">
                                <?php while ($row = $sql_result->fetch_assoc()) : ?>
                                    <tr>

                                        <td><strong></strong></td>
                                        <td style="width: 60%;"> <?php echo $row['student_name'] ?></td>
                                        <td class="td_center"><?php echo $row['admission_no'] ?></td>


                                        <td class="td_center">T1</td>
                                        <td class="td_center">T2</td>
                                        <td class="td_center">Ex</td>
                                        <td class="td_center">Tot</td>
                                        <td class="td_center">SP</td>
                                        <td class="td_center">T1</td>
                                        <td class="td_center">T2</td>
                                        <td class="td_center">Ex</td>
                                        <td class="td_center">Tot</td>
                                        <td class="td_center">SP</td>

                                        <td class="td_center">T1</td>
                                        <td class="td_center">T2</td>
                                        <td class="td_center">Ex</td>
                                        <td class="td_center">Tot</td>
                                        <td class="td_center">SP</td>
                                        <!-- next-->
                                        <td class="td_center">T1</td>
                                        <td class="td_center">T2</td>
                                        <td class="td_center">Ex</td>
                                        <td class="td_center">Tot</td>
                                        <td class="td_center">SP</td>

                                        <td class="td_center">T1</td>
                                        <td class="td_center">T2</td>
                                        <td class="td_center">Ex</td>
                                        <td class="td_center">Tot</td>
                                        <td class="td_center">SP</td>

                                        <td class="td_center">T1</td>
                                        <td class="td_center">T2</td>
                                        <td class="td_center">Ex</td>
                                        <td class="td_center">Tot</td>
                                        <td class="td_center">SP</td>

                                        <td class="td_center">T1</td>
                                        <td class="td_center">T2</td>
                                        <td class="td_center">Ex</td>
                                        <td class="td_center">Tot</td>
                                        <td class="td_center">SP</td>

                                        <td class="td_center">T1</td>
                                        <td class="td_center">T2</td>
                                        <td class="td_center">Ex</td>
                                        <td class="td_center">Tot</td>
                                        <td class="td_center">SP</td>

                                        <td class="td_center">T1</td>
                                        <td class="td_center">T2</td>
                                        <td class="td_center">Ex</td>
                                        <td class="td_center">Tot</td>
                                        <td class="td_center">SP</td>

                                        <td class="td_center">T1</td>
                                        <td class="td_center">T2</td>
                                        <td class="td_center">Ex</td>
                                        <td class="td_center">Tot</td>
                                        <td class="td_center">SP</td>

                                        <td class="td_center">T1</td>
                                        <td class="td_center">T2</td>
                                        <td class="td_center">Ex</td>
                                        <td class="td_center">Tot</td>
                                        <td class="td_center">SP</td>

                                        <td class="td_center">T1</td>
                                        <td class="td_center">T2</td>
                                        <td class="td_center">Ex</td>
                                        <td class="td_center">Tot</td>
                                        <td class="td_center">SP</td>

                                        <td class="td_center">T1</td>
                                        <td class="td_center">T2</td>
                                        <td class="td_center">Ex</td>
                                        <td class="td_center">Tot</td>
                                        <td class="td_center">SP</td>

                                        <td class="td_center">T1</td>
                                        <td class="td_center">T2</td>
                                        <td class="td_center">Ex</td>
                                        <td class="td_center">Tot</td>
                                        <td class="td_center">SP</td>

                                        <td class="td_center">T1</td>
                                        <td class="td_center">T2</td>
                                        <td class="td_center">Ex</td>
                                        <td class="td_center">Tot</td>
                                        <td class="td_center">SP</td>

                                        <td class="td_center">T1</td>
                                        <td class="td_center">T2</td>
                                        <td class="td_center">Ex</td>
                                        <td class="td_center">Tot</td>
                                        <td class="td_center">SP</td>

                                    </tr>
                                <?php endwhile ?>
                            </tbody>

                        </table>
                    </div>
                </div>
    </section>
    <div>
        <button class=" btn btn-primary " onclick="window.print()">Print Spreadsheet</button>
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