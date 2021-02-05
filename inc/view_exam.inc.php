<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();
$sqli_query->isAdmin();

$exam_date = $error = $post_selected_sems = $admitcard_date = '' ; 

if(!empty($_GET)){
	$exam_id = $_GET['exam'];
	if(empty($exam_id)){
		echo "Somethin went wrong!";
		echo "<a href='index.php'>Click here</a> to return home!";
		exit;
	}elseif($exam_details = $sqli_query->getExamById($exam_id)){
		if(!empty($exam_details['exam_create_details']['admitcard_date'])){
			$admitcard_date = date('d-M-Y', strtotime($exam_details['exam_create_details']['admitcard_date']));
		}else{
			$admitcard_date = "Date not set!";
		}
		
		$exam_date = date('d-M-Y', strtotime($exam_details['exam_create_details']['exam_date']));
	}else{
		echo "<h1>Exam does not exist!</h1><br/>";
		echo "<a href='index.php'>Click here</a> to return home!";
		exit;
	}
}

$semester_select = array();
$title = $heading = "View Exam";
$exams_menu_1 = $exams_menu = "active";