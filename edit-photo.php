<?php include('includes/functions.php');
	$target_dir = "upload/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) 
	{
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) 
		{
			echo "File is an image - " . $check["mime"] . ".";        $uploadOk = 1;
		} 
		else 
		{       	 
			$uploadOk = 0;
		}
	}

	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	}

	else 
	{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
		{
			$pic_name = basename($_FILES["fileToUpload"]["name"]);
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			//UPDATING PHOTO DETALS TO DATABASE
			$ss_reg_no = $_SESSION['ss_reg_no'];  $ss_class = $_SESSION['ss_class'];  //$ses_pix = $_SESSION['pic_path'];
			$class_user = $ss_class .'_student_users';
			$class_result = $ss_class .'_results';
			$conn = db_connect();
			$query = "UPDATE student_users SET picture = '{$pic_name}' WHERE regist_no = '{$ss_reg_no}'";

			 if ($conn->query($query) === TRUE)
			{
				$query2 = "UPDATE $class_user SET picture = '{$pic_name}' WHERE regist_no = '{$ss_reg_no}'";

				 if ($conn->query($query2) === TRUE)
				{
					$query3 = "UPDATE $class_result SET	photo = '{$pic_name}' WHERE regist_no = '{$ss_reg_no}'";
					if ($conn->query($query3) === TRUE)	 
					{	
						$un_pic = @$_SESSION['ss_pic'];				unlink($un_pic);
						
						$upload_msg = 'uploaded';	header('location:edit-students?query=uploaded'); } 
					else { $upload_msg = ' '.$mysqli_error($conn); header('location:edit-students?query=failed');  }
				}
				else { $upload_msg = ' '.$mysqli_error($conn);	header('location:edit-students?query=failed');   }
			}
			else { $upload_msg = ' '.$mysqli_error($conn);	header('location:edit-students?query=failed');   }
			
		} 
		else 
		{
			header('location:edit-students?query=notImage');
			//echo "Sorry, there was an error uploading your file.";
		}
	}
?>	
	
	
	
	
	