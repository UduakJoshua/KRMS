<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$class = "";
$arm =  "";
$term =  "";
$academic_session = "";

if (isset($_POST['initialize'])) {

    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);
    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);

    // create a select query
    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;
    $_SESSION['aSession'] = $academic_session;

    header("location:result_display_init.php");
    exit();
}

if (isset($_POST['mid_initialize'])) {

    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);
    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);

    // create a select query
    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;
    $_SESSION['aSession'] = $academic_session;

    header("location:midterm_display_init.php");
    exit();
}

if (isset($_POST['staff_mid_initialize'])) {

    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);
    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);

    // create a select query
    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;
    $_SESSION['aSession'] = $academic_session;

    header("location:staff_midterm_display_init.php");
    exit();
}


if (isset($_POST['stud_display'])) {

    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);

    // create a select query
    $_SESSION['term'] = $term;
    $_SESSION['aSession'] = $academic_session;

    header("location:student_result_display.php");
    exit();
}
