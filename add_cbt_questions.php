<?php
include_once './controller/subject_logic.php';
require_once './controller/cbt_init.php';
$title = "BCA | Set Questions ";
include_once './model/inc/staff_dashboard_header.php';
?>



		
	
	
<!-- main content-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h6">Add CBT Questions </h1>
    <div class=" mb-2 mb-md-0">
      <div class="mr-2">

        <p><?php echo $_SESSION['staff-username']; ?></p>
      </div>

    </div>
  </div>

  <section>
   

	<div class="container">
		<div class="bg-info p-2 text-white">
            <h5><strong>Attention!</strong></h5>
            <ul>
                <li>Select the Subject and  Class  to add questions.</li>
                <li>Type in the question number and question.</li>
                <li>Type in the options in the choices box.</li>
                <li>Specify the correct option in the space provided.</li>
                <li>Click the Upload Question Button</li>
            </ul>
        </div>
        <hr>
			
			<?php if (isset($_SESSION['msg'])) : ?>
					<div class="alert alert-<?php echo $_SESSION['msg_type'] ?>">
						<?php echo $_SESSION['msg'];
						unset($_SESSION['msg']);
						?>
					</div>
				<?php endif ;?>
		
			<form method="post" action="add_cbt_questions.php">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="subject">Subject</label>
						<?php
						require_once './controller/subject_logic.php';
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

				<div class="col-md-3">
					<div class="form-group">
						<label for="student_class">Class</label>
						<?php
						require_once './controller/class_logic.php';
						$select_sql = "SELECT * FROM classes ORDER BY className ASC";
						$sql_result = $conn->query($select_sql);
						?>
						<select name="student_class" id="student_class" class="form-control " value>
							// using a while loop to iterate the class table
							<?php
							while ($row = $sql_result->fetch_assoc()) : ?>
								<option value="<?php echo $row['className'] ?>"><?php echo $row['className']; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
                        <label for="term">Term</label>

                            <select name="term" id="term" class="form-control ">
                                <option value="1st Term"> 1st Term </option>
                                <option value="2nd Term"> 2nd Term </option>
                                <option value="3rd Term"> 3rd Term </option>
                            </select>
                </div>

                <div class="col-md-3">
                        <label for="aSession">Session</label>

                            <select name="aSession" id="aSession" class="form-control ">
                                <option value="2021/2022"> 2021/2022 </option>
                                <option value="2022/2023"> 2022/2023</option>
                            </select>
                 </div>
			</div>
				<!-- question text and number-->

			<div class="row">

				<div class="col-md-3">
					<div class="form-group ">					
						<label>Question Number: </label>
						<input type="number" value="$next" name="question_number"  class="form-control "/ >
					</div>
				</div>

				<div class="col-md-9">
					<div class="form-group">
					
					<label>Question Text: </label>
					<input type="text" name="question_text" class="form-control " />
				
					</div>
				</div>
			</div>
		<!-- end of question txt and number-->

		<!-- Choices text and number-->

			<div class="row">

				<div class="col-md-3">
					<div class="form-group ">					
						<label>Choice #1: </label>
						<input type="text" name="choice1" class="form-control "/>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>Choice #2: </label>
						<input type="text" name="choice2"  class="form-control "/>						
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group ">					
						<label>Choice #3: </label>
						<input type="text" name="choice3" class="form-control "/>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>Choice #4: </label>
						<input type="text" name="choice4"  class="form-control "/>						
					</div>
				</div>
			</div>
		<!-- end of Choices txt and number-->
				
				
		<!-- Correct choice-->

			<div class="row">	
				<div class="col-md-3">
					<div class="form-group">		
						<label>Correct Choice Number: </label>
						<input type="number" name="correct_choice" class="form-control " />
					</div>
				</div> 
								
			</div>
			<div >
				<div class="form-group">		
					<input type="submit" name="submit" value="Upload Question" class="btn btn-primary" />
				</div>
			</div>
		</form>
		</div>
  </section>
  <hr>
  <?php include_once './model/inc/dashboard_footer.php'; ?>