<?php include('../includes/functions.php') ?>

<?php
	$conn = db_connect();			
	$output = '';  
	$sql = "SELECT * FROM marks ";
	$result = $conn->query($sql);
	$output = '<option value=""> Select Marks </option>';
	WHILE($row = $result->fetch_assoc())
	{
		$output .= "<option value=\"".$row['marks']."\">".$row['values']."</option>";
	}
	echo $output;
	
	$conn->close();		
?>