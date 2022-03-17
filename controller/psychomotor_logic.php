<?php
require_once 'dbase_conn.php';
include_once 'function.php';

$punctuality = $mental_alertness = $attentiveness = $respect = $neatness = $politeness =
    $honesty = $relationship = $attitude = $team_work = $complete_work = $reading =
    $diction = $handwriting = $musical = $art = $phe = $reasoning =  $admission_no =
    $term =  $a_session =  $student_class =  $class_arm = $student_name =  " ";




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
    $politeness = $_POST['politeness'];
    $honesty = $_POST['honesty'];
    $relationship = $_POST['relationship'];
    $attitude = $_POST['attitude'];
    $team_work = $_POST['team_work'];
    $complete_work = $_POST['school_work'];
    $reading = $_POST['reading'];
    $diction = $_POST['diction'];
    $handwriting = $_POST['handwriting'];
    $musical = $_POST['music'];
    $art = $_POST['art'];
    $phe = $_POST['phe'];
    $reasoning = $_POST['reasoning'];
    // check if psychomotor exist
    $sql = "SELECT * FROM psychomotor WHERE admission_no = ? && term = ? && a_session = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $admission_no,  $term, $a_session);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();


    if (!empty($row) && $row['admission_no'] === $admission_no) {

        $_SESSION['message'] = "Student Psychomotor Rating already exist for $student_name";
        $_SESSION['msg_type'] = "danger";
        header("location:students_psychomotor.php");
        exit();
    } else {
        $sql = "INSERT INTO psychomotor
                        (id, admission_no, student_name, student_class, class_arm, punctuality,  
                        alertness, attentiveness, respect, neatness, politeness, honesty, 
                        relationship, attitude, team_work, school_work, reading, handwriting, music,
                        diction, art, phe, reasoning, a_session, term, status)
                            VALUES ('', '$admission_no', '$student_name', '$student_class', 
                            '$class_arm', '$punctuality', '$mental_alertness', '$attentiveness',
                            '$respect', '$neatness', '$politeness', '$honesty', '$relationship',
                             '$attitude', '$team_work', '$complete_work', '$reading', '$handwriting',
                              '$musical', '$diction', '$art','$phe', '$reasoning', '$a_session', '$term',
                              1)";

        if ($conn->query($sql) === TRUE) {
            $sql = "UPDATE student SET  approval = '2' WHERE admissionNo = '$admission_no'";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['message'] = "Student Psychomotor Rating Successfully Posted!";
                $_SESSION['msg_type'] = "success";
                header("location:students_psychomotor.php");
                exit();
            } else {
                $_SESSION['message'] = "$conn->error";
                $_SESSION['msg_type'] = "danger";
                header("location:students_psychomotor.php");
                exit();
            }
        }
    }
}

// psychomotor from teachers input

if (isset($_POST['teacher_psychomotor'])) {
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
    $politeness = $_POST['politeness'];
    $honesty = $_POST['honesty'];
    $relationship = $_POST['relationship'];
    $attitude = $_POST['attitude'];
    $team_work = $_POST['team_work'];
    $complete_work = $_POST['school_work'];
    $reading = $_POST['reading'];
    $diction = $_POST['diction'];
    $handwriting = $_POST['handwriting'];
    $musical = $_POST['music'];
    $art = $_POST['art'];
    $phe = $_POST['phe'];
    $reasoning = $_POST['reasoning'];
    // check if psychomotor exist
    $sql = "SELECT * FROM psychomotor WHERE admission_no = ? && term = ? && a_session = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $admission_no,  $term, $a_session);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();


    if (!empty($row) && $row['admission_no'] === $admission_no) {

        $_SESSION['message'] = "Student Psychomotor Rating already exist for $student_name";
        $_SESSION['msg_type'] = "danger";
        header("location:teacher_psychomotor.php");
        exit();
    } else {
        $sql = "INSERT INTO psychomotor
                        (id, admission_no, student_name, student_class, class_arm, punctuality,  
                        alertness, attentiveness, respect, neatness, politeness, honesty, 
                        relationship, attitude, team_work, school_work, reading, handwriting, music,
                        diction, art, phe, reasoning, a_session, term, status)
                            VALUES ('', '$admission_no', '$student_name', '$student_class', 
                            '$class_arm', '$punctuality', '$mental_alertness', '$attentiveness',
                            '$respect', '$neatness', '$politeness', '$honesty', '$relationship',
                             '$attitude', '$team_work', '$complete_work', '$reading', '$handwriting',
                              '$musical', '$diction', '$art','$phe', '$reasoning', '$a_session', '$term',
                              1)";

        if ($conn->query($sql) === TRUE) {
            $sql = "UPDATE student SET  approval = '2' WHERE admissionNo = '$admission_no'";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['message'] = "Student Psychomotor Rating Successfully Posted!";
                $_SESSION['msg_type'] = "success";
                header("location:teacher_psychomotor.php");
                exit();
            } else {
                $_SESSION['message'] = "$conn->error";
                $_SESSION['msg_type'] = "danger";
                header("location:teacher_psychomotor.php");
                exit();
            }
        }
    }
}
