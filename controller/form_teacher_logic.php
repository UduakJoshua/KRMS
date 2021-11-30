<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$teachers_name = " ";
$class_assigned = " ";
$arm_assigned = " ";
$id = 0;
$update = false;
$messages = array();


if (isset($_POST['addTeacher'])) {
    $teachers_name = test_input($_POST['staff_name']);
    $class_assigned = test_input($_POST['student_class']);
    $arm_assigned = test_input($_POST['arm']);
    $staff_id = test_input($_POST['staff_id']);

    $sql = "INSERT INTO form_teachers ( teachers_name, class, arm) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss',  $teachers_name, $class_assigned, $arm_assigned);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Form Teacher Successfully Assigned!";
        $_SESSION['msg_type'] = "success";
        header('Location:./form_teacher_display.php');
        exit();
    } else {
        $errors['insert'] = "Something went wrong inserting your data!";
    }

    $stmt->close();
    $conn->close();
}

// delete button logic

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM form_teachers  WHERE id=$id";

    if ($conn->query($sql) === TRUE) {

        $_SESSION['message'] = "Form Teacher deleted Successfully";
        $_SESSION['msg_type'] = "danger";
        header("location:../form_teacher_display.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}

// edit button section

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $sql = "SELECT * FROM form_teachers  WHERE id=?";
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
