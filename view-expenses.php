
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_admin_login();  ?>


	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		

		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
			<form action="view-expenses" method="post">
			
			<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->



					
			<!-- PRESENT STUDENTS -->
			<div class="panel" id="present">
				<div class="panel-heading"> Viewing All Expenses 		 </div>
				
				<div class="panel-body">
					<table id="dataTable" class="table table-hover table-bordered">								
						
						<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->
						<?php									
								if(@$result->num_rows > 0)
								{
									$result = view_expenses();
									
									echo'<thead>
											<tr style="background-color:#f9f9f9;color:#5D8AA8;cursor:pointer">										<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Expense Name</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Expense Type</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Date</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Unit Price</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Qty</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Amount </th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Status </th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Purchaser </th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Description</th>
											</tr>
										</thead>
										<tbody>';
									while(@$row = @$result->fetch_assoc())
									{  ?>
										<tr>
											<td> <?php echo $row['expensename']; ?> </td>
											<td> <?php echo $row['expensetype']; ?> </td>
											<td> <?php echo $row['date']; ?> </td>
											<td> <?php echo $row['unitprice']; ?></td>
											<td> <?php echo $row['quantity']; ?> </td>
											<td> <?php echo $row['amount']; ?> </td>
											<td> <?php echo $row['status']; ?> </td>
											<td> <?php echo $row['purchaseby']; ?> </td>
											<td> <?php $desc = $row['description'];  $desc = substr($desc, 0, 30); echo $desc.' ...'; ?> </td>	

										</tr>
						<?php	}  }     ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END PRESENT STUDENTS -->
			
			
			
	
			</form>
		

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		</div>
		<!-- END MAIN -->
		
		
		
		
		
		
	<?php include('layout/bottom-footer.php') ?>		
		
		







		