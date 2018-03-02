// PHQ-9 Diagnosis Questionnaire Scoring

var questionNum = [2, 2, 2, 2, 2, 2, 2, 2, 2, 2];

function initializeQuestions() {
  let doc = document.getElementById("Questionnaire");

  for (let i = 0; i < doc.length; i++) {
    questionNum[i] = doc.elements[i].value;
  }
  diagnose();
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



//javascript test for PHQ9Diag
var testQuestionNum = [1,1,1,1,1]
function testQuestions() {
  let testDoc = document.getElementById("test Questionnaire");
for(let i=0; i<testDoc.length; i++){
  testQuestionNum[i] = testDoc.elements[i].value;
}
testDingnose();
}

function testTotalSymptomCount() {
  let t = 0;
  for (let i = 0; i < 5; i++) {
    if (testQuestionNum[i] >= 2) {
      t++;
    }
  }
  return t;
}

function testCalcSeverity() {
  let t = 0;
  for (let i = 0; i < 5; i++) {
    t = Number(t) + Number(testQuestionNum[i]);
  }
  document.write(t + "<br>");

}

function testDingnose() {
  let s =0;
 //add up all scores
 if (testQuestionNum[0] > 1 || testQuestionNum[1] > 1) {
    s++;
  }
 if (testTotalSymptomCount() >= 5) {
   s++;
 }
  //if (testQuestionNum[4] > 0) {
 //   s++;
 //   document.write("<br>Test Question 5 was added.<br>");
 // }
  if (s !=0) {
    document.write("<br>the test runs well<br>");
  }
  document.write("<br>Severity Score:  ");
  testCalcSeverity();
}
