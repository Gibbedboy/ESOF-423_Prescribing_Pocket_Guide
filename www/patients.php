<!DOCTYPE html>

<?php 
$navlink = "patients";
include("includes/header.php"); 
include("includes/dbLogin.php"); 
?>

<html div id="bg">
<script type="text/javascript" src="assets/js/loadPatients.js?t=<?=time()?>"></script>
<?php include("includes/modalPerson.php"); ?>
<body onload="sideNavHeight(); modalPerson();" onscroll = "sideNavHeight();">
<div class="mainContent">
	<?php include("includes/contactsNav.php"); ?>
	<div id="patientsContent">
		<h1>My Patients</h1>
		<!--<div id="highlightEach">-->
			<ul id = "categories">
				<li>Name</li><!--
				--><li>Patient ID</li><!--
				--><li>Last Updated</li><!--
				-->
			</ul>
		
			<ul id= "allPatients">
				<!--<li id="person"> Aaron | ID | Date </li>-->
			</ul>
		<!--</div>-->
	</div>
</div>

<?php
	$query = mysqli_query($dbconnect, "SELECT * FROM Patient")
		or die (mysqli_error($dbconnect));
	while ($row = mysqli_fetch_array($query)) {
		echo "<script> dbLoadPatient(".json_encode($row)."); </script>";
	}
?>

</body>
</html>