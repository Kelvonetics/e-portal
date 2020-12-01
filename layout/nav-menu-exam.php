<!-- NAVBAR -->
		<?php //echo ob_start();  ?>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="#"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
				</form>
				<div class="navbar-btn navbar-btn-right">
					<!-- <a class="btn btn-success update-pro" href="#" title=""><i class="fa fa-rocket"></i> <span>Exams</span></a> -->
					<a class="btn btn-success update-pro" data-toggle="modal" data-target="#passage" title="View Passage"><i class="fa fa-rocket"></i> <span>Passage</span></a>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		
		
		
		
		
		
<!--

<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-book"></i></span>
										<select class="form-control" name="subject_2" id="subject_2" required style="width:48%">
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
										
										<select class="form-control pull-right" name="mark_2" id="mark_2" required style="width:48%">
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
									
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-book"></i></span>
										<select class="form-control" name="subject_3" id="subject_3" required style="width:48%">
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
										
										<select class="form-control pull-right" name="mark_3" id="mark_3" required style="width:48%">
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
									
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-book"></i></span>
										<select class="form-control" name="subject_4" id="subject_4" required style="width:48%">
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
										
										<select class="form-control pull-right" name="mark_4" id="mark_4" required style="width:48%">
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
									
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-book"></i></span>
										<select class="form-control" name="subject_5" id="subject_5" required style="width:48%">
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
										
										<select class="form-control pull-right" name="mark_5" id="mark_5" required style="width:48%">
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
									
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-book"></i></span>
										<select class="form-control" name="subject_6" id="subject_6" required style="width:48%">
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
										
										<select class="form-control pull-right" name="mark_6" id="mark_6" required style="width:48%">
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
									
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-book"></i></span>
										<select class="form-control" name="subject_7" id="subject_7" required style="width:48%">
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
										
										<select class="form-control pull-right" name="mark_7" id="mark_7" required style="width:48%">
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
									
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-book"></i></span>
										<select class="form-control" name="subject_8" id="subject_8" required style="width:48%">
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
										
										<select class="form-control pull-right" name="mark_8" id="mark_8" required style="width:48%">
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
									
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-book"></i></span>
										<select class="form-control" name="subject_9" id="subject_9" required style="width:48%">
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
										
										<select class="form-control pull-right" name="mark_9" id="mark_9" required style="width:48%">
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
									
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-book"></i></span>
										<select class="form-control" name="subject_10" id="subject_10" required style="width:48%">
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
										
										<select class="form-control pull-right" name="mark_10" id="mark_10" required style="width:48%">
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
									

-->		