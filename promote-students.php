
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
									if(isset($_REQUEST['stud_prom_btn']))
									{	
										$current_class = filter_input(INPUT_POST, 'q_class', FILTER_SANITIZE_STRING);
										$session = filter_input(INPUT_POST, 'q_sess', FILTER_SANITIZE_STRING);
										$prom_stud_msg = promote_students();
										if($prom_stud_msg == 'promoted')
										{
											echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
													<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													   <strong>Success! </strong> Students In '.$current_class.' For '.$session.'Session  Promoted To The Next Class.
												  </div>';
										}
										else { 
												echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
													<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													  <strong>Sorry!</strong> Fail To Promote Students .'.$prom_stud_msg;
												echo  '</div>';
											 }
									}
									if(isset($_REQUEST['one_stud_prom_btn']))
									{
										$reg_no = filter_input(INPUT_POST, 'regist_no', FILTER_SANITIZE_STRING);
										$class = filter_input(INPUT_POST, 'q_classed', FILTER_SANITIZE_STRING);
										$createdby = filter_input(INPUT_POST, 'createdby', FILTER_SANITIZE_STRING);
										
										$one_prom_stud_msg = one_promote_student($class, $reg_no, $createdby);
										if($one_prom_stud_msg == 'promoted_one')
										{
											echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
													<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													   <strong>Success! </strong> One Student Promoted To The Next Class.
												  </div>';
										}
										else { 
												echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
													<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													  <strong>Sorry!</strong> Fail To Promote One Student .'.$one_prom_stud_msg;
												echo  '</div>';
											 }				
									}
									$conn->close();
								?>
								<div class="panel-heading">
									<h3 class="panel-title" id="h">Promote Students</h3>
								</div>
								
								<!-- GENERATING PIN FOR ALL CLASS STUDENTS -->
								<form action="promote-students" method="post">
								<div class="panel-body" id="all_panel">

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
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<select class="form-control" name="q_sess" id="q_sess" required>
											<option value=""> Select  Session </option>
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

									<div class="input-group">
										<input class="form-control" placeholder=" " type="hidden" name="createdby" id="createdby"
										value="<?php echo @$_SESSION['firstname'].' '.@$_SESSION['lastname']; ?>" readonly required>
									</div>
									<br>
									<label class="fancy-checkbox pull-left">
										<input type="checkbox" name="one" id="one">
										<span>Promote A Single Student</span>
									</label>
									
									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>
										<button type="submit" class="btn btn-primary" name="stud_prom_btn">Promote Students</button>
									</div>
								</div>	
								</form>
								
								
								<form action="promote-students" method="post">
								<!-- PROMOTING  STUDENT -->
								<div class="panel-body" id="one_panel" style="display:none">

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
										</select>
									</div>
									<br>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<select class="form-control" name="q_sess" id="q_sess" required>
											<option value=""> Select  Session </option>
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
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<select class="form-control" name="regist_no" id="regist_no" required>
											<option value=""> Select Registration Number </option>
															
										</select>
									</div>

									<div class="input-group">
										<input class="form-control" placeholder=" " type="hidden" name="createdby" id="createdby"
										value="<?php echo @$_SESSION['firstname'].' '.@$_SESSION['lastname']; ?>" readonly required>
									</div>
									<br>
									<label class="fancy-checkbox pull-left">
										<input type="checkbox" name="all" id="all">
										<span>Promote All Students</span>
									</label>
									
									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>
										<button type="submit" class="btn btn-primary" name="one_stud_prom_btn">Promote One Student</button>
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
		
		








<script>	//hide and show divs
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

 
 		
		
<script>	//script to fetch student registration number
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



		