<?php
include_once './controller/dbase_conn.php';
$title = "BCA | Check Midterm Result";
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
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <h2>
                    The <br />Examination for Third term 2020/2021 Academic Session <br /><span class="text-danger"> is yet to be written!</span>
                    Stay alert as you will be notified when the result is avaialable.
                    <br />Thank You! and stay safe. <br>
                    Best Regards BCA!
                </h2>
            </div>
        </div>


    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>