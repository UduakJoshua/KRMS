<?php
include_once './controller/student_logic.php';
$title = "BCA | Student Dashboard";
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
      <h1 class="h5">Dashboard</h1>
    </div>
  </div>

  <section>
    <p style="font-weight:600; font-size:30px;"> Welcome <?php echo $_SESSION['st-username']; ?></p>
    <h5>How would like to get started?</h5>


    <div class="row">



      <div class="col-md-6">
        <a href="midterm.php" class="text-decoration-none"><button class="btn btn-primary btn-block mt-4">Check Midterm Result</button></a>

      </div>

      <!--col 2 -->
      <div class="col-md-6">
        <a href="exam_result.php" class="text-decoration-none"><button class="btn btn-warning btn-block mt-4"> Check Examination Result</button></a>

      </div>
    </div>

    <div class="row">



      <div class="col-md-6">
        <a href="e_learning.php" class="text-decoration-none"><button class="btn btn-primary btn-block mt-4">Take a Lesson</button></a>

      </div>

      <!--col 2 -->
      <div class="col-md-6">
        <a href="cbt.php" class="text-decoration-none"><button class="btn btn-warning btn-block mt-4"> Test Yourself</button></a>

      </div>
    </div>



  </section>
  <hr>







  <?php include_once './model/inc/dashboard_footer.php'; ?>