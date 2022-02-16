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
if (isset($_POST['postEx'])) {


    $item = test_input($_POST['expenditure_item']);
    $amount_spent = (int)(test_input($_POST['amount_spent']));
    $date_ex = test_input($_POST['date_ex']);
    $month_ex = test_input($_POST['month_ex']);
    $remark = test_input($_POST['remark']);
    $term = test_input($_POST['term']);
    $a_session = test_input($_POST['aSession']);

    echo $amount_spent;



    // run an insert query to store the data in a table
    $sql = "INSERT INTO expenditures( expenditure_item, amount_spent, expenditure_date, expenditure_month, 
        remark,  term, academic_session)
            VALUES (?,?,?,?,?,?,?) ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        'sisssss',
        $item,
        $amount_spent,
        $date_ex,
        $month_ex,
        $remark,
        $term,
        $a_session
    );

    if ($stmt->execute()) {
        //$billed = true;
        $_SESSION['message'] = "Expenditure successfully saved!";
        $_SESSION['msg_type'] = "success";
        header('Location:expenditures.php');
    } else {
        $_SESSION['message'] = "Failed to capture selected expenditure!";
        $_SESSION['msg_type'] = "danger";
        header('Location:expenditures.php');
    }

    $stmt->close();
    exit();
}
