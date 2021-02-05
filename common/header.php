		<nav class="navbar navbar-default navbar-static-top">
				<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
					MENU
					</button>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="success.php">
						<img src="img/logo.gif" class="img-responsive" style="width:60px">
					</a>			
				</div>		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
					
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<img class="user-profile-img" src="images/users/<?php echo $_SESSION['image'];?>" >&nbsp;<span><?php echo $_SESSION['first_name']; ?></span>
								<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li class="dropdown-header"><?php echo "<h4>".$_SESSION['first_name']."<br><small>"
																.$_SESSION['username']."</small></h4>"; ?></li>
									<li class=""><a href="change_password.php">Change password</a></li>
									<li class="divider"></li>
									<li><a href="logout.php" class="logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a></li>
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
		</nav>