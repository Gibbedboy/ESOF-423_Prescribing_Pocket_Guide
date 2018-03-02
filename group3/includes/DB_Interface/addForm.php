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
	
	$F_ID = mysqli_real_escape_string($dbconnect, $_POST['F_ID']);
	$P_ID = mysqli_real_escape_string($dbconnect, $_POST['P_ID']);
	$numQ = mysqli_real_escape_string($dbconnect, $_POST['numQ']);
	if($numQ != 10){
		echo "ERROR: Form Not Completed.";
		return;
	}
	$array = array();
	for ($i = 0; $i < $numQ; $i++) {
		array_push($array, mysqli_real_escape_string($dbconnect, $_POST[$i]));
	} 
	//echo("".json_encode($array));
	
	$sql = "INSERT INTO Form(F_ID, Questionnaire_Q_ID, Patient_P_ID) VALUES('$F_ID', '1', '$P_ID');";
	$success = mysqli_query($dbconnect, $sql);
	for ($i = 1; $i < $numQ + 1 && $success; $i++) {
		$x = $array[$i-1];
		$ansInsert = "INSERT INTO Answer(ans, Question_Qu_ID, Form_F_ID) VALUES('$x', '$i', '$F_ID');";
		$success = $success && mysqli_query($dbconnect, $ansInsert);
	}
	if($success){
		echo "Records added successfully.";
	} else{
		echo "ERROR: Could not execute";
	}
?>