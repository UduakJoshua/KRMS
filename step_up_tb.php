<?php
require "./controller/dbase_conn.php";
$title = "BCA | Time Table";
include_once './model/inc/student_dash_header.php';


?>
<main role="main" class="col-lg-10 ml-sm-auto col-lg-10 px-md-4">
    <div class=" page-head d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Third Term Mid-Term Time Table</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">
                <p>Welcome <?php echo $_SESSION['st-username']; ?></p>
            </div>

        </div>
    </div>


    <section class=" row print-container container-fluid section_border " id="print-container">
        <div class="container-fluid">
            <?php
            include_once './model/inc/time_table_head.php';
            ?>

            <br />



            <div class="table-responsive">
            <table class="table table-striped table-bordered">
                    <thead class="dark">
                        <tr style="font-size: 20px;">
                            <th scope="col">Day</th>
                            <th scope="col">Date</th>
                            <th scope="col" colspan="2">Subject</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>Wednesday</td>
                            <td>08/06/2022</td>
                            <td>Elementary Science</td>
                            <td>Verbal Skills</td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td>09/06/2022</td>
                            <td>Quantitative Skills  </td>
                            <td>Social Studies</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>10/06/2022</td>
                            <td>Mathematics</td>
                            <td>Moral Instruction</td>
                        </tr>
                        <tr>
                            <td>Monday</td>
                            <td>13/06/2022</td>
                            <td colspan="2" style="text-align: center">Public Holiday</td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td>14/06/2022</td>
                            <td>English Language</td>
                            <td>Literature / French </td>
                        </tr>

                        <tr>
                            <td>Wednesday</td>
                            <td>15/06/2022</td>
                            <td>Health Education</td>
                            <td>Songs and Rhyme</td>
                        </tr>

                        <tr>
                            <td>Thursday</td>
                            <td>16/06/2022</td>
                            <td>Language Art</td>
                            <td>-</td>
                        </tr>
                        
                    </tbody>

                </table>
            </div>
            <?php include_once './model/inc/print.php'; ?>



        </div>

    </section>
    <hr>


    <?php include_once './model/inc/dashboard_footer.php'; ?>