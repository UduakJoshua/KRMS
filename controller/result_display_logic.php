<?php
if (isset($_GET['display_result'])) {
    $admission_no = $_GET['admissio'];
    $name = $_GET['student_name'];
    echo $admission_no;
    echo $name;
    //header('location: result_display.php');
    //exit();
}

if (isset($_GET['display_MT'])) {
    $admission_no = $_GET['admissio'];
    $name = $_GET['student_name'];
    echo $admission_no;
    echo $name;
    //header('location: result_display.php');
    //exit();
}
