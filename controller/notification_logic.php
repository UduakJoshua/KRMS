<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$update = false;
$student_class = "";
$notification = "";
$term = "";
$a_session = "";


if (isset($_POST['notification'])) {
    $student_class = test_input($_POST['student_class']);
    $notification = test_input($_POST['notification_msg']);
    $term = test_input($_POST['term']);
    $a_session =   test_input($_POST['a_session']);
    $date = test_input($_POST['date']);


    $sql = "INSERT INTO notification_msg (student_class, notification_msg, date_msg, term, a_session) 
    VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss',  $student_class, $notification, $date, $term, $a_session);

    if ($stmt->execute()) {
        $_SESSION['message'] = "You have succesfully added  a notification!";
        $_SESSION['msg_type'] = "success";
        header('Location:notification.php');
    } else {
        $errors['insert'] = "Something went wrong inserting your data!";
    }

    $stmt->close();
}
