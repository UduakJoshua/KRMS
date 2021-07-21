<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$errors = array();
$adminNo = "";
$search = "";

// search button logic


// student/parent login

if (isset($_POST['activate'])) {
    if ((isset($_POST['chk']))) {
        foreach ($_POST['chk'] as $check) {
            $sql = "UPDATE student SET stat='1' WHERE id=$check";
            if (mysqli_query($conn, $sql)) {

                $_SESSION['update'] = "Account Activated Successfully!";
                $_SESSION['msg_type'] = "success";
                header("location:./accounts.php");
            } else {
                $errors = "Please select at least one student to activate!";
                header("location:./accounts.php?please-select");
            }
        }
    }
}
// suspending students account
if (isset($_POST['suspend'])) {
    foreach ($_POST['chk'] as $check) {
        $sql = "UPDATE student SET stat='0' WHERE id=$check";
        if (mysqli_query($conn, $sql)) {

            $_SESSION['update'] = "Account Suspended Successfully!";
            $_SESSION['msg_type'] = "danger";
            header("location:./accounts.php");
        }
    }
}


if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    //header("location:accounts.php");
}
