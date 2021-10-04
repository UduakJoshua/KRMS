<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$errors = array();
$adminNo = "";

if (isset($_POST['promote'])) {
    if ((isset($_POST['chk']))) {
        foreach ($_POST['chk'] as $check) {
            $class_name = $_POST['student_class'];
            $class_arm = $_POST['arm'];
            $sql = "UPDATE student SET class_name = '$class_name', classArm = '$class_arm' WHERE id=$check";
            if (mysqli_query($conn, $sql)) {

                $errors = "Student Promoted Successfully!";
                echo "<div class= 'alert-success' id='error'>";
                echo $errors;
                echo "</div> ";
            } else {
                $errors = "Student was not Promoted Successfully!";
                echo "<div class= 'alert-danger' id='error'>";
                echo $errors;
                echo "</div> ";
            }
        }
    }
}
