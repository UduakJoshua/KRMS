<?php
include_once './controller/student_logic.php';
$title = "BCA | Student Dashboard";
include_once './model/inc/student_dash_header.php';
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom dashboard">
    <div class="mr-2">
      <?php
      $admin_no = $_SESSION['admin_no'];
      $term = "2nd Term";
      $a_session = "2021/2022";
      $sql = "SELECT surname, firstname, middlename, image, class_name, section, approval,
      (SELECT balance FROM fees_total WHERE admission_no ='$admin_no' && term ='$term' && a_session = '$a_session'  )as balance FROM student WHERE admissionNo = '$admin_no' ";
      $result = $conn->query($sql);
      while ($row = mysqli_fetch_assoc($result)) :
      ?>
        <div>
          <?php
          echo "<div class = 'img_div'>";
          echo "<img src='assets/img/" . $row['image'] . "' >";
          echo "</div>";
          ?>
        </div>
    </div>


    <div class=" mb-2 mb-md-0">
      <h1 class="h5">Dashboard</h1>
    </div>

    <div class=" mb-2 mb-md-0">
      <h3 class="h5">Fees Status:
        <?php if ($row['balance'] <= "0") : ?>

          <button class="btn btn-primary btn-sm  disabled">Cleared</button>

        <?php else : ?>

          <button class="btn btn-danger btn-sm  disabled">Owing</button>
        <?php endif; ?>
      </h3>
    </div>


  </div>

  <section>
    <p style="font-weight:500; font-size:20px; text-align:center"> Welcome <span class="text-primary"><?php echo $_SESSION['st-username']; ?></span></p>
    <h5>How would you like to get started?</h5>

    <div class="row">

      <!-- col 3-->
      <?php if ($row['class_name'] == "JSS Three") : ?>
        <div class="col-md-4">
          <a href="tb_jss3.php" class="text-decoration-none"><button class="btn btn-dark btn-block mt-4">Exam Time Table</button></a>
        </div>
      <?php elseif ($row['class_name'] == "SSS Three") : ?>
        <div class="col-md-4">
          <a href="tb_sss3.php" class="text-decoration-none"><button class="btn btn-danger btn-block mt-4">Exam Time Table</button></a>
        </div>
      <?php elseif ($row['class_name'] == "JSS One" || $row['class_name'] == "JSS Two") : ?>
        <div class="col-md-4">
          <a href="tb_jss1_2.php" class="text-decoration-none"><button class="btn btn-danger btn-block mt-4">Exam Time Table</button></a>
        </div>
      <?php elseif ($row['class_name'] == "SSS One" || $row['class_name'] == "SSS Two") : ?>
        <div class="col-md-4">
          <a href="tb_sss1_2.php" class="text-decoration-none"><button class="btn btn-danger btn-block mt-4">Exam Time Table</button></a>
        </div>
      <?php elseif ($row['class_name'] == "Step Up") : ?>
        <div class="col-md-4">
          <a href="step_up_tb.php" class="text-decoration-none"><button class="btn btn-danger btn-block mt-4">Exam Time Table</button></a>
        </div>
      <?php elseif ($row['class_name'] == "Progressive") : ?>
        <div class="col-md-4">
          <a href="progressive_tb.php" class="text-decoration-none"><button class="btn btn-danger btn-block mt-4">Exam Time Table</button></a>
        </div>
      <?php elseif ($row['class_name'] == "Bloomers") : ?>
        <div class="col-md-4">
          <a href="pre_nursery_tb.php" class="text-decoration-none"><button class="btn btn-danger btn-block mt-4">Exam Time Table</button></a>
        </div>

      <?php else : ?>
        <div class="col-md-4">
          <a href="basic_tb.php" class="text-decoration-none"><button class="btn btn-secondary btn-block mt-4"> Exam Time Table</button></a>
        </div>
      <?php endif; ?>
      <div class="col-md-4">
        <a href="student_fees_details.php" class="text-decoration-none"><button class="btn btn-primary btn-block mt-4"> Fees Details</button></a>
      </div>
      <!--col 2 -->
      <div class="col-md-4">
        <a href="cbt.php" class="text-decoration-none"><button class="btn btn-warning btn-block mt-4"> Test Yourself</button></a>
      </div>
    </div>


    <div class="row">
      <div class="col-md-4">
        <a href="e_learning_students.php" class="text-decoration-none"><button class="btn btn-dark btn-block mt-4">E-Learning / Assignment</button></a>
      </div>

      <?php if ($row['class_name'] == "JSS Three" || $row['class_name'] == "SSS Three") :
      ?>
        <div class="col-md-4">
          <a href="select_mock_no.php" class="text-decoration-none"><button class="btn btn-dark btn-block mt-4">Check Mock Result (JSS3 & SSS3)</button></a>
        </div>
      <?php else : ?>
        <div class="col-md-4">
          <a href="select_term.php" class="text-decoration-none"><button class="btn btn-danger btn-block mt-4">Check Midterm Result</button></a>
        </div>
      <?php endif; ?>
      <!--col 2  and logic to check student section-->
      <div class="col-md-4">
        <?php if ($row['class_name'] == "JSS Three" || $row['class_name'] == "SSS Three") : ?>
          <a href="#" class="text-decoration-none"><button class="btn btn-secondary btn-block mt-4 d-none"> </button></a>
        <?php else : ?>
          <a href="select_ex_term.php" class="text-decoration-none"><button class="btn btn-secondary btn-block mt-4"> Check Examination Result</button></a>
        <?php endif; ?>

      </div>
    </div>


  <?php endwhile; ?>


  </section>
  <hr>







  <?php include_once './model/inc/dashboard_footer.php'; ?>