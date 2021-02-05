<?php 
require('inc/apply_exam.inc.php'); 
require_once('common/head.php'); ?>
<style>
    #notification-msg{
        position: absolute;
    }
</style>
    <body>
        <div id="wapper">
            <?php require_once('common/header.php'); //header ?>
            <div class="container-fluid main-container">
                <?php require_once('common/left_menu.php'); //navigation ?>
                    <div class="col-md-10 content">
                        <div class="panel panel-default">
                            <div class="panel-heading"><?php echo $heading; ?></div>
                                <div class="panel-body content-body">
                                    <form class="form-horizontal" method="post" action="apply_exam.php">
                                    <div id="notification-msg"></div>
                                        <?php /* if($error){
                                                    echo "<div class='alert alert-danger'>";
                                                    echo $error;
                                                    echo "</div>";
                                                }if($ack == 1){
                                                    echo "<div class='alert alert-success'>Program added successfully!</div>";
                                                }else if($ack ==2){  echo "<div class='alert alert-warning'>Faild to add new book!</div>";} */
                                        ?>
                                        <div class="row ">
                                            <div class="col-md-5 col-md-offset-1">
                                                <label for="program_name" class="col-sm-5 control-label">Student Name :</label>
                                                <div class="col-sm-7">
                                                    <label class="col-sm-12 control-label align-left text-info"><?php echo $student_details['first_name']." ".$student_details['last_name']; ?></label>
                                                    <input type="hidden" id="program_id" value="<?php echo $student_details['program_id'];?>">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-5">
                                                <label for="program_name" class="col-sm-5 control-label">Registration Id :</label>
                                                <div class="col-sm-7">
                                                    <label class="col-sm-12 control-label align-left text-info"><?php echo $student_details['username']; ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row ">
                                            <div class="col-md-5 col-md-offset-1">
                                                <label for="program_name" class="col-sm-5 control-label">Program :</label>
                                                <div class="col-sm-7">
                                                    <label class="col-sm-12 control-label align-left text-info"><?php echo $student_details['program_code']." | ".$student_details['program_name']; ?></label>
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <label for="program_name" class="col-sm-5 control-label">Departmant :</label>
                                                <div class="col-sm-7">
                                                <label class="col-sm-12 control-label align-left text-info"><?php echo $student_details['department_name']; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>                                        
                                        <div class="row ">
                                            <div class="col-md-5 col-md-offset-1">
                                                <label for="program_name" class="col-sm-5 control-label">Select exam :</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" name="exam_id">
                                                        <option value="0">--- Please Select ---</option>
                                                        <?php 
                                                         foreach($exam_select AS $exam){
                                                            echo "<option value='".$exam['exam_id']."'";
                                                            echo ">".($exam['exam_date'])."</option>";
                                                        } ?>
                                                        <!-- <?php /* foreach($courses as $course_1){ ?>
                                                            <option value=<?php echo $course_1['course_code']; if($course_1['course_code'] == $course_code){echo " selected";} ?> ><?php echo $course_1['course_name']; ?></option>
                                                        <?php } */ ?>  -->                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <label for="Current semseter" class="col-sm-5 control-label">Current semseter :</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control current_semester" name="current_semester" id="current_semester">
                                                        <option value="0">--- Please Select ---</option>
                                                        <?php 
                                                        for($i=0; $i<$student_details['no_of_semester']; $i++){ 
                                                            echo "<option value='".($i+1)."'";
                                                            if(($i+1) == $current_semester){
                                                                echo " selected";
                                                            }
                                                            echo ">".($i+1)."</option>";
                                                        }?>
                                                        <!-- <?php /* foreach($courses as $course_1){ ?>
                                                            <option value=<?php echo $course_1['course_code']; if($course_1['course_code'] == $course_code){echo " selected";} ?> ><?php echo $course_1['course_name']; ?></option>
                                                        <?php } */ ?>  -->                                                       
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <br/>

                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="col-sm-12">
                                                    <table id="courses_table" class="table"></table>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-5">
                                                <div class="col-sm-12">
                                                    <button type="button" class="btn btn-md btn-block btn-default" style="display:none;" id="add_course"><b>-|-</b> add more</button>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-12 text-center">                                                
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <!-- row -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php require_once('common/footer.php')?>
        </div>
    </body>
    <!-- <script src="js\common-main.js"></script> -->
    <!-- <script src="js\jquery.min.js"></script> -->
</html>
