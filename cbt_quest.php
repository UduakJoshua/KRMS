<?php
include_once './controller/cbt_init.php';
$title = "BCA | CBT ";
include_once './model/inc/student_dash_header.php';
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
  <?php include_once './model/inc/student_profile_pics.php'?>

    <div class=" mb-2 mb-md-0">
      <h1 class="h5">Computer Based Test</h1>

    </div>
  </div>

  <section>
    
    <div class="row">      
    <div class=" container col-md-8  ">
     
     <?php 
     // query the database for getting questions
      $subject = $_SESSION['subject'];
      $class = $_SESSION['student_class'];
      $number = $_SESSION['number'];
      
      $sql = "SELECT * FROM cbt_questions 
      WHERE class = '$class' && subject = '$subject' && question_no = '$number'";
      $result = $conn->query($sql);
      // store the questions as an associative array
      $question = $result->fetch_assoc();


      // select query for the options
      $sql_choice = "SELECT * FROM cbt_choices
      WHERE class = '$class' && subject = '$subject' && question_no = '$number'";
      $choices = $conn->query($sql_choice);

       ?>
      <div class="current text-white">Question 1 of 10</div> 
      <p class="question quest_size"><?php echo $question['text'] ;?></p> 
      <!-- options will be in a form -->
          <form action="#">
            <ul class="choices quest_size">
             <?php  while ($row = mysqli_fetch_assoc($choices)) : ?>
              <li><input type="radio" name="choice" value="<?php echo $row['id']?>"> <?php echo $row['text'];?></li>
           <?php endwhile ;?>
              </ul>
            
            <div class="butns d-flex justify-content-between">
              <button class="btn btn-success">Next</button>
              <input type="submit" class="btn btn-primary" value="Submit"/>
            </div>
          </form>
          <hr>
               
    </div>    
    </div>



  </section>
  <hr>







  <?php include_once './model/inc/dashboard_footer.php'; ?>