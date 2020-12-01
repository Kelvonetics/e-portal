
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>	

	
	
		
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		
			
	<?php
		$conn = db_connect();
		$query = "SELECT * FROM page_content WHERE pagename = 'Contact Us' AND category = 'Text'";
		$result = $conn->query($query);
		if($result->num_rows == 1){ 	$page = $result->fetch_assoc();		}
	?>		
	
	<?php
		$conn = db_connect();
		$query = "SELECT * FROM page_content WHERE pagename = 'Contact Us' AND category = 'Photo'";
		$result = $conn->query($query);
		if($result->num_rows == 1){ 	$photo = $result->fetch_assoc();		}
	?>	
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
		
		
		
					<div class="col-md-10 col-md-offset-1 panel">   
						<div class="col-md-6">
						<h3><strong style="color:#396">	<?php echo $page['title_1']; ?>	</strong></h3>

							<?php echo $page['footer_1']; ?>	 <br /><br />
						
					<strong>Phone:</strong> 	<?php echo $page['title_2']; ?>	<br />
					<strong>Email:</strong> <a href="mailto:info@yoursite.com">	<?php echo $page['footer_2']; ?>	</a> 
						   <div id="contact-form">
								  <h3 class="text-center">Leave A Comment</h3>
								  <p class="text-center"><em>We love To Hear From You!</em></p>
								  <div class="row test">
								  
									<form action="contact-us-page" method="post">
									<div class="col-md-12">
									  <div class="row">
										<div class="col-sm-6 form-group">
										
										  <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
										</div>
										<div class="col-sm-6 form-group">
										  <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
										</div>
									  </div>
									  <textarea class="form-control" id="comments" name="comments" placeholder="Comment" required="required" rows="5"></textarea> <br>
									  <div class="row">
										<div class="col-md-12 form-group">
										  <button class="btn btn-primary pull-right" type="submit">Post</button>
										</div>
									  </div> 
									</div>
									</form>
									
								  </div>
								
						   </div>
						</div>
						
						
						
						<div class="col-md-6" style="background-color:#faf8ec"> 
							
					<h4>Our Location</h4>
					<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAvCv3BsKnCqk88oSNd5-LSZyHk4kdoLZI'></script><div style='overflow:hidden;height:400px;width:98%;'><div id='gmap_canvas' style='height:500px;width:650px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://embed-map.org/'>how to add google maps to a website</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=b75a1f0429bfae0bc99e6b2338e8766692813dd1'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(6.5782708,3.387843299999986),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(6.5782708,3.387843299999986)});infowindow = new google.maps.InfoWindow({content:'<strong>Biznet Solutions</strong><br>52, Ogudu Road <br> Lagos<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
					<div class="cleaner h40"></div>
					
				
						</div>
						
					 </div>
    
		
		
		
		
		
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		</div>
		<!-- END MAIN -->
		
		
		
		
		
		
	<?php include('layout/bottom-footer.php') ?>		
		
		
		


