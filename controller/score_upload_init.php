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

    header("location:batch_score_input.php");
    exit();
}

//teacher scores initialization

if (isset($_POST['teacher_ex_init'])) {

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

    header("location:teacher_ex_score_input.php");
    exit();
}

if (isset($_POST['teacher_ex_init_nur'])) {

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

    header("location:teacher_score_input_nur.php");
    exit();
}

if (isset($_POST['teacher_ex_init_pry'])) {

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

    header("location:teacher_score_input_pry.php");
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

    header("location:mid_term_score.php");
    exit();
}

if (isset($_POST['staff_mid_initialize'])) {

    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);
    $subject = test_input($_POST['subject']);
    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);

    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;
    $_SESSION['subject'] = $subject;
    $_SESSION['aSession'] = $academic_session;
    header("location:staff_mid_term_score.php");
    exit();
}


if (isset($_POST['mock_init'])) {

    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);
    $subject = test_input($_POST['subject']);
    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);
    $mock_no =  test_input($_POST['mock_no']);
    // create a select query
    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;
    $_SESSION['subject'] = $subject;
    $_SESSION['aSession'] = $academic_session;
    $_SESSION['mock_no'] = $mock_no;

    header("location:mock_input_teacher.php");
    exit();
}


if (isset($_POST['mock_init_admin'])) {

    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);
    $subject = test_input($_POST['subject']);
    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);
    $mock_no =  test_input($_POST['mock_no']);
    // create a select query
    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;
    $_SESSION['subject'] = $subject;
    $_SESSION['aSession'] = $academic_session;
    $_SESSION['mock_no'] = $mock_no;

    header("location:mock_admin_input.php");
    exit();
}

if (isset($_POST['psycho_init'])) {

    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);

    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);

    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;

    $_SESSION['aSession'] = $academic_session;

    header("location:students_psychomotor.php");
    exit();
}

if (isset($_POST['teacher_psycho_init'])) {

    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);

    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);

    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;

    $_SESSION['aSession'] = $academic_session;

    header("location:teacher_psychomotor.php");
    exit();
}
