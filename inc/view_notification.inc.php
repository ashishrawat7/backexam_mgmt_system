<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();
$sqli_query->isAdmin();

$error = '';
if(!empty($_GET)){
	$notification_id = $_GET['notification'];
	if(empty($notification_id)){
		echo "Somethin went wrong!";
		echo "<a href='index.php'>Click here</a> to return home!";
		exit;
	}elseif(!$notification_details = $sqli_query->getNotificationById($notification_id)){
		echo "<h1>Notification does not exist!</h1><br/>";
		echo "<a href='index.php'>Click here</a> to return home!";
		exit;
	}
}else{
	echo "<h1>Notification does not exist!</h1><br/>";
	echo "<a href='index.php'>Click here</a> to return home!";
	exit;
}

$semester_select = array();
$title = $heading = "View Notification";
$notifications_menu_1 = $notifications_menu = "active";