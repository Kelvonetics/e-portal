<?php include('../includes/functions.php') ?>

<?php
		$conn = db_connect();			
		$id = $_POST["regist_no"];
		$sql = "SELECT * FROM student_users WHERE regist_no = '{$id}'";
		$result = $conn->query($sql);
		WHILE($row = $result->fetch_assoc())
		{
			$output = $row['class'];
		}
		echo $output;
		
		$conn->close();		
?>