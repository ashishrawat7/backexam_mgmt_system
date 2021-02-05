<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
//$sqli_query->isLogIn();

$current_password = $conf_password = $new_password = $error = "";

if(!empty($_POST)){
	$current_password = $_POST['current_password'];
	$conf_password = $_POST['conf_password'];
	$new_password = $_POST['new_password'];
	
	if(empty($current_password)){
		$error ='Please enter current password!';
	}else if(!$sqli_query->isCurrentPassword($current_password)){
		$error ='Incorrect current password!';
	}else if(empty($new_password)){
		$error ='Please enter new password!';
	}else if((strlen($new_password) < 4)) {
		$error ='Password length should be minimum of 4 characters!';
	}else if($new_password !== $conf_password){
		$error ='confirm password and new password not matched!';
	}else{
		if($data=$sqli_query->changePassword($new_password));
		$_SESSION['success'] = 1;
		header("Location: success.php");
		exit;
	}
}

$title = $heading = "Login";
