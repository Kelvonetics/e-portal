
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>	

	
	
		
			<?php include('layout/nav-menu.php') ?>	
	
		  	<?php include('layout/left-sidebar-login.php') ?> 
		

			
		
		
			<div class="main">
		
				<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
						
					<div class="row">
						<div class="col-md-8 col-md-offset-2 panel">
						
						<?php
							if(isset($_REQUEST['login_btn']))
							{
								$staff = login();
								if($staff)
								{
									$_SESSION['logged_in'] = true;
									$_SESSION['staff_id'] = $staff['staff_id']; 	$sid = $staff['staff_id'];
									$_SESSION['firstname'] = $staff['firstname'];   $fname = $staff['firstname'];
									$_SESSION['lastname'] = $staff['lastname'];     $lname = $staff['lastname'];
									$_SESSION['position'] = $staff['position'];
									$_SESSION['email'] = $staff['email'];
									$_SESSION['phone'] = $staff['phone'];
									$_SESSION['gender'] = $staff['gender'];
									$_SESSION['doj'] = $staff['doj'];
									$_SESSION['state'] = $staff['state'];
									$_SESSION['nation'] = $staff['nationality'];
									$_SESSION['address'] = $staff['address'];
									$_SESSION['photo'] = $staff['photo'];
									$_SESSION['subject_1'] = $staff['subject_1'];
									$_SESSION['subject_2'] = $staff['subject_2'];
									$_SESSION['subject_3'] = $staff['subject_3'];
									$_SESSION['subject_4'] = $staff['subject_4'];
									$_SESSION['subject_5'] = $staff['subject_5'];
									$_SESSION['role'] = $staff['role'];
									
									
									
									if($staff['role'] == 'Staff')  //header('Location: '.$newURL);
									{
										header('location:staff-profile?id='.$sid);
										//SETTING REDIRECT \ PREVIOUS URL 
										/*if(isset($_SERVER['HTTP_REFERER'])) {  $url = $_SERVER['HTTP_REFERER'];  }
										if($url != null){   header('Location: '.$url);   }
										else { header('location:staff-profile?id='.$sid); }	*/									
									}
									else if($staff['role'] == 'Admin')
									{
										header('location:admin-profile?id='.$sid);
										//SETTING REDIRECT \ PREVIOUS URL 
										/*if(isset($_SERVER['HTTP_REFERER'])) {  $url = $_SERVER['HTTP_REFERER'];  }
										if($url != null){   header('Location: '.$url);   }
										else {  header('location:admin-profile?id='.$sid);  }*/
									}
								}
								else { 
										echo '<div class="alert alert-danger">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											<strong>Sorry!</strong> Invalid Username And Password </div>';
									 }
							}
							
							if(@$_REQUEST['query'] == 'loggedout')
							{
							echo '<div class="alert alert-warning">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											<strong></strong> You \'ve Logged Out! &nbsp;&nbsp;&nbsp; Login Below </div>'; 	
							}
						?>
							
						<br>
						
						<div class="col-lg-6  col-md-12">
							<!-- PANEL HEADLINE -->
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">										
									
										<div class="logo text-center"><img src="assets/img/logo-dark.png" alt="e-portal Logo"></div>
										
									</h3>
									<p class="panel-subtitle"></p>
								</div>
								
								<div class="panel-body">
									<h4>Login to your account </h4>
									
									<form method="post" role="form">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-envelope"></i> </span>
											<input type="text" class="form-control" name="email" id="email" placeholder="Your Email" required>
										</div>
										<br>
										
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-key"></i> </span>
											<input type="password" class="form-control" id="p_word" name="p_word" placeholder="Password" required>
										</div>
										<br>
										
										<div class="input-group clearfix">
											<label class="fancy-checkbox element-left">
												<input type="checkbox">
												<span>Remember me</span>
											</label>
										</div>
										<button type="submit" name="login_btn" class="btn btn-primary btn-lg btn-block">LOGIN</button>
										<div class="bottom">
											<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
										</div>
									</form>
									
								</div>
							</div>
							<!-- END PANEL HEADLINE -->
						</div>
						
						<div class="col-lg-6  col-md-12">
							<!-- PANEL NO PADDING -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Your School</h3>
								</div>
								<div class="panel-body no-padding bg-primary text-center">
									<div class="padding-top-30 padding-bottom-30">
										<i class="fa fa-graduation-cap fa-5x"></i>
										<h3>School <br> Management <br> System</h3>
									</div>
								</div>
							</div>
							<!-- END PANEL NO PADDING -->
						</div>
						
						</div>
						
					
						
					</div>
				</div>	
			
			
			</div>		
					
			</div>		
									
									
									
								
							<!--
							
							-->
			

		
		
			<?php include('layout/bottom-footer.php') ?>
		
		





