<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$update = false;
$subject = "";
$section = "";
$topic = "";
$video_url = "";
$instruction = "";
$assignment_file = "";
$student_class = "";
$messages = array();






if (isset($_POST['addVideo'])) {
    $subject = test_input($_POST['subject']);
    $topic = test_input($_POST['topic']);
    $description = test_input($_POST['video_description']);
    $video_url = test_input($_POST['e_link']);
    $term = test_input($_POST['term']);
    $student_class = test_input($_POST['student_class']);

    $sql = "INSERT INTO e_videos (id, topic, e_description, target_class, e_subject, term, video_url) 
            VALUES 
            ('', '$topic','$description', '$student_class','$subject', '$term',  '$video_url')";



    if ($conn->query($sql) === TRUE) {
        $messages = "You have succesfully Added a Video!";
        //echo $messages;
        $_SESSION['msg_type'] = "success";
        header('Location:e_display.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// delete button logic

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM subject WHERE id=$id";

    if ($conn->query($sql) === TRUE) {

        $_SESSION['message'] = "Class deleted Successfully";
        $_SESSION['msg_type'] = "danger";
        header("location:../subject_display.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}

// edit button section

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $sql = "SELECT * FROM subject WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        //output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $subject = $row['subject_title'];
            $sect = $row['section'];
        }
    } else {
        echo "No results found";
    }


    mysqli_close($conn);
}

// update logic
if (isset($_POST['update_video'])) {
    $id = $_POST['id'];
    $subject = $_POST['subject'];
    $sect = $_POST['section'];

    $sql = "UPDATE subject SET subject_title='$subject', section='$sect' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Class Updated Successfully!";
        $_SESSION['msg_type'] = "success";
        header("location:subject_display.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    $conn->close();
}


// logic for uploading assignment to the database



if (isset($_POST['assignment'])) {
    $subject = test_input($_POST['subject']);
    $assignment_no = test_input($_POST['assignment_no']);
    $instruction = test_input($_POST['instruction']);
    $term = test_input($_POST['term']);
    $student_class = test_input($_POST['student_class']);
    $filename = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $file = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
    $allowedExt = array('pdf', 'jpg', 'doc', 'png', 'jpeg');
    $target = "assets/assignment/" . $filename;

    // $classes = test_input($_POST['classes']);





    if (in_array($fileActualExt, $allowedExt)) {
        if ($fileError === 0) {
            if ($file != "") {
                if (move_uploaded_file($file, $target) === TRUE) {

                    $sql = "INSERT INTO student_assignments 
                    (id, subject, assignment_no, student_class, assignment, file_path, term, instructions, downloads) 
                    VALUES 
                            ('', '$subject', '$assignment_no', '$student_class','$filename', ' $target', '$term',  '$instruction', 0)";

                    if ($conn->query($sql) === TRUE) {
                        $_SESSION['message'] = "Assignment Successfully Posted!";
                        $_SESSION['msg_type'] = "success";
                        header("location:e_assignment_display.php");
                        exit();
                    } else {
                        $_SESSION['message'] = "Assignment Was not Posted!";
                        $_SESSION['msg_type'] = "danger";
                        header("location:e_assignment.php");
                        exit();
                    }
                } else {
                    $_SESSION['message'] = "Assignment Was not Posted!";
                    $_SESSION['msg_type'] = "danger";
                    header("location:e_assignment.php");
                    exit();
                }
            } else {
                $_SESSION['message'] = "No file selected!";
                $_SESSION['msg_type'] = "danger";
                header("location:e_assignment.php");
                exit();
            }
        } else {
            $_SESSION['message'] = "wrong afile!!";
            $_SESSION['msg_type'] = "danger";
            header("location:e_assignment.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Wrong file selected or attemping to post an empty, please check and try again!";
        $_SESSION['msg_type'] = "danger";
        header("location:e_assignment.php");
        exit();
    }
    $conn->close();
}

// deleting assignment posted


if (isset($_GET['deleteAss'])) {
    $id = $_GET['deleteAss'];

    $sql = "DELETE FROM student_assignments WHERE id=$id";

    if ($conn->query($sql) === TRUE) {

        $_SESSION['message'] = "Assignment deleted Successfully";
        $_SESSION['msg_type'] = "danger";
        header("location:../e_assignment_display.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}



// teachers dashboard assignment upload logic
if (isset($_POST['t_assignment'])) {
    $subject = test_input($_POST['subject']);
    $assignment_no = test_input($_POST['assignment_no']);
    $instruction = test_input($_POST['instruction']);
    $term = test_input($_POST['term']);
    $date_posted = test_input($_POST['ass_date']);
    $student_class = test_input($_POST['student_class']);
    $filename = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $file = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
    $allowedExt = array('pdf', 'jpg', 'docx', 'doc', 'png', 'jpeg');
    $target = "assets/assignment/" . $filename;

    // $classes = test_input($_POST['classes']);





    if (in_array($fileActualExt, $allowedExt)) {
        if ($fileError === 0) {
            if ($file != "") {
                if (move_uploaded_file($file, $target) === TRUE) {

                    $sql = "INSERT INTO student_assignments 
                        (id, subject, assignment_no, student_class, date_posted, assignment, file_path, term, instructions, downloads) 
                            VALUES 
                            ('', '$subject', '$assignment_no','$student_class','$date_posted', '$filename', ' $target', '$term',  '$instruction', 0)";

                    if ($conn->query($sql) === TRUE) {
                        $_SESSION['message'] = "$subject Assignment Successfully Posted for $student_class !";
                        $_SESSION['msg_type'] = "success";
                        header("location:e_ass_disp_teachers.php");
                        exit();
                    } else {
                        $_SESSION['message'] = "Assignment Was not Posted!";
                        $_SESSION['msg_type'] = "danger";
                        header("location:e_assignment_teachers.php");
                        exit();
                    }
                } else {
                    $_SESSION['message'] = "Assignment Was not Posted!";
                    $_SESSION['msg_type'] = "danger";
                    header("location:e_assignment_teachers.php");
                    exit();
                }
            } else {
                $_SESSION['message'] = "No file Selected!";
                $_SESSION['msg_type'] = "danger";
                header("location:e_assignment_teachers.php");
                exit();
            }
        } else {
            $_SESSION['message'] = "wrong file!!";
            $_SESSION['msg_type'] = "danger";
            header("location:e_assignment_teachers.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Wrong file selected or attemping to post an empty, please check and try again!";
        $_SESSION['msg_type'] = "danger";
        header("location:e_assignment_teachers.php");
        exit();
    }
    $conn->close();
}

// deleting assignment posted from the teachers dashboard


if (isset($_GET['deleteAssT'])) {
    $id = $_GET['deleteAssT'];

    $sql = "DELETE FROM student_assignments WHERE id=$id";

    if ($conn->query($sql) === TRUE) {

        $_SESSION['message'] = "Assignment deleted Successfully";
        $_SESSION['msg_type'] = "danger";
        header("location:../e_ass_disp_teachers.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
