<?php
require "./controller/dbase_conn.php";

$title = "BCA | Class Promotion";
include_once './model/inc/dashboard_header.php';

$query = "SELECT * FROM student order by class_name";
$result = $conn->query($query);

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
        <div class="container-fluid">

            <?php
            include_once "./controller/class_promotion_logic.php";
            ?>
            <div class="card-header">
                <h6>Please select a student to activate or suspend the account</h6>
            </div>

            <br />
            <form action="class_promotion.php" method="post">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="dark">
                            <tr style="font-size: 12px;">
                                <th scope="col">Select</th>
                                <th scope="col">Admission No</th>
                                <th scope="col">Name</th>
                                <th scope="col"> Current Class</th>
                                <th scope="col">New Class</th>
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
                                    </td>
                                    <td>
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
                                    </td>

                                    <td>
                                        <button type="submit" class="btn btn-primary btn-sm" name="promote">Promote</button>

                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>

                </div>


            </form>
        </div>

    </section>
    <hr>


    <?php include_once './model/inc/dashboard_footer.php'; ?>