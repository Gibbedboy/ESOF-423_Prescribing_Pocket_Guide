<!DOCTYPE html>
<?php 
$navlink = "PHQ9";
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

<body>
<div class="mainContent">
	<script src="assets/js/PHQ9Diag.js?t=<?=time()?>"></script>
    <h1>Depression Questionnaire</h1>
    
    <form id="Questionnaire" action="/action_page.php">
      1.) Little interest or pleasure in doing things:<br> <input type="text" name="q1"><br>
      2.) Feeling down, depressed or hopeless:<br> <input type="text" name="q2"><br>
      3.) Trouble falling asleep, staying asleep, or sleeping to much:<br> <input type="text" name="q3"><br>
      4.) Feeling tired or having little energy:<br> <input type="text" name="q4"><br>
      5.) Poor appetite or overeating:<br> <input type="text" name="q5"><br>
      6.) Feeling tired or having little energy:<br> <input type="text" name="q6"><br>
      7.) Trouble concentrating on things such as reading the newspaper or watching TV:<br> <input type="text" name="q7"><br>
      8.) Moving or speaking so slowly that other people have noticed, or the opposite:<br> <input type="text" name="q8"><br>
      9.) Thought that you'd be better off dead or hurting yourself in some way:<br> <input type="text" name="q9"><br>
      10.) On a scale of 1-4, How difficult have these problems made it for you do do your work, take care of daily life, or get along with others?<br> <input type="text" name="q10"><br>
    </form>
    
	<input type="button" class="button" value="Diagnose" onClick="initializeQuestions()">
    
    <p id="display"></p>
</div> 
</body>
  
  

</html>