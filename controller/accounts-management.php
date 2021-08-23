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

                //$errors['suspend'] = "Account Suspended Successfully!";
                $errors = "Account Activated Successfully!";
                echo "<div class= 'alert-success' id='error'>";
                echo $errors;
                echo "</div> ";
                //header("location:./accounts.php");
                //exit();
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
            //$errors['suspend'] = "Account Suspended Successfully!";
            $errors = "Account Suspended Successfully!";
            echo "<div class= 'alert-danger' id='error'>";
            echo $errors;
            echo "</div> ";
            // header("location:./accounts.php");
            // exit();
        }
    }
}


/*if (isset($_GET['search'])) {
    $search = $_GET['search'];
    header("location:./accounts.php");
    exit();
}*/
