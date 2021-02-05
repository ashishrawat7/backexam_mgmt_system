<?php 
require('inc/view_exam.inc.php');
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
                                    <form class="form-horizontal" method="post" action="conduct_exam.php">
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
                                            <div class="col-md-3 col-md-offset-2">
                                                <label for="school_code" class="col-sm-6 control-label">Exam date </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="exam_date" value="<?php echo $exam_date;?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="school_code" class="col-sm-6 control-label">Admitcard Date </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="admitcard_date" value="<?php echo $admitcard_date;?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <br/><br/>
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <span><?php if(isset($semseter_select_err)){echo $semseter_select_err;}?></span>
                                                <table class="table table-condensed table-hover table-bordered table-responsive table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th><th>Code</th><th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                    foreach($exam_details as $exam){
                                                        if(array_key_exists('exam_date', $exam)){
                                                            break;
                                                        }
                                                    ?>
                                                    <tr>
                                                        
                                                        <td><?php echo $exam['program_name'] ?></td>
                                                        <td><?php echo $exam['program_code'] ?></td>
                                                        <td>
                                                        <?php $semesters = $exam['no_of_semester'];
                                                        for($i=0; $i<$semesters; $i++){?>
                                                        <div style="display:inline-block; padding-left:10px;">
                                                            <label><?php echo $i+1; ?>
                                                            <input style="position:relative; top:2px;" type="checkbox" id="<?php //echo $i+1?>"
                                                                name="<?php //echo "semester_select[".$program['program_id']."][".($i+1)."]"; ?>"
                                                                value="<?php //echo $i+1; ?>" 
                                                                <?php 
                                                                    if(!empty($exam[0])){
                                                                        if(in_array($i+1, $exam[0])){
                                                                            echo "checked";
                                                                        }
                                                                    }
                                                                ?> disabled>
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
