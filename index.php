<?php
require_once './controller/login_logic.php';
include_once('./model/inc/header.php');
$title = "BCA | Dashboard";
?>

<section class="container portal_section">
    <h5 class="text-center">Welcome! Kindly click on the login button to get started
        with your portal.</h5>


    <div class="row mt-4 ml-auto ">
        <!--user role-->
        <div class="col-md-4 btn-base">
            <a href="student_login.php" target="_blank">
                <button class="btn btn-primary btn-desig">Student Login</button>
            </a>
            <p class="text-center">For Students and Parents only!</p>
        </div>
        <!--teacher role-->
        <div class="col-md-4 btn-base">
            <a href="#" target="_blank">
                <button class="btn btn-success btn-desig">Teacher's Login</button>
            </a>
            <p class="text-center">For Teachers only!</p>
        </div>
        <!--admin role-->
        <div class="col-md-4 btn-base">
            <a href="portal_login.php">
                <button class="btn btn-warning btn-center btn-desig">Admin Login</button>
            </a>
            <p class="text-center">For School Admin only!</p>
        </div>
    </div>
</section>

<?php include_once('./model/inc/footer.php'); ?>