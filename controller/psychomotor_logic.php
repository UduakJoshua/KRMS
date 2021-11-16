<?php
require_once 'dbase_conn.php';
include_once 'function.php';

$punctuality = $mental_alertness = $attentiveness = $respect = $neatness = $politeness =
    $honesty = $relationship = $attitude = $team_work = $complete_work = $reading =
    $diction = $handwriting = $musical = $art = $phe = $reasoning =  $admission_no =
    $term =  $a_session =  $student_class =  $class_arm = $student_name = " ";



if (isset($_POST['psychomotor'])) {
    $admission_no = test_input($_POST['admin_no']);
    $term = test_input($_POST['term']);
    $a_session = test_input($_POST['a_session']);
    $student_class = test_input($_POST['student_class']);
    $class_arm = test_input($_POST['class_arm']);
    $student_name = test_input($_POST['student_name']);
    $punctuality = $_POST['punctuality'];
    $mental_alertness = $_POST['alertness'];
    $attentiveness = $_POST['attentiveness'];
    $respect = $_POST['respect'];
    $neatness = $_POST['neatness'];
    $politeness = $_POST['term'];
    $honesty = $_POST['politeness'];
    $relationship = $_POST['relationship'];
    $attitude = $_POST['attitude'];
    $team_work = $_POST['team_work'];
    $complete_work = $_POST['school_work'];
    $reading = $_POST['reading'];
    $diction = $_POST['handwriting'];
    $handwriting = $_POST['music'];
    $musical = $_POST['diction'];
    $art = $_POST['art'];
    $phe = $_POST['phe'];
    $reasoning = $_POST['reasoning'];
    //$teachers_comment = $_POST['term'][$i];
    echo $handwriting . $reading . $reasoning . $term . $admission_no;

    $sql = "INSERT INTO psychomotor
                        (id, admission_no, student_name, student_class, class_arm, punctuality,
                        alertness, attentiveness, respect, neatness, politeness, honesty, relationship, attitude, 
                        team_work, school_work, reading, handwriting, music, diction, art, phe, reasoning, a_session, term) 
                            VALUES 
                            ('', '$admission_no', '$student_name', '$student_class', '$class_arm', '$punctuality',
                            '$mental_alertness', '$attentiveness', '$respect', '$neatness', '$politeness','$honesty' '$relationship',
                             '$attitude', '$team_work', '$complete_work', '$reading', '$handwriting','$musical', '$diction', '$art', 
                             '$phe', '$reasoning', '$a_session', '$term')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Student Psychomotor Rating Successfully Posted!";
        $_SESSION['msg_type'] = "success";
        header("location:students_psychomotor.php");
        exit();
    } else {
        $_SESSION['message'] = "Assignment Was not Posted!";
        $_SESSION['msg_type'] = "danger";
        header("location:students_psychomotor.php");
        exit();
    }





    // header('Location:students_psychomotor.php ');
    //exit();
}
