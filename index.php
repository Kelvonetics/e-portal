	
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>	

	
		
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		
	<?php
		$conn = db_connect();
		$query = "SELECT * FROM page_content WHERE pagename = 'Home' AND category = 'Text'";
		$result = $conn->query($query);
		if($result->num_rows == 1){ 	$page = $result->fetch_assoc();		}
	?>	

	<?php
		$conn = db_connect();
		$query = "SELECT * FROM page_content WHERE pagename = 'Home' AND category = 'Photo'";
		$result = $conn->query($query);
		if($result->num_rows == 1){ 	$photo = $result->fetch_assoc();		}
	?>
	
	<?php
		$conn = db_connect();
		$query = "SELECT * FROM academic_calendar ORDER BY id DESC";
		$result = $conn->query($query);
		if($result->num_rows == 1){ 	$acad = $result->fetch_assoc();		}
	?>
	
	<?php
		$conn = db_connect();
		$query = "SELECT * FROM page_content WHERE pagename = 'Event' AND category = 'Text'";
		$result = $conn->query($query);
		if($result->num_rows == 1){ 	$event = $result->fetch_assoc();		}
	?>
	
	<?php
		$conn = db_connect();
		$query = "SELECT * FROM page_content WHERE pagename = 'Event' AND category = 'Photo'";
		$result = $conn->query($query);
		if($result->num_rows == 1){ 	$evt_pic = $result->fetch_assoc();		}
	?>
	
	<?php
		$conn = db_connect();
		$query = "SELECT * FROM page_content WHERE pagename = 'Attestation' AND category = 'Text'";
		$result = $conn->query($query);
		if($result->num_rows == 1){ 	$attest = $result->fetch_assoc();		}
	?>
	
	<?php
		$conn = db_connect();
		$query = "SELECT * FROM page_content WHERE pagename = 'Attestation' AND category = 'Photo'";
		$result = $conn->query($query);
		if($result->num_rows == 1){ 	$att_pic = $result->fetch_assoc();		}
	?>
	
		<!-- MAIN -->
		<div class="main">
		
		
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					
					<!-- OVERVIEW -->
					
					<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top:-30px">
						  <!-- Indicators -->
						  <ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
							<li data-target="#myCarousel" data-slide-to="3"></li>
						  </ol>
						
						  <!-- Wrapper for slides -->
						  <div class="carousel-inner" role="listbox">
							<div class="item active">
							<p style="height:100%;width:100%">
							 <img src="<?php echo $photo['footer_1']; ?>" height="335" width="1280" alt=" <?php echo $photo['title_1']; ?> ">
							</p>
							<div class="carousel-caption">
							  <h4> <?php echo $photo['title_1']; ?> </h4>
								<p> <?php echo $photo['content_1']; ?>   </p>
							</div>
							</div>
						
							<div class="item">
							  <p style="height:100%;width:100%">
							 <img src="<?php echo $photo['footer_2']; ?>" height="335" width="1280" alt=" <?php echo $photo['title_2']; ?> ">
							</p>
							  <div class="carousel-caption">
								<h4> <?php echo $photo['title_2']; ?>  </h4>
								<p> <?php echo $photo['content_2']; ?>   </p>
							</div>
							</div>
						
							<div class="item">
							  <p style="height:100%;width:100%">
							 <img src="<?php echo $photo['footer_3']; ?>" height="335" width="1280" alt=" <?php echo $photo['title_3']; ?> ">
							</p>
							  <div class="carousel-caption">
								<h4> <?php echo $photo['title_3']; ?> </h4>
								<p> <?php echo $photo['content_3']; ?>   </p>
							</div>
							</div>
						
							<div class="item">
							  <p style="height:100%;width:100%">
							 <img src="<?php echo $photo['footer_4']; ?>" height="335" width="1280" alt=" <?php echo $photo['title_4']; ?> ">
							</p>
							  <div class="carousel-caption">
								<h4> <?php echo $photo['title_4']; ?> </h4>
								<p> <?php echo $photo['content_4']; ?>   </p>
							</div>
							</div>
						  </div>
						
						  <!-- Left and right controls -->
						  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						  </a>
					</div>
				
					<!-- END OVERVIEW -->
					
					
					<div class="row" style="margin-top:25px">
						<div class="col-md-7">
							<!-- RECENT PURCHASES -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"> <?php echo $page['title_1']; ?> </h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									</div>
								</div>
								<div class="panel-body" style="font-size:14.5px">
									<p> 		<?php echo $page['content_1']; ?>		</p>
								</div>
							</div>
							<!-- END RECENT PURCHASES -->
						</div>
						
						
						
						
						<div class="col-md-5">
							<!-- RECENT PURCHASES -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Events</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									</div>
								</div>
								<div class="panel-body">									 
									 <ul class="list-unstyled activity-list">
										<li>											
											<img src="<?php echo $evt_pic['footer_1']; ?>" height="40" width="150" alt=" <?php echo $photo['footer_1']; ?> " class="pull-left" style="margin-right:13px">
																						
											<p>
												<a href="events"><?php echo $event['content_1']; ?></a>  <a href="#"></a> <span class="timestamp"> <?php echo $event['footer_1']; ?> </span>
											</p>
										</li>
										
										<li>											
											<img src="<?php echo $evt_pic['footer_2']; ?>" height="40" width="150" alt=" <?php echo $photo['footer_1']; ?> " class="pull-left" style="margin-right:13px">
																						
											<p>
												<a href="events"><?php echo $event['content_2']; ?></a>  <a href="#"></a> <span class="timestamp"> <?php echo $event['footer_2']; ?> </span>
											</p>
										</li>
										
										<li>											
											<img src="<?php echo $evt_pic['footer_3']; ?>" height="40" width="150" alt=" <?php echo $photo['footer_1']; ?> " class="pull-left" style="margin-right:13px">
																						
											<p>
												<a href="events"><?php echo $event['content_3']; ?></a>  <a href="#"></a> <span class="timestamp"> <?php echo $event['footer_3']; ?> </span>
											</p>
										</li>
									</ul> 
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div>
										<div class="col-md-6 text-right"><a href="events" class="btn btn-primary">Load More</a></div>
									</div>
								</div>
							</div>
							<!-- END RECENT PURCHASES -->
						</div>						
					</div>
					
					
					<!-- SCHOOL FACILITIES -->
					<div class="row">
						<div class="col-md-12">
					
							
							<!-- TABBED CONTENT -->
								<div class="custom-tabs-line tabs-line-bottom left-aligned">
									<ul class="nav" role="tablist">
										<li class="active"><a href="#facilities" role="tab" data-toggle="tab">Facilities</a></li>
										<li><a href="#calendar" role="tab" data-toggle="tab">Calendar</a></li>
										<li><a href="#resulted" role="tab" data-toggle="tab">Results</a></li>
										<li><a href="#others" role="tab" data-toggle="tab">Others <span class="badge">2</span></a></li>
									</ul>
								</div>
								<div class="tab-content">
									<!-- FACILITIES -->
									<div class="tab-pane fade in active" id="facilities">
										
										<div class="">			<h4>Our Facilities</h4>		  </div>
										
									  <div class="row" style="">
									  <div class="col-md-4">
										<!-- PANEL WITH FOOTER --> 
										<div class="panel">
											<div class="panel-heading">
												<h3 class="panel-title"> <?php echo $page['title_2']; ?> </h3>
												<div class="right">
													<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
												</div>
											</div>
											<div class="panel-body">							
												
												<p style="height:100%;width:100%">
												 <img src="<?php echo $photo['footer_6']; ?>" height="200" width="350" alt=" <?php echo $photo['title_6']; ?> ">
												</p>
											</div>
											<div class="panel-footer">
												<h5> <?php echo $page['footer_2']; ?> </h5>
											</div>
										</div>
									</div>
										
									<div class="col-md-4">
										<div class="panel">
											<div class="panel-heading">
												<h3 class="panel-title"> <?php echo $page['title_3']; ?> </h3>
												<div class="right">
													<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
												</div>
											</div>
											<div class="panel-body">							
												<p style="height:100%;width:100%">
												 <img src="<?php echo $photo['footer_7']; ?>" height="200" width="350" alt=" <?php echo $photo['title_7']; ?> ">
												</p>
											</div>
											<div class="panel-footer">
												<h5>  <?php echo $page['footer_3']; ?>  </h5>
											</div>
										</div>
										
									</div>
									<!-- END PANEL WITH FOOTER --> 
									
									
									<div class="col-md-4">
										<!-- PANEL WITH FOOTER -->
										<div class="panel">
											<div class="panel-heading">
												<h3 class="panel-title"> <?php echo $page['title_4']; ?> </h3>
												<div class="right">
													<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
												</div>
											</div>
											<div class="panel-body">							
												
												<p style="height:100%;width:100%">
												 <img src="<?php echo $photo['footer_8']; ?>" height="200" width="350" alt=" <?php echo $photo['title_8']; ?> ">
												</p>
											</div>
											<div class="panel-footer">
												<h5> <?php echo $page['footer_4']; ?>  </h5>
											</div>
										</div>
									</div>	
									
										<!-- END PANEL WITH FOOTER -->
									
								</div>
										
									
									</div>
									<!-- END SCHOOL FACILITIES -->
									
									
									<!-- CALENDAR -->
									<div class="tab-pane fade" id="calendar">
										<div class="table-responsive">
									<!-- BORDERED TABLE -->
									<div class="panel">
										<div class="panel-heading">
											<h3 class="panel-title">School Calender</h3>
										</div>
										<div class="panel-body">
											<table class="table  table-hover table-bordered">
												<thead>
													<tr>
														<th> Term </th>
														<th>Term Start</th>
														<th>Term Break</th>
														<th>First Test</th>
														<th>Mid Term</th>
														<th>Second Test</th>
														<th>Term Break</th>
														<th>Termly Exams</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>First Term</td>
														<td><?php echo $acad['f_term_start']; ?></td>
														<td><?php echo $acad['ft_first_break']; ?></td>
														<td><?php echo $acad['ft_first_test']; ?></td>
														<td><?php echo $acad['ft_mid_term']; ?></td>
														<td><?php echo $acad['ft_second_test']; ?></td>
														<td><?php echo $acad['ft_second_break']; ?></td>
														<td><?php echo $acad['f_term_exams']; ?></td>
													</tr>
													<tr>
														<td>Second Term</td>
														<td><?php echo $acad['s_term_start']; ?></td>
														<td><?php echo $acad['st_first_break']; ?></td>
														<td><?php echo $acad['st_first_test']; ?></td>
														<td><?php echo $acad['st_mid_term']; ?></td>
														<td><?php echo $acad['st_second_test']; ?></td>
														<td><?php echo $acad['st_second_break']; ?></td>
														<td><?php echo $acad['s_term_exams']; ?></td>
													</tr>
													<tr>
														<td>Third Term</td>
														<td><?php echo $acad['t_term_start']; ?></td>
														<td><?php echo $acad['tt_first_break']; ?></td>
														<td><?php echo $acad['tt_first_test']; ?></td>
														<td><?php echo $acad['tt_mid_term']; ?></td>
														<td><?php echo $acad['tt_second_test']; ?></td>
														<td><?php echo $acad['tt_second_break']; ?></td>
														<td><?php echo $acad['t_term_exams']; ?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<!-- END BORDERED TABLE -->
										</div>
									</div>
									<!-- END CALENDAR -->
								
									<!-- RESULTS -->
									<div class="tab-pane fade" id="resulted">
										<div class="table-responsive">
									<!-- BORDERED TABLE -->
									<div class="panel">
										<div class="panel-heading">
											<h3 class="panel-title">Best Results</h3>
										</div>
										<div class="panel-body">
										
											<table class="table  table-hover table-bordered">
												<thead>
													<tr>
														<th>Class</th>
														<th>Photo </th>
														<th>Overall</th>
														<th>FirstName</th>
														<th>LastName</th>
														<th>Term</th>
														<th>Session</th>
													</tr>
												</thead>
												<tbody>
													<!-- CLASS ONE BEST RESULT -->
													<tr>
														<td> <?php echo $class1_row['class']; ?> </td>
														<td> <img src="upload/<?php echo $class1_row['photo']; ?>" width='100' height='40' /> </td>
														<td> <?php echo $class1_row['overall']; ?> </td>
														<td> <?php echo $class1_row['firstname']; ?> </td>
														<td> <?php echo $class1_row['lastname']; ?> </td>
														<td> <?php echo $class1_row['term']; ?> </td>
														<td> <?php echo $class1_row['session']; ?> </td>
													</tr>
													<!-- CLASS TWO BEST RESULT -->
													<tr>
														<td> <?php echo $class2_row['class']; ?> </td>
														<td> <img src="upload/<?php echo $class2_row['photo']; ?>" width='100' height='40' /> </td>
														<td> <?php echo $class2_row['overall']; ?> </td>
														<td> <?php echo $class2_row['firstname']; ?> </td>
														<td> <?php echo $class2_row['lastname']; ?> </td>
														<td> <?php echo $class2_row['term']; ?> </td>
														<td> <?php echo $class2_row['session']; ?> </td>
													</tr>
													<!-- CLASS THREE BEST RESULT -->
													<tr>
														<td> <?php echo $class3_row['class']; ?> </td>
														<td> <img src="upload/<?php echo $class3_row['photo']; ?>" width='100' height='40' /> </td>
														<td> <?php echo $class3_row['overall']; ?> </td>
														<td> <?php echo $class3_row['firstname']; ?> </td>
														<td> <?php echo $class3_row['lastname']; ?> </td>
														<td> <?php echo $class3_row['term']; ?> </td>
														<td> <?php echo $class3_row['session']; ?> </td>
													</tr>
													<!-- CLASS FOUR BEST RESULT -->
													<tr>
														<td> <?php echo $class4_row['class']; ?> </td>
														<td> <img src="upload/<?php echo $class4_row['photo']; ?>" width='100' height='40' /> </td>
														<td> <?php echo $class4_row['overall']; ?> </td>
														<td> <?php echo $class4_row['firstname']; ?> </td>
														<td> <?php echo $class4_row['lastname']; ?> </td>
														<td> <?php echo $class4_row['term']; ?> </td>
														<td> <?php echo $class4_row['session']; ?> </td>
													</tr>													
													<!-- CLASS FIVE BEST RESULT -->
													<tr>
														<td> <?php echo $class5_row['class']; ?> </td>
														<td> <img src="upload/<?php echo $class5_row['photo']; ?>" width='100' height='40' /> </td>
														<td> <?php echo $class5_row['overall']; ?> </td>
														<td> <?php echo $class5_row['firstname']; ?> </td>
														<td> <?php echo $class5_row['lastname']; ?> </td>
														<td> <?php echo $class5_row['term']; ?> </td>
														<td> <?php echo $class5_row['session']; ?> </td>
													</tr>
													<!-- CLASS SIX BEST RESULT -->
													<tr>
														<td> <?php echo $class6_row['class']; ?> </td>
														<td> <img src="upload/<?php echo $class6_row['photo']; ?>" width='100' height='40' /> </td>
														<td> <?php echo $class6_row['overall']; ?> </td>
														<td> <?php echo $class6_row['firstname']; ?> </td>
														<td> <?php echo $class6_row['lastname']; ?> </td>
														<td> <?php echo $class6_row['term']; ?> </td>
														<td> <?php echo $class6_row['session']; ?> </td>
													</tr>
													</tbody>
												
												
											</table>
													
										</div>
									</div>
									<!-- END BORDERED TABLE -->
										</div>
									</div>
									<!-- END RESULTS -->
								
									<!-- OTHERS -->
									<div class="tab-pane fade" id="others">
										<div class="table-responsive">
									<!-- BORDERED TABLE -->
									<div class="panel">
										<div class="panel-heading">
											<h3 class="panel-title">Others</h3>
										</div>
										<div class="panel-body">
											
												
										</div>
									</div>
									<!-- END BORDERED TABLE -->
										</div>
									</div>
									<!-- END OTHERS -->
								
								</div>
								<!-- END TABBED CONTENT -->
							
							
							
							
							
							
							
							
							
			
					
						</div>						
					</div>
					
					
					<!-- SCHOOL FACILITIES -->
					<div class="row">
						<div class="col-md-12">
						
						<div class="col-md-7">
							<!-- TODO LIST -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Video Tour</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									</div>
								</div>
								<div class="panel-body">									
									<video width="100%" height="100%" controls>
										<source src="<?php echo $photo['footer_5']; ?>" type="video/mp4"> 
										Your browser does not support the video tag.
									</video>
								</div>
							</div>
							<!-- END TODO LIST -->
						</div>
						
						<div class="col-md-5">
							<!-- TODO LIST -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Attestations </h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<ul class="list-unstyled activity-list">
										<li>											
											<img src="<?php echo $att_pic['footer_1']; ?>" height="40" width="150" alt=" <?php echo $photo['footer_1']; ?> " class="img-circle pull-left avatar" style="margin-right:13px">
																						
											<p>
												<a href="attestations"><?php echo $attest['title_1']; ?></a>  <a href="attestations"></a><?php echo $attest['content_1']; ?>
												<span class="timestamp"> <?php echo $attest['footer_1']; ?> </span>
											</p>
										</li>
										
										<li>											
											<img src="<?php echo $att_pic['footer_2']; ?>" height="40" width="150" alt=" <?php echo $photo['footer_1']; ?> " class="img-circle pull-left avatar" style="margin-right:13px">
																						
											<p>
												<a href="attestations"><?php echo $attest['title_2']; ?></a>  <a href="attestations"></a> 
												<?php echo $attest['content_2']; ?>
												<span class="timestamp"> <?php echo $attest['footer_2']; ?> </span>
											</p>
										</li>
										
										<li>											
											<img src="<?php echo $att_pic['footer_3']; ?>" height="40" width="150" alt=" <?php echo $photo['footer_1']; ?> " class="img-circle pull-left avatar" style="margin-right:13px">
																						
											<p>
												<a href="attestations"><?php echo $attest['title_3']; ?></a>  <a href="attestations"></a> <?php echo $attest['content_1']; ?>
												<span class="timestamp"> <?php echo $attest['footer_3']; ?> </span>
											</p>
										</li>
									</ul>
									<button type="button" class="btn btn-primary btn-bottom center-block">Load More</button>
								</div>
							</div>
							<!-- END TODO LIST -->
						</div>
						
						</div>
					</div>
					
					
					
					<div class="row">
						<div class="col-md-7">
							<!-- TODO LIST -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">To-Do List</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<ul class="list-unstyled todo-list">
										<li>
											<label class="control-inline fancy-checkbox">
												<input type="checkbox"><span></span>
											</label>
											<p>
												<span class="title">Term Exams</span>
												<span class="short-description">Create Questions For Students And Auto Generate PIN For Exams.</span>
												<span class="date">Oct 9, 2017</span>
											</p>
											<div class="controls">
												<a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
											</div>
										</li>
										<li>
											<label class="control-inline fancy-checkbox">
												<input type="checkbox"><span></span>
											</label>
											<p>
												<span class="title">School Attendance</span>
												<span class="short-description">Mark Students Attendance For Today .</span>
												<span class="date">Oct 23, 2016</span>
											</p>
											<div class="controls">
												<a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
											</div>
										</li>
										<li>
											<label class="control-inline fancy-checkbox">
												<input type="checkbox"><span></span>
											</label>
											<p>
												<strong>Weekly Staff Meeting</strong>
												<span class="short-description">Monotonectally formulate client-focused core competencies after parallel web-readiness.</span>
												<span class="date">Oct 11, 2016</span>
											</p>
											<div class="controls">
												<a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
											</div>
										</li>
									</ul>
								
								</div>
							</div>
							<!-- END TODO LIST -->
						</div>
						<div class="col-md-5">
							<!-- PANEL NO PADDING -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">New Forte School</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding bg-primary text-center">
									<div class="padding-top-30 padding-bottom-30">
										<i class="fa fa-thumbs-o-up fa-5x"></i>
										<h3>To Come Soon</h3>
									</div>
									
									<div class="padding-top-30 padding-bottom-30">
										<i class="fa fa-thumbs-o-up fa-5x"></i>
										<h3>To Come Soon</h3>
									</div>
								</div>
							</div>
							<!-- END PANEL NO PADDING -->
						</div>
					</div>
					

					
					
				
		
				</div>
			</div>
			<!-- END MAIN CONTENT -->
			
			
			
		
		
		
		</div>
		<!-- END MAIN -->
		
		
		
	<?php include('layout/bottom-footer.php') ?>
