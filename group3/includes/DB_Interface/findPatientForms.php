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
	
	$P_ID = mysqli_real_escape_string($dbconnect, $_POST['P_ID']);
	
	//Initial loading of all Patients
	$query = mysqli_query($dbconnect, 
		"SELECT * FROM Form F
		where F.Patient_P_ID = '$P_ID';")
		or die (mysqli_error($dbconnect));
		
	//list of form lists
	$results = [];
	//for each form this patient has:
	while ($row = mysqli_fetch_array($query)) {
		$i=0;// clean up array duplicates
		while(!empty($row[$i])){
			unset($row[$i]);
			$i = $i+1;
		}
		
		$F_ID = $row["F_ID"];
		$findAns = mysqli_query($dbconnect, 
			"SELECT * FROM Answer A
			where A.Form_F_ID = '$F_ID';")
			or die (mysqli_error($dbconnect));
		$i=0;
		while($ans = mysqli_fetch_array($findAns)) {
			$j=0; // clean up array duplicates
			while(!empty($ans[$j])){
				unset($ans[$j]);
				$j = $j+1;
			}
			$row[$i] = $ans;
			$i= $i + 1;
		}
		$results[$F_ID] = $row;
	}
	echo json_encode($results);
?>