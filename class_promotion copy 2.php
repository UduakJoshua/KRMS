<?php
require "./controller/subject_logic.php";

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

            <form action="class_promotion.php" method="POST">


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



                <div>
                    <button type="submit" class="btn btn-primary btn-sm" name="promote">Promote</button>
                </div>

        </div>


        </form>
        </div>

    </section>
    <hr>


    <?php include_once './model/inc/dashboard_footer.php'; ?>