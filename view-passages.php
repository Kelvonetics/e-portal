
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_login();  ?>


<?php
	function custom_echo($x, $length)
	{
	  if(strlen($x)<=$length)
	  {
		echo $x;
	  }
	  else
	  {
		$y=substr($x,0,$length) . '...';
		echo $y;
	  }
	}
?>

	
	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		

				<?php  if(@$result->num_rows > 0){		$result = view_passages();   @$crow = @$result->fetch_assoc();  }  ?>
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
			<form action="view-questions" method="post">
			
			<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->



					
			<!-- TABLE HOVER -->
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Viewing All Question Passages </h3>
				</div>
				<div class="panel-body">
					<table id="dataTable" class="table table-hover table-bordered">								
						
						<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->
						<?php									
							if(@$result->num_rows > 0)
							{
								$result = view_passages();
								
								echo'<thead>
										<tr style="background-color:#f9f9f9; color:#5D8AA8; cursor:pointer">
											<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> # </th>
											<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Title</th>
											<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Content </th>
											<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Subject </th>
											<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Class </th>
											<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Term </th>
											<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Type </th>
											<th style="font-weight:lighter;"> Actions</th>
										</tr>
									</thead>
									<tbody>';
								while(@$row = @$result->fetch_assoc())
								{  ?>
									<tr>
										<td> <?php echo $row['id']; ?> </td>
										<td> <?php echo $row['title']; ?> </td>
										<td> <?php $cont = $row['content'];  $cont = substr($cont, 0, 100); echo $cont.' ...'; ?> </td>
										<td> <?php echo $row['subject']; ?> </td>
										<td> <?php echo $row['class']; ?> </td>
										<td> <?php echo $row['term']; ?> </td>
										<td> <?php echo $row['type']; ?> </td>
										
										<?php $pid = $row['title']; ?> 
										
										<td style="overflow:visible">
											<div class="dropdown" style="">
												<a class="btn btn-primary" href="edit-passage?id=<?php echo $pid; ?>" style="font-size:12px; color:#fff; padding:2px 10px;border-radius: 15px;" title="Click To Edit Question Passage" data-tooltip="true">
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
		
		








		