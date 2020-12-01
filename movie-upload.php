<?php include('includes/functions.php');

// =============  File Upload Code d  ===========================================
    $target_dir = "videos/";

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

     // Check file size -- Kept for 500Mb
    if ($_FILES["fileToUpload"]["size"] > 20000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "wmv" && $imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "MP4") {
        echo "Sorry, only wmv, mp4 & avi files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    // ===============================================  File Upload Code u  ==========================================================


    $vidname = $_FILES["fileToUpload"]["name"] . "";
    $vidsize = $_FILES["fileToUpload"]["size"] . "";
    $vidtype = $_FILES["fileToUpload"]["type"] . "";

	$pic_path = basename($_FILES['fileToUpload']['name']);
	@$page_id = $_REQUEST['page_id'];
	@$col = $_REQUEST['col'];
	$conn = db_connect();
	
	$query = "UPDATE page_content SET $col = '{$target_file}' WHERE page_id = '{$page_id}'";
   // $sql = "INSERT INTO videos (name, size, type) VALUES ('$vidname','$vidsize','$vidtype')";

    if ($conn->query($query) === TRUE)
	{
		//FUNCTION TO UNLINK/DELETE PICTURE 
		switch($col)
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
				
		header('location:add-page-content?query=uploaded');
	}
	else { header('location:add-page-content?query=failed'); }

    $conn->close();
    // =============  Connectivity for DATABASE u ===================================
?>