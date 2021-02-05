<?php
require('inc/login.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">-->
    <title><?php echo $title; ?></title>
    <!-- Custom styles for this template -->
    <link href="css/login2.css" rel="stylesheet">
  </head>

  <body style="background-color: rgba(126, 123, 215, 0.2);">
    <div class="container" >
      <form class="form-signin" method="POST" action="login.php"name="login_form" style="position:relative;top:150px;">      
        <div class="row ">
          <div class="col-md-offset-4 col-sm-offset-4 col-sm-4 col-md-4 col-xs-12 form-group login-bg">
            <!-- <img href="img/admin.jpg" class="img img-responsive" style="height:80px; width:80px; z-index:1000; position:relative; padding :100px"> -->
            <h3 class="form-signin-heading">Student Login</h3>
            <span class="text-info">Please enter details</span><br>
            <span class="text-danger"><strong><?php echo $error_warning; ?></strong></span>

            <label for="username" class="sr-only">Registration ID</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="user id"  required autofocus/><br/>

            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required ><br/><br/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          </div>
        </div>
      </form>

<footer class="page-footer font-small unique-color-dark pt-4">

<!-- Footer Elements -->
<div class="container">

  <!-- Call to action -->
  <ul class="list-unstyled list-inline text-center py-2">
    <li class="list-inline-item">
      <h5 class="mb-1">Not Registerd?</h5>
    </li>
    <li class="list-inline-item">
      <a href="student_registration.php" class="btn btn-outline-white btn-rounded">Sign up!</a>
    </li>
  </ul>
  <!-- Call to action -->

</div>
<!-- Footer Elements -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2019-2020 Copyright:
  <a href="https://mdbootstrap.com/education/bootstrap/"> myExam pvt. ltd.</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
    </div> <!-- /container -->
  </body>
</html>
