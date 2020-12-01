
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_login();  ?>



	
	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		

				<?php
					if(isset($_REQUEST['view_stud_btn']))
					{							
						if(@$result->num_rows > 0){		$result = view_student();   @$crow = @$result->fetch_assoc();  }
					}	
				?>
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
			<form action="edit-position" method="post">
			
			<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->



					
			<!-- TABLE HOVER -->
			<div class="panel">
				<div class="panel-heading">
				<?php
					if(isset($_REQUEST['view_stud_btn'])){ echo
					'<h3 class="panel-title">Viewing  Staff Positions </h3>'; } ?>
				</div>
				<div class="panel-body">
					<table id="dataTable" class="table table-hover table-bordered">								
						
						<!-- LOGICS TO VIEW STAFF POSITION -->
						<?php									
								if(@$result->num_rows > 0)
								{
									$result = view_position();
									
									echo'<thead>
											<tr style="background-color:#f9f9f9; color:#5D8AA8; cursor:pointer">
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Id </th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Position Number </th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Description </th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Role</th>
												<th style="font-weight:lighter;"> Actions</th>
											</tr>
										</thead>
										<tbody>';
									while(@$row = @$result->fetch_assoc())
									{  ?>
										<tr>
											<td> <?php echo $row['id']; ?> </td>
											<td> <?php echo $row['position']; ?> </td>
											<td> <?php echo $row['description']; ?> </td>
											<td> <?php echo $row['role']; ?> </td>  <?php $pid = $row['id']; ?> 
											
											<td style="overflow:visible">
												<a href="edit-position?id=<?php echo $pid ?>" style="font-size:13px" name="edit_posit_btn"><i class="fa fa-edit"></i> Edit</a> 
											</td>
										</tr>
						<?php	}  }    ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END TABLE HOVER -->
								
						
			</form>
		

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		</div>
		<!-- END MAIN -->
		
		
		
		
		
		
	<?php include('layout/bottom-footer.php') ?>		
		
		

		










		