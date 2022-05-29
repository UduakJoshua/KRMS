<?php
include_once './controller/student_logic.php';
require_once './controller/student_result_list_init.php';
$title = "BCA | View Receipt";
include_once './model/inc/student_dash_header.php';
$admin_no = $_SESSION['st-user_id'];
$section = $_SESSION['section'];
$approval = $_SESSION['approval'];
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="mr-2">
      <?php

      $sql = "SELECT * FROM student WHERE id = '$admin_no' ";
      $result = $conn->query($sql);
      while ($row = mysqli_fetch_assoc($result)) : ?>
        <div>
          <?php
          echo "<div class = 'img_div'>";
          echo "<img src='assets/img/" . $row['image'] . "' >";
          echo "</div>";
          ?>


        </div>
      <?php endwhile; ?>
    </div>

    <div class=" mb-2 mb-md-0">
      <h1 class="h5">Dashboard</h1>
    </div>
  </div>

  <section>

    <div class="bg-info p-2 text-white">
      <h6><strong>How to View Payment Receipt!</strong></h6>

      <ul>
        <li>Select the Current Term to view</li>
        <li>Select the Current Academic Session</li>
        <li>Click the View Receipt </li>
        <li>Scroll down and hit the Download Receipt button to download or print</li>
      </ul>
    </div>
    <hr>
    <?php

    if (isset($_SESSION['message'])) : ?>
      <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
        <?php echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
      </div>
    <?php endif; ?>

    <div class="row justify-content-center">
      <div class="col-md-12">
        <form action="select_receipt_term.php" method="POST">
          <!--report by school begins here-->
          <div class="card">
            <!--card header begins here-->
            <div class="row">
              <div class="col-md-12">
                <div class="card-header">
                  <h6>Select which Term and Session to view payment receipt  </h6>
                </div>
              </div>
            </div>
            <!-- card body begins here-->
            <div class="row">
              <div class="col-md-12">
                <div class="card-body">
                  <div class="row">

                    <div class="col-md-2">
                      <label for="termRe">Term</label>

                      <select name="termRe" id="termRe" class="form-control ">
                        <option value="1st Term"> 1st Term </option>
                        <option value="2nd Term"> 2nd Term </option>
                        <option value="3rd Term"> 3rd Term </option>

                      </select>
                    </div>

                    <div class="col-md-2">
                      <label for="a_session">Session</label>

                      <select name="a_session" id="a_session" class="form-control ">
                        <option value="2021/2022"> 2021/2022 </option>
                        <option value="2021/2022"> 2022/2023 </option>
                        <option value="2022/2023"> 2023/2024</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!--card footer begins here-->

            <div class="card-footer">
              <div class="row">
                <div class="col-md-4">
                     <button class="btn btn-dark btn-block mt-2" name="view_receipt">View Receipt</button>
                </div>
              </div>
            </div>
          </div>

        </form>

      </div>



    </div>

  </section>
  <hr>

  <?php

  include_once './model/inc/dashboard_footer.php';

  ?>