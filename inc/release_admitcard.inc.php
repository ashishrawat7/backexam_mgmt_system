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
		
		if(!empty($exam_details['exam_create_details']['exam_date'])){
			$exam_date = date('j-m-Y', strtotime($exam_details['exam_create_details']['exam_date']));
		}else{
			$exam_date = "";
		}
		if(!empty($exam_details['exam_create_details']['start_admitcard_date'])){
			$start_date = date('j-m-Y', strtotime($exam_details['exam_create_details']['start_admitcard_date']));
		}else{
			$start_date = "";
		}

		if(!empty($exam_details['exam_create_details']['end_admitcard_date'])){
			$end_date = date('j-m-Y', strtotime($exam_details['exam_create_details']['start_admitcard_date']));
		}else{
			$end_date = "";
		}
		
	}else{
		echo "<h1>Exam does not exist!</h1><br/>";
		echo "<a href='index.php'>Click here</a> to return home!";
		exit;
	}
}elseif(!empty($_POST)){
	
	$exam_date = $_POST['exam_date'];
	$exam_id = $_POST['exam_id'];
	
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];

	if(isset($_POST['start_date'])){
		if(empty($_POST['start_date'])){
			$start_date_err = "Please enter date!";
		}elseif(!preg_match('/(\d){2}-(\d){2}-(\d){4}/', $_POST['start_date'])) {
		//}elseif(!preg_match('/(1-31)-(1-12)-(2000-2050)/', $_POST['start_date'])) {
			$start_date_err = "invalide date!";
		}
	}

	if(isset($_POST['end_date'])){
		if(empty($_POST['end_date'])){
			$end_date_err = "Please enter date!";
		}elseif(!preg_match('/(\d){2}-(\d){2}-(\d){4}/', $_POST['end_date'])) {
		//}elseif(!preg_match('/(1-31)-(1-12)-(2000-2050)/', $_POST['start_date'])) {
			$end_date_err = "invalide date!";
		}		
	}

	if((!isset($exam_id)) || (empty($exam_id))){
		//$sqli_query->getExamById($exam_id)
		echo "Somethin went wrong!";
		echo "<a href='index.php'>Click here</a> to return home!";
		exit;
	}
	if(empty($start_date_err) && empty($end_date_err)){
		echo "ok";
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		
		if($sqli_query->setAdmitcardDate($exam_id, $start_date, $end_date)){
			echo "Admitcard changed succefully!";
			echo "<a href='exam_list.php'>Click here</a> to return exam list!";
			exit;
		}else{
			echo "Something went wrong!";
			echo "<a href='index.php'>Click here</a> to return home!";
			exit;	
		}
	}
}
else{
	echo "<h1>Exam does not exist!</h1><br/>";
	echo "<a href='index.php'>Click here</a> to return home!";
	exit;
}

$semester_select = array();
$title = $heading = "Release Admitcard";
$exams_menu_1 = $exams_menu = "active";