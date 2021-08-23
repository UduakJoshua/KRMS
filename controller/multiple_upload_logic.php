<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$class = "";
$arm =  "";
//$subject = "";
$term =  "";
$academic_session = "";
$errors = array();

if (isset($_POST['save_result'])) {

    $total_file = count($_FILES['mt_result']['name']);
    // Looping over all files
    for ($i = 0; $i < $total_file; $i++) {
        $admission_no = $_POST['admission_no'][$i];
        $a_session = $_POST['a_session'];
        $term = $_POST['term'][$i];

        //echo $i;

        // get the file information from the array
        $fileName = $_FILES['mt_result']['name'][$i];
        $fileTmpName = $_FILES['mt_result']['tmp_name'][$i];
        $fileSize = $_FILES['mt_result']['size'][$i];
        $fileError = $_FILES['mt_result']['error'][$i];
        $fileType = $_FILES['mt_result']['type'][$i];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowedExt = array('pdf');

        if (in_array($fileActualExt, $allowedExt)) {
            if ($fileError === 0) {

                $fileDestination = "assets/exam_results/" . $_FILES['mt_result']['name'][$i];
                if ($fileTmpName != "") {
                    if (move_uploaded_file($fileTmpName, $fileDestination) === TRUE) {

                        $sql_sel = "SELECT * FROM exam_result WHERE admissionNo = ? LIMIT 1";
                        $stmt = $conn->prepare($sql_sel);

                        $stmt->bind_param('s', $admission_no);
                        $stmt->execute();

                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();


                        if (!empty($row) && $row['admissionNo'] == $admission_no && $row['term'] == $term) {
                            $errors = "Result already exist for " . $admission_no . ", please check your parameters and try again!  ";
                            echo "<div class= 'alert-warning' id='error'>";
                            echo $errors;
                            echo "</div> ";
                        } else {
                            $sql = "INSERT INTO exam_result (id, admissionNo, exam_file, path, term, session,  size, download) 
            VALUES 
            ('', '$admission_no','$fileName', '$fileDestination','$term', '$a_session',  '$fileSize', 0)";

                            if ($conn->query($sql) === TRUE) {
                                $errors = " Result for " . $admission_no . " succesfully uploaded!";
                                echo "<div class= 'alert-success' id='error'>";
                                echo $errors;
                                echo "</div> ";
                            }
                        }
                    }
                }
            }
        } else {
            $errors = " Result for " . $admission_no . " failed to be uploaded! Possibly, file was not selected";
            echo "<div class= 'alert-danger' id='error'>";
            echo $errors;
            echo "</div>";
        }
    }
    exit();
} 

//score logic
