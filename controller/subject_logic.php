<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$update = false;
$subject = "";
$section = "";
$messages = array();


if (isset($_POST['addSubject'])) {
    $subject = test_input($_POST['subject']);
    $section = test_input($_POST['section']);

    $sql = "INSERT INTO subject ( subject_title, section) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss',  $subject,  $section);

    if ($stmt->execute()) {
        $_SESSION['message'] = "You have succesfully created a Subject!";
        $_SESSION['msg_type'] = "success";
        header('Location:subject_display.php');
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
if (isset($_POST['update'])) {
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


// add no of subject logic

if (isset($_POST['add_subject_no'])) {
    $no_of_subject = test_input($_POST['no_subject']);
    $student_class = test_input($_POST['student_class']);

    $sql = "INSERT INTO no_of_subjects ( class_name, no_of_subjects) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si',  $student_class,  $no_of_subject);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Your Records  have been succesfully saved!";
        $_SESSION['msg_type'] = "success";
        header('Location:subject_count.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
