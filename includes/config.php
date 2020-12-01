<?php 
function db_connect()
	{
		$servername = "localhost";
		$username = "root";     		
		$password = "";					
		$dbname = "eportal_db";       
        

		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		} 
		
		return $conn;
		$conn->close();
	}
?>

<?php /*?><?php session_start(); 


	function db_connect()
	{ 
		$DBconnect = mysql_connect("localhost", "root", "");
			if(!$DBconnect)
			{
				die("DataBase Connection Failed :" . mysql_error());
			} 
			
			$DB_select = mysql_select_db("eportal_db", $DBconnect);
			if(!$DB_select)
			{
				die("DataBase Selection Failed :" . mysql_error());
			} 
	}



	function logged_in()
	{
		@$_SESSION['id'] = $sessID;
		return isset($_SESSION['regist_no']);
	}

	function confirm_login()
	{
	 if(!logged_in())  
		 { 
		 header('location:admin-area.php?query=notlogedin'); 
		 } 
	}

 ?><?php */?>