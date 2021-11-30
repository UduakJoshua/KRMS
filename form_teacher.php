<?php
require "./controller/form_teacher_logic.php";
require_once "./controller/staff_login_logic.php";
$title = "BCA | Form Teachers";
include_once './model/inc/dashboard_header.php';

?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Class Promotion / List</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>

        <div class="row justify-content-center">
            <div class="col-md-9">
                <form action="form_teacher.php" method="POST">
                    <input type="hidden" class="form-control " name="id" value="<?php echo $id ?>">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                require_once './controller/staff_logic.php';
                                $select_sql = "SELECT * FROM staff ";
                                $sql_result = $conn->query($select_sql);

                                ?>

                                <select name="staff_name" id="staff_name" class="form-control " value>
                                    // using a while loop to iterate the class table
                                    <?php
                                    while ($row = $sql_result->fetch_assoc()) : ?>
                                        <option value="<?php echo $row['surname'] . " " . $row['firstname'] ?>"><?php echo $row['surname'] . " " . $row['firstname'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>



                        <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                require_once './controller/class_logic.php';
                                $select_sql = "SELECT * FROM classes ";
                                $sql_result = $conn->query($select_sql);
                                ?>
                                <select name="student_class" id="student_class" class="form-control " value>
                                    // using a while loop to iterate the class table
                                    <?php
                                    while ($row = $sql_result->fetch_assoc()) : ?>
                                        <option value="<?php echo $row['className'] ?>"><?php echo $row['className']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-nd-4">
                            <div class="form-group">
                                <div class="form-group">

                                    <select name="arm" id="arm" class="form-control ">
                                        <option value="Art"> Art</option>
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
                                        <option value="Science"> Science</option>
                                        <option value="Virtue"> Virtue</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <?php if ($update == true) :
                        ?>
                            <button type="submit" class="btn btn-primary " name="updateTeacher">Update Teacher</button>
                        <?php else : ?>

                            <button type="submit" class="btn btn-primary " name="addTeacher">Assign Form Teacher</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <hr>


    <?php include_once './model/inc/dashboard_footer.php'; ?>