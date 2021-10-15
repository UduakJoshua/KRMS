<?php
require "./controller/staff_logic.php";
$title = "BCA | Staff Management";
include_once './model/inc/dashboard_header.php';
?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Register Staff</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section>
        <?php

        if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?> red-icon-message">
                <span class="fa fa-exclamation-triangle red-icon"></span>
                <?php echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <form action="staff_registeration.php" method="POST" enctype="multipart/form-data">
                    <h5>Staff's Biodata</h5>
                    <hr>
                    <input type="hidden" class="form-control " name="id" value="<?php echo $id ?>">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">

                                <label for="image">Staff's Image</label>
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
                                <input type="text" class="form-control " value="<?php echo $surname; ?>" required name="surname" id="surname" aria-describedby="surname" placeholder="Enter Surname">
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
                                <label for="marital_status">Marital Status</label>

                                <select name="marital_status" id="marital_status" class="form-control ">
                                    <option value="Married">Married</option>
                                    <option value="Single">Single</option>
                                    <option value="Divorced">Divorced</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <!--Admission info begins-->
                    <h5>Employment Information</h5>
                    <hr>
                    <div class="row">

                        <div class="col-md-4">
                            <label for="staff_id">Staff Id<span class="required">*</span></label>
                            <input type="text" class="form-control " required name="staff_id" id="staff_id" aria-describedby="Staff ID" placeholder="Enter Staff ID">

                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="religion">Religion <span class="required">*</span></label>
                                <input type="text" class="form-control " name="religion" id="religion" placeholder="Enter Religion" required>
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


                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="employ_year">Employment Year <span class="required">*</span></label>
                                <input type="text" class="form-control " name="employ_year" id="employ_year" aria-describedby="Year Employed" placeholder="Enter Admission number">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="role">Designation <span class="required">*</span></label>
                            <input type="text" class="form-control " required name="role" id="role" aria-describedby="Staff Role" placeholder="Enter Designation">

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password">Password <span class="required">*</span></label>
                                <input type="password" class="form-control " name="password" id="password" aria-describedby="user password" required placeholder="Enter Password">
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

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone">Phone No </span></label>
                                <input type="text" class="form-control " name="phone" id="phone" aria-describedby="Staff number" placeholder="Enter Phone Number">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">E-mail Address</label>
                                <input type="email" class="form-control " name="email" id="email" aria-describedby="Staff e-mail" placeholder="bcastaff@gmail.com">
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