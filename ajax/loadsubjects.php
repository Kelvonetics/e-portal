<?php include('../includes/functions.php') ?>

<?php
	$conn = db_connect();			
	$output = '';  
	$sql = "SELECT * FROM subjects ORDER BY subj_no";
	$result = $conn->query($sql);
	$output = '<option value=""> Select Subject </option>';
	WHILE($row = $result->fetch_assoc())
	{
		$output .= "<option value=\"".$row['subjects']."\">".$row['value']."</option>";
	}
	echo $output;
	
	$conn->close();		
?>