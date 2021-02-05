
	<div class="col-md-2 sidebar">
		<div class="row">
		<!-- uncomment code for absolute positioning tweek see top comment in css -->
			<div class="absolute-wrapper">
			</div>
			
			<!-- Menu -->
			<div class="side-menu">
				<nav class="navbar navbar-default" role="navigation">
					<!-- Main Menu -->
					<div class="side-menu-container">
						<ul class="nav navbar-nav"  style="width:100%">
							<?php if($_SESSION['type'] === '2222'){ ?>
							<li class="panel panel-default" id="dropdown" style="width:100%">
								<a data-toggle="collapse" href="#dropdown1" class="<?php if(isset($student_menu)) echo $student_menu; ?>">
									<span class="glyphicon glyphicon-user"></span> Application <span class="caret"></span>
								</a>

								<!-- students list, find -->      
								<div id="dropdown1" class="panel-collapse collapse">
									<div class="panel-body">
										<ul class="nav navbar-nav" >
											<li class="<?php if(isset($student_menu_1)) echo $student_menu_1; ?>"><a href="apply_exam.php"> apply for exam</a></li>
											<li class="<?php if(isset($student_menu_2)) echo $student_menu_2; ?>"><a href="get_admitcard.php"> get admitcard </a></li>
										</ul>
									</div>
								</div>
							</li>   <!--School menu End-->
							<?php } ?>

							<!-- Dropdown Students-->  <!--Student -->
							<?php if($_SESSION['type'] === '1111' || $_SESSION['type'] === ''){ ?>
							<li class="panel panel-default" id="dropdown">
								<a data-toggle="collapse" href="#dropdown2" class="<?php if(isset($student_mgmt_menu)) echo $student_mgmt_menu; ?>">
									<span class="glyphicon glyphicon-user"></span> Students <span class="caret"></span>
								</a>

								<!-- students list, find -->      
								<div id="dropdown2" class="panel-collapse collapse">
									<div class="panel-body">
										<ul class="nav navbar-nav" >
											<li class="<?php if(isset($student_mgmt_menu_1)) echo $student_mgmt_menu_1; ?>"><a href="student_list.php"> Student List </a></li>
											<li class="<?php if(isset($student_mgmt_menu_2)) echo $student_mgmt_menu_2; ?>"><a href="student_find.php"> Find Student </a></li>
											<li class="<?php if(isset($student_mgmt_menu_3)) echo $student_mgmt_menu_3; ?>"><a href="result_generate.php"> Result Generate </a></li>
										</ul>
									</div>
								</div>
							</li>   <!--School menu End-->
							<?php } ?>

							

							<!-- Dropdown EXAM-->
							<?php if($_SESSION['type'] === '1111' || $_SESSION['type'] === '3333'){ ?>
							<li class="panel panel-default" id="dropdown">
								<a data-toggle="collapse" href="#dropdown3" class="<?php if($exams_menu) echo $exams_menu; ?>">
									<span class="glyphicon glyphicon-tasks"></span> Exams <span class="caret"></span>
								</a>

								<!-- Dropdown level 1 -->      <!--exam -->
								<div id="dropdown3" class="panel-collapse collapse">
									<div class="panel-body">
										<ul class="nav navbar-nav" >
											<?php if($_SESSION['type'] === '1111' || $_SESSION['type'] === '3333'){ ?>
											<li class="<?php if(isset($exams_menu_5)) echo $exams_menu_5; ?>"><a href="applications_list.php"> Applications </a></li>
											<?php } ?>

											<?php if($_SESSION['type'] === '1111'){ ?>
											<li class="<?php if(isset($exams_menu_1)) echo $exams_menu_1; ?>"><a href="exam_list.php"> Exams list </a></li>
											<?php } ?>

											<?php if($_SESSION['type'] === '1111'){ ?>
											<li class="<?php if(isset($exams_menu_3)) echo $exams_menu_3; ?>"><a href="modify_exam.php"> Modify Exam</a></li>
											<?php } ?>

											<?php if($_SESSION['type'] === '1111' || $_SESSION['type'] === '3333'){ ?>
											<li class="<?php if(isset($exams_menu_6)) echo $exams_menu_6; ?>"><a href="conduct_exam.php"> Conduct Exam </a></li>
											<?php } ?>
										</ul>
										
									</div>
								</div>
							</li>   <!--END EXAM-->
							<?php } ?>


							<!-- Dropdow Notification-->
							<?php if($_SESSION['type'] === '1111'){ ?>
							<li class="panel panel-default" id="dropdown">
								<a data-toggle="collapse" href="#dropdown4" class="<?php if($notifications_menu) echo $notifications_menu; ?>">
									<span class="glyphicon glyphicon-tasks"></span> Notification <span class="caret"></span>
								</a>

								<!-- Dropdown level 1 -->      <!--exam -->
								<div id="dropdown4" class="panel-collapse collapse">
									<div class="panel-body">
										<ul class="nav navbar-nav" >
											<?php if($_SESSION['type'] === '1111'){ ?>
											<li class="<?php if(isset($notifications_menu_1)) echo $notifications_menu_1; ?>"><a href="create_notification.php"> Create Notification </a></li>
											<?php } ?>

											<?php if($_SESSION['type'] === '1111'){ ?>
											<li class="<?php if(isset($notifications_menu_2)) echo $notifications_menu_2; ?>"><a href="notifications_list.php"> Notifications list </a></li>
											<?php } ?>
										</ul>
										
									</div>
								</div>
							</li>   <!--END EXAM-->
							<?php } ?>

							<!-- Dropdown level 1 -->      <!--Team Management-->
							<?php if($_SESSION['type'] === '1111'){ ?>
							<li class="panel panel-default" id="dropdown">
								<a data-toggle="collapse" href="#dropdown6" class="<?php if(isset($schools_menu)) echo $schools_menu; ?>">
									<span class="glyphicon glyphicon-user "></span> Schools <span class="caret"></span>
								</a>

								<div id="dropdown6" class="panel-collapse collapse">
									<div class="panel-body">
										<ul class="nav navbar-nav">
											<li class="<?php if(isset($schools_menu_1)) 		echo $schools_menu_1; ?>"><a href="sm_add_course.php"> Course </a></li>
											<li class="<?php if(isset($schools_menu_2)) 		echo $schools_menu_2; ?>"><a href="sm_add_program.php"> Program </a></li>
											<li class="<?php if(isset($schools_menu_3)) 		echo $schools_menu_3; ?>"><a href="sm_add_department.php"> Department </a></li>
											<li class="<?php if(isset($schools_menu_4)) 		echo $schools_menu_4; ?>"><a href="sm_add_school.php"> School </a></li>
										</ul>
									</div>
								</div>
							</li>      <!--Team Management End-->
							<?php } ?>
							<!--<li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>-->
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>
			</div>
		</div>  		
	</div>
  		