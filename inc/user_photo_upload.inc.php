<?php
require_once("common/error.php");
require_once('class/class.inc.php');
if(!isset($_SESSION['user_id'])){
	echo "<h1>Something went wrong!</h1>";
	echo "<a href='login.php'>click here to login</a>";
	exit;
}

$sqli_query = new SqlIQuery();
if( (!isset($_SESSION['user_id'])) && (isset($_SESSION['is_login'])) ){
	echo "you are logged in!";
}

if(!empty($_POST)){
	$user_id = $_SESSION['user_id'];
	$username = $_SESSION['username'];
	$image = basename($_FILES["image"]["name"]);
	$extension = pathinfo($image,PATHINFO_EXTENSION);
	
	if (empty($image)) {
		$error_image = 'Please Select an Image!';
		
	}elseif ( !(( $extension == "png") || ($extension == "jpg") || ($extension == "jpeg"))) {
		$error_image = 'Not a valid Image type!';
		
	}elseif(!($_FILES['image']['size'] > 19456 && $_FILES['image']['size'] < 52224)){
		$error_image = 'Image size must between 20 to 50 kb!';
		
	}
	
	if(!(isset($error_image))) {
		$target_path = "images/users/";
		$image_filename = $user_id.time().".".$extension;
		$newfilename = $target_path.$image_filename;
		if(move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename)){
			$sqli_query->updateUserImage($image_filename);
			echo "<h1>Photo uploded successfully!</h1>";
			echo "<a href='login.php'>click here to login</a>";
			unset($_SESSION);
			session_destroy();
			exit;
		}else{
			echo "<h2>Failed to upload image!</h2>";
		}			
	}
}

$title = $heading = "User photo upload";