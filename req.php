
<?php
	

	$conn_error = "Could not Connected";
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'onlinequiz';

	//Create mysqli object
	$mysqli = new mysqli($host,$user,$pass,$db);

	//Error handler
	if($mysqli->connect_error){
		printf("Connect failed: %s\n",$mysqli->connect_error);
		exit;
	}

	$conn = mysqli_connect($host, $user, $pass) or die ($conn_error);
	//echo "Connected";
	mysqli_select_db($conn, $db) or die ($conn_error);
	//echo "Connected";

?>