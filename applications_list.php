<?php 
require('inc/applications_list.inc.php');
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
                                    <div class="row tablesearch">
					                <form class="form-horizontal" name="student_list_form" id="applications_list_form" method="post" action="applications_list.php">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="book_name" class="col-sm-12 control-label">First Name</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" value="<?php echo $first_name;?>">
                                                    <span class="font-red"><?php if(isset($first_name_err)){echo $first_name_err;}?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="book_name" class="col-sm-12 control-label">Program</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" id="program_id" name="program_id">
                                                        <option value="0">All</option>
                                                        <?php                                
                                                        foreach($programs as $program){
                                                            echo "<option value='".$program['program_id']."'";
                                                            if($program['program_id'] == $program_id){
                                                              echo "selected";
                                                            }
                                                            echo ">".$program['program_code'].' : '.$program['program_name']."</option>\n";
                                                          }                             
                                                        ?>
                                                    </select>
                                                    <span class="font-red"><?php if(isset($program_err)){echo $program_err;}?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="book_name" class="col-sm-12 control-label">Exam</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" id="program_id" name="exam_id">
                                                        <option value="0">--- select ---</option>
                                                        <?php
                                                        foreach($exams as $value){
                                                            echo "<option value='".$value['exam_id']."'";
                                                            if($value['exam_id'] == $exam_id){
                                                              echo "selected";
                                                            }
                                                            echo ">".$value['exam_date']."</option>\n";
                                                          }
                                                        ?>
                                                    </select>
                                                    <span class="font-red"><?php if(isset($exam_err)){echo $exam_err;}?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group text-center">
                                                <div class="col-sm-12" style="top:15px;">
                                                    <button type="submit" class="btn btn-success">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    <!-- row -->
                                    </form>
                                    </div>
                                    <?php
                                    if(isset($results)){
                                        if(!empty($results)){?>
                                            <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th style="width:10%">Registration Id.</th></th>
                                                    <th style="width: 10%">Application No</th>
                                                    <th style="width: 20%">Name</th>
                                                    <th style="width: 20%">Course</th>
                                                    <th style="width: 10%">Phone</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody id="table_info">
                                                    <?php foreach($results as $result){
                                                    if($result['status']=='1'){
                                                        $status = '<td class="font-green" id="status_'.$result['student_id'].'">Active</td>';
                                                    }elseif($result['status']=='2'){
                                                        $status = '<td class="font-red" id="status_'.$result['student_id'].'">Pass Out</td>';
                                                    }?>
                                                    <tr>
                                                        <td><a href="view_profile.php?user=<?php echo $result['user_id']; ?>" title="Click to view profile"  class="text-bold"><?php echo $result['username']; ?></a></td>
                                                        <td><?php echo $result['id']; ?></td>
                                                        <td><?php echo $result['first_name']." ".$result['last_name']; ?></td>                            
                                                        <td><?php echo $result['program_name']; ?></td>
                                                        <td><?php echo $result['contact_no']; ?></td>
                                                        
                                                        <td><a href="view_application.php?application=<?php echo $result['id']; ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-info-sign"></span> view application</a></td>
                                                    </tr>
                                                    <?php }?>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Registration Id.</th>
                                                        <th>Application No</th>
                                                        <th>Name</th>
                                                        <th>Course</th>
                                                        <th>Phone</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <?php }else{ ?>
                                                <tr id="empty">
                                                    <td colspan="20" class="text-center font-red">No results!</td>
                                                </tr>
                                        <?php } 
                                        }
                                        ?>
                                    </div><!-- table res close -->
                                </div><!-- pannel body content -->
                            </div>
                            
                        </div>
                    </div>
            <?php require_once('common/footer.php')?>
        </div>
    </body>
</html>
