<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$section = " ";

$student_name = $admission_no = $term = $a_session = $student_class = $subject = $T1 =  $project = $assignment = $exam = $total_score =  "";

$T2 = 0;

if (isset($_POST['save_exam_scores'])) {
    // get the total number of student to populate
    $total_t1 = count($_POST['T1']);

    // Looping over all files
    for ($i = 0; $i < $total_t1; $i++) {
        $admission_no = test_input($_POST['admin_no'][$i]);
        $term = test_input($_POST['term']);
        $a_session = test_input($_POST['a_session']);
        $student_class = test_input($_POST['student_class']);
        $class_arm = test_input($_POST['class_arm']);
        $student_name = test_input($_POST['student_name'][$i]);
        $T1 = test_input($_POST['T1'][$i]);
        $T2 = test_input($_POST['T2'][$i]);
        $project = test_input($_POST['project'][$i]);
        $assignment = test_input($_POST['assign'][$i]);
        $exam = test_input($_POST['exam'][$i]);
        //$total_score = test_input($_POST['total'][$i]);
        $subject = test_input($_POST['subject']);
        $total = (int)($T1 + $T2 + $project + $assignment + $exam);

        $sql = "SELECT * FROM students_score WHERE admission_no = ?  && subject = ? && term = ? && session = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('ssss', $admission_no, $subject, $term, $a_session);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();


        if (!empty($row) && $row['admission_no'] === $admission_no) {
            $errors = "Scores for " . $subject . " already exist for " . $admission_no . ", please check your parameters and try again!  ";
            echo "<div class= 'alert-warning' id='error'>";
            echo $errors;
            echo "</div> ";
        } else {
            $sql = "INSERT INTO students_score (id, student_name, admission_no, student_class, class_arm, subject, T1, T2, 
            project, assignment, exam , total, session, term) 
            VALUES 
            ('','$student_name' ,'$admission_no' , '$student_class' , '$class_arm' ,'$subject' , $T1 ,$T2
    , '$project' , '$assignment' , '$exam ', '$total','$a_session' , '$term')";

            if ($conn->query($sql) === TRUE) {


                $errors = " Scores for " . $student_name . " with " . $admission_no . " succesfully compiled!";
                echo "<div class= 'alert-success' id='error'>";
                echo $errors;
                echo "</div> ";
                exit();
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
        // $class_arm = test_input($_POST['class_arm']);
        $student_name = test_input($_POST['student_name'][$i]);
        $T2 = test_input($_POST['T2'][$i]);
        $subject = test_input($_POST['subject']);

        $sql = "SELECT * FROM mid_term_scores WHERE admission_no = ?  && subject = ? && term = ? && session = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('ssss', $admission_no, $subject, $term, $a_session);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();


        if (!empty($row) && $row['admission_no'] === $admission_no) {


            $errors = "Scores already exist for " . $subject . " for " . $student_name . "  for " . $term . " - " . $a_session . ", please check your parameters and try again! ";
            //$errors = "Score exist" . $student_name . " with" . $admission_no . ", please check your parameters and try again! ";
            echo "<div class='alert-warning' id='error'>";
            echo $errors;
            echo "</div> ";
        } else {
            $sql = "INSERT INTO mid_term_scores
    (id, student_name, admission_no, student_class, class_arm, subject, T2, session, term)
    VALUES
    ('','$student_name' ,'$admission_no' , '$student_class', , '$subject' ,$T2, '$a_session' , '$term')";

            if ($conn->query($sql) === TRUE) {


                $sql = "INSERT INTO mid_term_scores (sp)
SELECT T2 As sp FROM mid_term_scores WHERE subject = $subject && student_class = $student_class ORDER BY sp DESC ;";
                if ($conn->query($sql) === TRUE) {

                    $errors = "Mid-Term Scores for " . $subject . " for " . $student_name . " with " . $admission_no . " for " . $term . " - " . $a_session . " succesfully uploaded!";
                    echo "<div class='alert-success' id='error'>";
                    echo $errors;
                    echo "</div> ";
                }
            }
        }
    }
    exit();
    // echo $term . ' ' . $subject . ' ' . $T1 . ' ' . $T2 . ' ' . $admission_no . '' . $student_class . ' ' . $student_name . '<br>';
}

// JSS3 and SS3 Mock logic

if (isset($_POST['save_mock'])) {
    // get the total number of student to populate
    $total_score = count($_POST['score']);

    // Looping over all files
    for ($i = 0; $i < $total_score; $i++) {
        $admission_no = test_input($_POST['admin_no'][$i]);
        $term = test_input($_POST['term']);
        $a_session = test_input($_POST['a_session']);
        $student_class = test_input($_POST['student_class']);
        $student_name = test_input($_POST['student_name'][$i]);
        $score = test_input($_POST['score'][$i]);
        $subject = test_input($_POST['subject']);
        $mock_no = test_input($_POST['mock_no']);

        $sql = "SELECT * FROM mock_scores WHERE admission_no = ?  && subject_title = ? && term = ? && session = ? && mock_no = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param('sssss', $admission_no, $subject, $term, $a_session, $mock_no);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();


        if (!empty($row) && $row['admission_no'] === $admission_no) {

            $errors = "Scores already exist for " . $subject . " for " . $student_name . "  for " . $term . " - " . $a_session . ", please check your parameters and try again! ";
            //$errors = "Score exist" . $student_name . " with" . $admission_no . ", please check your parameters and try again! ";
            echo "<div class='alert-warning' id='error'>";
            echo $errors;
            echo "</div> ";
        } else {
            $sql = "INSERT INTO mock_scores
    (id, admission_no, student_name,  student_class, subject_title, score, session, term, mock_no)
    VALUES
    ('','$admission_no','$student_name' , '$student_class' ,'$subject' ,$score, '$a_session' , '$term', '$mock_no')";

            if ($conn->query($sql) === TRUE) {
                $errors = "Mock Scores for " . $subject . " for " . $student_name . " with " . $admission_no . " for " . $term . " - " . $mock_no . " succesfully uploaded!";
                echo "<div class='alert-success' id='error'>";
                echo $errors;
                echo "</div> ";
            }
        }
    }
    exit();
    // echo $term . ' ' . $subject . ' ' . $T1 . ' ' . $T2 . ' ' . $admission_no . '' . $student_class . ' ' . $student_name . '<br>';
}

// logic to edit mid term scoress
if (isset($_GET['edit_score'])) {
    $id = $_GET['edit_score'];
    $update = true;
    $sql = "SELECT * FROM mid_term_scores WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        //output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $subject = $row['subject'];
            $class = $row['student_class'];
            $T2 = $row['T2'];
            $admission_no = $row['admission_no'];
            $name = $row['student_name'];
            $a_session = $row['session'];
            $term = $row['term'];
        }
    } else {
        $_SESSION['message'] = "No Result found for the Selected Subject! Kindly Input scores";
        $_SESSION['msg_type'] = "danger";
        header("location:scores_edit.php?no-scores");
        exit();
    }


    mysqli_close($conn);
}


