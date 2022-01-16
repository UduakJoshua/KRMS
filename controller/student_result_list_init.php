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



if (isset($_POST['mock_disp_initialize'])) {


    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);
    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);
    $mock_no = test_input($_POST['mock_no']);

    // create a select query
    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;
    $_SESSION['aSession'] = $academic_session;
    $_SESSION['mock_no'] = $mock_no;

    header("location:mock_admin_init_dis.php");
    exit();
}

// initialize student list to generate bill

if (isset($_POST['fees_schedule'])) {

    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);
    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);

    // create a select query
    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;
    $_SESSION['aSession'] = $academic_session;

    header("location:fees_billing.php");
    exit();
}




if (isset($_POST['initializeR'])) {

    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);
    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);
    // create a select query
    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;
    $_SESSION['aSession'] = $academic_session;

    header("location:result_display_table.php");
    exit();
}

if (isset($_POST['init_spreadsheet'])) {

    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);
    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);
    // create a select query
    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;
    $_SESSION['aSession'] = $academic_session;

    header("location:re_spreadsheet_basic.php");
    exit();
}
