
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_login();  ?>


<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

	
	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		

				<?php  if(@$result->num_rows > 0){		$result = view_subjects();   @$crow = @$result->fetch_assoc();  }	 ?>
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
			<form action="view-subjects" method="post">
			
			<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->



					
			<!-- TABLE HOVER -->
			<div class="panel">
				<div class="panel-heading">
				     <h3 class="panel-title">Viewing All Subjects </h3>
				</div>
				<div class="panel-body">
					<table id="dataTable" class="table table-hover table-bordered">								
						
						<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->
						<?php									
							if(@$result->num_rows > 0)
							{
								$result = view_subjects();
								
								echo'<thead>
										<tr style="background-color:#f9f9f9; color:#5D8AA8; cursor:pointer">
											<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> No</th>
											<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Subjects</th>
											<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Values </th>
											<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Class </th>
											<th style="font-weight:lighter;"> Actions</th>
										</tr>
									</thead>
									<tbody>';
								while(@$row = @$result->fetch_assoc())
								{  ?>
									<tr>
										<td> <?php echo $row['subject_id']; ?> </td>
										<td> <?php echo $row['subjects']; ?> </td>
										<td> <?php echo $row['value']; ?> </td>
										<td> <?php echo $row['class']; ?> </td>
										
										<?php $sid = $row['subject_id']; ?> 
										
										<td style="overflow:visible">
											<div class="dropdown" style="">
												<a class="btn btn-primary" href="edit-subject?id=<?php echo $sid; ?>" style="font-size:12px; color:#fff; padding:2px 10px;border-radius: 15px;" title="Click To Edit Subject" data-tooltip="true">
												<span class="fa fa-edit"></span></a>													  
											 </div> 
										</td>
									</tr>
						<?php  }  }   ?>
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
		
		








		