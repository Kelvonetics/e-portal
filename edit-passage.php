
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
					<form action="edit-passage" method="post">
					
					<div class="">

						<div class=" col-md-8 col-md-offset-2" style="border:thin dotted #f9f9f9">

							<!-- INPUT GROUPS -->
							<div class="panel">
							<!-- LOGICS TO CREATE UPDATE AND VIEW QUESTION -->
							<?php
								$conn = db_connect();								
								if(isset($_REQUEST['get_pass_btn']))
								{
									@$pass_title = $_REQUEST['pass_title'];
									$query = "SELECT * FROM question_passage WHERE title = '{$pass_title}'";
									$result = $conn->query($query);
									$found_pass = $result->fetch_assoc();  
									if($found_pass == null)
									{
										echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												  <strong>Sorry!</strong> No Passage Found For With Title : '.$pass_title;
										echo '</div>';
									}
								}
								//from view
								else if((@$_GET['id']) != null)
								{    
									@$pass_title = $_GET['id'];
									$query2 = "SELECT * FROM question_passage WHERE title = '{$pass_title}'";
									$result2 = $conn->query($query2);
									$found_pass = $result2->fetch_assoc();
									if($found_pass == null)
									{
										echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												  <strong>Sorry! </strong> No Passage Found With Title : '
												  .$pass_title;
										echo  '</div>';
									}
								}
								if(isset($_REQUEST['upd_pass_btn']))
								{									
									@$upd_pass_msg = update_passage();
									if($upd_pass_msg == "updated")
									{
										echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											   <strong>Success!</strong> Passage Updated Successfully.
											 </div>';	
									}
									else
									{
										echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												  <strong>Sorry!</strong> Passage Could NOT Be Updated . '.$upd_pass_msg;
										echo'</div>  <br>';
									}
									
								}
								$conn->close();
							?>

								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-book"></i> Passage</h3>
								</div>
								
								<div class="panel-body">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-money" style="width:70px"> # Id</i></span>
										<input class="form-control" placeholder="Passage Id" type="text" name="id" id="id" 
										value="<?php if(isset($_REQUEST['get_pass_btn'])) { echo @$found_pass['id']; } 
										else if((@$_GET['id']) != null) { echo @$found_pass['id']; } else {} ?>" readonly required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-book"></i></span>
										<select class="form-control" name="p_subj" id="p_subj" required>
											<?php
												$conn = db_connect(); 
												if(isset($_REQUEST['get_pass_btn']) || (@$_GET['id']) != null)
												{													 
													$query = "SELECT * FROM question_passage WHERE title = '{$pass_title}'";
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
										<span class="input-group-addon"><i class="fa fa-group"></i></span>
										<select class="form-control" name="p_class" id="p_class" required>
											<?php
												$conn = db_connect(); 
												if(isset($_REQUEST['get_pass_btn']) || (@$_GET['id']) != null)
												{													 
													$query = "SELECT * FROM question_passage WHERE title = '{$pass_title}'";
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
										<span class="input-group-addon"><i class="fa fa-text-width"></i></span>
										<select class="form-control" name="p_term" id="p_term" required>
											<?php
												$conn = db_connect(); 
												if(isset($_REQUEST['get_pass_btn']) || (@$_GET['id']) != null)
												{													 
													$query = "SELECT * FROM question_passage WHERE title = '{$pass_title}'";
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
										<span class="input-group-addon"><i class="fa fa-text-width"></i></span>
										<select class="form-control" name="p_type" id="p_type" required>
											<?php
												$conn = db_connect(); 
												if(isset($_REQUEST['get_pass_btn']) || (@$_GET['id']) != null)
												{													 
													$query = "SELECT * FROM question_passage WHERE title = '{$pass_title}'";
													$result = $conn->query($query);
													WHILE($row = $result->fetch_assoc())
													{
														echo "<option value=\"".$row['type']."\">".$row['type']."</option>";
													}
													echo '<option value=""> Select Type </option>';
													$query2 = "SELECT * FROM question_passage";
													$result2 = $conn->query($query2);
													WHILE($rows = $result2->fetch_assoc())
													{
														echo "<option value=\"".$rows['type']."\">".$rows['type']."</option>";
													}
												}											
												$conn->close();
											?>																					
										</select>
									</div>
									<br>
									
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-question"></i></span>
										<input class="form-control" placeholder="Question NO" type="text" name="question_no" id="question_no" 
										value="<?php if(isset($_REQUEST['get_pass_btn'])) { echo @$found_pass['question_no']; } 
										else if((@$_GET['id']) != null) { echo @$found_pass['question_no']; } else {} ?>" required>
									</div>
									<br>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-question"></i></span>
										<input class="form-control" placeholder="Content Title" type="text" name="title" id="title"
										value="<?php if(isset($_REQUEST['get_pass_btn'])) { echo @$found_pass['title']; } 
										else if((@$_GET['id']) != null) { echo @$found_pass['title']; } else {} ?>" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-question"></i></span>
										<textarea class="form-control" name="content" id="content" placeholder="content" rows="10"><?php if(isset($_REQUEST['get_pass_btn'])) { echo @$found_pass['content']; } 
										else if((@$_GET['id']) != null) { echo @$found_pass['content']; } else {} ?></textarea>
									</div>

									<br>
									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>
										<button type="submit" class="btn btn-primary" name="upd_pass_btn">Update Question Content</button>
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
		
		






		