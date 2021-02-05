<?php 
require('inc/release_admitcard.inc.php');
require_once('common/head.php'); ?>
    <body>
        <div id="wapper">
            <?php require_once('common/header.php');    //header ?>
            <div class="container-fluid main-container">
                <?php require_once('common/left_menu.php');     //navigation ?>
                    <div class="col-md-10 content">
                        <div class="panel panel-default">
                            <div class="panel-heading"><?php echo $heading; ?></div>
                                <div class="panel-body content-body">
                                    <form class="form-horizontal" method="post" action="release_admitcard.php">
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
                                            <div class="col-md-4 col-md-offset-2">
                                                <label for="exam_id" class="col-sm-5 control-label"> Exam Id:  </label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="exam_id" class="form-control" id="exam_id" value="<?php echo $exam_id;?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="school_code" class="col-sm-5 control-label">Exam date </label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="exam_date" id="exam_date" value="<?php echo $exam_date;?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <br/><br/>
                                        <div class="row ">
                                            <div class="col-md-4 col-md-offset-2">
                                                <label for="course_name" class="col-sm-5 control-label">Start date</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="start_date" id="start_date" placeholder="dd-mm-yyyy"  value="<?php echo $start_date ?>">
                                                    <span><font color="red"><?php if(isset($start_date_err)){ echo $start_date_err; } ?></font></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="course_name" class="col-sm-5 control-label">End date</label>
                                                <div class="col-sm-7">
                                                
                                                <input type="text" class="form-control" name="end_date" id="end_date" placeholder="dd-mm-yyyy"  value="<?php echo $end_date ?>">
                                                <span><font color="red"><?php if(isset($end_date_err)){ echo $end_date_err; } ?></font></span>
                                                </div>
                                            </div>
                                        </div>
                                        <br/><br/><br/>
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
