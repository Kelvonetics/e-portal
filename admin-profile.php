
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_admin_login();  ?>

	
	
		
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		
			<?php
				$id = $_GET['id'];    $nid = $_GET['id'];   //filter(GET, 'id', FILTER_SANITIZE_STRING);							
				@$result = staff_profile($id);
				if(@$result->num_rows > 0){	$staff = $result->fetch_assoc();  }
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
										<img src="upload/<?php echo $staff['photo'];  ?>" class="img-circle" width="70%" alt="Avatar">
										<h3 class="name"><?php echo $staff['lastname'].' '.$staff['firstname'];  ?></h3>
										<span class="online-status status-available" ><?php echo $staff['role'];  ?> </span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												5 <span>Subjects</span>
											</div>
											<div class="col-md-4 stat-item">
												1 <span>Awards</span>
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
											<li>Join Date <span><?php echo $staff['doj'];  ?></span></li>
											<li>Gender <span><?php echo $staff['gender'];  ?></span></li>
											<li>Mobile <span><?php echo $staff['phone'];  ?></span></li>
											<li>Email <span><?php echo $staff['email'];  ?></span></li>
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
										<h4 class="heading">About</h4>
										<p>Passionate About My Job, Interactively Fashionable With Excellent And Distinctive Ethics.</p>
									</div>
									<div class="text-center"><a href="#" class="btn btn-primary">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right" style="width:75%">
								
								<!-- TABBED CONTENT -->
								<div class="custom-tabs-line tabs-line-bottom left-aligned">
									<ul class="nav" role="tablist">
										<li class="active"><a href="#profile" role="tab" data-toggle="tab"><i class="fa fa-child"></i> Profile</a></li>
										<li><a href="#tab-bottom-subject" role="tab" data-toggle="tab"><i class="fa fa-book"></i> Subjects </a></li>
										<li><a href="#tab-bottom-attendance" role="tab" data-toggle="tab"><i class="fa fa-calendar"></i> Attendance</a></li>										
										<li><a href="#tab-bottom-activity" role="tab" data-toggle="tab"><i class="fa fa-futbol-o"></i> Activities </a></li>										
										<li><a href="#tab-bottom-exam" role="tab" data-toggle="tab"><i class="fa fa-book"></i> Exams </a></li>
										<li><a href="#tab-bottom-leave" role="tab" data-toggle="tab"><i class="fa fa-plane"></i> Leave </a></li>
										<li><a href="#tab-bottom-finance" role="tab" data-toggle="tab"><i class="fa fa-usd"></i> Finance </a></li>
										<?php
											$conn = db_connect();	
											$query = "SELECT * FROM notifications WHERE status = 'Pending Approval'";
											$result = $conn->query($query);			$cnt = mysqli_num_rows($result);
											if($cnt >= 1) {   
										?>
										<li><a href="#tab-bottom-notification" role="tab" data-toggle="tab">
										
										<span class="badge" style="background-color:#E32636; font-size:9px; padding:3px 7px;margin:-25px -20px 0px 0px"> <?php echo $cnt; ?> 	</span>
											
										<i class="fa fa-bell"></i> Notifications </a></li>
										
										<?php } else {  ?>
										
										<li><a href="#tab-bottom-notification" role="tab" data-toggle="tab">
										<i class="fa fa-bell"></i> Notifications </a></li>
										<?php }  $conn->close(); ?>
									</ul>
								</div>
								
								<div class="tab-content">
								
									<div class="tab-pane fade in active" id="profile">
										
										<div class="col-md-12">
											<!-- PANEL WITH FOOTER -->
											<div class="panel table-responsive">
												<div class="panel-heading well">
													<h3 class="panel-title"> Profile</h3>
												<?php
													//if(isset($_REQUEST['login_btn']))
													//{
														$sid = $_SESSION['staff_id']; $fname = $_SESSION['firstname']; 
														$lname = $_SESSION['lastname'];
														$attend = mark_staff_attendance($sid, $fname, $lname);
														if($attend == "attendMarked")
														{	 
															echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
															  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																<strong>Attendance </strong> Your Attendance Was Logged.
																</div>'; 	
														}
														else
														{	 
															echo ''; 	
														}
													//}
													
													if(isset($_REQUEST['new_salary_btn']))
													{
														$sal_msg = new_staff_salary_details();
														if($sal_msg == "salaryCreated")
														{	 
															echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
															  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																<strong>Salary </strong> Staff Salary Details Created Successfully.
																</div>'; 	
														}
														else
														{	 
															echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
															  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																<strong>Error </strong> Fail To Created Staff Salary Details .'.$sal_msg.'
																</div>'; 	
														}
													}
													//logic for leave
													if(isset($_REQUEST['staff_leave_btn']))
													{
														$leave_msg = apply_for_leave();
														if($leave_msg == 'leaveApplied')
														{
															echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
																<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																   <strong>Leave </strong> Your Application For Leave Was Successful.
																 </div>';
														}
														else
														{
															echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
																	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																	  <strong>Leave </strong> Your Application For Leave Failed. '.$leave_msg;
																 '</div>  <br>';
														}
													}
													//logic for notification
													if(null !== @$_REQUEST['query'])
													{
														$q = $_REQUEST['query'];
														if($_REQUEST['action'] == 'approve')
														{	
															$not_msg = approve_notification($q);
														}
														else if($_REQUEST['action'] == 'decline')
														{
															$not_msg = decline_notification($q);
														}
														
														if($not_msg == 'Approved')
														{
															echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
																<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																   <strong> Accepted </strong> Application Was Approved.
																 </div>';
														}
														else if($not_msg == 'Declined')
														{
															echo '<div class="alert alert-warning" style="width:97.5%; margin:auto">
																	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																	  <strong> Rejected </strong>  Application Was Declined. ';
															echo '</div>';
														}
													}
												?>
													<div class="right">
														<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
													</div>
												</div>
												<div class="panel-body no-padding">

												<table class="table" width="98%" border="0" cellspadding="3">
													<tr>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">First Name</span> </td> 
													<td style="width:30%"> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $staff['firstname']; ?>
													</span> </td>
													<td style="width:8%;background-color:#eee"> <span style="color:#666" class="label">Last Name</span> </td>
													<td style="width:20%"> <span class="label " style="color:#666; font-size:12.5px">
													<?php echo $staff['lastname']; ?>
													</span> </td>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Email</span> </td>
													<td style="width:20%"> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $staff['email']; ?>
													</span> </td>
													</tr>
													
													<tr> <td colspan="3" style="">  </td>	</tr>
													
													<tr>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Staff ID</span> </td> 
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $staff['staff_id']; ?>
													</span> </td>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label"> Phone</span> </td>
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $staff['phone']; ?>
													</span> </td>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label"> Position</span> </td>
													<td> <span class="label " style="color:#666; font-size:12.5px">
													<?php echo $staff['position']; ?>
													</span> </td>													
													</tr>
													
													<tr> <td colspan="3" style="">  </td>	</tr>
													
													<tr>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label"> Gender</span> </td> 
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $staff['gender']; ?>
													</span> </td>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label"> Join Date</span> </td>
													<td> <span class="label " style="color:#666; font-size:12.5px">
													<?php echo $staff['doj']; ?>
													</span> </td>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label"> Role</span> </td>
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $staff['role']; ?>
													</span> </td>
													</tr>
													
													<tr> <td colspan="3" style="">  </td>	</tr>
													
													<tr>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Address</span> </td> 
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $staff['address']; ?>
													</span> </td>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label"> State</span> </td>
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $staff['state']; ?>
													</span> </td>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Nationality</span> </td>
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $staff['nationality']; ?>
													</span> </td>
													</tr>
													
																									
													
												</table>
												
												
												</div>

											</div>
											<!-- END PANEL WITH FOOTER -->
										</div>
										
									</div>
									
									
									<div class="tab-pane fade" id="tab-bottom-subject">
										<div class="table-responsive">
										
										<div class="panel table-responsive">
												<div class="panel-heading well">
													<h3 class="panel-title"> Subjects</h3>
													<div class="right">
														<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
													</div>
												</div>
												<div class="panel-body no-padding">

												<table class="table" width="98%" border="0" cellspadding="3">
													<tr>
													<td style="width:40%;background-color:#eee;"> <span style="color:#666" class="label">First Subject</span> </td> 
													<td style="width:60%"> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $staff['subject_1']; ?>
													</span> </td>													
													</tr>
													
													<tr> <td colspan="2" style="">  </td>	</tr>
													
													<tr>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Second Subject</span> </td> 
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $staff['subject_2']; ?>
													</span> </td>
													</tr>
													
													<tr> <td colspan="2" style="">  </td>	</tr>
													
													<tr>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label"> Third Subject </span> </td> 
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $staff['subject_3']; ?>
													</span> </td>
													</tr>
													
													<tr> <td colspan="2" style="">  </td>	</tr>
													
													<tr>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Fourth Subject</span> </td> 
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $staff['subject_4']; ?>
													</span> </td>
													</tr>
													
													<tr> <td colspan="2" style="">  </td>	</tr>
													
													<tr>
													<td style="width:8%;background-color:#eee;"> <span style="color:#666" class="label">Fifth Subject Subject</span> </td> 
													<td> <span class="label" style="color:#666; font-size:12.5px">
													<?php echo $staff['subject_5']; ?>
													</span> </td>
													</tr>													
													
												</table>
												
												
												</div>

											</div>
										
										</div>
									</div>
									
									
									<div class="tab-pane fade" id="tab-bottom-attendance">
										<div class="table-responsive">
										
										<button type="button" data-toggle="modal" data-target="#staffattend" class="btn btn-primary"><i class="fa fa-pencil"></i> Mark Attendance</button>
										
										
										
										<table id="dataTable" class="table table-hover table-bordered">								
						
											<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->
											<?php
												$conn = db_connect(); 				$aid = @$_GET['id'];  
												$query = "SELECT * FROM staff_attendance WHERE staff_id = '{$aid}' ORDER BY id DESC";
												$result = $conn->query($query);								
												if(@$result->num_rows > 0)
												{
													//$row = $result->fetch_assoc();
													
													echo'<thead>
															<tr style="background-color:#f9f9f9; color:#5D8AA8; cursor:pointer">
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Staff ID </th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Last Name</th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Date</th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Time</th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Attendance</th>
															</tr>
														</thead>
														<tbody>';
													while(@$row = @$result->fetch_assoc())
													{  ?>
														<tr>
															<td> <?php echo $row['staff_id']; ?> </td>
															<td> <?php echo $row['lastname']; ?> </td>
															<td> <?php echo $row['date'];; ?> </td>
															<td> <?php echo $row['time']; ?> </td>
															<td> <?php echo $row['attendance']; ?></td>	<?php $sid = $row['staff_id']; ?> 
														</tr>
											<?php	}  }    ?>
											</tbody>
										</table>
										
										
										
										</div>
									</div>
									
									<div class="tab-pane fade" id="tab-bottom-activity">
										<div class="table-responsive">
										
										
										</div>
									</div>
									
									<div class="tab-pane fade" id="tab-bottom-exam">
										<div class="table-responsive">
										
										
										</div>
									</div>
									
									<div class="tab-pane fade" id="tab-bottom-leave">
										<div class="table-responsive">
										
										<button type="button" data-toggle="modal" data-target="#leave" class="btn btn-primary"><i class="fa fa-pencil"></i> Apply For Leave</button>
										
										
										
										<table id="dataTable1" class="table table-hover table-bordered">								
						
											<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->
											<?php
												$conn = db_connect(); 				$aid = @$_GET['id'];  
												$query = "SELECT * FROM staff_leave WHERE staff_id = '{$aid}'";
												$result = $conn->query($query);								
												if(@$result->num_rows > 0)
												{
													//$row = $result->fetch_assoc();
													
													echo'<thead>
															<tr style="background-color:#f9f9f9; color:#5D8AA8; cursor:pointer">
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Staff ID </th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Type</th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Start</th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> End</th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Status</th>
															</tr>
														</thead>
														<tbody>';
													while(@$row = @$result->fetch_assoc())
													{  ?>
														<tr>
															<td> <?php echo $row['staff_id']; ?> </td>
															<td> <?php echo $row['leave_type']; ?> </td>
															<td> <?php echo $row['date_from'];; ?> </td>
															<td> <?php echo $row['date_to']; ?> </td>
															<td> <?php echo $row['status']; ?></td>	<?php $sid = $row['staff_id']; ?> 
														</tr>
											<?php	}  }    ?>
											</tbody>
										</table>
										
										
										</div>
									</div>
									
									<div class="tab-pane fade" id="tab-bottom-finance">
										<div class="table-responsive">
										
										<form action="staff-profile?id=<?php echo @$aid; ?>" method="post">
											<div class="panel">
												<div class="panel-heading">
													<h3 class="panel-title">Staff Salary Details</h3>
												</div>
												
												<div class="panel-body">
													<div class="input-group">
														<span class="input-group-addon">Id</span>
														<input class="form-control" type="text" name="staff_id" id="staff_id" 
														value="" readonly required>
													</div>
													<br>

													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-money"></i></span>
														<input class="form-control" placeholder="Basic Salary" type="text" name="basicsalary" id="basicsalary" required>
													</div>
													<br>
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-money"></i></span>
														<select class="form-control" name="tax" id="tax" required>
															<option value=""> Select TAX / VAT </option>
															<option value="5"> 05 Percent</option>
															<option value="10"> 10 Percent </option>
															<option value="15"> 15 Percent </option>
															<option value="20"> 20 Percent </option>
														</select>
													</div>								
													<br>
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-money"></i></span>
														<input class="form-control" placeholder="Monthly Deductions" type="text" name="deductions" id="deductions" required>
													</div>
													<br>
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-bank"></i></span>
														<input class="form-control" placeholder="Bank Name" type="text" name="bank" id="bank" required>
													</div>
													<br>
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-text">No</i></span>
														<input class="form-control" placeholder="Account Number" type="text" name="accountnumber" id="accountnumber" required>
													</div>
											
													<br>
													<p> <span class="pull-left" style="font-size:15px"> Account Type 	</span> 							
														<label class="fancy-radio pull-left" style="margin:auto 1% auto 7%">
															<input name="accounttype" name="savings" id="savings Account" value="savings" type="radio">
															<span><i></i> Savings Account</span>
														</label>
														<label class="fancy-radio pull-left" style="margin:auto 1% auto 2%">
															<input name="accounttype" name="current" id="Current Account" value="current" type="radio" required>
															<span><i></i> Current Account</span>
										
													</p>
													<input class="form-control" placeholder="Entered By" type="hidden" name="enteredby" id="enteredby" value="<?php echo @$_SESSION['firstname'].' '.@$_SESSION['lastname']; ?>" required>
													<br>
													<div class="input-group pull-right">
														<button type="reset" class="btn btn-default">Clear</button>
														<button type="submit" class="btn btn-primary" name="new_salary_btn">Create Salary Details</button>
													</div>								
													
												</div>	
											</div>
											</form>
										<!-- END INPUT GROUPS -->
											
										</div>																				
									</div>
									
									<div class="tab-pane fade" id="tab-bottom-notification">
										<div class="table-responsive">
										
										<!-- ALL NOTIFICATIONS -->
										<table id="dataTable2" class="table table-hover table-bordered">								
						
											<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->
											<?php
												$conn = db_connect();  
												$query = "SELECT * FROM notifications WHERE status = 'Pending Approval'";
												$result = $conn->query($query);								
												if(@$result->num_rows > 0)
												{
													//$row = $result->fetch_assoc();
													
													echo'<thead>
															<tr style="background-color:#f9f9f9; color:#5D8AA8; cursor:pointer">
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Name </th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Category</th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Status </th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> From</th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> To </th>
																<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Description</th>
																<th style="font-weight:lighter;"> Actions </th>
															</tr>
														</thead>
														<tbody>';
													while(@$row = @$result->fetch_assoc())
													{  ?>
														<tr>
															<td> <?php echo $row['enteredby']; ?> </td>
															<td> <?php echo $row['type']; ?> </td>
															<td> <?php echo $row['status']; ?> </td>
															<td> <?php echo $row['start_date']; ?> </td>
															<td> <?php echo $row['end_date']; ?> </td>
															<td> <?php echo $row['description']; ?></td>  
															<?php $sid = @$_SESSION['staff_id']; ?>  <?php $id = $row['id']; ?>
															<td style="overflow:visible">
																<div class="dropdown" style="">
																	<a class="btn btn-success act-btn" href="admin-profile?id=<?php echo $sid; ?>&query=<?php echo $id; ?>&action=approve" title="Click To Approve" data-tooltip="true">
																	<span class="fa fa-check"></span></a>
																	
																	<a class="btn btn-danger act-btn" href="admin-profile?id=<?php echo $sid; ?>&query=<?php echo $id; ?>&action=decline" title="Click To Decline" data-tooltip="true">
																	<span class="fa fa-remove act-btn"></span></a>
																	
																	<a class="btn btn-primary act-btn" href="notifications?query=<?php echo $id; ?>" title="Click To View" data-tooltip="true">
																	<span class="fa fa-list"></span></a>
																</div> 
															</td>	 
														</tr>
											<?php	}  }    ?>
											</tbody>
										</table>										
										
										</div>																				
									</div>
									
								</div>
								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
	
		
		
		
		
		
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		</div>
		<!-- END MAIN -->
		
		
		
		
		
		
	<?php include('layout/bottom-footer.php') ?>		
		


	<!-- STAFF ATTENDANCE MODAL FORM  -->
	<form action="staff-attendance" method="post" role="form">
		<div id="staffattend" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Staff Attendance</h4>
			  </div>
		
				<div class="modal-body">
					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-text-width"></i></span>
						<select class="form-control" name="staff_term" id="staff_term" required>
							<option value=""> Select Term </option>
							<option value="first"> First Term </option>	  
							<option value="second"> Second Term </option>
							<option value="third"> Third Term </option>
						</select>
					</div>
					<br>
					<div class="input-group">  <?php $staffid = @$_GET['id']; ?>
						<div class="input-group-addon"> <i class="fa fa-user"></i>    </div>
						<input class="form-control" id="fname" name="fname" value="<?php echo @$_SESSION['firstname']; ?>" type="text"/>
					</div>
					<br>
					<div class="input-group">
						<div class="input-group-addon"> <i class="fa fa-user"></i>    </div>
						<input class="form-control" id="lname" name="lname" value="<?php echo @$_SESSION['lastname']; ?>" type="text"/>
					</div>
					<br>
					<div class="input-group">
						<div class="input-group-addon"> <i class="fa fa-calendar"></i>    </div>
						<input class="form-control" id="staff_date" name="staff_date" placeholder="Date" type="date"/>
					</div>
					<div class="input-group">
						<div class="input-group-addon"> <i class="fa fa-calendar"></i>    </div>
						<input class="form-control" id="staff_time" name="staff_time" value="<?php echo date("H:i A"); ?>" type="text"/>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="staff_attend_btn">Sign In </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	
	



	<!-- STAFF LEAVE MODAL FORM  --> <?php $staff_id = @$_GET['id']; ?>
	<form action="admin-profile?id=<?php echo $staff_id ?>" method="post" role="form">
		<div id="leave" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Staff Leave</h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">  <?php $staffid = @$_GET['id']; ?>
						<div class="input-group-addon"> <i class="fa fa-user"></i>    </div>
						<input class="form-control" id="staff_id" name="staff_id" value="<?php echo @$staffid; ?>" type="text" readOnly/>
					</div>
					<br>
					<div class="input-group"> 
						<input class="form-control" id="name" name="name" value="<?php echo @$_SESSION['firstname'].' '.@$_SESSION['lastname']; ?>" type="hidden"/>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-text-width"></i></span>
						<select class="form-control" name="leave_type" id="leave_type" required>
							<option value=""> Select Leave Type </option>
							<option value="Casual Leave"> Casual Leave </option>	  
							<option value="Sick Leave"> Sick Leave </option>
							<option value="Academic Leave"> Academic Leave </option>
							<option value="Matanity Leave"> Matanity Leave</option>	  
							<option value="Travel Leave"> Travel Leave </option>
							<option value="Others"> Others </option>
						</select>
					</div>
					<br>
					<div class="input-group">
						<div class="input-group-addon"> <i class=""></i> Start Date   </div>
						<input class="form-control" id="date_from" name="date_from" placeholder="Leave Start Date" type="date"/>
					</div>
					<br>
					<div class="input-group">
						<div class="input-group-addon"> <i class=""></i> End Date   </div>
						<input class="form-control" id="date_to" name="date_to" placeholder="Leave End Date" type="date"/>
					</div>
					
					<div class="input-group"> 
						<input class="form-control" id="email" name="email" value="<?php echo @$_SESSION['email']; ?>" type="hidden"/>
					</div>
					
					<div class="input-group"> 
						<input class="form-control" id="phone" name="phone" value="<?php echo @$_SESSION['phone']; ?>" type="hidden"/>
					</div>
					
					<div class="input-group"> 
						<input class="form-control" id="enteredby" name="enteredby" value="<?php echo @$_SESSION['firstname'].' '.@$_SESSION['lastname']; ?>" type="hidden"/>
					</div>
					<br>
					<div class="input-group">
						<div class="input-group-addon"> <i class="fa fa-pencil"></i>    </div>
						<textarea class="form-control" id="reason" name="reason"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="staff_leave_btn">Apply </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	
	
	
	
	
	
<script>

	

		
		$(document).ready(function()
		{
			
		})
</script>








		
		