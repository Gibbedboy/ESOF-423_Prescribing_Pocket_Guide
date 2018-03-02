<!DOCTYPE html>
<?php
$navlink = "PHQ9";
include("includes/header.php");
include("includes/dbLogin.php");
?>

<html div id="bg">
<script src="assets/js/Patient.js?t=<?=time()?>"></script>
<script src="assets/js/cookies.js?t=<?=time()?>"></script>
<script src="assets/js/PHQ9Diag.js?t=<?=time()?>"></script>
<script src="assets/js/createID.js?t=<?=time()?>"></script>

<body onload="startValues(getCookieDataByKey('P_ID'), getCookieDataByKey('F_ID'));"">
<div class="mainContent">
    <h1>Depression Questionnaire</h1>
    <form id="Questionnaire" action="/action_page.php">
      1.) Little interest or pleasure in doing things:<br> <input type="number" min=1 max=4 name="q1"><br>
      2.) Feeling down, depressed or hopeless:<br> <input type="number" min=1 max=4 name="q2"><br>
      3.) Trouble falling asleep, staying asleep, or sleeping to much:<br> <input type=type="number" min=1 max=4 name="q3"><br>
      4.) Feeling tired or having little energy:<br> <input type=type="number" min=1 max=4 name="q4"><br>
      5.) Poor appetite or overeating:<br> <input type="number" min=1 max=4 name="q5"><br>
      6.) Feeling tired or having little energy:<br> <input type="number" min=1 max=4 name="q6"><br>
      7.) Trouble concentrating on things such as reading the newspaper or watching TV:<br> <input type="number" min=1 max=4 name="q7"><br>
      8.) Moving or speaking so slowly that other people have noticed, or the opposite:<br> <input type="number" min=1 max=4 name="q8"><br>
      9.) Thought that you'd be better off dead or hurting yourself in some way:<br> <input type="number" min=1 max=4 name="q9"><br>
      10.) On a scale of 1-4, How difficult have these problems made it for you do do your work, take care of daily life, or get along with others?<br> <input type="number" min=1 max=4 name="q10"><br>
    </form>

	<input type="button" class="button" value="Diagnose" onClick="initializeQuestions(getCookieDataByKey('P_ID'))">
  <form id="test Questionnaire" action="/action_page.php">
    1.) Little interest or pleasure in doing things:<br> <input type="number" min=1 max=4 name="tq1"><br>
    2.) Feeling down, depressed or hopeless:<br> <input type="number" min=1 max=4 name="tq2"><br>
    3.) Trouble falling asleep, staying asleep, or sleeping to much:<br> <input type=type="number" min=1 max=4 name="tq3"><br>
    4.) Feeling tired or having little energy:<br> <input type=type="number" min=1 max=4 name="tq4"><br>
    5.) Poor appetite or overeating:<br> <input type="number" min=1 max=4 name="tq5"><br>
    <input type="button" class="button" value="testDiagnose" onClick="testQuestions(getCookieDataByKey('P_ID'))">
    <p id="display"></p>
</div>
</body>



</html>
