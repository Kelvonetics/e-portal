<?php include("config.php");  ?>

<?php session_start();

	
	function escape_value($value)
	{
		if(real_escape_string_exists)
		{
			if(magic_quotes_active)	{ $value = stripslashes($value)	;	}
			$value = mysql_real_escape_string($value);
		}
		else
			{
			if(!magic_quotes_active)	{ $value = addslashes($value); }
			}
			return $value;
	}
	
	function login()
	{
		$conn = db_connect();
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
		@$_SESSION['email'] = $email;
		$p_word = filter_input(INPUT_POST, 'p_word', FILTER_SANITIZE_STRING);
 		
			$query = "SELECT * FROM staff_users WHERE email = '{$email}' && password = '{$p_word}'";
			$result = $conn->query($query);	
			if($result->num_rows == 1)
			{
				$user = $result->fetch_assoc();
				$_SESSION['staff_id'] = $user['staff_id'];
				$_SESSION['f_name'] = $user['firstname'];
				$_SESSION['l_name'] = $user['lastname'];
				$_SESSION['email'] = $user['email'];
				$_SESSION['phone'] = $user['phone'];
				$_SESSION['gender'] = $user['gender'];
				$_SESSION['doj'] = $user['doj'];
				$_SESSION['position'] = $user['position'];
				$_SESSION['state'] = $user['state'];
				$_SESSION['nation'] = $user['nationality'];
				$_SESSION['addr'] = $user['address'];
				$_SESSION['photo'] = $user['photo'];
				$_SESSION['subj_1'] = $user['subject_1'];
				$_SESSION['subj_2'] = $user['subject_2'];
				$_SESSION['subj_3'] = $user['subject_3'];
				$_SESSION['subj_4'] = $user['subject_4'];
				$_SESSION['subj_5'] = $user['subject_5'];
			} else 
			{
				$user = '';
			}
		return $user;
	}
	
	function logged_in()
	{
		@$_SESSION['id'] = $sessID;
		if(login())
		{
			return isset($_SESSION['regist_no']);
		}		
	}

	function confirm_login()
	{		
	 if(!isset($_SESSION['staff_id']))  
		 { 
			header('location:login?query=notloggedin');  
		 } 
		 
		//on pageload    session_start();
		/*$idletime = 600;		//after 60 seconds the user gets logged out      //session_destroy();  session_unset();
		if(time() - $_SESSION['timestamp'] > $idletime){   header('location:locked-screen?query=notloggedin');   }
		else{     $_SESSION['timestamp'] = time();   }
		//on session creation
		$_SESSION['timestamp'] = time();*/
	}
	
	function confirm_staff_login()
	{		
	 if(!isset($_SESSION['staff_id']) || $_SESSION['role'] != 'Staff')  
		 { 
			header('location:login?query=notSetS'); 
		 } 
		 
		//on pageload    session_start();
		/*$idletime = 600;		//after 60 seconds the user gets logged out      //session_destroy();  session_unset();
		if(time()-$_SESSION['timestamp'] > $idletime){   header('location:locked-screen?query=notloggedin');   }
		else{     $_SESSION['timestamp'] = time();   }
		//on session creation
		$_SESSION['timestamp'] = time();*/
	}
	
	function confirm_admin_login()
	{		
	 if(!isset($_SESSION['staff_id']) || $_SESSION['role'] != 'Admin')  
		 { 
			header('location:login?query=notSetA'); 
		 } 
		 
		//on pageload    session_start();
		/*$idletime = 600;		//after 60 seconds the user gets logged out      //session_destroy();  session_unset();
		if(time()-$_SESSION['timestamp'] > $idletime){   header('location:locked-screen?query=notloggedin');   }
		else{     $_SESSION['timestamp'] = time();   }
		//on session creation
		$_SESSION['timestamp'] = time();*/
	}		

	function create_new_student($new_stud_msg)
	{
		$conn = db_connect();
		$new_stud_msg = "";	
		$stud_id = filter_input(INPUT_POST, 'stud_id', FILTER_SANITIZE_STRING);  
			$_SESSION['regist_no'] = $stud_id;
		$f_name = filter_input(INPUT_POST, 'f_name', FILTER_SANITIZE_STRING);
		$m_name = filter_input(INPUT_POST, 'm_name', FILTER_SANITIZE_STRING);
		$l_name = filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING);
		$p_word = filter_input(INPUT_POST, 'p_word', FILTER_SANITIZE_STRING);
		$s_class = filter_input(INPUT_POST, 's_class', FILTER_SANITIZE_STRING); 
			$_SESSION['class'] = $s_class;
		$s_school = filter_input(INPUT_POST, 's_school', FILTER_SANITIZE_STRING);
		$e_mail = filter_input(INPUT_POST, 'e_mail', FILTER_SANITIZE_STRING);
		$s_phone = filter_input(INPUT_POST, 's_phone', FILTER_SANITIZE_STRING);
		$s_gender = filter_input(INPUT_POST, 's_gender', FILTER_SANITIZE_STRING);
		$s_dob = filter_input(INPUT_POST, 's_dob', FILTER_SANITIZE_STRING);
		$s_session = filter_input(INPUT_POST, 's_session', FILTER_SANITIZE_STRING);
		$s_category = filter_input(INPUT_POST, 's_category', FILTER_SANITIZE_STRING);
		$s_state = filter_input(INPUT_POST, 's_state', FILTER_SANITIZE_STRING);
		$s_nation = filter_input(INPUT_POST, 's_nation', FILTER_SANITIZE_STRING);
		$s_address = filter_input(INPUT_POST, 's_address', FILTER_SANITIZE_STRING);
							//$s_photo = @$_POST['s_photo'];
				
		
		$query = "INSERT INTO student_users(regist_no, firstname, midname, lastname, password, class, school, email, phone, gender, dob, 
											session, category, state, nationality, picture, address, role) 
		   VALUES('{$stud_id}', '{$f_name}', '{$m_name}', '{$l_name}', '{$p_word}', '{$s_class}', '{$s_school}', '{$e_mail}', '{$s_phone}',                 '{$s_gender}', '{$s_dob}', '{$s_session}', '{$s_category}', '{$s_state}', '{$s_nation}', 'pix1.jpg', '{$s_address}', 
				  'Student')";
				  if ($conn->query($query) === TRUE)
				  {
					  $class_table = $s_class;    $class_table .= '_student_users';
						$query_class = "INSERT INTO $class_table(regist_no, firstname, midname, lastname, password, class, school, email, phone, gender, dob, session, category, state, nationality, picture, address, role) 
			   			VALUES('{$stud_id}', '{$f_name}', '{$m_name}', '{$l_name}', '{$p_word}', '{$s_class}', '{$s_school}', '{$e_mail}', '{$s_phone}', '{$s_gender}', '{$s_dob}', '{$s_session}', '{$s_category}', '{$s_state}', '{$s_nation}', 'pix1.jpg',                        '{$s_address}', 'Student')";
 
						if ($conn->query($query_class) === TRUE)
					  	{
							$result_table = $s_class;    $result_table .= '_results';
							$query_rest1 = "INSERT INTO $result_table(regist_no, firstname, lastname, password, class, term, session, gender, photo, cate) 
							VALUES('{$stud_id}', '{$f_name}', '{$l_name}', '{$p_word}', '{$s_class}', 'first', '{$s_session}', '{$s_gender}', 'pix', '{$s_category}')";
  
							if($conn->query($query_rest1) === TRUE)
							{
								$query_rest2 = "INSERT INTO $result_table(regist_no, firstname, lastname, password, class, term, session, gender, photo, cate) 
								VALUES('{$stud_id}', '{$f_name}', '{$l_name}', '{$p_word}', '{$s_class}', 'second', '{$s_session}', '{$s_gender}', 'pix', '{$s_category}')";
;  
								if ($conn->query($query_rest2) === TRUE)
								{
									$query_rest3 = "INSERT INTO $result_table(regist_no, firstname, lastname, password, class, term, session, gender, photo, cate) 
									VALUES('{$stud_id}', '{$f_name}', '{$l_name}', '{$p_word}', '{$s_class}', 'third', '{$s_session}', '{$s_gender}', 'pix', '{$s_category}')";
 
									if ($conn->query($query_rest3) === TRUE)
									{
										$new_stud_msg = "studCreated"; 		// echo ' Success ';
									}	else {	 $new_stud_msg = "Error " . ' Third Term Failed ';  }
								}	else {	 $new_stud_msg = "Error " .' Second Term Failed ';  }		
							}	else {	 $new_stud_msg = "Error " . ' First Term Failed ';   }		// echo 
						}	else {	 $new_stud_msg = "Error " .' Failed Class ';  }		// echo 	
 
				  }	else {	 $new_stud_msg = "General Error " ; }
				  
				return $new_stud_msg;
	}
	
	function create_entr_new_student($new_stud_msg)
	{
		$conn = db_connect();
		$new_stud_msg = "";	
		$stud_id = filter_input(INPUT_POST, 'stud_id', FILTER_SANITIZE_STRING);   $_SESSION['regist_no'] = $stud_id;
		$f_name = filter_input(INPUT_POST, 'f_name', FILTER_SANITIZE_STRING);
		$l_name = filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING);
		$s_class = filter_input(INPUT_POST, 's_class', FILTER_SANITIZE_STRING);  $_SESSION['class'] = $s_class;
		$e_mail = filter_input(INPUT_POST, 'e_mail', FILTER_SANITIZE_STRING);
		$s_phone = filter_input(INPUT_POST, 's_phone', FILTER_SANITIZE_STRING);
		$s_gender = filter_input(INPUT_POST, 's_gender', FILTER_SANITIZE_STRING);
		$s_dob = filter_input(INPUT_POST, 's_dob', FILTER_SANITIZE_STRING);
		$s_session = filter_input(INPUT_POST, 's_session', FILTER_SANITIZE_STRING);
		$s_state = filter_input(INPUT_POST, 's_state', FILTER_SANITIZE_STRING);
		$s_nation = filter_input(INPUT_POST, 's_nation', FILTER_SANITIZE_STRING);
							//$s_photo = @$_POST['s_photo'];
				
		
		$query = "INSERT INTO entrance_users(regist_no, firstname, lastname, class, email, phone, gender, dob, session, state, nationality, picture, role) 
		   VALUES('{$stud_id}', '{$f_name}', '{$l_name}', '{$s_class}', '{$e_mail}', '{$s_phone}', '{$s_gender}', '{$s_dob}', '{$s_session}', '{$s_state}', '{$s_nation}', 'pix1.jpg', 'Entrance Student')";
				if ($conn->query($query) === TRUE)
				{
					$query_rest = "INSERT INTO entrance_results(regist_no, firstname, lastname, password, class, term, session, gender, photo, cate) 
					VALUES('{$stud_id}', '{$f_name}', '{$l_name}', '', '{$s_class}', '', '{$s_session}', '{$s_gender}', 'pix', '')";

					if($conn->query($query_rest) === TRUE)
					{
					    $new_stud_msg = "studCreated"; 		// echo ' Success ';					  
				    }	
					else {	 $new_stud_msg = "Result Table Error ".mysqli_error($conn); }
				}  
				else {	 $new_stud_msg = "Entrance Table Error ".mysqli_error($conn); }
				return $new_stud_msg;
	}
	
	function create_new_primary_student($new_stud_msg)
	{
		$conn = db_connect();
		$new_stud_msg = "";	
		$stud_id = @mysqli_real_escape_string($conn, $_POST['stud_id']);  
			$_SESSION['regist_no'] = $stud_id;
		$f_name = @mysqli_real_escape_string($conn, $_POST['f_name']);
		$m_name = @mysqli_real_escape_string($conn, $_POST['m_name']);
		$l_name = @mysqli_real_escape_string($conn, $_POST['l_name']);
		$p_word = @mysqli_real_escape_string($conn, $_POST['p_word']);
		$s_class = @mysqli_real_escape_string($conn, $_POST['s_class']);  
			$_SESSION['class'] = $s_class;
		$s_school = @mysqli_real_escape_string($conn, $_POST['s_school']);
		$e_mail = @mysqli_real_escape_string($conn, $_POST['e_mail']);
		$s_phone = @mysqli_real_escape_string($conn, $_POST['s_phone']);
		$s_gender = @mysqli_real_escape_string($conn, $_POST['s_gender']);
		$s_dob = @mysqli_real_escape_string($conn, $_POST['s_dob']);
		$s_state = @mysqli_real_escape_string($conn, $_POST['s_state']);
		$s_nation = @mysqli_real_escape_string($conn, $_POST['s_nation']);
		$s_session = @mysqli_real_escape_string($conn, $_POST['s_session']);
		$s_category = @mysqli_real_escape_string($conn, $_POST['s_category']);
		//$s_photo = @$_POST['s_photo'];
		$s_address = @mysqli_real_escape_string($conn, $_POST['s_address']);		
		
		$query = "INSERT INTO primary_student_users(regist_no, firstname, midname, lastname, password, class, school, email, phone, gender, dob, 
											session, category, state, nationality, picture, address, role) 
		   VALUES('{$stud_id}', '{$f_name}', '{$m_name}', '{$l_name}', '{$p_word}', '{$s_class}', '{$s_school}', '{$e_mail}', '{$s_phone}',                 '{$s_gender}', '{$s_dob}', '{$s_session}', '{$s_category}', '{$s_state}', '{$s_nation}', 'pix1.jpg', '{$s_address}', 
				  'Student')";
				  $result = $conn->query($query);
				  if($result)
				  {
					  $class_table = $s_class;    $class_table .= '_student_users';
						$query_class = "INSERT INTO $class_table(regist_no, firstname, midname, lastname, password, class, school, email,                    	phone, gender, dob, session, category, state, nationality, picture, address, role) 
			   			VALUES('{$stud_id}', '{$f_name}', '{$m_name}', '{$l_name}', '{$p_word}', '{$s_class}', '{$s_school}', '{$e_mail}', 		                        '{$s_phone}', '{$s_gender}', '{$s_dob}', '{$s_session}', '{$s_category}', '{$s_state}', '{$s_nation}', 'pix1.jpg',                        '{$s_address}', 'Student')";
				        $result_class = $conn->query($query_class);  
						if($result_class)
							{
								$new_stud_msg = "studCreated"; 		// echo ' Success ';
							}	
						else {	 $new_stud_msg = "Error " . mysqli_error();   }		// echo ' Failed Class ';	
 
				  }	else {	 $new_stud_msg = "Error " . mysqli_error();   }
				  
				return $new_stud_msg;
	}
	
	function upload_student_photo($regist_no, $class, $pic_path)
	{
		$class_user = $class .'_student_users';
		$class_result = $class .'_results';
		$conn = db_connect();
		$query = "UPDATE student_users SET picture = '{$pic_path}' WHERE regist_no = '{$regist_no}'";

		 if ($conn->query($query) === TRUE)
		{
			$query2 = "UPDATE $class_user SET picture = '{$pic_path}' WHERE regist_no = '{$regist_no}'";

			 if ($conn->query($query2) === TRUE)
			{
				$query3 = "UPDATE $class_result SET	photo = '{$pic_path}' WHERE regist_no = '{$regist_no}'";
				if ($conn->query($query3) === TRUE)	 {	 $upload_msg = 'uploaded';	 } else { $upload_msg = 'Result Failed '; }
			}
			else { $upload_msg = 'Class Failed '; }
		}
		else { $upload_msg = ' Student Failed '; }
		
		return $upload_msg;
	}
	
	function upload_entrance_student_photo($regist_no, $class, $pic_path)
	{
		$conn = db_connect();
		$query = "UPDATE entrance_users SET picture = '{$pic_path}' WHERE regist_no = '{$regist_no}'";

		 if ($conn->query($query) === TRUE)
		{
			 $upload_msg = 'uploaded';	
		}
		else {  $upload_msg = mysqli_error($conn);  }
		
		return $upload_msg;
	}
	
	function upload_primary_student_photo($regist_no, $class, $pic_path)
	{
		$class_user = $class .'_student_users';
		$class_result = $class .'_results';
		$conn = db_connect();
		$query = "UPDATE student_users SET picture = '{$pic_path}' WHERE regist_no = '{$regist_no}'";
		$result = $conn->query($query);
		if($result->num_rows == 1)
		{
			$query2 = "UPDATE $class_user SET picture = '{$pic_path}' WHERE regist_no = '{$regist_no}'";
			$result2 = $conn->query($query2);
			if($result2->num_rows == 1)
			{
				$upload_msg = 'uploaded';
			}
			else { $upload_msg = 'Class Failed '. mysqli_error(); }
		}
		else { $upload_msg = ' Student Failed '. mysqli_error(); }
		
		return $upload_msg;
	}
	
	function upload_staff_photo($staff_id, $pic_path)
	{
		$conn = db_connect();
		$query = "UPDATE staff_users SET photo = '{$pic_path}' WHERE staff_id = '{$staff_id}'";
		if ($conn->query($query) === TRUE)	{	$upload_msg = 'uploaded';	}	else { $upload_msg = ' Staff Failed '; }
		return $upload_msg;
	}
	
	function update_student()
	{
		$conn = db_connect();
		$stud_id = filter_input(INPUT_POST, 'stud_id', FILTER_SANITIZE_STRING);  
			$_SESSION['regist_no'] = $stud_id;
		$f_name = filter_input(INPUT_POST, 'f_name', FILTER_SANITIZE_STRING);
		$m_name = filter_input(INPUT_POST, 'm_name', FILTER_SANITIZE_STRING);
		$l_name = filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING);
		$p_word = filter_input(INPUT_POST, 'p_word', FILTER_SANITIZE_STRING);
		$s_class = filter_input(INPUT_POST, 's_class', FILTER_SANITIZE_STRING); 
			$_SESSION['class'] = $s_class;
		$s_school = filter_input(INPUT_POST, 's_school', FILTER_SANITIZE_STRING);
		$e_mail = filter_input(INPUT_POST, 'e_mail', FILTER_SANITIZE_STRING);
		$s_phone = filter_input(INPUT_POST, 's_phone', FILTER_SANITIZE_STRING);
		$s_gender = filter_input(INPUT_POST, 's_gender', FILTER_SANITIZE_STRING);
		$s_dob = filter_input(INPUT_POST, 's_dob', FILTER_SANITIZE_STRING);
		$s_session = filter_input(INPUT_POST, 's_session', FILTER_SANITIZE_STRING);
		$s_category = filter_input(INPUT_POST, 's_category', FILTER_SANITIZE_STRING);
		$s_state = filter_input(INPUT_POST, 's_state', FILTER_SANITIZE_STRING);
		$s_nation = filter_input(INPUT_POST, 's_nation', FILTER_SANITIZE_STRING);
		$s_address = filter_input(INPUT_POST, 's_address', FILTER_SANITIZE_STRING);
		//$s_photo = @$_POST['s_photo'];

		//UPDATING STUDENT DETAILS IN STUDENT USERS TABLE
		$query = "UPDATE student_users SET   
				 firstname = '{$f_name}', midname = '{$m_name}', lastname = '{$l_name}', password = '{$p_word}',
				 class = '{$s_class}', school = '{$s_school}', email = '{$e_mail}', phone = '{$s_phone}',
				 gender = '{$s_gender}', dob = '{$s_dob}', session = '{$s_session}', category = '{$s_category}',
				 state = '{$s_state}', nationality = '{$s_nation}', address = '{$s_address}'
				 WHERE regist_no = '{$stud_id}'";

				 if ($conn->query($query) === TRUE)
				 {		//UPDATING STUDENT DETAILS IN STUDENT CLASS USERS TABLE
					 $table_user = $s_class . '_student_users';
					 $query_cu = "UPDATE $table_user SET
					 firstname = '{$f_name}', midname = '{$m_name}', lastname = '{$l_name}', password = '{$p_word}',
					 class = '{$s_class}', school = '{$s_school}', email = '{$e_mail}', phone = '{$s_phone}',
					 gender = '{$s_gender}', dob = '{$s_dob}', session = '{$s_session}', category = '{$s_category}',
					 state = '{$s_state}', nationality = '{$s_nation}', address = '{$s_address}'
					 WHERE regist_no = '{$stud_id}'";

					 if ($conn->query($query_cu) === TRUE)
					 {		//UPDATING STUDENT DETAILS IN CLASS RESULTS TABLE
					 
						 $table_rest = $s_class . '_results';
						 $query_cr = "UPDATE $table_rest SET
						 firstname = '{$f_name}', lastname = '{$l_name}', password = '{$p_word}', class = '{$s_class}',
						 gender = '{$s_gender}', session = '{$s_session}', cate = '{$s_category}' WHERE regist_no = '{$stud_id}'";

						 if ($conn->query($query_cr) === TRUE)
						 {
							 $upd_stud_msg = "updated";
						 }
						 else { $upd_stud_msg = 'Fail To Update Result Table'; }
					 }
					 else { $upd_stud_msg = 'Fail To Update class Table'; }
				 }
				 else { $upd_stud_msg = 'Fail To Update user Table'; }
		
		return $upd_stud_msg;
	}
	
	function update_primary_student()
	{
		$conn = db_connect();
		$stud_id = @mysqli_real_escape_string($conn, $_POST['stud_id']);
		$f_name = @mysqli_real_escape_string($conn, $_POST['f_name']);
		$m_name = @mysqli_real_escape_string($conn, $_POST['m_name']);
		$l_name = @mysqli_real_escape_string($conn, $_POST['l_name']);
		$p_word = @mysqli_real_escape_string($conn, $_POST['p_word']);
		$s_class = @mysqli_real_escape_string($conn, $_POST['s_class']);
		$s_school = @mysqli_real_escape_string($conn, $_POST['s_school']);
		$e_mail = @mysqli_real_escape_string($conn, $_POST['e_mail']);
		$s_phone = @mysqli_real_escape_string($conn, $_POST['s_phone']);
		$s_gender = @mysqli_real_escape_string($conn, $_POST['s_gender']);
		$s_dob = @mysqli_real_escape_string($conn, $_POST['s_dob']);
		$s_state = @mysqli_real_escape_string($conn, $_POST['s_state']);
		$s_nation = @mysqli_real_escape_string($conn, $_POST['s_nation']);
		$s_session = @mysqli_real_escape_string($conn, $_POST['s_session']);
		$s_category = @mysqli_real_escape_string($conn, $_POST['s_category']);
		//$s_photo = @$_POST['s_photo'];
		$s_address = @mysqli_real_escape_string($conn, $_POST['s_address']);
		//UPDATING STUDENT DETAILS IN STUDENT USERS TABLE
		$query = "UPDATE primary_student_users SET   
				 firstname = '{$f_name}', midname = '{$m_name}', lastname = '{$l_name}', password = '{$p_word}',
				 class = '{$s_class}', school = '{$s_school}', email = '{$e_mail}', phone = '{$s_phone}',
				 gender = '{$s_gender}', dob = '{$s_dob}', session = '{$s_session}', category = '{$s_category}',
				 state = '{$s_state}', nationality = '{$s_nation}', picture = 'pix1.jpg', address = '{$s_address}'
				 WHERE regist_no = '{$stud_id}'";
				 $result = $conn->query($query);
				 if($result)
				 {		//UPDATING STUDENT DETAILS IN STUDENT CLASS USERS TABLE
					 $table_user = $s_class . '_student_users';
					 $query_cu = "UPDATE $table_user SET
					 firstname = '{$f_name}', midname = '{$m_name}', lastname = '{$l_name}', password = '{$p_word}',
					 class = '{$s_class}', school = '{$s_school}', email = '{$e_mail}', phone = '{$s_phone}',
					 gender = '{$s_gender}', dob = '{$s_dob}', session = '{$s_session}', category = '{$s_category}',
					 state = '{$s_state}', nationality = '{$s_nation}', picture = 'pix1.jpg', address = '{$s_address}'
					 WHERE regist_no = '{$stud_id}'";
					 $result_cu = $conn->query($query_cu);
					 if($result_cu)
					 {
						$upd_stud_msg = "updated";
					 }
					 
				 }
				 else { $upd_stud_msg = mysqli_error(); }
		
		return $upd_stud_msg;
	}
	
	function create_new_staff($new_staff_msg)
	{
		$conn = db_connect();
		$new_staff_msg = "";
		$staff_id = filter_input(INPUT_POST, 'staff_id', FILTER_SANITIZE_STRING);  
			$_SESSION['staff_id'] = $staff_id;
		$f_name = filter_input(INPUT_POST, 'f_name', FILTER_SANITIZE_STRING);		
		$l_name = filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING);
		$p_word = filter_input(INPUT_POST, 'p_word', FILTER_SANITIZE_STRING);
		$e_mail = filter_input(INPUT_POST, 'e_mail', FILTER_SANITIZE_STRING);
		$s_phone = filter_input(INPUT_POST, 's_phone', FILTER_SANITIZE_STRING);
		$s_gender = filter_input(INPUT_POST, 's_gender', FILTER_SANITIZE_STRING);
		$s_doj = filter_input(INPUT_POST, 's_doj', FILTER_SANITIZE_STRING);
		$position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING);
		$s_state = filter_input(INPUT_POST, 's_state', FILTER_SANITIZE_STRING);
		$s_nation = filter_input(INPUT_POST, 's_nation', FILTER_SANITIZE_STRING);
		$s_address = filter_input(INPUT_POST, 's_address', FILTER_SANITIZE_STRING);
		$subj1 = filter_input(INPUT_POST, 'subj1', FILTER_SANITIZE_STRING);
		$subj2 = filter_input(INPUT_POST, 'subj2', FILTER_SANITIZE_STRING);
		$subj3 = filter_input(INPUT_POST, 'subj3', FILTER_SANITIZE_STRING);
		$subj4 = filter_input(INPUT_POST, 'subj4', FILTER_SANITIZE_STRING);
		$subj5 = filter_input(INPUT_POST, 'subj5', FILTER_SANITIZE_STRING);
		
		
		$query = "INSERT INTO staff_users(staff_id, firstname, lastname, position, password, email, phone, gender, doj,	state, nationality, photo, address, subject_1, subject_2, subject_3, subject_4, subject_5, role) 
		   VALUES('{$staff_id}', '{$f_name}', '{$l_name}', '{$position}', '{$p_word}', '{$e_mail}', '{$s_phone}', '{$s_gender}', '{$s_doj}', '{$s_state}', '{$s_nation}', 'pix1.jpg', '{$s_address}', '{$subj1}', '{$subj2}', '{$subj3}',  '{$subj4}',  '{$subj5}', 'Staff')";

			  if ($conn->query($query) === TRUE)
			  {
				 $new_staff_msg = "staffCreated"; 
			  }
			  else { $new_staff_msg = "Error " . ' Fail To Create Staff';  }
			return $new_staff_msg;
	}
	
	function update_staff()
	{
		$conn = db_connect();
		$staff_id = filter_input(INPUT_POST, 'staff_id', FILTER_SANITIZE_STRING);  
			$_SESSION['staff_id'] = $staff_id;
		$f_name = filter_input(INPUT_POST, 'f_name', FILTER_SANITIZE_STRING);		
		$l_name = filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING);
		$p_word = filter_input(INPUT_POST, 'p_word', FILTER_SANITIZE_STRING);
		$e_mail = filter_input(INPUT_POST, 'e_mail', FILTER_SANITIZE_STRING); 		
		$s_phone = filter_input(INPUT_POST, 's_phone', FILTER_SANITIZE_STRING);
		$s_gender = filter_input(INPUT_POST, 's_gender', FILTER_SANITIZE_STRING);
		$s_doj = filter_input(INPUT_POST, 's_doj', FILTER_SANITIZE_STRING);
		$position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING);
		$s_state = filter_input(INPUT_POST, 's_state', FILTER_SANITIZE_STRING);
		$s_nation = filter_input(INPUT_POST, 's_nation', FILTER_SANITIZE_STRING);
		$s_address = filter_input(INPUT_POST, 's_address', FILTER_SANITIZE_STRING);
		$s_subj1 = filter_input(INPUT_POST, 'subj1', FILTER_SANITIZE_STRING);
		$s_subj2 = filter_input(INPUT_POST, 'subj2', FILTER_SANITIZE_STRING);
		$s_subj3 = filter_input(INPUT_POST, 'subj3', FILTER_SANITIZE_STRING);
		$s_subj4 = filter_input(INPUT_POST, 'subj4', FILTER_SANITIZE_STRING);
		$s_subj5 = filter_input(INPUT_POST, 'subj5', FILTER_SANITIZE_STRING);
	
		$query = "UPDATE staff_users SET
				 firstname = '{$f_name}', lastname = '{$l_name}', position = '{$position}', password = '{$p_word}', email = '{$e_mail}', 
				 phone = '{$s_phone}', gender = '{$s_gender}', doj = '{$s_doj}', state = '{$s_state}', nationality = '{$s_nation}', 
				 address = '{$s_address}', subject_1 = '{$s_subj1}', subject_2 = '{$s_subj2}', subject_3 = '{$s_subj3}', 
				 subject_4 = '{$s_subj4}', subject_5 = '{$s_subj5}'
				 WHERE staff_id = '{$staff_id}'";

				 if ($conn->query($query) === TRUE)
				 {
					 $upd_staff_msg = "updated";
				 }
				 else { $upd_staff_msg = 'Failed To Update Staff Record'; }
		
		return $upd_staff_msg;
	}
	
	function view_student()
	{
		$conn = db_connect();
		$v_class = filter_input(INPUT_POST, 'view_class', FILTER_SANITIZE_STRING); 
		$stud_class_tbl = $v_class;
		$stud_class_tbl .= '_student_users';
		$query = "SELECT * FROM $stud_class_tbl WHERE status = 'Active'";
		$result = $conn->query($query);
		$conn->close();
		return $result;		
	}
	
	function view_entrance_student()
	{
		$conn = db_connect();
		$v_class = filter_input(INPUT_POST, 'view_class', FILTER_SANITIZE_STRING); 
		$query = "SELECT * FROM entrance_users";
		$result = $conn->query($query);
		$conn->close();
		return $result;		
	}
	
	function view_result()
	{
		$conn = db_connect();
		$r_class = filter_input(INPUT_POST, 'view_class', FILTER_SANITIZE_STRING); 
		$r_term = filter_input(INPUT_POST, 'view_term', FILTER_SANITIZE_STRING); 
		$rest_class_tbl = $r_class;
		$rest_class_tbl .= '_results';
		$query = "SELECT * FROM $rest_class_tbl WHERE term = '{$r_term}'";
		$result = $conn->query($query);
		$conn->close();
		return $result;		
	}	
	
	function student_profile($id)
	{
		$conn = db_connect();
		$query = "SELECT * FROM student_users WHERE regist_no = '{$id}'";
		$result = $conn->query($query);
		$conn->close();
		
		return $result;
	}
	
	function staff_profile($id)
	{
		$conn = db_connect();
		$query = "SELECT * FROM staff_users WHERE staff_id = '{$id}'";
		$result = $conn->query($query);
		$conn->close();
		
		return $result;
	}
	
	function view_staff()
	{
		$conn = db_connect();
		$query = "SELECT * FROM staff_users WHERE status = 'Active'";
		$result = $conn->query($query);
		$conn->close();
		return $result;
	}	
	
	function create_new_question($new_quest_msg)
	{
		$conn = db_connect();
		//$quest_no = @mysqli_real_escape_string($conn, $_POST['quest_no']);
		$q_subj = filter_input(INPUT_POST, 'q_subj', FILTER_SANITIZE_STRING);
		$opt_A = filter_input(INPUT_POST, 'opt_A', FILTER_SANITIZE_STRING);
		$opt_B = filter_input(INPUT_POST, 'opt_B', FILTER_SANITIZE_STRING);
		$opt_C = filter_input(INPUT_POST, 'opt_C', FILTER_SANITIZE_STRING);
		$opt_D = filter_input(INPUT_POST, 'opt_D', FILTER_SANITIZE_STRING);
		$q_class = filter_input(INPUT_POST, 'q_class', FILTER_SANITIZE_STRING);
		$q_term = filter_input(INPUT_POST, 'q_term', FILTER_SANITIZE_STRING);
		$q_quest = filter_input(INPUT_POST, 'q_quest', FILTER_SANITIZE_STRING);
		$q_answer = filter_input(INPUT_POST, 'q_answer', FILTER_SANITIZE_STRING);

		$quest_table = 'subject_'.$q_subj;	
		
		
		$query = "INSERT INTO $quest_table(subject, optionA, optionB, optionC, optionD, class, term, question, answer) 
		VALUES('{$q_subj}', '{$opt_A}', '{$opt_B}', '{$opt_C}', '{$opt_D}', '{$q_class}', '{$q_term}', '{$q_quest}', '{$q_answer}')";

			if ($conn->query($query) === TRUE)
			{
				$new_quest_msg = "questCreated"; 
			}
			else 
			{ 
				$new_quest_msg = "Error : Could Not Create New Question"; 
			}
		return $new_quest_msg;
	}
	
	function create_new_subject($new_subj_msg)
	{
		$conn = db_connect();
		//$quest_no = @mysqli_real_escape_string($conn, $_POST['quest_no']);
		$subjects = filter_input(INPUT_POST, 'subjects', FILTER_SANITIZE_STRING);
		$s_class = filter_input(INPUT_POST, 's_class', FILTER_SANITIZE_STRING);		
		
		//getting the total number of subjects already created for a class JUNIOR
		$query = "SELECT * FROM subjects WHERE class = '{$s_class}' OR class = 'Junior Secondary And Senior Secondary'";
		$result = $conn->query($query);
		if($result->num_rows >= 0)	{	$count = mysqli_num_rows($result);	++$count;   }

		$query2 = "INSERT INTO subjects(subjects, value, class, subj_no) 
		VALUES('{$subjects}', '{$subjects}', '{$s_class}', '{$count}')";

			if ($conn->query($query2) === TRUE)
			{
				$new_subj_msg = "subjCreated"; 
			}
			else 
			{ 
				$new_subj_msg = "Error : Could Not Create New Subject"; 
			}
		return $new_subj_msg;
	}
	
	function update_subject()
	{
		$conn = db_connect();
		$subject_id = filter_input(INPUT_POST, 'subject_id', FILTER_SANITIZE_STRING);
		$subjects = filter_input(INPUT_POST, 'subjects', FILTER_SANITIZE_STRING);
		$value = filter_input(INPUT_POST, 'value', FILTER_SANITIZE_STRING);
		$class = filter_input(INPUT_POST, 'class', FILTER_SANITIZE_STRING);

		$query = "UPDATE subjects SET
				 subjects = '{$subjects}', value = '{$value}', class = '{$class}'  WHERE subject_id = '{$subject_id}'";

				 if ($conn->query($query) === TRUE)
				 {
					 $upd_subj_msg = "updated";
				 }
				 else { $upd_subj_msg = ' Fail To Update'; }
		
		return $upd_subj_msg;
	}
	
	function view_subjects()
	{
		$conn = db_connect();
		$query = "SELECT * FROM subjects";
		$result = $conn->query($query);
		$conn->close();
		return $result;		
	}
	
	function get_questions($subject, $class, $term, $rad_q_no)
	{
		$conn = db_connect();
		
		//getting the subj number
		$query = "SELECT * FROM subjects WHERE subjects = '{$subject}'";
		$result = $conn->query($query);
		if($result->num_rows == 1)
		{
			$sub_no = $result->fetch_assoc();    $subj_no = $sub_no['subj_no'];
		}
					
		$table = 'subject_' .$subj_no;
		$query2 = "SELECT * FROM $table WHERE question_no = $rad_q_no AND term = '{$term}' AND class = '{$class}'";
		$result2 = $conn->query($query2);
		if($result2->num_rows == 1)
		{
			$quest = $result2->fetch_assoc();
		}
		else
		{
			$query = ' '.mysqli_error($conn);
		}

		return $quest;
		$conn->close();
	}
	
	function get_entrance_questions($subject, $class, $term, $rad_q_no)
	{
		$conn = db_connect();

			$query3 = "SELECT * FROM entrance_questions WHERE question_no = '{$rad_q_no}' ";
			$result3 = $conn->query($query3);
			if($result3->num_rows == 1)
			{
				$quest = $result3->fetch_assoc();
			}
			else
			{
				$query = ' '.mysqli_error($conn);
			}

		

		return $quest;
		$conn->close();
	}
	
	function get_question_term($subject, $class, $q_no)
	{
		$conn = db_connect();
		$table = $subject .'_' .$class;
		$query = "SELECT * FROM $table WHERE question_no = $rad_q_no";
		$result = $conn->query($query);
		if($result->num_rows == 1)
			{
				$questT = $result->fetch_assoc();
			}
			else
			{
				$questT = ' Found No Question';
			}
		return $questT;
	}
	
	function update_question()
	{
		$conn = db_connect();
		$quest_no = filter_input(INPUT_POST, 'quest_no', FILTER_SANITIZE_STRING);
		$q_subj = filter_input(INPUT_POST, 'q_subj', FILTER_SANITIZE_STRING);
		$opt_A = filter_input(INPUT_POST, 'opt_A', FILTER_SANITIZE_STRING);
		$opt_B = filter_input(INPUT_POST, 'opt_B', FILTER_SANITIZE_STRING);
		$opt_C = filter_input(INPUT_POST, 'opt_C', FILTER_SANITIZE_STRING);
		$opt_D = filter_input(INPUT_POST, 'opt_D', FILTER_SANITIZE_STRING);
		$q_class = filter_input(INPUT_POST, 'q_class', FILTER_SANITIZE_STRING);
		$q_term = filter_input(INPUT_POST, 'q_term', FILTER_SANITIZE_STRING);
		$q_quest = filter_input(INPUT_POST, 'q_quest', FILTER_SANITIZE_STRING);
		$q_answer = filter_input(INPUT_POST, 'q_answer', FILTER_SANITIZE_STRING);
		
		//retrieving question ID

			$query2 = "SELECT * FROM subjects WHERE subjects = '{$q_subj}'";
			$result2 = $conn->query($query2);
			if(@$result2->num_rows > 0) { $rec = $result2->fetch_assoc(); $s_no = $rec['subj_no']; }
		
		$table = 'subject_' .$s_no;
		$query = "UPDATE $table SET
				 subject = '{$q_subj}', class = '{$q_class}', term = '{$q_term}', optionA = '{$opt_A}', optionB = '{$opt_B}', 
				 optionC = '{$opt_C}', optionD = '{$opt_D}', answer = '{$q_answer}', question = '{$q_quest}'
				 WHERE question_no = '{$quest_no}'";

				 if ($conn->query($query) === TRUE)
				 {
					 $upd_quest_msg = "updated";
				 }
				 else { $upd_quest_msg = ' Fail To Update'; }
		
		return $upd_quest_msg;
	}
	
	function view_question()
	{
		$conn = db_connect();
		$q_class = filter_input(INPUT_POST, 'view_class', FILTER_SANITIZE_STRING); 
		$q_subj = filter_input(INPUT_POST, 'view_subj', FILTER_SANITIZE_STRING); 
		$question_tbl = 'subject';
		$question_tbl .= '_'.$q_subj;
		$query = "SELECT * FROM $question_tbl";
		$result = $conn->query($query);
		$conn->close();
		return $result;		
	}
	
	function view_pin()
	{
		$conn = db_connect();
		$q_class = filter_input(INPUT_POST, 'view_class', FILTER_SANITIZE_STRING); 
		$q_subj = filter_input(INPUT_POST, 'view_subj', FILTER_SANITIZE_STRING); 

		$query = "SELECT * FROM exam_code WHERE subject = '{$q_subj}'";
		$result = $conn->query($query);
		$conn->close();
		return $result;		
	}
	
	function get_number_of_rec($table_name)
	{
		$conn = db_connect();
		$query = "SELECT * FROM $table_name";
		$result = @$conn->query($query);
		$total = mysqli_num_rows($result);
		return $total;
	}
	
	function get_no_of_questions($table, $term)
	{
		$conn = db_connect();
		$query = "SELECT * FROM $table";
		$result = @$conn->query($query);
		return $total;
	}
	
	function get_first_value($table_name, $column, $term)
	{
		$conn = db_connect();
		if($table_name == "student_users")
		{	$column = 'regist_no';	}    else { $column = 'question_no'; }
		$query = "SELECT $column FROM $table_name WHERE term = '{$term}' limit 1 ";
		$result = $conn->query($query);
		if($result->num_rows == 1)
			{
				$found = $result->fetch_assoc();
				$first_no = $found[$column];
			}
		return $first_no;
	}
	
	function get_last_value($table_name, $column, $term)
	{
		$conn = db_connect();
		if($table_name == "student_users")
		{	$column = 'regist_no';	}    else { $column = 'question_no'; }
		$query = "SELECT $column FROM $table_name WHERE term = '{$term}' ORDER BY $column DESC LIMIT 1 ";
		$result = $conn->query($query);
		if($result->num_rows == 1)
			{
				$found = $result->fetch_assoc();
				$last_no = $found[$column];
			}
		return $last_no;
	}
	
	function get_first_num($table_name, $column)
	{
		$conn = db_connect();
		if($table_name == "student_users")
		{	$column = 'regist_no';	}    else { $column = 'question_no'; }
		$query = "SELECT $column FROM $table_name limit 1 ";
		$result = $conn->query($query);
		if($result->num_rows == 1)
			{
				$found = $result->fetch_assoc();
				$first_no = $found[$column];
			}
		return $first_no;
	}
	
	function get_last_num($table_name, $column)
	{
		$conn = db_connect();
		if($table_name == "student_users")
		{	$column = 'regist_no';	}    else { $column = 'question_no';   }
		$query = "SELECT $column FROM $table_name ORDER BY $column DESC LIMIT 1 ";
		$result = $conn->query($query);
		if($result->num_rows == 1)
			{
				$found = $result->fetch_assoc();
				$last_no = $found[$column];
			}
		return $last_no;
	}
	
	function update_result($subj, $class, $term, $regist_no, $score)
	{	
	$conn = db_connect();
	//SELECTING SUBJECT ID
	$querysub = "SELECT * FROM subjects WHERE subjects = '{$subj}'";
	$resultsub = $conn->query($querysub);
		if($resultsub->num_rows == 1)
			{
				$subj_id = $resultsub->fetch_assoc();
			}

	$sj_no = $subj_id['subj_no'];
	$class_rest_table = $class .'_results';
	$subject = 'subject_'.$sj_no;  //SETTING THE SUBJECT COLUMN
	$mark = 'mark_'.$sj_no;  //SETTING THE MARK COLUMN
	
	//SELECTING MARKS FROM THE RESULT TABLE FOR THAT TERM	
	$overall_qry = "SELECT * FROM $class_rest_table WHERE regist_no = '{$regist_no}' AND term = '{$term}'";
	$overall_rst = $conn->query($overall_qry);
		if($overall_rst->num_rows == 1)
		{
			$over = $overall_rst->fetch_assoc();
			//COMPUTING TOTAL MARKS TO GET OVERALL
			$overall += $over['mark_1'];    $overall += $over['mark_2'];   $overall += $over['mark_3'];  $overall += $over['mark_4'];
			$overall += $over['mark_5'];    $overall += $over['mark_6'];   $overall += $over['mark_7'];  $overall += $over['mark_8'];
			$overall += $over['mark_9'];    $overall += $over['mark_10'];   $overall += $over['mark_11'];  $overall += $over['mark_12'];
			$overall += $over['mark_13'];    $overall += $over['mark_14'];   $overall += $over['mark_15'];  $overall += $over['mark_16'];
			$overall += $over['mark_17'];    $overall += $over['mark_18'];   $overall += $over['mark_19'];  $overall += $over['mark_20'];

			//if(overall == 0){ $overall += $score; }
		}
	
	//UPDATING THE STUDENT RESULT
	$query = "UPDATE $class_rest_table SET $subject = '{$subj}',  class = '{$class}',  term = '{$term}',  $mark = '{$score}', overall = '{$overall}'
			  WHERE regist_no = '{$regist_no}' AND term = '{$term}' ";
			  $result = $conn->query($query); 
			  if($result) { $upd_rest_msg = 'updated'; } else { $upd_rest_msg = ' Fail To Update Result'; }
		
	return $upd_rest_msg;
	}
	
	function update_entrance_result($subj, $class, $term, $regist_no, $score)
	{	
	$conn = db_connect();	
	//UPDATING THE STUDENT ENTRANCE RESULT
	$query = "UPDATE entrance_results SET subject_1 = 'General Knowledge', class = '{$class}', term = '{$term}', mark_1 = '{$score}', overall = '{$score}'
			  WHERE regist_no = '{$regist_no}'";
			  if ($conn->query($query) === TRUE) 
			  { $upd_rest_msg = 'updated'; } else { $upd_rest_msg = ' Fail To Update Result'; }
		
	return $upd_rest_msg;
	}
	
	function compute_score($score)
	{
		/*for($i = 1; $i <= 25; $i++)
		{
			@$q .= $i;			@$quest .= $i;			@$quest .= 'Rad';			@$ans .= $i;
			$q = @$_REQUEST[$quest];	$answer = @$_SESSION[$ans];
			if($q == $answer)	{   $score = $score + 4;  }			else { $score = $score + 0; }
		}*/

		@$score;
		@$subject = @$_SESSION['subject'];
		@$class = @$_SESSION['class'];
		@$term = @$_SESSION['term'];
		@$regist_no = @$_SESSION['regist_no'];
		
		for($i = 1; $i <= 25; $i++)
		{
			$quest = 'quest'.$i;
			$questRad = 'quest'.$i.'Rad';
			$ans = 'ans'.$i;
			$quests = @$_REQUEST[$quest];	    $questck = @$_REQUEST[$questRad];    	$ans = @$_SESSION[$ans];
			if($questck == $ans) { $score = $score + 4; }		else { $score = $score - 0; }
		}

		//checking if for normal exams or entrance exams
		if($class == 'entrance'){   update_entrance_result($subject, $class, $term, $regist_no, $score);    }
		else				   {   update_result($subject, $class, $term, $regist_no, $score);    }
				
		
		return $score;	
	}

	function get_results($regist_no, $class, $term)
	{
		$conn = db_connect();
		$table = $class.'_results';
		$query = "SELECT * FROM class1_results WHERE regist_no = '{$regist_no}' AND class = '{$class}' AND term = '{$term}'";
		$result = $conn->query($query);
		if($result)
		{
			$found_rest = $result->fetch_assoc();	
		}
		else { $found_rest = mysqli_error(); }
		return $found_rest;	
	}
	
	function set_grade($mark)
	{
		//$grade;
			 if($mark <= 100 && $mark >= 80) { $grade = 'Distinction'; }
		else if($mark < 80 && $mark >= 60) { $grade = 'Very Good'; }
		else if($mark < 60 && $mark >= 50) { $grade = 'Credit'; }
		else if($mark < 50 && $mark >= 40) { $grade = 'Pass'; }
		else if($mark < 40 && $mark >= 1) { $grade = 'Fail'; }
		else if($mark == 0) { $grade = ''; }
		   else{ $grade = ''; }
		return $grade;
	}

	
	
	function generate_pin($class, $subject, $term, $exam_date, $createdby)
	{
		$exam_pin_msg;
		$conn = db_connect();
		
		@$cod = substr($subject, 0, 3);
		@$table_name = 'student_users';
		@$column = 'regist_no';
		@$class_stud_user = $class .'_student_users';
		$create = date("Y-m-d h:i:s");
		
		$query_f = "SELECT serial_no FROM $class_stud_user WHERE status = 'Active' limit 1 ";  //getting the first serial no for first student
		$result_f = $conn->query($query_f);
		if ($result_f->num_rows > 0)
			{
				$studf = $result_f->fetch_assoc();
				$first = $studf['serial_no'];
			}
			
		$query_l = "SELECT serial_no FROM $class_stud_user WHERE status = 'Active' ORDER BY serial_no DESC LIMIT 1 ";	//getting the last serial no for last student
		$result_l = $conn->query($query_l);
		if ($result_l->num_rows > 0)
			{
				$studl = $result_l->fetch_assoc();
				$last = $studl['serial_no'];
			}
			
		for($i = $first; $i <= $last; $i++) 
		{
		$PIN = substr($cod, 0, 3).'-'; 
		$PIN = strtoupper($PIN);
		$PIN = $PIN.rand(1000000, 9999999);
		$query = "SELECT * FROM $class_stud_user WHERE status = 'Active' WHERE serial_no = '{$i}' ";
		$result = $conn->query($query);
			if ($result->num_rows > 0)
			{
				$found = $result->fetch_assoc();
				$regist_no = $found['regist_no'];
				$query_2 = "INSERT INTO exam_code(subject, pin, date, class, term, regist_no, created, createdby)
							VALUES('{$subject}', '{$PIN}', '{$exam_date}', '{$class}', '{$term}', '{$regist_no}', '{$create}', '{$createdby}')";

					if ($conn->query($query_2) === TRUE)
					{
						$exam_pin_msg = 'generated';
					}
					else { $exam_pin_msg = ' PIN Not Generated'; }
			}
			else { $exam_pin_msg = ' Found No Student'; }
			
			
		}
	return $exam_pin_msg;
	
		
	}
	
	function generate_pin_one($class, $subject, $term, $reg_no, $exam_date, $createdby)
	{
		$exam_pin_one_msg;
		$conn = db_connect();
		
		@$reg_no = $reg_no;
		@$cod = substr($subject, 0, 3);
		@$column = 'regist_no';
		if($class == 'entrance'){ @$class_stud_user = $class .'_users'; } 
		else { @$class_stud_user = $class .'_student_users'; }

		$create = date("Y-m-d h:i:s");
		
		$PIN = substr($cod, 0, 3).'-'; 
		$PIN = strtoupper($PIN);
		$PIN = $PIN.rand(1000000, 9999999);
		$query_f = "SELECT * FROM $class_stud_user WHERE regist_no = '{$reg_no}' AND status = 'Active' ";
		$result_f = $conn->query($query_f);
			if(@$result_f->num_rows == 1)
			{
				$found = $result_f->fetch_assoc();
				$regist_no = $found['regist_no'];
				$query_2 = "INSERT INTO exam_code(subject, pin, date, class, term, regist_no, created, createdby)
							VALUES('{$subject}', '{$PIN}', '{$exam_date}', '{$class}', '{$term}', '{$regist_no}', '{$create}', '{$createdby}')";

					if ($conn->query($query_2) === TRUE)
					{
						$exam_pin_one_msg = 'generated_one';
					}
					else { $exam_pin_one_msg = ' Fail To Generate PIN'; }
			}
			else { $exam_pin_one_msg = ' Found No Student'; }

	return $exam_pin_one_msg;
	
		
	}
	
	function authenticate_exam_code($regist_no, $subject, $class, $term)
	{
		$conn = db_connect();
		$table = $class .'_code';
		$query = " 
		SELECT * FROM $table WHERE regist_no = '{$regist_no}' AND class = '{$class}' AND term = '{$term}' ";
		$result = $conn->query($result);
		if($result)
		{
			$code = $result->fetch_assoc();
		}
		else { $code = 'Error ' . mysqli_error(); }
		return $code;
	}

	function promote_students()
	{
	$conn = db_connect();			$prom_stud_msg;
	// DEFINING THE SPECIFIC CLASS TO WORK WITH
	$current_class = filter_input(INPUT_POST, 'q_class', FILTER_SANITIZE_STRING);
	$session = filter_input(INPUT_POST, 'q_sess', FILTER_SANITIZE_STRING);
	$createdby = filter_input(INPUT_POST, 'createdby', FILTER_SANITIZE_STRING);
	$current_sess = $session;
	
	$class_user = $current_class;
	$class_rest = $current_class;
	$class_rest = 'class1_results';			//
	$class_user .= '_student_users';
	$column = 'serial_no';
	$term = 'third';
				
		$query_num = "SELECT * FROM $class_rest WHERE term = 'third' limit 1 ";
		$result_num = $conn->query($query_num);
		if($result_num->num_rows == 1)
			{										 
				$found_f = $result_num->fetch_assoc();
				$first = $found_f['serial_no'];
			}											
			// GETTING THE FIRST SERAIL NUMBER OF STUDENTS IN THE CLASS 
		$query_last = "SELECT * FROM $class_rest WHERE term = 'third' ORDER BY $column DESC LIMIT 1 ";
		$result_last = $conn->query($query_last);
		if($result_last->num_rows == 1)
			{
				$found_l = $result_last->fetch_assoc();
				$last = $found_l['serial_no'];  
			}			// GETTING THE LAST SERAIL NUMBER OF STUDENTS IN THE CLASS
			
		  for($i = $first; $i <= $last; $i++)
		  {		// SELECTING ALL USERS FROM THE CLASS RESULT TABLE TO BE PROMOTED USING A FOR LOOP
			$pro_select = "SELECT * FROM $class_rest WHERE serial_no = '{$i}' AND term = 'third'";
			$pro_result = $conn->query($pro_select);
			if($pro_result->num_rows == 1)
			{		//RETRIEVING STUDENT RESULTS FROM DATABASE AND SAVE INTO AN ARRAY
				$found_rest = $pro_result->fetch_assoc();
				
								
				
				// DETECTING THE NEXT CLASS TO BE PROMOTED TO
				if($current_class == 'class1') { $next_class_rest = 'class2_results';  $next_class = 'class2';  }
				else if($current_class == 'class2') { $next_class_rest = 'class3_results';  $next_class = 'class3';  }
				else if($current_class == 'class3') { $next_class_rest = 'class4_results';  $next_class = 'class4';  }
				else if($current_class == 'class4') { $next_class_rest = 'class5_results';  $next_class = 'class5';  }
				else if($current_class == 'class5') { $next_class_rest = 'class6_results';  $next_class = 'class6';  }
				else { $current_class = 'graduated'; }
				
				// DETAMINING THE NEXT SESSION FOR THE STUDENTS
				@$first_sess = substr($current_sess, 0, 4);
				@$last_sess = substr($current_sess, 5, 8);
				@$first_sess++;		@$last_sess++;             //INCREAMENTING THE VALUE OF THE SESSION TO NEW SESSION FOR STUDENT
				@$new_sess = $first_sess .'-' .$last_sess;				

				//COMPUTING TOTAL MARKS TO GET OVERALL
				//$overall = $found_rest['mark_1'] + $found_rest['mark_2'] + $found_rest['mark_3'] + $found_rest['mark_4'] + 		            $found_rest['mark_5'] + $found_rest['mark_6'] + $found_rest['mark_7'] + $found_rest['mark_8'] + $found_rest['mark_9'] + $found_rest['mark_10'] + $found_rest['mark_11'] + $found_rest['mark_12'] + $found_rest['mark_13'] + $found_rest['mark_14'] + $found_rest['mark_15'] + $found_rest['mark_16'] + $found_rest['mark_17'] + $found_rest['mark_18'] + $found_rest['mark_19'] + $found_rest['mark_20'];
						   //echo $total_marks;
						   
				$regist_no = $found_rest['regist_no'];				$firstname = $found_rest['firstname'];
				$lastname = $found_rest['lastname'];				$password = $found_rest['password'];
				$photo = $found_rest['photo'];						$gender = $found_rest['gender'];
				$cate = $found_rest['cate'];						$overall = '0';

				
			//if($overall = 0)
			//{			//CREATING NEW FIRST TERM RECORDS FOR THE NEXT/PROMOTED CLASS
				$query_first = "INSERT INTO $next_class_rest (regist_no, firstname, lastname, password, class, term, photo, 
				session, gender, cate)
				VALUES ('{$regist_no}', '{$firstname}', '{$lastname}', '{$password}', '{$next_class}', 'first', '{$photo}', 
						'{$new_sess}', '{$gender}', '{$cate}')";
				
			if ($conn->query($query_first) === TRUE)
			{			//CREATING NEW SECOND TERM RECORDS FOR THE NEXT/PROMOTED CLASS
				$query_second = "INSERT INTO $next_class_rest (regist_no, firstname, lastname, password, class, term, photo, 
				session, gender, cate)
				VALUES ('{$regist_no}', '{$firstname}', '{$lastname}', '{$password}', '{$next_class}', 'second', '{$photo}', 
						'{$new_sess}', '{$gender}', '{$cate}')";
				
			if ($conn->query($query_second) === TRUE)
			{			//CREATING NEW THIRD TERM RECORDS FOR THE NEXT/PROMOTED CLASS
				$query_third = "INSERT INTO $next_class_rest (regist_no, firstname, lastname, password, class, term, photo, 
				session, gender, cate)
				VALUES ('{$regist_no}', '{$firstname}', '{$lastname}', '{$password}', '{$next_class}', 'third', '{$photo}', 
						'{$new_sess}', '{$gender}', '{$cate}')";
						
				if ($conn->query($query_third) === TRUE)
				{				//CREATING NEW STUDENTS' CLASS USER DETAILS
				// GETTING STUDENT FULL DETAILS
					$full_select = "SELECT * FROM student_users WHERE regist_no = '{$regist_no}'";
					$full_result = $conn->query($full_select);
					if($full_result->num_rows == 1)	
					{	$full_user = $full_result->fetch_assoc();	
				
						$midname = $full_user['midname'];				$school = $full_user['school'];
						$email = $full_user['email'];					$phone = $full_user['phone'];
						$dob = $full_user['dob'];						$category = $full_user['category'];
						$state = $full_user['state'];					$nationality = $full_user['nationality'];
						$address = $full_user['address'];				$role = $full_user['role'];
					
						$next_stud_class_user = $next_class .'_student_users';
						$query_csu = "INSERT INTO $next_stud_class_user(regist_no, firstname, midname, lastname, password, class, school, email,  phone, gender, dob, session, category, state, nationality, picture, address, role)
						VALUES('{$regist_no}', '{$firstname}', '{$midname}', '{$lastname}', '{$password}', '{$next_class}', '{$school}', '{$email}',
					   '{$phone}', '{$gender}', '{$dob}', '{$new_sess}', '{$category}', '{$state}', '{$nationality}', '{$photo}', 
					   '{$address}', '{$role}')";
						
						if ($conn->query($query_csu) === TRUE)
						{			//UPDATE STUDENTS' CLASS TO THE NEXT PROMOTED CLASS
							$upd_query = "UPDATE student_users SET class ='{$next_class}', session = '{$new_sess}' 
							WHERE regist_no = '{$regist_no}' LIMIT 1 ";

								if ($conn->query($upd_query) === TRUE)
								{			//DELETING OLD CLASS RECORDS
									$del_query = "DELETE FROM $class_user WHERE regist_no = '{$regist_no}' LIMIT 1 ";
								
									if ($conn->query($del_query) === TRUE)
									{	
										 $prom_stud_msg = 'promoted';	
									} else { $prom_stud_msg = ' Fail To Delete Student From Old Class '.mysqli_error($conn);	}
								} else { $prom_stud_msg = ' Fail To Update Student Class Record '.mysqli_error($conn);	}
						}  else { $prom_stud_msg = ' Fail To Insert NEXT Class User Details '.mysqli_error($conn);		} 
					} else { $prom_stud_msg = ' Fail To Retrieve Student Details '.mysqli_error($conn);	}
				} else { $prom_stud_msg = ' Fail To Insert Third Term Result Details '.mysqli_error($conn);	}
			} else { $prom_stud_msg = ' Fail To Insert Second Term Result Details '.mysqli_error($conn);	}
			
			} else { $prom_stud_msg = ' Fail To Insert First Term Result Details '.mysqli_error($conn);	}
		  //}   else {	echo $first.' : '.$last. ' Did Not Meet Requirement '. mysqli_error($conn);	}//PARTICULAR STUDENT NOT MEETING THE REQUIREMENT FOR PROMOTION
		}	else { $prom_stud_msg = ' Did Not Select Student '.mysqli_error($conn);	}			//PARTICULAR STUDENT NOT FOUND
	}   	//else {$prom_stud_m				//FOR LOOOOP
	
	/*$truc_class = $current_class;
	$truc_class .= '_code';
	$emp_query = "DELETE FROM exam_code WHERE class = '{$truc_class}'";
	$emp_result = $conn->query($emp_query);*/
		
		return $prom_stud_msg;
	}
	
	function promote_graduated_students()
	{
	$conn = db_connect();
	// DEFINING THE SPECIFIC CLASS TO WORK WITH
	$current_class = mysqli_real_escape_string($conn, $_REQUEST['class']);
	$session = mysqli_real_escape_string($conn, $_REQUEST['session']);
	$current_sess = $session;
	
	$class_user = $current_class;
	$class_rest = $current_class;
	$class_rest .= '_results';			//
	$class_user .= '_student_users';
	$column = 'serial_no';
	$term = 'third';
		    	
		$query_num = "SELECT $column FROM class6_results WHERE term = 'third' limit 1 ";
		$result_num = $conn->query($query_num);
		if($result_num->num_rows == 1)
			{
				$found = $result_num->fetch_assoc();
				$first = $found[$column];
			}		// GETTING THE FIRST SERAIL NUMBER OF STUDENTS IN THE CLASS 
		$query_last = "SELECT $column FROM class6_results WHERE term = 'third' ORDER BY $column DESC LIMIT 1 ";
		$result_last = $conn->query($query_last);
		if($result_last->num_rows == 1)
			{
				$found = $result_last->fetch_assoc();
				$last = $found[$column];
			}			// GETTING THE LAST SERAIL NUMBER OF STUDENTS IN THE CLASS
		  for($i = $first; $i <= $last; $i++)
		  {		// SELECTING ALL USERS FROM THE CLASS RESULT TABLE TO BE PROMOTED USING A FOR LOOP
			$pro_select = "SELECT * FROM class6_results WHERE serial_no = '{$i}' AND term = 'third' AND class = 'class6'";
			$pro_result = $conn->query($pro_select);
			if($pro_result->num_rows == 1)
			{		//RETRIEVING STUDENT RESULTS FROM DATABASE AND SAVE INTO AN ARRAY
				$found_rest = $pro_result->fetch_assoc();				
				$found_rest_regnum = $found_rest['regist_no'];
				
				// DETECTING THE NEXT CLASS TO BE PROMOTED TO
				 $current_class = 'graduated'; 
				
				// DETAMINING THE NEXT SESSION FOR THE STUDENTS
				@$current_sess = $session;				

				//COMPUTING TOTAL MARKS TO GET OVERALL
				$overall = $found_rest['mark_1'] + $found_rest['mark_2'] + $found_rest['mark_3'] + $found_rest['mark_4'] + 		                   		   $found_rest['mark_5'] + $found_rest['mark_6'] + $found_rest['mark_7'] + $found_rest['mark_8'] + 
						   $found_rest['mark_9'] + $found_rest['mark_10'] + $found_rest['mark_11'] + $found_rest['mark_12'] + 
						   $found_rest['mark_13'] + $found_rest['mark_14'] + $found_rest['mark_15'] + $found_rest['mark_16'] + 			                   		   $found_rest['mark_17'] + $found_rest['mark_18'] + $found_rest['mark_19'] + $found_rest['mark_20'];
				           //echo $total_marks;
				
			if($overall >= 100)
			{	//CREATING NEW STUDENTS' CLASS USER DETAILS
				// GETTING STUDENT FULL DETAILS
			 $full_select = "SELECT * FROM student_users WHERE regist_no = '{$found_rest['regist_no']}' AND class = 'class6'";
					$full_result = $conn->query($full_select);
					if($full_result->num_rows == 1)	
					{	
					$full_user = $full_result->fetch_assoc();
					$full_user_regno = 	$full_user['regist_no'];					$full_user_fname = 	$full_user['firstname'];
					$full_user_mname = 	$full_user['midname'];						$full_user_lname = 	$full_user['lastname'];
					$full_user_pass = 	$full_user['password'];						$full_user_sch = 	$full_user['school'];
					$full_user_email = 	$full_user['email'];						$full_user_phone = 	$full_user['phone'];
					$full_user_gen = 	$full_user['gender'];						$full_user_dob = 	$full_user['dob'];
					$full_user_cate = 	$full_user['category'];						$full_user_state = 	$full_user['state'];
					$full_user_nat = 	$full_user['nationality'];				    $full_user_pic = 	$full_user['picture'];
					$full_user_addr = 	$full_user['address'];						$full_user_role = 	$full_user['role'];					
				
				$query_csu = "INSERT INTO graduated(regist_no, firstname, midname, lastname, password, class, school, email,                    	phone, gender, dob, session, category, state, nationality, picture, address, role)
				VALUES('{$full_user_regno}', '{$full_user_fname}', '{$full_user_mname}', '{$full_user_lname}', 
					   '{$full_user_pass}', 'graduated', '{$full_user_sch}', '{$full_user_email}',
					   '{$full_user_phone}', '{$full_user_gen}', '{$full_user_dob}', '{$current_sess}', 
					   '{$full_user_cate}', '{$full_user_state}', '{$full_user_nat}', '{$full_user_pic}', 
					   '{$full_user_addr}', '{$full_user_role}')";
						$result_csu = $conn->query($query_csu);
						
				if($result_csu)
				{			//UPDATE STUDENTS' CLASS TO THE NEXT PROMOTED CLASS
				$upd_query = "UPDATE student_users SET class ='graduated', session = '{$current_sess}' 
				WHERE regist_no = '{$found_rest_regnum}' LIMIT 1 ";
						$upd_result = $conn->query($upd_query);
						if($upd_result)
						  {			//DELETING OLD CLASS RECORDS
							$del_query = "DELETE FROM class6_student_users WHERE regist_no = '{$found_rest_regnum}' LIMIT 1 ";
							$del_result = $conn->query($del_query);
						
							if($del_result->num_rows == 1)
								{	
									$prom_stud_msg = 'promoted';	
								}
							else {	$prom_stud_msg = mysqli_error();	}
						  }
						 else {	$prom_stud_msg = ' Fail To Update Student Class Record ' .mysqli_error();	}
				} 
				else {	$prom_stud_msg = ' Fail To Insert NEXT Class User Details ' .mysqli_error();		}
					}
			
		  }   			//PARTICULAR STUDENT NOT MEETING THE REQUIREMENT FOR PROMOTION
		}				//PARTICULAR STUDENT NOT FOUND
	}   				//FOR LOOOOP
	$truc_class = $current_class;
	$truc_class .= '_code';
	$emp_query = "DELETE FROM exam_code WHERE class = '{$truc_class}'";
	$emp_result = $conn->query($emp_query);
		
		return @$prom_stud_msg;
	}
	
	function promote_primary_graduated_students()
	{
	$conn = db_connect();
	// DEFINING THE SPECIFIC CLASS TO WORK WITH
	$current_class = mysqli_real_escape_string($conn, $_REQUEST['class']);
	$session = mysqli_real_escape_string($conn, $_REQUEST['session']);
	$current_sess = $session;
	
	$class_user = $current_class;
	//$class_rest = $current_class;
	//$class_rest .= '_results';			//
	$class_user .= '_student_users';
	$column = 'serial_no';
	$term = 'third';
		    	
		$query_num = "SELECT $column FROM $class_user WHERE class = '{$current_class}' LIMIT 1 ";
		$result_num = mysqli_query($query_num);
		if($result_num->num_rows == 1)
			{
				$found = $result_num->fetch_assoc();
				$first = $found[$column];
			}		// GETTING THE FIRST SERAIL NUMBER OF STUDENTS IN THE CLASS 
		$query_last = "SELECT $column FROM $class_user WHERE class = '{$current_class}' ORDER BY $column DESC LIMIT 1 ";
		$result_last = $conn->query($query_last);
		if($result_last->num_rows == 1)
			{
				$found = $result_last->fetch_assoc();
				$last = $found[$column];
			}			// GETTING THE LAST SERAIL NUMBER OF STUDENTS IN THE CLASS
		  for($i = $first; $i <= $last; $i++)
		  {		// SELECTING ALL USERS FROM THE CLASS RESULT TABLE TO BE PROMOTED USING A FOR LOOP
			$pro_select = "SELECT * FROM $class_user WHERE serial_no = '{$i}' AND class = '{$current_class}'";
			$pro_result = $conn->query($pro_select);
			if($pro_result->num_rows == 1)
			{		//RETRIEVING STUDENT RESULTS FROM DATABASE AND SAVE INTO AN ARRAY
				$found_rest = $pro_result->fetch_assoc();				
				$found_rest_regnum = $found_rest['regist_no'];
				
				// DETECTING THE NEXT CLASS TO BE PROMOTED TO
				if($current_class == 'primary1') { $next_class = 'primary2';  }
				else if($current_class == 'primary2') { $next_class = 'primary3';  }
				else if($current_class == 'primary3') { $next_class = 'primary4';  }
				else if($current_class == 'primary4') { $next_class = 'primary5';  }
				else if($current_class == 'primary5') { $next_class = 'primary6';  }
				else { $current_class = 'graduated'; }
				
				// DETAMINING THE NEXT SESSION FOR THE STUDENTS
				@$first_sess = substr($current_sess, 0, 4);
				@$last_sess = substr($current_sess, 5, 8);
				@$first_sess++;		@$last_sess++;             //INCREAMENTING THE VALUE OF THE SESSION TO NEW SESSION FOR STUDENT
				@$new_sess = $first_sess .'-' .$last_sess;					

				//COMPUTING TOTAL MARKS TO GET OVERALL
				$overall = $found_rest['mark_1'] + $found_rest['mark_2'] + $found_rest['mark_3'] + $found_rest['mark_4'] + 		      		   	$found_rest['mark_5'] + $found_rest['mark_6'] + $found_rest['mark_7'] + $found_rest['mark_8'] + 
						   $found_rest['mark_9'] + $found_rest['mark_10'] + $found_rest['mark_11'] + $found_rest['mark_12'] + 
						   $found_rest['mark_13'] + $found_rest['mark_14'] + $found_rest['mark_15'];
				           //echo $total_marks;
				
			if($overall >= 100)
			{	//CREATING NEW STUDENTS' CLASS USER DETAILS
				// GETTING STUDENT FULL DETAILS
			 $full_select = "SELECT * FROM $class_user WHERE regist_no = '{$found_rest_regnum}' AND class = '{$current_class}'";
					$full_result = $conn->query($full_select);
					if($full_result->num_rows == 1)	
					{	
					$full_user = $full_result->fetch_assoc();
					$full_user_regno = 	$full_user['regist_no'];					$full_user_fname = 	$full_user['firstname'];
					$full_user_mname = 	$full_user['midname'];						$full_user_lname = 	$full_user['lastname'];
					$full_user_pass = 	$full_user['password'];						$full_user_sch = 	$full_user['school'];
					$full_user_email = 	$full_user['email'];						$full_user_phone = 	$full_user['phone'];
					$full_user_gen = 	$full_user['gender'];						$full_user_dob = 	$full_user['dob'];
					$full_user_cate = 	$full_user['category'];						$full_user_state = 	$full_user['state'];
					$full_user_nat = 	$full_user['nationality'];				    $full_user_pic = 	$full_user['picture'];
					$full_user_addr = 	$full_user['address'];						$full_user_role = 	$full_user['role'];
					
				@$next_class_user = $next_class .'_student_users';
				$query_csu = "INSERT INTO $next_class_user(regist_no, firstname, midname, lastname, password, class, school, email, phone, gender, dob, session, category, state, nationality, picture, address, role)
				VALUES('{$full_user_regno}', '{$full_user_fname}', '{$full_user_mname}', '{$full_user_lname}', '{$full_user_pass}', '{$next_class}', '{$full_user_sch}', '{$full_user_email}', '{$full_user_phone}', '{$full_user_gen}', '{$full_user_dob}', '{$new_sess}', '{$full_user_cate}', '{$full_user_state}', '{$full_user_nat}', '{$full_user_pic}', 
					   '{$full_user_addr}', '{$full_user_role}')";
						$result_csu = $conn->query($query_csu);
						
				if($result_csu)
				{			//UPDATE STUDENTS' CLASS TO THE NEXT PROMOTED CLASS
				$upd_query = "UPDATE primary_student_users SET class ='{$next_class}', session = '{$new_sess}' 
				WHERE regist_no = '{$found_rest_regnum}' LIMIT 1 ";
						$upd_result = $conn->query($upd_query);
						if($upd_result)
						  {			//DELETING OLD CLASS RECORDS
							$del_query = "DELETE FROM $class_user WHERE regist_no = '{$found_rest_regnum}' LIMIT 1 ";
							$del_result = $conn->query($del_query);
						
							if($del_result->num_rows == 1)
								{	
									$prom_stud_msg = 'promoted';	
								}
							else {	$prom_stud_msg = mysqli_error();	}
						  }
						 else {	$prom_stud_msg = ' Fail To Update Student Class Record ' .mysqli_error();	}
				} 
				else {	$prom_stud_msg = ' Fail To Insert NEXT Class User Details ' .mysqli_error();		}
					}
			
		  }   			//PARTICULAR STUDENT NOT MEETING THE REQUIREMENT FOR PROMOTION
		}				//PARTICULAR STUDENT NOT FOUND
	}   				//FOR LOOOOP
		
		return @$prom_stud_msg;
	}
	
	function mark_attendance($new_quest_msg)
	{
		$conn = db_connect();
		$q_subj = filter_input(INPUT_POST, 'q_subj', FILTER_SANITIZE_STRING);
		$opt_A = filter_input(INPUT_POST, 'opt_A', FILTER_SANITIZE_STRING);
		$opt_B = filter_input(INPUT_POST, 'opt_B', FILTER_SANITIZE_STRING);
		$opt_C = filter_input(INPUT_POST, 'opt_C', FILTER_SANITIZE_STRING);
		$opt_D = filter_input(INPUT_POST, 'opt_D', FILTER_SANITIZE_STRING);
		$q_class = filter_input(INPUT_POST, 'q_class', FILTER_SANITIZE_STRING);
		$q_term = filter_input(INPUT_POST, 'q_term', FILTER_SANITIZE_STRING);
		$q_quest = filter_input(INPUT_POST, 'q_quest', FILTER_SANITIZE_STRING);
		$q_answer = filter_input(INPUT_POST, 'q_answer', FILTER_SANITIZE_STRING);

		$quest_table = $q_subj .'_'.$q_class;	
		
		
		$query = "INSERT INTO $quest_table(subject, optionA, optionB, optionC, optionD, class, term, question, answer) 
		VALUES('{$q_subj}', '{$opt_A}', '{$opt_B}', '{$opt_C}', '{$opt_D}', '{$q_class}', '{$q_term}', '{$q_quest}', '{$q_answer}')";

			if ($conn->query($query) === TRUE)
			{
				$new_quest_msg = "questCreated"; 
			}
			else 
			{ 
				$new_quest_msg = "Error : Could Not Create New Question"; 
			}
		return $new_quest_msg;
	}
	
	function mark_staff_attendance($sid, $fname, $lname)
	{
		$conn = db_connect();		
		$a_time = date("H:i A");
		$a_date = date("Y-M-d");
		//chacking if the staff has been logged in today alreaby : and do nothing
		$query = "SELECT * FROM staff_attendance WHERE staff_id = '{$sid}' AND date = '{$a_date}'";
		$result = $conn->query($query);
		if($result->num_rows >= 1) {}
		
		else  //go ahead to log attendance
		{
			$query2 = "INSERT INTO staff_attendance(staff_id, firstname, lastname, time, date, attendance) 
			VALUES('{$sid}', '{$fname}', '{$lname}', '{$a_time}', '{$a_date}', 'Present')";

			if ($conn->query($query2) === TRUE)
			{
				$staff_atte_msg = "attendMarked"; 
			}
			else 
			{ 
				$staff_atte_msg = "Error : Could Not Mark Staff Attendance"; 
			}
		return $staff_atte_msg;
		}
		
	}
	
	function view_attendance()
	{
		$conn = db_connect();
		$a_class = filter_input(INPUT_POST, 'view_class', FILTER_SANITIZE_STRING); 
		$a_term = filter_input(INPUT_POST, 'view_term', FILTER_SANITIZE_STRING); 
		$a_date = filter_input(INPUT_POST, 'attend_date', FILTER_SANITIZE_STRING);
		$attend_tbl = $a_class;
		$attend_tbl .= '_attendance';
		$query = "SELECT * FROM $attend_tbl WHERE term = '{$a_term}' AND date = '{$a_date}'";
		$result = $conn->query($query);
		$conn->close();
		return $result;		
	}
	
	function view_attendance_absent()
	{
		$conn = db_connect();
		$a_class = filter_input(INPUT_POST, 'view_class', FILTER_SANITIZE_STRING); 
		$a_term = filter_input(INPUT_POST, 'view_term', FILTER_SANITIZE_STRING); 
		$a_date = filter_input(INPUT_POST, 'attend_date', FILTER_SANITIZE_STRING);
		$attend_tbl = $a_class;					$student_tbl = $a_class;    $student_tbl .= '_student_users';
		$attend_tbl .= '_attendance';
		$query = "SELECT * from $student_tbl WHERE NOT EXISTS (SELECT * FROM $attend_tbl WHERE $attend_tbl.regist_no = $student_tbl.regist_no AND $attend_tbl.term = 'first')";
		$resultA = $conn->query($query);
		$conn->close();
		return $resultA;		
	}
	
	function student_result($id, $class, $term)
	{
		$conn = db_connect();
		$rest_class_tbl = $class;
		$rest_class_tbl .= '_results';
		$query = "SELECT * FROM $rest_class_tbl WHERE regist_no = '{$id}' AND term = '{$term}'";
		$result = $conn->query($query);
		$conn->close();
		return $result;		
	}
	
	function apply_for_leave()
	{
		$conn = db_connect();
		$staff_id = filter_input(INPUT_POST, 'staff_id', FILTER_SANITIZE_STRING);
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		$leave_type = filter_input(INPUT_POST, 'leave_type', FILTER_SANITIZE_STRING);
		$date_from = filter_input(INPUT_POST, 'date_from', FILTER_SANITIZE_STRING);
		$date_to = filter_input(INPUT_POST, 'date_to', FILTER_SANITIZE_STRING);
		$status = 'Pending Approval';
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
		$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
		$reason = filter_input(INPUT_POST, 'reason', FILTER_SANITIZE_STRING);
		$enteredby = filter_input(INPUT_POST, 'enteredby', FILTER_SANITIZE_STRING);
		
		$created = date("Y-M-d H:i A");
		$approvedby = 'Admin';
	
		$query = "INSERT INTO staff_leave(staff_id, leave_type, date_from, date_to, status, name, email, phone, reason) 
		VALUES('{$staff_id}', '{$leave_type}', '{$date_from}', '{$date_to}', '{$status}', '{$name}', '{$email}', '{$phone}', '{$reason}')";
			if ($conn->query($query) === TRUE)
			{
				$query2 = "INSERT INTO notifications(notif_id, status, start_date, end_date, type, description, enteredby, approvedby, created) 
				VALUES('{$staff_id}', '{$status}', '{$date_from}', '{$date_to}', '{$leave_type}', '{$reason}', '{$enteredby}', '{$approvedby}', '{$created}')";
				if ($conn->query($query2) === TRUE){      $new_leave_msg = "leaveApplied";    }
				
				else {      $new_leave_msg = "Error : ".mysqli_error($conn);       }
			}
			else {      $new_leave_msg = "Error : ".mysqli_error($conn);       }
			
		return $new_leave_msg;
	}
	
	function create_new_question_content()
	{
		$conn = db_connect();
		//$quest_no = @mysqli_real_escape_string($conn, $_POST['quest_no']);
		$q_subj = filter_input(INPUT_POST, 'q_subj', FILTER_SANITIZE_STRING);
		$q_class = filter_input(INPUT_POST, 'q_class', FILTER_SANITIZE_STRING);
		$q_term = filter_input(INPUT_POST, 'q_term', FILTER_SANITIZE_STRING);
		$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
		$question_no = filter_input(INPUT_POST, 'question_no', FILTER_SANITIZE_STRING);
		$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
		$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);			
		
		$query = "INSERT INTO question_passage(subject, class, term, type, question_no, title, content) 
		VALUES('{$q_subj}', '{$q_class}', '{$q_term}', '{$type}', '{$question_no}', '{$title}', '{$content}')";

			if ($conn->query($query) === TRUE)
			{
				$new_content_msg = "contentCreated"; 
			}
			else 
			{ 
				$new_content_msg = "Error : Could Not Create New Question Content"; 
			}
		return $new_content_msg;
	}
	
	function update_passage()
	{
		$conn = db_connect();
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
		$p_subj = filter_input(INPUT_POST, 'p_subj', FILTER_SANITIZE_STRING);
		$p_class = filter_input(INPUT_POST, 'p_class', FILTER_SANITIZE_STRING);
		$p_term = filter_input(INPUT_POST, 'p_term', FILTER_SANITIZE_STRING);
		$p_type = filter_input(INPUT_POST, 'p_type', FILTER_SANITIZE_STRING);
		$question_no = filter_input(INPUT_POST, 'question_no', FILTER_SANITIZE_STRING);
		$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
		$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
		
		$query = "UPDATE question_passage SET
				 subject = '{$p_subj}', class = '{$p_class}', term = '{$p_term}', type = '{$p_type}', question_no = '{$question_no}', 
				 title = '{$title}', content = '{$content}'	 WHERE id = '{$id}'";

				 if ($conn->query($query) === TRUE)
				 {
					 $upd_pass_msg = "updated";
				 }
				 else { $upd_pass_msg = ' '.mysqli_error($conn); }
		
		return $upd_pass_msg;
	}
	
	function view_passages()
	{
		$conn = db_connect();
		$query = "SELECT * FROM question_passage";
		$result = $conn->query($query);
		$conn->close();
		return $result;		
	}
	
	function input_new_result()
	{
		$conn = db_connect();
		$new_stud_msg = "";	
		$regist_no = filter_input(INPUT_POST, 'regist_no', FILTER_SANITIZE_STRING);   $_SESSION['regist_no'] = $regist_no;
		/*$f_name = filter_input(INPUT_POST, 'f_name', FILTER_SANITIZE_STRING);
		$l_name = filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING);
		$pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
		$class = 'class5';       $_SESSION['class'] = $class;
		$session = filter_input(INPUT_POST, 'session', FILTER_SANITIZE_STRING);
		$gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
		$picture = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_STRING);*/
		$term = filter_input(INPUT_POST, 'term', FILTER_SANITIZE_STRING);
		
		$subject_1 = filter_input(INPUT_POST, 'subject_1', FILTER_SANITIZE_STRING);
		$mark_1 = filter_input(INPUT_POST, 'mark_1', FILTER_SANITIZE_STRING);
		$subject_2 = filter_input(INPUT_POST, 'subject_2', FILTER_SANITIZE_STRING);
		$mark_2 = filter_input(INPUT_POST, 'mark_2', FILTER_SANITIZE_STRING);
		$subject_3 = filter_input(INPUT_POST, 'subject_3', FILTER_SANITIZE_STRING);
		$mark_3 = filter_input(INPUT_POST, 'mark_3', FILTER_SANITIZE_STRING);
		$subject_4 = filter_input(INPUT_POST, 'subject_4', FILTER_SANITIZE_STRING);
		$mark_4 = filter_input(INPUT_POST, 'mark_4', FILTER_SANITIZE_STRING);
		$subject_5 = filter_input(INPUT_POST, 'subject_5', FILTER_SANITIZE_STRING);
		$mark_5 = filter_input(INPUT_POST, 'mark_5', FILTER_SANITIZE_STRING);
		$subject_6 = filter_input(INPUT_POST, 'subject_6', FILTER_SANITIZE_STRING);
		$mark_6 = filter_input(INPUT_POST, 'mark_6', FILTER_SANITIZE_STRING);
		$subject_7 = filter_input(INPUT_POST, 'subject_7', FILTER_SANITIZE_STRING);
		$mark_7 = filter_input(INPUT_POST, 'mark_7', FILTER_SANITIZE_STRING);
		$subject_8 = filter_input(INPUT_POST, 'subject_8', FILTER_SANITIZE_STRING);
		$mark_8 = filter_input(INPUT_POST, 'mark_8', FILTER_SANITIZE_STRING);
		$subject_9 = filter_input(INPUT_POST, 'subject_9', FILTER_SANITIZE_STRING);
		$mark_9 = filter_input(INPUT_POST, 'mark_9', FILTER_SANITIZE_STRING);
		$subject_10 = filter_input(INPUT_POST, 'subject_10', FILTER_SANITIZE_STRING);
		$mark_10 = filter_input(INPUT_POST, 'mark_10', FILTER_SANITIZE_STRING);
		$subject_11 = filter_input(INPUT_POST, 'subject_11', FILTER_SANITIZE_STRING);
		$mark_11 = filter_input(INPUT_POST, 'mark_11', FILTER_SANITIZE_STRING);
		$subject_12 = filter_input(INPUT_POST, 'subject_12', FILTER_SANITIZE_STRING);
		$mark_12 = filter_input(INPUT_POST, 'mark_12', FILTER_SANITIZE_STRING);
		$subject_13 = filter_input(INPUT_POST, 'subject_13', FILTER_SANITIZE_STRING);
		$mark_13 = filter_input(INPUT_POST, 'mark_13', FILTER_SANITIZE_STRING);
		$subject_14 = filter_input(INPUT_POST, 'subject_14', FILTER_SANITIZE_STRING);
		$mark_14 = filter_input(INPUT_POST, 'mark_14', FILTER_SANITIZE_STRING);
		$subject_15 = filter_input(INPUT_POST, 'subject_15', FILTER_SANITIZE_STRING);
		$mark_15 = filter_input(INPUT_POST, 'mark_15', FILTER_SANITIZE_STRING);
		$subject_16 = filter_input(INPUT_POST, 'subject_16', FILTER_SANITIZE_STRING);
		$mark_16 = filter_input(INPUT_POST, 'mark_16', FILTER_SANITIZE_STRING);
		$subject_17 = filter_input(INPUT_POST, 'subject_17', FILTER_SANITIZE_STRING);
		$mark_17 = filter_input(INPUT_POST, 'mark_17', FILTER_SANITIZE_STRING);
		$subject_18 = filter_input(INPUT_POST, 'subject_18', FILTER_SANITIZE_STRING);
		$mark_18 = filter_input(INPUT_POST, 'mark_18', FILTER_SANITIZE_STRING);
		$subject_19 = filter_input(INPUT_POST, 'subject_19', FILTER_SANITIZE_STRING);
		$mark_19 = filter_input(INPUT_POST, 'mark_19', FILTER_SANITIZE_STRING);		
		$subject_20 = filter_input(INPUT_POST, 'subject_20', FILTER_SANITIZE_STRING);
		$mark_20 = filter_input(INPUT_POST, 'mark_20', FILTER_SANITIZE_STRING);
		$overall = $mark_1 + $mark_2 + $mark_3 + $mark_4 + $mark_5 + $mark_6 + $mark_7 + $mark_8 + $mark_9 + $mark_10 + $mark_11 + $mark_12 + $mark_13 + $mark_14 + $mark_15 + $mark_16 + $mark_17 + $mark_18 + $mark_19 + $mark_20;
		
		
		$sql2 = "SELECT * FROM student_users WHERE regist_no = '{$regist_no}'";
		$result2 = $conn->query($sql2);
		$row = $result2->fetch_assoc();  
		$f_name = $row['firstname']; 					$l_name = $row['lastname'];
		$pass = $row['password']; 						$class = 'class5';   //$row['class'];
		$session = $row['session']; 					$gender = $row['gender'];
		$picture = $row['picture'];
		
		
		$resulttbl = $class .'_results';
		
		$sql = "SELECT * FROM $resulttbl WHERE regist_no = '{$regist_no}' AND term = '{$term}'";
		$result = $conn->query($sql);
		if($result->num_rows > 0) { $inpt_rest_msg = "exist";  }
		
		else
		{
			$query = "INSERT INTO $resulttbl(regist_no, firstname, lastname, password, class, term, session, gender, photo, subject_1, mark_1, subject_2, mark_2, subject_3, mark_3, subject_4, mark_4, subject_5, mark_5, subject_6, mark_6, subject_7, mark_7, subject_8, mark_8, subject_9, mark_9, subject_10, mark_10, subject_11, mark_11, subject_12, mark_12, subject_13, mark_13, subject_14, mark_14, subject_15, mark_15, subject_16, mark_16, subject_17, mark_17, subject_18, mark_18, subject_19, mark_19, subject_20, mark_20, overall) 
		   VALUES('{$regist_no}', '{$f_name}', '{$l_name}', '{$pass}', '{$class}', '{$term}', '{$session}', '{$gender}', '{$picture}',                 '{$subject_1}', '{$mark_1}', '{$subject_2}', '{$mark_2}', '{$subject_3}', '{$mark_3}', '{$subject_4}', '{$mark_4}', '{$subject_5}', '{$mark_5}', '{$subject_6}', '{$mark_6}', '{$subject_7}', '{$mark_7}', '{$subject_8}', '{$mark_8}', '{$subject_9}', '{$mark_9}', '{$subject_10}', '{$mark_10}', '{$subject_11}', '{$mark_11}', '{$subject_12}', '{$mark_12}', '{$subject_13}', '{$mark_13}', '{$subject_14}', '{$mark_14}', '{$subject_15}', '{$mark_15}', '{$subject_16}', '{$mark_16}', '{$subject_17}', '{$mark_17}', '{$subject_18}', '{$mark_18}', '{$subject_19}', '{$mark_19}', '{$subject_20}', '{$mark_20}', '{$overall}')";
			  if ($conn->query($query) === TRUE)
			  {
				$inpt_rest_msg = "resultInputed";  
			  }
			  else {	 $inpt_rest_msg = " " .mysqli_error($conn);   }
		}
				

		$conn->close(); 
		return $inpt_rest_msg;
	}
	
	function update_page_content()
	{
		$conn = db_connect();
		$page_id = filter_input(INPUT_POST, 'page_id', FILTER_SANITIZE_STRING);
		
		$title_1 = filter_input(INPUT_POST, 'title_1', FILTER_SANITIZE_STRING);
		$content_1 = filter_input(INPUT_POST, 'content_1', FILTER_SANITIZE_STRING);
		$footer_1 = filter_input(INPUT_POST, 'footer_1', FILTER_SANITIZE_STRING);
		$title_2 = filter_input(INPUT_POST, 'title_2', FILTER_SANITIZE_STRING);
		$content_2 = filter_input(INPUT_POST, 'content_2', FILTER_SANITIZE_STRING);
		$footer_2 = filter_input(INPUT_POST, 'footer_2', FILTER_SANITIZE_STRING);
		$title_3 = filter_input(INPUT_POST, 'title_3', FILTER_SANITIZE_STRING);
		$content_3 = filter_input(INPUT_POST, 'content_3', FILTER_SANITIZE_STRING);
		$footer_3 = filter_input(INPUT_POST, 'footer_3', FILTER_SANITIZE_STRING);
		$title_4 = filter_input(INPUT_POST, 'title_4', FILTER_SANITIZE_STRING);
		$content_4 = filter_input(INPUT_POST, 'content_4', FILTER_SANITIZE_STRING);
		$footer_4 = filter_input(INPUT_POST, 'footer_4', FILTER_SANITIZE_STRING);
		$title_5 = filter_input(INPUT_POST, 'title_5', FILTER_SANITIZE_STRING);
		$content_5 = filter_input(INPUT_POST, 'content_5', FILTER_SANITIZE_STRING);
		$footer_5 = filter_input(INPUT_POST, 'footer_5', FILTER_SANITIZE_STRING);
		$title_6 = filter_input(INPUT_POST, 'title_6', FILTER_SANITIZE_STRING);
		$content_6 = filter_input(INPUT_POST, 'content_6', FILTER_SANITIZE_STRING);
		$footer_6 = filter_input(INPUT_POST, 'footer_6', FILTER_SANITIZE_STRING);
		$title_7 = filter_input(INPUT_POST, 'title_7', FILTER_SANITIZE_STRING);
		$content_7 = filter_input(INPUT_POST, 'content_7', FILTER_SANITIZE_STRING);
		$footer_7 = filter_input(INPUT_POST, 'footer_7', FILTER_SANITIZE_STRING);
		$title_8 = filter_input(INPUT_POST, 'title_8', FILTER_SANITIZE_STRING);
		$content_8 = filter_input(INPUT_POST, 'content_8', FILTER_SANITIZE_STRING);
		$footer_8 = filter_input(INPUT_POST, 'footer_8', FILTER_SANITIZE_STRING);
		$title_9 = filter_input(INPUT_POST, 'title_9', FILTER_SANITIZE_STRING);
		$content_9 = filter_input(INPUT_POST, 'content_9', FILTER_SANITIZE_STRING);
		$footer_9 = filter_input(INPUT_POST, 'footer_9', FILTER_SANITIZE_STRING);
		$title_10 = filter_input(INPUT_POST, 'title_10', FILTER_SANITIZE_STRING);
		$content_10 = filter_input(INPUT_POST, 'content_10', FILTER_SANITIZE_STRING);
		$footer_10 = filter_input(INPUT_POST, 'footer_10', FILTER_SANITIZE_STRING);
		
		$modified = date('Y-M-d h:i:s');


		$query = "UPDATE page_content SET
				 title_1 = '{$title_1}', content_1 = '{$content_1}', footer_1 = '{$footer_1}', 
				 title_2 = '{$title_2}', content_2 = '{$content_2}', footer_2 = '{$footer_2}', 
				 title_3 = '{$title_3}', content_3 = '{$content_3}', footer_3 = '{$footer_3}',
				 title_4 = '{$title_4}', content_4 = '{$content_4}', footer_4 = '{$footer_4}', 
				 title_5 = '{$title_5}', content_5 = '{$content_5}', footer_5 = '{$footer_5}',
				 title_6 = '{$title_6}', content_6 = '{$content_6}', footer_6 = '{$footer_6}', 
				 title_7 = '{$title_7}', content_7 = '{$content_7}', footer_7 = '{$footer_7}', 
				 title_8 = '{$title_8}', content_8 = '{$content_8}', footer_8 = '{$footer_8}',
				 title_9 = '{$title_9}', content_9 = '{$content_9}', footer_9 = '{$footer_9}', 
				 title_10 = '{$title_10}', content_10 = '{$content_10}', footer_10 = '{$footer_10}',
				 modified = '{$modified}'
				 WHERE page_id = '{$page_id}'";

				 if ($conn->query($query) === TRUE)
				 {
					 $upd_page_msg = "updated";
				 }
				 else { $upd_page_msg = ' '.mysqli_error($conn); }
		
		return $upd_page_msg;
	}
	
	function upload_content_photo($page_id, $p_cate, $pic_path)
	{
		$conn = db_connect();
		$query = "UPDATE page_content SET footer_1 = '{$pic_path}' WHERE page_id = '{$page_id}' AND category = '{$p_cate}'";

		 if ($conn->query($query) === TRUE)
		{
			$upload_msg = 'uploaded';
		}
		else { $upload_msg = ' '.mysqli_error($conn); }
		
		return $upload_msg;
	}
	
	function deactivate_student()
	{
		$conn = db_connect();
		$regist_no = filter_input(INPUT_POST, 'stud_id', FILTER_SANITIZE_STRING); 
		$s_class = filter_input(INPUT_POST, 's_class', FILTER_SANITIZE_STRING);
		
		//UPDATING STUDENT DETAILS IN STUDENT USERS TABLE TO INACTIVE
		$query = "UPDATE student_users SET status = 'Inactive'  WHERE regist_no = '{$regist_no}'";

			 if ($conn->query($query) === TRUE)
			 {		//UPDATING STUDENT DETAILS IN STUDENT CLASS USERS TABLE TO INACTIVE
				 $table_user = $s_class . '_student_users';
				 $query_cu = "UPDATE $table_user SET  status = 'Inactive'  WHERE regist_no = '{$regist_no}'";

				 if ($conn->query($query_cu) === TRUE)
				 {	
						 $deact_stud_msg = "deactivated";
				 }
				 else { $deact_stud_msg = ' '.mysqli_error($conn); }
			 }
			 else { $deact_stud_msg = ' '.mysqli_error($conn); }
			 
		return $deact_stud_msg;
	}
	
	function deactivate_staff()
	{
		$conn = db_connect();
		$staff_id = filter_input(INPUT_POST, 'staff_id', FILTER_SANITIZE_STRING); 
		
		//UPDATING STUDENT DETAILS IN STUDENT USERS TABLE TO INACTIVE
		$query = "UPDATE staff_users SET status = 'Inactive'  WHERE staff_id = '{$staff_id}'";

			 if ($conn->query($query) === TRUE)
			 {	
				 $deact_staff_msg = "deactivated";
			 }
			 else { $deact_staff_msg = ' '.mysqli_error($conn); }
			 
		return $deact_staff_msg;
	}
	
	function view_year_book()
	{
		$conn = db_connect();
		$session = filter_input(INPUT_POST, 'session', FILTER_SANITIZE_STRING); 

		$query = "SELECT * FROM student_users WHERE session = '{$session}'";
		$result = $conn->query($query);
		$conn->close();
		return $result;		
	}
	
	function new_staff_salary_details()
	{
		$conn = db_connect();
		$new_sal_msg = "";
		$staff_id = filter_input(INPUT_POST, 'staff_id', FILTER_SANITIZE_STRING);  
		$basicsalary = filter_input(INPUT_POST, 'basicsalary', FILTER_SANITIZE_STRING);
		$tax = filter_input(INPUT_POST, 'tax', FILTER_SANITIZE_STRING);
		$deductions = filter_input(INPUT_POST, 'deductions', FILTER_SANITIZE_STRING);
		$bank = filter_input(INPUT_POST, 'bank', FILTER_SANITIZE_STRING);
		$accountnumber = filter_input(INPUT_POST, 'accountnumber', FILTER_SANITIZE_STRING);
		$accounttype = filter_input(INPUT_POST, 'accounttype', FILTER_SANITIZE_STRING);
		$status = 'Active';
		$enteredby = filter_input(INPUT_POST, 'enteredby', FILTER_SANITIZE_STRING);
		$approvedby = '';		
		
		$query = "INSERT INTO staff_salary_details(staff_id, basicsalary, tax, deductions, bank, accountnumber, accounttype, status, enteredby,	approvedby) 
		VALUES('{$staff_id}', '{$basicsalary}', '{$tax}', '{$deductions}', '{$bank}', '{$accountnumber}', '{$accounttype}', '{$status}', '{$enteredby}', '{$approvedby}')";

			  if ($conn->query($query) === TRUE)
			  {
				 $new_sal_msg = "salaryCreated"; 
			  }
			  else { $new_sal_msg = "Error " .mysqli_error($conn);  }
			return $new_sal_msg;
	}
	
	function view_staff_salary_details($sid)
	{
		$conn = db_connect();
		$query = "SELECT * from staff_salary_details WHERE staff_id = '{$sid}'";
		$result = $conn->query($query);
		$conn->close();
		return $result;		
	}
	
	function generate_payslip()
	{
		$conn = db_connect();
		$pay_msg = "";
		$staff_id = filter_input(INPUT_POST, 'staff_id', FILTER_SANITIZE_STRING);  
		$basicsalary = filter_input(INPUT_POST, 'basicsalary', FILTER_SANITIZE_STRING);
		$tax = filter_input(INPUT_POST, 'tax', FILTER_SANITIZE_STRING);
		$deductions = filter_input(INPUT_POST, 'deductions', FILTER_SANITIZE_STRING);
		$takehome = filter_input(INPUT_POST, 'takehome', FILTER_SANITIZE_STRING);
		$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
		$comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
		$status = 'Active';
		$bank = filter_input(INPUT_POST, 'bank', FILTER_SANITIZE_STRING);
		$accountnumber = filter_input(INPUT_POST, 'accountnumber', FILTER_SANITIZE_STRING);
		$accounttype = filter_input(INPUT_POST, 'accounttype', FILTER_SANITIZE_STRING);
		$enteredby = filter_input(INPUT_POST, 'enteredby', FILTER_SANITIZE_STRING);
		$approvedby = '';

		$sql = "SELECT * FROM payslip WHERE staff_id = '{$staff_id}' AND date = '{$date}'";
		$result = $conn->query($sql);
		if($result->num_rows > 0) { $pay_msg = "exist";  }
		
		else
		{		
			$query = "INSERT INTO payslip(staff_id, basicsalary, tax, deductions, takehome, date, comment, status, bank, accountnumber, accounttype, enteredby,	approvedby) 
			VALUES('{$staff_id}', '{$basicsalary}', '{$tax}', '{$deductions}', '{$takehome}', '{$date}', '{$comment}', '{$status}', '{$bank}', '{$accountnumber}', '{$accounttype}', '{$enteredby}', '{$approvedby}')";

			  if ($conn->query($query) === TRUE)
			  {
				 $pay_msg = "payslipCreated"; 
			  }
			  else { $pay_msg = "Error " .mysqli_error($conn);  }
		}
			$conn->close(); 
		return $pay_msg;
	}
		
	function new_expenses()
	{
		$conn = db_connect();
		$exp_msg = "";
		$expensename = filter_input(INPUT_POST, 'expensename', FILTER_SANITIZE_STRING);  
		$expensetype = filter_input(INPUT_POST, 'expensetype', FILTER_SANITIZE_STRING);
		$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
		$unitprice = filter_input(INPUT_POST, 'unitprice', FILTER_SANITIZE_STRING);
		$quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);
		$amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_STRING);		
		$status = 'Pending Approval';
		$purchaseby = filter_input(INPUT_POST, 'purchaseby', FILTER_SANITIZE_STRING);
		$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
		$enteredby = filter_input(INPUT_POST, 'enteredby', FILTER_SANITIZE_STRING);
		$approvedby = '';

		$sql = "SELECT * FROM expenses WHERE expensename = '{$expensename}' AND date = '{$date}'";
		$result = $conn->query($sql);
		if($result->num_rows > 0) { $exp_msg = "exist";  }
		
		else
		{		
			$query = "INSERT INTO expenses(expensename, expensetype, date, unitprice, quantity, amount, status, purchaseby, description, enteredby,	approvedby) 
			VALUES('{$expensename}', '{$expensetype}', '{$date}', '{$unitprice}', '{$quantity}', '{$amount}', '{$status}', '{$purchaseby}', '{$description}', '{$enteredby}', '{$approvedby}')";

			  if ($conn->query($query) === TRUE)
			  {
				 $exp_msg = "expensesCreated"; 
			  }
			  else { $exp_msg = "Error " .mysqli_error($conn);  }
		}
			$conn->close(); 
		return $exp_msg;
	}
	
	function create_new_position()
	{
		$conn = db_connect();
		$new_posit_msg = "";
		$position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING);  
		$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
		$role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
				
		$query = "INSERT INTO staff_position(position, description, role) VALUES('{$position}', '{$description}', '{$role}')";
		  if ($conn->query($query) === TRUE)
		  {
			 $new_posit_msg = "positionCreated"; 
		  }
		  else { $new_posit_msg = "Error " . mysqli_error($conn);  }
		return $new_posit_msg;
	}
	
	function view_position()
	{
		$conn = db_connect();
		$query = "SELECT * FROM staff_position";
		$result = $conn->query($query);
		$conn->close();
		return $result;		
	}
	
	function update_position()
	{
		$conn = db_connect();
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
		$position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING);
		$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
		
		$query = "UPDATE staff_position SET position = '{$position}', description = '{$description}' WHERE id = '{$id}'";

		 if ($conn->query($query) === TRUE)
		 {
			 $upd_posit_msg = "updated";
		 }
		 else { $upd_posit_msg = ' '.mysqli_error($conn); }
		
		return $upd_posit_msg;
	}
	
	function create_academic_session()
	{
		$conn = db_connect();
		$new_session_msg = "";
		$session = filter_input(INPUT_POST, 'session', FILTER_SANITIZE_STRING);  
		$f_term_start = filter_input(INPUT_POST, 'f_term_start', FILTER_SANITIZE_STRING);
		$ft_first_test = filter_input(INPUT_POST, 'ft_first_test', FILTER_SANITIZE_STRING);
		$ft_first_break = filter_input(INPUT_POST, 'ft_first_break', FILTER_SANITIZE_STRING);  
		$ft_mid_term = filter_input(INPUT_POST, 'ft_mid_term', FILTER_SANITIZE_STRING);
		$ft_second_test = filter_input(INPUT_POST, 'ft_second_test', FILTER_SANITIZE_STRING);
		$ft_second_break = filter_input(INPUT_POST, 'ft_second_break', FILTER_SANITIZE_STRING);  
		$f_term_exams = filter_input(INPUT_POST, 'f_term_exams', FILTER_SANITIZE_STRING);
		$f_term_end = filter_input(INPUT_POST, 'f_term_end', FILTER_SANITIZE_STRING);
		$s_term_start = filter_input(INPUT_POST, 's_term_start', FILTER_SANITIZE_STRING);  
		$st_first_test = filter_input(INPUT_POST, 'st_first_test', FILTER_SANITIZE_STRING);
		$st_first_break = filter_input(INPUT_POST, 'st_first_break', FILTER_SANITIZE_STRING);
		$st_mid_term = filter_input(INPUT_POST, 'st_mid_term', FILTER_SANITIZE_STRING);  
		$st_second_test = filter_input(INPUT_POST, 'st_second_test', FILTER_SANITIZE_STRING);
		$st_second_break = filter_input(INPUT_POST, 'st_second_break', FILTER_SANITIZE_STRING);
		$s_term_exams = filter_input(INPUT_POST, 's_term_exams', FILTER_SANITIZE_STRING);  
		$s_term_end = filter_input(INPUT_POST, 's_term_end', FILTER_SANITIZE_STRING);
		$t_term_start = filter_input(INPUT_POST, 't_term_start', FILTER_SANITIZE_STRING);
		$tt_first_test = filter_input(INPUT_POST, 'tt_first_test', FILTER_SANITIZE_STRING);  
		$tt_first_break = filter_input(INPUT_POST, 'tt_first_break', FILTER_SANITIZE_STRING);
		$tt_mid_term = filter_input(INPUT_POST, 'tt_mid_term', FILTER_SANITIZE_STRING);
		$tt_second_test = filter_input(INPUT_POST, 'tt_second_test', FILTER_SANITIZE_STRING);  
		$tt_second_break = filter_input(INPUT_POST, 'tt_second_break', FILTER_SANITIZE_STRING);
		$t_term_exams = filter_input(INPUT_POST, 't_term_exams', FILTER_SANITIZE_STRING);
		$t_term_end = filter_input(INPUT_POST, 't_term_end', FILTER_SANITIZE_STRING);
		

		$sql = "SELECT * FROM academic_calendar WHERE session = '{$session}'";
		$result = $conn->query($sql);
		if($result->num_rows > 0) { $new_session_msg = "exist";  }
		
		else
		{
			$query = "INSERT INTO academic_calendar(session, f_term_start, ft_first_test, ft_first_break, ft_mid_term, ft_second_test, ft_second_break, f_term_exams, f_term_end, s_term_start, st_first_test, st_first_break, st_mid_term, st_second_test, st_second_break, s_term_exams, s_term_end, t_term_start, tt_first_test, tt_first_break, tt_mid_term, tt_second_test, tt_second_break, t_term_exams, t_term_end) 
			VALUES('{$session}', '{$f_term_start}', '{$ft_first_test}', '{$ft_first_break}', '{$ft_mid_term}', '{$ft_second_test}', '{$ft_second_break}', '{$f_term_exams}', '{$f_term_end}', '{$s_term_start}', '{$st_first_test}', '{$st_first_break}', '{$st_mid_term}', '{$st_second_test}', '{$st_second_break}', '{$s_term_exams}', '{$s_term_end}', '{$t_term_start}', '{$tt_first_test}', '{$tt_first_break}', '{$tt_mid_term}', '{$tt_second_test}', '{$tt_second_break}', '{$t_term_exams}', '{$t_term_end}' )";
			  if ($conn->query($query) === TRUE)
			  {
				 $new_session_msg = "sessionCreated"; 
			  }
			  else { $new_session_msg = "Error " . mysqli_error($conn);  }
		}
		  
		return $new_session_msg;
	}
	
	function update_academic_session()
	{
		$conn = db_connect();            $new_session_msg = "";
		$session = filter_input(INPUT_POST, 'session', FILTER_SANITIZE_STRING);  
		$f_term_start = filter_input(INPUT_POST, 'f_term_start', FILTER_SANITIZE_STRING);
		$ft_first_test = filter_input(INPUT_POST, 'ft_first_test', FILTER_SANITIZE_STRING);
		$ft_first_break = filter_input(INPUT_POST, 'ft_first_break', FILTER_SANITIZE_STRING);  
		$ft_mid_term = filter_input(INPUT_POST, 'ft_mid_term', FILTER_SANITIZE_STRING);
		$ft_second_test = filter_input(INPUT_POST, 'ft_second_test', FILTER_SANITIZE_STRING);
		$ft_second_break = filter_input(INPUT_POST, 'ft_second_break', FILTER_SANITIZE_STRING);  
		$f_term_exams = filter_input(INPUT_POST, 'f_term_exams', FILTER_SANITIZE_STRING);
		$f_term_end = filter_input(INPUT_POST, 'f_term_end', FILTER_SANITIZE_STRING);
		$s_term_start = filter_input(INPUT_POST, 's_term_start', FILTER_SANITIZE_STRING);  
		$st_first_test = filter_input(INPUT_POST, 'st_first_test', FILTER_SANITIZE_STRING);
		$st_first_break = filter_input(INPUT_POST, 'st_first_break', FILTER_SANITIZE_STRING);
		$st_mid_term = filter_input(INPUT_POST, 'st_mid_term', FILTER_SANITIZE_STRING);  
		$st_second_test = filter_input(INPUT_POST, 'st_second_test', FILTER_SANITIZE_STRING);
		$st_second_break = filter_input(INPUT_POST, 'st_second_break', FILTER_SANITIZE_STRING);
		$s_term_exams = filter_input(INPUT_POST, 's_term_exams', FILTER_SANITIZE_STRING);  
		$s_term_end = filter_input(INPUT_POST, 's_term_end', FILTER_SANITIZE_STRING);
		$t_term_start = filter_input(INPUT_POST, 't_term_start', FILTER_SANITIZE_STRING);
		$tt_first_test = filter_input(INPUT_POST, 'tt_first_test', FILTER_SANITIZE_STRING);  
		$tt_first_break = filter_input(INPUT_POST, 'tt_first_break', FILTER_SANITIZE_STRING);
		$tt_mid_term = filter_input(INPUT_POST, 'tt_mid_term', FILTER_SANITIZE_STRING);
		$tt_second_test = filter_input(INPUT_POST, 'tt_second_test', FILTER_SANITIZE_STRING);  
		$tt_second_break = filter_input(INPUT_POST, 'tt_second_break', FILTER_SANITIZE_STRING);
		$t_term_exams = filter_input(INPUT_POST, 't_term_exams', FILTER_SANITIZE_STRING);
		$t_term_end = filter_input(INPUT_POST, 't_term_end', FILTER_SANITIZE_STRING);
		
		$query = "UPDATE academic_calendar SET f_term_start = '{$f_term_start}', ft_first_test = '{$ft_first_test}', ft_first_break = '{$ft_first_break}', ft_mid_term = '{$ft_mid_term}', ft_second_test = '{$ft_second_test}', ft_second_break = '{$ft_second_break}', f_term_exams = '{$f_term_exams}', f_term_end = '{$f_term_end}', s_term_start = '{$s_term_start}', st_first_test = '{$st_first_test}', st_first_break = '{$st_first_break}', st_mid_term = '{$st_mid_term}', st_second_test = '{$st_second_test}', st_second_break = '{$st_second_break}', s_term_exams = '{$s_term_exams}', s_term_end = '{$s_term_end}', t_term_start = '{$t_term_start}', tt_first_test = '{$tt_first_test}', tt_first_break = '{$tt_first_break}', tt_mid_term = '{$tt_mid_term}', tt_second_test = '{$tt_second_test}', tt_second_break = '{$tt_second_break}', t_term_exams = '{$t_term_exams}', t_term_end = '{$t_term_end}' 		WHERE session = '{$session}'";

		 if ($conn->query($query) === TRUE)
		 {
			 $new_session_msg = "updated";
		 }
		 else { $new_session_msg = ' '.mysqli_error($conn); }
		
		return $new_session_msg;
	}
	
	function view_expenses()
	{
		$conn = db_connect(); 

		$query = "SELECT * FROM expenses";
		$result = $conn->query($query);
		$conn->close();
		return $result;		
	}
	
	function approve_notification($q)
	{
		$conn = db_connect();	$modified = date("Y-M-d H:i A");
		$query = "UPDATE notifications SET status = 'Approved', modified = '{$modified}' WHERE id = '{$q}'";
		 if ($conn->query($query) === TRUE)
		 {
			 $not_msg = "Approved";
		 }
		 else { $not_msg = ' '.mysqli_error($conn); }
		
		return $not_msg;
	}
	
	function decline_notification($q)
	{
		$conn = db_connect();	$modified = date("Y-M-d H:i A");
		$query = "UPDATE notifications SET status = 'Declined', modified = '{$modified}' WHERE id = '{$q}'";
		 if ($conn->query($query) === TRUE)
		 {
			 $not_msg = "Declined";
		 }
		 else { $not_msg = ' '.mysqli_error($conn); }
		
		return $not_msg;
	}
	
	
?>

