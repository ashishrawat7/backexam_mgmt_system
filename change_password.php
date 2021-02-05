<?php 
require_once 'inc/change_password.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <title>Admin Pannel</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
  </head>
  <body>
  <div id="wapper">
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">        
      </button>
      <a class="" href="#"><img src="img/logo.gif" class="img-responsive logo_size" style="padding:5px; width:80px; height:80px;"></a>
    </div>
  </div>
</nav>
  
  	<section class="container">
    	<div class="login-box">
        
        <div class="" style="background-color:#00bd47; text-align:center; color:#fff; padding:5px 0; font-size:36px;">Change Password</div>
        
        <?php 
        if(!empty($error)){
            echo "<span><font color='red'>".$error."</font></span><br/>";
        }
        ?>
        <div class="login-box-body">
            <form action="change_password.php" method="post" accept-charset="utf-8">
                <div class="form-group has-feedback">
                    <input type="text" name="current_password" placeholder="Current Password" class="form-control" id="current_password" maxlength="80" size="30">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="new_password" placeholder="New Pssword" class="form-control" id="new_password" size="30">
                    <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="conf_password" placeholder="Confirm Pssword" class="form-control" size="30">
                    <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div><!-- /.col -->
                </div>
                <br/>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <a href="success.php" class="btn btn-default">Cancel</a>
                    </div><!-- /.col -->
                </div>
            </form>
            </div><!-- /.login-box-body -->
        </div>
    </section> 
    <div class="clearfix"></div> 
    <div class="footerdiv"><div class="clearfix"></div> 
    <section class="container"><p class="text-center">© Sam Higginbottom University of Agriculture, Technology and Sciences</p></section>
    </div>
    <div class="clearfix"></div> 
  </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>