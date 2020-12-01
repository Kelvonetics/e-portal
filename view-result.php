
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_login();  ?>


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
					if(isset($_REQUEST['view_rest_btn']))
					{							
						if(@$result->num_rows > 0){		$result = view_result();   @$crow = @$result->fetch_assoc();  }
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
					if(isset($_REQUEST['view_rest_btn'])){ echo
					'<h3 class="panel-title">Viewing  Result For '. @$crow["class"]. '</h3>'; } ?>
				</div>
				<div class="panel-body">
					<table id="dataTable" class="table table-hover table-bordered">								
						
						<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->
						<?php
							if(isset($_REQUEST['view_rest_btn']))
							{									
								if(@$result->num_rows > 0)
								{
									$result = view_result();
									
									echo'<thead>
											<tr style="background-color:#f9f9f9; color:#5D8AA8; cursor:pointer">
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> # </th>
												<th style="font-weight:lighter;"><i class="fa fa-sort"style="color:#ccc"></i> First Name</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Last Name</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Subject</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Subject</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Subject</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Subject</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Subject</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Subject</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Subject</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Subject</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Subject</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Subject</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Term</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Overall</th>
												<th style="font-weight:lighter; width:20px">  </th>
											</tr>
										</thead>
										<tbody>';
									while(@$row = @$result->fetch_assoc())
									{  ?>
										<tr>
											<td> <?php echo $row['serial_no']; ?> </td>
											<td> <?php echo $row['firstname']; ?> </td>
											<td> <?php echo $row['lastname']; ?> </td>
											<td> <?php echo $row['subject_1'].' '.$row['mark_1']; ?> </td>
											<td> <?php echo $row['subject_2'].' '.$row['mark_2']; ?> </td>
											<td> <?php echo $row['subject_3'].' '.$row['mark_3']; ?> </td>
											<td> <?php echo $row['subject_4'].' '.$row['mark_4']; ?> </td>
											<td> <?php echo $row['subject_5'].' '.$row['mark_5']; ?> </td>
											<td> <?php echo $row['subject_6'].' '.$row['mark_6']; ?> </td>
											<td> <?php echo $row['subject_7'].' '.$row['mark_7']; ?> </td>
											<td> <?php echo $row['subject_8'].' '.$row['mark_8']; ?> </td>
											<td> <?php echo $row['subject_9'].' '.$row['mark_9']; ?> </td>
											<td> <?php echo $row['subject_10'].' '.$row['mark_10']; ?> </td>
											<td> <?php echo $row['term']; ?> </td>
											<td> <?php echo $row['overall']; ?> </td>      <?php $sid = $row['regist_no']; ?> 
											
											<td style="overflow:visible">
												<div class="dropdown" style="">
													<a class="btn btn-primary" href="#" style="font-size:12px; color:#fff; padding:2px 10px;border-radius: 15px;" title="Click To View Full Result" data-tooltip="true">
													<span class="fa fa-list"></span></a>
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



		