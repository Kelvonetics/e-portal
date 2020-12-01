
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_admin_login();  ?>


	
	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		
			
			
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<form action="edit-position" method="post">

					<div class="">

						<div class=" col-md-8 col-md-offset-2" style="border:thin dotted #f9f9f9">

							<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">  <!-- LOGICS TO CREATE UPDATE AND ADD POSITION -->
									<?php
										$conn = db_connect();
										//from view
										if((@$_GET['id']) != null)
										{
											$p_id = $_REQUEST['id'];
											if($p_id != null)
											{											
												$query = "SELECT * FROM staff_position WHERE id = '{$p_id}'";
												$result = $conn->query($query);
												$found_posit = $result->fetch_assoc();
											}
										}																						
										
										if(isset($_REQUEST['upd_posit_btn']))
										{											
											@$upd_posit_msg = update_position();
											if($upd_posit_msg == "updated")
											{
												echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														   <strong>Success! </strong> Position Updated Successfully .
													  </div>';	
											}
											else
											{
												echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Sorry!</strong> New Position Could NOT Be Updated.'.$upd_posit_msg;
													 '</div>  <br>';
											}
											
										}
										$conn->close();
									?>
									<h3 class="panel-title">Staff Position</h3>
								</div>
								
								<div class="panel-body">
									<div class="input-group">
										<input class="form-control" placeholder="Staff Position Id" type="hidden" name="id" id="id" 
										value="<?php if((@$_GET['id']) != null) { echo @$found_posit['id']; } else {  } ?>" required>
									</div>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-street-view"></i></span>
										<input class="form-control" placeholder="Staff Position" type="text" name="position" id="position" 
										value="<?php if((@$_GET['id']) != null) { echo @$found_posit['position']; } else {  } ?>" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control" name="description" id="description" placeholder="Staff Description" rows="3" required><?php if((@$_GET['id']) != null) { echo @$found_posit['description']; } else {  } ?></textarea>
									</div>							
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-users"></i></span>
										<input class="form-control" placeholder="Staff Role" type="text" name="role" id="role" value="Staff" readonly required>
									</div>
									<br>
										
									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>
										<button type="submit" class="btn btn-primary" name="upd_posit_btn">Update Position</button>
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
		
		

	
	
	
	
	
	
	
	


		