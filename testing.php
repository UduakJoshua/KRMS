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

    <div class="col-md-4">

        <?php if ($row['class_name'] == "JSS One" || $row['class_name'] == "JSS Two") : ?>
            <a href="tb_jss1_2.php" class="text-decoration-none"><button class="btn btn-secondary btn-block mt-4"> Mid-Term Time table</button></a>

        <?php elseif ($row['class_name'] == "SSS One" || $row['class_name'] == "SSS Two") : ?>

            <a href="tb_sss1_2.php" class="text-decoration-none"><button class="btn btn-primary btn-block mt-4"> Mid-Term Time table</button></a>

        <?php elseif ($row['class_name'] == "JSS Three") : ?>

            <a href="tb_jss3.php" class="text-decoration-none"><button class="btn btn-primary btn-block mt-4"> Mid-Term Time table</button></a>

        <?php elseif ($row['class_name'] == "SSS Three") : ?>

            <a href="tb_sss3.php" class="text-decoration-none"><button class="btn btn-primary btn-block mt-4"> Mid-Term Time table</button></a>

            <!-- time table basic -->
        <?php elseif ($row['section'] == "Basic") : ?>

            <a href="basic_tb.php" class="text-decoration-none"><button class="btn btn-primary btn-block mt-4"> Mid-Term Time table</button></a>
            <!-- time table bloomers-->
        <?php elseif ($row['class_name'] == "Bloomers") : ?>

            <a href="pre_nursery_tb.php" class="text-decoration-none"><button class="btn btn-success btn-block mt-4"> Mid-Term Time table</button></a>
            <!-- time table  progressive-->
        <?php elseif ($row['class_name'] == "Progressive") : ?>

            <a href="progressive_tb.php" class="text-decoration-none"><button class="btn btn-success btn-block mt-4"> Mid-Term Time table</button></a>
            <!-- time table step up -->
        <?php elseif ($row['class_name'] == "Step Up") : ?>

            <a href="step_up_tb.php" class="text-decoration-none"><button class="btn btn-success btn-block mt-4"> Mid-Term Time table</button></a>

        <?php else : ?>
            <a href="#" class="text-decoration-none"><button class="btn btn-dark btn-block mt-4"> </button></a>
        <?php endif; ?>
    </div>