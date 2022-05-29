<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$errors = array();
$adminNo = "";

// student/parent login

if (isset($_POST['st_login'])) {

    // grab user data from the form
    $adminNo = $_POST['adminNo'];
    $st_password = test_input($_POST['st_password']);



    // validate the submitted data
    if (empty($adminNo)) {
        $errors['adminNo'] = "Please enter your Admission number!";
    }

    if (empty($st_password)) {
        $errors['password'] = "Please enter your password!";
    }

    if (count($errors) === 0) {
        //query the database

        $sql = "SELECT * FROM student WHERE admissionNo = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $adminNo);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();


        //validate the password

        if (!empty($user) && password_verify($st_password, $user['st_password'])) {
            if ($user['stat'] === 0) {
                $_SESSION['fees'] = "Account Suspended For fees Indebtedness! Call or Visit the Admin. ";
                $_SESSION['msg_type'] = "danger";
                header('Location:student_login.php?Owing-Fees');
            } else {
                //login user
                $_SESSION['st-user_id'] = $user['id'];
                $_SESSION['st-username'] = $user['surname'] . " " . $user['firstname'];
                $_SESSION['admin_no'] = $user['admissionNo'];
                $_SESSION['student_class'] = $user['class_name'];
                $_SESSION['class_arm'] = $user['classArm'];
                $_SESSION['section'] = $user['section'];
                $_SESSION['approval'] = $user['approval'];

                header('Location:student_dashboard.php?success');
            }
        } else {

            header('Location:student_login.php?accessdenied');
            exit();
        }
        exit();
    }


    // logout logic
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['st-user_id']);
        unset($_SESSION['st-username']);
        unset($_SESSION['admin_no']);

        header('Location:index.php');
        exit();
    }
}
