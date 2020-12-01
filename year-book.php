
	
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>	

	
	
		
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		

			<?php
				if(isset($_REQUEST['get_ybook_btn'])) {	$results = view_year_book();  
				if(@$results->num_rows > 0) {   $count = mysqli_num_rows($results);      $r = @$results->fetch_assoc();  	} }  ?>
		
	
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid" style="-moz-border:red thin dotted;">
		
				
				<div class="col-md-12">
					<!-- PANEL WITH FOOTER -->
					<div class="panel">					
					
						<div class="panel-heading">   
						<div class="alert alert-success" style="">
							<h3 class="panel-title"> 
							<?php if(isset($_REQUEST['get_ybook_btn']) && @$count > 0) 
							{ echo @$r['school'] .' Year Book &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.@$r['session']. ' Session'; }
							else{ echo 'No Record Found For These Year'; } ?> </h3>
						</div>
						</div>
						
					<div class="panel-body">
					<?php
						if(isset($_REQUEST['get_ybook_btn'])) {	$result = view_year_book();  
						if(@$result->num_rows > 0) {  while(@$row = @$result->fetch_assoc())	{  ?>					
						
						<div class="col-lg-3 col-md-8 col-sm-12" style="margin:5px 0px">						
							<p style="height:100%;width:100%">
							 <img src="upload/<?php echo $row['picture']; ?> " height="120" width="275" alt="Avatar">
							</p>    <?php $id = $row['regist_no'];  $cl = $row['class']; ?>
							<p style=""> <?php echo $row['firstname'].' '.$row['lastname']; ?>  </p>  
							<p style=""> <?php echo $row['gender']; ?> </p>  
							<p style=""> <?php echo $row['email']; ?> 
							<a href="student-profile.php?id=<?php echo $id ?>&class=<?php echo $cl ?>" class="btn btn-info pull-right" style="font-size:10px"> More </a>	</p>
						</div>
						
						<?php	} } }  ?>
						
						
						
						
						
					</div>
					</div>
					<!-- END PANEL WITH FOOTER -->
				</div>
		

		
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		</div>
		<!-- END MAIN -->
		
		
		
		
		
		
	<?php include('layout/bottom-footer.php') ?>		
		
		
		
		
		
		
<script>
	$(document).ready(function()
	{ 
		('a').removeClass('active');	
		//('#about').click(function(){ ('#about').addClass('active');		  });
	});
</script>

