<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$section = " ";

$student_name = $admission_no = $term = $a_session = $student_class = $class_arm =  $subject = $T1 =  $project = $assignment = $exam = $total_score =  "";

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
            }
        }
    }

    if (isset($_SESSION['staff-username'])) {
        echo "<a href = 'teacher_exam_init.php'><button class= 'btn btn-primary m-3 p-2' >";
        echo "Input Another Score";
        echo "</button></a> ";

        echo "<a href = 'scores_input_view_teacher.php'><button class= 'btn btn-warning m-3 p-2' >";
        echo "View Inputed Scores";
        echo "</button></a> ";
    } else {
        echo "<a href = 'batch_result_input.php'><button class= 'btn btn-primary m-3 p-2' >";
        echo "Input Another Score";
        echo "</button></a> ";

        echo "<a href = 'scores_input_view.php'><button class= 'btn btn-warning m-3 p-2' >";
        echo "View Inputed Scores";
        echo "</button></a> ";
    }
    exit();
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
        $class_arm = test_input($_POST['class_arm']);
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
    (id, student_name, admission_no, student_class, student_arm, subject, T2, session, term)
    VALUES
    ('','$student_name' ,'$admission_no' , '$student_class',  '$class_arm', '$subject' ,$T2, '$a_session' , '$term')";

            if ($conn->query($sql) === TRUE) {


                $errors = "Mid-Term Scores for " . $subject . " for " . $student_name . " with " . $admission_no . " for " . $term . " - " . $a_session . " succesfully uploaded!";
                echo "<div class='alert-success' id='error'>";
                echo $errors;
                echo "</div> ";
            }
        }
    }
    if (!isset($_SESSION['username'])) {
        echo "<a href = 'staff_mid_term_score_init.php'><button class= 'btn btn-primary m-3 p-2' >";
        echo "Input Another Score";
        echo "</button></a> ";
    } else {
        echo "<a href = 'mid_term_score_init.php'><button class= 'btn btn-primary m-3 p-2' >";
        echo "Input Another Score";
        echo "</button></a> ";
    }
    exit();
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
        $class_arm = test_input($_POST['arm']);
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
    (id, admission_no, student_name,  student_class, class_arm, subject_title, score, session, term, mock_no)
    VALUES
    ('','$admission_no','$student_name' , '$student_class' , '$class_arm', '$subject' ,$score, '$a_session' , '$term', '$mock_no')";

            if ($conn->query($sql) === TRUE) {
                $errors = "Mock Scores for " . $subject . " for " . $student_name . " with " . $admission_no . " for " . $term . " - " . $mock_no . " succesfully uploaded!";
                echo "<div class='alert-success' id='error'>";
                echo $errors;
                echo "</div> ";
            }
        }
    }
    echo "<a href = 'mock_init_teacher.php'><button class= 'btn btn-primary m-3 p-2' >";
    echo "Input Another Mock Score";
    echo "</button></a> ";

    echo "<a href = 'mock_view_teacher.php'><button class= 'btn btn-warning m-3 p-2' >";
    echo "View Mock Scores";
    echo "</button></a> ";
    exit();
}

// logic to edit mid term scoress
if (isset($_GET['edit_mt_score'])) {
    $id = $_GET['edit_mt_score'];
    $update = true;
    $sql = "SELECT * FROM mid_term_scores WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        //output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $subject = $row['subject'];
            $class = $row['student_class'];
            $arm = $row['student_arm'];
            $T2 = $row['T2'];
            $admission_no = $row['admission_no'];
            $name = $row['student_name'];
            $a_session = $row['session'];
            $term = $row['term'];
        }
    } else {
        $_SESSION['message'] = "No Scores found for the Selected Subject! Kindly Input scores";
        $_SESSION['msg_type'] = "danger";
        header("location:midterm_edit.php?no-scores");
        exit();
    }
    $conn->close();
}


