<?php
require "./controller/student_logic.php";

$title = "BCA | Student Record Update";
include_once './model/inc/dashboard_header.php';
$c_arm = $_SESSION['arm'];
$class = $_SESSION['class'];

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
                <h6>How To Add/Change Student's Sectiont</h6>
                <ul>
                    <li>Check the box against the Student</li>
                    <li>Select the Section</li>
                    <li>Click the Add Section button below</li>

                </ul>

            </div>

            <hr>

            <form action="section.php" method="POST">

                <?php
                //query
                $sql = "SELECT * FROM student WHERE classArm =  '$c_arm' && class_name = '$class' ORDER BY surname ASC";
                $result = $conn->query($sql);
                ?>

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="dark">
                            <tr style="font-size: 12px;">

                                <th scope="col">Admission No</th>
                                <th scope="col">Name</th>
                                <th scope="col"> Current Class</th>
                                <th scope="col"> status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) : ?>
                                <tr>

                                    <td><?php echo $row['admissionNo'] ?></td>
                                    <td><?php echo $row['surname'] . " " . $row['firstname'] ?></td>
                                    <td><?php echo $row['class_name'] . " " . $row['classArm'] ?></td>
                                    <td>
                                        <?php if ($row['section'] != " "  && $row['section'] == 'High' || $row['section'] == 'Basic') : ?>

                                            <button class="btn btn-primary btn-sm " disabled>Section Added</button>

                                        <?php else : ?>
                                            <button class="btn btn-danger btn-sm " disabled>Section Not Added</button>
                                        <?php endif; ?>
                                    </td>
                                    <td> <a href="add_section.php?edit=<?php echo $row['id']; ?>" class=" btn btn-info btn-sm"> Edit</a></a></td>

                                </tr>
                            <?php endwhile; ?>
                        </tbody>


                    </table>


                </div>
                <hr>
                <div>
                    <a href="section_init.php" class=" btn btn-info btn-sm"> Update Another Class</a>
                </div>

            </form>
        </div>

    </section>
    <hr>


    <?php include_once './model/inc/dashboard_footer.php'; ?>