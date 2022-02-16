<?php
require "./controller/dbase_conn.php";
$title = "BCA | Fees Report";
include_once './model/inc/dashboard_header.php';

?>

<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h6">Fees Payment Report</h1>
    <div class=" mb-2 mb-md-0">
      <div class="mr-2">

        <p><?php echo $_SESSION['username']; ?></p>
      </div>

    </div>
  </div>

  <section>


    <div class="row">
      <!--col 1-->



      <div class="col-md-2 icon_div" style="background-color: #196F3D;">
        <div>
          <span class="fa fa-line-chart icon" aria-hidden="true"></span>
        </div>
        <div>
          <a href="fees_view_init.php" class="text-decoration-none icon-a">
            <p class="text-center text-white">Class Payment</p>
          </a>
        </div>
      </div>
      <!--col 3 -->
      <?php if (($_SESSION['username'] == "director") || ($_SESSION['username'] == "administrator") || ($_SESSION['username'] == "Proprietress")) : ?>
        <div class="col-md-2 icon_div" style="background-color: #79aaaa;">
          <div>
            <span class="fa fa-line-chart icon" aria-hidden="true"></span>
          </div>
          <div>
            <a href="fees_report_init.php" class="text-decoration-none icon-a">
              <p class="text-center text-white">Fees & Expenditures Report</p>
            </a>
          </div>
        <?php endif; ?>
        </div>

        <!-- end col 3 -->


    </div>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <a href="fees_management.php"><button type="button" style="width:30%;" class="btn btn-warning">Back </button></a>
      </div>
    </div>






  </section>
  <hr>

  <?php include_once './model/inc/dashboard_footer.php'; ?>