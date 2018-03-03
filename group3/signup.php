<!DOCTYPE html>

<?php 
$navlink = "signup";
include("includes/dbLogin.php"); 
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
	<script type="text/javascript" src="assets/js/login.js?t=<?=time()?>"></script>
	<div class = "WelcomeBox">
		<h1>Welcome</h1>
		<div class = "LoginBox">
			<div class = "SubLogin">
				<form name="name">
					<input type="text" id="username" name="username" placeholder="Username">
				</form>
			</div>
			<div class = "SubLogin">
				<form name="passSignup" onsubmit="return false;" onkeypress="submitTester(this,event);">
					<input type="password" id="password" name="password" placeholder="Password" >
					<input type="submit" style="display: none" />
				</form>
			</div>
			<div class = "SubLogin">
				<form name="repassSignup" onsubmit="return false;" onkeypress="submitTester(this,event);">
					<input type="password" id="repassword" name="repassword" placeholder="Reenter Password" >
					<input type="submit" style="display: none" />
				</form>
			</div>
			
			<div class = "InlineLogin">
				<a href="signin.php">Sign In</a>
			</div>
			<div class = "InlineLogin">
				<a href="#">Forgot Password</a>
			</div>
		</div>
		<input type="button" class="button" value="Create Account" onClick="signup();">
	</div>
	</div>
</body>
</html>
