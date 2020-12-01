
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>	

	<SCRIPT>
		document.onkeydown = function() 
		{    
			switch (event.keyCode) 
			{ 
				case 116 : //F5 button
					event.returnValue = false;
					event.keyCode = 0;
					return false; 
				case 82 : //R button
					if (event.ctrlKey) 
					{ 
						event.returnValue = false; 
						event.keyCode = 0;  
						return false; 
					} 
			}
		}


			//Disable right mouse click Script
			//By Maximus (maximus@nsimail.com) w/ mods by DynamicDrive
			//For full source code, visit http://www.dynamicdrive.com

			var message="Function Disabled!";

			///////////////////////////////////
			function clickIE4()
			{
				if (event.button==2)
				{
					alert(message);
					return false;
				}
			}

			function clickNS4(e)
			{
				if (document.layers||document.getElementById&&!document.all)
				{
					if (e.which==2||e.which==3)
					{
						alert(message);
						return false;
					}
				}
			}

			if (document.layers)
			{
				document.captureEvents(Event.MOUSEDOWN);
				document.onmousedown=clickNS4;
			}
			else if (document.all&&!document.getElementById)
			{
				document.onmousedown=clickIE4;
			}
			document.oncontextmenu=new Function("alert(message);return false")		 <!-- DISABLING RIGHT CLICKING ON THE PAGE -->
		
	</script>

	<script>
		$(document).ready(function(){
			$(".btn").click(function(){
				$("#myCollapsible").collapse({
					toggle: false
				});
			});
		});
	</script>


	
		
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		
	<?php 
		$conn = db_connect();  $reg = @$_SESSION['regist_no'];
		$query = "SELECT * FROM student_users WHERE regist_no = '{$reg}'";
		$result = $conn->query($query);
		if ($result->num_rows == 1)
		{	
			$s_user = $result->fetch_assoc();
			@$_SESSION['r_fname'] = $s_user['firstname'];
			@$_SESSION['r_lname'] = $s_user['lastname'];
			@$_SESSION['r_class'] = $s_user['class'];
			@$_SESSION['r_sess'] = $s_user['session'];
			@$_SESSION['r_photo'] = $s_user['picture'];
		}
		$conn->close();
	?>		
			
		
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
		
		
		
					<div class="col-md-8 col-md-offset-2">
    
					<!-- Trigger the modal with a button -->  <br />
						<button class="btn btn-warning" data-toggle="modal" data-target="#myModal">Check Result</button>  <br> <br>

						<!-- Modal -->
							<form action="results" method="post" role="form">
								<div id="myModal" class="modal fade" role="dialog">
								  <div class="modal-dialog">
								
									<!-- Modal content-->
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><i class="fa fa-female"></i> Enter Student Details</h4>
									  </div>
								
										<div class="modal-body">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-user"></i></span>
												<input class="form-control" placeholder="Registration NO" type="text" name="get_stud_id" id="get_stud_id" required>
											</div>
											<br>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-group"></i></span>
												<select class="form-control" name="get_stud_class" id="get_stud_class" required>
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
													<option value="entrance"> Entrance Class </option>
												</select>
											</div>
											<br>

											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-group"></i></span>
												  <select class="form-control" name="get_stud_term" id="get_stud_term" tabindex="3">
														<option> --Select Result Term-- </option>
														<option value="first"> --First Term-- </option>
														<option value="second"> --Second Term-- </option>
														<option value="third"> --Third Term-- </option>
												  </select>
											</div>
											<br>	  
										</div>
								
									  <div class="modal-footer">
										<button class=" btn btn-default" type="reset"> Clear </button>
										<button class=" btn btn-primary" type="submit" name="find_rest_btn"> Find Result </button>
									  </div>
									</div>
								
								  </div>
								</div>
								
						   </form>
						   
								
							</div>
		
		
					
					<!-- FIND RESULT SCRIPT -->
					<div class="col-md-8 col-md-offset-2">
					<?php 
						//FOR AFTER END RESULT
						if( (isset($_REQUEST['end_exam_btn'])) || (isset($_REQUEST['end_exam_time_btn'])) )
						{
							@$score = compute_score($score);
							//echo '<center><b style="font-size:29px; color:blue"> Your Score Is : ' . $score .' %</b></center>';
							

							echo
							'
								<div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title"> <i class="fa fa-mortar-board"></i> Result </h3>
									</div>
									<div class="panel-body">';
									
										if(isset($_REQUEST["end_exam_btn"]) || ($_REQUEST["end_exam_time_btn"]) ) 
										{ $pix = @$_SESSION["r_photo"];  }    else { $pix = "avatar.jpg"; } 
										
														 
										echo '<div>   </div>  <br>
										
										<table class="table resposive table-bordered">								
											<tr>
												<td  rowspan="2"> <img src="upload/'.$pix.'" width="150" height="80" /> </td>
												<td>Full Names </td>
												<td>Class </td>
												<td>Term</td>
												<td>Session</td>
											</tr>
											<tr>
												<td>'; 
													if(isset($_REQUEST["end_exam_btn"]) || ($_REQUEST["end_exam_time_btn"]) ) 
													{ echo @$_SESSION["r_fname"]." ".@$_SESSION["r_lname"];  }  else { } 
												echo '</td>
												<td>'; 
													if(isset($_REQUEST["end_exam_btn"]) || ($_REQUEST["end_exam_time_btn"]) ) 
													{ echo @$_SESSION["class"];  }  else { } 
												echo '</td>
												<td>';  
													if(isset($_REQUEST["end_exam_btn"]) || ($_REQUEST["end_exam_time_btn"]) ) 
													{ echo @$_SESSION["term"];  }   else { } 
												echo '</td>
												<td>'; 
													if(isset($_REQUEST["end_exam_btn"]) || ($_REQUEST["end_exam_time_btn"]) ) 
													{ echo @$_SESSION["r_sess"]; } else { } 
												echo '</td>
											</tr>
										</table>
										
										<table class="table resposive table-bordered">								
											<tbody>
												<!-- CLASS ONE BEST RESULT -->
												<thead>
													<tr>
														<th>Subject</th>
														<th>Marks </th>
														<th>Status</th>
														<th>Grade</th>
													</tr>
												</thead>';
												if($score >= 50){ echo '<tr style="font-size:15px; color:#396;">'; } else{ echo '<tr style="font-size:15px; color:red;">'; } 
													echo'<td>'; 
														if(isset($_REQUEST["end_exam_btn"]) || ($_REQUEST["end_exam_time_btn"]) ) 
														{ echo @$_SESSION["subject"]; } else { } 
													echo '</td>
													<td>'; 
														if(isset($_REQUEST["end_exam_btn"]) || ($_REQUEST["end_exam_time_btn"]) ) 
														{ echo @$score.'%'; } else { } 
													echo '</td>
													<td>'; 
														if(isset($_REQUEST["end_exam_btn"]) || ($_REQUEST["end_exam_time_btn"]) ) 
														{ if(@$score >= 0 && @$score < 50)echo "Fail"; } if(@$score >= 50 && @$score <= 100){ echo "Pass"; }  else { } 
													echo '</td>
													<td>'; 
														if(isset($_REQUEST["end_exam_btn"]) || ($_REQUEST["end_exam_time_btn"]) ) 
														{ $grade = set_grade($score); echo @$grade; } else { } 
													echo '</td>
												</tr>

												
												<!-- CLASS TWO BEST RESULT -->
												
											</tbody>
											
											
										</table>
												
									</div>
								</div>';
							
							
							
							
							
							
							
							
							
						}
						
						
						//FOR FINDING RESULTS
						if(isset($_REQUEST['find_rest_btn']))
						{
							$conn = db_connect();
							$regist_no = mysqli_real_escape_string($conn, $_REQUEST['get_stud_id']);
							$class = mysqli_real_escape_string($conn, $_REQUEST['get_stud_class']);
							$term = mysqli_real_escape_string($conn, $_REQUEST['get_stud_term']);
							
							$table = $class.'_results';
							$query = "SELECT * FROM $table WHERE regist_no = '{$regist_no}' AND class = '{$class}' AND term = '{$term}'";
							$result = $conn->query($query);
							if($result->num_rows == 1)
							{
								
								$found_rest = $result->fetch_assoc(); 	
							}
							else { $found_rests = $result->fetch_assoc(); if (empty($found_rests))  { $rec = 'Empty'; 
								 echo '<div class="alert alert-danger alert-dismissable">
									  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									  <strong>Sorry !</strong> No Record Found For Student Number : ' .$regist_no. '  </div>';
								}}
						}
					?>
				   </div>
		
		
		
		
