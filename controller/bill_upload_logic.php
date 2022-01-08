<?php
require_once 'dbase_conn.php';
include_once 'function.php';

$school_fees = $discount = $bus = $books = $wears = $arrears =  $total = $amount_paid = $first_deposit
    = $second_deposit = $third_deposit = 0;
$update = false;


if (isset($_POST['addTemplate'])) {
    $term = test_input($_POST['term']);
    $student_class = test_input($_POST['student_class']);
    $fees_type = test_input($_POST['fees_type']);
    $fees_amount = test_input($_POST['fees_amount']);

    $sql = "INSERT INTO fees_schedule( student_class, fees, fees_type, term)
            VALUES (?,?,?,?) ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss',  $student_class, $fees_amount, $fees_type, $term);


    if ($stmt->execute()) {
        $_SESSION['fees'] = $fees_amount;
        $_SESSION['message'] = "You have succesfully created a fees template!";
        $_SESSION['msg_type'] = "success";
        header('Location:fees_template.php');
    } else {
        $_SESSION['message'] = "Failed to create a fees template!";
        $_SESSION['msg_type'] = "danger";
    }

    $stmt->close();
    $conn->close();
}


if (isset($_POST['bill_student'])) {
    // get the total number of student to populate
    $total_fees = count($_POST['discount']);

    // Looping over all files
    for ($i = 0; $i < $total_fees; $i++) {
        $student_name = test_input($_POST['student_name'][$i]);
        $admission_no = test_input($_POST['admin_no'][$i]);
        $school_fees = test_input($_POST['school_fees']);
        $discount = test_input($_POST['discount'][$i]);
        $bus = test_input($_POST['bus'][$i]);
        $books = test_input($_POST['books'][$i]);
        $wears = test_input($_POST['wears'][$i]);
        $arrears = test_input($_POST['arrears'][$i]);
        $term = test_input($_POST['term']);
        $a_session = test_input($_POST['a_session']);
        $student_class = test_input($_POST['student_class']);
        $student_arm = test_input($_POST['student_arm']);
        $total = (int)(($school_fees - $discount) + $bus + $books + $wears + $arrears);
        $balance = (int)($total - 0);
        $amount_paid = 0;

        // run an insert query to store the data in a table
        $sql = "INSERT INTO fees_total( admission_no, student_name, student_class, student_arm, 
        total_fees, amount_paid, balance, term, a_session)
            VALUES (?,?,?,?,?,?,?,?, ?) ";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            'sssssisss',
            $admission_no,
            $student_name,
            $student_class,
            $student_arm,
            $total,
            $amount_paid,
            $balance,
            $term,
            $a_session
        );


        if ($stmt->execute()) {
            //$_SESSION['message'] = "You have succesfully billed the class!";
            //$_SESSION['msg_type'] = "success";
            header('Location:fees_payment_init.php');
        } else {
            $_SESSION['message'] = "Failed to bill students in this class!";
            $_SESSION['msg_type'] = "danger";
            header('Location:fees_payment_init.php');
        }

        $stmt->close();
    }
}

if (isset($_POST['fees_payment_init'])) {

    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);
    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);

    // create a select query
    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;
    $_SESSION['aSession'] = $academic_session;

    header("location:fees_payment.php");
    exit();
}



if (isset($_GET['pay'])) {
    $id = $_GET['pay'];
    $update = true;
    $sql = "SELECT * FROM fees_total WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    //$result = mysqli_query($conn, $sql);

    if ($row = $result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {

            $student_name = $row['student_name'];
            $student_class = $row['student_class'];
            $student_arm = $row['student_arm'];
            $admission_no = $row['admission_no'];
            $total_fees = $row['total_fees'];
            $first_deposit = $row['first_deposit'];
            $second_deposit = $row['second_deposit'];
            $third_deposit = $row['third_deposit'];
            $amount_paid = $row['amount_paid'];
            $balance = $row['balance'];
            $term = $row['term'];
            $academic_session = $row['a_session'];
            $date1 = $row['date_of_pay1'];
            $date2 = $row['date_of_pay2'];
            $date3 = $row['date_of_pay3'];
            $date_issued = $row['date_issued'];
        }
    } else {
        echo "No results found";
    }


    $conn->close();
}

if (isset($_POST['make_pay'])) {
    $id = $_POST['id'];
    $update = true;
    $student_name = test_input($_POST['student_name']);
    $admission_no = test_input($_POST['admission_no']);
    $student_class = test_input($_POST['student_class']);
    $date1 = test_input($_POST['date_paid1']);
    $date2 = test_input($_POST['date_paid2']);
    $date3 = test_input($_POST['date_paid3']);
    $date_issued = test_input($_POST['date_issued']);
    $student_arm =  test_input($_POST['student_arm']);
    $total_fees =  test_input($_POST['total_fees']);
    $first_deposit = test_input($_POST['1st_depo']);
    $second_deposit = test_input($_POST['2nd_depo']);
    $third_deposit = test_input($_POST['3rd_depo']);
    $amount_paid = (int)($first_deposit + $second_deposit + $third_deposit);
    $balance =   (int)($total_fees - $amount_paid);

    $sql = "UPDATE fees_total SET    first_deposit = '$first_deposit',
    second_deposit = '$second_deposit', third_deposit = '$third_deposit', 
    amount_paid = '$amount_paid ', balance = '$balance' , date_of_pay1 = '$date1' , 
    date_of_pay2 = '$date2', date_of_pay3 = '$date3', date_issued = '$date_issued' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {

        $_SESSION['message'] = "Payment for  $student_name  successfully made!";
        $_SESSION['msg_type'] = "success";
        header("location:./fees_payment.php");
        exit();
    } elseif ($conn->error) {
        $_SESSION['message'] = " $conn->error";
        $_SESSION['msg_type'] = "danger";
        header("location:./make_pay.php");
        exit();
    }



    $conn->close();
}



if (isset($_POST['post_pay'])) {

    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);

    // create a select query
    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;

    header("location:./section.php");
    exit();
}
