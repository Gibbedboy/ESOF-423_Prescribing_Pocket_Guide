// PHQ-9 Diagnosis Questionnaire Scoring

var questionNum = [2, 2, 2, 2, 2, 2, 2, 2, 2, 2];

function startValues(P_ID, F_ID){
	if(F_ID != "" && P_ID !=""){
		var p = new Patient().dbFindConstructor(P_ID);
		p.loadAnsFromDB(2);
	}
}
function addStartValues(patient){
	var F_ID = getCookieDataByKey('F_ID');
	let doc = document.getElementById("Questionnaire");
	//populate with previous form
	for (let i = 0; i < doc.length; i++) {
		doc.elements[i].value = patient.ansPHQ9[F_ID][i]["ans"];
	}
	
}

function initializeQuestions(P_ID) {
	var p = new Patient().dbFindConstructor(P_ID);
  let doc = document.getElementById("Questionnaire");
  var filled = true;
  for (let i = 0; i < doc.length; i++) {
    questionNum[i] = doc.elements[i].value;
	filled = filled && questionNum[i] != "";
  }
  var F_ID = getCookieDataByKey('F_ID');
  if(F_ID !=""){
	  diagnose();
  }
  else if(filled){
	  diagnose();
	  p.addAnsToDB(questionNum);
	  document.location.href = "patients.php";
		window.location.href = "patients.php";
  }else{
	  alert("Form not Complete");
  }
}

function diagnose() {
	let result="";
	result+="Severity Score:  ";
  result+=calcSeverity();
  let score = 0;
  // Total the scores
  if (questionNum[0] > 1 || questionNum[1] > 1) {
    score++;
  }
  if (totalSymptomCount() >= 5) {
    score++;
  }
  if (questionNum[9] > 0) {
    score++;
    result+="Question 9 was positive; assess for suicide risk.\n";
  }
  // If the answer is YES to 1,2, and 3, tentative diagnosis of depression
  if (score > 2) {
    result+="Tentative diagnosis of depression\n";
  }
  
  //Write Result to paragraph section
  document.getElementById("display").textContent=result;
}

function totalSymptomCount() {
  let total = 0;
  for (let i = 0; i < 8; i++) {
    if (questionNum[i] >= 2) {
      total++;
    }
  }
  if (questionNum[8] > 0) {
    total++;
  }
  return total;
}

function calcSeverity() {
	let result="";
  let total = 0;
  for (let i = 0; i < 9; i++) {
    total = Number(total) + Number(questionNum[i]);
  }
  result += total.toString() + "\n";

  // Score is 5-9
  if (total > 5 && total < 10) {
    result+="\nMinimal symptoms. Support, ask to call if condition worsens, and return in 1 month. \n";
  }
  // Score is 10-14
  else if (total > 9 && total < 15) {
    result+="\nMinor Depression Dysmthymia, or Major Depression Mild. Support, contact in one week. Antidepressant or psychotherapy, contact in one week. \n";
  }
  // Score is 15-19
  else if (total > 14 && total < 20) {
    result+="\nMajor Depression, moderate; antidepressant or psychotherapy. \n";
  }
  // Score is over 20
  else if (total >= 20) {
    result+="\nMajor Depression, severe; recommend antidepressants and psychotherapy (Especially if not improved on monotherapy). \n";
  }
  return result;
}