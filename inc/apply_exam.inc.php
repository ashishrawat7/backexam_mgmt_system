<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();

$exam_date = $error = $current_semester = $courses[] = '';

if(!empty($_POST)){
	$b = array();
	$b = array_slice($_POST,2);
	$a = array();
	/* if (empty($exam_date)) {
		$exam_date_err = 'Please enter exam date!';
	}elseif(!preg_match('/(\d){2}-(\d){2}-(\d){4}/', $exam_date)) {
		$exam_date_err = 'Invalid date!';
	} */

	if(!isset($_POST['semester_select'])){
		$semseter_select_err = "Please select semesters!";
	}
	$application_id = $sqli_query->apply_exam($_POST);
	
	if($application_id){
		header("Location: view_application.php?application=".$application_id);
	}else{
		$error = "Somthing went wrong! Please try again...";
	}
	/* if(! (isset($exam_date_err) || isset($semseter_select_err) )){
		
		if($result){
			$_SESSION['success']='1';
		}else{
			
		}
	} */
}
$student_details = $sqli_query->getStudentDetailsById();

$semester_select = array();
$exam_select = array();
$exam_select = $sqli_query->getAllActiveExams();
$title = $heading = "Apply exam";
$student_menu_1 = $student_menu = "active";