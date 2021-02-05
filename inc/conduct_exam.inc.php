<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();
$sqli_query->isAdmin();

$exam_date = $error = $post_selected_sems = '' ; 

if(!empty($_POST)){
	$exam_date = $_POST['exam_date'];
	
	if (empty($exam_date)) {
		$exam_date_err = 'Please enter exam date!';
	}elseif(!preg_match('/(\d){2}-(\d){2}-(\d){4}/', $exam_date)) {
		$exam_date_err = 'Invalid date!';
	}

	if(!isset($_POST['semester_select'])){
		$semseter_select_err = "Please select semesters!";
	}else{
		$post_selected_sems = $_POST['semester_select'];
	}

	if(! (isset($exam_date_err) || isset($semseter_select_err) )){
		$result = $sqli_query->createExam($_POST);
		if($result){
			$_SESSION['success']='1';
			$exam_date = $post_selected_sems = "";
		}else{
			$error = "Somthing went wrong! Please try again...";
		}
	}
}

$semester_select = array();
$programs = $sqli_query->getAllPrograms();
$title = $heading = "Create Exam";
$exams_menu_4 = $exams_menu = "active";