<?php include('includes/functions.php') ?>

<?php
		$conn = db_connect();		 $output = '';         $q_class = $_POST["q_c"];
		if($q_class == 'entrance')
		{
			$sql = "SELECT * FROM entrance_users";
			$result = $conn->query($sql);
			$output = '<option value=""> Select Student </option>';
			WHILE($row = $result->fetch_assoc())
			{
				$output .= "<option value=\"".$row['regist_no']."\">".$row['regist_no'].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp '.$row['firstname'].' '.$row['lastname']."</option>";
			}
			echo $output;
		}
		else
		{
			$sql = "SELECT * FROM student_users WHERE class = '{$q_class}'";
			$result = $conn->query($sql);
			$output = '<option value=""> Select Student </option>';
			WHILE($row = $result->fetch_assoc())
			{
				$output .= "<option value=\"".$row['regist_no']."\">".$row['regist_no'].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp '.$row['firstname'].' '.$row['lastname']."</option>";
			}
			echo $output;
		}
		
		
		$conn->close();		
?>