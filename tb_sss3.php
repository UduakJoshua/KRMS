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
            include_once './model/inc/time_table_head_h.php';
            ?>

            <br />

            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead class="dark">
                        <tr style="font-size: 20px;">
                            <th scope="col">Days</th>
                            <th scope="col">Date</th>
                            <th scope="col">10:00 - 11:00</th>
                            <th scope="col">11:00 - 11:30</th>
                            <th scope="col">11:30 - 12:30</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Wednesday</td>
                            <td>02/02/2022</td>
                            <td>English Language</td>
                            <td rowspan="7" class="pt-4 text-center"> BREAK </td>
                            <td>CRS</td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td>03/02/2022</td>
                            <td>F/Mathematics</td>
                            <td>MKT/CCP</td>

                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>04/02/2022</td>
                            <td>Lit/Chemistry</td>
                            <td>Economics/Geography</td>

                        </tr>
                        <tr>
                            <td>Monday</td>
                            <td>07/02/2022</td>
                            <td>G/Mathematics</td>
                            <td>-</td>


                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td>08/02/2022</td>
                            <td>Physics/Government</td>
                            <td>Computer</td>


                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td>09/02/2022</td>
                            <td>Civic Education</td>
                            <td>Biology</td>



                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td>10/02/2022</td>
                            <td>TD/Agric/Acc</td>
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