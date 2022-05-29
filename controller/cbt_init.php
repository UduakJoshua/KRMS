<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$subject = "";



if (isset($_POST['cbt_int'])) {

    $subject = test_input($_POST['subject']);
    $number =  1;
   // $term =  test_input($_POST['term']);
   // $academic_session = test_input($_POST['aSession']);

    // create a select query
    $_SESSION['subject'] = $subject;
    $_SESSION['number'] = $number;
    

    header("location:cbt_quest.php");
    exit();
}
