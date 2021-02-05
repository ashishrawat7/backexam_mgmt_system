<?php
require_once("common/error.php");
require_once('class/class.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();
$sqli_query->isAdmin(); 

$first_name = $program_id = $exam_id = "";
if(!empty($_POST)){
	$first_name = $_POST['first_name'];
    $program_id =  $_POST['program_id'];
    $exam_id =  $_POST['exam_id'];
    
    if(preg_match('/[^a-z \ 0-9]/i', $first_name)){
        $first_name_err = "Only alphanumeric allows!";
    }else if(empty($exam_id)){
        $exam_err = "select exam!";
    }else{
        $results = $sqli_query->searchApplicationByDetaile($_POST);
        
    }
}
$exams = $sqli_query->getAllExams();

$programs = $sqli_query->getAllPrograms();

$heading = $title = "Applications list";
$exams_menu_5 = "active";
$exams_menu = "active";
