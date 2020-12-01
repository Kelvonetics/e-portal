
	
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>	

	
	
		
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		
			
	<?php
		$conn = db_connect();
		$query = "SELECT * FROM page_content WHERE pagename = 'About Us' AND category = 'Text'";
		$result = $conn->query($query);
		if($result->num_rows == 1){ 	$page = $result->fetch_assoc();		}
	?>		
		
	<?php
		$conn = db_connect();
		$query = "SELECT * FROM page_content WHERE pagename = 'About Us' AND category = 'Photo'";
		$result = $conn->query($query);
		if($result->num_rows == 1){ 	$photo = $result->fetch_assoc();		}
	?>

	
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid" style="-moz-border:red thin dotted;">
		
				
				<div class="col-md-8">
					<!-- PANEL WITH FOOTER -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">	<?php echo $page['title_1']; ?>	</h3>
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
							</div>
						</div>
						<div class="panel-body">							
							<p style="height:100%;width:100%">
							 <img src="<?php echo $photo['footer_1']; ?>" height="200" width="350" alt=" <?php echo $photo['title_1']; ?> ">
							</p>
							<p>
									<?php echo $page['content_1']; ?>	 
							</p>
						</div>
						<div class="panel-footer">
							<h5>	<?php echo $page['footer_1']; ?>	 </h5>
						</div>
					</div>
					<!-- END PANEL WITH FOOTER -->
				</div>
		
		
				<div class="col-md-4">
					<!-- PANEL NO PADDING -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Our School</h3>
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
							</div>
						</div>
						<div class="panel-body no-padding bg-primary text-center">
							<div class="padding-top-30 padding-bottom-30">
								<i class="fa fa-thumbs-o-up fa-5x"></i>
								<h3>No Content Padding</h3>
							</div>
						</div>
					</div>
					<!-- END PANEL NO PADDING -->
				</div>
		
		
				<div class="col-md-8">
					<!-- PANEL WITH FOOTER -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">	<?php echo $page['title_2']; ?>	 </h3>
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
							</div>
						</div>
						<div class="panel-body">	
							<p style="height:100%;width:100%">
							 <img src="<?php echo $photo['footer_2']; ?>" height="200" width="350" alt=" <?php echo $photo['title_2']; ?> ">
							</p>
							
							<p>
							 	<?php echo $page['content_2']; ?>	  
							</p>
						</div>
						<div class="panel-footer">
							<h5>	<?php echo $page['footer_2']; ?>	 </h5>
						</div>
					</div>
					<!-- END PANEL WITH FOOTER -->
				</div>

		
				<div class="col-md-8">
					<!-- PANEL WITH FOOTER -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">	<?php echo $page['title_3']; ?>	 </h3>
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
							</div>
						</div>
						<div class="panel-body">
							<p style="height:100%;width:100%">
							 <img src="<?php echo $photo['footer_3']; ?>" height="200" width="350" alt=" <?php echo $photo['title_3']; ?> ">
							</p>

							<p>
									<?php echo $page['content_3']; ?>	   
							</p>
						</div>
						<div class="panel-footer">
							<h5>	<?php echo $page['footer_3']; ?>	 </h5>
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

