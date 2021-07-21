<?php
require_once 'dbase_conn.php';
include_once 'function.php';
include_once 'student_logic.php';
$update = false;
$class = "";
$arm =  "";
$subject = "";
$term =  "";
$academic_session = "";
$t1 = "";
$t2 = "";
$exam = "";
$total = "";





if (isset($_POST['init_score'])) {

    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);
    $subject = test_input($_POST['subject_r']);
    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['a_session']);
    // create a select query
    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['subject'] = $subject;


    header("location:../result.php");
}

//score logic

if (isset($_POST['save_score'])) {
    foreach ($_POST['t1'] as $t1) {
        echo $t1 . '<br/>';
    }
}
