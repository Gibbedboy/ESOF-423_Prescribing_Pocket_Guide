// MDQ Diagnosis Questionnaire Scoring

var questionNum = [true, true, true, true, true, true, true, true,  true,  true,  true,  true,  true, true, 3];
let len = 0;

function initializeQuestions() {
  // let doc = document.getElementById("Questionaire");
  // len = doc.length;
  //   for (let i = 0; i < len; i++) {
  //     document.write(doc.elements[i].value + "<br>");
  //     questionNum[i] = doc.elements[i].value;
  //   }
  let doc = document.getElementsByID("Question")
  diagnose();
}

function diagnose() {
  let totalScore = 0;
  let Q1score = 0;
  // Total question 1 scores
  for (let i = 0; i < len-2; i++) {
    if(questionNum[i] == "y"){
      Q1score++;
    }
  }
  if(Q1score >= 7){
    totalScore++;
  }
  // Check if question 2 is a 'yes'
  if (Q1score > 1 && questionNum[len-2] == "y") {
    totalScore++;
  }
  // Check if question 3 is a "Moderate (3)" or "Serious (3)" Problem
  if (Number(questionNum[len-1]) > 2 ) {
    totalScore++;
  }
  document.write("<br>Diagnosis:<br>");
  printDiag(totalScore);
}

function printDiag(total) {
  document.write("Number of diagnosis questions answered as YES:  " + total + "<br>");

  // All answers are yes
  if (total > 2) {
    document.write("<br> The screen is positive for possible Bipolar I Disorder. Complete a clinical interview to make a diagnosis. This screen is not as sensitive for Bipolar II Disorder (Depression and hypomania). <br>");
  }
  else {
    document.write("<br> Not enough evidence for a positive screen of Bipolar I disorder. This screen is not as sensitive for Bipolar II Disorder (Depression and hypomania). <br>");
  }
}