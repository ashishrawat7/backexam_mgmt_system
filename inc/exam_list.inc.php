<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();
$sqli_query->isAdmin(); 

$error = $year_err = "";
if(!empty($_POST)){
	$year = $_POST['year'];
	if (empty($year)) {
		$year_err = 'All selected!';
	}elseif(!preg_match('/(\d){4}/', $year)) {
		$year_err = 'sothing went wrong!';
	}

	if((empty($year_err))){
		$exams = $sqli_query->getAllExamsByYear($year);
	}else{
		$exams = $sqli_query->getAllExams();
	}
}else{
	$exams = $sqli_query->getAllExams();
}

$semester_select = array();
$exam_years = $sqli_query->getExamYears();
$title = $heading = "Exams list";
$exams_menu_1 = $exams_menu = "active";