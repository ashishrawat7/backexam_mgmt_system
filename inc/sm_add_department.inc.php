<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();
$sqli_query->isAdmin();

$school_id =  $ack = $department_name = $department_code =  $error = '';  

if(!empty($_POST)){
	$department_code = $_POST['department_code'];
	$department_name = $_POST['department_name'];
	$school_id = $_POST['school_id'];

	if (($sqli_query->utf8_strlen($department_name) < 3) || ($sqli_query->utf8_strlen($department_name) > 100)) {
		$department_name_err = 'Department Name must be between 3 to 100 characters!';
	}

	if (($sqli_query->utf8_strlen($department_code) < 3) || ($sqli_query->utf8_strlen($department_code) > 12)) {
		$department_code_err = 'Department Code must be between 3 and 12 characters!';
	}elseif ( !preg_match ("/^[A-Z]+[A-Z0-9-]/", $department_code)) {
	    $department_code_err = "Department Code must not be started with numbers and small case, spaces not allowd!";
	}elseif($sqli_query->isExistDepartmentCode($department_code)){
	    $department_code_err = "Department Code already used!";
	}

	if((empty($school_id)) || ($school_id == '0')){
		$school_err = "Please select school!";
	}elseif (!preg_match ("/^[0-9]/", $school_id)) {
	    $school_err = "Department Code must not be started with numbers and small case, spaces not allowd!";
	}

	if(! (isset($department_name_err) || isset($department_code_err) || isset($school_err))){
		$sqli_query->addDepartment($_POST);
		$_SESSION['success']="1";
		//header("Location: department_list.php");
		exit();
	}
}
$schools = $sqli_query->getAllSchools();
$title = $heading = "Add Department";
$schools_menu_3 = $schools_menu = "active";