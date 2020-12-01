
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_admin_login();  ?>


<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
</style>

<!-- script to display photo with preview will uploading  -->
<script>
	function readURL(input) 
	{
		if (input.files && input.files[0]) 
		{
			var reader = new FileReader();

			reader.onload = function (e) 
			{
				$('#blah')
					.attr('src', e.target.result)
					.width(450)
					.height(250);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
	
	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		
					
		
		
		<!-- MAIN -->
		<div class="main" style="width:82%;">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<form action="add-subject" method="post">
					
					<div class="">

						<div class=" col-md-6 col-md-offset-3" style="border:thin dotted #f9f9f9">

							<!-- INPUT GROUPS -->
							<div class="panel">
							<!-- LOGICS TO CREATE UPDATE AND VIEW QUESTION -->
					<?php
						$conn = db_connect();
						if(isset($_REQUEST['new_subj_btn']))
						{							
							@$new_subj_msg = create_new_subject($new_subj_msg);
							if($new_subj_msg == "subjCreated")
							{
								echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										   <strong>Success! </strong> Subject Created Successfully.
									  </div>';
							}
							else
							{
								echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry!</strong> New Subject NOT Created .'.$new_subj_msg;
									 '</div>  <br>';
							}
							
						}
						
						
						if(isset($_REQUEST['get_subj_btn']))
						{
							$regist_no = $_REQUEST['get_subj_id'];
							$query = "SELECT * FROM student_users WHERE regist_no = '{$regist_no}'";
							if ($conn->query($query) === TRUE)
							{
								$found_user = $result->fetch_assoc();
							}
							else { $found_user = ''; }
						}
						$conn->close();
					?>
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-book"></i> Subjects</h3>
								</div>
								
								<div class="panel-body">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-book"></i></span>
										<input class="form-control" placeholder="Subject Name" type="text" name="subjects" id="subjects" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-group"></i></span>
										<select class="form-control" name="s_class" id="s_class" required>
											<option value=""> Select Class </option>
											<option value="Junior Secondary And Senior Secondary"> Junior Secondary And Senior Secondary </option>
											<option value="Junior Secondary"> Junior Secondary </option>
											<option value="Senior Secondary"> Senior Secondary </option>
										</select>
									</div>
									
									<br>
									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>
										<button type="submit" class="btn btn-primary" name="new_subj_btn">Create Subject</button>
									</div>
								</div>	
							</div>
						<!-- END INPUT GROUPS -->
							
						</div>
						
						
						
					</div>
					</form>
		

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		</div>
		<!-- END MAIN -->
		
		
		
		
		
		
	<?php include('layout/bottom-footer.php') ?>		
		
		








		