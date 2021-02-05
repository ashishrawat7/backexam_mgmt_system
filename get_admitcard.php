<?php 
require('inc/get_admitcard.inc.php');
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
                                    <form class="form-horizontal" method="post" action="get_admitcard.php">
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-3">
                                                <label for="program_name" class="col-sm-6 control-label">Select exam</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" name="exam_id">
                                                        <option value="0">--- Please Select ---</option>
                                                        <?php 
                                                            foreach($exams AS $exam){
                                                            echo "<option value='".$exam['exam_id']."'";
                                                            echo ">".($exam['exam_date'])."</option>";
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br/><br/><br/>
                                        <?php
                                        if(count($application_ids)){
                                        ?>
                                        <div class="row center-block">
                                            <div class="col-sm-6">
                                        <table class="table table-bordered table-responsive table-hover">
                                            <tr>
                                                <th>
                                                    Application Id
                                                </th>
                                                <th>
                                                    Aciton
                                                </th>
                                            </tr>
                                            <?php 
                                            
                                            foreach($application_ids as $application_id){
                                                echo 
                                                "<tr class=''>
                                                    <td>
                                                        <label class='control-label'>".$application_id['id']."</label>
                                                    </td>
                                                    <td>
                                                    
                                                        <a href='download_admitcard.php?application=".$application_id['id']."'><span class='glyphicon glyphicon-md glyphicon-download'></span> download</a>
                                                    </td>
                                                </tr>";
                                            }
                                            ?>
                                        </table>
                                        </div>
                                        </div>
                                        <?php 
                                        }else{
                                            echo "No Application Found for this exams!";
                                        }
                                        ?>
                                        <br>
                                        <br>
                                        <br>
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
