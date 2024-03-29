<?php
require "./controller/subject_logic.php";
$title = "BCA | Subject Management";
include_once './model/inc/dashboard_header.php';

?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Create Subjects</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>

        <div class="row justify-content-center">
            <div class="col-md-9">
                <form action="subject.php" method="POST">
                    <input type="hidden" class="form-control " name="id" value="<?php echo $id ?>">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control " name="subject" id="subject" aria-describedby="subject" value="<?php echo $subject ?>" placeholder="Enter Subject">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="section">Section</label>

                                <select name="section" id="section" class="form-control ">
                                    <option value="General">General</option>
                                    <option value="Nursery">Nursery</option>
                                    <option value="Primary">Primary</option>
                                    <option value="Secondary">Secondary</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <?php if ($update == true) :
                        ?>
                            <button type="submit" class="btn btn-primary " name="update">Update</button>
                        <?php else : ?>

                            <button type="submit" class="btn btn-primary " name="addSubject">Add Subject</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>