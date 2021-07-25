<?php
require_once 'dbase_conn.php';
include_once 'function.php';

$filename = $admission_no = $term = $aSession = $classes = "";



if (isset($_POST['mt_upload'])) {

    $filename = $_FILES['mt_result']['name'];
    $target = "assets/results/" . $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $size = $_FILES['mt_result']['size'];
    $file = $_FILES['mt_result']['tmp_name'];

    $admission_no = test_input($_POST['admission_no']);
    $term = test_input($_POST['term']);
    $aSession = test_input($_POST['aSession']);
    $classes = test_input($_POST['classes']);



    $sql = "INSERT INTO mid_term_result (id, admissionNo, result_file, path, term, session, class, size, download) VALUES ('', '$admission_no','$filename', ' $target','$term',
    '$aSession', '$classes', '$size', 0)";


    if ($conn->query($sql) === TRUE) {
        if (move_uploaded_file($file, $target)) {
            $_SESSION['upload'] = "Result Uploaded Successfully! ";
            $_SESSION['msg_type'] = "success";
            header("location:result_input.php?upload-successful");
            exit();
        } else {
            $_SESSION['upload'] = "<script type=text/javascript> alert('Failed to upload file! Please try again')</script>";
            $_SESSION['msg_type'] = "danger";
        }
    } elseif ($conn->error) {
        $_SESSION['upload'] = "There is a problem uploading your file, check to be sure there are no
        duplicate admission number!";
        $_SESSION['msg_type'] = "danger";
        header("location:result_input.php");
        exit();
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
