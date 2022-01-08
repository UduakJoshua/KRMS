<?php
include_once './controller/student_logic.php';
$title = "BCA | Mock Result";
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


        </div>
      <?php endwhile; ?>
    </div>

    <div class=" mb-2 mb-md-0">
      <h1 class="h5">Dashboard</h1>
    </div>
  </div>

  <section>
    <p style="font-weight:600; font-size:30px;"> Hello <?php echo $_SESSION['st-username']; ?></p>
    <h5>Kindly select the Mock result you want to view.</h5>


    <div class="row">
      <!--mock 1-->
      <div class="col-md-3">
        <a href="mock_result_1.php" class="text-decoration-none"><button class="btn btn-dark btn-block mt-4">Mock 1</button></a>
      </div>
      <!--end mock 1-->

      <!--mock 2-->
      <div class="col-md-3">
        <a href="mock_result_2.php" class="text-decoration-none"><button class="btn btn-danger btn-block mt-4">Mock 2</button></a>
      </div>
      <!--end mock 2-->
      <!--mock 3-->
      <div class="col-md-3">
        <a href="mock_notification.php" class="text-decoration-none"><button class="btn btn-secondary btn-block mt-4">Mock 3</button></a>
      </div>
      <!--end mock 3-->
      <!--mock 4-->
      <div class="col-md-3">
        <a href="mock_notification.php" class="text-decoration-none"><button class="btn btn-success btn-block mt-4">Mock 4</button></a>
      </div>
      <!--end mock 4-->
    </div>





  </section>
  <hr>







  <?php include_once './model/inc/dashboard_footer.php'; ?>