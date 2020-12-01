<?php include('../includes/functions.php') ?>

<?php
		$conn = db_connect();			
		$id = $_POST["pass_subject"];
		$sql = "SELECT * FROM question_passage WHERE subject = '{$id}'";
		$result = $conn->query($sql);
		WHILE($row = $result->fetch_assoc())
		{
			$output = $row['title'];
		}
		echo $output;
		
		$conn->close();		
?>