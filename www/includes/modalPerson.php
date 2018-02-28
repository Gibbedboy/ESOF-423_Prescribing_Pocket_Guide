<!DOCTYPE html>
<html>
<?php 
include("includes/dbLogin.php");
?>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="assets/css/modal.css?t=<?=time()?>">
	<!--<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	-->
</head>

<body>
	<script type="text/javascript" src="assets/js/modalPerson.js?t=<?=time()?>"></script>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<!-- The Modal -->
	<div id="myModal" class="modal">
	  <!-- Modal content -->
	  <div class="modal-content">
		<span class="close">&times;</span>
		<h1>New Patient </h1>
		<form id="personForm">
			<input type="text" id="fName" name="fName" placeholder="First">
			<input type="text" id="mName" name="mName" placeholder="Middle">
			<input type="text" id="lName" name="lName" placeholder="Last"><br>
			<input type="text" id="x" name="x" placeholder="X"><br>
		</form>
		<input type="button" class="button" value="Submit" onClick="addNew();">
	  </div>
	</div>
</body>
</html>