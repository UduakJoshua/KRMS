<?php
require './controller/dbase_conn.php';
$title = "BCA | Notification";
include_once './model/inc/student_dash_header.php';

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Print/View Termly Result</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p><?php echo $_SESSION['st-username']; ?></p>
            </div>

        </div>
    </div>


    <section class="text-danger text-center bg-warning  " style="padding: 70px 5px">
        <h3 class="text-white">Hello <?php echo $_SESSION['st-username']; ?>,</h3>
        <h5>The Selected Mock Examination is yet to be written. <br>
            Check Back again. Thank You!</h5>
    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>