<?php
require_once 'dbase_conn.php';
include_once 'function.php';
$subject = "";
$class = "";






if (isset($_POST['cbt_int'])) {

    $subject = test_input($_POST['subject']);
    $number =  1;
     
    $_SESSION['subject'] = $subject;
    $_SESSION['number'] = $number;
    
    
    
    header("location:cbt_quest.php");
    exit();
}

// logic to add question and choices

	if(isset($_POST['submit'])){
		//Get post variables
        $subject = test_input($_POST['subject']);
        $class = test_input($_POST['student_class']);
		$question_number = test_input($_POST['question_number']);
		$question_text = ($_POST['question_text']);
		$correct_choice = test_input($_POST['correct_choice']);

       
		
        //Choices array
		$choices = array();
		$choices[1] = ($_POST['choice1']);
		$choices[2] = ($_POST['choice2']);
		$choices[3] = ($_POST['choice3']);
		$choices[4] = ($_POST['choice4']);
        
		
		
		//Question query
		$query = "INSERT INTO `cbt_questions`(question_no, subject, class, text)
					VALUES('$question_number', '$subject', '$class','$question_text')";
					
		//Run query
		$insert_question = $conn->query($query) or die($conn->error.__LINE__);
		
		//Validate insert
		if($insert_question){
			foreach($choices as $choice => $value){
				if($value != ''){
					if($correct_choice == $choice){
						$is_correct = 1;
					} else {
						$is_correct = 0;
					}
					//Choice query
					$query = "INSERT INTO `cbt_choices` (question_no, is_correct, text, subject, class)
							VALUES ('$question_number','$is_correct','$value', '$subject', '$class')";
							
					//Run query
					$insert_choices =$conn->query($query) or die($conn->error.__LINE__);
					
					//Validate insert
					if($insert_choices){
						continue;
					} else {
						die('Error : ('.$conn->errno . ') '. $conn->error);
					}
				}
			}
			$msg = 'Question has been added';
			$_SESSION['msg'] = $msg;
			$_SESSION['msg_type'] = "success";
			
		}
	}

	/*
 	* Get total questions
	
	$query = "SELECT * FROM cbt_questions 
	WHERE class = '$class' && subject = '$subject'";
	//Get The Results
	$questions = $conn->query($query) or die($conn->error.__LINE__);
	$total = $questions->num_rows;
	$next = $total+1;
	
	*/

/*/////////////////////////////////logic to submit choices /////////////////////////////*/
if(!isset($_SESSION['score'])){
	$_SESSION['score'] = 0;
}
if(isset($_POST['submit_test'])){
	$class = $_SESSION['student_class'];
	$choices = $_POST['choice'];
	$number = $_POST['number'];
	$next = $number+1;
	$subject = $_SESSION['subject'];
	

	/*
		*	Get total questions
		*/
		$query = "SELECT * FROM `cbt_questions` 
      WHERE class = '$class' && subject = '$subject'";
		//Get result
		$results = $conn->query($query) or die($conn->error.__LINE__);
		$total = $results->num_rows;
		
		
		/*
		*	Get correct choice
		*/
		
		$sql_choice = "SELECT * FROM cbt_choices
      WHERE class = '$class' && subject = '$subject' && question_no = '$number' ";
					
		//Get result
		$result = $conn->query($sql_choice) or die($conn->error.__LINE__);
		
		//Get row
		$row = $result->fetch_assoc();
		
		//Set correct choice
		$correct_choice = $row['id'];
		
		
		//Compare
		if($correct_choice == $choices){
			//Answer is correct
			$_SESSION['score']++;
		
		}

		//Check if last question
		if($number == $total){
			header("Location: cbt_result.php");
		
			exit();
		} else {
			header("Location: cbt_quest.php?page=".$next);
		}
	
	
}