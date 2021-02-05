<?php 
require('inc/view_profile.inc.php'); 
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
                                    <div class="row">
                                        <div class="col-md-5 col-md-offset-1">
                                            <label for="program_name" class="col-sm-5 control-label">Student Name :</label>
                                            <div class="col-sm-7">
                                                <label class="col-sm-12 control-label align-left text-info"><?php echo $user_details['first_name']." ".$user_details['last_name']; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="col-sm-7">
                                                <img src="images/users/<?php echo $user_details['image']; ?>" style="height:120px; width:90px">
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-md-offset-1">
                                            <label for="program_name" class="col-sm-5 control-label">Registration Id :</label>
                                            <div class="col-sm-7">
                                                <label class="col-sm-12 control-label align-left text-info"><?php echo $user_details['username']; ?></strong>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-5 col-md-offset-1">
                                            <label for="program_name" class="col-sm-5 control-label">Program :</label>
                                            <div class="col-sm-7">
                                                <label class="col-sm-12 control-label align-left text-info"><?php echo $user_details['program_code']." | ".$user_details['program_name']; ?></label>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <label class="col-sm-5 control-label">Departmant :</label>
                                            <div class="col-sm-7">
                                            <label class="col-sm-12 control-label align-left text-info"><?php echo 
                                            $user_details['department_name']; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>                                        
                                    <div class="row ">
                                        <div class="col-md-5 col-md-offset-1">
                                            <label for="program_name" class="col-sm-5 control-label">email :</label>
                                            <div class="col-sm-7">
                                            <label class="col-sm-12 control-label align-left text-info"><?php echo $user_details['email_id']; ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="Current semseter" class="col-sm-5 control-label">Contact No :</label>
                                            <div class="col-sm-7">
                                            <label class="col-sm-12 control-label align-left text-info"><?php echo $user_details['contact_no']; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>>
                                    <div class="row ">
                                        <div class="col-md-5 col-md-offset-1">
                                            <label for="program_name" class="col-sm-5 control-label">registration date :</label>
                                            <div class="col-sm-7">
                                            <label class="col-sm-12 control-label align-left text-info"><?php echo $user_details['created_at']; ?></label>
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
                                                <a class="btn btn-success" href="student_list.php">Back to list</a>
                                            </div>                                                
                                        </div>
                                    </div>
                                    <!-- row -->
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
