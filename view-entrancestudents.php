
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_admin_login();  ?>



	
	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		

				<?php
					if(isset($_REQUEST['view_entr_stud_btn']))
					{							
						if(@$result->num_rows > 0){		$result = view_entrance_student();   @$crow = @$result->fetch_assoc();  }
					}	
				?>
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
			<form action="students-view-page" method="post">
			
			<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->



					
			<!-- TABLE HOVER -->
			<div class="panel">
				<div class="panel-heading">
				<?php
					if(isset($_REQUEST['view_entr_stud_btn'])){ echo
					'<h3 class="panel-title">Viewing  Students In '. @$crow["class"]. '</h3>'; } ?>
				</div>
				<div class="panel-body">
					<table id="dataTable" class="table table-hover table-bordered">								
						
						<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->
						<?php
							if(isset($_REQUEST['view_entr_stud_btn']))
							{									
								if(@$result->num_rows > 0)
								{
									$result = view_entrance_student();
									
									echo'<thead>
											<tr style="background-color:#f9f9f9; color:#5D8AA8; cursor:pointer">
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Student Number </th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> First Name</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Last Name</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Email</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Phone</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Gender</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Date Of Birth</th>
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
											<td> <?php echo $row['email']; ?> </td>
											<td> <?php echo $row['phone']; ?> </td>
											<td> <?php echo $row['gender']; ?> </td>
											<td> <?php echo $row['dob']; ?> </td>
											
											 <?php $sid = $row['regist_no']; ?> 
											<?php $cl = $row['class']; ?>
											
											<td style="overflow:visible">
												<div class="dropdown" style="">
													<button class="btn btn-default dropdown-toggle" type="button" id="" data-toggle="dropdown" style="font-size:12px; color:#999;padding:0.5px 15px">actions
													<span class="caret"></span></button>
													 <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="">
													  <li><a href="student-profile?id=<?php echo $sid ?>&class=<?php echo $cl ?>" style="font-size:13px" name="edit_stud"><i class="fa fa-list"></i> Student</a></li>
													  <li><a href="edit-students?id=<?php echo $sid ?>" style="font-size:13px" name="edit_stud"><i class="fa fa-edit"></i> Student</a></li>
													  <li><a href="#" style="font-size:13px"><i class="fa fa-remove"></i> Student</a></li>
													</ul> 
												 </div> 
											</td>
										</tr>
						<?php	}  }  }   ?>
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
		
		






		