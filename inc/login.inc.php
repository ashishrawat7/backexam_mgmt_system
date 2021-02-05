<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogOut();

$username = "";
$error_warning = "";

if(isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(empty($_POST['username']) || empty($_POST['password'])){
		$error_warning ='Blank registration_id and/or Password.';
	}else{
		$data=$sqli_query->login($_POST['username'],$_POST['password']);
		
		if($data){
			$message = $_SESSION['username']." Login, IP - ".$_SERVER['REMOTE_ADDR'];
			$sqli_query->writeOnLog($message);
			header("Location: success.php");
			exit;
		}else{
			$error_warning='No match for registration_id and/or Password.';
			$message=$_POST['username']." Attempting to invalid Login, IP - ".$_SERVER['REMOTE_ADDR'];
			$sqli_query->writeOnLog($message);
		}
	}
}

$title = $heading = "Login";
