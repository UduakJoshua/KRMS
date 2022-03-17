<?php
require './controller/dbase_conn.php';
require './controller/psychomotor_logic.php';
$title = "BCA | Student's Domain ";
include_once './model/inc/dashboard_header.php';

?>

<main role="main" class="col-lg-10 ml-sm-auto col-lg-10.b.gb./b/vbV//b px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Student's Domain Rating</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>






        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="psychomotor.php" method="POST">

                    <div class="card">
                        <!--card header begins here-->

                        <?php

                        if (isset($_GET['display'])) {
                            $admission_no = $_GET['display'];

                            $select_sql = "SELECT * FROM student WHERE admissionNo='$admission_no' ";
                            $sql_result = $conn->query($select_sql);
                        }
                        ?>

                        <div class=" card-header bg-danger text-white pt-2 ">
                            <?php
                            while ($row = $sql_result->fetch_assoc()) :
                            ?>
                                <h5 class="text-center">Input Psychomotor For <?php echo $row['surname'] . " " . $row['firstname'] . " " . $row['middlename']; ?>
                                </h5>

                        </div>
                        <div>
                            <h6 class="text-center mt-2 "><strong>Student's Detail</strong></h6>
                            <div class="row mt-1 ml-auto mr-2">
                                <div class="col-md-3">
                                    <input type="text" name="student_name" value="<?php echo $row['surname'] . " " . $row['firstname'] ?>" readonly class="form-control" size="50">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="admin_no" value="<?php echo $row['admissionNo']  ?>" readonly class="form-control" size="30">
                                </div>

                                <div class="col-md-3">
                                    <input type="text" name="student_class" value="<?php echo $row['class_name'] ?>" readonly class="form-control" size="40">
                                </div>

                                <div class="col-md-3">
                                    <input type="text" name="class_arm" value="<?php echo $row['classArm'] ?>" readonly class="form-control" size="40">
                                </div>
                                <div class="col-md-3">

                                    <input type=" text" name="a_session" class="form-control" readonly value="2021/2022" hidden>

                                </div>
                                <div class="col-md-3">

                                    <input type=" text" name="term" class="form-control" readonly value="2nd Term" hidden>

                                </div>

                            </div>
                        <?php endwhile; ?>
                        <hr>
                        <h6 class="text-center mt-3 "><strong>Affective Traits</strong></h6>
                        <div class="row mt-1 ml-auto mr-2">
                            <div class="col-md-2 mt-1">
                                <input type="number" name="punctuality" placeholder="Punctuality" class="form-control" max="5">
                            </div>
                            <div class="col-md-2 mt-1">
                                <input type="number" name="alertness" placeholder="Mental Alertness" class="form-control" max="5">
                            </div>

                            <div class="col-md-2 mt-1">
                                <input type="number" name="attentiveness" placeholder="Attentiveness" class="form-control" max="5">
                            </div>

                            <div class="col-md-2 mt-1">
                                <input type="number" name="respect" placeholder="Respect" class="form-control" max="5">
                            </div>
                            <div class="col-md-2 mt-1">
                                <input type="number" name="neatness" placeholder="Neatness" class="form-control" max="5">
                            </div>
                            <div class="col-md-2 mt-1">
                                <input type="number" name="politeness" placeholder="Politeness" class="form-control" max="5">
                            </div>

                        </div>
                        <div class="row mt-1 ml-auto mr-2 mt-3">
                            <div class="col-md-3 mt-1">
                                <input type="number" name="relationship" placeholder="Relationship With Peers" class="form-control" max="5">
                            </div>
                            <div class="col-md-3 mt-1">
                                <input type="number" name="attitude" placeholder="Attitutude to School" class="form-control" max="5">
                            </div>

                            <div class="col-md-3 mt-1">
                                <input type="number" name="team_work" placeholder="Spirit of Team Work" class="form-control" max="5">
                            </div>

                            <div class="col-md-3 mt-1">
                                <input type="number" name="school_work" placeholder="Completeness of  School Work" class="form-control" max="5">
                            </div>
                        </div>
                        <div class="row mt-1 ml-auto mr-2 mt-3">

                            <div class="col-md-3 mt-1">
                                <input type="number" name="honesty" placeholder="Honesty" class="form-control" max="5">
                            </div>

                        </div>
                        <hr>
                        <h6 class="text-center "><strong>Psychomotor</strong></h6>
                        <div class="row mt-1 ml-auto mr-2 mt-3">
                            <div class="col-md-2 mt-1">
                                <input type="number" name="reading" placeholder="Reading" class="form-control" max="5">
                            </div>
                            <div class="col-md-2 mt-1">
                                <input type="number" name="handwriting" placeholder="Handwriting" class="form-control" max="5">
                            </div>

                            <div class="col-md-2 mt-1">
                                <input type="number" name="music" placeholder="Musical Skill" class="form-control" max="5">
                            </div>

                            <div class="col-md-2 mt-1">
                                <input type="number" name="diction" placeholder="Verbal Fluency" class="form-control" max="5">
                            </div>
                            <div class="col-md-2 mt-1">
                                <input type="number" name="art" placeholder="Creative Art" class="form-control" max="5">
                            </div>
                            <div class="col-md-2">
                                <input type="number" name="phe" placeholder="Physical Education" class="form-control" max="5">
                            </div>
                        </div>
                        <div class="row mt-1 ml-auto mr-2 mt-3 mb-3">
                            <div class="col-md-2">
                                <input type="number" name="reasoning" placeholder="General Reasoning" class="form-control" max="5">
                            </div>
                        </div>
                        </div>




                        <!-- card footer to submit form-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="psychomotor">Save Psychomotor</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>


    </section>

    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>