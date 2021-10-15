<?php
require './controller/dbase_conn.php';
require './controller/student_result_list_init.php';
$title = "BCA | Mid-Term Result";
include_once './model/inc/student_dash_header.php';

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <div class=" mb-2 mb-md-0">
            <?php
            $admin_no = $_SESSION['st-user_id'];
            $sql = "SELECT * FROM student WHERE id = '$admin_no' ";
            $result = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($result)) : ?>
                <div>
                    <?php
                    echo "<div class = 'img_div'>";
                    echo "<img src='assets/img/" . $row['image'] . "' >";
                    echo "</div>";
                    ?>
                <?php endwhile; ?>

                </div>
                <h1 class="h5">Print/View Mid-Term Result</h1>

        </div>
    </div>


    <section>

        <?php

        if (isset($_SESSION['upload'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                <?php echo $_SESSION['upload'];
                unset($_SESSION['upload']);
                ?>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="staff_midterm_display_init.php" method="POST">
                    <div class="card">
                        <!--card header begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <h5>Select Term to view result</h5>
                                </div>
                            </div>
                        </div>
                        <!-- card body begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-2">
                                            <label for="term">Term</label>

                                            <select name="term" id="term" class="form-control ">

                                                <option value="1st Term"> 1st Term </option>
                                                <option value="2nd Term"> 2nd Term </option>
                                                <option value="3rd Term"> 3rd Term </option>

                                            </select>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="aSession">Session</label>

                                            <select name="aSession" id="aSession" class="form-control ">

                                                <option value="2020/2021"> 2020/2021 </option>
                                                <option value="2021/2022"> 2021/2022 </option>
                                                <option value="2022/2023"> 2022/2023</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--card footer begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="stud_display">Display Result</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>

        </div>



        <?php

        include_once './model/inc/dashboard_footer.php';

        ?>