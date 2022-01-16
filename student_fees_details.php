<?php
include_once './controller/student_logic.php';
$title = "BCA | Student Profile";
include_once './model/inc/student_dash_header.php';
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="mr-2">
      <?php
      $admin_no = $_SESSION['st-user_id'];
      $sql = "SELECT * FROM student WHERE id = '$admin_no' ";
      $result = $conn->query($sql);
      while ($row = mysqli_fetch_assoc($result)) : ?>
        <div>
          <?php
          echo "<div class = 'img_div'>";
          echo "<img src='assets/img/" . $row['image'] . "' >";
          echo "</div>";
          ?>
        <?php endwhile; ?>

        </div>

    </div>

    <div class=" mb-2 mb-md-0">
      <h1 class="h5">Fees Info</h1>

    </div>
  </div>

  <section>
    <h4 class="ml-4 text-capitalize text-decoration-underline">Basic Fees Info</h4>
    <div class="row ml-4">
      <?php
      $admin_no = $_SESSION['admin_no'];
      $sql = "SELECT * FROM fees_total WHERE admission_no = '$admin_no' ";
      $result = $conn->query($sql);
      while ($row = mysqli_fetch_assoc($result)) : ?>
        <div>
          <h5 class="mt-2">School Fees: &#8358; <?php echo (number_format($row['total_fees'])); ?> </h5>
          <h5 class="mt-3">Amount Paid: &#8358; <?php echo (number_format($row['amount_paid'])); ?> </h5>
          <h5 class="mt-3">Balance: &#8358; <?php echo (number_format($row['balance'])); ?> </h5>
          <h5 class="mb-3">Status:
            <?php if ($row['balance'] == "0") : ?>

              <button class="btn btn-primary btn-sm  disabled">Cleared</button>

            <?php else : ?>

              <button class="btn btn-danger btn-sm  disabled">Owing</button>
            <?php endif; ?>
          </h5>

        <?php endwhile; ?>
        <button class="mb-3 btn btn-primary">View Payment Receipt</button>
        </div>



  </section>
  <hr>







  <?php include_once './model/inc/dashboard_footer.php'; ?>