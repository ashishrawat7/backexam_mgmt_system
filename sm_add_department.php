<?php 
require('inc/sm_add_department.inc.php'); 
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
                                    <form class="form-horizontal" method="post" action="sm_add_department.php">
                                        <?php if($error){
                                                    echo "<div class='alert alert-danger'>";
                                                    echo $error;
                                                    echo "</div>";
                                                }if($ack == 1){
                                                    echo "<div class='alert alert-success'>Department added successfully!</div>";
                                                }else if($ack ==2){  echo "<div class='alert alert-warning'>Faild to add new book!</div>";}
                                        ?>
                                        <div class="row ">
                                            <div class="col-md-5 col-md-offset-1">
                                                <label for="department_name" class="col-sm-5 control-label">Department Name</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="department_name" placeholder="Department Name" name="department_name" value="<?php echo $department_name;?>">
                                                    <span><font color="red"><?php if(isset($department_name_err)) {echo $department_name_err;} ?></font></span>
                                                </div>
                                            </div>
                                            <div class="col-md-5">                                                
                                                <label for="department_code" class="col-sm-4 control-label">Department Code</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="department_code" placeholder="Department Code" name="department_code" value="<?php echo $department_code;?>">
                                                    <span><font color="red"><?php if(isset($department_code_err)) {echo $department_code_err;} ?></font></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <br/>
                                        <div class="row ">
                                            <div class="col-md-5 col-md-offset-1">                                                
                                                <label for="book_name" class="col-sm-5 control-label">School</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" id="school_id" name="school_id">
                                                        <option value="0">select school</option>
                                                        <?php
                                                        foreach($schools as $school){
                                                            echo "<option value='".$school['school_id']."'";
                                                            if($school['school_id'] == $school_id){
                                                                echo "selected";
                                                            }
                                                            echo ">".$school['school_code'].' : '.$school['school_name']."</option>\n";
                                                        }
                                                        ?>
                                                    </select>
                                                    <span><font color="red"><?php if(isset($school_err)){ echo $school_err; } ?></font></span>
                                                </div>                                                
                                            </div>
                                        </div>                          
                                        <br/>
                                        <br/>
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-12 text-center">                                                
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-success">Add Book</button>
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
