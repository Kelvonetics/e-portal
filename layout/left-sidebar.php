<!-- LEFT SIDEBAR -->
	<div id="sidebar-nav" class="sidebar">
		<div class="sidebar-scroll">
			<nav style="font-size:12px">
				<ul class="nav">
					<li><a href="index" id="home" class="active"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
					<li><a href="about-us-page" id="about" class=""><i class="fa fa-globe"></i> <span>About Us</span></a></li>
					<li><a href="pre-exam-page" id="exam" class=""><i class="fa fa-pencil"></i> <span>Exams</span></a></li>
					<li><a href="results" id="result" class=""><i class="fa fa-mortar-board"></i><span>Results</span></a></li>					
					<li><a href="contact-us-page" id="contact" class=""><i class="fa fa-map-marker"></i> <span>Contact Us</span></a></li>
					
					<?php  if(@$_SESSION['logged_in'] == '1')	{  ?>
						
					<li>
						<a href="#studmgt" data-toggle="collapse" class="collapsed"><i class="fa fa-female"></i> <span>Student Management</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
						<div id="studmgt" class="collapse">
							<ul class="nav">
							<?php if(@$_SESSION['role'] == 'Admin'){ ?>
								<li><a href="add-students" class=""><i class="fa fa-plus"></i> Add Student</a></li>
								<li><a href="#" data-toggle="modal" data-target="#editstud"><i class="fa fa-edit"></i> Edit Student </a></li>
							<?php } ?>
								<li><a href="#" data-toggle="modal" data-target="#viewstud"><i class="fa fa-list"></i> View Students</a></li>
							
							<?php if(@$_SESSION['role'] == 'Admin'){ ?>
								<li><a href="#" class=""> ------------------- </a></li>
								<li><a href="add-entrancestudents" class=""><i class="fa fa-plus"></i> Add Entrance Student</a></li>
								<li><a href="#" data-toggle="modal" data-target="#viewentrstud"><i class="fa fa-list"></i> View Entrance Students</a></li>
							<?php } ?>
								<li><a href="#" class=""> ------------------- </a></li>
								<li><a href="#" data-toggle="modal" data-target="#markattend"><i class="fa fa-check"></i> Mark Attendance</a></li>
								<li><a href="#" data-toggle="modal" data-target="#viewattend"><i class="fa fa-list"></i> View Attendance</a></li>
								
							<?php if(@$_SESSION['role'] == 'Admin'){ ?>	
								<li><a href="promote-students" class=""><i class="fa fa-pencil"></i> Promote Student</a></li>
							<?php } ?>	
							</ul>
						</div>
					</li>
						
					<?php if(@$_SESSION['role'] == 'Admin'){ ?>
					<li>
						<a href="#staffmgt" data-toggle="collapse" class="collapsed"><i class="fa fa-user-secret"></i> <span>Staff Management</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
						<div id="staffmgt" class="collapse">
							<ul class="nav">
								<li><a href="add-staff" class=""><i class="fa fa-plus"></i> Add Staff</a></li>
								<li><a href="#" data-toggle="modal" data-target="#editstaff"><i class="fa fa-edit"></i> Edit Staff </a></li>
								<li><a href="view-staff"><i class="fa fa-list"></i> View Staff</a></li>
								<li><a href="#" class=""> ------------------ </a></li>
								<li><a href="add-position" class=""><i class="fa fa-plus"></i> Add Position</a></li>
								<li><a href="view-position" class=""><i class="fa fa-list"></i> View Position</a></li>
							</ul>
						</div>
					</li>
					
					<?php } ?>
					
					<li>
						<a href="#restadm" data-toggle="collapse" class="collapsed"><i class="fa fa-question"></i> <span>Questions & Result </span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
						<div id="restadm" class="collapse">
							<ul class="nav">
							<?php if(@$_SESSION['role'] == 'Admin'){ ?>
								<li><a href="add-result" class=""><i class="fa fa-plus"></i> Add Result</a></li>
								<!-- <li><a href="#" data-toggle="modal" data-target="#editrest"><i class="fa fa-edit"></i> Edit Result </a></li> -->
							<?php } ?>
								<li><a href="#" data-toggle="modal" data-target="#viewrest"><i class="fa fa-list"></i> View Results</a></li>
								<li><a href="#" class=""> --------------------  </a></li>
								<li><a href="add-question" class=""><i class="fa fa-plus"></i> Add Question</a></li>
								<li><a href="#" data-toggle="modal" data-target="#editquest"><i class="fa fa-edit"></i> Edit Question </a></li>
								<li><a href="#" data-toggle="modal" data-target="#viewquest"><i class="fa fa-list"></i> View Questions</a></li>
								<li><a href="#" class=""> --------------------  </a></li>
								<li><a href="add-passage" class=""><i class="fa fa-plus"></i> Add Passage</a></li>
								<li><a href="#" data-toggle="modal" data-target="#editpass"><i class="fa fa-edit"></i> Edit Passage </a></li>
								<li><a href="view-passages" ><i class="fa fa-list"></i> View Passage</a></li>
							</ul>
						</div>
					</li>
					
					<?php if(@$_SESSION['role'] == 'Admin'){ ?>
					
					<li>
						<a href="#subject" data-toggle="collapse" class="collapsed"><i class="fa fa-book"></i> <span>Subject & Exam PIN </span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
						<div id="subject" class="collapse">
							<ul class="nav">
								<li><a href="add-subject" class=""><i class="fa fa-plus"></i> Add Subject</a></li>
								<li><a href="#" data-toggle="modal" data-target="#editsubj"><i class="fa fa-edit"></i> Edit Subject </a></li>
								<li><a href="view-subjects" name="view_subj_btn"><i class="fa fa-list"></i> View Subject</a></li>
								<li><a href="#" class=""> -------------------- </a></li>
								<li><a href="add-exampin" class=""><i class="fa fa-plus"></i> Add Exam PIN</a></li>
								<li><a href="#" data-toggle="modal" data-target="#viewecode"><i class="fa fa-list"></i> View Exam PIN</a></li>
							</ul>
						</div>
					</li>
					
					<?php } ?>

					
					<?php if(@$_SESSION['role'] == 'Admin'){ ?>					

					
					<li>
						<a href="#pagecont" data-toggle="collapse" class="collapsed"><i class="fa fa-briefcase"></i> <span> Page Content </span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
						<div id="pagecont" class="collapse">
							<ul class="nav">
								<li><a href="add-page-content" class=""><i class="fa fa-pencil"></i> Add Page Content</a></li>
								<li><a href="#" data-toggle="modal" data-target="#editpage"><i class="fa fa-edit"></i> Edit Page Content </a></li>
								<li><a href="#" data-toggle="modal" data-target="#viewpage"><i class="fa fa-list"></i> View Page Content </a></li>
							</ul>
						</div>
					</li>
					
					<li>
						<a href="#curri" data-toggle="collapse" class="collapsed"><i class="fa fa-book"></i> <span> Curriculum  </span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
						<div id="curri" class="collapse">
							<ul class="nav">
								<li><a href="#" class=""><i class="fa fa-pencil"></i> Add Curriculum</a></li>
								<li><a href="#" data-toggle="modal" data-target="#editcurr"><i class="fa fa-edit"></i> Edit Curriculum </a></li>
								<li><a href="#"><i class="fa fa-list"></i> View Curriculum </a></li>
								<li><a href="#" class=""> ------------------ </a></li>
								<li><a href="add-academic-session" class=""><i class="fa fa-plus"></i> Add Academic Session</a></li>
								<li><a href="#" data-toggle="modal" data-target="#editsess" class=""><i class="fa fa-edit"></i> Edit Academic Session</a></li>
							</ul>
						</div>
					</li>
					
					<li>
						<a href="#finance" data-toggle="collapse" class="collapsed"><i class="fa fa-usd"></i> <span> Exspense & Finance  </span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
						<div id="finance" class="collapse">
							<ul class="nav">
								<li><a href="expenses" class=""><i class="fa fa-pencil"></i> Enter Exspense</a></li>
								<li><a href="#" data-toggle="modal" data-target="#editfin"><i class="fa fa-edit"></i> Edit Exspense </a></li>
								<li><a href="view-expenses"><i class="fa fa-list"></i> View Exspense </a></li>
							</ul>
						</div>
					</li>
					
					<li><a href="#" class=""><i class="fa fa-bar-chart"></i> <span> Audit & Analysis  </span></a> </li>
					<?php  }  }   ?>
				</ul>
			</nav>
		</div>
	</div>
