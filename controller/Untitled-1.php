 {
 if (move_uploaded_file($file, $target) === TRUE) {

 $sql = "INSERT INTO student_assignments
 (id, subject, student_class, assignment, file_path, term, instructions, downloads)
 VALUES
 ('', '$subject','$student_class','$filename', ' $target', '$term', '$instruction', 0)";

 if ($conn->query($sql) === TRUE) {
 $_SESSION['message'] = "Assignment Successfully Posted!";
 $_SESSION['msg_type'] = "success";
 header("location:e_assignment_display.php");
 exit();
 //header("location:e_assignment_display.php");
 // exit();
 } else {
 $_SESSION['message'] = "Class Updated Successfully!";
 $_SESSION['msg_type'] = "danger";
 header("location:e_assignment.php");
 exit();
 // exit();
 }
 }
 } else {
 $_SESSION['message'] = "Class Updated Successfully!";
 $_SESSION['msg_type'] = "danger";
 header("location:e_assignment.php");
 exit();
 // exit();
 }
 }
 } else {

 // exit();
 }
 $conn->close();
 }


 <?php
    if (in_array($fileActualExt, $allowedExt)) {

        if ($fileError === 0) {
            if ($file != "") {
                if (move_uploaded_file($file, $target) === TRUE) {
                    $sql = "INSERT INTO student_assignments
 (id, subject, student_class, assignment, file_path, term, instructions, downloads)
 VALUES
 ('', '$subject','$student_class','$filename', ' $target', '$term', '$instruction', 0)";

                    if ($conn->query($sql) === TRUE) {
                        $_SESSION['message'] = "Assignment Successfully Posted!";
                        $_SESSION['msg_type'] = "success";
                        header("location:e_assignment_display.php");
                        exit();
                    } else {
                        $_SESSION['message'] = "Assignment failed to be posted! Please try again";
                        $_SESSION['msg_type'] = "danger";
                        header("location:e_assignment.php");
                        exit();
                    }
                } else {
                    $_SESSION['message'] = "Files could not be moved to databse";
                    $_SESSION['msg_type'] = "danger";
                    header("location:e_assignment.php");
                    exit();
                }
            } else {
                $_SESSION['message'] = "Please select an assignment to post!";
                $_SESSION['msg_type'] = "danger";
                header("location:e_assignment.php");
                exit();
            }
        }
    } else {
        $_SESSION['message'] = "Wrong File Extension Selected, Only PDF files are accepted!";
        $_SESSION['msg_type'] = "danger";
        header("location:e_assignment.php");
        exit();
    }
    ?>

 {

 }esle{
 $_SESSION['message'] = "There is an error with the selected file! Try again.";
 $_SESSION['msg_type'] = "danger";
 header("location:e_assignment.php");
 exit();}