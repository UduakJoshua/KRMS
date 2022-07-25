<?php
include_once './controller/cbt_init.php';
$title = "BCA | CBT ";
include_once './model/inc/student_dash_header.php';

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
    <div class="container d-flex align-items-center flex-column mt-4 mb-4">
			<h2>You're Done!</h2>
				<h4 class="pt-4 pb-4">Weldone! You have successfuly completed the test.</h4>
				
				<div class="d-flex justify-content-between  mt-4" >
				<a href="cbt.php" class="btn btn-warning mr-4">Take another Test</a>
				<a href="student_dashboard.php" class="btn btn-primary ml-4">Back to Dashboard</a>
				</div>
			
		
		</div>


  </div>




  <?php include_once './model/inc/dashboard_footer.php'; ?>