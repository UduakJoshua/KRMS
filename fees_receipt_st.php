<?php

require './controller/bill_upload_logic.php';
$title = "BCA | Fees Receipt";
include_once './model/inc/student_dash_header.php';

$term = "2nd Term";
$academic_session = "2021/2022";
$admin_no = $_SESSION['admin_no'];
$student_class = $_SESSION['student_class'];
$s_arm = $_SESSION['class_arm'];

?>

<main role="main" class="col-lg-10 ml-sm-auto col-lg-10.b.gb./b/vbV//b px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Print/View Result</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['st-username']; ?></p>
            </div>

        </div>
    </div>


    <section class=" row print-container container-fluid section_border report_background border">

        <div class=" container-fluid  ">

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



            <!-- payment info begins-->
            <div class=" student-details">
                <?php

                $select_sql = "SELECT * FROM student WHERE admissionNo='$admin_no' ";
                $sql_result = $conn->query($select_sql);

                ?>

                <div class="bg-danger text-white pt-2 " style="height: 50px;">
                    <h5 class="text-center head3"> Fees Payment Receipt </h5>
                </div>
                <?php
                while ($row = $sql_result->fetch_assoc()) :
                ?>


                    <div class="d-flex justify-content-between mt-3">
                        <div class=" student-details">
                            <p><strong>Admission Number:</strong> <?php echo $row['admissionNo'] ?></p>
                            <p><strong>Name:</strong> <?php echo $row['surname'] . " " . $row['firstname'] . " " . $row['middlename']; ?> </p>
                            <p><strong>Class:</strong> <?php echo $row['class_name'] . " " . $row['classArm']; ?> </p>
                            <p><strong>Academic Session: </strong> <?php echo $academic_session; ?> <span> | </span> <span> <strong>Term:</strong> <?php echo $term; ?></span> </p>
                            <p><strong>Sex:</strong> <?php echo $row['gender']; ?> </p>

                        </div>

                        <div>
                            <?php
                            echo "<div class = 'img_div_2'>";
                            echo "<img src='assets/img/" . $row['image'] . "' >";
                            echo "</div>";
                            ?>


                        </div>
                    <?php endwhile; ?>

                    </div>
            </div>
            <hr>
            <!-- payment info begins-->
            <div class="row">
                <div class="col-md-12">
                    <h5 class="bg-danger text-white pl-2 pb-4" style="height: 30px;"> Payment Details </h5>
                    <div class="table-responsive">
                        <table class="table  table-bordered respon">
                            <thead class="thead-dark text-center  ">
                                <tr>
                                    <th>Total Amount Due</th>
                                    <th>Amount Paid</th>
                                    <th>Date</th>
                                    <th>Balance </th>
                                    <th>Status</th>

                                </tr>
                            </thead>

                            <tbody class="ml-1 pt-2 ">
                                <?php
                                $sql = "SELECT * FROM fees_total 
                            WHERE term ='$term' && student_arm =  '$s_arm' 
                            && student_class = '$student_class' && admission_no = '$admin_no' && a_session = '$academic_session'";
                                $result = $conn->query($sql);
                                ?>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) : ?>

                                    <tr class="text-center">
                                        <td rowspan="3" style="font-size: 18px;">&#8358; <?php echo (number_format($row['total_fees'])) ?></th>
                                        <td>&#8358; <?php echo (number_format($row['first_deposit'])) ?></td>
                                        <td><?php echo $row['date_of_pay1'] ?></td>
                                        <td rowspan="3" style="font-size: 18px;">&#8358; <?php echo (number_format($row['balance'])) ?></th>
                                        <td rowspan="3">
                                            <?php if ($row['balance'] == 0) : ?>

                                                <button class="btn btn-success btn-sm " disabled>Fully Paid</button>

                                            <?php else : ?>
                                                <button class="btn btn-danger btn-sm " disabled>Indebted</button>
                                            <?php endif; ?>
                                            </th>
                                    </tr>
                                    <tr class="text-center">
                                        <td>&#8358; <?php echo (number_format($row['second_deposit'])) ?></td>
                                        <td> <?php echo $row['date_of_pay2'] ?></td>

                                    </tr>
                                    <tr class="text-center">
                                        <td>&#8358; <?php echo (number_format($row['third_deposit'])) ?></td>
                                        <td><?php echo $row['date_of_pay3'] ?></td>
                                    </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">


                        <div class="row d-flex justify-space-between">
                            <div style="line-height: 2.5px; font-size: 16px;" class=" col-md-6 mt-3">
                                <p><strong>Mode of Payment :</strong> <?php echo $row['mode_of_pay'] ?></p>
                                <p><strong>Date Payment Posted :</strong> <?php echo $row['date_issued'] ?> </p>
                            </div>

                            <!-- stamp-->
                            <div class=" school-header school-header2 col-md-6">
                                <img src="assets/img/bca-stamp.png" alt="" style="width: 30%;">
                                <h6 class="bg-danger text-center text-white  p-1">BCA Billing Dept.</h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php endwhile; ?>
    </section>
    <div class="print_button d-flex justify-content-center mt-3">
        <button class=" btn btn-primary mr-2 " onclick="window.print()">Print Receipt</button>
    </div>






    <?php include_once './model/inc/dashboard_footer.php'; ?>