// update logic
if (isset($_POST['update_midterm'])) {

    $id = $_POST['id'];
    $T2 = $_POST['T2'];


    $sql = "UPDATE mid_term_scores SET T2 = '$T2' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Mid-Term Score Updated Successfully!";
        $_SESSION['msg_type'] = "success";
        header("location:scores_display.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    $conn->close();
}



// delete button logic

if (isset($_POST['delete_score'])) {
    if ((isset($_POST['chk']))) {
        foreach ($_POST['chk'] as $check) {
            // $id = $_POST['delete_score'];

            $sql = "DELETE FROM mid_term_scores WHERE id=$check";

            if ($conn->query($sql) === TRUE) {

                $errors = "Account Activated Successfully!";
                echo "<div class= 'alert-danger mt-1' id='error'>";
                echo $errors;
                echo "</div> ";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }
    }
}

// logic to view scores

if (isset($_POST['scores_view'])) {
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
    header("location:scores_view.php");
    exit();
}


// logic to edit mid term scoress
if (isset($_GET['edit_ex_score'])) {
    $id = $_GET['edit_ex_score'];
    $update = true;
    $sql = "SELECT * FROM students_score WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        //output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $subject = $row['subject'];
            $class = $row['student_class'];
            $class_arm = $row['class_arm'];
            $T1 = $row['T1'];
            $T2 = $row['T2'];
            $exam = $row['exam'];
            $project = $row['project'];
            $assignment = $row['assignment'];
            $admission_no = $row['admission_no'];
            $student_name = $row['student_name'];
            $a_session = $row['session'];
            $term = $row['term'];
        }
    } else {
        $_SESSION['message'] = "No Result found for the Selected Subject! Kindly Input scores";
        $_SESSION['msg_type'] = "danger";
        header("location:scores_edit.php?no-scores");
        exit();
    }

    mysqli_close($conn);
}


// update logic
if (isset($_POST['update_ex_scores'])) {

    $id = $_POST['id'];
    $student_name = $_POST['student_name'];
    $T1 = $_POST['T1'];
    $T2 = $_POST['T2'];
    $project = $_POST['project'];
    $assignment = $_POST['assignment'];
    $exam = $_POST['exam'];
    $total = (int)($T1 + $T2 + $project + $assignment + $exam);


    $sql = "UPDATE students_score SET T1 = '$T1', T2 = '$T2', T2 = '$T2', project = '$project', assignment = '$assignment', exam = '$exam', total = '$total' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = " Scores for $student_name Updated Successfully!";
        $_SESSION['msg_type'] = "success";
        header("location:scores_view.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    $conn->close();
}



// delete button logic

if (isset($_POST['delete_ex_score'])) {
    if ((isset($_POST['chk']))) {
        foreach ($_POST['chk'] as $check) {
            // $id = $_POST['delete_score'];

            $sql = "DELETE FROM students_score WHERE id=$check";

            if ($conn->query($sql) === TRUE) {

                $errors = "Scores for selected student deleted!";
                echo "<div class= 'alert-danger mt-1' id='error'>";
                echo $errors;
                echo "</div> ";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }
    }
}