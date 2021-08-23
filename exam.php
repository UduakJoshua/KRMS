<?php
include_once './controller/dbase_conn.php';
$title = "BCA | Check Examination Result";
include_once './model/inc/student_dash_header.php';
?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="mr-2">

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
        </div>

        <div>
            <p>Term: 3rd Term <br>
                Session: 2020/2021</p>
        </div>
    </div>


    <section>

        <form action="exam.php" method="post">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="term">Term</label>

                        <select name="term" id="term" class="form-control ">

                            <option value="1st Term"> 1st Term </option>
                            <option value="2nd Term"> 2nd Term </option>
                            <option value="3rd Term"> 3rd Term </option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary " name="init_score">Display</button>
            </div>
            <a href="#" target="_blank">
                <button class="btn btn-primary">Download Result</button></a>

        </form>
        <div class="row">
            <div class="col-md-12 mt-4">




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


            </div>

        </div>

        <!--<div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <h2>
                    The <br />Examination for Third term 2020/2021 Academic Session <br /><span class="text-danger"> is yet to be written!</span>
                    Stay alert as you will be notified when the result is avaialable.
                    <br />Thank You! and stay safe. <br>
                    Best Regards BCA!
                </h2>
            </div>
        </div>-->


    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>