<!-- BORDERED TABLE -->
<?php 
	if(@$rec == 'Empty' || !isset($_REQUEST['find_rest_btn'])) 
	{ echo '<div class="col-md-8 col-md-offset-2" style="display:none">'; }
	else 
		{ echo '<div class="col-md-8 col-md-offset-2">'; }
?>
<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title"> <i class="fa fa-mortar-board"></i> Result </h3>
	</div>
	<div class="panel-body">
	
		<?php if(isset($_REQUEST['find_rest_btn'])) { $pix = @$found_rest['photo'];  } 
		else if(isset($_REQUEST['end_exam_btn'])) { echo @$_SESSION['photo'].' '.$_SESSION['l_name']; } else { $pix = 'avatar.jpg'; } 
		?>
						 
		<div>   </div>  <br>
		
		<table class="table resposive table-bordered">								
			<tr>
				<td  rowspan="2"> <img src="upload/<?php echo $pix; ?>" width='150' height='80' /> </td>
				<td>Full Names </td>
				<td>Class </td>
				<td>Term</td>
				<td>Session</td>
			</tr>
			<tr>
				<td> 
					<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['firstname'].' '.@$found_rest['lastname'];  } 
					 else if(isset($_REQUEST['end_exam_btn'])) { echo @$_SESSION['f_name'].' '.$_SESSION['l_name']; } else { } ?>
				</td>
				<td> 
					<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['class'];  } 
					 else if(isset($_REQUEST['end_exam_btn'])) { echo @$_SESSION['class']; } else { } ?>
				</td>
				<td> 
					<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['term'];  } 
					 else if(isset($_REQUEST['end_exam_btn'])) { echo @$_SESSION['term']; } else { } ?>
				</td>
				<td> 
					<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['session'];  } 
					 else if(isset($_REQUEST['end_exam_btn'])) { echo @$_SESSION['session']; } else { } ?>
				</td>
			</tr>
		</table>
		
		<table class="table resposive table-bordered">								
			<tbody>
				<!-- CLASS ONE BEST RESULT -->
				<thead>
					<tr>
						<th>Subject</th>
						<th>Marks </th>
						<th>Status</th>
						<th>Grade</th>
					</tr>
				</thead>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_1'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) { echo @$_SESSION['subject']; } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_1'] != '0'){echo @$found_rest['mark_1'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) { echo @$_SESSION['score']; } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_1']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } } 
						 else if(isset($_REQUEST['end_exam_btn'])) { echo @$_SESSION['term']; } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_1']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) { echo @$_SESSION['grade']; } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_2'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_2'] != '0'){echo @$found_rest['mark_2'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_2']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_2']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_3'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_3'] != '0'){echo @$found_rest['mark_3'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_3']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_3']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_4'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_4'] != '0'){echo @$found_rest['mark_4'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_4']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_4']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_5'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_5'] != '0'){echo @$found_rest['mark_5'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_5']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_5']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_6'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_6'] != '0'){echo @$found_rest['mark_6'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_6']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } } 
						else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_6']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_7'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_7'] != '0'){echo @$found_rest['mark_7'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_7']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_7']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_8'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_8'] != '0'){echo @$found_rest['mark_8'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_8']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } }  
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_8']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_9'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_9'] != '0'){echo @$found_rest['mark_9'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_9']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_9']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_10'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_10'] != '0'){echo @$found_rest['mark_10'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_10']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_10']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_11'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_11'] != '0'){echo @$found_rest['mark_11'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_11']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_11']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_12'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_12'] != '0'){echo @$found_rest['mark_12'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_12']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_12']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_13'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_13'] != '0'){echo @$found_rest['mark_13'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_13']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_13']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_14'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_14'] != '0'){echo @$found_rest['mark_14'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_14']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_14']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_15'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_15'] != '0'){echo @$found_rest['mark_15'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_15']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_15']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_16'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_16'] != '0'){echo @$found_rest['mark_16'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_16']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_16']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_17'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_17'] != '0'){echo @$found_rest['mark_17'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_17']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_17']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_18'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_18'] != '0'){echo @$found_rest['mark_18'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_18']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } }  
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_18']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_19'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_19'] != '0'){echo @$found_rest['mark_19'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_19']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } }  
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_19']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['subject_20'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { if(@$found_rest['mark_20'] != '0'){echo @$found_rest['mark_20'];} else {}  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { $s = @$found_rest['mark_20']; if($s >= '50' && $s <= '100'){ echo'Pass'; }else if($s < '50' && $s > '0' ){ echo'Fail'; } else if($s = '0') { echo ''; } }  
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { @$grade = set_grade(@$found_rest['mark_20']);  echo @$grade;  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				
				<tr>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo 'Overall ';  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) { echo @$found_rest['overall'];  }   
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
					<td> 
						
					</td>
					<td> 
						<?php if(isset($_REQUEST['find_rest_btn'])) {  echo @$found_rest['overall'];  } 
						 else if(isset($_REQUEST['end_exam_btn'])) {  } else { } ?>
					</td>
				</tr>
				
				<!-- CLASS TWO BEST RESULT -->
				
			</tbody>
			
			
		</table>
				
	</div>
</div>
</div>
<!-- END BORDERED TABLE -->
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		</div>
		<!-- END MAIN -->
		
		
		
		
		
		
	<?php include('layout/bottom-footer.php') ?>		
		
			
		
		
		
		
		
		


 



