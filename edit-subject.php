
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_admin_login();  ?>


<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
	
	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		
					
		
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<form action="edit-subject" method="post">
					
					<div class="">

						<div class=" col-md-8 col-md-offset-2" style="border:thin dotted #f9f9f9">

							<!-- INPUT GROUPS -->
							<div class="panel">
							<!-- LOGICS TO CREATE UPDATE AND VIEW QUESTION -->
							<?php
								$conn = db_connect();								
								if(isset($_REQUEST['get_subj_btn']))
								{
									@$subject = $_REQUEST['subject'];	
									$query = "SELECT * FROM subjects WHERE subject_id = '{$subject}'";
									$result = $conn->query($query);
									$found_subj = $result->fetch_assoc();  
									if($found_subj == null)
									{
										echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												  <strong>Sorry!</strong> No Record Found For Subject ';
										echo '</div>';
									}
								}
								//from view
								else if((@$_GET['id']) != null)
								{    
									@$subject = $_REQUEST['id'];
									$query2 = "SELECT * FROM subjects WHERE subject_id = '{$subject}'";
									$result2 = $conn->query($query2);
									$found_subj = $result2->fetch_assoc();
									if($found_subj == null)
									{
										echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												  <strong>Sorry! </strong> No Record Found For Subjject ';
										echo  '</div>';
									}
								}
								if(isset($_REQUEST['upd_subj_btn']))
								{									
									@$upd_subj_msg = update_subject();
									if($upd_subj_msg == "updated")
									{
										echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											   <strong>Success!</strong> Subject Updated Successfully.
											 </div>';	
									}
									else
									{
										echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												  <strong>Sorry!</strong> Subject Could NOT Be Updated . '.$upd_subj_msg;
										echo'</div>  <br>';
									}
									
								}
								$conn->close();
							?>

								<div class="panel-heading">
									<h3 class="panel-title">Subject</h3>
								</div>
								
								<div class="panel-body">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-book" style="width:70px"> # No</i></span>
										<input class="form-control" placeholder="Subject Id" type="text" name="subject_id" id="subject_id" 
										value="<?php if(isset($_REQUEST['get_subj_btn'])) { echo @$found_subj['subject_id']; } 
										else if((@$_GET['id']) != null) { echo @$found_subj['subject_id']; } else {} ?>" readonly required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-book" style="width:70px"> </i></span>
										<input class="form-control" placeholder="Subject Name" type="text" name="subjects" id="subjects" 
										value="<?php if(isset($_REQUEST['get_subj_btn'])) { echo @$found_subj['subjects']; } 
										else if((@$_GET['id']) != null) { echo @$found_subj['subjects']; } else {} ?>" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-book" style="width:70px"> </i></span>
										<input class="form-control" placeholder="Value" type="text" name="value" id="value" 
										value="<?php if(isset($_REQUEST['get_subj_btn'])) { echo @$found_subj['value']; } 
										else if((@$_GET['id']) != null) { echo @$found_subj['value']; } else {} ?>" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-group" style="width:70px"> Class</i></span>
										<select class="form-control" name="class" id="class" required>
											<?php
												$conn = db_connect(); 
												if(isset($_REQUEST['get_subj_btn']) || (@$_GET['id']) != null)
												{													 
													$query = "SELECT * FROM subjects WHERE subject_id = '{$subject}'";
													$result = $conn->query($query);
													WHILE($row = $result->fetch_assoc())
													{
														echo "<option value=\"".$row['class']."\">".$row['class']."</option>";
													}
													echo '<option value=""> Select Class </option>';
													$query2 = "SELECT DISTINCT class FROM subjects";
													$result2 = $conn->query($query2);
													WHILE($rows = $result2->fetch_assoc())
													{
														echo "<option value=\"".$rows['class']."\">".$rows['class']."</option>";
													}
												}												
												$conn->close();
											?>				
										</select>
									</div>
									
									<br>
									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>
										<button type="submit" class="btn btn-primary" name="upd_subj_btn">Update Subject</button>
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
		
		






		