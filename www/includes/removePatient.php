<?php
	$hostname = "localhost";
	$username = "group3";
	$password = "db4Group3pink";
	$db = "group3";
	$dbconnect=mysqli_connect($hostname,$username,$password,$db);
	if ($dbconnect->connect_error) {
		die("Database connection failed: " . $dbconnect->connect_error);
	}
	$ID = mysqli_real_escape_string($dbconnect, $_POST['P_ID']);
	
	$sql = "DELETE FROM Patient WHERE P_ID='$ID'";
	if(mysqli_query($dbconnect, $sql)){
		echo "Records added successfully.";
	} else{
		echo "ERROR: Could not execute";
	}
?>