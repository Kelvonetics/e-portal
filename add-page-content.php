
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>		           <?php confirm_admin_login();  ?>


<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
  .pad{
        padding:5px 10px;
        border:1px solid #ddd;
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
									 <img id="blah" src="upload/avatar.jpg" class="img-circle" width="200" alt="Avatar" />
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
		<div class="main" style="width:82%;">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<form action="add-page-content" method="post">
					
					<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->
					<?php
						$conn = db_connect();
						if(isset($_REQUEST['get_page_btn']))
						{
							@$page_no = $_REQUEST['get_page_no'];    
							$query = "SELECT * FROM page_content WHERE page_no = '{$page_no}'";
							$result = $conn->query($query);
							$found_page = $result->fetch_assoc();
							if($found_page == null)
							{
								echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry!</strong> No Record Found For  Page With Number : '.$page_no.
									 '</div>';
							}
						}
						//from view
						else if((@$_GET['id']) != null)
						{    
							@$page_no = $_GET['id'];  
							$query2 = "SELECT * FROM page_content WHERE page_no = '{$page_no}'";
							$result2 = $conn->query($query2);
							$found_page = $result2->fetch_assoc();
						}
						
						if(isset($_REQUEST['upd_page_btn']))
						{
							
							@$upd_page_msg = update_page();
							if($upd_page_msg == "updated")
							{
								echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									   <strong>Success!</strong> Page Content Updated Successfully.
									 </div>';	
							}
							else
							{
								echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry!</strong> Page Content Could NOT Be Updated .'.$upd_page_msg;
									 '</div>  <br>';
							}
							
						}
						$conn->close();
					?>
					
					
					<!-- SETTING THE THE NEW STUDENT UNIQUE REGISTRATION NUMBER -->
					<?php
						$table_name = 'page_content';
						$total = get_number_of_rec($table_name);  $total += 1;      @$page_no .= $total;
					?>
					

						<div class=" col-md-12" style="">

							<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Edit  Page Content</h3>
								</div>
								
								<div class="panel-body">
								
								<capture> Primary </capture>
								<div class="pad"> 
									<div class="input-group">
										<span class="input-group-addon">N</span>
										<input class="form-control" type="text" name="stud_id" id="stud_id" 
										value="<?php echo @$page_no; ?>" style="width:99%" readonly required>

										<span class="input-group-addon" style="margin-left:2%">N</span>
										<input class="form-control" placeholder="Page Name" type="text" name="page_name" id="page_name" style="width:100%;margin-right:-2%" required>
									</div>	
								</div>
								<br><br>
								
								
								<capture> First </capture>
								<div class="pad">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="title_1" id="title_1" placeholder="Title" required>
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control" name="content_1" id="content_1" placeholder="Content" rows="2"></textarea>
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="footer_1" id="footer_1" placeholder="Footer" required>
									</div>		
								</div>
								<br><br>
								
								<capture> Second </capture>
								<div class="pad">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="title_2" id="title_2" placeholder="Title" required>
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control" name="content_2" id="content_2" placeholder="Content" rows="2"></textarea>
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="footer_2" id="footer_2" placeholder="Footer" required>
									</div>		
								</div>
								<br><br>
								
								<capture> Third </capture>
								<div class="pad">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="title_3" id="title_3" placeholder="Title" required>
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control" name="content_3" id="content_3" placeholder="Content" rows="2"></textarea>
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="footer_3" id="footer_3" placeholder="Footer" required>
									</div>		
								</div>
								<br><br>
								
								<capture> Fourth </capture>
								<div class="pad">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="title_4" id="title_4" placeholder="Title" required>
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control" name="content_4" id="content_4" placeholder="Content" rows="2"></textarea>
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="footer_4" id="footer_4" placeholder="Footer" required>
									</div>		
								</div>
								
								<br><br>
								
								<capture> Fifth </capture>
								<div class="pad">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="title_5" id="title_5" placeholder="Title" required>
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control" name="content_5" id="content_5" placeholder="Content" rows="2"></textarea>
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="footer_5" id="footer_5" placeholder="Footer" required>
									</div>		
								</div>
								
								
									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>	
									</div>
								</div>	
							</div>
						<!-- END INPUT GROUPS -->
							
						</div>
						
						
						
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		</div>
		<!-- END MAIN -->
		
		
		
		
		
		
	<?php include('layout/bottom-footer.php') ?>		
		
		





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
		$('#male').on('change', function()
		{ 
		   if(this.checked) // if changed state is "CHECKED"
			{
				$('#s_gender').val('Male');	
			}
		})
		
		$('#female').on('change', function()
		{ 
		   if(this.checked) // if changed state is "CHECKED"
			{
				$('#s_gender').val('Female');	
			}
		})
	})
</script>



		