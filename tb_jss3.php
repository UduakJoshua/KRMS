<?php
require "./controller/dbase_conn.php";
$title = "BCA | Time Table";
include_once './model/inc/student_dash_header.php';


?>
<main role="main" class="col-lg-10 ml-sm-auto col-lg-10 px-md-4">
    <div class=" page-head d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">MOCK IV Time Table</h1>
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
                            <th scope="col">Day</th>
                            <th scope="col">Date</th>
                            <th scope="col">08:30 - 10:30</th>
                            <th scope="col">10:30 - 11:00</th>
                            <th scope="col">11:00 - 1:00</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tuesday</td>
                            <td>15/03/2022</td>
                            <td>-</td>
                            <td rowspan="11" class="pt-4 text-center align-item-center" style="font-size: 30px;"> B <br>R<br>E<br>A<br>K </td>
                            <td>Home Economics</td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td>16/03/2022</td>
                            <td>English Language</td>
                            <td>P.H.E</td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td>17/03/2022</td>
                            <td>Christian Religious Studies</td>
                            <td>Creative & Cultural Art</td>

                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>18/03/2022</td>
                            <td>Mathematics</td>
                            <td>-</td>

                        </tr>
                        <tr>
                            <td>Monday</td>
                            <td>21/03/2022</td>
                            <td>Civic Education</td>
                            <td>French</td>


                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td>22/03/2022</td>
                            <td>History</td>
                            <td>Literature</td>
                        </tr>

                        <tr>
                            <td>Wednesday</td>
                            <td>23/03/2022</td>
                            <td>Basic Tech. </td>
                            <td>I.C.T</td>
                        </tr>

                        <tr>
                            <td>Thursday</td>
                            <td>24/03/2022</td>
                            <td>Agricultural Sc.</td>
                            <td> Igbo</td>
                        </tr>

                        <tr>
                            <td>Friday</td>
                            <td>25/03/2022</td>
                            <td>Social St.</td>
                            <td>-</td>
                        </tr>

                        <tr>
                            <td>Monday</td>
                            <td>28/03/2022</td>
                            <td>Business St.</td>
                            <td>-</td>
                        </tr>

                        <tr>
                            <td>Tuesday</td>
                            <td>29/03/2022</td>
                            <td>Basic Sc.</td>
                            <td> </td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <?php include_once './model/inc/print.php'; ?>


        </div>

    </section>
    <hr>


    <?php include_once './model/inc/dashboard_footer.php'; ?>