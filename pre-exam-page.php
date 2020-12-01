
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>	

	
<script>
	<!--
	//var hoursleft = 0;
	var minutesleft = 0;			// you can change these values to any value greater than 0
	var secondsleft = 30;
	var millisecondsleft = 0;
	var finishedtext = "End of Test !" // text that appears when the countdown reaches 0
	end = new Date();
	//end.setHours(end.getHours()+hoursleft);
	end.setMinutes(end.getMinutes()+minutesleft);
	end.setSeconds(end.getSeconds()+secondsleft);
	end.setMilliseconds(end.getMilliseconds()+millisecondsleft);

	function countDown(){
		now = new Date();
		diff = end - now;
		diff = new Date(diff);
		var msec = diff.getMilliseconds();
		var sec = diff.getSeconds();
		var min = diff.getMinutes();
		//var hr = diff.getHours()-1;
		if (min < 10){		min = "0" + min;
		}
		if (sec < 10){		sec = "0" + sec;
		}
		if(msec < 10){		msec = "00" +msec;
		}
		else if(msec < 100){		msec = "0" +msec;
		}
		if(now >= end ){
			clearTimeout(timerID);
			
			var attr = document.getElementByName("continue");   //.innerHTML = finishedtext;
			attr.appendAttribute
		}
		else
		{
			document.getElementById("time").innerHTML =  min + ":" + sec;
		}		// you can leave out the + ":" + msec if you want...
				// If you do so, you should also change setTimeout to setTimeout("countDown()",1000)
				timerID = setTimeout("countDown()", 10); 
	}

	-->
</script>		<!-- CODES FOR COUNTDOWN TIMER-->

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
	$(document).ready(function()
	{
	displayTime();
	$widths =$(window).width();
	$heights =$(document).height();
	})
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
</script>

<script>
  function opennew(url) 
  {
      var win= window.open(url, '','scrollbars=no,menubar=no,resizable=yes,toolbar=no,location=no,status=no');
  }  
</script>
  
<script>
	<!--
	//var hoursleft = 0;
	var minutesleft = 5;			// you can change these values to any value greater than 0
	var secondsleft = 0;
	var millisecondsleft = 0;
	var finishedtext = "End of Test !" // text that appears when the countdown reaches 0
	end = new Date();
	//end.setHours(end.getHours()+hoursleft);
	end.setMinutes(end.getMinutes()+minutesleft);
	end.setSeconds(end.getSeconds()+secondsleft);
	end.setMilliseconds(end.getMilliseconds()+millisecondsleft);

	function countDown()
	{
		now = new Date();
		diff = end - now;
		diff = new Date(diff);
		var msec = diff.getMilliseconds();
		var sec = diff.getSeconds();
		var min = diff.getMinutes();
		//var hr = diff.getHours()-1;
		if (min < 10){
			min = "0" + min;
		}
		if (sec < 10){
			sec = "0" + sec;
		}
		if(msec < 10){
			msec = "00" +msec;
		}
		else if(msec < 100){
			msec = "0" +msec;
		}
		if(now >= end ){
			clearTimeout(timerID);
			
			document.getElementById("con").setAttribute("disabled", "disabled");
			window.location();
		}
		else
		{
		}		// you can leave out the + ":" + msec if you want...
				// If you do so, you should also change setTimeout to setTimeout("countDown()",1000)
				timerID = setTimeout("countDown()", 10); 
	}
	//var start = document.getElementById(start);

	//window.onload = countDown;