<!-- END LEFT SIDEBAR -->
		
	
	
	

<!--  STUDENT -->

	<!-- MODAL FORM TO RETRIEVE THE STUDENT NUMBER FOR EDIT -->
	<form action="edit-students" method="post" role="form">
		<div id="editstud" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"> <i class="fa fa-edit"></i> Student Management </h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input class="form-control" type="text" name="get_stud_id" id="get_stud_id" placeholder="Enter Student ID" required/>
					</div>
															
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="get_stud_btn"> Find Student </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	
	
	<!-- MODAL FORM TO RETRIEVE THE STUDENT CLASS FOR VIEW -->
	<form action="view-students" method="post" role="form">
		<div id="viewstud" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-list"></i> Student Management</h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-group"></i></span>
						<select class="form-control" name="view_class" id="view_class" required>
						<option value=""> Select Student Class </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM class";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['class']."\">".$row['values']."</option>";
								}											
							?>											
						</select>
					</div>															
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="view_stud_btn"> View Students </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>

	
	<!-- MODAL FORM TO RETRIEVE THE STUDENT CLASS FOR VIEW -->
	<form action="view-entrancestudents" method="post" role="form">
		<div id="viewentrstud" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-list"></i> Entrance Student Management</h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-group"></i></span>
						<select class="form-control" name="view_class" id="view_class" required>
						<option value=""> Select Student Class </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM class";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['class']."\">".$row['values']."</option>";
								}											
							?>											
						</select>
					</div>															
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="view_entr_stud_btn"> View Students </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	
	
	
<!--  STAFF -->	
	
	<!-- MODAL FORM TO RETRIEVE THE STAFF NUMBER FOR EDIT -->
	<form action="edit-staff" method="post" role="form">
		<div id="editstaff" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-edit"></i> Staff Management </h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
						<select class="form-control" name="get_staff_id" id="get_staff_id" required>
						<option value=""> Select Staff </option>
						<?php
							$conn = db_connect();
							$query = "SELECT * FROM staff_users";
							$result = $conn->query($query);
							WHILE($row = $result->fetch_assoc())
							{
								echo "<option class='option' value=\"".$row['staff_id']."\">".$row['staff_id'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['firstname'].' '.$row['lastname'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['status']."</option>";
							}											
						?>
						</select>
					</div>
															
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="get_staff_btn"> Find Staff </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	
	
	
	
<!--  RESULT -->

	<!-- MODAL FORM TO RETRIEVE THE RESULT NUMBER FOR EDIT -->
	<form action="edit-result" method="post" role="form">
		<div id="editrest" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-edit"></i> Result Management</h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
						<input class="form-control" type="text" name="get_rest_id" id="get_rest_id" placeholder="Enter Result ID" required/>
					</div>
															
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="get_rest_btn"> Find Result </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	
	
	<!-- MODAL FORM TO RETRIEVE THE RESULT CLASS FOR VIEW -->
	<form action="view-result" method="post" role="form">
		<div id="viewrest" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-list"></i> Result Management</h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-group"></i></span>
						<select class="form-control" name="view_class" id="view_class" required>
							<option value=""> Select Result Class </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM class";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['class']."\">".$row['values']."</option>";
								}											
							?>				
						</select>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-text-width"></i></span>
						<select class="form-control" name="view_term" id="view_term" required>
							<option value=""> Select Result Term </option>
							<option value="first"> First Term </option>	
							<option value="second"> Second Term </option>
							<option value="third"> Third Term </option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="view_rest_btn"> View Result </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	
	
	
	
<!--  SUBJECTS -->

	<!-- MODAL FORM TO RETRIEVE THE SUBJECTS NUMBER FOR EDIT -->
	<form action="edit-subject" method="post" role="form">
		<div id="editsubj" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-edit"></i> Subject Management</h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-book"></i></span>
						<select class="form-control" name="subject" id="subject" required>
							<option value=""> Select Subject </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM subjects";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['subject_id']."\">".$row['value']."</option>";
								}
								$conn->close();								
							?>				
						</select>
					</div>														
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="get_subj_btn"> Find Subject </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	
	
	<!-- MODAL FORM TO RETRIEVE THE SUBJECTS CLASS FOR VIEW -->
	<form action="view-subject" method="post" role="form">
		<div id="viewsubj" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-list"></i> Subject Management</h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-text-width"></i></span>
						<select class="form-control" name="view_subj" id="view_subj" required>
							<option value=""> Select Subject </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM subjects";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['subjects']."\">".$row['value']."</option>";
								}											
							?>				
						</select>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-group"></i></span>
						<select class="form-control" name="view_class" id="view_class" required>
							<option value=""> Select Class </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM class";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['class']."\">".$row['values']."</option>";
								}											
							?>				
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="view_subj_btn"> View Subjects </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	


		
	
	
<!--  QUESTION -->

	<!-- MODAL FORM TO RETRIEVE THE QUESTION NUMBER FOR EDIT -->
	<form action="edit-question" method="post" role="form">
		<div id="editquest" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-edit"></i> Question Management</h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-group"></i></span>
						<select class="form-control" name="quest_class" id="quest_class" required>
							<option value=""> Select Class </option>
							<option value="class1"> Class One</option>
							<option value="class2"> Class Two </option>
							<option value="class3"> Class Three </option>
							<option value="class4"> Class Four</option>
							<option value="class5"> Class Five </option>
							<option value="class6"> Class Six </option>					
						</select>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-book"></i></span>
						<select class="form-control" name="quest_subject" id="quest_subject" required>
							<option value=""> Select Subject </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM subjects";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['subj_no']."\">".$row['value']."</option>";
								}
								$conn->close();								
							?>				
						</select>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-question"></i></span>
						<input class="form-control" placeholder="Enter Question Number" type="text" name="quest_no" id="quest_no" required>
					</div>															
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="get_quest_btn"> Find Question </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	
	
	<!-- MODAL FORM TO RETRIEVE THE QUESTION CLASS FOR VIEW -->
	<form action="view-questions" method="post" role="form">
		<div id="viewquest" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-list"></i> Questions Management</h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-book"></i></span>
						<select class="form-control" name="view_subj" id="view_subj" required>
							<option value=""> Select Subject </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM subjects";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['subj_no']."\">".$row['value']."</option>";
								}											
							?>				
						</select>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-group"></i></span>
						<select class="form-control" name="view_class" id="view_class" required>
							<option value=""> Select Class </option>
							<option value="class1"> Class One</option>
							<option value="class2"> Class Two </option>
							<option value="class3"> Class Three </option>
							<option value="class4"> Class Four</option>
							<option value="class5"> Class Five </option>
							<option value="class6"> Class Six </option>					
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="view_quest_btn"> View Question </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	

	
<!--  PASSAGE -->

	<!-- MODAL FORM TO RETRIEVE THE PASSAGE NUMBER FOR EDIT -->
	<form action="edit-passage" method="post" role="form">
		<div id="editpass" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-edit"></i> Passage Management</h4>
			  </div>
		
				<div class="modal-body">					
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-group"></i></span>
						<select class="form-control" name="pass_title" id="pass_title" required>
							<option value=""> Select Passage Tilte </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM question_passage";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['title']."\">".$row['title'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['subject'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['class'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['term']."</option>";
								}
								$conn->close();								
							?>				
						</select>
					</div>
					<br>														
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="get_pass_btn"> Find Passage </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	

	
	

<!--  ATTENDANCE -->
	
	<!-- MODAL FORM TO RETRIEVE THE ATTENDANCE NUMBER FOR EDIT -->
	<form action="mark-attendance" method="post" role="form">
		<div id="markattend" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-plus"></i> Attendance Administration</h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-group"></i></span>
						<select class="form-control" name="view_class" id="view_class" required>
							<option value=""> Select Class </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM class";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['class']."\">".$row['values']."</option>";
								}											
							?>				
						</select>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-text-width"></i></span>
						<select class="form-control" name="mark_term" id="mark_term" required>
							<option value=""> Select Term </option>
							<option value="first"> First Term </option>	
							<option value="second"> Second Term </option>
							<option value="third"> Third Term </option>
						</select>
					</div>
					<br>
					<div class="input-group">
						<div class="input-group-addon"> <i class="fa fa-calendar"></i>    </div>
						<input class="form-control" id="mark_date" name="mark_date" placeholder="Date" type="date"/>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="get_attend_btn"> Get Students </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	
	<!-- MODAL FORM TO RETRIEVE THE ATTENDANCE CLASS FOR VIEW -->
	<form action="view-attendance" method="post" role="form">
		<div id="viewattend" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-list"></i> Attendance Administration</h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-group"></i></span>
						<select class="form-control" name="view_class" id="view_class" required>
							<option value=""> Select Class </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM class";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['class']."\">".$row['values']."</option>";
								}											
							?>				
						</select>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-text-width"></i></span>
						<select class="form-control" name="view_term" id="view_term" required>
							<option value=""> Select Term </option>
							<option value="first"> First Term </option>	
							<option value="second"> Second Term </option>
							<option value="third"> Third Term </option>
						</select>
					</div>
					<br>
					<div class="input-group">
						<div class="input-group-addon"> <i class="fa fa-calendar"></i>    </div>
						<input class="form-control" id="attend_date" name="attend_date" placeholder="Date" type="date" required />
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="view_attend_btn"> View Attendance </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	
	
	
	
	
	
	
<!--  EXAM CODE -->
	
	<!-- MODAL FORM TO RETRIEVE THE EXAM CODES NUMBER FOR EDIT -->

	
	<!-- MODAL FORM TO RETRIEVE THE EXAM CODES CLASS FOR VIEW -->
	<form action="view-exampin" method="post" role="form">
		<div id="viewecode" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-list"></i> Exam PIN Administration</h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-group"></i></span>
						<select class="form-control" name="view_class" id="view_class" required>
							<option value=""> Select  Class </option>
							<option value="class1"> Class One</option>
							<option value="class2"> Class Two </option>
							<option value="class3"> Class Three </option>
							<option value="class4"> Class Four</option>
							<option value="class5"> Class Five </option>
							<option value="class6"> Class Six </option>		
							<option value="entrance"> Entrance  Class </option>
						</select>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-text-width"></i></span>
						<select class="form-control" name="view_subj" id="view_subj" required>
							<option value=""> Select Subject </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM subjects";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['subjects']."\">".$row['value']."</option>";
								}											
							?>
							<option value="entrance subject"> Entrance Subject </option>
						</select>
					</div>
					
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="view_pin_btn"> View Exam PIN </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	
	
		
	
