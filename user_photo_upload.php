<?php
require('inc/user_photo_upload.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <title><?php echo $title; ?></title>    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">    
  </head>
  <body>
  <div class="container">
      <form class="" method="POST" action="user_photo_upload.php" enctype="multipart/form-data">      
        <div class="row">
          <div class="col-md-offset-4 col-sm-4 form-group">
            <h1 class="heading"><?php echo $heading; ?></h1>
            <h3 class="sub-heading">Enter Details</h3>
            
            <span class="text-danger">
                <strong>
                    
                </strong>
            </span>
            <br>
            <!-- registraion no -->
            <div class="row">	
				<div class="col-sm-12">
                    <div class="form-group">
                        <label  class="col-sm-12 control-label">Student Registration No.</label>
                        <div class="col-sm-12 lline">
                            <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['username']; ?>" readonly=true>
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid']; ?>">
                            <!-- <input type="hidden" name="pflag" value="<?php echo $pflag; ?>">
                            <input type="hidden" name="old_image" value="<?php echo $old_image; ?>"> -->
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
				<div class="col-md-12">
                    <div class="form-group">
                        <label  class="col-sm-12 control-label">Select Photo</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" name="image"  accept="image/*">
                            <span class="text-red"><?php if(isset($error_image)) echo $error_image; ?></span>
                        </div>
                    </div>
                </div>
            </div>
			<br/>
            <br/>
            <button class="btn btn-md btn-primary btn-block" type="submit">Upload</button>
            <button class="btn btn-md btn-danger btn-block" type="reset">Reset</button>
          </div>
        </div>
        <footer class="page-footer font-small unique-color-dark pt-4">
            <div class="footer-copyright text-center py-3">© Sam Higginbottom University of Agriculture, Technology and Sciences</div>
        </footer>
  </body>
</html>