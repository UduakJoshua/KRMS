<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$update = false;
$subject = "";
$section = "";
$topic = "";
$video_url = "";
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
