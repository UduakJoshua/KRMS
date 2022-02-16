<?php
require_once 'controller/score_upload_logic.php';
$title = "BCA | Uploaded Scores";
include_once './model/inc/staff_dashboard_header.php';

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">View Uploaded Scores</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p><?php echo $_SESSION['staff-username']; ?></p>
            </div>

        </div>
    </div>



    <section>
        <?php

        if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                <?php echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>
        <div class="row justify-content-center">

            <div class="col-md-12">
                <?php
                include_once 'controller/score_upload_logic.php';

                $c_arm = $_SESSION['arm'];
                $class = $_SESSION['class'];
                $term = $_SESSION['term'];
                $aSession = $_SESSION['aSession'];
                $subject = $_SESSION['subject'];

                // create a select query

                $sql = "SELECT * FROM mid_term_scores WHERE student_class = '$class' && student_arm = '$c_arm' 
                    && subject = '$subject' && term ='$term' && session='$aSession' ORDER BY student_name ASC";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) : ?>

                    <div class="card">
                        <!--card header begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <h5>Display Scores for <?php echo $class . " " . $c_arm ?></h5>
                                </div>
                            </div>
                        </div>
                        <!-- card body begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body table-responsive">
                                    <table class="table   table-bordered " id="example">
                                        <thead class="thead-dark ">
                                            <tr style="font-size: 12px;">

                                                <th scope="col">Admission No</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Subject</th>
                                                <th scope="col">T2<br> (20%)</th>



                                            </tr>
                                        </thead>
                                        <tbody class="ml-1 pt-2" style="font-size: 14px;">

                                            <?php while ($row = mysqli_fetch_assoc($result)) :
                                                $ad_no = $row['admission_no'];
                                                $s_name = $row['student_name'];
                                                $subject = $row['subject'];
                                                $class = $row['student_class'];
                                                $class = $row['student_arm'];
                                                $T2 = $row['T2'];

                                                $a_session = $row['session'];
                                                $term = $row['term']; ?>
                                                <tr>

                                                    <td><?php echo $ad_no; ?></td>
                                                    <td><?php echo $s_name; ?></td>
                                                    <td><?php echo $subject; ?></td>
                                                    <td class="td_align"><?php echo $T2 ?></td>


                                                </tr>
                                            <?php endwhile ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                        <!--card footer begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-footer">
                                    <a href="midterm_scores_teacher_init.php"><button type="button" class="btn btn-primary mr-4">Back</button></a>
                                    <a href="staff_mid_term_score_init.php"><button type="button" class="btn btn-primary ml-4">Input Another Score</button></a>
                                </div>


                            </div>
                        </div>
                    <?php else : ?>
                        <div class="col-md-12 bg-warning text-center mt-4 pt-4">
                            <h3>Scores for the Selected Subject Not Available</h3>
                            <a href="staff_mid_term_score_init.php"><button type="button" class="btn btn-primary m-4">Input Score</button></a>
                        </div>
                    <?php endif ?>


                    </div>
            </div>
        </div>
    </section>

    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>