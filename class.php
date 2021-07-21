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

        <div class="row justify-content-center">
            <div class="col-md-9">
                <form action="class.php" method="POST">

                    <input type="hidden" class="form-control " name="id" value="<?php echo $id ?>">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="class_name">Class Name</label>
                                <input type="text" class="form-control " name="class_name" id="class_name" aria-describedby="class name" value="<?php echo $class ?>" placeholder="Enter Class name">
                            </div>
                        </div>



                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="section">Section</label>
                                <input type="text" class="form-control " name="section" id="section" value="<?php echo $sect ?> " aria-describedby=" class section" placeholder="Enter Section">
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <?php if ($update == true) :
                        ?>
                            <button type="submit" class="btn btn-primary " name="update">Update</button>
                        <?php else : ?>

                            <button type="submit" class="btn btn-primary " name="addClass">Create Class</button>
                        <?php endif; ?>
                    </div>
                </form>

            </div>
        </div>
        <hr>

    </section>
    <hr>

    <?php
    include_once './model/inc/dashboard_footer.php';
    ?>