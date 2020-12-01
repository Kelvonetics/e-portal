
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_login();  ?>


<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

	
	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		

				<?php
					if(isset($_REQUEST['view_quest_btn']))
					{							
						if(@$result->num_rows > 0){		$result = view_question();   @$crow = @$result->fetch_assoc();  }
					}	
				?>
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
			<form action="view-questions" method="post">
			
			<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->



					
			<!-- TABLE HOVER -->
			<div class="panel">
				<div class="panel-heading">
				<?php
					if(isset($_REQUEST['view_quest_btn'])){ echo
					'<h3 class="panel-title">Viewing  Questions For '. @$crow["subject"].' In '. @$crow["class"]. '</h3>'; } ?>
				</div>
				<div class="panel-body">
					<table id="dataTable" class="table table-hover table-bordered">								
						
						<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->
						<?php
							if(isset($_REQUEST['view_quest_btn']))
							{									
								if(@$result->num_rows > 0)
								{
									$result = view_question();
									
									echo'<thead>
											<tr style="background-color:#f9f9f9; color:#5D8AA8; cursor:pointer">
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> No</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Question</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Option A</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Option B</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Option C</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Option D</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Answer</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Subject</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Class</th>
												<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Term</th>
												<th style="font-weight:lighter;"> Actions</th>
											</tr>
										</thead>
										<tbody>';
									while(@$row = @$result->fetch_assoc())
									{  ?>
										<tr>
											<td> <?php echo $row['question_no']; ?> </td>
											<td> <?php echo $row['question']; ?> </td>
											<td> <?php echo $row['optionA']; ?> </td>
											<td> <?php echo $row['optionB']; ?> </td>
											<td> <?php echo $row['optionC']; ?> </td>
											<td> <?php echo $row['optionD']; ?> </td>
											<td> <?php echo $row['answer']; ?> </td>
											<td> <?php echo $row['subject']; ?> </td>
											<td> <?php echo $row['class']; ?> </td>
											<td> <?php echo $row['term']; ?> </td>
											
											<?php $qid = $row['question_no']; ?> 
											<?php $qsubj = $row['subject'];
												$conn = db_connect();
												$query2 = "SELECT * FROM subjects WHERE subjects = '{$qsubj}'";
												$result2 = $conn->query($query2);
												if(@$result2->num_rows > 0) { $rec = $result2->fetch_assoc(); $s_no = $rec['subj_no']; }
											?> 
											<?php $qclass = $row['class']; ?> 
											
											<td style="overflow:visible">
												<div class="dropdown" style="">
													<a class="btn btn-primary" href="edit-question?id=<?php echo $qid; ?>&subject=<?php echo $s_no; ?>&class=<?php echo $qclass; ?>" style="font-size:12px; color:#fff; padding:2px 10px;border-radius: 15px;" title="Click To Edit Question" data-tooltip="true">
													<span class="fa fa-edit"></span></a>													  
												 </div> 
											</td>
										</tr>
						<?php	}  }  }   ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END TABLE HOVER -->
								
						
			</form>
		

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		</div>
		<!-- END MAIN -->
		
		
		
		
		
		
	<?php include('layout/bottom-footer.php') ?>		
		
		








		