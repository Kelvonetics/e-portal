

<?php include('layout/top-head.php') ?>	


<?php include('layout/nav-menu.php') ?>	


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
				$u = @$_SESSION['url'];
				$url  = substr($u, 0);
				header('Location: '.$url);        //header('location:staff-profile?id='.$sid);								
			}
			else if($staff['role'] == 'Admin')
			{
				$u = @$_SESSION['url'];
				$url  = substr($u, 0);
				header('Location: '.$url);        //header('location:admin-profile?id='.$sid);
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

<body>
	<!-- WRAPPER -->
	<form method="post" role="form">
	<div id="wrapper" style="margin-top:5%">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box lockscreen clearfix">
					<div class="content">
						<h1 class="sr-only"></h1>
						<div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo"></div>
						<div class="user text-center">
							<img src="upload/<?php echo @$_SESSION['photo'];  ?>" class="img-circle" alt="Avatar">
							<h2 class="name"> <?php echo @$_SESSION['firstname'].' '.@$_SESSION['lastname'];  ?> </h2>
						</div>
						<form action="index.html">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-key"></i></span>
								<input type="hidden" class="form-control" name="email" id="email" value="<?php echo @$_SESSION['email']; ?> ">
								<input type="password" class="form-control" name="p_word" id="p_word" placeholder="Enter your password ..." required>
								<span class="input-group-btn"><button type="submit" class="btn btn-primary" name="login_btn"><i class="fa fa-arrow-right"></i></button></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
	<!-- END WRAPPER -->
</body>

</html>






<?php include('layout/bottom-footer-locked.php') ?>	