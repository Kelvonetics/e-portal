
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
				<form action="upload?query=student" method="post" enctype="multipart/form-data">
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
									 <img id="blah" src="#" alt="your image" />
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
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
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
										  <strong>Sorry!</strong> Fail To Upload Photo.'.$upload_msg;
									 '</div>  <br>';
							}							
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
					
					
					<div class="">

						<div class=" col-md-6" style="border:thin dotted #f9f9f9">

							<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Result</h3>
								</div>
								
								<div class="panel-body">
									<div class="input-group">
										<span class="input-group-addon">N</span>
										<input class="form-control" type="text" name="stud_id" id="stud_id" 
										value="" readonly required>
									</div>
									<br>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input class="form-control" placeholder="Firstname" type="text" name="f_name" id="f_name" 
										value="" required>
									</div>
									
									<br>
									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>	
									</div>
								</div>	
							</div>
						<!-- END INPUT GROUPS -->
							
						</div>
						
						
						<div class=" col-md-6" style="border:thin dotted #f9f9f9">
						
							<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Results</h3>
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
									<div class="input-group">
										<div class="input-group-addon"> <i class="fa fa-calendar"></i>    </div>
										<input class="form-control" id="s_dob" name="s_dob" placeholder="Date Of Birth" type="text"/>
									</div>

									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>
										<button type="submit" class="btn btn-primary" name="new_rest_btn">Create Result</button>
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
		
		




<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

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



		