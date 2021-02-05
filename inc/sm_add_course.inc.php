<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();
$sqli_query->isAdmin();

$schools_menu_1 = $schools_menu = "active";
$department_id =  $ack = $course_name = $course_code =  $error =$fee_per_semester = $no_of_semester = '';  

if(!empty($_POST)){    
	$course_code = $_POST['course_code'];
	$course_name = $_POST['course_name'];
	$department_id = $_POST['department_id'];
	$no_of_semester = $_POST['no_of_semester'];
	$fee_per_semester = $_POST['fee_per_semester'];

	if (($sqli_query->utf8_strlen($course_name) < 3) || ($sqli_query->utf8_strlen($course_name) > 100)) {
		$course_name_err = 'Course Name must be between 3 to 100 characters!';
	}

	if (($sqli_query->utf8_strlen($course_code) < 3) || ($sqli_query->utf8_strlen($course_code) > 12)) {
		$course_code_err = 'Course Code must be between 3 and 12 characters!';
	}elseif ( !preg_match ("/^[A-Z]+[A-Z0-9-]/", $course_code)) {
	    $course_code_err = "Course Code must not be started with numbers and small case, spaces not allowd!";
	}elseif($sqli_query->isExistCourseCode($course_code)){
	    $course_code_err = "Course Code already used!";
	}

	if((empty($department_id)) || ($department_id == '0')){
		$department_err = "Please select department!";
	}elseif (!preg_match ("/^[0-9]/", $department_id)) {
	    $department_err = "Course Code must not be started with numbers and small case, spaces not allowd!";
	}

	if(! (isset($course_name_err) || isset($course_code_err) || isset($department_err))){
		$sqli_query->addCourse($_POST);
		$_SESSION['success']="1";
		//header("Location: course_list.php");
		//exit();
	}
}
$departments = $sqli_query->getAllDepartments();
$title = $heading = "Add Course";