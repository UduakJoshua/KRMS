<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$errors = array();
$staff_id = "";

// student/parent login

if (isset($_POST['login'])) {

    // grab user data from the form
    $staff_id = $_POST['staff_id'];
    $password = test_input($_POST['password']);



    // validate the submitted data
    if (empty($staff_id)) {
        $errors['staff_id'] = "Please enter your ID!";
    }

    if (empty($password)) {
        $errors['password'] = "Please enter your password!";
    }

    if (count($errors) === 0) {
        //query the database

        $sql = "SELECT * FROM staff WHERE staff_id = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $staff_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();


        //validate the password

        if (!empty($user) && password_verify($password, $user['password'])) {
            if ($user['status'] === 0) {
                $_SESSION['fees'] = "Contact The Admin for the activation of your account! ";
                $_SESSION['msg_type'] = "danger";
                header('Location:staff_login.php?account-yet-to-be-activated');
            } else {
                //login user
                $_SESSION['staff-user_id'] = $user['id'];
                $_SESSION['staff-username'] = $user['surname'] . " " . $user['firstname'];
                $_SESSION['staff_id'] = $user['staff_id'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['section'] = $user['section'];
                header('Location:staff_dashboard.php?success');
            }
        } else {
            $_SESSION['fees'] = "Access Denied : You have entered a wrong Staff ID or Password! ";
            $_SESSION['msg_type'] = "danger";
            header('Location:staff_login.php?Access-Denied!');
        }
        exit();
    }


    // logout logic
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['staff-user_id']);
        unset($_SESSION['staff-username']);
        unset($_SESSION['staff_id']);
        unset($_SESSION['role']);
        unset($_SESSION['section']);

        header('Location:index.php');
        exit();
    }
}
