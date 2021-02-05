<?php 
require('inc/sm_add_program.inc.php'); 
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
                                    <form class="form-horizontal" method="post" action="sm_add_program.php">
                                        <?php if($error){
                                                    echo "<div class='alert alert-danger'>";
                                                    echo $error;
                                                    echo "</div>";
                                                }if($ack == 1){
                                                    echo "<div class='alert alert-success'>Program added successfully!</div>";
                                                }else if($ack ==2){  echo "<div class='alert alert-warning'>Faild to add new book!</div>";}
                                        ?>
                                        <div class="row ">
                                            <div class="col-md-5 col-md-offset-1">
                                                <label for="program_name" class="col-sm-5 control-label">Program Name</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="program_name" placeholder="Program Name" name="program_name" value="<?php echo $program_name;?>">
                                                    <span><font color="red"><?php if(isset($program_name_err)) {echo $program_name_err;} ?></font></span>
                                                </div>
                                            </div>
                                            <div class="col-md-5">                                                
                                                <label for="program_code" class="col-sm-4 control-label">Program Code</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="program_code" placeholder="Program Code" name="program_code" value="<?php echo $program_code;?>">
                                                    <span><font color="red"><?php if(isset($program_code_err)) {echo $program_code_err;} ?></font></span>
                                                </div>
                                            </div>
                                        </div>                                        
                                        <br/>
                                        <div class="row ">
                                            <div class="col-md-5 col-md-offset-1">
                                                <label for="program_name" class="col-sm-5 control-label">Number of Semester</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id=" no_of_semester" placeholder="Number of Semester" name=" no_of_semester" value="<?php echo $no_of_semester;?>">
                                                    <span><font color="red"><?php if(isset($no_of_semester_err)) {echo $no_of_semester_err;} ?></font></span>
                                                </div>
                                            </div>
                                            <div class="col-md-5">                                                
                                                <label for="fee_per_semester" class="col-sm-4 control-label">Fee per Semester</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="fee_per_semester" placeholder="Fee per Semester" name="fee_per_semester" value="<?php echo $fee_per_semester;?>">
                                                    <span><font color="red"><?php if(isset($fee_per_semester_err)) {echo $fee_per_semester_err;} ?></font></span>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row ">
                                            <div class="col-md-5 col-md-offset-1">                                                
                                                <label for="book_name" class="col-sm-5 control-label"> Department</label>
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
                                            <div class="col-md-5">                                                
                                                <label for="fee_per_semester" class="col-sm-4 control-label">No of Semesters</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="no_of_sem" placeholder="No of Semesters" name="no_of_sem" value="<?php echo $no_of_sem;?>">
                                                    <span><font color="red"><?php if(isset($fee_per_semester_err)) {echo $fee_per_semester_err;} ?></font></span>
                                                </div>
                                            </div>
                                        </div>                          
                                        <br/>
                                        <br/>
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-12 text-center">                                                
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-success">Add program</button>
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
