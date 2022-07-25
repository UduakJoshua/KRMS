<?php
require "./controller/dbase_conn.php";
$title = "BCA | Time Table";
include_once './model/inc/student_dash_header.php';


?>
<main role="main" class="col-lg-10 ml-sm-auto col-lg-10 px-md-4">
    <div class=" page-head d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Promotion Examination Time Table</h1>
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
                            <th scope="col">09:15 - 11:15</th>
                            <th scope="col">11:15 - 11:45</th>
                            <th scope="col">11:45 - 01:30</th>
                            <th scope="col">01:30 - 02:15</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Monday</td>
                            <td>18/07/2022</td>
                            <td>G/MATHS</td>
                            <td rowspan="10" class="pt-4 text-center align-item-center" style="font-size: 30px;"> R <br>E<br>C<br>E<br>S<br>S </td>
                            <td> - </td>
                            <td rowspan="10" class="pt-4 text-center align-item-center" style="font-size: 30px;"> R <br>E<br>H<br>E<br>A<br>R<br>S<br>A<br>L</td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td>19/07/2022</td>
                            <td>COMPUTER</td>
                            <td>MKT/CCP</td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td>20/07/2022</td>
                            <td>ENGLISH</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td>21/07/2022</td>
                            <td>CIVIC</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>22/07/2022</td>
                            <td>CHEM/GOVT</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>Monday</td>
                            <td>25/07/2022</td>
                            <td>TD/AGRIC/CRS/GEO</td>
                            <td>HISTORY</td>
                        </tr>

                        <tr>
                            <td>Tuesday</td>
                            <td>26/07/2022</td>
                            <td>ECONS</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td>27/07/2022</td>
                            <td>BIOLOGY</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td>28/07/2022</td>
                            <td>PHYSICS/LITERATURE</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>29/07/2022</td>
                            <td>F/MATHS</td>
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