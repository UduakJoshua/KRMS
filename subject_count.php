<?php
require "./controller/subject_logic.php";
$title = "BCA | Subject Management";
include_once './model/inc/dashboard_header.php';

?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Number of Subjects Taken</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>

        <div class="row justify-content-center">
            <div class="col-md-9">
                <form action="subject_count.php" method="POST">
                    <input type="hidden" class="form-control " name="id" value="<?php echo $id ?>">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                require_once './controller/class_logic.php';
                                $select_sql = "SELECT * FROM classes ORDER BY className ASC";
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
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_subject">Add No of Subjects</label>
                                <input type="number" class="form-control " name="no_subject" id="no_subject" aria-describedby="number of subject" value="<?php echo $no_of_subject ?>" placeholder="Enter No of Subject">
                            </div>
                        </div>


                    </div>

                    <div class="form-group ">
                        <?php if ($update == true) :
                        ?>
                            <button type="submit" class="btn btn-primary " name="update">Update</button>
                        <?php else : ?>

                            <button type="submit" class="btn btn-primary " name="add_subject_no">Save Record</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

        <hr>

        <div class=" container-fluid  justify-content-center">
            <?php

            if (isset($_SESSION['message'])) : ?>
                <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                    <?php echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif ?>


            <?php
            require_once './controller/subject_logic.php';
            $select_sql = "SELECT * FROM no_of_subjects ";
            $sql_result = $conn->query($select_sql);
            ?>

            <table class="table table-striped table-sm display" id="example" style="width:100%">
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col">Class</th>
                        <th scope="col">No Of Subjects Offered</th>
                        <th colspan="2" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="ml-2">
                    <?php
                    while ($row = $sql_result->fetch_assoc()) : ?>

                        <tr>
                            <td class="td_align"><?php echo $row['class_name'] ?></td>
                            <td class="td_align"><?php echo $row['no_of_subjects'] ?></td>
                            <td class="td_align">
                                <a href="subject_count.php?edit=<?php echo $row['id']; ?>" class=" btn btn-info btn-sm"> Edit</a>
                                <a href="./controller/subject_logic.php?delete_record=<?php echo $row['id']; ?>" class=" btn btn-danger btn-sm">Delete</i></a>
                            </td>
                        </tr>

                    <?php endwhile; ?>

                </tbody>
            </table>

        </div>
    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>