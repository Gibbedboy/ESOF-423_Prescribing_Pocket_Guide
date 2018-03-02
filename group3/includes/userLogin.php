<?php
	$hostname = "localhost";
	$username = "group3";
	$password = "db4Group3pink";
	$db = "group3";
	$dbconnect=mysqli_connect($hostname,$username,$password,$db);
	if ($dbconnect->connect_error) {
		die("Database connection failed: " . $dbconnect->connect_error);
	}
	$user = mysqli_real_escape_string($dbconnect, $_POST['user']);
	$pass = mysqli_real_escape_string($dbconnect, $_POST['pass']);
	
	$sql = "SELECT * FROM User WHERE username='$user' and password='$pass'";
	$ans = mysqli_query($dbconnect, $sql);
	if ($row = mysqli_fetch_array($ans)) {
		//echo "".json_encode($row);
		if($row["password"] == $pass){
			session_start();
			$_SESSION['userID'] = $user;
			echo 0;
		}
	}else{
		echo 1;
	}
?>