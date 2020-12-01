
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_admin_login();  ?>


		<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?> 
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid"> <?php $id = @$_REQUEST['id']; ?>
					<form action="staff-salary?id=<?php echo @$id; ?>" method="post">

					
					<?php if(isset($_REQUEST['get_staff_btn']) || (@$_GET['id']) != null) { ?>
					<div class="">

						<div class=" col-md-8 col-md-offset-2" style="border:thin dotted #f9f9f9">

							<!-- INPUT GROUPS -->
							<div class="panel">
							<!-- LOGICS TO CREATE UPDATE AND VIEW STAFF -->
					<?php
						$conn = db_connect();
						if(isset($_REQUEST['new_payslip_btn']))
						{							
							@$pay_msg = generate_payslip();
							if($pay_msg == "payslipCreated")
							{
								echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										   <strong>Success! </strong> Staff Payslip Generated For The Month Of '.date('F Y').
									  '</div>';
							}
							else if($pay_msg == "exist")
							{
								echo '<div class="alert alert-warning" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry ! </strong> Staff Payslip Has Been Generated For This Month '.date('F Y').
									 '</div>';
							}
							
							else
							{
								echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry!</strong> Staff Payslip Could Not Be Generated.'.$pay_msg;
									 '</div>  <br>';
							}
							
						}
						
						//from view
						else if((@$_GET['id']) != null)
						{    
							@$staff_id = $_GET['id'];  
							$query2 = "SELECT * FROM staff_salary_details WHERE staff_id = '{$staff_id}'";
							$result2 = $conn->query($query2);
							$staff_sal = $result2->fetch_assoc();
						}
						
						$conn->close();
					?>
					
								<div class="panel-heading">
									<h3 class="panel-title">Staff Payslip</h3>
								</div>
								<?php //calculating take home pay for satff 
									$basicsalary = @$staff_sal['basicsalary']; $tax = @$staff_sal['tax']/100; $deductions = @$staff_sal['deductions'];   $bs_tax = ($basicsalary * $tax);  $bs_deductions = ($basicsalary * $deductions);
									 $takehome = $basicsalary - $bs_tax - $bs_deductions;
								?>
								<div class="panel-body">
									<div class="input-group">
										<span class="input-group-addon">N</span>
										<input class="form-control" type="text" name="staff_id" id="staff_id" 
										value="<?php if((@$_GET['id']) != null) { echo @$staff_sal['staff_id']; } else {  } ?>" readonly required>
									</div>
									<br>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-money"></i> Basic Salary</span>
										<input class="form-control" placeholder="Basic Salary" type="text" name="basicsalary" id="basicsalary"
										value="<?php if((@$_GET['id']) != null) { echo @$staff_sal['basicsalary']; } else { } ?>" readonly required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-money"></i> TAX / VAT</span>
										<input class="form-control" placeholder="TAX / VAT" type="text" name="tax" id="tax" 
										value="<?php if((@$_GET['id']) != null) { echo @$bs_tax; } else { } ?>" readonly required>
									</div>								
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-money"></i> Deductions</span>
										<input class="form-control" placeholder="Monthly Deductions" type="text" readonly name="deductions" id="deductions"
										value="<?php if((@$_GET['id']) != null) { echo @$bs_deductions; } else {  } ?>" required>
									</div>
									<br>
									<div class="input-group">
									
										<span class="input-group-addon"><i class="fa fa-money"></i> Take Home</span>
										<input class="form-control" placeholder="Take Home Pay" type="text" name="takehome" id="takehome" 
										value="<?php echo $takehome; ?>" readonly required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i> Salary Date</span>
										<input class="form-control" placeholder="Salary Date" type="text" name="date" id="date" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i> Description</span>
										<textarea class="form-control" name="comment" id="comment" placeholder="Comment" rows="2"></textarea>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-bank"></i> Bank Info</span>
										<input class="form-control" placeholder="Staff Bank" type="text" name="bank" id="bank" 
										value="<?php if((@$_GET['id']) != null) { echo @$staff_sal['bank']; } else { } ?>" readonly required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-money"></i> Account NO</span>
										<input class="form-control" placeholder="TAX / VAT" type="text" name="accountnumber" id="accountnumber" 
										value="<?php if((@$_GET['id']) != null) { echo @$staff_sal['accountnumber']; } else { } ?>" readonly required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-money"></i> Account Type</span>
										<input class="form-control" placeholder="TAX / VAT" type="text" name="accounttype" id="accounttype" 
										value="<?php if((@$_GET['id']) != null) { echo @$staff_sal['accounttype']; } else { } ?>" readonly required>
									</div>
									
									<input class="form-control" placeholder="Entered By" type="hidden" name="enteredby" id="enteredby" value="<?php echo @$_SESSION['firstname'].' '.@$_SESSION['lastname']; ?>" required>
									<br>
									
									<br>
										<div class="input-group pull-right">
											<button type="reset" class="btn btn-default">Clear</button>
											<button type="submit" class="btn btn-primary" name="new_payslip_btn">Generate Payslip</button>
										</div>								
									
								</div>	
							</div>
						<!-- END INPUT GROUPS -->
							
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
		var date_input=$('input[name="date"]'); //our date input has the name "date"
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



		