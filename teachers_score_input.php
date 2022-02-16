<?php
require "./controller/dbase_conn.php";
$title = "BCA | Result Management";
include_once './model/inc/staff_dashboard_header.php';

?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h6">Result Management </h1>
    <div class=" mb-2 mb-md-0">
      <div class="mr-2">

        <p><?php echo $_SESSION['staff-username']; ?></p>
      </div>

    </div>
  </div>

  <section>
    <h5 style="font-weight:600; font-size:30px;"> Welcome <?php echo $_SESSION['staff-username']; ?></h5>
    <p>How would like to get started?</p>



    <div class="row">
      <!--col 1-->
      <div class="col-md-2 icon_div" style="background-color: #9B59B6;">
        <div>
          <span class="fa fa-pencil-square-o icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="staff_mid_term_score_init.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Input Mid-Term Scores</p>
          </a>
        </div>
      </div>
      <!--col 2 -->
      <div class="col-md-2 icon_div" style="background-color: #E74C3C;">
        <div>
          <span class="fa fa-eye icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="midterm_scores_teacher_init.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">View Mid Term Scores</p>
          </a>
        </div>
      </div>
      <!--col 3 -->
      <div class="col-md-2 icon_div" style="background-color: #1F618D ;">
        <div>
          <span class="fa fa-pencil-square-o icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="teacher_exam_init.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Input Exam Scores</p>
          </a>
        </div>
      </div>

    </div>

    <!--row 2 begins here-->
    <div class="row">
      <!--col 1-->
      <div class="col-md-2 icon_div" style="background-color: #F1C40F;">
        <div>
          <span class="fa fa-eye icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="scores_input_view_teacher.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">View Exam Scores</p>
          </a>
        </div>
      </div>

      <!--col 2-->
      <?php
      $section = $_SESSION['section'];
      if ($section == "Secondary" || $section == "General") :
      ?>
        <div class="col-md-2 icon_div" style="background-color: #229954;">
          <div>
            <span class="fa fa-pencil-square-o icon" aria-hidden="true"></span>
          </div>

          <div>
            <a href="mock_init_teacher.php" class="text-decoration-none icon-a">
              <p class="text-center text-white">Input Mock Scores (JSS3 & SSS3 Only)</p>
            </a>
          </div>
        </div>
        <!--col 3-->
        <div class="col-md-2 icon_div" style="background-color: #1B2631 ;">
          <div>
            <span class="fa fa-eye icon" aria-hidden="true"></span>
          </div>
          <div>
            <a href="mock_view_teacher.php" class="text-decoration-none icon-a">
              <p class="text-center text-white">View Mock Scores</p>
            </a>
          </div>
        </div>
      <?php endif; ?>
      <?php
      $desig = $_SESSION['role'];
      if ($desig == "Form Teacher") :
      ?>
        <div class="col-md-2 icon_div" style="background-color: #48C9B0;">
          <div>
            <span class="fa fa-user-circle-o icon" aria-hidden="true"></span>
          </div>
          <div>
            <a href="teacher_psychomotor_init.php" class="text-decoration-none icon-a">
              <p class="text-center text-white">Add Psychomotor</p>
            </a>
          </div>
        </div>
      <?php endif; ?>
    </div>



  </section>
  <hr>

  <?php include_once './model/inc/dashboard_footer.php'; ?>