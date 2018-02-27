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
    document.write("<br>Question 9 was positive. Assess for suicide risk.<br>");
  }
  // If the answer is YES to 1,2, and 3, tentative diagnosis of depression
  if (score > 2) {
    document.write("<br>Tentative diagnosis of depression<br>");
  }
  document.write("<br>Severity Score:  ");
  calcSeverity();
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
  let total = 0;
  for (let i = 0; i < 9; i++) {
    total = Number(total) + Number(questionNum[i]);
  }
  document.write(total + "<br>");

  // Score is 5-9
  if (total > 5 && total < 10) {
    document.write("<br> Minimal symptoms. Support, ask to call if condition worsens, and return in 1 month. <br>");
  }
  // Score is 10-14
  else if (total > 9 && total < 15) {
    document.write("<br> Minor Depression Dysmthymia, or Major Depression Mild. Support, contact in one week. Antidepressant or psychotherapy, contact in one week. <br>");
  }
  // Score is 15-19
  else if (total > 14 && total < 20) {
    document.write("<br> Major Depression, moderate. Antidepressant or psychotherapy. <br>");
  }
  // Score is over 20
  else if (total >= 20) {
    document
    .write("<br> Major Depression, severe. Recommend antidepressants and psychotherapy (Especially if not improved on monotherapy). <br>");
  }
}


//add the test methods which aim to add up all the questions scores
//to test the first five questions
function testQuestions() {
  let testDoc = document.getElementById("test Questionnaire");
var testQuestionNum = [1,1,1,1,1]
for(let i=0; i<5 ; i++){
  testQuestionNum[i] = 3;
}
testDingnose();
}

function testTotalSymptomCount() {
  let total = 0;
  for (let i = 0; i < 5; i++) {
    if (testQuestionNum[i] >= 2) {
      total++;
    }
  }
  return total;
}

function testCalcSeverity() {
  let total = 0;
  for (let i = 0; i < 5; i++) {
    total = Number(total) + Number(testQuestionNum[i]);
  }
  document.write(total + "<br>");

}

function testDingnose() {
  let score =0;
  //add up all scores
  if (testQuestionNum[0] > 1 || testQuestionNum[1] > 1) {
    score++;
  }
  if (testTotalSymptomCount() >= 5) {
    score++;
  }
  if (testQuestionNum[4] > 0) {
    score++;
    document.write("<br>Test Question 5 was positive.<br>");
  }
  if (score > 2) {
    document.write("<br>Tentative diagnosis of depression<br>");

  }
  document.write("<br>Severity Score:  ");
  testCalcSeverity();
}
