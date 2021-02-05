<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();

$exam_date = $error = $current_semester = $courses[] = '';
if(!empty($_GET)){
	$student_details = $sqli_query->getStudentDetailsById();
	
	$application_id = $_GET['application'];
	if(empty($application_id)){
		echo "Something went wrong!";
		echo "<a href='index.php'>Click here</a> to return home!";
		exit;
	}elseif($admitcard_details = $sqli_query->getAdmitcard($application_id, -1)){
		//$sqli_query->echo_pre($admitcard_details);
	}else{
		echo "<h1>Admitcard not found!</h1><br/>";
		echo "<a href='index.php'>Click here</a> to return home!";
		exit;
	}
}

$title = $heading = "download admitcard";
$student_menu_1 = $student_menu = "active";