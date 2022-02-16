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
                <form action="edit_student.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" class="form-control " name="id" value="<?php echo $id ?>">
                    <h5>Student's Biodata</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">

                                <label for="image">Student's Image</label>
                                <input type="file" name=" image" accept="image/*" onchange="loadFile(event)" value="<?php echo $image; ?>">

                            </div>

                        </div>

                        <div class="col-md-4 img_preview">
                            <?php
                            echo "<img  id = 'output' src='assets/img/" . $image . "' >";
                            ?>

                        </div>
                    </div>
                    <hr>


                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="surname">Surname <span class="required">*</span></label>
                                <input type="text" class="form-control " required value="<?php echo $surname; ?>" name="surname" id="surname" aria-describedby="surname" placeholder="Enter Surname">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Firstname <span class="required">*</span></label>
                                <input type="text" class="form-control " required value="<?php echo $firstname; ?>" name="firstname" id="firstname" aria-describedby="firstname" placeholder="Enter Firstname">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="middlename">Middlename</label>
                                <input type="text" class="form-control " value="<?php echo $middlename; ?>" name="middlename" id=middlename" aria-describedby="lastname" placeholder="Enter Lastname">
                            </div>
                        </div>
                    </div>


                    <!--row 2-->
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dob">Date of Birth </span></label>
                                <input type="date" class="form-control " value=" <?php echo $dob; ?>" name="dob" id="dob" aria-describedby="Date of Birth" placeholder="Enter Date of Birth">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender">Gender <span class="required">*</span></label>
                                <input type="text" class="form-control " required value=" <?php echo $gender; ?>" name="gender" id="gender" placeholder="Enter Sex">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="religion">Religion</label>
                                <input type="text" class="form-control " value=" <?php echo $religion; ?>" name="religion" id="Lastname" placeholder="Enter Religion">
                            </div>
                        </div>
                    </div>

                    <!--Admission info begins-->
                    <h5>Admission Information</h5>
                    <hr>
                    <div class="row">

                        <div class="col-md-4">
                            <label for="admin_no">Admission Number <span class="required">*</span></label>
                            <input type="text" class="form-control " value="<?php echo $admin_no; ?>" required name="admin_no" id="admin_no" aria-describedby="admission number" placeholder="Enter Admission number">

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student_class">Class</label>
                                <input type="text" class="form-control " required name="student_class" id="student_class" aria-describedby="Student Class" value="<?php echo $class; ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="class_arm">Arm <span class="required">*</span></label>
                                <input type="text" class="form-control " value=" <?php echo $class_arm; ?>" name="class_arm" id="class_arm" placeholder="Enter Arm" required>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="section">Section <span class="required">*</span></label>
                                <select name="section" id="section" class="form-control " value>

                                    <option value="Basic">Basic</option>
                                    <option value="High">High</option>
                                    <option value="High">Nursery</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="admin_year">Admission Year <span class="required">*</span></label>
                                <input type="text" class="form-control " value=" <?php echo $admin_year; ?>" name="admin_year" id="admin_year" aria-describedby="admission number" required placeholder="Enter Admission number">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="st_password">Password <span class="required">*</span></label>
                                <input type="password" class="form-control " name="st_password" id="st_password" aria-describedby="create a password" placeholder="Enter password">
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
                                <input type="text" class="form-control " value=" <?php echo $address; ?>" name="home_address" id="home_address" aria-describedby="address" placeholder="Enter Contact Address">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nationality">Nationality</label>
                                <input type="text" class="form-control " value=" <?php echo $nationality ?>" name="nationality" id="nationality" aria-describedby="nationality" placeholder="Enter Nationality">
                            </div>
                        </div>

                    </div>
                    <br>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="origin">State of Origin <span class="required">*</span></label>
                                <input type="text" class="form-control " value=" <?php echo $state; ?>" name="origin" id="origin" aria-describedby="address" placeholder="Enter Contact Address" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lga">L.G.A</label>
                                <input type="text" class="form-control " value=" <?php echo $lga; ?>" name="lga" id="lga" aria-describedby="lga" placeholder="Enter Local Government Area">
                            </div>
                        </div>



                    </div>


                    <h5>Guardian Information</h5>
                    <hr>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dad_name">Father's Name <span class="required">*</span></label>
                                <input type="text" class="form-control " value=" <?php echo $father; ?>" name="dad_name" id="dad_name" aria-describedby="father's name" placeholder="Enter Father's Name">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dad_no">Phone No <span class="required">*</span></label>
                                <input type="text" class="form-control " value=" <?php echo $father_no; ?>" name="dad_no" id="dad_no" aria-describedby="father's number" placeholder="Enter father's number" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email_d">E-mail Address</label>
                                <input type="email" class="form-control " value=" <?php echo $father_mail; ?>" name="email_d" id="email_d" aria-describedby="father's e-mail" placeholder="user@gmail.com">
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mom_name">Mother's Name</label>
                                <input type="text" class="form-control " value=" <?php echo $mother; ?>" name="mom_name" id="mom_name" aria-describedby="mother's name" placeholder="Enter Father's Name">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mom_no">Phone No</label>
                                <input type="text" class="form-control " value=" <?php echo $mother_no; ?>" name="mom_no" id="mom_no" aria-describedby="mother's number" placeholder="Enter mom's number" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email_m">E-mail Address</label>
                                <input type="email" class="form-control " value=" <?php echo $mother_mail; ?>" name="email_m" id="email_m" aria-describedby="mother's e-mail" placeholder="user@gmail.com">
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dadJob">Father's Occupation <span class="required">*</span></label>
                                <input type="text" class="form-control " value=" <?php echo $fatherJob; ?>" name="dadJob" id="dadJob">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="momJob">Mother's Occupation <span class="required">*</span></label>
                                <input type="text" class="form-control " value=" <?php echo $motherJob; ?>" name="momJob" id="momJob">
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