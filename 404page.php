<?php
  header("HTTP/1.0 404 Not Found");
?>


	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		          



	
	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		
					
		
		
		<!-- MAIN -->
		<div class="main" style="width:82%;">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
			
				<div class="col-md-8 col-md-offset-2">
					<!-- PANEL WITH FOOTER -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-exclamation-triangle"></i>	Page Not Found	 </h3>
						</div>
						<div class="panel-body">
						
						
							<p style="height:100%;width:100%">
							 <img src="images/404.png" height="200" width="350" alt="error 404 picture">
							 <img src="images/404.jpg" height="200" width="350" alt="error 404 picture">
							</p>

 
							  <div id="content" style="font-size:16px; color:#999">
								  Error Just Occured, Please Go Back 
									
									<button type="button" class="btn btn-primary pull-right" onclick='javascript:history.back()' style="font-size:10px"> Back </button>
							  </div>
						
						</div>
				
					</div>
				</div>
				
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		</div>
		<!-- END MAIN -->
		
		
		
		
		
		
	<?php include('layout/bottom-footer.php') ?>	