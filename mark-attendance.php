
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_login();  ?>


<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		

				<?php
					if(isset($_REQUEST['get_attend_btn']))
					{	
						$term = filter_input(INPUT_POST, 'mark_term', FILTER_SANITIZE_STRING);
						$date = filter_input(INPUT_POST, 'mark_date', FILTER_SANITIZE_STRING);
						if(@$result->num_rows > 0){		$result = view_student();   $c = mysqli_num_rows($result); @$crow = @$result->fetch_assoc();  }
					}	
				?>
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
			<form action="mark-attendance" method="post">
			
			<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->

			<div class="">

				<!----- Including PHP Script ----->
				<?php
					if(isset($_POST['mark']))
					{
						if(!empty($_POST['check_list'])) 
						{		
							// Counting number of checked checkboxes.
							$checked_count = count($_POST['check_list']);			$present = 0;   
							//echo "You have selected following ".$checked_count." option(s): <br/>";
							// Loop to store and display values of individual checked checkbox.
							foreach($_POST['check_list'] as $id) 
							{
								//RETRIVING THE STUDENT RECORD BY THE CHECKED ID
								$conn = db_connect();			
								$query = "SELECT * FROM student_users WHERE regist_no = '{$id}'";
								$result = $conn->query($query);
								if($result->num_rows == 1){		$student = $result->fetch_assoc();	}
								
								$fname = $student['firstname'];
								$lname = $student['lastname'];
								$class = $student['class'];
								$sess = $student['session'];
								
								$term = filter_input(INPUT_POST, 'term', FILTER_SANITIZE_STRING);
								$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
								$c = filter_input(INPUT_POST, 'c', FILTER_SANITIZE_STRING);
								
								$create = @$_SESSION['firstname'].' '.@$_SESSION['lastname'];
								//INSERTING THE STUDENT RECORD FOR ATTENDANCE
								$attend_tbl = $student['class'].'_attendance';
								
								$sql = "SELECT * FROM $attend_tbl WHERE regist_no = '{$id}' AND date = '{$date}' AND term = '{$term}'";
								$result = $conn->query($sql);
								if($result->num_rows > 0) {   }
								
								else
								{
									$query2 = "INSERT INTO $attend_tbl(regist_no, firstname, lastname, date, attendance, class, term, session, createdby) 
									VALUES('{$id}', '{$fname}', '{$lname}', '{$date}', 'Present', '{$class}', '{$term}', '{$sess}', '{$create}')";

										if ($conn->query($query2) === TRUE){  $present++; }         else {  $absent++;  }
									
											//echo "<p>".$id ."</p>";
								}
								
								
							}
								$absent = $c - $present;
								if($present > 0)
								{
									echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										   <strong>Attendance Was Marked! </strong> ' .$present.' Student(s) Were Present, While '.$absent.' Student(s) Were Absent'. 
									  '</div> <br>';
								}
								else if($present == 0)
								{
									echo '<div class="alert alert-warning" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										   <strong>Sorry This Student Attendance Has Been Marked Already! </strong> ' .$present.' Student(s) Were Present, While '.$absent.' Student(s) Were Absent'. 
									  '</div> <br>';
								}
								
						}
						else
						{	
							echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  <strong>No Student Selected! </strong> Please Chose Atleast One.
							  </div> <br>'; 
						}
					}
				?>
				
			</div>

					
			<!-- TABLE HOVER -->
			<?php
					if(!isset($_REQUEST['mark']))
					{ 
			echo '<div class="panel">
			     <div class="panel-heading">';
					} 
					
					if(isset($_REQUEST['get_attend_btn'])){ echo
					'<h3 class="panel-title">Viewing  Students In '. @$crow["class"]. '</h3>'; } ?>
			<?php if(!isset($_REQUEST['mark'])){ echo '	</div>
				<div class="panel-body">
					<table id="dataTable" class="table table-hover table-bordered">'; }  ?>								
						
						<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->
						<?php
							if(isset($_REQUEST['get_attend_btn']))
							{									
								if(@$result->num_rows > 0)
								{
									$result = view_student();
									
									echo'<thead>
										<tr style="background-color:#f9f9f9; color:#5D8AA8; cursor:pointer">
											<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Student Number </th>
											<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> First Name</th>
											<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Last Name</th>
											<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Category</th>
											<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Date</th>
											<th style="font-weight:lighter;"><i class="fa fa-sort" style="color:#ccc"></i> Term</th>
											<th style="font-weight:lighter;"> <input type="checkbox" id="selectall"/> All</th> 
											
										</tr>
										</thead>
										<tbody>';
									while(@$row = @$result->fetch_assoc())
									{  ?>
										<tr>
											<td> <?php echo $row['regist_no']; ?> </td>
											<td> <?php echo $row['firstname']; ?> </td>
											<td> <?php echo $row['lastname']; ?> </td>
											<td> <?php echo $row['category']; ?><input type="hidden" name="c" value="<?php echo $c; ?>" > </td>
											<td> <?php echo $date; ?> <input type="hidden" name="date" value="<?php echo $date; ?>" > </td>
											<td> <?php echo $term; ?> <input type="hidden" name="term" value="<?php echo $term; ?>" > </td> 											
											<td> <input class="checkbox1" type="checkbox" name="check_list[]" value="<?php echo $row['regist_no']; ?>">  </td>			<?php $sid = $row['regist_no']; ?> 
											
											
										</tr>
						<?php	}  }  }   ?>

						</tbody>
					</table>
					<?php if(!isset($_REQUEST['mark'])){ echo ' <div class="input-group pull-right">
						<button type="submit" class="btn btn-primary" name="mark" id="attmk" >Mark Attendance</button>
					</div>'; }  ?>
					

					
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
		
		




<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		$('#selectall').on('change', function()
		{
			 if(this.checked) // if changed state is "CHECKED"
			{
				$('.checkbox1').each(function() 
				{
					this.checked = true;
				});
			}
			 else// if changed state is "UN CHECKED"
			{
				$('.checkbox1').each(function() 
				{
					this.checked = false;
				});
			}
		})

	})
</script>



<script>//script to get all checke boxes with ajax
    $(document).ready(function(){
        $('#marked').click(function(){
            var checkValues = $('input[name=check]:checked').map(function()
            {
                return $(this).val();
            }).get();

            $.ajax({
                url: 'loadmore.php',
                type: 'post',
                data: { ids: checkValues },
                success:function(data){

                }
            });
        });
    });
</script>


		