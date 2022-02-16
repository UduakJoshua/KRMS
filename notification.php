<?php
require_once "./controller/notification_logic.php";
$title = "BCA | Notification";
include_once './model/inc/dashboard_header.php';




?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Notification</h1>
        <div class=" mb-2 mb-md-0">
            <div class="mr-2">

                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </div>


    <section class="container-fluid">
        <div class="bg-info p-2 text-white">
            <h5><strong>Attention!</strong></h5>
            <ul>
                <li>Select the Class and Term to push Notification</li>
                <li>Type in the Notification </li>
                <li>Type in the subject of Notification/li>
                <li>Click the Push Notification Button</li>
            </ul>
        </div>
        <hr>
        <?php

        if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                <?php echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>

        <div class="row justify-content-center">

            <div class="col-md-9">
                <form action="notification.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" class="form-control " name="id" value="<?php echo $id ?>">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student_class">Class</label>
                                <?php
                                require_once './controller/class_logic.php';
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

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="term">Term:</label>
                                <select name="term" id="term" class="form-control " value>
                                    <option value="1st Term">1<sup>st</sup> Term </option>
                                    <option value="2nd Term">2<sup>nd</sup> Term </option>
                                    <option value="3rd Term">3<sup>rd</sup> Term </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="a_session">Session</label>
                                <select name="a_session" id="a_session" class="form-control ">
                                    <option value="2021/2022"> 2021/2022 </option>
                                    <option value="2022/2023"> 2022/2023</option>
                                    <option value="2023/2024"> 2023/2024</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control " name="date">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label for="notification_msg">Type your Message Here</label>
                            <div class="form-group">

                                <textarea class="form-control " name="notification_msg" value="" rows="8" placeholder="Message goes here..."></textarea>

                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <?php if ($update == true) :
                                ?>
                                    <button type="submit" class="btn btn-primary " name="update_notify">Update</button>
                                <?php else : ?>

                                    <button type="submit" class="btn btn-primary " name="notification">Push Notification</button>
                                <?php endif; ?>


                            </div>
                        </div>


                    </div>

                </form>
            </div>
        </div>
    </section>
    <hr>

    <?php

    include_once './model/inc/dashboard_footer.php';

    ?>