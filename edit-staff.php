
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
		
			<!-- FILE UPLOAD MODAL FORM -->
			<form action="upload-staff.php?query=staff" method="post" enctype="multipart/form-data">
				<div id="photo" class="modal fade" role="dialog">
				  <div class="modal-dialog">
				
					<!-- Modal content-->
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Staff Photo</h4>
					  </div>
				
						<div class="modal-body">
							<div class="form-group">
								<label for="name" class="control-label"> Photo</label>
								<input class="form-control" type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this);" required>
							</div>

							<div class="form-group">
								<label for="" class="control-label"> Photo</label>
								 <img id="blah" src="upload/avatar.jpg" alt="your image" />
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default" type="reset"> Clear </button>
							<button class="btn btn-primary" type="submit" name="submit">Ok</button>
						</div>
						
				   </div>
				  </div>    
				</div>
			</form>	
	
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<form action="edit-staff" method="post">
					
					<!-- LOGICS TO CREATE UPDATE AND VIEW STAFF -->
					<?php
						$conn = db_connect();
						if(isset($_REQUEST['new_staff_btn']))
						{							
							@$new_staff_msg = create_new_staff($new_staff_msg);
							if($new_staff_msg == "staffCreated")
							{
								echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										   <strong>Success! </strong> First Step Successfully ! Upload Photo.
										   <button type="button" class="btn btn-default pull-right" name="load_pic" data-toggle="modal" data-target="#photo" style="margin:-8px 5px 0px 0px"><i class="fa fa-upload"></i> Upload Photo</button>
									  </div>';
							}
							else
							{
								echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry!</strong> New Staff Could NOT Be Created.'.$new_staff_msg;
									 '</div>  <br>';
							}
							
						}
						
						if((@$_REQUEST['query'] == 'uploaded'))
						{		
							$staff_id = $_SESSION['staff_id'];   $pic_path = $_SESSION['pic_path'];
							@$upload_msg =  upload_staff_photo($staff_id, $pic_path);
							if($upload_msg == "uploaded")
							{
								echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									   <strong>Success!</strong> Staff Photo Uploaded Successfully.
									 </div>';
							}
							else
							{
								echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry! </strong> Fail To Upload Staff Photo.'.$upload_msg;
									 '</div>  <br>';
							}							
						}
												
						if(isset($_REQUEST['get_staff_btn']))
						{
							$staff_id = $_REQUEST['get_staff_id'];							
							$query = "SELECT * FROM staff_users WHERE staff_id = '{$staff_id}'";
							$result = $conn->query($query);
							$found_staff = $result->fetch_assoc();
							if($found_staff == null)
							{
								echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry!</strong> No Record Found For Staff With ID : '.$staff_id.
									 '</div>';
							}
						}
						//from view
						else if((@$_GET['id']) != null)
						{    
							@$staff_id = $_GET['id'];  
							$query2 = "SELECT * FROM staff_users WHERE staff_id = '{$staff_id}'";
							$result2 = $conn->query($query2);
							$found_staff = $result2->fetch_assoc();
						}
						
						if(isset($_REQUEST['upd_staff_btn']))
						{							
							@$upd_staff_msg = update_staff();
							if($upd_staff_msg == "updated")
							{
								echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									   <strong>Success!</strong> Staff Details Updated Successfully.
									 </div>';	
							}
							else
							{
								echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry!</strong> Staff Details Could NOT Be Updated .'.$upd_staff_msg;
									 '</div>  <br>';
							}							
						}
						
						if(isset($_REQUEST['deact_btn']))
						{
							
							@$deact_staff_msg = deactivate_staff();
							if($deact_staff_msg == "deactivated")
							{
								echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									   <strong>Success!</strong> Staff Was Deactivated.
									 </div>';	
							}
							else
							{
								echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry!</strong> Staff Could NOT Be Deactivated .'.$deact_staff_msg;
									 '</div>  <br>';
							}
							
						}
						$conn->close();
					?>
					
					
					<!-- SETTING THE THE NEW STUDENT UNIQUE REGISTRATION NUMBER -->
					<?php
						$table_name = 'staff_users';
						$total = get_number_of_rec($table_name);
						$total += 1;
						$dated = getdate();
						$staff_reg_id;
						@$staff_reg_id .= 'STAFF-';
						@$staff_reg_id .= $dated['year']; 
						if($total < 10)			{ @$staff_reg_id .= '-000';	}
						else if($total >= 10)	{	@$staff_reg_id .= '-00';	}
						else if($total >= 100)	{  @$staff_reg_id .= '-0';	}
						else if($total >= 1000)	{  @$staff_reg_id .= '-';	}
						$staff_reg_id .= $total;
					?>
					
					<?php if(isset($_REQUEST['get_staff_btn']) || (@$_GET['id']) != null) { ?>
					<div class="">

						<div class=" col-md-6" style="border:thin dotted #f9f9f9">

							<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Staff Personal Details</h3>
								</div>
								
								<div class="panel-body">
									<div class="input-group">
										<span class="input-group-addon">N</span>
										<input class="form-control" type="text" name="staff_id" id="staff_id" 
										value="<?php if(isset($_REQUEST['get_staff_btn'])) { echo @$found_staff['staff_id']; } else if((@$_GET['id']) != null) { echo @$found_staff['staff_id']; } else { echo @$staff_reg_id; } ?>" readonly required>
									</div>
									<br>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input class="form-control" placeholder="Firstname" type="text" name="f_name" id="f_name"
										value="<?php if(isset($_REQUEST['get_staff_btn'])) { echo @$found_staff['firstname']; } else if((@$_GET['id']) != null) { echo @$found_staff['firstname']; } else { } ?>" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input class="form-control" placeholder="Lastname" type="text" name="l_name" id="l_name" 
										value="<?php if(isset($_REQUEST['get_staff_btn'])) { echo @$found_staff['lastname']; } else if((@$_GET['id']) != null) { echo @$found_staff['lastname']; } else { } ?>" required>
									</div>								

									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input class="form-control" placeholder="Password" type="password" name="p_word" id="p_word"
										value="<?php if(isset($_REQUEST['get_staff_btn'])) { echo @$found_staff['password']; } else if((@$_GET['id']) != null) { echo @$found_staff['password']; } else { } ?>" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input class="form-control" placeholder="Confirm Password" type="password" name="re_pword" id="re_pword" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										<input class="form-control" placeholder="E-mail" type="email" name="e_mail" id="e_mail"
										value="<?php if(isset($_REQUEST['get_staff_btn'])) { echo @$found_staff['email']; } else if((@$_GET['id']) != null) { echo @$found_staff['email']; } else {  } ?>" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-phone"></i></span>
										<input class="form-control" placeholder="Staff Phone" name="s_phone" id="s_phone" type="text" value="<?php if(isset($_REQUEST['get_staff_btn'])) { echo @$found_staff['phone']; } else if((@$_GET['id']) != null) { echo @$found_staff['phone']; } else {  } ?>" required>
									</div>
									<br>
									<p>									
										<label class="fancy-radio pull-left" style="margin:auto 1% auto 7%">
											<input name="gender" name="male" id="male" value="male" <?php if(@$found_staff['gender'] == 'Male'){ echo 'checked'; }  ?> type="radio">
											<span><i></i> Male</span>
										</label>
										<label class="fancy-radio pull-left" style="margin:auto 1% auto 2%">
											<input name="gender" name="female" id="female" value="female" type="radio" 
											<?php if(@$found_staff['gender'] == 'Female'){ echo 'checked'; } ?> >
											<span><i></i> Female</span>
										</label>
											<input  name="s_gender" id="s_gender" value="<?php if(isset($_REQUEST['get_staff_btn'])) { echo @$found_staff['gender']; } else if((@$_GET['id']) != null) { echo @$found_staff['gender']; }  else {} ?>" type="hidden">
										
									</p>
									<br>
									<div class="input-group">
										<div class="input-group-addon"> <i class="fa fa-calendar"></i>    </div>
										<input class="form-control" id="s_doj" name="s_doj" placeholder="Date Of Join" type="text" 
										value="<?php if(isset($_REQUEST['get_staff_btn'])) { echo @$found_staff['doj']; } else if((@$_GET['id']) != null) { echo @$found_staff['doj']; } else {  } ?>" required/>
									</div>									
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-street-view"></i></span>
										<select class="form-control" name="position" id="position" required>
										<?php
											$conn = db_connect(); 	$sf_id = @$found_staff['staff_id'];
											$query = "SELECT * FROM staff_users WHERE staff_id = '{$sf_id}'";
											$result = $conn->query($query);
											WHILE($row = $result->fetch_assoc())
											{
												echo "<option class='option' value=\"".$row['position']."\">".$row['position']."</option>";
											} 
											
											echo '<option value=""> Select Staff Position </option>';
											$query2 = "SELECT * FROM staff_position ORDER BY position";
											$result2 = $conn->query($query2);
											WHILE($rows = $result2->fetch_assoc())
											{
												echo "<option class='option' value=\"".$rows['position']."\">".$rows['position']."</option>";
											}
											$conn->close();											
										?>											
										</select>
									</div>
								</div>	
							</div>
						<!-- END INPUT GROUPS -->
							
						</div>
						
						
						<div class=" col-md-6" style="border:thin dotted #f9f9f9">
						
							<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Staff Contact Details</h3>
								</div>
								
								<div class="panel-body">																		
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
										<textarea class="form-control" name="s_address" id="s_address" placeholder="Address" rows="2"><?php if(isset($_REQUEST['get_staff_btn'])) { echo @$found_staff['address']; } else if((@$_GET['id']) != null) { echo @$found_staff['address']; } else { } ?></textarea>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-globe"></i></span>
										<select class="form-control" name="s_state" id="s_state" required>
										<option value=""> Select State </option>
										  <option value="Abuja FCT"<?php if(@$found_staff['state'] == 'Abuja FCT'){	echo " selected"; } ?>>Abuja FCT</option>
										  <option value="Abia State"<?php if(@$found_staff['state'] == 'Abia State'){	echo " selected"; } ?>>Abia State</option>
										  <option value="Adamawa State"<?php if(@$found_staff['state'] == 'Adamawa State'){	echo " selected"; } ?>>Adamawa State</option>
										  <option value="Akwa Ibom State"<?php if(@$found_staff['state'] == 'Akwa Ibom State'){echo " selected"; } ?>>Akwa Ibom State</option>
										  <option value="Anambra State"<?php if(@$found_staff['state'] == 'Anambra State'){	echo " selected"; } ?>>Anambra State</option>
										  <option value="Bauchi State"<?php if(@$found_staff['state'] == 'Bauchi State'){echo " selected"; } ?>>Bauchi State</option>
										  <option value="Bayelsa State"<?php if(@$found_staff['state'] == 'Bayelsa State'){	echo " selected"; } ?>>Bayelsa State</option>
										  <option value="Benue State"<?php if(@$found_staff['state'] == 'Benue State'){	echo " selected"; } ?>>Benue State</option>
										  <option value="Borno State"<?php if(@$found_staff['state'] == 'Borno State'){	echo " selected"; } ?>>Borno State</option>
										  <option value="Cross River"<?php if(@$found_staff['state'] == 'Cross River State'){ echo " selected"; } ?>>Cross River</option>
										  <option value="Delta State"<?php if(@$found_staff['state'] == 'Delta State'){	echo " selected"; } ?>>Delta State</option>
										  <option value="Ebonyi State"<?php if(@$found_staff['state'] == 'Ebonyi State'){	echo " selected"; } ?>>Ebonyi State</option>
										  <option value="Edo State"<?php if(@$found_staff['state'] == 'Edo State'){	echo " selected"; } ?>>Edo State</option>
										  <option value="Ekiti State"<?php if(@$found_staff['state'] == 'Ekiti State'){	echo " selected"; } ?>>Ekiti State</option>
										  <option value="Enugu State"<?php if(@$found_staff['state'] == 'Enugu State'){	echo " selected"; } ?>>Enugu State</option>
										  <option value="Gombe State"<?php if(@$found_staff['state'] == 'Gombe State'){	echo " selected"; } ?>>Gombe State</option>
										  <option value="Imo State"<?php if(@$found_staff['state'] == 'Imo State'){	echo " selected"; } ?>>Imo State</option>
										  <option value="Jigawa State"<?php if(@$found_staff['state'] == 'Jigawa State'){	echo " selected"; } ?>>Jigawa State</option>
										  <option value="Kaduna State"<?php if(@$found_staff['state'] == 'Kaduna State'){	echo " selected"; } ?>>Kaduna State</option>
										  <option value="Kano State"<?php if(@$found_staff['state'] == 'Kano State'){	echo " selected"; } ?>>Kano State</option>
										  <option value="Katsina State"<?php if(@$found_staff['state'] == 'Katsina State'){	echo " selected"; } ?>>Katsina State</option>
										  <option value="Kebbi State"<?php if(@$found_staff['state'] == 'Kebbi State'){	echo " selected"; } ?>>Kebbi State</option>
										  <option value="Kogi State"<?php if(@$found_staff['state'] == 'Kogi State'){	echo " selected"; } ?>>Kogi State</option>
										  <option value="Kwara State"<?php if(@$found_staff['state'] == 'Kwara State'){	echo " selected"; } ?>>Kwara State</option>
										  <option value="Lagos State"<?php if(@$found_staff['state'] == 'Lagos State'){	echo " selected"; } ?>>Lagos State</option>
										  <option value="Nassarawa State"<?php if(@$found_staff['state'] == 'Nassarawa State'){echo " selected"; } ?>>Nassarawa State</option>
										  <option value="Niger State"<?php if(@$found_staff['state'] == 'Niger State'){	echo " selected"; } ?>>Niger State</option>
										  <option value="Ogun State"<?php if(@$found_staff['state'] == 'Ogun State'){	echo " selected"; } ?>>Ogun State</option>
										  <option value="Ondo State"<?php if(@$found_staff['state'] == 'Ondo State'){	echo " selected"; } ?>>Ondo State</option>
										  <option value="Osun State"<?php if(@$found_staff['state'] == 'Osun State'){	echo " selected"; } ?>>Osun State</option>
										  <option value="Oyo State"<?php if(@$found_staff['state'] == 'Oyo State'){	echo " selected"; } ?>>Oyo State</option>
										  <option value="Plateau State"<?php if(@$found_staff['state'] == 'Plateau State'){	echo " selected"; } ?>>Plateau State</option>
										  <option value="Rivers State"<?php if(@$found_staff['state'] == 'Rivers State'){	echo " selected"; } ?>>Rivers State</option>
										  <option value="Sokoto State"<?php if(@$found_staff['state'] == 'Sokoto State'){	echo " selected"; } ?>>Sokoto State</option>
										  <option value="Taraba State"<?php if(@$found_staff['state'] == 'Taraba State'){	echo " selected"; } ?>>Taraba State</option>
										  <option value="Yobe State"<?php if(@$found_staff['state'] == 'Yobe State'){	echo " selected"; } ?>>Yobe State</option>
										  <option value="Zamfara State"<?php if(@$found_staff['state'] == 'Zamfara State'){	echo " selected"; } ?>>Zamfara State</option>
											<option value="Outside Nigeria"<?php if(@$found_staff['state'] == 'Outside Nigeria'){	echo " selected"; } ?>>Outside Nigeria</option>											
										</select>
									</div>
									<br>
									
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<select class="form-control" name="s_nation" id="s_nation" required>
										<?php
											$conn = db_connect(); 	$sf_id = @$found_staff['staff_id'];
											$query = "SELECT * FROM staff_users WHERE staff_id = '{$sf_id}'";
											$result = $conn->query($query);
											WHILE($row = $result->fetch_assoc())
											{
												echo "<option class='option' value=\"".$row['nationality']."\">".$row['nationality']."</option>";
											}
										  $conn->close();
										?>
											<option value=""> Select Nationality </option>
										  <option value="Nigeria"> Nigerian </option>	
										  <option value="Others"> Outside Nigeria </option>
										</select>
									</div>
									
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-mortar-board"></i></span>
										<select class="form-control" name="subj1" id="subj1" required>
										<?php
											$conn = db_connect(); 	$sf_id = @$found_staff['staff_id'];
											$query = "SELECT * FROM staff_users WHERE staff_id = '{$sf_id}'";
											$result = $conn->query($query);
											WHILE($row = $result->fetch_assoc())
											{
												echo "<option class='option' value=\"".$row['subject_1']."\">".$row['subject_1']."</option>";
											} 
											
											echo '<option value=""> Select Staff First Subject </option>';
											$query2 = "SELECT * FROM subjects ORDER BY value";
											$result2 = $conn->query($query2);
											WHILE($rows = $result2->fetch_assoc())
											{
												echo "<option class='option' value=\"".$rows['subjects']."\">".$rows['value']."</option>";
											}
											$conn->close();											
										?>											
										</select>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-mortar-board"></i></span>
										<select class="form-control" name="subj2" id="subj2" required>
										<?php
											$conn = db_connect(); 	$sf_id = @$found_staff['staff_id'];
											$query = "SELECT * FROM staff_users WHERE staff_id = '{$sf_id}'";
											$result = $conn->query($query);
											WHILE($row = $result->fetch_assoc())
											{
												echo "<option class='option' value=\"".$row['subject_2']."\">".$row['subject_2']."</option>";
											} 											
											
											echo '<option value=""> Select Staff Second Subject </option>';
											$query2 = "SELECT * FROM subjects ORDER BY value";
											$result2 = $conn->query($query2);
											WHILE($rows = $result2->fetch_assoc())
											{
												echo "<option class='option' value=\"".$rows['subjects']."\">".$rows['value']."</option>";
											}
											$conn->close();											
										?>											
										</select>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-mortar-board"></i></span>
										<select class="form-control" name="subj3" id="subj3" required>
										<?php
											$conn = db_connect(); 	$sf_id = @$found_staff['staff_id'];
											$query = "SELECT * FROM staff_users WHERE staff_id = '{$sf_id}'";
											$result = $conn->query($query);
											WHILE($row = $result->fetch_assoc())
											{
												echo "<option class='option' value=\"".$row['subject_3']."\">".$row['subject_3']."</option>";
											} 
											
											echo '<option value=""> Select Staff Third Subject </option>';
											$query2 = "SELECT * FROM subjects ORDER BY value";
											$result2 = $conn->query($query2);
											WHILE($rows = $result2->fetch_assoc())
											{
												echo "<option class='option' value=\"".$rows['subjects']."\">".$rows['value']."</option>";
											}
											$conn->close();											
										?>											
										</select>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-mortar-board"></i></span>
										<select class="form-control" name="subj4" id="subj4" required>
										<?php
											$conn = db_connect(); 	$sf_id = @$found_staff['staff_id'];
											$query = "SELECT * FROM staff_users WHERE staff_id = '{$sf_id}'";
											$result = $conn->query($query);
											WHILE($row = $result->fetch_assoc())
											{
												echo "<option class='option' value=\"".$row['subject_4']."\">".$row['subject_4']."</option>";
											} 
											
											echo '<option value=""> Select Staff Fourth Subject </option>';
											$query2 = "SELECT * FROM subjects ORDER BY value";
											$result2 = $conn->query($query2);
											WHILE($rows = $result2->fetch_assoc())
											{
												echo "<option class='option' value=\"".$rows['subjects']."\">".$rows['value']."</option>";
											}
											$conn->close();											
										?>											
										</select>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-mortar-board"></i></span>
										<select class="form-control" name="subj5" id="subj5" required>
										<?php
												$conn = db_connect(); 	$sf_id = @$found_staff['staff_id'];
												$query = "SELECT * FROM staff_users WHERE staff_id = '{$sf_id}'";
												$result = $conn->query($query);
												WHILE($row = $result->fetch_assoc())
												{
													echo "<option class='option' value=\"".$row['subject_5']."\">".$row['subject_5']."</option>";
												} 
											
												echo '<option value=""> Select Staff Fifth Subject </option>';
												$query2 = "SELECT * FROM subjects ORDER BY value";
												$result2 = $conn->query($query2);
												WHILE($rows = $result2->fetch_assoc())
												{
													echo "<option class='option' value=\"".$rows['subjects']."\">".$rows['value']."</option>";
												}
												$conn->close();											
											?>											
										</select>
									</div>
									<br>
									<button type="submit" class="btn btn-danger pull-left" name="deact_btn">Deactivate</button>
									
									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>
										<button type="submit" class="btn btn-primary" name="upd_staff_btn">Update Staff</button>
									</div>
								</div>
							</div>
						<!-- END INPUT GROUPS -->
						
						</div>
					
					
					
						<div class=" col-md-4 col-md-offset-4" style="border:thin dotted #f9f9f9">
						
							<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Staff Profile Photo</h3>
								</div>
								
								<div class="panel-body">
									<p style="height:100%;width:100%">
										<img src="upload/<?php echo @$found_staff['photo']; ?>" height="200" width="350" alt=" <?php echo $found_staff['photo']; ?> ">
									</p>
									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#photo" style=""><i class="fa fa-upload"></i> </button>
								</div>
							</div>
						
						</div>
					
					
					
					
					
					
					</div>
					<?php } ?>
					</form>
		

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		</div>
		<!-- END MAIN -->
		
		
		
		
		
		
	<?php include('layout/bottom-footer.php') ?>		
		
		




<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="s_doj"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>


<script>
	$(document).ready(function()
	{
		$('#male').on('change', function()
		{ 
		   if(this.checked) // if changed state is "CHECKED"
			{
				$('#s_gender').val('Male');	
			}
		})
		
		$('#female').on('change', function()
		{ 
		   if(this.checked) // if changed state is "CHECKED"
			{
				$('#s_gender').val('Female');	
			}
		})
	})
</script>



		