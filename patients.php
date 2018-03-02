<!DOCTYPE html>

<?php 
$navlink = "patients";
include("includes/header.php"); 
include("includes/dbLogin.php"); 
?>

<html div id="bg">
<script src="assets/js/Patient.js?t=<?=time()?>"></script>
<script src="assets/js/cookies.js?t=<?=time()?>"></script>
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
					<!--FORMAT: <li id="person"> Aaron Last | ID | Date </li>-->
				</ul>
			<!--</div>-->
		</div>
	</div>
<?php
	//Initial loading of all Patients
	$query = mysqli_query($dbconnect, 
		"SELECT * FROM Patient P
		join User_has_Patient UP on UP.Patient_P_ID = P.P_ID
		where UP.User_U_ID = '$userID';")
		or die (mysqli_error($dbconnect));
	while ($row = mysqli_fetch_array($query)) {
		echo "<script> dbLoadPatient(".json_encode($row)."); </script>";
	}
?>
</body>
</html>