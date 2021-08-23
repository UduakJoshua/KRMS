<?php
require './controller/dbase_conn.php';
$title = "BCA | Class List";
include_once './model/inc/dashboard_header.php';

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Subject Display</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>
        <div class=" container-fluid  ">
            <?php

            if (isset($_SESSION['message'])) : ?>
                <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                    <?php echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif ?>


            <?php
            require_once './controller/subject_logic.php';
            $select_sql = "SELECT * FROM scores WHERE admissionNo='bca/p/0876'";
            $sql_result = $conn->query($select_sql);
            ?>

            <table class="table table-striped table-sm display" id="example" style="width:100%">
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col">Subject</th>

                        <th scope="col">T1<br> (10%)</th>
                        <th scope="col">T2<br> (20%)</th>
                        <th scope="col">Exam<br> (70%)</th>
                        <th scope="col">Total<br> (100%)</th>
                        <th scope="col">Subject <br> Position</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Remarks</th>

                    </tr>
                </thead>
                <tbody class="ml-2">
                    <?php
                    while ($row = $sql_result->fetch_assoc()) : ?>

                        <tr>
                            <td><?php echo $row['subject_math'] ?></td>
                            <td><?php echo $row['mthT1'] ?></td>
                            <td><?php echo $row['mthT2'] ?></td>
                            <td><?php echo $row['mthEx'] ?></td>
                            <td><?php echo $row['mthTot'] ?></td>
                            <td><?php echo $row['mthSp'] ?></td>
                            <td><?php echo $row['mthGrade'] ?></td>
                            <td><?php echo $row['mthRem'] ?></td>


                        </tr>
                        <tr>
                            <td><?php echo $row['subject_eng'] ?></td>
                            <td><?php echo $row['engT1'] ?></td>
                            <td><?php echo $row['engT2'] ?></td>
                            <td><?php echo $row['engEx'] ?></td>
                            <td><?php echo $row['engTot'] ?></td>
                            <td><?php echo $row['engSp'] ?><sup>st</td>
                            <td><?php echo $row['engGrade'] ?></td>
                            <td><?php echo $row['engRem'] ?></td>


                        </tr>

                    <?php endwhile; ?>

                </tbody>
            </table>

            <!--<div class="row">
                <div class="col-md-9">
                    <table class="table table-striped table-condensed table-sm display" style="width:100%">
                        <thead class="thead-dark ">
                            <tr>

                                <th scope="col">Subject</th>
                                <th scope="col">Name</th>
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
                            <td>Mathematics</td>
                            <td>Uduak Joshua</td>
                            <td>10</td>
                            <td>20</td>
                            <td>67</td>
                            <td>97</td>
                            <td>A</td>
                            <td>1 <sup>st</td>
                            <td>EXCELLENT</td>



                        </tbody>
                    </table>
                </div>
                <div class="col-md-3"> hello, Thank you Jesus</div>
            </div>-->


        </div>






    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>