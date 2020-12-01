
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_admin_login();  ?>


<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
</style>

<!-- script to display photo with preview will uploading  -->
<script>
	function readURL(input) 
	{
		if (input.files && input.files[0]) 
		{
			var reader = new FileReader();

			reader.onload = function (e) 
			{
				$('#blah')
					.attr('src', e.target.result)
					.width(450)
					.height(250);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
	
	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		

				<?php
					if(isset($_REQUEST['view_staff_btn']))
					{							
						if(@$result->num_rows > 0){		$result = view_staff();   @$crow = @$result->fetch_assoc();  }
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
					if(isset($_REQUEST['view_staff_btn'])){ echo
					'<h3 class="panel-title">Viewing All Staff </h3>'; } ?>
				</div>
				<div class="panel-body">
					<table id="dataTable" class="table table-hover table-bordered">								
						
						<!-- LOGICS TO CREATE UPDATE AND VIEW STAFF -->
						<?php
									
								if(@$result->num_rows > 0)
								{
									$result = view_staff();
									
									echo'<thead>
											<tr style="background-color:#f9f9f9; color:#5D8AA8; cursor:pointer">
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Staff ID</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> First Name</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Last Name</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Email</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Phone</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Gender</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Position</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Date Of Join</th>
												<th style="font-weight:lighter;"> Actions</th>
											</tr>
										</thead>
										<tbody>';
									while(@$row = @$result->fetch_assoc())
									{  ?>
										<tr>
											<td> <?php echo $row['staff_id']; ?> </td>
											<td> <?php echo $row['firstname']; ?> </td>
											<td> <?php echo $row['lastname']; ?> </td>
											<td> <?php echo $row['email']; ?> </td>
											<td> <?php echo $row['phone']; ?> </td>
											<td> <?php echo $row['gender']; ?> </td>
											<td> <?php echo $row['position']; ?> </td>
											<td> <?php echo $row['doj']; ?> </td>     <?php $sid = $row['staff_id']; ?> 
											
											<td style="overflow:visible">
												<div class="dropdown" style="">
													<button class="btn btn-default dropdown-toggle" type="button" id="" data-toggle="dropdown" style="font-size:12px; color:#999;padding:0.5px 15px">actions
													<span class="caret"></span></button>
													 <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="">
													 <li><a href="staff-profile?id=<?php echo $sid ?>" style="font-size:13px"><i class="fa fa-list"></i> Profile</a></li>
													  <li><a href="edit-staff?id=<?php echo $sid ?>" style="font-size:13px" name="edit_staff"><i class="fa fa-edit"></i> Edit</a></li>													  
													  <li><a href="edit-staff?id=<?php echo $sid ?>" style="font-size:13px" name="edit_staff"><i class="fa fa-remove"></i> Deactivate</a></li>
													  <li style="margin-left:13%"> ----------- </li>
													  <li><a href="staff-salary?id=<?php echo $sid ?>" style="font-size:13px" name="staff_sal"><i class="fa fa-money"></i> Salary</a></li>
													</ul> 
												 </div> 
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
		
		




<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="s_doj"]'); //our date input has the name "date"
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



		