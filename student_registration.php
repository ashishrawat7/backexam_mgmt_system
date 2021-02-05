<?php
require('inc/student_registration.inc.php');

if(isset($_SESSION['admin_user_login_id'])){
	header("Location: success.php");
	exit();
}
$username = "";

if(isset($_POST['username'])){

	$username=$_POST['username'];
	
	if(empty($_POST['username']) || empty($_POST['password'])){
		$error_warning ='Blank Username and/or Password.';		
	}else{
		
		$data=$sqli_query->login($_POST['username'],$_POST['password']);			

		if($data){
			$message = $_SESSION['admin_username']." Login, IP - ".$_SERVER['REMOTE_ADDR'];
			$sqli_query->writeOnLog($message);						
			header("Location: success.php");
			exit();
		}else{
			$error_warning='No match for Username and/or Password.';
			$message=$_POST['username']." Attempting to invalid Login, IP - ".$_SERVER['REMOTE_ADDR'];
			$sqli_query->writeOnLog($message);
		}
	}
}
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
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">
      <form class="" method="POST" action="student_registration.php">      
        <div class="row">
          <div class="col-md-offset-4 col-sm-4 form-group">
            <h1 class="heading">Student Registration</h1>
            <h3 class="sub-heading">Enter Details</h3>
            
            <span class="text-danger"><strong><?php echo $error_warning; ?></strong></span><br>
            <!-- registraion no -->
            <span><font color="red"><?php if(isset($username_err)) {echo $username_err;} ?></font></span>
            <label for="username" class="sr-only">Registration ID</label>
            <input type="text" name="username" class="form-control" placeholder="Registration id" value="<?php echo $username ?>" autofocus/><br/>
            <!-- studetn name -->
            <span><font color="red"><?php if(isset($first_name_err)) {echo $first_name_err;} ?></font></span>
            <label  class="sr-only">First name</label>
            <input type="text" name="first_name" class="form-control" placeholder="First name" value="<?php echo $first_name ?>" /><br/>
            <!-- last name -->
            <span><font color="red"><?php if(isset($last_name_err)) {echo $last_name_err;} ?></font></span>
            <label  class="sr-only">Last name</label>
            <input type="text" name="last_name" class="form-control" placeholder="Last name" value="<?php echo $last_name ?>" /><br/>

            <!-- Contact no -->
            <span><font color="red"><?php if(isset($contact_err)) {echo $contact_err;} ?></font></span>
            <label  class="sr-only">Contact no</label>
            <input type="text" name="contact_no" class="form-control" placeholder="Contact No" value="<?php echo $contact_no ?>" /><br/>

            <!-- Email -->
            <span><font color="red"><?php if(isset($email_err)) {echo $email_err;} ?></font></span>
            <label  class="sr-only">email id</label>
            <input type="text" name="email" class="form-control" placeholder="Email id" value="<?php echo $email ?>" /><br/>

            <!-- program -->
            <label for="program" class="sr-only">Program</label>
            <span><font color="red"><?php if(isset($program_err)) {echo $program_err;} ?></font></span>
            <select class="form-control" id="program" name="program_id">
                <option value="0">select program</option>
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
            <br/>
            <!-- Password -->
            <label for="inputPassword" class="sr-only">Password</label>
            <span><font color="red"><?php if(isset($password_err)) {echo $password_err;} ?></font></span>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password"/>
            
            <!-- Confirm Password -->
            <br/>
            <span><font color="red"><?php if(isset($confirm_password_err)) {echo $confirm_password_err;} ?></font></span>
            <label for="inputPassword" class="sr-only">Confirm-Password</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password"/>
            <br/>
            <button class="btn btn-md btn-primary btn-block" type="submit">Register</button>
            <button class="btn btn-md btn-danger btn-block" type="reset">Reset</button>
          </div>
        </div>

        <footer class="page-footer font-small unique-color-dark pt-4">
            <!-- Footer Elements -->
            <!-- Footer Elements -->
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© Sam Higginbottom University of Agriculture, Technology and Sciences</div>
            <!-- Copyright -->
        </footer>
    </div> <!-- /container -->
  </body>
</html>