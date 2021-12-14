<?php
require "./controller/student_logic.php";
$title = "BCA | Student Management";
include_once './model/inc/dashboard_header.php';
?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Edit Student</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <form action="add_section.php" method="POST">
                    <input type="hidden" class="form-control " name="id" value="<?php echo $id ?>">
                    <h5>Student's Biodata</h5>
                    <hr>

                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="surname">Surname <span class="required">*</span></label>
                                <input type="text" class="form-control " readonly value=" <?php echo $surname; ?>" name="surname" id="surname" aria-describedby="surname" placeholder="Enter Surname">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="firstname">Firstname <span class="required">*</span></label>
                                <input type="text" class="form-control " readonly value=" <?php echo $firstname; ?>" name="firstname" id="firstname" aria-describedby="firstname" placeholder="Enter Firstname">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="class">Class <span class="required">*</span></label>
                                <input type="text" class="form-control " readonly value=" <?php echo $class . " " . $class_arm; ?>" name="class" id="class" aria-describedby="firstname" placeholder="Enter Firstname">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="section">Section <span class="required">*</span></label>
                                <select name="section" id="section" class="form-control " value>

                                    <option value="Basic">Basic</option>
                                    <option value="High">High</option>
                                    <option value="Nursery">Nursery</option>

                                </select>
                            </div>
                        </div>
                    </div>


                    <!--row 2-->

                    <!-- student's contact information begins here -->

                    <hr>

                    <div class="form-group ">


                        <button type="submit" class="btn btn-primary " name="add_section">Save Record</button>

                    </div>

                </form>

            </div>

        </div>

    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>