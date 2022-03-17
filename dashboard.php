<?php
session_start();
$title = "BCA | Dashboard";
include_once './model/inc/dashboard_header.php';
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class=" mb-2 mb-md-0">
      <div class="mr-2">

        <p>Welcome <?php echo $_SESSION['username']; ?></p>
      </div>

    </div>
  </div>


  <section>

    <div class="row">

      <div class="col-md-4">

        <div class="card bg-success text-white mt-4 shadow" style="width: 16rem; height:6rem; ">
          <div class="card-body">
            <h5 class="card-title">Staff Management</h5>
            <a href="staff_display.php" class="card-link text-white">Manage Staff</a>
          </div>
        </div>
      </div>

      <!--col 2 -->
      <div class="col-md-4">

        <div class="card bg-warning text-white mt-4 shadow" style="width: 16rem; height:6rem; ">
          <div class="card-body">
            <h5 class="card-title">Input Result</h5>
            <a href="result_management.php" class="card-link text-white">Manage Results</a>
          </div>
        </div>
      </div>

      <!--col 2 -->
      <div class="col-md-4">

        <div class="card bg-info text-white mt-4 shadow" style="width: 16rem; height:6rem; ">
          <div class="card-body">
            <h5 class="card-title">Push Notification</h5>
            <a href="notification.php" class="card-link text-white">Notification</a>
          </div>
        </div>
      </div>

      <!--col 3-->
      <?php if ($_SESSION['username'] != "supervisor") : ?>
        <div class="col-md-4">

          <div class="card bg-primary text-white mt-4 shadow" style="width: 16rem; height:6rem; ">
            <div class="card-body">
              <h5 class="card-title">Fees Payment</h5>
              <a href="fees_management.php" class="card-link text-white">Manage Fees</a>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <hr>







  <?php include_once './model/inc/dashboard_footer.php'; ?>