<?php
require './controller/dbase_conn.php';
$title = "BCA | Get Password";
include_once './model/inc/dashboard_header.php';


$password = "";
if (isset($_POST['encrypt'])) {
    $pass = $_POST['password1'];
    $password = password_hash($pass, PASSWORD_DEFAULT);
}
?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="col-md-9">
        <form action="testing.php" method="POST">
            <div class="row">
                <div class="col-md-4 form-group mt-4">
                    <label for="number">Password</label>
                    <input type="text" placeholder="Enter Phone Number" value="<?php echo $pass ?>" class="form-control" name="password1">
                </div>
                <div class="col-md-8 form-group mt-4">
                    <label for="number">New Password</label>
                    <input type="text" placeholder="Message" name="password2" class="form-control" value="<?php echo $password ?>">
                </div>
                <div class="col-md-4 form-group mt-4">
                    <input type="submit" value="Encrypt Password" class="form-control btn btn-primary" name="encrypt">
                </div>
            </div>
        </form>
    </div>