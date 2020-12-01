	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>	


	<?php include('layout/nav-menu-exam.php') ?>	
	
	<?php include('layout/left-sidebar-exam.php') ?> 
	
	
	
	<?php 
		$conn = db_connect();  $reg = @$_SESSION['regist_no'];
		$query = "SELECT * FROM student_users WHERE regist_no = '{$reg}'";
		$result = $conn->query($query);
		if ($result->num_rows == 1)
		{	
			$photo = $result->fetch_assoc();
			@$_SESSION['r_fname'] = $photo['firstname'];
			@$_SESSION['r_lname'] = $photo['lastname'];
			@$_SESSION['r_sess'] = $photo['session'];
			@$_SESSION['r_photo'] = $photo['picture'];
			
			$pic = $photo['picture']; 
		}
	?> 
	
	<style>
		.pad
		{
			margin:3px 15px;
		}
	</style>

<script>
<!--
//var hoursleft = 0;
var minutesleft = 60;			// you can change these values to any value greater than 0
var secondsleft = 0;
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
		
		document.getElementById("time").innerHTML = finishedtext;
		$("#overlay").fadeIn();	
		$("#overlay-content").fadeIn();									//ENDING THE EXAM FORCFULLY 
			//$("#endNow").click(function(){
		//$("#block").hide()
		
			$_SESSION['exam_status'] = 'inactive';
			///redirect_to('pre-test-page.php?query=inactive');
	}
	else
	{
		document.getElementById("time").innerHTML =  min + ":" + sec;
	}		// you can leave out the + ":" + msec if you want...
			// If you do so, you should also change setTimeout to setTimeout("countDown()",1000)
			timerID = setTimeout("countDown()", 10); 
}
//var start = document.getElementById(start);

	//window.onload = countDown;
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
    

<div id="overlay">          </div   overlay>
<div id="overlay-content"> 
	<form action="results" method="post">
		<center>
	 <input style="margin-top:10%; padding:10px 20px" type="submit" class="btn-success" name="end_exam_time_btn" title="Click To Finally Submit Exam" value="Submit Exam" />
		</center>
	</form>
</div>


			<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">




<body   onload="countDown()">

  <!-- PANEL NO PADDING -->
	<div class="panel">
		<div class="panel-body no-padding bg-primary text-center">
			<div class="padding-top-10 padding-bottom-10">
				<table width="90%" border="0" cellspacing="0" cellpadding="1">
				  <tr>
					<td> 	<?php 	echo '<img src="upload/'.@$pic.' "  class="" width="100" />';	?>  	</td>
					<td>Student NO : <?php echo @$_SESSION['regist_no'] ?> </td>
					<td>Subject : <?php echo @$_SESSION['subject'] ?></td>
					<td>Class : <?php echo @$_SESSION['class'] ?></td>
					<td>Term : <?php echo @$_SESSION['term']; echo ' Term'; ?></td>
					<td>Date : <?php echo date('M'); echo ' '; echo date('d'); echo ',  '; echo date('Y'); ?></td>
					<td>Time Left : <b id="time" style="color:Red; font-weight:bold">  </b></td>
				  </tr>
				</table>
			</div>
		</div>
	</div>
<!-- END PANEL NO PADDING -->



  

<form action="results" method="post" role="form">


