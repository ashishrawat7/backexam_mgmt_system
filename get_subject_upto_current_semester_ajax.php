<?php
require_once("common/error.php");
require_once('class/class.inc.php');
$json = array();

$current_semester	= $_POST['current_semester'];
$program_id	= $_POST['program_id'];
$sqli_query = new SqlIQuery();

$html = "";

if($sqli_query->isLogIn()){
    $json['is_logged']='1';
    if($current_semester > '0'){
		$course_name_list = $sqli_query->getSubjectsUptoCurrentSemester($current_semester, $program_id);
		if(!empty($course_name_list)){
			$json['details'] = $course_name_list;
			$json['resp']='1';
		}else{
			$json['resp']='0';
			$json['details'] = "No Course available";
		}
	}else{
		$json['resp']='0';
		$html .='<tr id="empty">';
		$html .='<td colspan="20" class="text-center font-red">No results!</td>';
		$html .='</tr>';
	}
}else{
	$json['is_logged']='0';
}

echo json_encode($json);
?>