<?php 
require('inc/student_list.inc.php');
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
					                <form class="form-horizontal" name="student_list_form" id="student_list_form" method="post">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="book_name" class="col-sm-12 control-label">First Name</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" value="<?php echo $first_name;?>">
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
                                

                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th style="width:12%">Registration No.</th></th>
                                        <th style="width: 19%">Name</th>                        
                                        <th style="width: 8%">Course</th>
                                        <th style="width: 9%">Phone</th>                        
                                        <th style="width: 15%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="table_info">
                                        <?php
                                        if($results){
                                            foreach($results as $result){

                                            if($result['status']=='1'){
                                                $status = '<td class="font-green" id="status_'.$result['student_id'].'">Active</td>';
                                            }elseif($result['status']=='2'){
                                                $status = '<td class="font-red" id="status_'.$result['student_id'].'">Pass Out</td>';
                                            }
                                        
                                        ?>
                                        <tr>
                                            <td><a href="view_profile.php?user=<?php echo $result['user_id']; ?>" title="Click to view profile" class="text-bold"><?php echo $result['username']; ?></a></td>
                                            <td><?php echo $result['first_name']." ".$result['last_name']; ?></td>                            
                                            <td><?php echo $result['program_name']; ?></td>
                                            <td><?php echo $result['contact_no']; ?></td>
                                            <td>
                                                <a href="view_profile.php?user=<?php echo $result['user_id']; ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-info-sign"></span> view</a>
                                            </td>
                                        </tr>
                                        <?php }?>
                                        <?php }else{ ?>
                                                <tr id="empty">
                                                    <td colspan="20" class="text-center font-red">No results!</td>
                                                </tr>
                                        <?php } ?>	
                                    
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                    <th style="width:8%">Registration No.</th>
                                        <th style="width: 19%">Name</th>                        
                                        <th style="width: 19%">Course</th>
                                        <th style="width: 9%">Phone</th>                        
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                
                                </div><!-- table res close -->
                                </div><!-- pannel body content -->
                            </div>
                            
                        </div>
                    </div>
            <?php require_once('common/footer.php')?>
        </div>
    </body>
</html>
