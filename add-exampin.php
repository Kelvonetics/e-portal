
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_admin_login();  ?>



	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		
					
		
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					
					
					<div class="">

						<div class=" col-md-6 col-md-offset-3" style="border:thin dotted #f9f9f9">

							<!-- INPUT GROUPS -->
							<div class="panel">
							<!-- LOGICS TO CREATE UPDATE AND VIEW QUESTION -->
					<?php
						$conn = db_connect();
						if(isset($_REQUEST['new_pin_btn']))
						{
							$class = filter_input(INPUT_POST, 'q_class', FILTER_SANITIZE_STRING);
							$subject = filter_input(INPUT_POST, 'q_subj', FILTER_SANITIZE_STRING);
							$term = filter_input(INPUT_POST, 'q_term', FILTER_SANITIZE_STRING);
							$exam_date = filter_input(INPUT_POST, 'exam_date', FILTER_SANITIZE_STRING);
							$createdby = filter_input(INPUT_POST, 'createdby', FILTER_SANITIZE_STRING);
							
							$exam_pin_msg = generate_pin($class, $subject, $term, $exam_date, $createdby);
							if($exam_pin_msg == 'generated')
							{
								echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										   <strong>Success! </strong> Exam PIN Generated For Students.
									  </div>';
							}
							else { 
									echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry!</strong> Fail To Generate Exam PIN .'.$exam_pin_msg;
									 echo '</div>';
								 }				
						}
						if(isset($_REQUEST['one_new_pin_btn']))
						{
							$reg_no = filter_input(INPUT_POST, 'regist_no', FILTER_SANITIZE_STRING);
							$class = filter_input(INPUT_POST, 'q_classed', FILTER_SANITIZE_STRING);
							$subject = filter_input(INPUT_POST, 'q_subj', FILTER_SANITIZE_STRING);
							$term = filter_input(INPUT_POST, 'q_term', FILTER_SANITIZE_STRING);
							$exam_date = filter_input(INPUT_POST, 'exam_date', FILTER_SANITIZE_STRING);
							$createdby = filter_input(INPUT_POST, 'createdby', FILTER_SANITIZE_STRING);
							
							$exam_pin_one_msg = generate_pin_one($class, $subject, $term, $reg_no, $exam_date, $createdby);
							if($exam_pin_one_msg == 'generated_one')
							{
								echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										   <strong>Success! </strong> Exam PIN Generated For One Student Successfully.
									  </div>';
							}
							else { 
									echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry!</strong> Fail To Generate Exam PIN For One Student .'.$exam_pin_one_msg;
									echo  '</div>';
								 }				
						}
						$conn->close();
					?>
								<div class="panel-heading">
									<h3 class="panel-title" id="h"> Generate Exam PIN For All Students</h3>
								</div>
								
								<!-- GENERATING PIN FOR ALL CLASS STUDENTS -->
								<form action="add-exampin" method="post">
								<div class="panel-body" id="all_panel">
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
										<div class="input-group-addon"> <i class="fa fa-calendar"></i>    </div>
										<input class="form-control" id="exam_date" name="exam_date" placeholder="Exam Date" type="text"/>
									</div>
									<br>

									<div class="input-group">
										<input class="form-control" placeholder=" " type="hidden" name="createdby" id="createdby"
										value="<?php echo @$_SESSION['firstname'].' '.@$_SESSION['lastname']; ?>" readonly required>
									</div>
									
									<label class="fancy-checkbox pull-left">
										<input type="checkbox" name="one" id="one">
										<span>Generate PIN For A Single Student</span>
									</label>
									
									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>
										<button type="submit" class="btn btn-primary" name="new_pin_btn">Generate PIN</button>
									</div>
								</div>	
								</form>
								
								
								<form action="add-exampin" method="post">
								<!-- GENERATING PIN FOR ONE STUDENT -->
								<div class="panel-body" id="one_panel" style="display:none">
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
											<option value="entrance subject"> Entrance Subject </option>
										</select>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-group"></i></span>
										<select class="form-control" name="q_classed" id="q_classed" required>
											<option value=""> Select Class </option>
											<option value="class1"> Class One</option>
											<option value="class2"> Class Two </option>
											<option value="class3"> Class Three </option>
											<option value="class4"> Class Four</option>
											<option value="class5"> Class Five </option>
											<option value="class6"> Class Six </option>	
											<option value="entrance"> Entrance Class </option>
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
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<select class="form-control" name="regist_no" id="regist_no" required>
											<option value=""> Select Registration Number </option>
															
										</select>
									</div>
									<br>
									<div class="input-group">
										<div class="input-group-addon"> <i class="fa fa-calendar"></i>    </div>
										<input class="form-control" id="exam_date" name="exam_date" placeholder="Exam Date" type="text"/>
									</div>
									<br>

									<div class="input-group">
										<input class="form-control" placeholder=" " type="hidden" name="createdby" id="createdby"
										value="<?php echo @$_SESSION['firstname'].' '.@$_SESSION['lastname']; ?>" readonly required>
									</div>
									
									<label class="fancy-checkbox pull-left">
										<input type="checkbox" name="all" id="all">
										<span>Generate PIN For ALL Students</span>
									</label>
									
									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>
										<button type="submit" class="btn btn-primary" name="one_new_pin_btn">Generate PIN</button>
									</div>
								</div>	
								</form>
								
								
							</div>
						<!-- END INPUT GROUPS -->
							
						</div>
						
						
						
					</div>

		

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
		var date_input=$('input[name="exam_date"]'); //our date input has the name "date"
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
		$('#one').on('change', function()
		{ 
		   if(this.checked) // if changed state is "CHECKED"
			{
				$('#one_panel').slideDown();         $('#all_panel').slideUp();	     this.checked = false; 
				document.getElementById('h').innerHTML = 'Generate Exam PIN For One Student';
			}
		})
		
		$('#all').on('change', function()
		{ 
		   if(this.checked) // if changed state is "CHECKED"
			{
				$('#all_panel').slideDown();			$('#one_panel').slideUp();	 this.checked = false;
				document.getElementById('h').innerHTML = 'Generate Exam PIN For All Students';
			}
		})

	})
</script>

 
 		
		
<script>
	$(document).ready(function()
	{
		$('#q_classed').change(function()
		{
			var q_class = $(this).val();
			$.ajax({
				url:"fetch_reg_no.php",
				method:"POST",
				data:{q_c:q_class},
				dataType:"text",
				success:function(data)
				{
					$('#regist_no').html(data);
				}
			});
		});
	});
</script>



		