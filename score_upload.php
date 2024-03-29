<?php
require "./controller/score_logic.php";
$title = "BCA | Result Management";
include_once './model/inc/dashboard_header.php';
?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h6">Result Management </h1>
    <div class=" mb-2 mb-md-0">
      <div class="mr-2">

        <p><?php echo $_SESSION['username']; ?></p>
      </div>

    </div>
  </div>

  <section>
    <h5 style="font-weight:600; font-size:30px;"> Welcome <?php echo $_SESSION['username']; ?></h5>
    <p>How would like to get started?</p>


    <div class="row">



      <div class="col-md-6">
        <a href="result_input.php"><button class="btn btn-primary btn-block mt-4">Upload Midterm Result</button></a>

      </div>

      <!--col 2 -->
      <div class="col-md-6">
        <a href="#"><button class="btn btn-warning btn-block mt-4"> Upload Examination Result</button></a>

      </div>
    </div>



  </section>
  <hr>







  <?php include_once './model/inc/dashboard_footer.php'; ?>