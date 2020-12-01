<?php include('includes/functions.php') ?>


<?php  
	$conn = db_connect();
	$query1 = "SELECT * FROM class1_results ORDER BY overall DESC LIMIT 1";
	$result1 = $conn->query($query1);
	$class1_row = $result1->fetch_assoc();

	$query2 = "SELECT * FROM class2_results ORDER BY overall DESC LIMIT 1";
	$result2 = $conn->query($query2);
	$class2_row = $result2->fetch_assoc();
	
	$query3 = "SELECT * FROM class3_results ORDER BY overall DESC LIMIT 1";
	$result3 = $conn->query($query3);
	$class3_row = $result3->fetch_assoc();
	
	$query4 = "SELECT * FROM class4_results ORDER BY overall DESC LIMIT 1";
	$result4 = $conn->query($query4);
	$class4_row = $result4->fetch_assoc();
	
	$query5 = "SELECT * FROM class5_results ORDER BY overall DESC LIMIT 1";
	$result5 = $conn->query($query5);
	$class5_row = $result5->fetch_assoc();
	
	$query6 = "SELECT * FROM class6_results ORDER BY overall DESC LIMIT 1";
	$result6 = $conn->query($query6);
	$class6_row = $result6->fetch_assoc();

	$conn->close();
?>

<!doctype html>
<html lang="en">

<head>
	<title>e - portal | School Management System</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	
	<!-- Latest jquery dataTables compiled and minified CSS -->
	<script src="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"></script>
	<script src="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css"></script>
	<script src="https://cdn.datatables.net/colreorder/1.3.3/css/colReorder.bootstrap.min.css"></script>
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet"> 
	<!-- ICONS -->
	<link rel="shortcut icon" href="images/e.jpg" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="css/myStyle.css"/>
	
	
</head>

<style>
	.act-btn
	{
		font-size:10px; color:#fff; padding:2px 7px;border-radius: 15px;
	}
</style>

<body>

<!-- WRAPPER -->
	<div id="wrapper">