<!--  EXAM CODE -->
	
	<!-- MODAL FORM TO RETRIEVE THE STUDENT NUMBER FOR PROMOTION -->
	
	
	<!-- MODAL FORM TO RETRIEVE THE PROMOTION CLASS FOR VIEW -->
	<form action="view-promotion" method="post" role="form">
		<div id="viewprom" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-list"></i> Student Promotion Administration</h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-group"></i></span>
						<select class="form-control" name="prom_class" id="prom_class" required>
							<option value=""> Select  Class </option>
							<option value="class1"> Class One</option>
							<option value="class2"> Class Two </option>
							<option value="class3"> Class Three </option>
							<option value="class4"> Class Four</option>
							<option value="class5"> Class Five </option>
							<option value="class6"> Class Six </option>					
						</select>
					</div>					

					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						<select class="form-control" name="prom_sess" id="prom_sess" required>
							<option value=""> Select  Session </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM sessions";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['session']."\">".$row['value']."</option>";
								}											
							?>				
						</select>
					</div>					
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="view_prom_btn"> View Promoted Students</button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	
	
	
		
	
	
<!--  PAGE CONTENT -->

	<!-- MODAL FORM TO RETRIEVE THE CONTENT FOR EDIT -->
	<form action="edit-page-content" method="post" role="form">
		<div id="editpage" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-edit"></i> Page Content Administration</h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-group"></i></span>
						<select class="form-control" name="page_no" id="page_no" required>
							<option value=""> Select Page Content </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM page_content";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option value=\"".$row['page_id']."\">".$row['pagename'].' &nbsp;&nbsp;&nbsp; '.$row['category']."</option>";
								}	
								$conn->close();
							?>				
						</select>
					</div>
															
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="get_page_btn"> Find Page </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	
	
	<!-- MODAL FORM TO RETRIEVE THE QUESTION CLASS FOR VIEW -->
	<form action="view-page-content" method="post" role="form">
		<div id="viewpage" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-list"></i> Questions Management</h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-text-width"></i></span>
						<select class="form-control" name="view_subj" id="view_subj" required>
							<option value=""> Select Subject </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM subjects";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['subj_no']."\">".$row['value']."</option>";
								}											
							?>				
						</select>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-group"></i></span>
						<select class="form-control" name="view_class" id="view_class" required>
							<option value=""> Select Class </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM class";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['class']."\">".$row['values']."</option>";
								}											
							?>				
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="view_quest_btn"> View Question </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	


	
<!--  CURRICULUM ACADEMIC SESSION -->

	<!-- MODAL FORM TO RETRIEVE THE CONTENT FOR EDIT -->
	<form action="edit-academic-session" method="post" role="form">
		<div id="editsess" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-edit"></i> Academic Session Administration </h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-group"></i></span>
						<select class="form-control" name="acad_sess" id="acad_sess" required>
							<option value=""> Select Academic Session</option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM sessions";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option value=\"".$row['session']."\">".$row['value']."</option>";
								}	
								$conn->close();
							?>				
						</select>
					</div>
															
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="get_sess_btn"> Find Academic Session </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>



<!--  EXPENSE -->

	
	<!-- MODAL FORM TO RETRIEVE THE EXPENSE FOR VIEW -->
	<form action="view-expenses" method="post" role="form">
		<div id="viewexp" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="fa fa-list"></i> Questions Management</h4>
			  </div>
		
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-text-width"></i></span>
						<select class="form-control" name="view_subj" id="view_subj" required>
							<option value=""> Select Subject </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM subjects";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['subj_no']."\">".$row['value']."</option>";
								}											
							?>				
						</select>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-group"></i></span>
						<select class="form-control" name="view_class" id="view_class" required>
							<option value=""> Select Class </option>
							<?php
								$conn = db_connect();
								$query = "SELECT * FROM class";
								$result = $conn->query($query);
								WHILE($row = $result->fetch_assoc())
								{
									echo "<option class='option' value=\"".$row['class']."\">".$row['values']."</option>";
								}											
							?>				
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="view_quest_btn"> View Question </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	









<script>
	$(document).ready(function()
	{
		var date_input=$('input[name="mark_date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	});
</script>
























	
