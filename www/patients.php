<!DOCTYPE html>

<?php 
$navlink = "patients";
include("includes/header.php"); 
?>

<html div id="bg">
<!--
<head>
	<title>Welcome</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="index.php?img=favicon" type="image/ico" />
</head>
-->
<script type="text/javascript" src="assets/js/loadPatients.js?t=<?=time()?>"></script>
<?php include("includes/modalPerson.php"); ?>
<body onload="loadPatients(); modalPerson();" onscroll = "sideNavHeight();">
<div class="mainContent">
	<?php include("includes/contactsNav.php"); ?>
	<div id="patientsContent">
		<h1>My Patients</h1>
		<div id="highlightEach">
			<ul id = "categories">
				<li>Name</li><!--
				--><li>X</li><!--
				--><li>Last Updated</li><!--
				-->
			</ul>
		
			<ul id= "allPatients">
				<!--
				<li id="person"> Aaron | X | Date </li>
				<li id="person">Bob | X | Date </li>
				<li id="person">Carol | X | Date </li>
				-->
			</ul>
		</div>
	</div>
</div>
</body>
</html>