<?php
require "./controller/dbase_conn.php";
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
      <!--col 1-->

      <div class="col-md-2 icon_div" style="background-color: #30CDCF;">
        <div>
          <span class="fa fa-pencil-square-o icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="mid_term_score_init.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Input Mid-Term Scores</p>
          </a>
        </div>
      </div>
      <div class="col-md-2 icon_div" style="background-color: #196F3D;">
        <div>
          <span class="fa fa-eye icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="mid_term_view_init.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">View Mid Term Scores</p>
          </a>
        </div>
      </div>
      <!--col 2 -->
      <div class="col-md-2 icon_div" style="background-color: #E74C3C ;">
        <div>
          <span class="fa fa-print icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="midterm_display_init.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Print Mid-Term Result</p>
          </a>
        </div>
      </div>

      <!--col 3 -->
      <div class="col-md-2 icon_div" style="background-color: #717D7E;">
        <div>
          <span class="fa fa-print icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="mock_admin_init_dis.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Print Mock Result</p>
          </a>

        </div>
      </div>
      <!--col 4 -->

    </div>

    <!--row 2 begins here-->
    <div class="row">
      <!--col 2-->
      <div class="col-md-2 icon_div" style="background-color: #1B2631;">
        <div>
          <span class="fa fa-pencil-square-o icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="batch_result_input.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Input Exam Scores</p>
          </a>
        </div>
      </div>

      <div class="col-md-2 icon_div" style="background-color: #633974;">
        <div>
          <span class="fa fa-eye icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="scores_input_view.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">View Exam Scores</p>
          </a>
        </div>
      </div>

      <!--col 4-->
      <div class="col-md-2 icon_div" style="background-color: #F4D03F ;">
        <div>
          <span class="fa fa-print icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="result_display_init.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Print Exam Result</p>
          </a>
        </div>
      </div>

      <div class="col-md-2 icon_div" style="background-color: #48C9B0;">
        <div>
          <span class="fa fa-pencil-square-o icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="mock_admin.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Input Mock Scores</p>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2 icon_div" style="background-color: #48C930;">
        <div>
          <span class="fa fa-eye icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="mock_scores_init.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">View Mock Scores</p>
          </a>
        </div>
      </div>

      <div class="col-md-2 icon_div" style="background-color: #48C9B0;">
        <div>
          <span class="fa fa-user-circle-o icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="students_psychomotor_init.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Add Psychomotor Rating</p>
          </a>
        </div>

        
      </div>
      <div class="col-md-2 icon_div" style="background-color: #48C9B0;">
        <div>
          <span class="fa fa-user-circle-o icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="result_spreadsheet_init.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Generate Spreadsheet</p>
          </a>
        </div>
    </div>

    </div>

  </section>
  <hr>

  <?php include_once './model/inc/dashboard_footer.php'; ?>