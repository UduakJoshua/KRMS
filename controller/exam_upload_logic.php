<?php
require_once 'dbase_conn.php';
include_once 'function.php';

$filename = $admission_no = $term = $aSession =  "";


if (isset($_POST['mt_upload'])) {

    $admission_no = test_input($_POST['admission_no']);
    $term = test_input($_POST['term']);
    $aSession = test_input($_POST['aSession']);
    // $classes = test_input($_POST['classes']);

    // get the file information from the array
    $fileName = $_FILES['mt_result']['name'];
    $fileTmpName = $_FILES['mt_result']['tmp_name'];
    $fileSize = $_FILES['mt_result']['size'];
    $fileError = $_FILES['mt_result']['error'];
    $fileType = $_FILES['mt_result']['type'];

    // check for the file type to be uploaded
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowedExt = array('pdf');

    if (in_array($fileActualExt, $allowedExt)) {
        if ($fileError === 0) {
            $fileDestination = "assets/exam_results/" . $fileName;

            $sql_sel = "SELECT * FROM exam_result WHERE admissionNo = ? LIMIT 1";
            $stmt = $conn->prepare($sql_sel);

            $stmt->bind_param('s', $admission_no);
            $stmt->execute();

            $result = $stmt->get_result();
            $row = $result->fetch_assoc();


            if ($row['admissionNo'] == $admission_no) {
                $_SESSION['upload'] = "Duplicate Admission No! There is a result already attached to the 
                admission number entered.  ";
                $_SESSION['msg_type'] = "danger";
                header("location:exam_upload.php?Duplicate-No");
                exit();
            } else {
                $sql = "INSERT INTO exam_result (id, admissionNo, exam_file, path, term, session,  size, download) 
            VALUES 
            ('', '$admission_no','$file', ' $fileDestination','$term', '$aSession',  '$fileSize', 0)";
            }
            if ($conn->query($sql) === TRUE) {

                if (move_uploaded_file($fileTmpName, $fileDestination) === TRUE) {

                    $_SESSION['upload'] = "Result Uploaded Successfully! ";
                    $_SESSION['msg_type'] = "success";
                    header("location:exam_upload.php?upload-successful");
                    exit();
                } else {
                    echo " failed upload result";
                }
            } else {
                $_SESSION['upload'] = $conn->error;
                $_SESSION['msg_type'] = "danger";
                header("location:exam_upload.php?database-error");
                exit();
            }
        } else {
            $_SESSION['upload'] = "There is an Error asssociated with Uploading your File!";
            $_SESSION['msg_type'] = "danger";
        }
    } else {
        $_SESSION['upload'] = "Wrong file selected! ";
        $_SESSION['msg_type'] = "danger";
        header("location:exam_upload.php?wrong-file");
        exit();
    }
    $conn->close();
}
