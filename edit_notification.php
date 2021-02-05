<?php 
require('inc/edit_notification.inc.php');
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
                                    <form class="form-horizontal" method="post" action="edit_notification.php" name="edit_notification">
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-1">
                                                <label for="school_code" class="col-sm-8 control-label">Notification ID</label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="notification_id" class="form-control" id="notification_id" value="<?php echo $notification_id;?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="school_code" class="col-sm-2 control-label">Notification Text </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="notification_text"><?php echo $notification_details['text'];?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- row -->
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
