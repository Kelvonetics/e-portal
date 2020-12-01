
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_admin_login();  ?>


	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		

		
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<form action="add-academic-session" method="post">

					<div class="">
					
					<!-- LOGICS TO CREATE UPDATE AND VIEW STAFF -->
					<?php
						$conn = db_connect();
						if(isset($_REQUEST['new_session_btn']))
						{							
							@$new_session_msg = create_academic_session();
							if($new_session_msg == "sessionCreated")
							{
								echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										   <strong>Success! </strong> New Academic Session Created Successfully .
									  </div>';
							}
							else if($new_session_msg == "exist")
							{
								echo '<div class="alert alert-warning" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry!</strong> Academic Session Already Exist.';
								echo '</div>  <br>';
							}
							else
							{
								echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry!</strong> New Academic Session Could NOT Be Created.'.$new_session_msg;
									 '</div>  <br>';
							}
							
						}

						$conn->close();
					?>
				
						<div class="col-md-12">
								
							<div class="panel">								
								<div class="panel-body">
								<div class="input-group pull-left" style="">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<select class="form-control" name="session" id="session" required>
									<option value=""> Select Academic Session </option>
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

							</div>
							
						</div>

						<div class=" col-md-4" style="border:thin dotted #f9f9f9">

							<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">
								
								
									<h3 class="panel-title">First Term</h3>
								</div>
								
								<div class="panel-body">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="Session Start" type="text" name="f_term_start" id="f_term_start" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="First Test" type="text" name="ft_first_test" id="ft_first_test" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="First Break" type="text" name="ft_first_break" id="ft_first_break">
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="Mid Term Break" name="ft_mid_term" id="ft_mid_term" type="text" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="Second Test" name="ft_second_test" id="ft_second_test" type="text" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="Second Break" name="ft_second_break" id="ft_second_break" type="text">
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="First Term Exams" name="f_term_exams" id="f_term_exams" type="text" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="End Of First Term" name="f_term_end" id="f_term_end" type="text" required>
									</div>

								</div>	
							</div>
						<!-- END INPUT GROUPS -->
							
						</div>
						
						<div class=" col-md-4" style="border:thin dotted #f9f9f9">

							<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">
								
								
									<h3 class="panel-title">Second Term</h3>
								</div>
								
								<div class="panel-body">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="Second Term Start" type="text" name="s_term_start" id="s_term_start" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="First Test" type="text" name="st_first_test" id="st_first_test" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="First Break" type="text" name="st_first_break" id="st_first_break">
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="Mid Term Break" name="st_mid_term" id="st_mid_term" type="text" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="Second Test" name="st_second_test" id="st_second_test" type="text" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="Second Break" name="st_second_break" id="st_second_break" type="text">
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="Second Term Exams" name="s_term_exams" id="s_term_exams" type="text" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="End Of Second Term" name="s_term_end" id="s_term_end" type="text" required>
									</div>
								</div>	
							</div>
						<!-- END INPUT GROUPS -->
							
						</div>
						
						<div class=" col-md-4" style="border:thin dotted #f9f9f9">

							<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">
								
								
									<h3 class="panel-title">Third Term</h3>
								</div>
								
								<div class="panel-body">
									
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="Third Term Start" type="text" name="t_term_start" id="t_term_start" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="First Test" type="text" name="tt_first_test" id="tt_first_test" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="First Break" type="text" name="tt_first_break" id="tt_first_break">
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="Mid Term Break" name="tt_mid_term" id="tt_mid_term" type="text" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="Second Test" name="tt_second_test" id="tt_second_test" type="text" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="Second Break" name="tt_second_break" id="tt_second_break" type="text">
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="Third Term Exams" name="t_term_exams" id="t_term_exams" type="text" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control" placeholder="End Of Academic Session" name="t_term_end" id="t_term_end" type="text" required>
									</div>
									
								</div>	
							</div>
						<!-- END INPUT GROUPS -->
							
						</div>
						
						
						
						<div class="col-md-12">
								
							<div class="panel">								
								<div class="panel-body">

								<div class="input-group pull-right">
									<button type="reset" class="btn btn-default">Clear</button>
									<button type="submit" class="btn btn-primary" name="new_session_btn">Create Academic Session</button>
								</div>
								
								</div>

							</div>
							
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
		var date_input=$('input[name="f_term_start"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="ft_first_test"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="ft_first_break"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="ft_mid_term"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="ft_second_test"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="ft_second_break"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="f_term_exams"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="f_term_end"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		
		
		var date_input=$('input[name="s_term_start"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="st_first_test"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="st_first_break"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="st_mid_term"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="st_second_test"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="st_second_break"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="s_term_exams"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="s_term_end"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		
		var date_input=$('input[name="t_term_start"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="tt_first_test"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="tt_first_break"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="tt_mid_term"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="tt_second_test"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="tt_second_break"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="t_term_exams"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
		
		var date_input=$('input[name="t_term_end"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({format: 'yyyy-M-dd',	container: container,	todayHighlight: true,	autoclose: true,	})
	})
</script>


<script>
	function checkTerm()
	{  
		var term = document.getElementById('term').value;
		if(term.unchecked){ alert('Term Field Is Required'); }
	}
	

	
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



		