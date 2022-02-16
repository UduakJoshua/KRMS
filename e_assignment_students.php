<?php
require './controller/e_videos_logic.php';
$title = "BCA | E-Assignment";
include_once './model/inc/student_dash_header.php';

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">E-Assignment</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p><?php echo $_SESSION['st-username']; ?></p>

            </div>

        </div>
    </div>


    <section>
        <div class=" container-fluid  justify-content-center">
            <div>
                <h5><strong>Attention!</strong></h5>
                <ul>
                    <li>Scroll through the list of posted assignments.</li>
                    <li>Read through the Instruction carefully before downloading</li>
                    <li>Tap on the "Download Assignment" Button</li>
                    <li>Answer the questions</li>
                </ul>
            </div>
            <hr>
            <?php

            if (isset($_SESSION['message'])) : ?>
                <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                    <?php echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif ?>


            <?php
            $student_class = $_SESSION['student_class'];
            //echo $student_class;

            $select_sql = "SELECT * FROM student_assignments WHERE student_class =  '$student_class' ORDER BY date_posted DESC ";
            $sql_result = $conn->query($select_sql);
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-sm display" id="" style="width:100%">
                    <thead class="thead-dark ">
                        <tr>

                            <th scope="col">Subject</th>
                            <th scope="col">Assignment Type</th>
                            <th scope="col">Target Class</th>
                            <th scope="col">Date</th>
                            <th scope="col">Instruction</th>
                            <th scope="col">Assignment</th>
                            <th scope="col">Term</th>
                        </tr>
                    </thead>
                    <tbody class="ml-2">
                        <?php
                        while ($row = $sql_result->fetch_assoc()) : ?>

                            <tr>

                                <td><?php echo $row['subject'] ?></td>
                                <td style="width: 20%;"><?php echo $row['assignment_no'] ?></td>
                                <td><?php echo $row['student_class'] ?></td>
                                <td style=" width: 10%;"><?php echo $row['date_posted'] ?></td>
                                <td><?php echo $row['instructions'] ?></td>
                                <td>
                                    <button class="btn btn-sm btn-primary" id="hideButton">
                                        <a class="text-white text-decoration-none" href="<?php echo $row['file_path'] ?>" target="video" id="videoPick">

                                            <span class="fa fa-download"></span> Downlaod Assignment

                                        </a>
                                    </button>
                                </td>

                                <td><?php echo $row['term'] ?></td>


                            </tr>

                        <?php endwhile; ?>


                    </tbody>
                </table>
            </div>
        </div>
        <!--iframe width="100%" height="500" src="" name="video" title="YouTube video player" frameborder="0" transparency="true" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe-->

        <?php $conn->close(); ?>
    </section>


    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>