-->
</script>		<!-- CODES FOR COUNTDOWN TIMER-->

		
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		
			
			
		
		
		<!-- MAIN -->
		<div class="main" style="width:82%;">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
		
	 
					
					<?php
						if(isset($_REQUEST['val_code_btn']))
						{
							$conn = db_connect();
							$regist_no = filter_input(INPUT_POST, 'regist_no', FILTER_SANITIZE_STRING);
							$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
							$class = filter_input(INPUT_POST, 'class', FILTER_SANITIZE_STRING);
							$term = filter_input(INPUT_POST, 'term', FILTER_SANITIZE_STRING);
							$pin = filter_input(INPUT_POST, 'pin', FILTER_SANITIZE_STRING);

							$query = " SELECT * FROM exam_code WHERE regist_no = '{$regist_no}' 
									   AND class = '{$class}' AND term = '{$term}' AND pin = '{$pin}'";
							$result = $conn->query($query);
							if ($result->num_rows == 1)
							{	
								$exam = $result->fetch_assoc(); 
								@$_SESSION['subject'] = $exam['subject'];
								@$_SESSION['class'] = $exam['class'];
								@$_SESSION['term'] = $exam['term'];
								@$_SESSION['regist_no'] = $exam['regist_no'];
								
								/*$query_del = "DELETE FROM $table WHERE regist_no = '{$regist_no}' AND subject = '{$subject}'
										AND class = '{$class}' AND term = '{$term}' AND pin = '{$pin}'";

								if ($conn->query($query_del) === TRUE)
								{*/
									//header('location:exams.php');
									echo '<div><center>
												<input class="btn btn-success" name="cont" id="cond" type="button" value="Continue To Exam" 
												/>
										</center></div>
										<script>
											$(document).ready(function()
											{
												$("#auth").hide();
											});
										</script>';
								/*}
								else { 
									  echo '<div class="alert alert-danger">
												<strong>Sorry!</strong> , Failed To Delete </div>'; 
									 }*/
								
								
							}else { 
									echo '<div class="alert alert-danger">
											  <strong>Sorry!</strong> , Invalid Exam Details '.
										 '</div>'; 
								  }
								  $conn->close();
						}
						
						else if(isset($_REQUEST['val_code_entr_btn']))
						{
							$conn = db_connect();
							$regist_no = filter_input(INPUT_POST, 'regist_no', FILTER_SANITIZE_STRING);
							$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
							$class = filter_input(INPUT_POST, 'class', FILTER_SANITIZE_STRING);
							$term = filter_input(INPUT_POST, 'term', FILTER_SANITIZE_STRING);
							$pin = filter_input(INPUT_POST, 'pin', FILTER_SANITIZE_STRING);

							$query = " SELECT * FROM exam_code WHERE regist_no = '{$regist_no}' 
									   AND class = '{$class}' AND term = '{$term}' AND pin = '{$pin}'";
							$result = $conn->query($query);
							if ($result->num_rows == 1)
							{	
								$exam = $result->fetch_assoc(); 
								@$_SESSION['subject'] = $exam['subject'];
								@$_SESSION['class'] = $exam['class'];
								@$_SESSION['term'] = $exam['term'];
								@$_SESSION['regist_no'] = $exam['regist_no'];
									echo '<div><center>
												<input class="btn btn-success" name="entr_cont" id="cond_e" type="button" value="Continue To Entrance Exam" 
												/>';
												//echo  $exam['subject'].   $exam['class'].  $exam['term'];
										echo '</center></div>
										<script>
											$(document).ready(function()
											{
												$("#auth").hide();
											});
										</script>';
								
								
								
							}else { 
									echo '<div class="alert alert-danger">
											  <strong>Sorry!</strong> , Invalid Exam Details '.
										 '</div>'; 
								  }
								  $conn->close();
						}

					?>
					
				</div> 
				</div>
				
				
				<div class="row-fluid">
				<div class="col-md-6 col-md-offset-3">  
					<form action="pre-exam-page" method="post" role="form">
					<div class="panel panel-default" id="auth">
							<div class="panel-heading" style="color:#999">
							  <h4>  <i class="fa fa-lock"></i> Authenticate Exam Credentials</h4>
							</div>
							
						 <div class="panel-body">
							
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input class="form-control" placeholder="Registration  Number" type="text" name="regist_no" id="regist_no" required>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-book"></i></span>
								<select class="form-control" name="subject" id="subject" required>
								<option value=""> Select Subject </option>
									<?php
									$conn = db_connect();
									$query = "SELECT * FROM subjects";
										$record = $conn->query($query);
										while($result = $record->fetch_assoc())
										{
											echo   "<option value=\"".$result['subjects']."\">".$result['value']."</option>";
										}   $conn->close();
									 ?>	
								<option value="entrance subjects"> Entrance Subjects </option>
								</select>
							</div>							
							<br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-book"></i></span>
								<select class="form-control" name="term" id="term">
									<option> --Select Term-- </option>
									<option value="first"> First Term </option>
									<option value="second"> Second Term </option>
									<option value="third"> Third Term </option>
							  </select>
							</div>							
							<br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
								<input class="form-control" placeholder="Exam PIN" type="text" name="pin" id="pin" required>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users"></i></span>
								<select class="form-control" name="class" id="class">
									<option value=""> Select Class </option>
									<option value="class1"> Class One </option>
									<option value="class2"> Class Two </option>
									<option value="class3"> Class Three </option>
									<option value="class4"> Class Four </option>
									<option value="class5"> Class Five </option>
									<option value="class6"> Class Six </option>
									<option value="entrance"> Entrance Class </option>
							  </select>
							</div>							
							<br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								<select class="form-control" name="session" id="session">
								<option value=""> Select Session </option>
									<?php
									$conn = db_connect();
									$query = "SELECT * FROM sessions";
										$record = $conn->query($query);
										while($result = $record->fetch_assoc())
										{
										   echo   "<option value=\"".$result['session']."\">".$result['value']."</option>";
										}   $conn->close();
									 ?>
							  </select>
							</div>							
							<br>
							
							   
					   
						 </div>
						 <div class="panel-footer plan">  
							<button class="btn" type="reset" title="Click To Reset Form" > Clear </button>
							<button class="btn btn-primary pull-right" type="submit" name="val_code_btn" id="tm" title="Click To Authenticate Code"  style="display:none"> Submit </button>
							
							<button class="btn btn-primary pull-right" type="submit" data-toggle="modal" name="val_code_entr_btn" id="en" title="Click For Entrance Exam" style="display:none"> Submit </button>
						 </div>
					</div> 
					</form>

		
		
		
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		</div>
		<!-- END MAIN -->
		
		
		
		
		
		
	<?php include('layout/bottom-footer.php') ?>		
		
		
	
	
