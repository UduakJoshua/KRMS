<?php
require "./controller/dbase_conn.php";
$title = "BCA | Fees Management";
include_once './model/inc/dashboard_header.php';

?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h6">Fees Management </h1>
    <div class=" mb-2 mb-md-0">
      <div class="mr-2">

        <p><?php echo $_SESSION['username']; ?></p>
      </div>

    </div>
  </div>

  <section>
    <h5 style="font-weight:600; font-size:30px;"> Welcome <?php echo $_SESSION['username']; ?></h5>
    <p>How would like to get started with fees management?</p>

    <div class="row">
      <!--col 1-->

      <div class="col-md-2 icon_div" style="background-color: #30CDCF;">
        <div>
          <span class="fa fa-pencil-square-o icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="fees_template.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Create Fees Template</p>
          </a>
        </div>
      </div>

      <div class="col-md-2 icon_div" style="background-color: #8a1d70;">
        <div>
          <span class="fa fa-usd icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="fees_schedule.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Schedule Fees</p>
          </a>
        </div>
      </div>
      <!--col 2 -->

      <!--div class="col-md-2 icon_div" style="background-color: #f3dd34;">
        <div>
          <span class="fa fa-pencil icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="edit_bill_init.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Edit Bill</p>
          </a>
        </div>
      </div-->
      <!--col 2 -->
      <div class="col-md-2 icon_div" style="background-color: #e3dd34;">
        <div>
          <span class="fa fa-credit-card icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="fees_payment_init.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Fees Payment</p>
          </a>
        </div>
      </div>
      <!--col 3 -->
      <div class="col-md-2 icon_div" style="background-color: #941406;">
        <div>
          <span class="fa fa-line-chart icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="expenditures.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Expenditures</p>
          </a>
        </div>
      </div>

      <!--col 4 -->

    </div>





  </section>
  <hr>

  <?php include_once './model/inc/dashboard_footer.php'; ?>