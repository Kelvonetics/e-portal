<!-- NAVBAR -->
		<?php echo ob_start();  ?>
		<nav class="navbar navbar-default navbar-fixed-top ">
			<div class="brand">
				<a href="index"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
				</form>
				<div class="navbar-btn navbar-btn-right">
					<a class="btn btn-success update-pro" href="#" data-toggle="tooltip" data-placement="left" title="You Are Logged In As <?php if(@$_SESSION['logged_in'] == '1'){ echo @$_SESSION['role']; } else { echo 'User'; } ?>"><i class="fa fa-rocket"></i> <span>
					<?php if(@$_SESSION['logged_in'] == '1'){ echo @$_SESSION['role']; } else { echo 'User'; } ?>
					</span>
					</a>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger">1</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>School Board Meeting Soon</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
								<li><a href="#" class="more">See all notifications</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="faq-page" class=""><span>Frequently Ask Questions </span></a></li>
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Registration</a></li>
								<li><a href="#">Login</a></li>
								<li><a href="#">Exams</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="upload/<?php if(@$_SESSION['logged_in'] == '1'){ echo @$_SESSION['photo']; } 
													else { echo 'avatar.jpg'; } ?>" class="img-circle" alt="Avatar"> 
							<span><?php if(@$_SESSION['logged_in'] == '1'){ echo @$_SESSION['lastname'].' '.@$_SESSION['firstname']; } else { echo 'User'; } ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<?php
								if(@$_SESSION['logged_in'] == '1')
								{
									echo
									'<li><a href="profile"> <i class="lnr lnr-user"> </i> <span>My Profile</span> </a> </li>							
									<li><a href="logout?query=logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
									<li><a href="#" data-toggle="modal" data-target="#y-book"><i class="fa fa-book"></i>Year Book</a></li>
									<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>';
								}
								else
								{
									echo
									'<li><a href="profile"><i class="lnr lnr-user"></i><span>My Profile</span></a></li>							
									<li><a href="login"><i class="lnr lnr-lock"></i> <span>Login</span></a></li>
									<li><a href="page-year-book" class=""><i class="fa fa-book"></i>Year Book</a></li>';
								}
								?>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
<!-- END NAVBAR -->



<!-- MODAL FORM TO RETRIEVE THE STUDENT NUMBER FOR EDIT -->
	<form action="year-book.php" method="post" role="form">
		<div id="y-book" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"> Student Year Book</h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						<select class="form-control" name="session" id="session" required>
						<option value=""> Select Year Session </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM sessions";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['session']."\">".$row['value']."</option>";
								}											
							?>											
						</select>
					</div>
															
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="get_ybook_btn"> View Year Book </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>






