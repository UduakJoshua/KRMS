<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$class = " ";
$sect = " ";
$id = 0;
$update = false;
$messages = array();


if (isset($_POST['addClass'])) {
    $className = test_input($_POST['class_name']);
    $section = test_input($_POST['section']);

    $sql = "INSERT INTO classes (className,  section) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss',  $className, $section);

    if ($stmt->execute()) {
        $_SESSION['message'] = "You have succesfully created a class!";
        $_SESSION['msg_type'] = "success";
        header('Location:class_display.php');
    } else {
        $errors['insert'] = "Something went wrong inserting your data!";
    }

    $stmt->close();
    $conn->close();
}

// delete button logic

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM classes WHERE id=$id";

    if ($conn->query($sql) === TRUE) {

        $_SESSION['message'] = "Class deleted Successfully";
        $_SESSION['msg_type'] = "danger";
        header("location:../class_display.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}

// edit button section

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $sql = "SELECT * FROM classes WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    //$result = mysqli_query($conn, $sql);

    if ($row = $result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            $class = $row['className'];
            $sect = $row['section'];
        }
    } else {
        echo "No results found";
    }


    $conn->close();
}

// update logic
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $class = $_POST['class_name'];
    $sect = $_POST['section'];

    $sql = "UPDATE classes SET className='$class',  section='$sect' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Class Updated Successfully!";
        $_SESSION['msg_type'] = "success";
        header("location:class_display.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    $conn->close();
}
