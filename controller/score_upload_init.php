<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$class = "";
$arm =  "";
//$subject = "";
$term =  "";
$academic_session = "";



if (isset($_POST['initialize'])) {

    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);
    $subject = test_input($_POST['subject']);
    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);
    // create a select query
    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;
    $_SESSION['subject'] = $subject;
    $_SESSION['aSession'] = $academic_session;

    echo $_SESSION['arm'];

    header("location:batch_result_input.php");
    exit();
}

if (isset($_POST['mid_initialize'])) {

    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);
    $subject = test_input($_POST['subject']);
    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);
    // create a select query
    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;
    $_SESSION['subject'] = $subject;
    $_SESSION['aSession'] = $academic_session;

    echo $_SESSION['arm'];

    header("location:mid_term_score.php");
    exit();
}
