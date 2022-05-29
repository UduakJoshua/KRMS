<?php
include_once './controller/subject_logic.php';
require_once './controller/cbt_init.php';
$title = "BCA | CBT ";
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
      <h1 class="h5">Computer Based Test</h1>

    </div>
  </div>

  <section>
    <div class=" container-fluid  text-center mb-4">
            <div>
                <h4><strong>Welcome to the CBT Corner.</strong></h4>
                <h5>Please select a subject and click Start to begin the Test.</h5>
                
            </div>
      </div>
            <hr>
    <div class=" container col-md-4 mt-4 ">
          
                <form action="cbt.php" method="POST" >
                     
                        <div class=" mt-4">
                            <div class="form-group">
                                <label for="subject">Subject:</label>
                                <?php
                               
                                $select_sql = "SELECT * FROM subject ORDER BY subject_title ASC";
                                $sql_result = $conn->query($select_sql);
                                ?>
                                <select name="subject" id="subject" class="form-control " value="<?php echo $row['subject_title'] ?>">
                                    // using a while loop to iterate the class table
                                    <?php
                                    while ($row = $sql_result->fetch_assoc()) : ?>
                                        <option value="<?php echo $row['subject_title'] ?>"><?php echo $row['subject_title']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="">
                            <div class="form-group">
                                <input type="submit" name = "cbt_int" class="btn btn-primary btn-block" value="Start">                            
                              
                            </div>
                        </div>
                     
                      
                </form>
         
    </div>



  </section>
  <hr>







  <?php include_once './model/inc/dashboard_footer.php'; ?>