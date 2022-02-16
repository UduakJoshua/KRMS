<?php
require "./controller/dbase_conn.php";
$title = "BCA | Time Table";
include_once './model/inc/student_dash_header.php';


?>
<main role="main" class="col-lg-10 ml-sm-auto col-lg-10 px-md-4">
    <div class=" page-head d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Mid Term Time Table</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">
                <p>Welcome <?php echo $_SESSION['st-username']; ?></p>
            </div>

        </div>
    </div>


    <section class=" row print-container container-fluid section_border mb-4 " id="print-container">
        <div class="container-fluid">
            <?php
            include_once './model/inc/time_table_head.php';
            ?>

            <br />

            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead class="dark">
                        <tr style="font-size: 20px;">
                            <th scope="col">Day</th>
                            <th scope="col">Date</th>
                            <th scope="col" colspan="2">Subjects</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Thursday</td>
                            <td>03/02/2022</td>
                            <td>Social Studies</td>
                            <td>Health Education</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>04/02/2022</td>
                            <td>Moral Instruction</td>
                            <td>Elementary Science</td>
                        </tr>
                        <tr>
                            <td>Monday</td>
                            <td>07/02/2022</td>
                            <td>Literature</td>
                            <td>Mathematics</td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td>08/02/2022</td>
                            <td>English Language</td>
                            <td>French Language</td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td>09/02/2022</td>
                            <td>Quantitative Skills, Songs & Rhymes</td>
                            <td>Fine Art</td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td>10/02/2022</td>
                            <td>Language Art</td>
                            <td> Verbal Skills</td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <?php include_once './model/inc/print.php'; ?>


        </div>

    </section>
    <hr>


    <?php include_once './model/inc/dashboard_footer.php'; ?>