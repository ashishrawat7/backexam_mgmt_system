<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();
$sqli_query->isAdmin();

$exam_datenotic = $error = $post_selected_sems = $notification_text = '' ; 

if(!empty($_POST)){
	$notification_text = $_POST['notification_text'];
	if (empty($notification_text)) {
		$notification_text_err	 = 'Please enter notification!';
	}

	if(! (isset($notification_text_err))){
		$result = $sqli_query->createNotification($_POST);
		if($result){
			$notification_text = '';
			$_SESSION['success']='1';
		}else{
			$error = "Somthing went wrong! Please try again...";
		}
	}
}

$semester_select = array();
$title = $heading = "Create Notification";
//$exams_menu_9 = $exams_menu = "active";

$notifications_menu_1 = $notifications_menu = "active";