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
    //$subject = test_input($_POST['subject_r']);
    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);
    // create a select query
    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;
    $_SESSION['aSession'] = $academic_session;

    header("location:multipleUpload.php");
    exit();
}
