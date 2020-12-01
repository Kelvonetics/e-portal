
	<!-- header and meta data info -->
	<?php include('layout/top-head.php') ?>	

	
	
		
			<?php include('layout/nav-menu.php') ?>	
	
			<?php include('layout/left-sidebar.php') ?>  	
		
			
		
		
		<!-- MAIN -->
		<div class="main">
		
		<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
		
		
		
			<div class="col-md-10 col-md-offset-1 panel">
				<div id="accordion" class="panel-group">
				
				
					<div class="panel-heading">
						<h4 class="panel-title btn">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1. Exam FAQ and Help?</a>
						</h4>
					</div>
					

					
					<div id="collapseOne" class="panel-collapse collapse">
						<div class="panel-body">
						  
								
					<ul class="nav nav-tabs nav-justified">
						  <li class="active"><a data-toggle="tab" href="#home">How Do I Take Termly Exams</a></li>
						  <li><a data-toggle="tab" href="#menu1">How Do I Take Entrance Exams</a></li>
					</ul>
						
					<div class="tab-content">
						  <div id="home" class="tab-pane fade in active">
							<p> Make sure you are on the site (Portal), Click the Exam link from the main menu. From the new window click the SELECT TERMLY EXAM and enter the required details already provided by your admin. Click Continue button, click the next button and it will take you finally to the exam page. Click begin test. </p>
										   <p>  Now to get the next sets of questions click the NEXT button why to navigate backward, click the BACK button. When you are done, click the SUBMIT button and OK. NB : DO NOT close the browser during your exam. </p>
						  </div>
										  
						<div id="menu1" class="tab-pane fade">
							<p> Make sure you are on the site (Portal), Click the Exam link from the main menu. From the new window click the SELECT ENTRANCE EXAM and enter the required details already provided by your admin. Click Continue button, click the next button and it will take you finally to the exam page. Click begin test.</p>
						   <p>  Now to get the next sets of questions click the NEXT button why to navigate backward, click the BACK button. When you are done, click the SUBMIT button and OK. NB : DO NOT close the browser during your exam. </p>
						  </div>
					</div>
								

						  
						</div>
					</div>
				
				
				
					<div class="panel-heading">
						<h4 class="panel-title btn">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">2. Result FAQ and Help?</a>
						</h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse">
						<div class="panel-body">
						   <p> To Check your TERMLY result, click the RESULT link from your main menu, select termly result. Fill in the required details and hit the check result button. You can print this result if a local printer is connected to the computer ( ctr + p ) to print. </p>
						</div>
					</div>
				
				
					<div class="panel-heading">
						<h4 class="panel-title btn">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">3. Contact Us FAQ and Help?</a>
						</h4>
					</div>
					<div id="collapseThree" class="panel-collapse collapse">
						<div class="panel-body">
							<p>You can contact us from the contact us page from the main menu on the site. You can send us a mail by clicking the e-mail link on the contact us page, you can give us a call with any of the numbers or leave us a comment and you will get a feedback from us soon.</p>
						</div>
					</div>
				
				
				
					<div class="panel-heading">
						<h4 class="panel-title btn">
						  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">4. Profile FAQ and Help?</a>
						</h4>
					</div>
					<div id="collapseFour" class="panel-collapse collapse">
						<div class="panel-body">
							<p>As a Student, you can view your profile / details by clicking the profile menu from the main menu. Enter your details or pupils details on the form and click the view profile button. NB : You can not edit your details here, you have to contact the school administrator.</p>
						</div>
					</div>
				
			</div>


				</div>
		
		
		
				
				<div class="container-fluid" style="display:none">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">   
							<form>
							<select name="users" onchange="showUser(this.value)">
							  <option value="">Select a person:</option>
							  <option value="1">Judy Dench</option>
							  <option value="2">Nick Kluas</option>
							  <option value="3">Walter O' Brian</option>
							  <option value="4">Nina Sharp</option>
							  <option value="5">Joey Carroll</option>
							  </select>
							</form>
							<br>
							<div id="txtHint"><b></b></div>
						   <div class=" form-group col-lg-12">
						
								</div>
						<div id="hide">
						<div class=" form-group">
							<input type="text" id="id" class="form-control" />
						</div>
						
						<div class=" form-group">
							<input type="text" id="fname" class="form-control" />
						</div>
						<div class=" form-group">
							<input type="text" id="lname" class="form-control" />
						</div>
						<div class=" form-group">
							<input type="text" id="age" class="form-control" />
						</div>
						<div class=" form-group">
							<input type="text" id="home" class="form-control" />
						</div>
						<div class=" form-group">
							<input type="text" id="job" class="form-control" />
						</div>
						
						</div>
						</div>
					</div>
				</div>

				
		
		
		
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		
		
		
		</div>
		<!-- END MAIN -->
		
		
		
		
		
		
	<?php include('layout/bottom-footer.php') ?>		
		
		
		
		
		
		
		




<script>
function showUser(str) 
{
    if (str == "") 
	{
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else 
	{ 
        if (window.XMLHttpRequest) 
		{
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else 
		{
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() 
		{
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
			{
				document.getElementById("hide").style.display = "none";
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>



