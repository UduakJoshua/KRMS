<?php
require "./controller/student_logic.php";
$title = "BCA | Update Student Record";
include_once './model/inc/dashboard_header.php';
?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Student Section</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>



        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="section_init.php" method="POST">
                    <div class="card">
                        <!--card header begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <h5>Select Parameters</h5>
                                </div>
                            </div>
                        </div>
                        <!-- card body begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="student_class">Student's Class</label>

                                            <?php
                                            require_once "controller/class_logic.php";
                                            $select_sql = "SELECT * FROM classes ORDER BY className ASC";
                                            $sql_result = $conn->query($select_sql);
                                            ?>
                                            <select name="student_class" id="student_class" class="form-control ">
                                                // using a while loop to iterate the class table
                                                <?php
                                                while ($row = $sql_result->fetch_assoc()) : ?>
                                                    <option value="<?php echo $row['className']; ?>"><?php echo $row['className']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label for="class">Arm</label>
                                            <select name="arm" id="arm" class="form-control ">

                                                <option value="Faithfulness"> Faithfulness</option>
                                                <option value="Gracefulness"> Gracefulness</option>
                                                <option value="Goodness"> Goodness</option>
                                                <option value="Holiness"> Holiness</option>
                                                <option value="Humility"> Humility</option>
                                                <option value="Joyfulness"> Joyfulness</option>
                                                <option value="Kindness"> Kindness</option>
                                                <option value="Love"> Love</option>
                                                <option value="Meekness"> Meekness</option>
                                                <option value="Peace"> Peace</option>
                                                <option value="Purity"> Purity</option>
                                                <option value="Virtue"> Virtue</option>
                                                <option value="Science"> Science</option>
                                                <option value="Art"> Art</option>


                                            </select>
                                        </div>



                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--card footer begins here-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="section_init">Initialize</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>