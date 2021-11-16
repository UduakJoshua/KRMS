<?php
require "./controller/dbase_conn.php";
$title = "BCA | Student Management";
include_once './model/inc/dashboard_header.php';

?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h6">Student Management </h1>
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
      <div class="col-md-3 icon_div" style="background-color: #30CDCF;">
        <div>
          <span class="fa fa-pencil icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="student.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Register Student</p>
          </a>
        </div>
      </div>

      <!--col 2 -->
      <div class="col-md-3 icon_div" style="background-color: #CF8230;">
        <div>
          <span class="fa fa-graduation-cap icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="student_display.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Display Students</p>
          </a>
        </div>
      </div>
      <div class="col-md-3 icon_div" style="background-color: #cf3230;">
        <div>
          <span class="fa fa-users icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="section_init.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Add/Edit Section</p>
          </a>
        </div>
      </div>

    </div>


  </section>
  <hr>

  <?php include_once './model/inc/dashboard_footer.php'; ?>