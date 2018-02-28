<?php
	$hostname = "localhost";
	$username = "group3";
	$password = "db4Group3pink";
	$db = "group3";
	$dbconnect=mysqli_connect($hostname,$username,$password,$db);
	if ($dbconnect->connect_error) {
		die("Database connection failed: " . $dbconnect->connect_error);
	}
	
	$first_name = mysqli_real_escape_string($dbconnect, $_POST['fName']);
	$last_name = mysqli_real_escape_string($dbconnect, $_POST['lName']);
	$mid_name = mysqli_real_escape_string($dbconnect, $_POST['mName']);
	$x = mysqli_real_escape_string($dbconnect, $_POST['x']);
	$ID = mysqli_real_escape_string($dbconnect, $_POST['P_ID']);
	
	$sql = "INSERT INTO Patient(p_ID, Fname, Lname, Mname) VALUES ('$ID', '$first_name', '$last_name', '$mid_name');";
	if(mysqli_query($dbconnect, $sql)){
		echo "Records added successfully.";
	} else{
		echo "ERROR: Could not execute";
	}
?>