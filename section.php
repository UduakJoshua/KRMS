<?php
require "./controller/student_logic.php";

$title = "BCA | Student Record Update";
include_once './model/inc/dashboard_header.php';

?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Student Record Update</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>
        <div class="container-fluid">
            <?php
            include_once 'controller/student_logic.php';

            if (isset($_SESSION['message'])) : ?>
                <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                    <li><?php echo $_SESSION['message'] ?></li>
                    <?php unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif; ?>

            <div class="card-header bg-danger text-white">
                <h6>How To Promote a Student to the next class</h6>
                <ul>
                    <li>Check the box against the Student to promote</li>
                    <li>Select the class and arm</li>
                    <li>Click the promote button</li>
                    <li>Refresh your window</li>
                </ul>

            </div>

            <hr>

            <form action="section.php" method="POST">
                <?php


                $c_arm = $_SESSION['arm'];
                $class = $_SESSION['class'];

                //query
                $sql = "SELECT * FROM student WHERE classArm =  '$c_arm' && class_name = '$class' ORDER BY surname ASC";
                $result = $conn->query($sql);
                ?>

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="dark">
                            <tr style="font-size: 12px;">
                                <th scope="col">Select</th>
                                <th scope="col">Admission No</th>
                                <th scope="col">Name</th>
                                <th scope="col"> Current Class</th>
                                <th scope="col">Arm</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <td><input type="checkbox" name="chk[]" value="<?php echo $row['id'] ?>" /></td>
                                    <td><?php echo $row['admissionNo'] ?></td>
                                    <td><?php echo $row['surname'] . " " . $row['firstname'] ?></td>
                                    <td><?php echo $row['class_name'] . " " . $row['classArm'] ?></td>
                                    <td>
                                        <div class="form-group">

                                            <?php
                                            require_once './controller/class_logic.php';
                                            $select_sql = "SELECT * FROM classes WHERE className = 'Alumni'";
                                            $sql_result = $conn->query($select_sql);
                                            ?>
                                            <label for="student_class">Choose a class:</label>

                                            <select name="student_class" id="student_class" class="form-control ">
                                                // using a while loop to iterate the class table
                                                <?php
                                                while ($row = $sql_result->fetch_assoc()) : ?>
                                                    <option value="<?php echo $row['className'] ?>"><?php echo $row['className']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label for="arm">Choose arm:</label>
                                            <select name="arm" id="arm" class="form-control ">

                                                <option value="Art"> Art </option>

                                            </select>
                                        </div>
                                    </td>


                                </tr>
                            <?php endwhile; ?>
                        </tbody>


                    </table>


                </div>
                <hr>
                <div>
                    <button type="submit" class="btn btn-primary btn-md" name="add_section">Add Section</button>
                </div>

            </form>
        </div>

    </section>
    <hr>


    <?php include_once './model/inc/dashboard_footer.php'; ?>