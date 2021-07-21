<?php
include_once './controller/student_logic.php';
$title = "BCA | Student Profile";
include_once './model/inc/student_dash_header.php';
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="mr-2">
      <?php
      $admin_no = $_SESSION['st-user_id'];
      $sql = "SELECT * FROM student WHERE id = '$admin_no' ";
      $result = $conn->query($sql);
      while ($row = mysqli_fetch_assoc($result)) : ?>
        <div>
          <?php
          echo "<div class = 'img_div'>";
          echo "<img src='assets/img/" . $row['image'] . "' >";
          echo "</div>";
          ?>
        <?php endwhile; ?>

        </div>

    </div>

    <div class=" mb-2 mb-md-0">
      <h1 class="h5">My Profile</h1>

    </div>
  </div>

  <section>
    <h4 class="ml-4 text-capitalize text-decoration-underline">Basic Info</h4>
    <div class="row ml-4">
      <?php
      $admin_no = $_SESSION['st-user_id'];
      $sql = "SELECT * FROM student WHERE id = '$admin_no' ";
      $result = $conn->query($sql);
      while ($row = mysqli_fetch_assoc($result)) : ?>
        <div>
          <h5 class="mt-2">Admission No: <?php echo $row['admissionNo']; ?> </h5>
          <h5 class="mt-3">Name: <?php echo $row['surname'] . " " . $row['firstname'] . " " . $row['middlename']; ?> </h5>
          <h5 class="mt-3">Class: <?php echo $row['class_name']; ?> </h5>
          <h5 class="mb-3">Class Arm: <?php echo $row['classArm']; ?> </h5>
          <h5 class="mb-3">Sex: <?php echo $row['gender']; ?> </h5>
          <h5 class="mb-3">Date of Birth: <?php echo $row['dob']; ?> </h5>
          <h5 class="mb-3">Nationality: <?php echo $row['nationality']; ?> </h5>
          <h5 class="mb-3">Religion: <?php echo $row['religion']; ?> </h5>
          <h5 class="mb-3">Guardian: <?php echo $row['fatherName']; ?> </h5>
        <?php endwhile; ?>

        </div>



  </section>
  <hr>







  <?php include_once './model/inc/dashboard_footer.php'; ?>