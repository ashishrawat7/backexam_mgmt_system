<?php
require_once("common/error.php");
require_once('class/class.inc.php');
$json = array();

$course_id	= $_POST['course_id'];
$sqli_query = new SqlIQuery();

$html = "";

if($sqli_query->isLogIn()){
    $json['is_logged']='1';
    if($course_id >= '0'){
		$course_structure = $sqli_query->getCourseStructureById($course_id);
		
		if(!empty($course_structure)){
            $program_id = $course_structure['program_id'];
            $semester = $course_structure['semester'];
			$total_credit = $sqli_query->totalCreditOfSemester($program_id, $semester);
			
			$fee_per_credit = (float)$course_structure['fee_per_semester']/(float)$total_credit;

			$re_registration_fee = $fee_per_credit * (float)$course_structure['total_credit'];

			$course_structure['fee_per_credit'] = $fee_per_credit;
			$course_structure['re_registration_fee'] = $re_registration_fee;
			$data = $course_structure;
			$json['resp']='1';
			$json['result']=$data;
		}else{
			$json['resp']='0';
			$html .='No record found!';
			$json['html']=$html;
		}
	}else{
		$json['resp']='0';
		$html .='please select course!';
		$json['html']=$html;
	}
}else{
	$json['is_logged']='0';
}

echo json_encode($json);
?>