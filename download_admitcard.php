<?php 
require('inc/download_admitcard.inc.php'); 
require_once('common/head.php'); ?>
<style type="text/css">
	@media print{
		.non-print{ display:none;}
		.clear-float {float:none !important; postition:relative !important; right:0px; !important;}
        table{margin:0px; padding:0px}
        
	}
</style>
<style>
    table{margin:20px; padding:0px}
	table tr{font-size:14px;}
    table tr td {padding-left:10px;}
	.{font-weight:;}
	.print_btn{height:25px; width:75px; font-size:12px; }
</style>
    <body style="text-size:26px;">
        <div id="wapper">
            <div>
                <table width="1024" border="1px solid black"> 
                    <tr>
                        <td width="100%" align="center" colspan="3">
                            <img src="img/logo.gif" style="margin: 10px 0px 10px 0px; height:80px;" >
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3' align="center" class=""> <h2> Sam Higginbottom University of Agriculture, Technology and Sciences</h2>
                            <h3>Back Exam Admitcard</h3> </td>
                    </tr>
                <!-- header Section -->
                
                <!-- Body Section -->
                    <tr>
                        <td height:"120px" width="30%" align="left">
                            Name : <strong><?php echo $admitcard_details['student_details']['first_name'].' '.$admitcard_details['student_details']['last_name']; ?></strong>
                        </td>
                        <td height:"120px" width="36%" align="left">
                            Application No. : <strong><?php echo $application_id; ?></strong>
                        </td>
                        <td width="33%" style="padding:5px;">
                            <img src="images/users/<?php echo $admitcard_details['student_details']['image']; ?>" style="height:120px; width:90px">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="left"><h4>Basic Details</h4></td>
                    </tr>
                    <tr>
                        <td align="left" height=80px>
                            Student Id : <strong><?php echo $admitcard_details['student_details']['username']; ?></strong>
                        </td>
                        <td align="left">
                            Program : <strong><?php echo $admitcard_details['student_details']['program_code']." | ".$admitcard_details['student_details']['program_name']; ?></strong>
                        </td>
                    
                        <td align="left">
                            Exam id/exam date: <strong><?php echo $admitcard_details['course_details']['0']['exam_id']." - ".$admitcard_details['course_details']['0']['exam_date']; ?></strong>
                        </td>
                    </tr>
                    <?php 
                    
                    if($admitcard_details['course_details']){
                        foreach ($admitcard_details['course_details'] as $key => $value) {?>
                            <tr>
                                <td align="left" colspan="3">
                                    <tr>
                                        <td align="left" height="50px" width="33%">
                                            Course name :<strong><?php 
                                            echo $value['course_name'];
                                            ?></strong>
                                        </td>
                                        <td align="left" height="50px" width="33%">
                                            Type :<strong><?php 
                                            if($value['type'] == '1'){
                                                echo "Repeat";
                                            }elseif($value['type'] == '2'){
                                                echo "Re-registration";
                                            } ?></strong>
                                        </td>
                                        <td align="left" width="33%">
                                            of :<strong><?php 
                                            if($value['exam'] == '3'){
                                                echo "Written";
                                            }elseif($value['exam'] == '4'){
                                                echo "Practical";
                                            }elseif($value['exam'] == '5'){
                                                echo "Project";
                                            }else if($value['exam'] == '0'){
                                                echo "All";
                                            }
                                            ?></strong>
                                        </td>
                                    </tr>
                                </td>
                            </tr>
                            
                        <?php }
                    }
                    ?>
                    <tr>
                        <td align="left" height=80px colspan="3">
                            <h5><b>IMPORTANT DIRECTIONS FOR STUDENTS</b></h5>
                            <ol> 
                                <li>Student should report at the examination hall 15 minutes before the commencement of examination. Student will not be allowed to enter the
                                Examination Hall after the commencement of the examination under any circumstances in each paper.
                                </li>
                                
                                <li>Student without having proper admit card and photo id proof shall not be allowed in the examination.</li>
                                <li>student shall not be allowed to leave the examination hall before the conclusion of examination, without signing the attendance sheet.</li>
                                    
                                <li>Student shall not remove any page(s) from the Test Booklet and if any page(s) is/are found missing from his/her Test Booklet he/she is liable for suitable
                                action under Unfair Means.</li>
                                <li>Student should use blue/black ball point pen only to write/fill his/her particulars on Test Booklet and OMR Sheet. Use of PENCIL, WHITE FLUID &OVER
                                WRITING / CUTTING on TEST BOOKLET is STRICTLY PROHIBITED.</li>
                                
                                <li>STUDENT MUST CARRY: 1.DOWNLOADED ADMIT CARD 2.College ID card</li>
                            </ol>
                        </td>
                        
                    </tr>
                </table>
                <table class="non-print">
                    <tr>
                        <td align="center" style="padding:20px;">
                            <a href="index.php">Back to home</a>
                        </td>
                        <td align="center" style="padding:20px;">
                            <button  onclick="window.print()" class="print_btn">Print</button>
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </body>
</html>