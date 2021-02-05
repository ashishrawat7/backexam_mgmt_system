<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();
$sqli_query->isAdmin();

$department_id =  $ack = $program_name = $program_code =  $error =$fee_per_semester = $no_of_semester = $no_of_sem = '';  

if(!empty($_POST)){    
	$program_code = $_POST['program_code'];
	$program_name = $_POST['program_name'];
	$department_id = $_POST['department_id'];
	$no_of_semester = $_POST['no_of_semester'];
	$fee_per_semester = $_POST['fee_per_semester'];

	if (($sqli_query->utf8_strlen($program_name) < 3) || ($sqli_query->utf8_strlen($program_name) > 100)) {
		$program_name_err = 'Programme Name must be between 3 to 100 characters!';
	}

	if (($sqli_query->utf8_strlen($program_code) < 3) || ($sqli_query->utf8_strlen($program_code) > 12)) {
		$program_code_err = 'Programme Code must be between 3 and 12 characters!';
	}elseif ( !preg_match ("/^[A-Z]+[A-Z0-9-]/", $program_code)) {
	    $program_code_err = "Programme Code must not be started with numbers and small case, spaces not allowd!";
	}elseif($sqli_query->isExistProgrammeCode($program_code)){
	    $program_code_err = "Programme Code already used!";
	}

	if((empty($department_id)) || ($department_id == '0')){
		$department_err = "Please select department!";
	}elseif (!preg_match ("/^[0-9]/", $department_id)) {
	    $department_err = "Programme Code must not be started with numbers and small case, spaces not allowd!";
	}

	if(! (isset($program_name_err) || isset($program_code_err) || isset($department_err))){
		$sqli_query->addProgram($_POST);
		$_SESSION['success']="1";
		header("Location: program_to_course.php?no_of_sam=".$no_of_semester);
		
		exit();
	}
}
$departments = $sqli_query->getAllDepartments();
$title = $heading = "Add Programme";
$schools_menu_2 = $schools_menu = "active";