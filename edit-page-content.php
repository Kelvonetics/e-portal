
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
	
			<?php include('layout/left-sidebar.php') ?>   <?php @$page_no = $_REQUEST['page_no']; ?> 
		
				<!-- FILE UPLOAD MODAL FORM -->
				<form action="photo-upload?query=slider&page_id=<?php echo $page_no ?>" method="post" enctype="multipart/form-data">
					<div id="photo_1" class="modal fade" role="dialog">
					  <div class="modal-dialog">
					
						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Slider Photo</h4>
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
								<input class="form-control" type="text" name="column" id="column" required>
							</div>
							<div class="modal-footer">
								<button class="btn btn-default" type="reset"> Clear </button>
								<button class="btn btn-primary" type="submit" name="submit_btn">Upload</button>
							</div>
							
					   </div>
					  </div>    
					</div>
				</form>	
		
				<!-- VIDEO UPLOAD MODAL FORM -->
				<form action="movie-upload?query=video&page_id=<?php echo $page_no ?>" method="post" enctype="multipart/form-data">
					<div id="video_1" class="modal fade" role="dialog">
					  <div class="modal-dialog">
					
						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Video </h4>
						  </div>
					
							<div class="modal-body">
								<div class="form-group">
									<label for="name" class="control-label"> VIDEO</label>
									<input class="form-control" type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this);" required>
								</div>

								<div class="form-group">
									<label for="" class="control-label"> VIDEO</label>
									 <img id="blah" src="upload/avatar.jpg" class="img-circle" width="200" alt="Avatar" />
								</div>
								<input class="form-control" type="text" name="col" id="col" value="footer_5" required>
							</div>
							<div class="modal-footer">
								<button class="btn btn-default" type="reset"> Clear </button>
								<button class="btn btn-primary" type="submit" name="video_btn">Upload</button>
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
					<form action="edit-page-content" method="post">
					
					<!-- LOGICS TO CREATE UPDATE AND VIEW STUDENTS -->
					<?php
						$conn = db_connect();
						if(isset($_REQUEST['get_page_btn']))
						{
							@$page_no = $_REQUEST['page_no'];    @$_SEESION['page_no'] = $page_no;
							$query = "SELECT * FROM page_content WHERE page_id = '{$page_no}'";
							$result = $conn->query($query);
							$found_page = $result->fetch_assoc();  
							@$p_cate = $found_page['category'];
							
							@$_SESSION['footer_1'] = $found_page['footer_1'];
							@$_SESSION['footer_2'] = $found_page['footer_2'];
							@$_SESSION['footer_3'] = $found_page['footer_3'];
							@$_SESSION['footer_4'] = $found_page['footer_4'];
							@$_SESSION['footer_5'] = $found_page['footer_5'];
							
							@$_SEESION['p_cate'] = $p_cate;
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
							/*@$page_no = $_GET['id'];  
							$query2 = "SELECT * FROM page_content WHERE page_no = '{$page_no}'";
							$result2 = $conn->query($query2);
							$found_page = $result2->fetch_assoc();   @$p_cate = $found_page['category'];*/
						}
						
						if(isset($_REQUEST['upd_page_btn']))
						{
							
							@$upd_page_msg = update_page_content();
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
						
						if((@$_REQUEST['query'] == 'uploaded'))
						{
							$conn = db_connect();

							//$page_id = $_SESSION['page_no'];    $pic_path = $_SESSION['pic_path'];  $p_cate = $_SESSION['p_cate'];
							//@$upload_msg =  upload_content_photo($page_id, $p_cate, $pic_path);
							//if((@$_GET['query']) == "uploaded")
							//{
								echo '<div class="alert alert-success" style="width:97.5%; margin:auto">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									   <strong>Success!</strong> Photo Uploaded Successfully.
									 </div>';
							//}
							
							/*else
							{
								echo '<div class="alert alert-danger" style="width:97.5%; margin:auto">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Sorry!</strong> Fail To Upload Photo.'.$upload_msg;
									 '</div>  <br>';
							}	*/						
						}
						else if((@$_REQUEST['query'] == 'failed'))
						{
							echo '<div class="alert alert-warning" style="width:97.5%; margin:auto">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									   <strong>Exist! </strong> Fail To Upload Photo. Please  Re Upload Photo.
									   <button type="button" class="btn btn-default pull-right" name="load_pic" data-toggle="modal" data-target="#photo_1" style="margin:-8px 5px 0px 0px" onclick="getId("footer_1")"><i class="fa fa-upload"></i> Upload Photo</button>
								  </div>';
						}
						$conn->close();
					?>
					
					
					<!-- SETTING THE THE NEW STUDENT UNIQUE REGISTRATION NUMBER -->
					<?php
						//$table_name = 'page_content'; //$total = get_number_of_rec($table_name);  $total += 1;      @$page_no .= $total;
					?>
					

						<div class=" col-md-12" style="">

							<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title" style="color:#396"> <?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['pagename'];  } else{} ?> Page Content In Editing Mode </h3>
								</div>
								
								<div class="panel-body">
								
								<capture> Primary <?php if(@$_REQUEST['query'] == 'uploaded'){ echo $_SESSION['t1']; } ?></capture>
								<div class="pad"> 
									<div class="input-group">
										<input class="form-control" type="hidden" name="page_id" id="page_id" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['page_id'];  } else{} ?>" style="width:99%" required>
										
										<span class="input-group-addon">Page Name</span>
										<input class="form-control" type="text" placeholder="Page Name" name="pagename" id="pagename" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['pagename'];  } else{} ?>" style="width:99%" readOnly required>

										<span class="input-group-addon" style="margin-left:2%">Category</span>
										<input class="form-control" placeholder="Category" type="text" name="category" id="category" style="width:100%;margin-right:-2%" value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['category'];  } else{} ?>" readOnly required>
									</div>	
								</div>
								<br><br>
								
								
								<capture> First </capture>
								<div class="pad">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="title_1" id="title_1" placeholder="Title"
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['title_1'];  } else{} ?>">
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control" name="content_1" id="content_1" placeholder="Content" rows="3"><?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['content_1'];  } else{} ?></textarea>
									</div>	
								<br>
									<div class="input-group">																
										<?php if(@$p_cate == 'Photo' && $found_page['footer_1'] != null)
											{  ?>
												<span class="input-group-addon">
												<button type="button" class="btn btn-success" id="footer_1" data-toggle="modal" data-target="#photo_1" style="" onclick="getId('footer_1')"><i class="fa fa-upload"></i> </button>
												</span>
												<img src="<?php echo $found_page['footer_1']; ?>" alt="<?php echo $found_page['footer_1']; ?>" /> 
										<?php	} else {	?>
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="footer_1" id="footer_1" placeholder="Footer" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['footer_1'];  } else{} ?>">
										<?php }  ?>
									</div>		
								</div>
								<br><br>
								
								<capture> Second </capture>
								<div class="pad">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="title_2" id="title_2" placeholder="Title" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['title_2'];  } else{} ?>">
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control" name="content_2" id="content_2" placeholder="Content" rows="3"><?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['content_2'];  } else{} ?></textarea>
									</div>	
								<br>
									<div class="input-group">																
										<?php if(@$p_cate == 'Photo' && $found_page['footer_2'] != null)
											{  ?>
												<span class="input-group-addon">
												<button type="button" class="btn btn-success" id="footer_2" data-toggle="modal" data-target="#photo_1" style="" onclick="getId('footer_2')"><i class="fa fa-upload"></i> </button>
												</span>
												<img src="<?php echo $found_page['footer_2']; ?>" alt="<?php echo $found_page['footer_2']; ?>" />
										<?php	} else {	?>
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="footer_2" id="footer_2" placeholder="Footer" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['footer_2'];  } else{} ?>">
										<?php }  ?>
									</div>		
								</div>
								<br><br>
								
								<capture> Third </capture>
								<div class="pad">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="title_3" id="title_3" placeholder="Title" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['title_3'];  } else{} ?>">
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control" name="content_3" id="content_3" placeholder="Content" rows="3"><?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['content_3'];  } else{} ?></textarea>
									</div>	
								<br>
									<div class="input-group">																
										<?php if(@$p_cate == 'Photo' && $found_page['footer_3'] != null)
											{  ?>
												<span class="input-group-addon">
												<button type="button" class="btn btn-success" id="footer_3" data-toggle="modal" data-target="#photo_1" style="" onclick="getId('footer_3')"><i class="fa fa-upload"></i> </button>
												</span>
												<img src="<?php echo $found_page['footer_3']; ?>" alt="<?php echo $found_page['footer_3']; ?>" />
										<?php	} else {	?>
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="footer_3" id="footer_3" placeholder="Footer" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['footer_3'];  } else{} ?>">
										<?php }  ?>
									</div>		
								</div>
								<br><br>
								
								<capture> Fourth </capture>
								<div class="pad"> 
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="title_4" id="title_4" placeholder="Title" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['title_4'];  } else{} ?>">
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control" name="content_4" id="content_4" placeholder="Content" rows="3"><?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['content_4'];  } else{} ?></textarea>
									</div>	
								<br>
									<div class="input-group">																
										<?php if(@$p_cate == 'Photo' && $found_page['footer_4'] != null)
											{  ?>
												<span class="input-group-addon">
												<button type="button" class="btn btn-success" id="footer_4" data-toggle="modal" data-target="#photo_1" style="" onclick="getId('footer_4')"><i class="fa fa-upload"></i> </button>
												</span>
												<img src="<?php echo $found_page['footer_4']; ?>" alt="<?php echo $found_page['footer_4']; ?>" />
										<?php	} else {	?>
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="footer_4" id="footer_4" placeholder="Footer" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['footer_4'];  } else{} ?>">
										<?php }  ?>
									</div>		
								</div>
								
								<br><br>
								
								<capture> Fifth </capture>
								<div class="pad">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="title_5" id="title_5" placeholder="Title" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['title_5'];  } else{} ?>">
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control" name="content_5" id="content_5" placeholder="Content" rows="3"><?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['content_5'];  } else{} ?></textarea>
									</div>	
								<br>
									<div class="input-group">																
										<?php if(@$p_cate == 'Photo' && $found_page['footer_5'] != null)
											{  ?>
												<span class="input-group-addon">
												<button type="button" class="btn btn-success" id="footer_5" data-toggle="modal" data-target="#video_1" style="" onclick="getId('footer_5')"><i class="fa fa-upload"></i> </button>
												</span>
												<img src="<?php echo $found_page['footer_5']; ?>" alt="<?php echo $found_page['footer_5']; ?>" />
										<?php	} else {	?>
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="footer_5" id="footer_5" placeholder="Footer" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['footer_5'];  } else{} ?>">
										<?php }  ?>
									</div>		
								</div>
								<br><br>
								
								<capture> Sixth </capture>
								<div class="pad">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="title_6" id="title_6" placeholder="Title" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['title_6'];  } else{} ?>">
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control" name="content_6" id="content_6" placeholder="Content" rows="3"><?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['content_6'];  } else{} ?></textarea>
									</div>	
								<br>
									<div class="input-group">																
										<?php if(@$p_cate == 'Photo' && $found_page['footer_6'] != null)
											{  ?>
												<span class="input-group-addon">
												<button type="button" class="btn btn-success" id="footer_6" data-toggle="modal" data-target="#photo_1" style="" onclick="getId('footer_6')"><i class="fa fa-upload"></i> </button>
												</span>
												<img src="<?php echo $found_page['footer_6']; ?>" alt="<?php echo $found_page['footer_6']; ?>" />
										<?php	} else {	?>
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="footer_6" id="footer_6" placeholder="Footer" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['footer_6'];  } else{} ?>">
										<?php }  ?>
									</div>		
								</div>
								<br><br>
								
								<capture> Seventh </capture>
								<div class="pad">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="title_7" id="title_7" placeholder="Title" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['title_7'];  } else{} ?>">
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control" name="content_7" id="content_7" placeholder="Content" rows="3"><?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['content_7'];  } else{} ?></textarea>
									</div>	
								<br>
									<div class="input-group">																
										<?php if(@$p_cate == 'Photo' && $found_page['footer_7'] != null)
											{  ?>
												<span class="input-group-addon">
												<button type="button" class="btn btn-success" id="footer_7" data-toggle="modal" data-target="#photo_1" style="" onclick="getId('footer_7')"><i class="fa fa-upload"></i> </button>
												</span>
												<img src="<?php echo $found_page['footer_7']; ?>" alt="<?php echo $found_page['footer_7']; ?>" />
										<?php	} else {	?>
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="footer_7" id="footer_7" placeholder="Footer" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['footer_7'];  } else{} ?>">
										<?php }  ?>
									</div>		
								</div>
								<br><br>
								
								<capture> Eight </capture>
								<div class="pad">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="title_8" id="title_8" placeholder="Title" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['title_8'];  } else{} ?>">
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control" name="content_8" id="content_8" placeholder="Content" rows="3"><?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['content_8'];  } else{} ?></textarea>
									</div>	
								<br>
									<div class="input-group">																
										<?php if(@$p_cate == 'Photo' && $found_page['footer_8'] != null)
											{  ?>
												<span class="input-group-addon">
												<button type="button" class="btn btn-success" id="footer_8" data-toggle="modal" data-target="#photo_1" style="" onclick="getId('footer_8')"><i class="fa fa-upload"></i> </button>
												</span>
												<img src="<?php echo $found_page['footer_8']; ?>" alt="<?php echo $found_page['footer_8']; ?>" />
										<?php	} else {	?>
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="footer_8" id="footer_8" placeholder="Footer" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['footer_8'];  } else{} ?>">
										<?php }  ?>
									</div>		
								</div>
								<br><br>
								
								<capture> Ninth </capture>
								<div class="pad">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="title_9" id="title_9" placeholder="Title" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['title_9'];  } else{} ?>">
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control" name="content_9" id="content_9" placeholder="Content" rows="3"><?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['content_9'];  } else{} ?></textarea>
									</div>	
								<br>
									<div class="input-group">																
										<?php if(@$p_cate == 'Photo' && $found_page['footer_9'] != null)
											{  ?>
												<span class="input-group-addon">
												<button type="button" class="btn btn-success" id="footer_9" data-toggle="modal" data-target="#photo_1" style="" onclick="getId('footer_9')"><i class="fa fa-upload"></i> </button>
												</span>
												<img src="<?php echo $found_page['footer_9']; ?>" alt="<?php echo $found_page['footer_9']; ?>" />
										<?php	} else {	?>
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="footer_9" id="footer_9" placeholder="Footer" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['footer_9'];  } else{} ?>">
										<?php }  ?>
									</div>		
								</div>
								<br><br>
								
								<capture> Tenth </capture>
								<div class="pad">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="title_10" id="title_10" placeholder="Title" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['title_10'];  } else{} ?>">
									</div>	
								<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control" name="content_10" id="content_10" placeholder="Content" rows="3"><?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['content_10'];  } else{} ?></textarea>
									</div>	
								<br>
									<div class="input-group">																
										<?php if(@$p_cate == 'Photo' && $found_page['footer_10'] != null)
											{  ?>
												<span class="input-group-addon">
												<button type="button" class="btn btn-success" id="footer_10" data-toggle="modal" data-target="#photo_1" style="" onclick="getId('footer_10')"><i class="fa fa-upload"></i> </button>
												</span>
												<img src="<?php echo $found_page['footer_10']; ?>" alt="<?php echo $found_page['footer_10']; ?>" />
										<?php	} else {	?>
										<span class="input-group-addon"><i class="fa fa-folder"></i></span>
										<input type="text" class="form-control" name="footer_10" id="footer_10" placeholder="Footer" 
										value="<?php if(isset($_REQUEST['get_page_btn'])){ echo @$found_page['footer_10'];  } else{} ?>">
										<?php }  ?>
									</div>		
								</div>
								
								
								
									<div class="input-group pull-right">
										<button type="reset" class="btn btn-default">Clear</button>	
										<button type="submit" class="btn btn-primary" name="upd_page_btn">Update Page</button>
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



<script> //get id functions

	function getId(id)
	{
		$('#column').val(id);   
    }

</script>





		