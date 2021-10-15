<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$update = false;
$image = $staff_id = $surname = $firstname = $lastname = $dob = $gender = $marital_status = $religion
    = $role  = $section = $employ_year = $role = $password = $address = $nationality = $state = $phone = $email
    = "";



if (isset($_POST['save'])) {

    $image = $_FILES['image']['name'];
    $target = "assets/img/" . basename($image);
    $surname = test_input($_POST['surname']);
    $firstname = test_input($_POST['firstname']);
    $middlename = test_input($_POST['middlename']);
    $dob = test_input($_POST['dob']);
    $gender = test_input($_POST['gender']);
    $marital_status = test_input($_POST['marital_status']);
    $religion = test_input($_POST['religion']);
    $section = test_input($_POST['section']);
    $role = test_input($_POST['role']);
    $staff_id = test_input($_POST['staff_id']);
    $employ_year = test_input($_POST['employ_year']);
    $password = test_input($_POST['password']);
    $address = test_input($_POST['home_address']);
    $nationality = test_input($_POST['nationality']);
    $state = test_input($_POST['origin']);
    $phone = test_input($_POST['phone']);
    $email = test_input($_POST['email']);
    $staff_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO staff (id, image, staff_id, surname, firstname, middlename, dob, gender, marital_status, religion,  
    section, employ_year, role, password, home_address, nationality, origin,  phone, email) 
    VALUES     ('', '$image', '$staff_id','$surname', '$firstname','$middlename', '$dob' , 
    '$gender', '$marital_status','$religion',   '$section','$employ_year', '$role',
'$staff_password', '$address','$nationality', '$origin', '$phone',   '$email' )";


    if ($conn->query($sql) === TRUE) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $_SESSION['message'] = "Staff Registered Successfully!";
            $_SESSION['msg_type'] = "success";
            header("location:./staff_display.php");
            exit();
        } else {
            $_SESSION['message'] = "<script type=text/javascript> alert('Failed to upload file! Please try again')</script>";
            $_SESSION['msg_type'] = "danger";
        }
    } elseif ($conn->error) {
        $_SESSION['message'] = "$conn->error The Staff ID $staff_id already exist, please check your input and try again!";
        $_SESSION['msg_type'] = "danger";
        header("location:./staff_registeration.php");
        exit();
    }

    $conn->close();
}

// delete button logic

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM staff WHERE id=$id";

    if ($conn->query($sql) === TRUE) {

        $_SESSION['message'] = "Student Record deleted Successfully";
        $_SESSION['msg_type'] = "danger";
        header("location:../staff_display.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}

// edit button section

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $sql = "SELECT * FROM staff WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    //$result = mysqli_query($conn, $sql);

    if ($row = $result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            $image = $row['image'];
            $surname = $row['surname'];
            $firstname = $row['firstname'];
            $middlename = $row['middlename'];
            $dob = $row['dob'];
            $gender = $row['gender'];
            $password = $row['st_password'];
            $religion = $row['religion'];
            $admin_no = $row['admissionNo'];
            $class = $row['class_name'];
            $class_arm = $row['classArm'];
            $admin_year = $row['admissionYear'];
            $address = $row['homeAddress'];
            $nationality = $row['nationality'];
            $state = $row['states'];
            $lga = $row['lga'];
            $father = $row['fatherName'];
            $father_no = $row['fatherNo'];
            $father_mail = $row['fatherMail'];
            $mother = $row['motherName'];
            $mother_no = $row['motherNo'];
            $mother_mail = $row['motherMail'];
            $fatherJob = $row['fatherJob'];
            $motherJob = $row['motherJob'];
        }
    } else {
        echo "No results found";
    }


    $conn->close();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $image = $_FILES['image']['name'];
    $target = "assets/img/" . basename($image);

    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $religion = $_POST['religion'];
    $admin_no = $_POST['admin_no'];
    $password = test_input($_POST['st_password']);
    $st_password = password_hash($password, PASSWORD_DEFAULT);
    $class = $_POST['student_class'];
    $class_arm = $_POST['class_arm'];
    $admin_year = $_POST['admin_year'];
    $address = $_POST['home_address'];
    $nationality = $_POST['nationality'];
    $state = $_POST['origin'];
    $lga = $_POST['lga'];
    $father = $_POST['dad_name'];
    $father_no = $_POST['dad_no'];
    $father_mail = $_POST['email_d'];
    $mother = $_POST['mom_name'];
    $mother_no = $_POST['mom_no'];
    $mother_mail = $_POST['email_m'];
    $fatherJob = $_POST['dadJob'];
    $motherJob = $_POST['momJob'];

    $sql = "UPDATE student SET  image='$image', admissionNo = '$admin_no', surname = '$surname',
    firstname = '$firstname', middlename = '$middlename', dob = '$dob', gender = '$gender', religion = '$religion', 
    class_name = '$class', classArm = '$class_arm', admissionYear = '$admin_year',  homeAddress = '$address', 
    nationality = '$nationality', states = '$state', lga = '$lga', fatherName = '$father', fatherNo = '$father_no', 
    fatherMail = '$father_mail', motherName = '$mother', motherNo = '$mother_no', motherMail = '$mother_mail', 
    fatherJob = '$fatherJob', motherJob = '$motherJob' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $_SESSION['message'] = "Student Registered Successfully!";
            $_SESSION['msg_type'] = "success";
            header("location:./staff_display.php");
            exit();
        } else {
            $_SESSION['message'] = "<script type=text/javascript> alert('Failed to upload file! Please try again')</script>";
            $_SESSION['msg_type'] = "danger";
        }
    } elseif ($conn->error) {
        $_SESSION['message'] = " The admission number .'$admin_no'. already exist, please check your input and try again!";
        $_SESSION['msg_type'] = "danger";
        header("location:./staff_display.php");
        exit();
    }



    $conn->close();
}