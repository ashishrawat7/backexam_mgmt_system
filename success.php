<?php
require_once("common/error.php");
require_once('class/class.inc.php');
require_once('inc/success.inc.php');

$sqli_query = new SqlIQuery();
$sqli_query->isLogIn();

$title = $heading = "Dashboard";
$school_management = 'active';
$SM_course = 'active';
if(isset($_SESSION['success']) && $_SESSION['success']=='1'){
	$success="1";
	$_SESSION['success']='';
	unset($_SESSION['success']);
}

require_once('common/head.php');
require_once('common/header.php')//header?>
 <div class="container-fluid main-container">
    <?php require_once('common/left_menu.php')           //navigation ?>
     <div class="col-md-10 content">
            <div class="panel panel-default">
            <div class="panel-heading"><?php echo $heading ?></div>
            <div class="panel-body content-body">
				<?php if(isset($success)){ ?>
                   <div class="alert alert-success">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <h3><strong> Password Changed succefully!</strong></h3>
                   </div>
               <?php } ?>

               <h2>Welcome <?php echo $_SESSION['first_name']." ".$_SESSION['last_name']; ?> </h2>
                
               <span class="red">Last login: 
                  <?php 
                  $user_last_login_date = date('j F, Y, g:i A', strtotime($_SESSION['last_login']));
                  echo "<strong>".$user_last_login_date."</strong>";
                  ?>
               </span>
               <br/><br/>
               <i><u><h3>Notifications</h3></u></i>
               <div class="row">
                  <ul>
                  <?php foreach ($notifications as $value) { 
                     $created_at = date('j F, Y, g:i A', strtotime($value['created_at']))
                     ?>
                     <div class="col-sm-10">
                        <li class="notification-text">
                           <?php echo $value['text']; 
                           echo "<span class='notification-created-at'> [".$created_at.']</span>';?>
                        </li>
                     </div>
                     <?php }?>
                  </ul>
               </div>
            </div>
        </div>
     </div>
     </div>
     <?php require_once('common/footer.php')?>
  	