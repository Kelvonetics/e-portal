
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_login();  ?>


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
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<form action="add-question" method="post">
					
					<div class="">

						<div class=" col-md-6 col-md-offset-3" style="border:thin dotted #f9f9f9">

							<!-- INPUT GROUPS -->
							<div class="panel">
							<!-- LOGICS TO CREATE UPDATE AND VIEW QUESTION -->
					<?php
						$conn = db_connect();
						if(isset($_REQUEST['new_quest_btn']))
						{							
							@$new_quest_msg = create_new_question($new_quest_msg);
							if($new_quest_msg == "questCreated")
							{
								echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										   <strong>Success! </strong> Question Created Successfully.
									  </div>';
							}
							else
							{
								echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry!</strong> New Question NOT Created .'.$new_quest_msg;
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
								<div class="panel-heading">
									<h3 class="panel-title">Question</h3>
								</div>
								
								<div class="panel-body">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-book"></i></span>
										<select class="form-control" name="q_subj" id="q_subj" required>
											<option value=""> Select Subject </option>
											<?php
												$conn = db_connect();
												$query = "SELECT * FROM subjects";
												$result = $conn->query($query);
												WHILE($row = $result->fetch_assoc())
												{
													echo "<option class='option' value=\"".$row['subjects']."\">".$row['value']."</option>";
												}
												$conn->close();								
											?>				
										</select>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-group"></i></span>
										<select class="form-control" name="q_class" id="q_class" required>
											<option value=""> Select Class </option>
											<option value="class1"> Class One</option>
											<option value="class2"> Class Two </option>
											<option value="class3"> Class Three </option>
											<option value="class4"> Class Four</option>
											<option value="class5"> Class Five </option>
											<option value="class6"> Class Six </option>					
										</select>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-text-width"></i></span>
										<select class="form-control" name="q_term" id="q_term" required>
											<option value=""> Select Term </option>
											<option value="first"> First Term </option>
											<option value="second"> Second Term </option>
											<option value="third"> Third Term </option>											
										</select>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-question"></i></span>
										<textarea class="form-control" name="q_quest" id="q_quest" placeholder="Question" rows="2"></textarea>
									</div>
									<br>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-question"></i></span>
										<input class="form-control" placeholder="Option A" type="text" name="opt_A" id="opt_A" required>
									</div>
									<br>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-question"></i></span>
										<input class="form-control" placeholder="Option B" type="text" name="opt_B" id="opt_B" required>
									</div>
									<br>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-question"></i></span>
										<input class="form-control" placeholder="Option C" type="text" name="opt_C" id="opt_C" required>
									</div>
									<br>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-question"></i></span>
										<input class="form-control" placeholder="Option D" type="text" name="opt_D" id="opt_D" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<select class="form-control" name="q_answer" id="q_answer" required>
											<option value=""> Select Answer </option>
											<option value="A"> Option A</option>
											<option value="B"> Option B </option>
											<option value="C"> Option C </option>
											<option value="D"> Option D </option>											
										</select>
									</div>
									
									<br>
									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>
										<button type="submit" class="btn btn-primary" name="new_quest_btn">Create Question</button>
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



		