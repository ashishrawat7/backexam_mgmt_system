<?php 
require('inc/view_application.inc.php'); 
require_once('common/head.php'); ?>
<style type="text/css">
	@media print{
		.non-print{ display:none;}
		.clear-float {float:none !important; postition:relative !important; right:0px; !important; margin-left:30px}
        table{margin:0px; padding:0px}
        
	}
</style>
<style>
    table{margin:20px; padding:0px}
	table tr{font-size:17px;}
    table tr td {padding-left:10px;}
	.{font-weight:;}
	.print_btn{height:25px; width:75px; font-size:12px; }
</style>
    <body style="text-size:26px !important">
        <div id="wapper">
            <div>
                <table width="1000" border="1px solid black"> 
                    <tr>
                        <td width="100%" align="center" colspan="3">
                            <img src="img/logo.gif" style="margin: 10px 0px 10px 0px; height:80px;" >
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3' align="center" class=""> <h1> Back Exam Application form - 2016-17 </h1> </td>
                    </tr>
                <!-- header Section -->
                
                <!-- Body Section -->
                    <tr>
                        <td height:"120px" width="33%" class="" align="left">
                            Name : <strong><?php echo $student_details['first_name'].' '.$student_details['last_name']; ?></strong>
                        </td>
                        <td height:"120px" width="33%" class="" align="left">
                            Application No. : <strong><?php echo $application_details['id']; ?></strong>
                        </td>
                        <td width="33%" style="padding:5px;">
                            <img src="images/users/<?php echo $_SESSION['image']; ?>" style="height:120px; width:90px">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="" align="left"><h4>Basic Details</h4></td>
                    </tr>
                    <tr>
                        <td class="" align="left" height=80px>
                            Student Id : <strong><?php echo $_SESSION['username']; ?></strong>
                        </td>
                        <td class="" align="left">
                            Program : <strong><?php echo $student_details['program_code']." | ".$student_details['program_name']; ?></strong>
                        </td>
                    
                        <td width="50%" class=""  align="left">
                            Exam : <strong><?php echo $application_details['exam_id']; ?></strong>
                        </td>
                    </tr>
                    <tr>
                        <td class="" align="left">
                            Contact No :<strong><?php echo $student_details['contact_no']; ?></strong>
                        </td>
                        <td class="" align="left" height=80px colspan="2">
                            Dept. name : <strong><?php echo $student_details['department_name']; ?></strong>
                        </td>
                    </tr>
                    <tr>
                        <td class="" align="left" height="80px" colspan="3">
                            Total fee :<strong><?php echo $application_details['total_fee']; ?></strong>
                        </td>
                    </tr>
                    <?php 
                    $applied_details = $sqli_query->getAppliedCoursesByAppId($application_id);
                    if($applied_details){
                        foreach ($applied_details as $key => $value) {?>
                            <tr>
                                <td class="" align="left">
                                    <tr>
                                        <td class="" align="left" height="80px">
                                            Type :<strong><?php 
                                            if($value['type'] == '1'){
                                                echo "Repeat";
                                            }elseif($value['type'] == '2'){
                                                echo "Re-registration";
                                            } ?></strong>
                                        </td>
                                        <td class="" align="left">
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
                                        <td class="" align="left">
                                            fee :<strong><?php echo $value['fee']; ?></strong>
                                        </td>
                                    </tr>
                                </td>
                            </tr>
                            
                        <?php }
                    }
                    ?>
                    
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