// update logic for mid term scores
if (isset($_POST['update_midterm'])) {
    $id = $_POST['id'];
    $T2 = $_POST['T2'];

    $sql = "UPDATE mid_term_scores SET T2 = '$T2' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Mid-Term Score Updated Successfully!";
        $_SESSION['msg_type'] = "success";
        header("location:mid_term_scores_view.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    $conn->close();
}



// delete button logic for mid term scores

if (isset($_GET['delete_mt_score'])) {
    $id = $_GET['delete_mt_score'];
    $sql = "DELETE FROM  mid_term_scores WHERE id=$id";
    if ($conn->query($sql) === TRUE) {

        $_SESSION['message'] = "Scores for selected students deleted successfully!";
        $_SESSION['msg_type'] = "danger";
        header("location:../mid_term_scores_view.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
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

    $conn->close();
}


// update logic
if (isset($_POST['update_ex_scores'])) {

    $id = $_POST['id'];
    $subject = $_POST['subject'];
    $student_name = $_POST['student_name'];
    $T1 = $_POST['T1'];
    $T2 = $_POST['T2'];
    $project = $_POST['project'];
    $assignment = $_POST['assignment'];
    $exam = $_POST['exam'];
    $total = (int)($T1 + $T2 + $project + $assignment + $exam);

    $sql = "UPDATE students_score SET T1 = '$T1', T2 = '$T2', T2 = '$T2', project = '$project', assignment = '$assignment', exam = '$exam', total = '$total' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = " $subject Scores for $student_name Updated Successfully!";
        $_SESSION['msg_type'] = "success";
        header("location:scores_view.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    $conn->close();
}


// logic to edit Mock scoress
if (isset($_GET['edit_mock'])) {
    $id = $_GET['edit_mock'];
    $update = true;
    $sql = "SELECT * FROM mock_scores WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        //output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $subject = $row['subject_title'];
            $class = $row['student_class'];
            $class_arm = $row['class_arm'];
            $scores = $row['score'];
            $mock_no = $row['mock_no'];
            $admission_no = $row['admission_no'];
            $student_name = $row['student_name'];
            $a_session = $row['session'];
            $term = $row['term'];
        }
    } else {
        $_SESSION['message'] = "No Result found for the Selected Subject! Kindly Input scores";
        $_SESSION['msg_type'] = "danger";
        header("location:mock_scores_edit.php?no-scores");
        exit();
    }

    $conn->close();
}
// logic to update the mock scores
if (isset($_POST['update_mock'])) {

    $id = $_POST['id'];
    $student_name = $_POST['student_name'];
    $class =   $_POST['student_class'];
    $subject = $_POST['subject'];
    $scores = $_POST['score'];
    $mock_no = $_POST['mock_no'];
    $admission_no = $_POST['admin_no'];
    $student_name = $_POST['student_name'];
    $a_session = $_POST['a_session'];
    $term = $_POST['term'];

    $sql = "UPDATE mock_scores SET score = '$scores' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = " $subject Scores for $student_name for $mock_no Updated Successfully!";
        $_SESSION['msg_type'] = "success";
        header("location:mock_scores_display_admin.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    $conn->close();
}



// delete button logic

if (isset($_GET['delete_ex_score'])) {
    $id = $_GET['delete_ex_score'];
    $sql = "DELETE FROM students_score WHERE id=$id";
    if ($conn->query($sql) === TRUE) {

        $_SESSION['message'] = "Scores for selected students deleted successfully!";
        $_SESSION['msg_type'] = "danger";
        header("location:../scores_view.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


if (isset($_GET['delete_mock'])) {
    $id = $_GET['delete_mock'];
    $sql = "DELETE FROM mock_scores WHERE id=$id";
    if ($conn->query($sql) === TRUE) {

        $_SESSION['message'] = "Scores for selected students deleted successfully!";
        $_SESSION['msg_type'] = "danger";
        header("location:../mock_scores_display_admin.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


// teachers scores preview

if (isset($_POST['scores_view_teacher'])) {
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
    header("location:scores_view_teacher.php");
    exit();
}


if (isset($_POST['mt_score_view_t'])) {
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
    header("location:mt_scores_view_teacher.php");
    exit();
}

//mock view

if (isset($_POST['mock_scores_teacher'])) {
    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);
    $subject = test_input($_POST['subject']);
    $term =  test_input($_POST['term']);
    $academic_session = test_input($_POST['aSession']);
    $mock_no =  test_input($_POST['mock_no']);

    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;
    $_SESSION['subject'] = $subject;
    $_SESSION['aSession'] = $academic_session;
    $_SESSION['mock_no'] = $mock_no;
    header("location:mock_scores_display_teacher.php");
    exit();
}

if (isset($_POST['mock_scores_admin'])) {
    $class = test_input($_POST['student_class']);
    $arm =  test_input($_POST['arm']);
    $subject = test_input($_POST['subject']);
    $term =  test_input($_POST['term']);
    $mock_no =  test_input($_POST['mock_no']);
    $academic_session = test_input($_POST['aSession']);

    $_SESSION['arm'] = $arm;
    $_SESSION['class'] = $class;
    $_SESSION['term'] = $term;
    $_SESSION['subject'] = $subject;
    $_SESSION['aSession'] = $academic_session;
    $_SESSION['mock_no'] = $mock_no;
    header("location:mock_scores_display_admin.php");
    exit();
}

// logic to view midterm scores by admin and supervisors
if (isset($_POST['mid_term_view'])) {
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
    header("location:mid_term_scores_view.php");
    exit();
}
