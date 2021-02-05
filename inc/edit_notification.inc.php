<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();
$sqli_query->isAdmin();

$notification_date = $error = $post_selected_sems = '' ; 

if(!empty($_GET)){
	$notification_id = $_GET['notification'];
	if(empty($notification_id)){
		echo "Somethin went wrong!";
		echo "<a href='index.php'>Click here</a> to return home!";
		exit;
	}elseif(!$notification_details = $sqli_query->getNotificationById($notification_id)){
		echo "<h1>Notification does not exist!</h1><br/> d";
		echo "<a href='index.php'>Click here</a> to return home!";
		exit;
	}
}elseif(!empty($_POST)){
	$notification_text = $_POST['notification_text'];
	$notification_id = $_POST['notification_id'];
	
	if (empty($notification_text)) {
		$notification_text_err = 'Please enter notification text!';
	}

	if(empty($notification_id)){
		echo "<h1>Notification does not exist!</h1><br/> d";
		echo "<a href='index.php'>Click here</a> to return home!";
		exit;
	}

	if(! (isset($notification_text_err)) ){
		$result = $sqli_query->updateNotification($_POST);
		if($result){
			echo "<h1>Notification modified succfully!</h1>";
			echo "<a href='notifications_list.php'>click here to return notifications list!</a>";
			exit;
		}else{
			$error = "Somthing went wrong! Please try again...";
		}
	}
}else{
	echo "Something went wrong! ";
	echo "<a href='index.php'>Click here</a> to return home!";
	exit;
}
$semester_select = array();
$title = $heading = "Edit Notification";
$notifications_menu_1 = $notifications_menu = "active";