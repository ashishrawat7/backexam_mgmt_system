<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();
$sqli_query->isAdmin();

$ack = $school_name = $school_code =  $error = '';  

if(!empty($_POST)){
	$school_code = $_POST['school_code'];
    $school_name = $_POST['school_name'];
        
	if (($sqli_query->utf8_strlen($school_name) < 3) || ($sqli_query->utf8_strlen($school_name) > 100)) {
		$school_name_err = 'School Name must be between 3 to 100 characters!';
	}

	if (($sqli_query->utf8_strlen($school_code) < 3) || ($sqli_query->utf8_strlen($school_code) > 12)) {
		$school_code_err = 'School Code must be between 3 and 12 characters!';
	}elseif ( !preg_match ("/^[A-Z]+[A-Z0-9-]/", $school_code)) {
	    $school_code_err = "School Code must not be started with numbers and small case, spaces not allowd!";
	}elseif($sqli_query->isExistSchoolCode($school_code)){
	    $school_code_err = "School Code already used!";
	}

	if(! (isset($school_name_err) || isset($school_code_err))) {
		
		$sqli_query->addSchool($_POST);		
		$_SESSION['success']="1";
		//header("Location: school_list.php");
		exit();
	}
}

$title = $heading = "Add School";
$schools_menu_4 = $schools_menu = "active";
?>