<div id="set_one" class="row panel">

	<!-- QUESTION 1 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				$conn = db_connect();
		 		@$subject = $_SESSION['subject'];	
				@$class = $_SESSION['class'];
				@$term = $_SESSION['term'];
				//getting the subj number
				if($subject != 'entrance subjects')
				{ 				
					$query = "SELECT * FROM subjects WHERE subjects = '{$subject}'";
					$result = $conn->query($query);
					if($result->num_rows == 1)
					{
						$sub_no = $result->fetch_assoc();    $subj_no = $sub_no['subj_no'];
						$table_name = 'subject_' .$subj_no;
					}
					
				}
				else if($subject == 'entrance subjects') 
				{ $table_name = 'entrance_questions'; }
				
				
				
				
				@$total = get_no_of_questions($table_name);
				@$first_no = get_first_value($table_name, $column, $term);
				@$last_no = get_last_value($table_name, $column, $term);
				++$last_no;
				label1:
				@$q_no = rand($first_no, $last_no);

				
				@$quest = get_questions($subject, $class, $term, $q_no);
				//making sure the corrent term question is select for the question number

				if($quest == null)			{ $q_no = ++$q_no; goto label1; }
			
				if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
				echo 'Question : 1 <br />'; 	$q_no = ++$q_no;
				echo $quest["question"];  $conn->close();
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest1Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest1Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest1Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest1Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				<?php $_SESSION['ans1'] = $quest["answer"]; ?>				
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 1 END -->


	<!-- QUESTION 2 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label2:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)		{ $q_no = ++$q_no; goto label2; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 2 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest2Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest2Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest2Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest2Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				 <?php $_SESSION['ans2'] = $quest["answer"]; ?>
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 2 END -->


	<!-- QUESTION 3 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label3:					
				@$quest = get_questions($subject, $class, $term, $q_no);
				//making sure the corrent term question is select for the question number
				if($quest ==  null)					{ $q_no = ++$q_no; goto label3; }
				
				if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 3 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest3Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest3Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest3Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest3Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				<?php $_SESSION['ans3'] = $quest["answer"]; ?>				
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 3 END -->


	<!-- QUESTION 4 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label4:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label4; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 4 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest4Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest4Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest4Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest4Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				 <?php $_SESSION['ans4'] = $quest["answer"]; ?>
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 4 END -->

		<div class="input-group pull-right">
			<button type="button" class="btn btn-primary pull-right pad" id="next_two">Next</button>
		</div>


	</div>


	
<div id="set_two" class="set_one row panel">

	<!-- QUESTION 5 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label5:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label5; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 5 <br />'   ; $q_no = ++$q_no;    
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest5Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest5Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest5Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest5Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				<?php $_SESSION['ans5'] = $quest["answer"]; ?>				
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 5 END -->


	<!-- QUESTION 6 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label6:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label6; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 6 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest6Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest6Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest6Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest6Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				 <?php $_SESSION['ans6'] = $quest["answer"]; ?>
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 6 END -->


	<!-- QUESTION 7 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label7:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label7; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 7 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest7Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest7Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest7Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest7Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				<?php $_SESSION['ans7'] = $quest["answer"]; ?>				
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 7 END -->


	<!-- QUESTION 8 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label8:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label8; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 8 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest8Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest8Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest8Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest8Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				 <?php $_SESSION['ans8'] = $quest["answer"]; ?>
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 8 END -->

		<div class="input-group pull-right">
			<button type="button" class="btn btn-primary pull-right pad" id="next_thr">Next</button>
			<button type="button" class="btn btn-primary pull-right pad" id="prev_one">Previous</button>
		</div>


	</div>


	
<div id="set_thr" class="set_one row panel">

	<!-- QUESTION 9 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label9:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label9; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 9 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest9Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest9Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest9Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest9Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				<?php $_SESSION['ans9'] = $quest["answer"]; ?>				
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 9 END -->


	<!-- QUESTION 10 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label10:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else { }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label10; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 10 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest10Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest10Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest10Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest10Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				 <?php $_SESSION['ans10'] = $quest["answer"]; ?>
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 10 END -->


	<!-- QUESTION 11 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label11:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label11; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 11 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest11Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest11Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest11Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest11Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				<?php $_SESSION['ans11'] = $quest["answer"]; ?>				
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 11 END -->


	<!-- QUESTION 12 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label12:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label12; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 12 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest12Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest12Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest12Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest12Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				 <?php $_SESSION['ans12'] = $quest["answer"]; ?>
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 12 END -->

		<div class="input-group pull-right">
			<button type="button" class="btn btn-primary pull-right pad" id="next_fou">Next</button>
			<button type="button" class="btn btn-primary pull-right pad" id="prev_two">Previous</button>
		</div>


</div>



<div id="set_fou" class="set_one row panel">

	<!-- QUESTION 13 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label13:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label13; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 13 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest13Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest13Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest13Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest13Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				<?php $_SESSION['ans13'] = $quest["answer"]; ?>				
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 13 END -->


	<!-- QUESTION 14 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label14:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label14; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 14 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest14Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest14Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest14Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest14Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				 <?php $_SESSION['ans14'] = $quest["answer"]; ?>
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 14 END -->


	<!-- QUESTION 15 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label15:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label15; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 15 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest15Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest15Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest15Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest15Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				<?php $_SESSION['ans15'] = $quest["answer"]; ?>				
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 15 END -->


	<!-- QUESTION 16 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label16:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label16; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 16 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest16Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest16Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest16Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest16Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				 <?php $_SESSION['ans16'] = $quest["answer"]; ?>
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 16 END -->

		<div class="input-group pull-right">
			<button type="button" class="btn btn-primary pull-right pad" id="next_fiv">Next</button>
			<button type="button" class="btn btn-primary pull-right pad" id="prev_thr">Previous</button>
		</div>


</div>



<div id="set_fiv" class="set_one row panel">

	<!-- QUESTION 17 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label17:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label17; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 17 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest17Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest17Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest17Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest17Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				<?php $_SESSION['ans17'] = $quest["answer"]; ?>				
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 17 END -->


	<!-- QUESTION 18 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label18:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label18; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 18 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest18Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest18Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest18Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest18Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				 <?php $_SESSION['ans18'] = $quest["answer"]; ?>
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 18 END -->


	<!-- QUESTION 19 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label19:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label19; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 19 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest19Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest19Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest19Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest19Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				<?php $_SESSION['ans19'] = $quest["answer"]; ?>				
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 19 END -->


	<!-- QUESTION 20 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label20:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label20; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 20 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest20Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest20Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest20Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest20Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				 <?php $_SESSION['ans20'] = $quest["answer"]; ?>
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 20 END -->

		<div class="input-group pull-right">
			<button type="button" class="btn btn-primary pull-right pad" id="next_six">Next</button>
			<button type="button" class="btn btn-primary pull-right pad" id="prev_fou">Previous</button>
		</div>


</div>



<div id="set_six" class="set_one row panel">

	<!-- QUESTION 21 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label21:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label21; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 21 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest21Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest21Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest21Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest21Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				<?php $_SESSION['ans21'] = $quest["answer"]; ?>				
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 21 END -->


	<!-- QUESTION 22 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label22:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label22; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 22 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest22Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest22Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest22Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest22Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				 <?php $_SESSION['ans22'] = $quest["answer"]; ?>
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 22 END -->


	<!-- QUESTION 23 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label23:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label23; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 23 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest23Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest23Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest23Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest23Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				<?php $_SESSION['ans23'] = $quest["answer"]; ?>				
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 23 END -->


	<!-- QUESTION 24 -->
	<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label24:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else { }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label24; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 24 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest24Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest24Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest24Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest24Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				 <?php $_SESSION['ans24'] = $quest["answer"]; ?>
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 24 END -->

		<div class="input-group pull-right">
			<button type="button" class="btn btn-primary pull-right pad" id="next_sev">Next</button>
			<button type="button" class="btn btn-primary pull-right pad" id="prev_fiv">Previous</button>
		</div>


</div>



<div id="set_sev" class="set_one row panel">

	<!-- QUESTION 25 -->
	<div class="col-md-6 col-md-offset-3">
	<div class="panel">
		<div class="panel-heading">
			<?php  
				label25:
					if($q_no == $last_no)	{	$q_no = $first_no;  }	else {  }
					@$quest = get_questions($subject, $class, $term, $q_no);
					//making sure the corrent term question is select for the question number
					if($quest ==  null)
					{ $q_no = ++$q_no; goto label25; }
				
				//@$quest = get_questions($subject, $class, $term, $q_no);
				echo 'Question : 25 <br />'; $q_no = ++$q_no;
				echo $quest["question"]; 
			?>
		</div>
		<div class="panel-body">
			<p>
				<label class="fancy-radio"><input name="quest25Rad" value="A" type="radio"><span><i></i>A &nbsp;&nbsp; <?php echo $quest["optionA"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest25Rad" value="B" type="radio"><span><i></i>B &nbsp;&nbsp; <?php echo $quest["optionB"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest25Rad" value="C" type="radio"><span><i></i>C &nbsp;&nbsp; <?php echo $quest["optionC"]; ?> </span> </label>
				<label class="fancy-radio"><input name="quest25Rad" value="D" type="radio"><span><i></i>D &nbsp;&nbsp; <?php echo $quest["optionD"]; ?> </span> </label>
				<?php $_SESSION['ans25'] = $quest["answer"]; ?>				
			</p>
		</div>
	</div>
	</div>
	<!-- QUESTION 25 END -->

		<div class="input-group col-md-6 col-md-offset-3">			
			<div class="btn-success pull-right exam_btn" id="next_eig">
             <input style="background-color:transparent; color:white" type="submit" name="end_exam_btn" value="End Exam" /> </div>
			 <button type="button" class="btn btn-primary pull-right pad" id="prev_six">Previous</button>
		</div>


</div>

</form>




		
		
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		</div>
		<!-- END MAIN -->









<?php include('layout/bottom-footer.php') ?>

<script src="js/myJQuery.js"></script>



	
	<!-- LOGICS TO RETRIEVE SUBJECT CONTENT - PASSAGE -->

		
<!-- MODAL FORM TO RETRIEVE THE PROMOTION CLASS FOR VIEW -->
	<form action="" method="post" role="form">
		<div id="passage" class="modal fade" role="dialog">
		  <div class="modal-dialog" style="width:80%; margin:auto">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"> Passages  &nbsp; - <span style="font-size:12px;color:#aaa"> Click A Title To View </span>  </h4>
			  </div>
		
				<div class="modal-body">
					
					<ul class="nav nav-tabs">
				
						<?php  
							$conn = db_connect(); 				$sess_subj = @$_SESSION['subject'];      $sess_class = @$_SESSION['class'];$sess_term = @$_SESSION['term']; 
							$query = "SELECT * FROM question_passage WHERE subject = '{$sess_subj}' AND class = '{$sess_class}' AND term = '{$sess_term}'";
							$result = $conn->query($query);
							if(@$result->num_rows > 0)	{		while($content = $result->fetch_assoc())		{ ?>
							
							  <li class=""><a data-toggle="tab" href="#<?php echo $content['id']; ?>"> <?php echo $content['title']; ?> </a></li>
							  
						<?php }	  }	    ?>	
						
					</ul>
					<div class="tab-content">
					
						<?php  
							$conn = db_connect(); 				$sess_subj = @$_SESSION['subject'];      $sess_class = @$_SESSION['class'];$sess_term = @$_SESSION['term'];    
							$query2 = "SELECT * FROM question_passage WHERE subject = '{$sess_subj}' AND class = '{$sess_class}' AND term = '{$sess_term}'";
							$result2 = $conn->query($query2);
							if(@$result2->num_rows > 0)	{		while($content2 = $result2->fetch_assoc())		{ ?>
							
							<div id="<?php echo $content2['id']; ?>" class="tab-pane fade">
							  <h3 style="color:#396"> <?php echo $content2["title"]; ?> </h3>
							  <p style="font-size:15px"> <?php echo $content2["content"]; ?> </p>
							</div>
							  
						<?php }	  }	    ?>
					
				</div>
				
				
				<div class="modal-footer">					
					<button data-dismiss="modal" class="btn btn-danger" type="reset"> Close </button>
				</div>
				
		   </div>
		  </div>
		</div>
    </form>
	



	
	
	
<script>
	$(function()
	{
		
	})
</script>	
	
	
	
	
	
	
	
	
	


