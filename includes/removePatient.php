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
	}
	$ID = mysqli_real_escape_string($dbconnect, $_POST['P_ID']);
	
	$sql = "DELETE FROM Patient WHERE P_ID='$ID';";
	$sql2 = "DELETE FROM User_has_Patient WHERE Patient_P_ID='$ID' and User_U_ID = '$userID';";
	
	if(mysqli_query($dbconnect, $sql2) && mysqli_query($dbconnect, $sql)){
		echo "Successfully Deleted Patient.";
	} else{
		echo "ERROR: Could not execute";
	}
?>