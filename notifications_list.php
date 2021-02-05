<?php 
require('inc/notifications_list.inc.php');
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
                                        <br/><br/>
                                        <div class="row ">
                                            <div class="col-md-11 col-md-offset-1">
                                                <table class="table table-condensed table-hover table-bordered table-responsive table-striped">
                                                    <thead>
                                                        <tr>
                                                        <th>Id</th><th>Notification</th><th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                    foreach($notifications as $notification){?>
                                                    <tr>
                                                        <td><?php echo $notification['id'] ?></td>
                                                        <td><?php echo $notification['text']; ?></td>
                                                        
                                                        <td>
                                                            <a class="btn btn-sm btn-warning" href="edit_notification.php?notification=<?php echo $notification['id']; ?>"><span class="glyphicon glyphicon-info-sign"></span> edit</a>&nbsp;&nbsp;
                                                            <a class="btn btn-sm btn-success" href="view_notification.php?notification=<?php echo $notification['id']; ?>"><span class="glyphicon glyphicon-edit"></span> view</a>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                    }
                                                    ?>  
                                                    </tbody>
                                                </table>
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
</html>
