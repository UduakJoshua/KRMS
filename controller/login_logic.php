<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$errors = array();
$username = "";


if (isset($_POST['login'])) {
    // grab user data from the form
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    // validate the submitted data
    if (empty($username)) {
        $errors['username'] = "Please enter your username!";
    }

    if (empty($password)) {
        $errors['password'] = "Please enter your password!";
    }

    if (count($errors) === 0) {
        //query the database

        $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        //validate the password

        if (!empty($user) && password_verify($password, $user['password'])) {

            //login user
            $_SESSION['ad-user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['verified'] = $user['verify'];

             //query the database
$term = "3rd Term";
$a_session = "2021/2022";
             $sql = "SELECT 
             sum(total_fees + discount)as  total_bill,
             sum(amount_paid)as  total_paid, 
             sum(balance) as total_balance, term, a_session 
              FROM fees_total WHERE term = ?  && a_session = ? ";
     
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $term, $a_session);
        $stmt->execute();

        $result = $stmt->get_result();
        $report = $result->fetch_assoc();
        $_SESSION[''] = $report['total_bill'];

            header('Location:dashboard.php?login-succesful ');
            exit();
        } else {
            $_SESSION['fees'] = "Access Denied: Your Username or Password is Incorrect! ";
            $_SESSION['msg_type'] = "danger";
            header('Location:portal_login.php?wrong-credentials');
            exit();
        }
    }
}


// logout logic
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['ad-user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['verified']);
    header('Location:index.php');
    exit();
}
