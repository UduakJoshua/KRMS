<?php
require_once 'dbase_conn.php';
include_once 'function.php';

$student_name = $admission_no = $term = $a_session = $student_class = $subject = $T1 = $T2
    = $project = $assignment = $exam =   "";



if (isset($_POST['save_scores'])) {
    // get the total number of student to populate
    $total_t1 = count($_POST['T1']);

    // Looping over all files
    for ($i = 0; $i < $total_t1; $i++) {
        $admission_no = test_input($_POST['admin_no'][$i]);
        $term = test_input($_POST['term']);
        $a_session = test_input($_POST['a_session']);
        $student_class = test_input($_POST['student_class']);
        $student_name = test_input($_POST['student_name'][$i]);
        $T1 = test_input($_POST['T1'][$i]);
        $T2 = test_input($_POST['T2'][$i]);
        $project = test_input($_POST['project'][$i]);
        $assignment = test_input($_POST['assign'][$i]);
        $exam = test_input($_POST['exam'][$i]);
        $subject = test_input($_POST['subject']);

        $sql_sel = "SELECT * FROM students_score WHERE admission_no = ? LIMIT 1";
        $stmt = $conn->prepare($sql_sel);

        $stmt->bind_param('s', $admission_no);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();


        if (!empty($row) && $row['admission_no'] == $admission_no && $row['term'] == $term && $row['session'] == $a_session && $row['subject'] == $subject) {
            $errors = "Result already exist for " . $admission_no . ", please check your parameters and try again!  ";
            echo "<div class= 'alert-warning' id='error'>";
            echo $errors;
            echo "</div> ";
        } else {
            $sql = "INSERT INTO students_score (id, student_name, admission_no, student_class, subject, T1, T2, 
            project, assignment, exam, session, term) 
            VALUES 
            ('','$student_name' ,'$admission_no' , '$student_class' ,'$subject' , $T1 ,$T2
    , '$project' , '$assignment' , '$exam ', '$a_session' , '$term')";

            if ($conn->query($sql) === TRUE) {
                $errors = " Scores for " . $student_name . " with " . $admission_no . " succesfully uploaded!";
                echo "<div class= 'alert-success' id='error'>";
                echo $errors;
                echo "</div> ";
            }
        }
    }

    // echo $term . ' ' . $subject . ' ' . $T1 . ' ' . $T2 . ' ' . $admission_no . '' . $student_class . ' ' . $student_name . '<br>';
}

// midterm scores upload


if (isset($_POST['save_mid'])) {
    // get the total number of student to populate
    $total_t2 = count($_POST['T2']);

    // Looping over all files
    for ($i = 0; $i < $total_t2; $i++) {
        $admission_no = test_input($_POST['admin_no'][$i]);
        $term = test_input($_POST['term']);
        $a_session = test_input($_POST['a_session']);
        $student_class = test_input($_POST['student_class']);
        $student_name = test_input($_POST['student_name'][$i]);
        $T2 = test_input($_POST['T2'][$i]);
        $subject = test_input($_POST['subject']);

        $sql = "SELECT * FROM mid_term_scores WHERE admission_no = ? LIMIT 1";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('s', $admission_no);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();


        if (!empty($row) && $row['admission_no'] == $admission_no && $row['term'] == $term && $row['session'] == $a_session && $row['subject'] == $subject) {
            $errors = "Result already exist for " . $student_name . " with" . $admission_no . ", please check your parameters and try again!  ";
            echo "<div class= 'alert-warning' id='error'>";
            echo $errors;
            echo "</div> ";
        } else {
            $sql = "INSERT INTO mid_term_scores 
            (id, student_name, admission_no, student_class, subject,  T2, session, term) 
            VALUES 
            ('','$student_name' ,'$admission_no' , '$student_class' ,'$subject' ,$T2, '$a_session' , '$term')";

            if ($conn->query($sql) === TRUE) {
                $errors = "Mid-Term Scores for " . $subject . " for " . $student_name . " with " . $admission_no . " succesfully uploaded!";
                echo "<div class= 'alert-success' id='error'>";
                echo $errors;
                echo "</div> ";
            }
        }
    }

    // echo $term . ' ' . $subject . ' ' . $T1 . ' ' . $T2 . ' ' . $admission_no . '' . $student_class . ' ' . $student_name . '<br>';
}
