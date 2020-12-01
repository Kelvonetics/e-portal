
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_admin_login();  ?>


<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		

				<?php
					if(isset($_REQUEST['view_pin_btn']))
					{							
						if(@$result->num_rows > 0){		$result = view_pin();   @$crow = @$result->fetch_assoc();  }
					}	
				?>
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
			<form action="view-exampin" method="post">
			
			<!-- LOGICS TO CREATE UPDATE AND VIEW EXAM PIN-->



					
			<!-- TABLE HOVER -->
			<div class="panel">
				<div class="panel-heading">
				<?php
					if(isset($_REQUEST['view_pin_btn'])){ echo
					'<h3 class="panel-title">Viewing  Exam PIN For '. @$crow["subject"].' In '. @$crow["class"]. '</h3>'; } ?>
				</div>
				<div class="panel-body">
					<table id="dataTable" class="table table-hover table-bordered">								
						
						<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->
						<?php
							if(isset($_REQUEST['view_pin_btn']))
							{									
								if(@$result->num_rows > 0)
								{
									$result = view_pin();
									
									echo'<thead>
											<tr style="background-color:#f9f9f9; color:#5D8AA8; cursor:pointer">
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> No</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Subject</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> PIN</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Class</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Term</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Reg Number</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Date</th>
												<th style="font-weight:lighter;"> Actions</th>
											</tr>
										</thead>
										<tbody>';
									while(@$row = @$result->fetch_assoc())
									{  ?>
										<tr>
											<td> <?php echo $row['code_id']; ?> </td>
											<td> <?php echo $row['subject']; ?> </td>
											<td> <?php echo $row['pin']; ?> </td>
											<td> <?php echo $row['class']; ?> </td>
											<td> <?php echo $row['term']; ?> </td>
											<td> <?php echo $row['regist_no']; ?> </td>
											<td> <?php echo $row['date']; ?> </td>

											
											<td style="overflow:visible">
												<div class="dropdown" style="">
													<a class="btn btn-primary" href="#" style="font-size:12px; color:#fff; padding:2px 10px;border-radius: 15px;" title="Click To Edit Question" data-tooltip="true">
													<span class="fa fa-edit"></span></a>													  
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
		
		




<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="s_dob"]'); //our date input has the name "date"
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



		