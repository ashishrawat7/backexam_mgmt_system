<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();
$sqli_query->isAdmin(); 

$first_name = $program_id = "";
if(!empty($_POST)){
	$first_name = $_POST['first_name'];
    $program_id =  $_POST['program_id'];
    
    if(preg_match('/[^a-z \ 0-9]/i', $first_name)){
        $first_name_err = "Only alphanumeric allows!";
    }else{
        $results = $sqli_query->searchStudentsByDetaile($_POST);
    } 
}else{
	$results = $sqli_query->getAllStudents();
}

$title = $heading = "Student list";
$student_mgmt_menu = $student_mgmt_menu_1 = "active";
$programs = $sqli_query->getAllPrograms();