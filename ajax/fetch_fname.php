<?php include('../includes/functions.php') ?>

<?php
		$conn = db_connect();		$output = '';	
		$id = $_POST["regist_no"];
		$sql = "SELECT * FROM student_users WHERE regist_no = '{$id}'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();  $output = $row['firstname'];  
		echo trim($output," ");		
		$conn->close();		
?>