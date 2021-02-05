<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();
$application_ids = array();
if(!empty($_POST)){
	$exam_id = $_POST['exam_id'];
	if(!empty($exam_id)){
		$application_ids = $sqli_query->getApplicationId($exam_id);
	}
}

$exams = $sqli_query->getAllActiveAdmitcardExams();
$semester_select = array();
$title = $heading = "Get Admitcard";
$student_menu_2 = $student_menu = "active"
;