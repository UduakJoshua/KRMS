<?php
require "./controller/dbase_conn.php";
$title = "BCA | E-Learning";
include_once './model/inc/student_dash_header.php';
?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h6">E-Learning Corner </h1>
    <div class=" mb-2 mb-md-0">
      <div class="mr-2">


      </div>

    </div>
  </div>

  <section>
    <h5 style="font-weight:600; font-size:25px;"> Hello <?php echo $_SESSION['st-username']; ?></h5>
    <h6>What would you like to do? </h6>

    <div class="row">

      <div class="col-md-3 icon_div" style="background-color: #f5d442">
        <div>
          <span class="fa fa-desktop icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="e_videos_students.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Watch a Learning Video</p>
          </a>
        </div>
      </div>

      <div class="col-md-3 icon_div" style="background-color: #126e29;">
        <div>
          <span class="fa fa-book icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="e_assignment_students.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">View Assignment</p>
          </a>
        </div>
      </div>

      <!--col 2 -->
      <div class="col-md-3 icon_div" style="background-color: #f54259;">
        <div>
          <span class="fa fa-pencil icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="#" class="text-decoration-none icon-a">
            <p class="text-center text-white">Take Test</p>
          </a>
        </div>
      </div>


    </div>



    </div>
  </section>
  <hr>
  <?php include_once './model/inc/dashboard_footer.php'; ?>