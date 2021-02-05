<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();
$sqli_query->isAdmin();

$exam_date = $error = $post_selected_sems = '' ; 

if(!empty($_GET)){
	$exam_id = $_GET['exam'];
	if(empty($exam_id)){
		echo "Somethin went wrong!";
		echo "<a href='index.php'>Click here</a> to return home!";
		exit;
	}elseif($exam_details = $sqli_query->getExamById($exam_id)){
		$exam_date = $exam_details['exam_create_details']['exam_date'];
		$exam_date = date('d-m-Y', strtotime($exam_details['exam_create_details']['exam_date']));
	}else{
		echo "<h1>Exam does not exist!</h1><br/> d";
		echo "<a href='index.php'>Click here</a> to return home!";
		exit;
	}
}elseif(!empty($_POST)){
	
	$exam_id=$_POST['exam_id'];
	$exam_date = $_POST['exam_date'];
	if (empty($exam_date)) {
		$exam_date_err = 'Please enter exam date!';
		echo "<h1>Please enter exam date! try again</h1>";
		echo "<a href='exam_list.php'>click here to return exams list!</a>";
		exit;
	}elseif(!preg_match('/(\d){2}-(\d){2}-(\d){4}/', $exam_date)) {
		$exam_date_err = 'Invalid date!';
		$semseter_select_err = "Please select semesters!";
		echo "<h1>Invalid date try again...</h1>";
		echo "<a href='exam_list.php'>click here to return exams list!</a>";
		exit;
	}

	if(!isset($_POST['semester_select'])){
		$semseter_select_err = "Please select semesters!";
		echo "<h1>Select minimum one program-semsester and try again...</h1>";
		echo "<a href='exam_list.php'>click here to return exams list!</a>";
		exit;
	}

	if(! (isset($exam_date_err) || isset($semseter_select_err) )){
		$result = $sqli_query->updateExam($_POST);
		if($result){
			echo "<h1>Exam modified succfully!</h1>";
			echo "<a href='exam_list.php'>click here to return exams list!</a>";
			exit;
		}else{
			$error = "Somthing went wrong! Please try again...";
		}
	}elseif(!empty($exam_id)){
		if($exam_details = $sqli_query->getExamById($exam_id)){
			$exam_date = $exam_details['exam_create_details']['exam_date'];
			$exam_date = date('d-m-Y', strtotime($exam_details['exam_create_details']['exam_date']));
		}else{
			echo "<h1>Exam does not exist!</h1><br/> d";
			echo "<a href='index.php'>Click here</a> to return home!";
			exit;
		}
	}
}else{
	echo "Somethin went wrong! ";
	echo "<a href='index.php'>Click here</a> to return home!";
	exit;
}
$programs = $sqli_query->getAllPrograms();
$semester_select = array();
$title = $heading = "Edit Exam";
$exams_menu_1 = $exams_menu = "active";