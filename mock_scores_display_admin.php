<?php
require_once 'controller/score_upload_logic.php';
$title = "BCA | Uploaded Scores";
include_once './model/inc/dashboard_header.php';

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">View Uploaded Scores</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p><?php echo $_SESSION['username']; ?></p>
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
                $mock_no = $_SESSION['mock_no'];

                // create a select query

                $sql = "SELECT * FROM mock_scores WHERE student_class = '$class' && class_arm = '$c_arm' 
                    && subject_title = '$subject' && term ='$term'  && mock_no ='$mock_no' 
                     && session ='$aSession' ORDER BY student_name ASC";
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
                                <div class="card-body">
                                    <table class="table table-condensed table-responsive table-bordered " id="example">
                                        <thead class="thead-dark ">
                                            <tr style="font-size: 12px;">

                                                <th scope="col">Admission No</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Subject</th>
                                                <th scope="col">Scores</th>
                                                <th scope="col">Action</th>



                                            </tr>
                                        </thead>
                                        <tbody class="ml-1 pt-2" style="font-size: 14px;">

                                            <?php while ($row = mysqli_fetch_assoc($result)) :
                                                $ad_no = $row['admission_no'];
                                                $s_name = $row['student_name'];
                                                $subject = $row['subject_title'];
                                                $class = $row['student_class'];
                                                $score = $row['score'];
                                                $a_session = $row['session'];
                                                $term = $row['term']; ?>
                                                <tr>

                                                    <td><?php echo $ad_no; ?></td>
                                                    <td><?php echo $s_name; ?></td>
                                                    <td><?php echo $subject; ?></td>
                                                    <td class="td_align"><?php echo $score; ?></td>
                                                    <td>
                                                        <a href="mock_scores_edit.php?edit_mock=<?php echo $row['id']; ?>" class=" btn btn-info btn-sm"> Edit</a>
                                                        <a href="./controller/score_upload_logic.php?delete_mock=<?php echo $row['id']; ?>" class=" btn btn-danger btn-sm"><i>Delete</i></a>
                                                    </td>
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
                                    <a href="mock_scores_init.php"><button type="button" class="btn btn-primary mr-4">Back</button></a>
                                    <a href="mock_admin_input.php"><button type="button" class="btn btn-primary ml-4">Input Another Score</button></a>
                                </div>


                            </div>
                        </div>
                    <?php else : ?>
                        <div class="col-md-12 bg-warning text-center mt-4 pt-4">
                            <h3>Scores for the Selected Subject Not Available</h3>
                            <a href="mock_admin_input.php"><button type="button" class="btn btn-primary m-4">Input Score</button></a>
                        </div>
                    <?php endif ?>
                    <?php $conn->close(); ?>

                    </div>
            </div>
        </div>
    </section>

    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>