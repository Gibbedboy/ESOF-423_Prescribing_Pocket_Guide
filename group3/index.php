<!DOCTYPE html>

<?php 
$navlink = "frontPage";
?>

<html div id="bg">
<head>
	<meta charset="UTF-8">
	<title><?php include('includes/titles.php') ?> | Prescribing Pocket Guide: Online</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css?t=<?=time()?>">
	<!--<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	-->
	<link rel="shortcut icon" href="favicon.ico?t=<?=time()?>" type="image/ico" />
	
</head>

<body>
	<div id="cm-container">
		<header>
			<div class="logo">
				<a href="index.php"><img src="favicon.ico?t=<?=time()?>" height="50">
				<h1>Prescribing Pocket Guide: Online</h1> </a>
			</div>
		</header>
	</div>
	<div class="mainContent">
		<h2>The Prescribing Pocket Guide</h2>
		<p>
			The purpose of this project is to create a web application for the diagnosis of depression. 
			The application will be completely online to where users can access it from 
			anywhere with devices such as a PC or tablet. The diagnosis is based upon the 
			"Prescribing Pocket Guide 2012" for diagnosis and treatment of depression through 
			using questionnaires and scoring metrics. Modifying and creating these questionnaires
			and scoring metrics will also be a feature to allow for future expansion.
		</p><p>
			Being a 100% online service, no installation or downloads are necessary to run the product. 
			This is to allow the most freedom to the user in terms of accessibility. 
			Currently, user creation and basic user functionalities are supported through 
			the 'sign up' and 'sign in' pages respectively. However, these are very much not the final 
			iterations and are not intended for use as a secure account at this moment.
		</p><p>
			Below a link can be found that will allow for bug tracking and will automatically 
			notify and save your response for review. In doing so, please provide detailed 
			information describing what the bug is, what browser you are using, exact steps to 
			reproduce the bug, as well as the actual and expected results.
		</p>
		<input type="button" class="button" value="Try the Web App!" onClick="location.href = 'signin.php';">
		<h2>Boring Developer Stuff</h2>
		<p>
			The repository for this project can be found at: 
			<a href = "https://github.com/Gibbedboy/ESOF-423_Prescribing_Pocket_Guide">ESOF-423 Prescribing Pocket Guide</a> 
			where the latest source code can be downloaded.
		</p><p>
			The separate web pages are all contained in the root directory and are php files to 
			allow for php scripting inside of them. The pure php code as well as common shared 
			web pieces such as headers and footers are contained in the includes folder. 
			The database (DB) folder contains scripts for the generation of the database 
			as well as some default values. The 'assets' folder has most other files in it, 
			all organized into sub folders for javascript (js), pictures (images), and css (css) files.
		</p><p>
			MariaDB was used for the server database and depending on the exact database 
			information used, login information will have to be modified in the /includes/dbLogin.php file.
			Using the below database EER diagram, data can be written to, and read from 
			the database using console commands via the server using .sql scripts, or through a 
			combination of using ajax in java scripts and mysqli commands in php.
		</p><p>
			To identify the version number, current features, and track bugs locate the readme 
			file within the github repository.
		</p>
		<h2>Database EER Diagram</h2>
		<img src="assets/images/EER_3-2-18.png?t=<?=time()?>" width="800">
		<h2>Site Navigation Flowchart</h2>
		<img src="assets/images/SiteNavFlowchart.png?t=<?=time()?>" width="800">
	</div>
</body>
<?php include("includes/footer.php"); ?>
</html>
