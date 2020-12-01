
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           

	
	
		
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		
		
		
			<!-- STUDENTS PROFILE SCRIPT
			<?php
				$id = $_GET['id'];   //filter(GET, 'id', FILTER_SANITIZE_STRING);							
				@$result = student_profile($id);
				if(@$result->num_rows > 0){	$student = $result->fetch_assoc();  }
			?>
						
			<!-- STUDENTS ALL FIRST TERM RESULT SCRIPT
			<?php				
				$id = $_GET['id']; 		    $term = 'first';
				$class1 = 'class1'; $class2 = 'class2'; $class3 = 'class3'; $class4 = 'class4'; $class5 = 'class5'; $class6 = 'class6'; 						
				@$result1 = student_result($id, $class1, $term);
				if(@$result1->num_rows >= 0){	$class1FTR = $result1->fetch_assoc();  }
						
				@$result2 = student_result($id, $class2, $term);
				if(@$result2->num_rows >= 0){	$class2FTR = $result2->fetch_assoc();  }
				
				@$result3 = student_result($id, $class3, $term);
				if(@$result3->num_rows >= 0){	$class3FTR = $result3->fetch_assoc();  }
						
				@$result4 = student_result($id, $class4, $term);
				if(@$result4->num_rows >= 0){	$class4FTR = $result4->fetch_assoc();  }
				
				@$result5 = student_result($id, $class5, $term);
				if(@$result5->num_rows >= 0){	$class5FTR = $result5->fetch_assoc();  }
						
				@$result6 = student_result($id, $class6, $term);
				if(@$result6->num_rows >= 0){	$class6FTR = $result6->fetch_assoc();  }
			?>
		    
			<!-- STUDENTS ALL SECOND TERM RESULT SCRIPT
			<?php				
				$id = $_GET['id']; 		     $term = 'second';
				$class1 = 'class1'; $class2 = 'class2'; $class3 = 'class3'; $class4 = 'class4'; $class5 = 'class5'; $class6 = 'class6';
				
				@$result1 = student_result($id, $class1, $term);
				if(@$result1->num_rows >= 0){	$class1STR = $result1->fetch_assoc();  }
				
				@$result2 = student_result($id, $class2, $term);
				if(@$result2->num_rows >= 0){	$class2STR = $result2->fetch_assoc();  }
				
				@$result3 = student_result($id, $class3, $term);
				if(@$result3->num_rows >= 0){	$class3STR = $result3->fetch_assoc();  }
				
				@$result4 = student_result($id, $class4, $term);
				if(@$result4->num_rows >= 0){	$class4STR = $result4->fetch_assoc();  }
				
				@$result5 = student_result($id, $class5, $term);
				if(@$result5->num_rows >= 0){	$class5STR = $result5->fetch_assoc();  }
				
				@$result6 = student_result($id, $class6, $term);
				if(@$result6->num_rows >= 0){	$class6STR = $result6->fetch_assoc();  }
			?>
			
			<!-- STUDENTS ALL THIRD TERM RESULT SCRIPT
			<?php				
				$id = $_GET['id']; 	   $term = 'third';  
				$class1 = 'class1'; $class2 = 'class2'; $class3 = 'class3'; $class4 = 'class4'; $class5 = 'class5'; $class6 = 'class6';
				
				@$result1 = student_result($id, $class1, $term);
				if(@$result1->num_rows >= 0){	$class1TTR = $result1->fetch_assoc();  }
				
				@$result2 = student_result($id, $class2, $term);
				if(@$result2->num_rows >= 0){	$class2TTR = $result2->fetch_assoc();  }
				
				@$result3 = student_result($id, $class3, $term);
				if(@$result3->num_rows >= 0){	$class3TTR = $result3->fetch_assoc();  }
				
				@$result4 = student_result($id, $class4, $term);
				if(@$result4->num_rows >= 0){	$class4TTR = $result4->fetch_assoc();  }
				
				@$result5 = student_result($id, $class5, $term);
				if(@$result5->num_rows >= 0){	$class5TTR = $result5->fetch_assoc();  }
				
				@$result6 = student_result($id, $class6, $term);
				if(@$result6->num_rows >= 0){	$class6TTR = $result6->fetch_assoc();  }
			?>
			
			
			
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
		
		
		
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left" style="width:25%">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="upload/<?php echo $student['picture'];  ?>" class="img-circle" width="200" alt="Avatar">
										<h3 class="name"><?php echo $student['lastname'].' '.$student['firstname'];  ?></h3>
										<span class="online-status status-available" ><?php echo $student['role'];  ?> </span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												45 <span>Projects</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Awards</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Basic Info</h4>
										<ul class="list-unstyled list-justify">
											<li>Date Of Birth <span><?php echo $student['dob'];  ?></span></li>
											<li>Gender <span><?php echo $student['gender'];  ?></span></li>
											<li>Mobile <span><?php echo $student['phone'];  ?></span></li>
											<li>Email <span><?php echo $student['email'];  ?></span></li>
											<!-- <li>Website <span><a href="https://www.themeineed.com">www.themeineed.com</a></span></li> -->
										</ul>
									</div>
									<div class="profile-info">
										<h4 class="heading">Social</h4>
										<ul class="list-inline social-icons">
											<li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#" class="google-plus-bg"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#" class="github-bg"><i class="fa fa-github"></i></a></li>
										</ul>
									</div>
									<div class="profile-info">
										<h4 class="heading">About</h4>  <button type="button" class="btn btn-danger" id="deact_btn">Danger</button>
										<p>Interactively fashion excellent information after distinctive outsourcing.</p>
									</div>
									<div class="text-center">
									<a href="#" class="btn btn-primary pull-left">Edit Profile</a>
									
									</div>
									<button type="submit" class="btn btn-danger pull-right">Deactivate</button>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right" style="width:75%">
								
								<!-- TABBED CONTENT -->
								<div class="custom-tabs-line tabs-line-bottom left-aligned">
									<ul class="nav" role="tablist">
										<li class="active"><a href="#tab-bottom-profile" role="tab" data-toggle="tab"><i class="fa fa-child"></i> Profile</a></li>
										<li><a href="#tab-bottom-attendance" role="tab" data-toggle="tab"><i class="fa fa-calendar"></i> Attendance <span class="badge">7</span></a></li>
										<li><a href="#tab-bottom-result" role="tab" data-toggle="tab"><i class="fa fa-mortar-board"></i> Result </a></li>
										<li><a href="#tab-bottom-activity" role="tab" data-toggle="tab"><i class="fa fa-futbol-o"></i> Activities </a></li>
										<li><a href="#tab-bottom-finance" role="tab" data-toggle="tab"><i class="fa fa-usd"></i> Finance </a></li>
									</ul>
								</div>
								
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab-bottom-profile">
										
										<div class="col-md-12">
											<!-- PANEL WITH FOOTER -->
											<div class="panel table-responsive">
												<div class="panel-heading well">
													<h3 class="panel-title">Student Profile</h3>
													<div class="right">
														<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
													</div>
												</div>
												<div class="panel-body no-padding">

												<table class="table" width="98%" border="0" cellspadding="3">
													<tr>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">First Name</span> </td> 
													<td style="width:30%"> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $student['firstname']; ?>
													</span </td>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Middle Name</span> </td>
													<td style="width:20%"> <span class="label " style="color:#666; font-size:12.5px">
													<?php echo $student['midname']; ?>
													</span> </td>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Last Name</span> </td>
													<td style="width:20%"> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $student['lastname']; ?>
													</span> </td>
													</tr>
													
													<tr>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Student No</span> </td> 
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $student['regist_no']; ?>
													</span </td>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Parent Email</span> </td>
													<td> <span class="label " style="color:#666; font-size:12.5px">
													<?php echo $student['email']; ?>
													</span> </td>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Parent Phone</span> </td>
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $student['phone']; ?>
													</span> </td>
													</tr>
													
													<tr>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">School</span> </td> 
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $student['school']; ?>
													</span </td>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Class</span> </td>
													<td> <span class="label " style="color:#666; font-size:12.5px">
													<?php echo $student['class']; ?>
													</span> </td>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Session</span> </td>
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $student['session']; ?>
													</span> </td>
													</tr>
													
													<tr>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Gender</span> </td> 
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $student['gender']; ?>
													</span </td>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Date Of Birth</span> </td>
													<td> <span class="label " style="color:#666; font-size:12.5px">
													<?php echo $student['dob']; ?>
													</span> </td>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Category</span> </td>
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $student['category']; ?>
													</span> </td>
													</tr>
													
													<tr>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Address</span> </td> 
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $student['address']; ?>
													</span </td>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">State</span> </td>
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $student['state']; ?>
													</span> </td>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Nationality</span> </td>
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $student['nationality']; ?>
													</span> </td>
													</tr>
												</table>
												
												
												</div>

											</div>
											<!-- END PANEL WITH FOOTER -->
										</div>
										
									</div>
									
									
									
									<div class="tab-pane fade" id="tab-bottom-attendance">
										<div class="table-responsive">
										
											<table id="dataTable" class="table table-hover table-bordered">								
						
											<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->
											<?php
												$conn = db_connect();
												$aid = @$_GET['id'];      $a_class = @$_GET['class'];
												$attend_tbl = $a_class;
												$attend_tbl .= '_attendance';
												$query = "SELECT * FROM $attend_tbl WHERE regist_no = '{$aid}'";
												$result = $conn->query($query);								
												if(@$result->num_rows > 0)
												{
													//$row = $result->fetch_assoc();
													
													echo'<thead>
															<tr style="background-color:#f9f9f9; color:#5D8AA8; cursor:pointer">
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Student Number </th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Last Name</th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Date</th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Attendance</th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Class</th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Term</th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Session</th>
															</tr>
														</thead>
														<tbody>';
													while(@$row = @$result->fetch_assoc())
													{  ?>
														<tr>
															<td> <?php echo $row['regist_no']; ?> </td>
															<td> <?php echo $row['lastname']; ?> </td>
															<td> <?php echo $row['date']; ?> </td>
															<td> <?php echo $row['attendance']; ?></td>
															<td> <?php echo $row['class']; ?> </td>
															<td> <?php echo $row['term']; ?> </td>
															<td> <?php echo $row['session']; ?> </td>	<?php $sid = $row['regist_no']; ?> 

														</tr>
											<?php	}  }    ?>
											</tbody>
										</table>
										
										</div>
									</div>
									
									
									
									
									
									<div class="tab-pane fade" id="tab-bottom-result">
										<div class="table-responsive">
										
										<ul class="nav nav-tabs">
										  <li class="active"><a data-toggle="tab" href="#one">Class 1</a></li>
										  <li><a data-toggle="tab" href="#two">Class 2</a></li>
										  <li><a data-toggle="tab" href="#three">Class 3</a></li>
										  <li><a data-toggle="tab" href="#four">Class 4</a></li>
										  <li><a data-toggle="tab" href="#five">Class 5</a></li>
										  <li><a data-toggle="tab" href="#six">Class 6</a></li>
										</ul>

										<div class="tab-content">
										  <div id="one" class="tab-pane fade in active">
											<div class="panel-heading well">
												<h3 class="panel-title">Class One Results</h3>
												<div class="right">
													<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
												</div>
											</div>
											
											<div class="panel-body">
											<!-- TABBED CONTENT -->
											<div class="custom-tabs-line tabs-line-bottom left-aligned">
												<ul class="nav" role="tablist">
													<li class="active"><a href="#c1_first" role="tab" data-toggle="tab">First Term</a></li>
													<li><a href="#c1_second" role="tab" data-toggle="tab">Second Term </a></li>
													<li><a href="#c1_third" role="tab" data-toggle="tab">Third Term </a></li>
												</ul>
											</div>
											<div class="tab-content">
												<div class="tab-pane fade in active" id="c1_first">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Percentage</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class1FTR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1FTR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1FTR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1FTR['mark_1'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class1FTR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1FTR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1FTR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1FTR['mark_2'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class1FTR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1FTR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1FTR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1FTR['mark_3'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class1FTR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1FTR['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1FTR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1FTR['mark_4'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class1FTR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1FTR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1FTR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1FTR['mark_5'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
												<div class="tab-pane fade" id="c1_second">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class1STR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1STR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1STR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1STR['mark_1'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class1STR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1STR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1STR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1STR['mark_2'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class1STR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1STR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1STR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1STR['mark_3'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class1STR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1STR['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1STR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1STR['mark_4'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class1STR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1STR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1STR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1STR['mark_5'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
												<div class="tab-pane fade" id="c1_third">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class1TTR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1TTR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1TTR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1TTR['mark_1'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class1TTR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1TTR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1TTR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1TTR['mark_2'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class1TTR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1TTR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1TTR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1TTR['mark_3'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class1TTR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1TTR['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1TTR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1TTR['mark_4'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class1TTR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1TTR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1TTR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1TTR['mark_5'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
											</div>
											<!-- END TABBED CONTENT -->
										
											</div>
											
										  </div>
										  
										  
										  
										  <div id="two" class="tab-pane fade">
											<div class="panel-heading well">
												<h3 class="panel-title">Class Two Results</h3>
												<div class="right">
													<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
												</div>
											</div>
											
											<div class="panel-body">
											<!-- TABBED CONTENT -->
											<div class="custom-tabs-line tabs-line-bottom left-aligned">
												<ul class="nav" role="tablist">
													<li class="active"><a href="#c2_first" role="tab" data-toggle="tab">First Term</a></li>
													<li><a href="#c2_second" role="tab" data-toggle="tab">Second Term </a></li>
													<li><a href="#c2_third" role="tab" data-toggle="tab">Third Term </a></li>
												</ul>
											</div>
											<div class="tab-content">
												<div class="tab-pane fade in active" id="c2_first">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Percentage</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class1STR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1STR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1STR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1STR['mark_1'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class1STR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1STR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1STR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1STR['mark_2'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class1STR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1STR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1STR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1STR['mark_3'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class1STR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1STR['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1STR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1STR['mark_4'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class1STR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class1STR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class1STR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class1STR['mark_5'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
												<div class="tab-pane fade" id="c2_second">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class2STR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class2STR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class2STR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class2STR['mark_1'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class2STR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class2STR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class2STR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class2STR['mark_2'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class2STR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class2STR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class2STR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class2STR['mark_3'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class2STR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class2STR['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class2STR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class2STR['mark_4'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class2STR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class2STR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class2STR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class2STR['mark_5'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
												<div class="tab-pane fade" id="c2_third">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class2TTR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class2TTR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class2TTR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class2TTR['mark_1'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class2TTR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class2TTR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class2TTR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class2TTR['mark_2'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>		
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class2TTR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class2TTR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class2TTR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class2TTR['mark_3'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>		
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class2TTR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class2TTR['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class2TTR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class2TTR['mark_4'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>		
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class2TTR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class2TTR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class2TTR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class2TTR['mark_5'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>		
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
											</div>
											<!-- END TABBED CONTENT -->
										
											</div>
											
										  </div>
										  
										  
										  
										  <div id="three" class="tab-pane fade">
											<div class="panel-heading well">
												<h3 class="panel-title">Class Three Results</h3>
												<div class="right">
													<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
												</div>
											</div>
											
											<div class="panel-body">
											<!-- TABBED CONTENT -->
											<div class="custom-tabs-line tabs-line-bottom left-aligned">
												<ul class="nav" role="tablist">
													<li class="active"><a href="#c3_first" role="tab" data-toggle="tab">First Term</a></li>
													<li><a href="#c3_second" role="tab" data-toggle="tab">Second Term </a></li>
													<li><a href="#c3_third" role="tab" data-toggle="tab">Third Term </a></li>
												</ul>
											</div>
											<div class="tab-content">
												<div class="tab-pane fade in active" id="c3_first">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Percentage</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class3FTR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class3FTR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class3FTR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class3FTR['mark_1'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class3FTR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class3FTR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class3FTR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class3FTR['mark_2'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class3FTR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class3FTR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class3FTR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class3FTR['mark_3'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class3FTR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class3FTR['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class3FTR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class3FTR['mark_4'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class3FTR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class3FTR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class3FTR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class3FTR['mark_5'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
												<div class="tab-pane fade" id="c3_second">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class3STR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class3STR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class3STR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class3STR['mark_1'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class3STR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class3STR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class3STR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class3STR['mark_2'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class3STR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class3STR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class3STR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class3STR['mark_3'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class3STR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class3STR['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class3STR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class3STR['mark_4'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class3STR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class3STR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class3STR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class3STR['mark_5'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
												<div class="tab-pane fade" id="c3_third">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class3TTR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class3TTR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class3TTR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class3TTR['mark_1'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class3TTR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class3TTR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class3TTR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class3TTR['mark_2'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class3TTR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class3TTR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class3TTR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class3TTR['mark_3'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class3TTR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class3TTR['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class3TTR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class3TTR['mark_4'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class3TTR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class3TTR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class3TTR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class3TTR['mark_5'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
											</div>
											<!-- END TABBED CONTENT -->
										
											</div>
										  </div>
										  
										  
										  <div id="four" class="tab-pane fade">
											<div class="panel-heading well">
												<h3 class="panel-title">Class Four Results</h3>
												<div class="right">
													<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
												</div>
											</div>
											
											<div class="panel-body">
											<!-- TABBED CONTENT -->
											<div class="custom-tabs-line tabs-line-bottom left-aligned">
												<ul class="nav" role="tablist">
													<li class="active"><a href="#c4_first" role="tab" data-toggle="tab">First Term</a></li>
													<li><a href="#c4_second" role="tab" data-toggle="tab">Second Term </a></li>
													<li><a href="#c4_third" role="tab" data-toggle="tab">Third Term </a></li>
												</ul>
											</div>
											<div class="tab-content">
												<div class="tab-pane fade in active" id="c4_first">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Percentage</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class4FTR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class4FTR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class4FTR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class4FTR['mark_1'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class4FTR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class4FTR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class4FTR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class4FTR['mark_2'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class4FTR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class4FTR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class4FTR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class4FTR['mark_3'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class4FTR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class4FTR['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class4FTR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class4FTR['mark_4'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class4FTR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class4FTR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class4FTR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class4FTR['mark_5'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
												<div class="tab-pane fade" id="c4_second">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class4STR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class4STR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class4STR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class4STR['mark_1'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class4STR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class4STR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class4STR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class4STR['mark_2'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class4STR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class4STR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class4STR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class4STR['mark_3'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class4STR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class4STR['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class4STR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class4STR['mark_4'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class4STR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class4STR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class4STR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class4STR['mark_5'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
												<div class="tab-pane fade" id="c4_third">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class4TTR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class4TTR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class4TTR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class4TTR['mark_1'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class4TTR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class4TTR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class4TTR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class4TTR['mark_2'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class4TTR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class4TTR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class4TTR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class4TTR['mark_3'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class4TTR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class4TTR['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class4TTR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class4TTR['mark_4'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class4TTR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class4TTR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class4TTR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class4TTR['mark_5'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
											</div>
											<!-- END TABBED CONTENT -->
										
											</div>
										  </div>
										  
										  
										  
										  <div id="five" class="tab-pane fade">
											<div class="panel-heading well">
												<h3 class="panel-title">Class Five Results</h3>
												<div class="right">
													<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
												</div>
											</div>
											
											<div class="panel-body">
											<!-- TABBED CONTENT -->
											<div class="custom-tabs-line tabs-line-bottom left-aligned">
												<ul class="nav" role="tablist">
													<li class="active"><a href="#c5_first" role="tab" data-toggle="tab">First Term</a></li>
													<li><a href="#c5_second" role="tab" data-toggle="tab">Second Term </a></li>
													<li><a href="#c5_third" role="tab" data-toggle="tab">Third Term </a></li>
												</ul>
											</div>
											<div class="tab-content">
												<div class="tab-pane fade in active" id="c5_first">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Percentage</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class5FTR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class5FTR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class5FTR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class5FTR['mark_1'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class5FTR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class5FTR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class5FTR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class5FTR['mark_2'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class5FTR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class5FTR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class5FTR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class5FTR['mark_3'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class5FTR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $firstTermRest['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class5FTR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class5FTR['mark_4'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class5FTR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class5FTR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class5FTR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class5FTR['mark_5'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
												<div class="tab-pane fade" id="c5_second">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class5STR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class5STR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class5STR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class5STR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class5STR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class5STR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class5STR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class5STR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class5STR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class5STR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class5STR['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class5STR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class5STR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class5STR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class5STR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
												<div class="tab-pane fade" id="c5_third">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class5TTR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class5TTR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class5TTR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class5TTR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class5TTR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class5TTR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class5TTR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class5TTR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class5TTR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class5TTR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class5TTR['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class5TTR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class5TTR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class5TTR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class5TTR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
											</div>
											<!-- END TABBED CONTENT -->
										
											</div>
										  </div>
										  
										  
										  <div id="six" class="tab-pane fade">
											<div class="panel-heading well">
												<h3 class="panel-title">Class Six Results</h3>
												<div class="right">
													<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
												</div>
											</div>
											
											<div class="panel-body">
											<!-- TABBED CONTENT -->
											<div class="custom-tabs-line tabs-line-bottom left-aligned">
												<ul class="nav" role="tablist">
													<li class="active"><a href="#c6_first" role="tab" data-toggle="tab">First Term</a></li>
													<li><a href="#c6_second" role="tab" data-toggle="tab">Second Term </a></li>
													<li><a href="#c6_third" role="tab" data-toggle="tab">Third Term </a></li>
												</ul>
											</div>
											<div class="tab-content">
												<div class="tab-pane fade in active" id="c6_first">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Percentage</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class6FTR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class6FTR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class6FTR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class6FTR['mark_1'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class6FTR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class6FTR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class6FTR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class6FTR['mark_2'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class6FTR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class6FTR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class6FTR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class6FTR['mark_3'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class6FTR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class6FTR['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class6FTR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class6FTR['mark_4'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class6FTR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class6FTR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class6FTR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress"> <?php $w = $class6FTR['mark_5'].'%'; ?>
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $w; ?>;">
																				<span><?php echo $w; ?> Percent</span>
																			</div>
																		</div>
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
												<div class="tab-pane fade" id="c6_second">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class6STR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class6STR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class6STR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class6STR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class6STR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class6STR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class6STR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class6STR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class6STR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class6STR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class6STR['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class6STR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class6STR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class6STR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class6STR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
												<div class="tab-pane fade" id="c6_third">
													<div class="table-responsive">
														<table class="table project-table">
															<thead>
																<tr>
																	<th>Subjects</th>
																	<th>Marks</th>
																	<th>Grades</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><a href="#"><?php echo $class6TTR['subject_1']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class6TTR['mark_1'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class6TTR['mark_1']); if($grade == 'Fail') {echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class6TTR['subject_2']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class6TTR['mark_2'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class6TTR['mark_2']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class6TTR['subject_3']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class6TTR['mark_3'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class6TTR['mark_3']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr>
																<tr>
																	<td><a href="#"><?php echo $class6TTR['subject_4']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class6TTR['mark_4'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class6TTR['mark_4']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr><tr>
																	<td><a href="#"><?php echo $class6TTR['subject_5']; ?></a></td>
																	<td><span class="label label-success"><?php echo $class6TTR['mark_5'].'%'; ?></span></td>
																	<td><?php $grade = set_grade($class6TTR['mark_5']);  if($grade == 'Fail') { echo '<span class="label label-danger">'.$grade.'</span>'; } else { echo '<span class="label label-success">'.$grade.'</span>'; } ?></td>
																	<td>
																		<div class="progress">
																			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
																				<span>60% Complete</span>
																			</div>
																		</div>
																	</td>														
																</tr>
															</tbody>
														</table>
													</div>										
												</div>
												
												
											</div>
											<!-- END TABBED CONTENT -->
										
											</div>
										  </div>
										  
										  
										  
										  
										</div>
										
										

										
										</div>
									</div>
									
									
									
									
									
									<div class="tab-pane fade" id="tab-bottom-activity">
										<div class="table-responsive">
										
										
										</div>
									</div>
									
									<div class="tab-pane fade" id="tab-bottom-finance">
										<div class="table-responsive">
										
										
										</div>
									</div>
								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
	<br><br>
		
		
		
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		</div>
		<!-- END MAIN -->
		
		
		
		
		
		
	<?php include('layout/bottom-footer.php') ?>		
		
		
		
		
<script>      //AJAX FUNCTION TO DEACTIVATE STUDENT
	$(document).ready(function()
	{
		
		$("#deact_btn").click(function(e)
		{ alert();
			 var r = confirm("Are You Sure You Want To Deactivate This Student ?");
			if (r == true) 
			{
				var regist_no = $("#reg").val();
				var class = $("#cla").val();
				// Returns successful data submission message when the entered information is stored in database.
				var rdata = 'regist_no='+ regist_no + '&class='+ class;
				
				e.preventDefault();
				// AJAX Code To Submit Form.
				$.ajax(
				{
					type: "POST",
					url: "ajax/deactivate-student.php",
					data: {reg:regist_no, cla:class},
					cache: false,
					success: function()
					{
						alert('The Student Was Deactivated');			
					}
				});
			} 
			else 
			{
				e.preventDefault();
			}
		
		});
		return false;
	});
</script>		
		
		
		
		
		
		