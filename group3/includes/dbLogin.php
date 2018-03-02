<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<?php
	$hostname = "localhost";
	$username = "group3";
	$password = "db4Group3pink";
	$db = "group3";
	$dbconnect=mysqli_connect($hostname,$username,$password,$db);

	if ($dbconnect->connect_error) {
		die("Database connection failed: " . $dbconnect->connect_error);
	}
?>