
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_admin_login();  ?>


		<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?> 
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid"> 
					<form action="expenses" method="post">


					<div class="">

						<div class=" col-md-8 col-md-offset-2" style="border:thin dotted #f9f9f9">

							<!-- INPUT GROUPS -->
							<div class="panel">
							<!-- LOGICS TO CREATE UPDATE AND VIEW STAFF -->
					<?php
						$conn = db_connect();
						if(isset($_REQUEST['new_expense_btn']))
						{							
							@$exp_msg = new_expenses();
							if($exp_msg == "expensesCreated")
							{
								echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										   <strong>Success ! </strong> Expenses Add Successfully.
									  </div>';
							}
							else if($exp_msg == "exist")
							{
								echo '<div class="alert alert-warning" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry ! </strong> Expense For This Item Alredy Exist.
									 </div>';
							}
							
							else
							{
								echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry!</strong> Fail To Add Expenses '.$exp_msg;
									 '</div>  <br>';
							}
							
						}
						
						$conn->close();
					?>
					
								<div class="panel-heading">
									<h3 class="panel-title">Expenses</h3>
								</div>

								<div class="panel-body">
									
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-money"></i> </span>
										<input class="form-control" placeholder="Expense Name" type="text" name="expensename" id="expensename" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-list"></i></span>
										<select class="form-control" name="expensetype" id="expensetype" required>
											<option value=""> Select Expense Type </option>
											<option value="Daily Expenses"> Daily Expenses</option>
											<option value="Weekly Expenses"> Weekly Expenses </option>
											<option value="Monthly Expenses"> Monthly Expenses </option>
											<option value="Termly  Expenses"> Termly  Expenses </option>
											<option value="Annual Expenses"> Annual Expenses </option>
											<option value="Regular Expenses"> Regular Expenses </option>
											<option value="Offical  Expenses"> Offical  Expenses </option>
										</select>
									</div>								
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
										<input class="form-control" placeholder="Expense Date" type="text" name="date" id="date" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-money"></i> </span>
										<input class="form-control" placeholder="Unit Price" type="text" name="unitprice" id="unitprice" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-hourglass-3"></i> </span>
										<input class="form-control" placeholder="Quantity" type="number" name="quantity" id="quantity" onkeyup="calculateAmount()" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-hourglass-3"></i> </span>
										<input class="form-control" placeholder="Amount" type="number" name="amount" id="amount" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<select class="form-control" name="purchaseby" id="purchaseby" required>
											<option value=""> Select User </option>
											<?php
												$conn = db_connect(); // remember to add where clause for staff role like 'Driver Messager'
												$query = "SELECT * FROM staff_users";
												$result = $conn->query($query);
												WHILE($row = $result->fetch_assoc())
												{
													echo "<option class='option' value=\"".$row['firstname'].' '.$row['lastname']."\">".$row['firstname'].' '.$row['lastname'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['role']."</option>";
												}
											  $conn->close();
											?>
										</select>
									</div>								
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i> </span>
										<textarea class="form-control" placeholder="Description" id="description" name="description" rows="2"></textarea>
									</div>
									
									
									<input class="form-control" placeholder="Entered By" type="hidden" name="enteredby" id="enteredby" value="<?php echo @$_SESSION['firstname'].' '.@$_SESSION['lastname']; ?>" required>
									<br>
									
									<br>
										<div class="input-group pull-right">
											<button type="reset" class="btn btn-default">Clear</button>
											<button type="submit" class="btn btn-primary" name="new_expense_btn">Add Expenses</button>
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
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy-M-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>


<script>

	function calculateAmount()
	{
		var qty = document.getElementById('quantity').value;
		var u_p = document.getElementById('unitprice').value;
		var amt = parseInt(qty * u_p);
		document.getElementById('amount').value = amt;
	}
	
	
	$(document).ready(function()
	{
		
	})
</script>



		