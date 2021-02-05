<?php 
require('inc/create_notification.inc.php');
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
                                    <form class="form-horizontal" method="post" action="create_notification.php">
                                        <?php 
                                        if($error){
                                            echo "<div class='alert alert-danger'>";
                                            echo $error;
                                            echo "</div>";
                                        }if(isset($_SESSION['success']) && ($_SESSION['success']==='1')){
                                            echo "<div class='alert alert-success'>Notification created successfully!</div>";
                                            unset($_SESSION['success']);
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="col-sm-3 control-label">Notification Text</label>
                                                <div class="col-sm-7">
                                                    <textarea class="form-control" id="notification_text" name="notification_text"><?php echo $notification_text;?></textarea>
                                                    <span class="font-red"><?php if(isset($notification_text_err)) {echo $notification_text_err;} ?></font></span>
                                                </div>
                                            </div>
                                        </div>
                                        <br/><br/>
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