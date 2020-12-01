<?php include('includes/functions.php');


	$target_dir = "upload/slider/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) 
	{
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";        $uploadOk = 1;
		} else 
		{
			echo "File is not an image.";        $uploadOk = 0;
			if($_REQUEST['query'] == 'slider')			header('location:add-page-content?query=fake');
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) 
	{
		echo "Sorry, file already exists.";    $uploadOk = 0;
			if($_REQUEST['query'] == 'slider')			header('location:add-page-content?query=exist');
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 1000000) 
	{
		echo "Sorry, your file is too large.";    $uploadOk = 0;
			if($_REQUEST['query'] == 'slider')			header('location:add-page-content?query=size');
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") 
	{
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    $uploadOk = 0;
			if($_REQUEST['query'] == 'slider')			header('location:add-page-content?query=format');
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) 
	{
		echo "Sorry, your file was not uploaded.";
			if($_REQUEST['query'] == 'slider')			header('location:add-page-content?query=failed');
	// if everything is ok, try to upload file
	} 
	else 
	{
		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
		{
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			$_SESSION['pic_path'] = basename($_FILES['fileToUpload']['name']);			
			$_SESSION['pix_path'] = basename($_FILES['fileToUpload']['name']);
			//echo '<img src="upload/'.basename($_FILES['fileToUpload']['name']).'" />';
			
			$pic_path = basename($_FILES['fileToUpload']['name']);
			@$page_id = $_REQUEST['page_id'];
			@$column = $_REQUEST['column'];
			$conn = db_connect();
			$query = "UPDATE page_content SET $column = '{$target_file}' WHERE page_id = '{$page_id}'";

			 if ($conn->query($query) === TRUE)
			{
				//FUNCTION TO UNLINK/DELETE PICTURE 
				switch($column)
				{
					case "footer_1" : 				$un_pic = @$_SESSION['footer_1'];				unlink($un_pic);     break;
					case "footer_2" : 				$un_pic = @$_SESSION['footer_2'];				unlink($un_pic);     break;
					case "footer_3" : 				$un_pic = @$_SESSION['footer_3'];				unlink($un_pic);     break;
					case "footer_4" : 				$un_pic = @$_SESSION['footer_4'];				unlink($un_pic);     break;
					case "footer_5" : 				$un_pic = @$_SESSION['footer_5'];				unlink($un_pic);     break;
					case "footer_6" : 				$un_pic = @$_SESSION['footer_6'];				unlink($un_pic);     break;
					case "footer_7" : 				$un_pic = @$_SESSION['footer_7'];				unlink($un_pic);     break;
					case "footer_8" : 				$un_pic = @$_SESSION['footer_8'];				unlink($un_pic);     break;
					case "footer_9" : 				$un_pic = @$_SESSION['footer_9'];				unlink($un_pic);     break;
					case "footer_10" : 				$un_pic = @$_SESSION['footer_10'];				unlink($un_pic);     break;
					//default :   ;
				}
				
				/*$query2 = "SELECT * from page_content WHERE page_id = '{$page_id}'";
				$result2 = $conn->query($query2);
				if($result2)
				{
					$p = $result2->fetch_assoc();  
					$_SESSION['t1'] = $p['title_1'];		$_SESSION['c1'] = $p['content_1'];		$_SESSION['f1'] = $p['footer_1'];
				}*/
				
				header('location:add-page-content?query=uploaded');
			}
			else { header('location:add-page-content?query=failed'); }
		} 
		else
		{
			echo "Sorry, there was an error uploading your file.";
		}
	}
?>