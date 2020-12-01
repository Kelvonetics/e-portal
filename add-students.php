
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>	           <?php confirm_admin_login();  ?>


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
				<form action="upload.php?query=student" method="post" enctype="multipart/form-data">
					<div id="photo" class="modal fade" role="dialog">
					  <div class="modal-dialog">
					
						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Student Photo</h4>
						  </div>
					
							<div class="modal-body">
								<div class="form-group">
									<label for="name" class="control-label"> Photo</label>
									<input class="form-control" type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this);" required>
								</div>

								<div class="form-group">
									<label for="" class="control-label"> Photo</label>
									 <img id="blah" src="upload/avatar.jpg" class="img-circle" width="200" alt="Avatar" />
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
		<div class="main" style="width:82%;">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<form action="add-students" method="post">
					
					<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->
					<?php
						$conn = db_connect();
						if(isset($_REQUEST['new_stud_btn']))
						{							
							@$new_stud_msg = create_new_student($new_stud_msg);
							if($new_stud_msg == "studCreated")
							{
								echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
										   <strong>Success! </strong> First Step Successfully ! Upload Photo.
										   <button type="button" class="btn btn-default pull-right" name="load_pic" data-toggle="modal" data-target="#photo" style="margin:-8px 5px 0px 0px"><i class="fa fa-upload"></i> Upload Photo</button>
									  </div>';

							}
							
							else
							{
								echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry!</strong> New Student Could NOT Be Created.'.$new_stud_msg;
									 '</div>  <br>';
							}
							
						}
						
						if((@$_REQUEST['query'] == 'uploaded'))
						{		
							$ses_reg_no = $_SESSION['regist_no'];  $ses_class = $_SESSION['class'];  $ses_pix = $_SESSION['pic_path'];
							@$upload_msg =  upload_student_photo($ses_reg_no, $ses_class, $ses_pix);
							if($upload_msg == "uploaded")
							{
								echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									   <strong>Success!</strong> Photo Uploaded Successfully.
									 </div>';
							}
							
							else
							{
								echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry!</strong> Fail To Upload Photo. '.$upload_msg;
									 '</div>  <br>';
							}							
						}
						else if((@$_REQUEST['query'] == 'failed'))
						{
							echo '<div class="alert alert-warning" style="width:97.5%; margin:auto">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									   <strong>Exist! </strong> Fail To Upload Photo. Please  Re Upload Photo.
									   <button type="button" class="btn btn-default pull-right" name="load_pic" data-toggle="modal" data-target="#photo" style="margin:-8px 5px 0px 0px"><i class="fa fa-upload"></i> Upload. '.$upload_msg; echo 'Photo </button>
								  </div>';

						}
						if(isset($_REQUEST['get_stud_btn']))
						{
							$regist_no = $_REQUEST['get_stud_id'];
							$query = "SELECT * FROM student_users WHERE regist_no = '{$regist_no}'";
							if ($conn->query($query) === TRUE)
							{
								$found_user = $result->fetch_assoc();
							}
							else { $found_user = ''; }
						}
						$conn->close();
					?>
					
					
					<!-- SETTING THE THE NEW STUDENT UNIQUE REGISTRATION NUMBER -->
					<?php
						$table_name = 'student_users';
						$total = get_number_of_rec($table_name);
						$total += 1;
						$dated = getdate();
						$stud_reg_id;
						@$stud_reg_id .= 'STUD-';
						@$stud_reg_id .= $dated['year']; 
						if($total < 10)	{			@$stud_reg_id .= '-000';	}
						else if($total >= 10){		@$stud_reg_id .= '-00';		}
						else if($total >= 100){		@$stud_reg_id .= '-0'; 		}
						else if($total >= 1000){	@$stud_reg_id .= '-';		}
						$stud_reg_id .= $total;
					?>
					

						<div class=" col-md-6" style="">

							<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Student Personal Details</h3>
								</div>
								
								<div class="panel-body">
									<div class="input-group">
										<span class="input-group-addon">N</span>
										<input class="form-control" type="text" name="stud_id" id="stud_id" 
										value="<?php if(isset($_REQUEST['get_stud_btn'])) { echo @$found_user['regist_no']; } else { echo $stud_reg_id; } ?>" readonly required>
									</div>
									<br>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input class="form-control" placeholder="Firstname" type="text" name="f_name" id="f_name" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input class="form-control" placeholder="Othername" type="text" name="m_name" id="m_name" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input class="form-control" placeholder="Lastname" type="text" name="l_name" id="l_name" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input class="form-control" placeholder="Password" type="password" name="p_word" id="p_word" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input class="form-control" placeholder="Confirm Password" type="password" name="re_pword" id="re_pword" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										<input class="form-control" placeholder="E-mail" type="email" name="e_mail" id="e_mail" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-phone"></i></span>
										<input class="form-control" placeholder="Student / Gaurdian Phone" name="s_phone" id="s_phone" type="text" required>
									</div>
									<div class="input-group">
										<input class="form-control" placeholder="School" name="s_school" id="s_school" type="hidden" value="Heaven Rock School" required>
									</div>
									<br>
									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>	
									</div>
								</div>	
							</div>
						<!-- END INPUT GROUPS -->
							
						</div>
						
						
						<div class=" col-md-6" style="">
						
							<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Student Contact Details</h3>
								</div>
								
								<div class="panel-body">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-group"></i></span>
										<select class="form-control" name="s_class" id="s_class" required>
										<option value=""> Select Student Class </option>
											<?php
												$conn = db_connect();
												$query = "SELECT * FROM class";
												$result = $conn->query($query);
												WHILE($row = $result->fetch_assoc())
												{
													echo "<option class='option' value=\"".$row['class']."\">".$row['values']."</option>";
												}											
											?>											
										</select>
									</div>
									
									<br>
									<p>									
										<label class="fancy-radio pull-left" style="margin:auto 1% auto 7%">
											<input name="gender" name="male" id="male" value="male" type="radio">
											<span><i></i> Male</span>
										</label>
										<label class="fancy-radio pull-left" style="margin:auto 1% auto 2%">
											<input name="gender" name="female" id="female" value="female" type="radio">
											<span><i></i> Female</span>

											<input  name="s_gender" id="s_gender" type="hidden">
										
									</p>
									<br>
									<div class="input-group">
										<div class="input-group-addon"> <i class="fa fa-calendar"></i>    </div>
										<input class="form-control" id="s_dob" name="s_dob" placeholder="Date Of Birth" type="text"/>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<select class="form-control" name="s_session" id="s_session" required>
										<option value=""> Select Session </option>
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
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-group"></i></span>
										<select class="form-control" name="s_category" id="s_category" required>
											<option value=""> Select Student Category </option>
											<option value="Day Student"<?php if(@$found_user['category'] == 'Day Student'){	echo " selected"; } ?>> Day Student </option>
											<option value="Boarding Student"<?php if(@$found_user['category'] == 'Boarding Student'){	echo " selected"; } ?>> Boarding Student </option>	
										</select>
									</div>

									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-globe"></i></span>
										<select class="form-control" name="s_state" id="s_state" required>
										<option value="" selected="selected"> Select State </option>
										  <option value="Abuja FCT"<?php if(@$found_user['state'] == 'Abuja FCT'){	echo " selected"; } ?>>Abuja FCT</option>
										  <option value="Abia State"<?php if(@$found_user['state'] == 'Abia State'){	echo " selected"; } ?>>Abia State</option>
										  <option value="Adamawa State"<?php if(@$found_user['state'] == 'Adamawa State'){	echo " selected"; } ?>>Adamawa State</option>
										  <option value="Akwa Ibom State"<?php if(@$found_user['state'] == 'Akwa Ibom State'){echo " selected"; } ?>>Akwa Ibom State</option>
										  <option value="Anambra State"<?php if(@$found_user['state'] == 'Anambra State'){	echo " selected"; } ?>>Anambra State</option>
										  <option value="Bauchi State"<?php if(@$found_user['state'] == 'Bauchi State'){echo " selected"; } ?>>Bauchi State</option>
										  <option value="Bayelsa State"<?php if(@$found_user['state'] == 'Bayelsa State'){	echo " selected"; } ?>>Bayelsa State</option>
										  <option value="Benue State"<?php if(@$found_user['state'] == 'Benue State'){	echo " selected"; } ?>>Benue State</option>
										  <option value="Borno State"<?php if(@$found_user['state'] == 'Borno State'){	echo " selected"; } ?>>Borno State</option>
										  <option value="Cross River"<?php if(@$found_user['state'] == 'Cross River State'){ echo " selected"; } ?>>Cross River</option>
										  <option value="Delta State"<?php if(@$found_user['state'] == 'Delta State'){	echo " selected"; } ?>>Delta State</option>
										  <option value="Ebonyi State"<?php if(@$found_user['state'] == 'Ebonyi State'){	echo " selected"; } ?>>Ebonyi State</option>
										  <option value="Edo State"<?php if(@$found_user['state'] == 'Edo State'){	echo " selected"; } ?>>Edo State</option>
										  <option value="Ekiti State"<?php if(@$found_user['state'] == 'Ekiti State'){	echo " selected"; } ?>>Ekiti State</option>
										  <option value="Enugu State"<?php if(@$found_user['state'] == 'Enugu State'){	echo " selected"; } ?>>Enugu State</option>
										  <option value="Gombe State"<?php if(@$found_user['state'] == 'Gombe State'){	echo " selected"; } ?>>Gombe State</option>
										  <option value="Imo State"<?php if(@$found_user['state'] == 'Imo State'){	echo " selected"; } ?>>Imo State</option>
										  <option value="Jigawa State"<?php if(@$found_user['state'] == 'Jigawa State'){	echo " selected"; } ?>>Jigawa State</option>
										  <option value="Kaduna State"<?php if(@$found_user['state'] == 'Kaduna State'){	echo " selected"; } ?>>Kaduna State</option>
										  <option value="Kano State"<?php if(@$found_user['state'] == 'Kano State'){	echo " selected"; } ?>>Kano State</option>
										  <option value="Katsina State"<?php if(@$found_user['state'] == 'Katsina State'){	echo " selected"; } ?>>Katsina State</option>
										  <option value="Kebbi State"<?php if(@$found_user['state'] == 'Kebbi State'){	echo " selected"; } ?>>Kebbi State</option>
										  <option value="Kogi State"<?php if(@$found_user['state'] == 'Kogi State'){	echo " selected"; } ?>>Kogi State</option>
										  <option value="Kwara State"<?php if(@$found_user['state'] == 'Kwara State'){	echo " selected"; } ?>>Kwara State</option>
										  <option value="Lagos State"<?php if(@$found_user['state'] == 'Lagos State'){	echo " selected"; } ?>>Lagos State</option>
										  <option value="Nassarawa State"<?php if(@$found_user['state'] == 'Nassarawa State'){echo " selected"; } ?>>Nassarawa State</option>
										  <option value="Niger State"<?php if(@$found_user['state'] == 'Niger State'){	echo " selected"; } ?>>Niger State</option>
										  <option value="Ogun State"<?php if(@$found_user['state'] == 'Ogun State'){	echo " selected"; } ?>>Ogun State</option>
										  <option value="Ondo State"<?php if(@$found_user['state'] == 'Ondo State'){	echo " selected"; } ?>>Ondo State</option>
										  <option value="Osun State"<?php if(@$found_user['state'] == 'Osun State'){	echo " selected"; } ?>>Osun State</option>
										  <option value="Oyo State"<?php if(@$found_user['state'] == 'Oyo State'){	echo " selected"; } ?>>Oyo State</option>
										  <option value="Plateau State"<?php if(@$found_user['state'] == 'Plateau State'){	echo " selected"; } ?>>Plateau State</option>
										  <option value="Rivers State"<?php if(@$found_user['state'] == 'Rivers State'){	echo " selected"; } ?>>Rivers State</option>
										  <option value="Sokoto State"<?php if(@$found_user['state'] == 'Sokoto State'){	echo " selected"; } ?>>Sokoto State</option>
										  <option value="Taraba State"<?php if(@$found_user['state'] == 'Taraba State'){	echo " selected"; } ?>>Taraba State</option>
										  <option value="Yobe State"<?php if(@$found_user['state'] == 'Yobe State'){	echo " selected"; } ?>>Yobe State</option>
										  <option value="Zamfara State"<?php if(@$found_user['state'] == 'Zamfara State'){	echo " selected"; } ?>>Zamfara State</option>
											<option value="Outside Nigeria"<?php if(@$found_user['state'] == 'Outside Nigeria'){	echo " selected"; } ?>>Outside Nigeria</option>											
										</select>
									</div>
									<br>
									
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-globe"></i></span>
										<select class="form-control" name="s_nation" id="s_nation" required>
										<option value="" selected="selected"> Select Nationality </option>
										  <option value="Nigeria"> Nigerian </option>	
										  <option value="Others"> Outside Nigeria </option>
										</select>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
										<textarea class="form-control" name="s_address" id="s_address" placeholder="Address" rows="2"></textarea>
									</div>
									<br>
									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>
										<button type="submit" class="btn btn-primary" name="new_stud_btn">Create Student</button>
									</div>
								</div>
							</div>
						<!-- END INPUT GROUPS -->
						
						</div>
					
					
					</form>
		

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		</div>
		<!-- END MAIN -->
		
		
		
		
		
		
	<?php include('layout/bottom-footer.php') ?>		
		
		





<script>
	$(document).ready(function(){
		var date_input=$('input[name="s_dob"]'); //our date input has the name "date"
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



		