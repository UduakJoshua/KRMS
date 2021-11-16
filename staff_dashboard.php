<?php
//session_start();
include_once './controller/staff_logic.php';
$title = "BCA | Dashboard";
include_once './model/inc/staff_dashboard_header.php';
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">


    <div class=" mb-2 mb-md-0">
      <div class="mr-2">

        <?php
        $admin_no = $_SESSION['staff-user_id'];
        $sql = "SELECT * FROM staff WHERE id = '$admin_no' ";
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
          <p>Welcome <?php echo $_SESSION['staff-username']; ?></p>
      </div>

    </div>
    <h1 class="h2">Dashboard</h1>
  </div>


  <section>

    <div class="row">



      <!--col 2 -->
      <div class="col-md-4">

        <div class="card bg-warning text-white mt-4 shadow" style="width: 14rem; height:4rem; ">
          <div class="card-body">

            <a href="./teachers_score_input.php" class="card-link text-white">
              <h5 class="card-title">Manage Results</h5>
            </a>
          </div>
        </div>
      </div>

      <!--col 2 -->


      <!--col 3-->
      <div class="col-md-4">

        <div class="card bg-primary text-white mt-4 shadow" style="width: 14rem; height:4rem; ">
          <div class="card-body">
            <a href="e_assignment_teachers.php" class="card-link text-white">
              <h5 class="card-title">Set Assignment</h5>
            </a>


          </div>
        </div>
      </div>
    </div>
  </section>
  <hr>







  <?php include_once './model/inc/dashboard_footer.php'; ?>