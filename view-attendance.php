
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_login();  ?>


	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		

				<?php
					if(isset($_REQUEST['view_attend_btn']))
					{							
						if(@$result->num_rows > 0){		$result = view_attendance();   @$crow = @$result->fetch_assoc();  }
						if(@$resultA->num_rows > 0){		$resultA = view_attendance_absent();   @$Acrow = @$resultA->fetch_assoc();  }
					}	
				?>
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
			<form action="students-view-page" method="post">
			
			<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->



					
			<!-- PRESENT STUDENTS -->
			<div class="panel" id="present">
				<div class="panel-heading">
				<?php
					if(isset($_REQUEST['view_attend_btn'])){ echo
					'<h3 class="panel-title">Viewing '. @$crow["class"]. ' Attendance For '.@$crow['term'].' Term </h3>'; } ?>
					<button type="button" class="btn btn-primary pull-right" id="absent_btn" style="padding:4px 10px; background-color:#6495ED; font-size:11px" title="Click To View All Absent Students">See Absent</button>
				</div>
				<div class="panel-body">
					<table id="dataTable" class="table table-hover table-bordered">								
						
						<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->
						<?php
							if(isset($_REQUEST['view_attend_btn']))
							{									
								if(@$result->num_rows > 0)
								{
									$result = view_attendance();
									
									echo'<thead>
											<tr style="background-color:#f9f9f9; color:#5D8AA8; cursor:pointer">
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Student Number </th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> First Name</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Last Name</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Date</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Attendance</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Class</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Term</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Session</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Photo</th>
											</tr>
										</thead>
										<tbody>';
									while(@$row = @$result->fetch_assoc())
									{  ?>
										<tr>
											<td> <?php echo $row['regist_no']; ?> </td>
											<td> <?php echo $row['firstname']; ?> </td>
											<td> <?php echo $row['lastname']; ?> </td>
											<td> <?php echo $row['date']; ?> </td>
											<td> <?php echo $row['attendance']; ?></td>
											<td> <?php echo $row['class']; ?> </td>
											<td> <?php echo $row['term']; ?> </td>
											<td> <?php echo $row['session']; ?> </td>
											<td> <img src="upload/avatar.jpg" height="10%"> </td>	<?php $sid = $row['regist_no']; ?> 

										</tr>
						<?php	}  }  }   ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END PRESENT STUDENTS -->
			
			
			
			<!-- ABSENT STUDENTS -->
			<div class="panel" id="absent" style="display:none">
				<div class="panel-heading">
				<?php
					if(isset($_REQUEST['view_attend_btn'])){ echo
					'<h3 class="panel-title">Viewing Absent '. @$Acrow["class"]. ' Attendance For '.@$Acrow['term'].' Term </h3>'; } ?>
					<button type="button" class="btn btn-primary pull-right" id="present_btn" style="padding:4px 10px; background-color:#6495ED; font-size:11px" title="Click To View All Present Students">See Present</button>
				</div>
				<div class="panel-body">
					<table id="dataTabled" class="table table-hover table-bordered">								
						
						<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->
						<?php
							if(isset($_REQUEST['view_attend_btn']))
							{									
								if(@$result->num_rows > 0)
								{
									$result = view_attendance_absent();
									
									echo'<thead>
											<tr style="background-color:#f9f9f9; color:#5D8AA8; cursor:pointer">
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Student Number </th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> First Name</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Last Name</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Date</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Attendance</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Class</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Term</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Session</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Photo</th>
												<th style="font-weight:lighter;"> Actions</th>
											</tr>
										</thead>
										<tbody>';
									while(@$row = @$result->fetch_assoc())
									{  ?>
										<tr>
											<td> <?php echo $row['regist_no']; ?> </td>
											<td> <?php echo $row['firstname']; ?> </td>
											<td> <?php echo $row['lastname']; ?> </td>
											<td>  </td>
											<td> Absent </td>
											<td> <?php echo $row['class']; ?> </td>
											<td> </td>
											<td> <?php echo $row['session']; ?> </td>  
											<td> <img src="upload/avatar.jpg" height="10%"> </td>	<?php $sid = $row['regist_no']; ?> 
											
											<td style="overflow:visible">
												<button type="button" style="font-size:13px" name=""> Mark</button>
											</td>
										</tr>
						<?php	}  }  }   ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END ABSENT STUDENTS -->
						
			</form>
		

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		</div>
		<!-- END MAIN -->
		
		
		
		
		
		
	<?php include('layout/bottom-footer.php') ?>		
		
		







<script>
	$(document).ready(function()
	{
		$('#absent_btn').click(function()
		{
			$('#absent').slideDown();			$('#present').slideUp();
		});
		
		$('#present_btn').click(function()
		{
			$('#present').slideDown();			$('#absent').slideUp();
		});
	});
</script>



		