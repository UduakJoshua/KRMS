<?php
include_once './controller/cbt_init.php';
$title = "BCA | CBT ";
include_once './model/inc/student_dash_header.php';
$subject = $_SESSION['subject'];
$class = $_SESSION['student_class'];
$record_per_page = 1;

$page_query =    "SELECT * FROM cbt_questions  
    WHERE class = '$class' && subject = '$subject'   ";
    $page_result = $conn->query($page_query);
    $total_records = mysqli_num_rows($page_result);

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
     
     
      

     
     
      
      if (!isset($_GET['page'])) {
        $page = 1;
        $number = 1;
      } else {
         
          $page = $_GET['page'];
          $number = $_GET['page']; 
      }
      
      $start_from = ($page - 1) * $record_per_page;
      
      $sql = "SELECT * FROM cbt_questions 
      WHERE class = '$class' && subject = '$subject'  LIMIT $start_from, $record_per_page";
      $result = $conn->query($sql);
      if (mysqli_num_rows($result) > 0) :

      //$total_records = mysqli_num_rows($result);
     
          

       ?>
       <?php  while ($row = mysqli_fetch_assoc($result)) :
        ?>
      <div class="current text-white d-flex justify-content-between">
          <p> Question <?php echo $row['question_no'] ;?> of  <?php echo $total_records ;?></p>
          <div class="timer" data-timer="900">  </div>
      </div> 

    
      
        <p class="question quest_size" ><?php echo $row['text'] ;?></p> 
      <?php endwhile ;?>
      <?php else : ?>
                    <div class="col-md-12 bg-warning text-center mt-4 pt-4 mb-4">
                        <h4>There is no CBT for the selected subject.<br> 
                        Kindly Select another subject or contact the School Admin for the scheduled CBT subjects.</h4>
                        <a href="cbt.php"><button type="button" class="btn btn-primary m-4">Back</button></a>
                    </div>

                <?php
                                exit();
                            endif;
                ?>
                
      <!-- options will be in a form -->
          <form action="cbt_quest.php" method="POST">
            <?php  $sql_choice = "SELECT * FROM cbt_choices
      WHERE class = '$class' && subject = '$subject' && question_no = '$number' ";
      $choices = $conn->query($sql_choice);
     ;?>
            <ul class="choices quest_size">
             <?php  while ($row = mysqli_fetch_assoc($choices)) : ?>
              <li><input type="radio" name="choice" value="<?php echo $row['id']?>"> <?php echo $row['text'];?></li>
           <?php endwhile ;?>
              </ul>
            
            <div class="butns d-flex justify-content-center">
            
              <input type="submit" class="btn btn-primary text-center" name = "submit_test" value="Next"/>
              <input type="hidden" class="btn btn-primary" name = "number" value="<?php echo  $number ;?>"/>
            </div>
          </form>
          <hr>
               
    </div>   
    
    </div>

    <div class="bg-light pt-2 text-center" >
                    <?php
                   

                    $total_pages = ceil($total_records / $record_per_page);

                    for ($i = 1; $i <= $total_pages; $i++) {

                        echo  "<a href='cbt_quest.php?page=" . $i . "' class='btn btn-primary ml-2 mb-2' >$i </a>";
                    }
                    ?>


                </div> 

  </section>
  <hr>







  <?php include_once './model/inc/dashboard_footer.php'; ?>
  <script>
  $(".timer").TimeCircles({
    time:{
      Days:{
        show:false
      },
      Hours:{
        show:false
      }
    }
  });

</script>