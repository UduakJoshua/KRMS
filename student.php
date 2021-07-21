<?php
require "./controller/student_logic.php";
$title = "BCA | Student Management";
include_once './model/inc/dashboard_header.php';
?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Register Student</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <form action="student.php" method="POST" enctype="multipart/form-data">
                    <h5>Student's Biodata</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">

                                <label for="image">Student's Image</label>
                                <input type="file" name=" image" accept="image/*" onchange="loadFile(event)">

                            </div>

                        </div>

                        <div class="col-md-4 img_preview">
                            <img id="output" />

                        </div>
                    </div>
                    <hr>


                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="surname">Surname <span class="required">*</span></label>
                                <input type="text" class="form-control " required name="surname" id="surname" aria-describedby="surname" placeholder="Enter Surname">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Firstname <span class="required">*</span></label>
                                <input type="text" class="form-control " required name="firstname" id="firstname" aria-describedby="firstname" placeholder="Enter Firstname">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="middlename">Middlename</label>
                                <input type="text" class="form-control " name="middlename" id=middlename" aria-describedby="lastname" placeholder="Enter Lastname">
                            </div>
                        </div>
                    </div>


                    <!--row 2-->
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dob">Date of Birth </span></label>
                                <input type="date" class="form-control " name="dob" id="dob" aria-describedby="Date of Birth" placeholder="Enter Date of Birth">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender">Gender <span class="required">*</span></label>
                                <input type="text" class="form-control " required name="gender" id="gender" placeholder="Enter Sex">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="religion">Religion</label>
                                <input type="text" class="form-control " name="religion" id="Lastname" placeholder="Enter Religion">
                            </div>
                        </div>
                    </div>

                    <!--Admission info begins-->
                    <h5>Admission Information</h5>
                    <hr>
                    <div class="row">

                        <div class="col-md-4">
                            <label for="admin_no">Admission Number <span class="required">*</span></label>
                            <input type="text" class="form-control " required name="admin_no" id="admin_no" aria-describedby="admission number" placeholder="Enter Admission number">

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student_class">Class</label>
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

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="class_arm">Arm <span class="required">*</span></label>
                                <input type="text" class="form-control " name="class_arm" id="class_arm" placeholder="Enter Arm" required>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="admin_year">Admission Year <span class="required">*</span></label>
                                <input type="text" class="form-control " name="admin_year" id="admin_year" aria-describedby="admission number" placeholder="Enter Admission number">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="st_password">Password <span class="required">*</span></label>
                                <input type="password" class="form-control " name="st_password" id="st_password" aria-describedby="admission number" required placeholder="Enter Admission number">
                            </div>
                        </div>

                    </div>

                    <!-- student's contact information begins here -->

                    <h5>Contact Information</h5>
                    <hr>

                    <div class="row">

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="home_address">Residential Address <span class="required">*</span></label>
                                <input type="text" class="form-control " name="home_address" id="home_address" aria-describedby="address" placeholder="Enter Contact Address">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nationality">Nationality</label>
                                <input type="text" class="form-control " name="nationality" id="nationality" aria-describedby="nationality" placeholder="Enter Nationality">
                            </div>
                        </div>

                    </div>
                    <br>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="origin">State of Origin</span></label>
                                <input type="text" class="form-control " name="origin" id="origin" aria-describedby="address" placeholder="Enter Contact Address">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lga">L.G.A</label>
                                <input type="text" class="form-control " name="lga" id="lga" aria-describedby="lga" placeholder="Enter Local Government Area">
                            </div>
                        </div>



                    </div>


                    <h5>Guardian Information</h5>
                    <hr>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dad_name">Father's Name </span></label>
                                <input type="text" class="form-control " name="dad_name" id="dad_name" aria-describedby="father's name" placeholder="Enter Father's Name">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dad_no">Phone No </span></label>
                                <input type="text" class="form-control " name="dad_no" id="dad_no" aria-describedby="father's number" placeholder="Enter father's number">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email_d">E-mail Address</label>
                                <input type="email" class="form-control " name="email_d" id="email_d" aria-describedby="father's e-mail" placeholder="user@gmail.com">
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mom_name">Mother's Name</label>
                                <input type="text" class="form-control " name="mom_name" id="mom_name" aria-describedby="mother's name" placeholder="Enter Father's Name">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mom_no">Phone No</label>
                                <input type="text" class="form-control " name="mom_no" id="mom_no" aria-describedby="mother's number" placeholder="Enter mom's number">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email_m">E-mail Address</label>
                                <input type="email" class="form-control " name="email_m" id="email_m" aria-describedby="mother's e-mail" placeholder="user@gmail.com">
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dadJob">Father's Occupation </span></label>
                                <input type="text" class="form-control " name="dadJob" id="dadJob">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="momJob">Mother's Occupation </span></label>
                                <input type="text" class="form-control " name="momJob" id="momJob">
                            </div>
                        </div>

                    </div>
                    <hr>

                    <div class="form-group ">
                        <?php if ($update == true) :
                        ?>
                            <button type="submit" class="btn btn-primary " name="update">Update Record</button>
                        <?php else : ?>

                            <button type="submit" class="btn btn-primary " name="save">Save Record</button>
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