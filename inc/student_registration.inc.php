<?php
require_once("common/error.php");
require_once('class/class.inc.php');


$sqli_query = new SqlIQuery();
$sqli_query->isLogOut();
//$sqli_query->isAdmin();

$program_id =  $ack = $registration_id = $first_name = $last_name = $contact_no = $password = $confirm_password = $error_warning = $name = $email = '';  

if(!empty($_POST)){
    $username = $_POST['username'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$contact_no = $_POST['contact_no'];
	$email = $_POST['email'];
	$program_id = $_POST['program_id'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];	

	if (empty($username)) {
		$username_err = '**enter registration id!';
	}

	if (empty($first_name)) {
		$first_name_err = '**enter first name!';
	}

	if (empty($last_name)) {
		$last_name_err = '**enter last name!';
	}

	if((empty($program_id)) || ($program_id == '0')){
		$program_err = "**select Program!";
	}
	
	if((empty($contact_no)) || ($contact_no == '0')){
		$contact_err = "**enter contact number!";
	}

	if((empty($email)) || ($email == '0')){
		$email_err = "**enter email id!";
	}
	
	if((empty($password)) || ($password == '0')){
        $password_err = "**enter password!";
    }
    
    if(strcmp($password, $confirm_password)){
        $confirm_password_err = "**password and confirm password not matched!";
    }

	if(! (isset($first_name_err) || isset($last_name_err) || isset($program_err) || isset($contact_err) || isset($confirm_password_err))){
		$student_id = $sqli_query->addUser($_POST);
		if($student_id){
			$_SESSION['register_success'] = true;			
			header("Location: register_success.php");
			//header("Location: student_photo_upload.php?of=".$sqli_query->addUser($_POST));
			exit;
		}		
    }
}
$programs = $sqli_query->getAllPrograms();
$title = $heading = "Student Registration";