<!--  EXAM CODE -->
	
	<!-- MODAL FORM TO RETRIEVE THE STUDENT NUMBER FOR PROMOTION -->
	
	
	<!-- MODAL FORM TO RETRIEVE THE PROMOTION CLASS FOR VIEW -->
	<form action="pre-exam-page" method="post" role="form">
		<div id="entrance" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Entrance Exam Authenticate</h4>
			  </div>
		
				<div class="modal-body">
					 
							
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input class="form-control" placeholder="Registration  Number" type="text" name="e_regist_no" id="e_regist_no" required>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-book"></i></span>
								<select class="form-control" name="e_subject" id="e_subject" required>
								<option value=""> Select Subject </option>
								<option value="entrance subjects"> Entrance Subjects </option>										
								</select>
							</div>							
							<br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-book"></i></span>
								<select class="form-control" name="e_term" id="e_term">
									<option> --Select Term-- </option>
									<option value="first"> First Term </option>
									<option value="second"> Second Term </option>
									<option value="third"> Third Term </option>
							  </select>
							</div>							
							<br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
								<input class="form-control" placeholder="Exam PIN" type="text" name="e_pin" id="e_pin" required>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users"></i></span>
								<select class="form-control" name="e_class" id="e_class">
									<?php
									$conn = db_connect();
									$query = "SELECT * FROM class";
										$record = $conn->query($query);
										while($result = $record->fetch_assoc())
										{
										   echo   "<option value=\"".$result['class']."\">".$result['values']."</option>";
										}   $conn->close();
									 ?>
							  </select>
							</div>							
							<br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								<select class="form-control" name="e_session" id="e_session">
									<?php
									$conn = db_connect();
									$query = "SELECT * FROM sessions";
										$record = $conn->query($query);
										while($result = $record->fetch_assoc())
										{
										   echo   "<option value=\"".$result['session']."\">".$result['value']."</option>";
										}   $conn->close();
									 ?>
							  </select>
							</div>							

							
							   
					   
											
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="reset"> Clear </button>
					<button class="btn btn-primary" type="submit" name="" title="" > Submit </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>	
	
	
	
	
	
	
	
	<script>
		$(document).ready(function()
		{
			$('#cond').click(function()
			{
				opennew('exams.php');
				$('#cond').fadeOut();
			})

			$('#cond_e').click(function()
			{
				opennew('entrance-exam.php');
				$('#cond_e').fadeOut();
			})
			//opennew();
		});
	</script>

	<!-- script to show termly or entrance exam button -->
	<script>
	$(document).ready(function()
	{
		$('#class').change(function()
		{
			var cl = $(this).val();
			if(cl == 'entrance')
			{
				$('#en').show();    $('#tm').hide(); 
			}
			else 
			{ 
				$('#tm').show();    $('#en').hide();  
			}
			//alert('Class Selected Is : ' + cl);
		});
	});
</script> 
	
	
	
	
	
	