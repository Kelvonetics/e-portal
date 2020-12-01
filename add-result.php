
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_admin_login();  ?>


<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style>
  article, aside, figure, footer, header, hgroup, menu, nav, section { display: block; }
  
  .btn-circle-red
	{
	  width: 20px;
	  height: 20px;
	  text-align: center;
	  padding: 1px;
	  font-size: 12px;
	  line-height: 1.428571429;
	  border-radius: 15px;
	  background-color:transparent;
	  border:#E34234 thin solid;
	  color:#E34234;
	  margin:6px 3px;
	}
	
  .btn-circle-red:hover
	{
	  width: 20px;
	  height: 20px;
	  text-align: center;
	  padding: 1px;
	  font-size: 12px;
	  line-height: 1.428571429;
	  border-radius: 15px;
	  background-color:#E34234;
	  color:white;
	  margin:6px 3px;
	}
	 
</style>

<!-- script to display photo with preview will uploading  -->
<script>
	function readURL(input) 
	{
		if (input.files && input.files[0]) 
		{
			var reader = new FileReader();

			reader.onload = function (e) 
			{
				$('#blah')
					.attr('src', e.target.result)
					.width(450)
					.height(250);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
	
	
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		
				<!-- FILE UPLOAD MODAL FORM -->
				<form action="upload?query=student" method="post" enctype="multipart/form-data">
					<div id="photo" class="modal fade" role="dialog">
					  <div class="modal-dialog">
					
						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Student Photo</h4>
						  </div>
					
							<div class="modal-body">
								<div class="form-group">
									<label for="name" class="control-label"> Photo</label>
									<input class="form-control" type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this);" required>
								</div>

								<div class="form-group">
									<label for="" class="control-label"> Photo</label>
									 <img id="blah" src="#" alt="your image" />
								</div>
							</div>
							<div class="modal-footer">
								<button class="btn btn-default" type="reset"> Clear </button>
								<button class="btn btn-primary" type="submit" name="submit">Ok</button>
							</div>
							
					   </div>
					  </div>    
					</div>
				</form>	
		
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<form action="add-result" method="post">
					
					<!-- LOGICS TO INPUT UPDATE AND VIEW RESULT -->
					
					
					
					<div class="">

						<div class=" col-md-8 col-md-offset-2" style="border:thin dotted #f9f9f9">

							<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Result
									<?php
										$conn = db_connect();
										if(isset($_REQUEST['inpt_rest_btn']))
										{							
											$inpt_rest_msg = input_new_result();
											if($inpt_rest_msg == "resultInputed")
											{
												echo '<div class="alert alert-success" style="width:100%; margin:auto">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														   <strong>Result! </strong> Student Result Inputed Successfull 
													  </div>';

											}
											else if($inpt_rest_msg == "exist")
											{
												echo '<div class="alert alert-warning" style="width:100%; margin:auto">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														   <strong>Sorry! </strong> Student Result For This Term Already Exist 
													  </div>';

											}
											else
											{
												echo '<div class="alert alert-danger" style="width:100%; margin:auto">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														  <strong>Sorry!</strong> Fail To Input Student Result.'.$inpt_rest_msg;
													 '</div> ';
											}
											
										}
										
										
										if(isset($_REQUEST['get_stud_btn']))
										{
											$regist_no = $_REQUEST['get_stud_id'];
											$query = "SELECT * FROM student_users WHERE regist_no = '{$regist_no}'";
											if ($conn->query($query) === TRUE)
											{
												$found_user = $result->fetch_assoc();
											}
											else { $found_user = ''; }
										}
										$conn->close();
									?>
									</h3>
								</div>
								
								<div class="panel-body">
									<div class="input-group">
										<span class="input-group-addon">N</span>
										<select class="form-control" name="regist_no" id="regist_no" style="width:46%" required>
										<option value=""> Select Student Number </option>
											<?php
												$conn = db_connect();
												$query = "SELECT * FROM student_users";
												$result = $conn->query($query);
												WHILE($row = $result->fetch_assoc())
												{
													echo "<option class='option' value=\"".$row['regist_no']."\">".$row['regist_no'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['lastname'].'&nbsp;&nbsp; '.$row['firstname']."</option>";
												}											
											?>											
										</select>
									
										<button style="width:3%" name="" type="button" id="" class="btn btn-circle-red pull-right" disabled> X </button>
									
										<!-- <span class="input-group-addon"><i class="fa fa-text-width"></i></span> -->
										<select class="form-control pull-right" name="term" id="term" style="width:46%;" required>
											<option value=""> Select Term </option>
											<option value="first"> First Term </option>	
											<option value="second"> Second Term </option>
											<option value="third"> Third Term </option>
										</select>
									</div>
									<br>
									<div class="input-group">
										<input class="form-control" placeholder="Firstname" type="hidden" name="f_name" id="f_name" required><input class="form-control" placeholder="Lastname" type="hidden" name="l_name" id="l_name" required><input class="form-control" placeholder="Password" type="hidden" name="pass" id="pass" required><input class="form-control" placeholder="Class" type="hidden" name="class" id="class" required>
										<input class="form-control" placeholder="Session" type="hidden" name="session" id="session" required><input class="form-control" placeholder="Gender" type="hidden" name="gender" id="gender" required><input class="form-control" placeholder="Photo" type="hidden" name="picture" id="picture" required>
									</div>
									<br>
									
									<div id="subj_mark">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-book"></i></span>
										<select class="form-control" name="subject_1" id="subject_1" required style="width:46%">
										<option value=""> Select Subject </option>
											<?php
												$conn = db_connect();
												$query = "SELECT * FROM subjects";
												$result = $conn->query($query);
												WHILE($row = $result->fetch_assoc())
												{
													echo "<option value=\"".$row['subjects']."\">".$row['value']."</option>";
												}											
											?>											
										</select>
										
										<button style="width:3%" name="" type="button" id="" class="btn btn-circle-red pull-right" disabled> X </button>
										
										<select class="form-control pull-right" name="mark_1" id="mark_1" required style="width:46%">
										<option value=""> Select Marks </option>
											<?php
												$conn = db_connect();
												$query = "SELECT * FROM marks";
												$result = $conn->query($query);
												WHILE($row = $result->fetch_assoc())
												{
													echo "<option value=\"".$row['marks']."\">".$row['values']."</option>";
												}											
											?>											
										</select>
									</div>
									
									
									
									</div>
									
									
									<br>
									<button name="addSubjBtn" type="button" id="addSubjBtn" class="btn btn-circle" style="background-color:#396; color:white; margin-right:8px">+</button>  
									<span style="color:#ccc"> Add Another Subject </span>
									
									<input type="hidden" name="count" id="count" value="1" class="form-control">
									
									
									
									
									
									
									<br>
									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>	
										<button type="submit" class="btn btn-primary" name="inpt_rest_btn">Input Result</button>
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
		
		




<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="s_dob"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>


<script>
	$(document).ready(function()
	{
		$('#regist_no').change(function()
		{  
			var regist_no = $(this).val();
			$.ajax({		
				url:"ajax/fetch_fname.php",
				method:"POST",
				data:{regist_no:regist_no},
				dataType:"text",
				success:function(data)
				{
					$('#f_name').val(data);
				}
			});
			
			$.ajax({		
				url:"ajax/fetch_lname.php",
				method:"POST",
				data:{regist_no:regist_no},
				dataType:"text",
				success:function(data)
				{
					$('#l_name').val(data);
				}
			});

			$.ajax({		
				url:"ajax/fetch_pass.php",
				method:"POST",
				data:{regist_no:regist_no},
				dataType:"text",
				success:function(data)
				{
					$('#pass').val(data);
				}
			});
			
			$.ajax({		
				url:"ajax/fetch_class.php",
				method:"POST",
				data:{regist_no:regist_no},
				dataType:"text",
				success:function(data)
				{
					$('#class').val(data);
				}
			});
			
			$.ajax({		
				url:"ajax/fetch_session.php",
				method:"POST",
				data:{regist_no:regist_no},
				dataType:"text",
				success:function(data)
				{
					$('#session').val(data);
				}
			});

			$.ajax({		
				url:"ajax/fetch_gender.php",
				method:"POST",
				data:{regist_no:regist_no},
				dataType:"text",
				success:function(data)
				{
					$('#gender').val(data);
				}
			});
			
			$.ajax({		
				url:"ajax/fetch_photo.php",
				method:"POST",
				data:{regist_no:regist_no},
				dataType:"text",
				success:function(data)
				{
					$('#picture').val(data);
				}
			});
		});
	});
</script> 



<!--script for dublicating form -->
<script>
    $(document).ready(function ()
	{		
		//for Part
		var i = 1;		var c = 0;
        $('#addSubjBtn').on('click', function () 			//
		{
            i++;  
			if(i <= 20)  //limiting for only 20 subjects to be created
			{
				$('#subj_mark').append(
					'<div class="input-group" id="row'+i+'" style="margin-top:18px">	<span class="input-group-addon"><i class="fa fa-book"></i></span>					<select class="form-control" name="subject_'+i+'" id="subject_'+i+'" style="width:46%"><option value=""> Select Subject </option> </select>	<button style="width:3%" name="addBtn" type="button" id="'+i+'" class="btn btn-circle-red btn_remove pull-right" title="Delete"> X </button>  <select class="form-control pull-right" name="mark_'+i+'" id="mark_'+i+'" style="width:46%"> <option value=""> Select Marks </option> </select> 	</div>'						
				);
			}
			getSubjectsAndMarks(i);             document.getElementById('count').value = i;
        });
		
		//Function To load all labour Description
		
		
		$(document).on('click', '.btn_remove', function ()
		{
			var button_id = $(this).attr("id");
			$('#row'+button_id+"").remove();
			
			//reducing the count value
			document.getElementById('count').value = --i;
		});
			
    });

	
	function getSubjectsAndMarks(i)
		{ 
			subject = i;
			$.ajax({
					url:"ajax/loadsubjects.php",
					method:"POST",
					data:{subject:subject},
					dataType:"text",
					success:function(data)
					{
						$('#subject_'+i+'').html(data);
					}
				});

			$.ajax({
				url:"ajax/loadmarks.php",
				method:"POST",
				data:{subject:subject},
				dataType:"text",
				success:function(data)
				{
					$('#mark_'+i+'').html(data);
				}
			});

		}
</script> 







		