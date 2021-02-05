<?php 
require('inc/exam_list.inc.php');
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
                                    <form class="form-horizontal" method="post" action="exam_list.php" name="search_by_year">
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
                                            <div class="col-md-4 col-md-offset-3">
                                                <label for="school_code" class="col-sm-5 control-label">Exam year</label>
                                                <div class="col-sm-7">
                                                    <select name="year" id="input" class="form-control">
                                                        <option value="0">
                                                            -- ALL --
                                                        </option>
                                                        <?php 
                                                        foreach ($exam_years as $yr) {
                                                            echo "<option value='".$yr['year']."'>".$yr['year']."</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <span><?php echo $year_err; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-sm-12">
                                                    <input type="submit" name="search" value="Search" class="btn btn-md btn-success">
                                                </div>
                                            </div>
                                        </div>
                                        <br/><br/>
                                        <div class="row ">
                                            <div class="col-md-11 col-md-offset-1">
                                                <table class="table table-condensed table-hover table-bordered table-responsive table-striped">
                                                    <thead>
                                                        <tr>
                                                        <th>Id</th><th>Created Data</th><th>Date</th><th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                    foreach($exams as $exam){?>
                                                    <tr>
                                                        <td><?php echo $exam['exam_id'] ?></td>
                                                        <td><?php echo date('j F, Y, g:i A', strtotime($exam['created_at'])) ?></td>
                                                        <td><?php echo date('j F, Y', strtotime($exam['exam_date'])); ?></td>
                                                        <td><a class="btn btn-sm btn-warning" href="modify_exam.php?exam=<?php echo $exam['exam_id']; ?>"><span class="glyphicon glyphicon-edit"></span> edit</a>&nbsp;&nbsp;
                                                            <a class="btn btn-sm btn-success" href="view_exam.php?exam=<?php echo $exam['exam_id']; ?>"><span class="glyphicon glyphicon-info-sign"></span> view</a>&nbsp;&nbsp;
                                                            <a class="btn btn-sm btn-primary" href="release_admitcard.php?exam=<?php echo $exam['exam_id']; ?>"><span class="glyphicon glyphicon-credit-card"></span> set admitcard</a>
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
