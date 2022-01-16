<?php

require_once './controller/bill_upload_logic.php';
$title = "BCA | Bill Students";
include_once './model/inc/dashboard_header.php';
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Create Fees Template</h1>

        <div class="mr-2">
            <p><?php echo $_SESSION['username']; ?></p>
        </div>


    </div>


    <section>
        <?php

        if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                <?php echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-9">
                <form action="fees_template.php" method="POST">
                    <input type="hidden" class="form-control " name="id" value="<?php echo $id ?>">

                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <?php

                                $select_sql = "SELECT * FROM classes ORDER BY className ASC ";
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

                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="fees_type" id="fees_type" class="form-control ">
                                    <option value="New-Intake"> New Intake</option>
                                    <option value="Old"> Old Student</option>
                                    <option value="Boarding"> Boarding</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control " name="fees_amount" placeholder="0">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="term" id="term" class="form-control ">
                                    <option value="1st term">1st Term</option>
                                    <option value="2nd term"> 2nd Term</option>
                                    <option value="3rd term"> 3rd Term</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group ">
                                <?php if ($update == true) :
                                ?>
                                    <button type="submit" class="btn btn-primary " name="updateFees">Update Fees</button>
                                <?php else : ?>

                                    <button type="submit" class="btn btn-primary " name="addTemplate">Create Fees Template</button>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-3">
                                <a href="fees_management.php"><button type="button" style="width:30%;" class="btn btn-warning">Back </button></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

    </section>


    <hr>


    <?php include_once './model/inc/dashboard_footer.php'; ?>