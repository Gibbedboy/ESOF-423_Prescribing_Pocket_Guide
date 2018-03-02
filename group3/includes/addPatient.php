<?php
	session_start(); 
	$userID = $_SESSION['userID'];
	
	$hostname = "localhost";
	$username = "group3";
	$password = "db4Group3pink";
	$db = "group3";
	$dbconnect=mysqli_connect($hostname,$username,$password,$db);
	if ($dbconnect->connect_error) {
		die("Database connection failed: " . $dbconnect->connect_error);
		exit();
	}
	
	$first_name = mysqli_real_escape_string($dbconnect, $_POST['fName']);
	$last_name = mysqli_real_escape_string($dbconnect, $_POST['lName']);
	$mid_name = mysqli_real_escape_string($dbconnect, $_POST['mName']);
	$x = mysqli_real_escape_string($dbconnect, $_POST['x']);
	$ID = mysqli_real_escape_string($dbconnect, $_POST['P_ID']);
	
	$sql = "INSERT INTO Patient(p_ID, Fname, Lname, Mname) VALUES ('$ID', '$first_name', '$last_name', '$mid_name');";
	$sql2 = "INSERT INTO User_has_Patient(User_U_ID, Patient_P_ID) VALUES ('$userID', '$ID');";
	if(mysqli_query($dbconnect, $sql) && mysqli_query($dbconnect, $sql2)){
		echo "Records added successfully.";
	} else{
		echo "ERROR: Could not execute";
	}
?>