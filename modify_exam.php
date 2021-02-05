<?php 
require('inc/modify_exam.inc.php');
require_once('common/head.php'); ?>
    <body>
        <div id="wapper">
            <?php require_once('common/header.php');             //header ?>
            <div class="container-fluid main-container">
                <?php require_once('common/left_menu.php');           //navigation ?>
                    <div class="col-md-10 content">
                        <div class="panel panel-default">
                            <div class="panel-heading"><?php echo $heading; ?></div>
                                <div class="panel-body content-body">
                                    <form class="form-horizontal" method="post" action="modify_exam.php">
                                        <?php 
                                        if($error){
                                            echo "<div class='alert alert-danger'>";
                                            echo $error;
                                            echo "</div>";
                                        }if(isset($_SESSION['success']) && ($_SESSION['success']==='1')){
                                            echo "<div class='alert alert-success'>Exam created successfully!</div>";
                                            unset($_SESSION['success']);
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-4">
                                                <label for="school_code" class="col-sm-5 control-label">Exam date </label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="exam_date" name="exam_date" value="<?php echo $exam_date;?>">
                                                    <span><?php if(isset($exam_date_err)){echo $exam_date_err;}?></span>
                                                    <input type="hidden" value="<?php echo $exam_id;?>" name="exam_id">    
                                                </div>
                                            </div>
                                        </div>
                                        <br/><br/>
                                        
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-3">
                                                <label for="school_code" class="col-sm-5 control-label">Appplication Date: </label>
                                                <div class="col-sm-7 tooltip" >
                                                <input type="text" class="form-control" id="exam_date" name="exam_date" value="<?php echo $exam_date;?>">
                                                    <span><?php if(isset($application_date_err)){echo $application_date_err;}?></span>
                                                    <label for="school_code" class="col-sm-5 control-label"> To </label>
                                                    <input type="text" class="form-control tooltip" id="application_date" name="application_date" value="<?php echo $exam_date;?>">
                                                    <span><?php if(isset($application_date_err)){echo $application_date_err;}?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="school_code" class="col-sm-5 control-label">Appplication start date: </label>
                                                <div class="col-sm-7">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-11 col-md-offset-1">
                                                <span><?php if(isset($semseter_select_err)){echo $semseter_select_err;}?></span>
                                                <table class="table table-condensed table-hover table-bordered table-responsive table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th><th>Code</th><th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                    foreach($programs as $program){?>
                                                        <tr>
                                                            <td><?php echo $program['program_name'] ?></td>
                                                            <td><?php echo $program['program_code'] ?></td>
                                                            <td>
                                                            <?php $semesters = $sqli_query->getSemsById($program['program_id']);
                                                            for($i=0; $i<$semesters; $i++){?>
                                                            <div style="display:inline-block; padding-left:10px;">
                                                                <label><?php echo $i+1; ?>
                                                                <input style="position:relative; top:2px;" type="checkbox" id="<?php echo $i+1?>"
                                                                    name="<?php echo "semester_select[".$program['program_id']."][".($i+1)."]"; ?>"
                                                                    value="<?php echo $i+1; ?>" 
                                                                    <?php 
                                                                        
                                                                        foreach($exam_details as $ex){
                                                                            if(array_key_exists('exam_date', $ex)){
                                                                                break;
                                                                            }
                                                                            //$ex['program_id'];
                                                                            if($ex['program_id'] == $program['program_id']){
                                                                                foreach ($ex[0] as $value) {
                                                                                    if($value == $i+1){
                                                                                        echo "checked";
                                                                                    }
                                                                                }
                                                                                
                                                                            }
                                                                        }
                                                                    ?>>
                                                            </div>
                                                            <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <?php 
                                                        }
                                                    ?>  
                                                    </tbody>
                                                </table>
                                                
                                            </div>                                     
                                        </div>
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
</html>
