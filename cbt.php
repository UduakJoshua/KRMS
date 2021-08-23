<?php
include_once './controller/student_logic.php';
$title = "BCA | CBT ";
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
      <h1 class="h5">Computer Based Test</h1>

    </div>
  </div>

  <section>
    <h4 class="ml-4 text-capitalize text-decoration-underline">NOTICE</h4>
    <div class="row ml-4">
      <p>This service is Coming Soon!. </p>
      <p>The CBT corner is currently undergoing construction and upgrading. </p>
    </div>



  </section>
  <hr>







  <?php include_once './model/inc/dashboard_footer.php'; ?>