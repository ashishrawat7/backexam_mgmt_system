<?php 
require('inc/sm_add_course.inc.php'); 
require_once('common/head.php'); ?>
    <body>
        <div id="wapper">
            <?php require_once('common/header.php'); //header ?>
            <div class="container-fluid main-container">
                <?php require_once('common/left_menu.php'); //navigation ?>
                    <div class="col-md-10 content">
                        <div class="panel panel-default">
                            <div class="panel-heading"><?php echo $heading; ?></div>
                                <div class="panel-body content-body">
                                    <form class="form-horizontal" method="post" action="sm_add_course.php">
                                        <?php if($error){
                                                    echo "<div class='alert alert-danger'>";
                                                    echo $error;
                                                    echo "</div>";
                                                }if($ack == 1){
                                                    echo "<div class='alert alert-success'>Course added successfully!</div>";
                                                }else if($ack ==2){  echo "<div class='alert alert-warning'>Faild to add new book!</div>";}
                                        ?>
                                        <div class="row ">
                                            <div class="col-md-5 col-md-offset-1">
                                                <label for="course_name" class="col-sm-5 control-label">Course Name</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="course_name" placeholder="Course Name" name="course_name" value="<?php echo $course_name;?>">
                                                    <span><font color="red"><?php if(isset($course_name_err)) {echo $course_name_err;} ?></font></span>
                                                </div>
                                            </div>
                                            <div class="col-md-5">                                                
                                                <label for="course_code" class="col-sm-4 control-label">Course Code</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="course_code" placeholder="Course Code" name="course_code" value="<?php echo $course_code;?>">
                                                    <span><font color="red"><?php if(isset($course_code_err)) {echo $course_code_err;} ?></font></span>
                                                </div>
                                            </div>
                                        </div>                                        
                                        <br/>
                                        
                                        <br/>
                                        <div class="row ">
                                            <div class="col-md-5 col-md-offset-1">                                                
                                                <label for="book_name" class="col-sm-5 control-label">Department</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" id="department_id" name="department_id">
                                                        <option value="0">select department</option>
                                                        <?php
                                                        foreach($departments as $department){
                                                            echo "<option value='".$department['department_id']."'";
                                                            if($department['department_id'] == $department_id){
                                                                echo "selected";
                                                            }
                                                            echo ">".$department['department_code'].' : '.$department['department_name']."</option>\n";
                                                        }
                                                        ?>
                                                    </select>
                                                    <span><font color="red"><?php if(isset($department_err)){ echo $department_err; } ?></font></span>
                                                </div>                                                
                                            </div>
                                        </div>                          
                                        <br/>
                                        <br/>
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-12 text-center">                                                
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-success">Add course</button>
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
</html>
