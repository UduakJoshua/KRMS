<?php
require "./controller/class_logic.php";
$title = "BCA | Class Management";
include_once './model/inc/dashboard_header.php';
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5">Create Class</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>

    <section>
        <div class="row">

            <div class="col-md-3 icon_div" style="background-color: #f5d442">
                <div>
                    <span class="fa fa-desktop icon" aria-hidden="true"></span>
                </div>
                <div>
                    <a href="class.php" class="text-decoration-none icon-a">
                        <p class="text-center text-white">Create Class</p>
                    </a>
                </div>
            </div>

            <!--col 2 -->
            <div class="col-md-3 icon_div" style="background-color: #f54259;">
                <div>
                    <span class="fa fa-pencil icon" aria-hidden="true"></span>
                </div>
                <div>
                    <a href="class_display.php" class="text-decoration-none icon-a">
                        <p class="text-center text-white">Display Class</p>
                    </a>
                </div>
            </div>

            <div class="col-md-3 icon_div" style="background-color: #126e29;">
                <div>
                    <span class="fa fa-book icon" aria-hidden="true"></span>
                </div>
                <div>
                    <a href="class_promotion.php" class="text-decoration-none icon-a">
                        <p class="text-center text-white">Promote Students</p>
                    </a>
                </div>
            </div>

        </div>

    </section>
    <hr>

    <?php
    include_once './model/inc/dashboard_footer.php';
    ?>