
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_login();  ?>


<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
	
	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		
					
		
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<form action="edit-question" method="post">
					
					<div class="">

						<div class=" col-md-8 col-md-offset-2" style="border:thin dotted #f9f9f9">

							<!-- INPUT GROUPS -->
							<div class="panel">
							<!-- LOGICS TO CREATE UPDATE AND VIEW QUESTION -->
							<?php
								$conn = db_connect();								
								if(isset($_REQUEST['get_quest_btn']))
								{
									@$subject = $_REQUEST['quest_subject'];
									@$class = $_REQUEST['quest_class'];
									@$question_no = $_REQUEST['quest_no'];	
									$quest_tbl ='subject_'.@$subject; 			 @$_SESSION['quest_tbl'] = @$quest_tbl;
									$query = "SELECT * FROM $quest_tbl WHERE question_no = '{$question_no}'";
									$result = $conn->query($query);
									$found_quest = $result->fetch_assoc();  
									if($found_quest == null)
									{
										echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												  <strong>Sorry!</strong> No Record Found For Question With Number : '.$question_no. ' For '.$subject.' '.@$class;
										echo '</div>';
									}
								}
								//from view
								else if((@$_GET['id']) != null)
								{    
									@$question_no = $_GET['id'];   @$subject = $_GET['subject'];   @$class = $_GET['class']; 
									$quest_tbl = 'subject_'.@$subject;
									$query2 = "SELECT * FROM $quest_tbl WHERE question_no = '{$question_no}'";
									$result2 = $conn->query($query2);
									$found_quest = $result2->fetch_assoc();
									if($found_quest == null)
									{
										echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												  <strong>Sorry! </strong> No Record Found For Question With Number : '
												  .$question_no. ' For '.$subject.' '.$class ;
										echo  '</div>';
									}
								}
								if(isset($_REQUEST['upd_quest_btn']))
								{									
									@$upd_quest_msg = update_question();
									if($upd_quest_msg == "updated")
									{
										echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											   <strong>Success!</strong> Question Updated Successfully.
											 </div>';	
									}
									else
									{
										echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												  <strong>Sorry!</strong> Question Could NOT Be Updated . '.$upd_quest_msg;
										echo'</div>  <br>';
									}
									
								}
								$conn->close();
							?>

								<div class="panel-heading">
									<h3 class="panel-title">Question</h3>
								</div>
								
								<div class="panel-body">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-money" style="width:70px"> # No</i></span>
										<input class="form-control" placeholder="Question Number" type="text" name="quest_no" id="quest_no" 
										value="<?php if(isset($_REQUEST['get_quest_btn'])) { echo @$found_quest['question_no']; } 
										else if((@$_GET['id']) != null) { echo @$found_quest['question_no']; } else {} ?>" readonly required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-book" style="width:70px"> Subject</i></span>
										<select class="form-control" name="q_subj" id="q_subj" required>
											<?php
												$conn = db_connect(); 
												if(isset($_REQUEST['get_quest_btn']) || (@$_GET['id']) != null)
												{													 
													$query = "SELECT * FROM $quest_tbl WHERE question_no = '{$question_no}'";
													$result = $conn->query($query);
													WHILE($row = $result->fetch_assoc())
													{
														echo "<option class='option' value=\"".$row['subject']."\">".$row['subject']."</option>";
													}
													
													echo '<option value=""> Select Subject </option>';
													$query2 = "SELECT * FROM subjects";
													$result2 = $conn->query($query2);
													WHILE($rows = $result2->fetch_assoc())
													{
														echo "<option class='option' value=\"".$rows['subjects']."\">".$rows['value']."</option>";
													}
												}												
												$conn->close();								
											?>				
										</select>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-group" style="width:70px"> Class</i></span>
										<select class="form-control" name="q_class" id="q_class" required>
											<?php
												$conn = db_connect(); 
												if(isset($_REQUEST['get_quest_btn']) || (@$_GET['id']) != null)
												{													 
													$query = "SELECT * FROM $quest_tbl WHERE question_no = '{$question_no}'";
													$result = $conn->query($query);
													WHILE($row = $result->fetch_assoc())
													{
														echo "<option value=\"".$row['class']."\">".$row['class']."</option>";
													}
													echo '<option value=""> Select Class </option>
														<option value="class1"> Class One</option>
														<option value="class2"> Class Two </option>
														<option value="class3"> Class Three </option>
														<option value="class4"> Class Four</option>
														<option value="class5"> Class Five </option>
											<option value="class6"> Class Six </option>	';
												}												
												$conn->close();
											?>				
										</select>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-text-width" style="width:70px"> Term</i></span>
										<select class="form-control" name="q_term" id="q_term" required>
											<?php
												$conn = db_connect(); 
												if(isset($_REQUEST['get_quest_btn']) || (@$_GET['id']) != null)
												{													 
													$query = "SELECT * FROM $quest_tbl WHERE question_no = '{$question_no}'";
													$result = $conn->query($query);
													WHILE($row = $result->fetch_assoc())
													{
														echo "<option value=\"".$row['term']."\">".$row['term'].' Term'."</option>";
													}
													
													echo '<option value=""> Select Term </option>
														<option value="first"> First Term </option>
														<option value="second"> Second Term </option>
														<option value="third"> Third Term </option>';
												}											
												$conn->close();
											?>
																					
										</select>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-question" style="width:70px"> Question</span></span>
										<textarea class="form-control" name="q_quest" id="q_quest" placeholder="Question" rows="2"><?php if(isset($_REQUEST['get_quest_btn'])) { echo @$found_quest['question']; } 
										else if((@$_GET['id']) != null) { echo @$found_quest['question']; } else {} ?></textarea>
									</div>
									<br>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-question" style="width:70px"> Option A</i></span>
										<input class="form-control" placeholder="Option A" type="text" name="opt_A" id="opt_A" 
										value="<?php if(isset($_REQUEST['get_quest_btn'])) { echo @$found_quest['optionA']; } 
										else if((@$_GET['id']) != null) { echo @$found_quest['optionA']; } else {} ?>" required>
									</div>
									<br>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-question" style="width:70px"> Option B</i></span>
										<input class="form-control" placeholder="Option B" type="text" name="opt_B" id="opt_B" 
										value="<?php if(isset($_REQUEST['get_quest_btn'])) { echo @$found_quest['optionB']; } 
										else if((@$_GET['id']) != null) { echo @$found_quest['optionB']; } else {} ?>" required>
									</div>
									<br>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-question" style="width:70px"> Option C</i></span>
										<input class="form-control" placeholder="Option C" type="text" name="opt_C" id="opt_C" 
										value="<?php if(isset($_REQUEST['get_quest_btn'])) { echo @$found_quest['optionC']; } 
										else if((@$_GET['id']) != null) { echo @$found_quest['optionC']; } else {} ?>" required>
									</div>
									<br>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-question" style="width:70px"> Option D</i></span>
										<input class="form-control" placeholder="Option D" type="text" name="opt_D" id="opt_D" 
										value="<?php if(isset($_REQUEST['get_quest_btn'])) { echo @$found_quest['optionD']; } 
										else if((@$_GET['id']) != null) { echo @$found_quest['optionD']; } else {} ?>" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil" style="width:70px"> Answer</i></span>
										<select class="form-control" name="q_answer" id="q_answer" required>
											<?php
												$conn = db_connect(); 
												if(isset($_REQUEST['get_quest_btn']) || (@$_GET['id']) != null)
												{													 
													$query = "SELECT * FROM $quest_tbl WHERE question_no = '{$question_no}'";
													$result = $conn->query($query);
													WHILE($row = $result->fetch_assoc())
													{
														echo "<option value=\"".$row['answer']."\">".'Option '.$row['answer']."</option>";
													}
													
													echo '<option value=""> Select Answer </option>
														<option value="A"> Option A</option>
														<option value="B"> Option B </option>
														<option value="C"> Option C </option>
														<option value="D"> Option D </option>';
												}												
												$conn->close();
											?>
																						
										</select>
									</div>
									
									<br>
									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>
										<button type="submit" class="btn btn-primary" name="upd_quest_btn">Update Question</button>
									</div>
								</div>	
							</div>
						<!-- END INPUT GROUPS -->
							
						</div>
						
						
						
					</div>
					</form>
		

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		</div>
		<!-- END MAIN -->
		
		
		
		
		
		
	<?php include('layout/bottom-footer.php') ?>		
		
		






		