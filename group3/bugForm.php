<!DOCTYPE html>

<?php 
$navlink = "frontPage";
?>
<script>
	var hash = window.location.hash.substr(1);
	if(hash != ""){
		alert(JSON.parse(hash));
	}
</script>
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
		<form action="includes/bug-form-handler.php" method="post" name="contactform">
			<input type="text" name="name" placeholder="Name"><br><br>
			<input type="text" name="email" placeholder="Email Address"><br><br>
			<textarea rows="10" name="message" placeholder="Message" ></textarea><br><br>
			<input id="submitBtn" type="submit" name="submit" value="Send Message">
		</form>
	<!--
		<form id = "bugForm">
			<label for="name">Name: </label>
			<input id="name" name="name" placeholder="Name" />

			<label for="message">Message: </label>
			<textarea id="message" name="message" rows="10" placeholder="Please detail your bug"></textarea>

			<label for="email"><em>Your</em> Email Address:</label>
			<input id="email" name="email" type="email" value="" placeholder="your.name@email.com"/>
			<span id="email-invalid" style="display:none">Must be a valid email address</span>

			<input type="button" class="button" value="Try the Web App" onClick="location.href = 'signin.php';">
		</form>		
	-->
	</div>
</body>
</html>