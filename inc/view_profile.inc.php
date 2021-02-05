<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();

if(!empty($_GET)){
	$user_id = $_GET['user'];
	$user_details = $sqli_query->getUserById($user_id);

	if($user_details){
	}else{
		echo "<h2>No Record Found!</h2>";
		echo "<a href='index.php'>return to home!</a>";
		exit;
	}
	
}else{
	echo "<h2>No Record Found!</h2>";
	echo "<a href='index.php'>return to home!</a>";
	exit;
}

$heading = $title = "Profile";
$title = $heading = "User Profile";
$student_mgmt_menu = $student_mgmt_menu_1 = "active";
