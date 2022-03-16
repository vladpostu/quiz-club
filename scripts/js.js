// DOM ELEMENTS
const main_container = document.querySelector('#container');
const container = document.querySelector("#question_container");
const question_text = document.querySelector("#question_text");
const correct_answer_text = document.querySelector("#correct_answer");
const question_tag = document.querySelector("#question_id");
const next_question_button = document.querySelector("#next_question_button");
const prev_question_button = document.querySelector("#prev_question_button");
let answers = document.querySelectorAll(".answer");
const submit_button = document.querySelector('#submit_button');
const right_answers = document.querySelector('right_answers');
const modal_body = document.querySelector('.modal-body'); 
let token = document.querySelector('#token');
console.log(token.value);
// ============================================================================================

// SETUP
let resultJson, question, correct_answer;
let idCurrentQuestion, score;
let rightAnswers = [];

setUp(); // setup funciton

// ============================================================================================

// EVENT LISTENERS

next_question_button.addEventListener("click", nextQuestion);
prev_question_button.addEventListener("click", prevQuestion);

// =============================================================================================

// FUNCTIONS

// setup function that updates the varibales DOM and handle events
async function setUp() {
  resultJson = await getResultJson();

  // console.log(resultJson[0].incorrect_answers[0])

  idCurrentQuestion = 0;
  score = 0;

  question_text.innerHTML = resultJson[0].question;
  question_tag.innerHTML = idCurrentQuestion + 1;

  for(let i=0; i<resultJson.length; i++) {
    let element = document.createElement('div');
    element.textContent = i + 1 + ') ' + resultJson[i].correct_answer;
    modal_body.appendChild(element);
  }

  setAnswers(0);
  handleButtonState(); 
}

// return the json data from fetch function
async function getResultJson() {
  let data = await fetch("https://opentdb.com/api.php?amount=10&token="+token.value)
    .then((response) => response.json())
    .then((data) => data.results);

  console.log(data);

  return data;
}

// setup the answers
function setAnswers(id) {
  correct_answer = resultJson[id].correct_answer;
  answers = document.querySelectorAll(".answer-div");

  if (answers.length != 0) {
    answers.forEach((answer) => container.removeChild(answer));
  }

  for (let i = 0; i < resultJson[id].incorrect_answers.length; i++) {
    let answer_div = document.createElement("div");
    answer_div.classList.add('answer-div');

    let answer = document.createElement("input");
    answer.setAttribute("type", "radio");
    answer.setAttribute('name', 'answer-value');
    answer.setAttribute('id', i);
    answer.value = resultJson[id].incorrect_answers[i];
    answer.classList.add("answer");

    let label = document.createElement("label");
    label.setAttribute('for', i);
    label.innerHTML = resultJson[id].incorrect_answers[i];

    answer_div.appendChild(answer);
    answer_div.appendChild(label);
    answer_div.appendChild(document.createElement("br"));

    container.appendChild(answer_div);
  }

  let answer_div = document.createElement("div");

  let answer = document.createElement("input");
  answer.setAttribute("type", "radio");
  answer.setAttribute('name', 'answer-value');
  answer.setAttribute('id', 4);
  answer.value = resultJson[id].correct_answer;
  answer.classList.add("answer");

  let label = document.createElement("label");
  label.setAttribute('for', 4);
  label.innerHTML = resultJson[id].correct_answer;

  answer_div.appendChild(answer);
  answer_div.appendChild(label);
  answer_div.classList.add('answer-div');

  container.appendChild(answer_div);

  // answers event listeners, tracks the changed answers
  let oldScore = score;
  answers = document.querySelectorAll(".answer");

  answers.forEach((answer, i=0) => {
    

    answer.addEventListener("click", () => {
      if (answer.checked && answer.value == correct_answer) {
        console.log(answer.value);
        score++;
        submit_button.value = score;
      } else {
        console.log(oldScore);
        score = oldScore;
        submit_button.value = score;
      }
    });
  });

  mixRandomlyAnswers();
}

//set next question
function nextQuestion() {
  if (idCurrentQuestion < 9) {
    idCurrentQuestion++;
  }

  correct_answer = resultJson[idCurrentQuestion].correct_answer;
  question_tag.innerHTML = idCurrentQuestion + 1;
  question_text.innerHTML = resultJson[idCurrentQuestion].question;
  setAnswers(idCurrentQuestion);
  handleButtonState();
}

//set prev question
function prevQuestion() {
  if (idCurrentQuestion > 0) {
    idCurrentQuestion--;
  } else {
    prev_question_button.setAttribute()
  }

  correct_answer = resultJson[idCurrentQuestion].correct_answer;
  question_tag.innerHTML = idCurrentQuestion + 1;
  question_text.innerHTML = resultJson[idCurrentQuestion].question;
  setAnswers(idCurrentQuestion);
  handleButtonState();
}

// swap children function
function mixRandomlyAnswers() {
  answers = document.querySelectorAll(".answer-div");

  for (let j = 0; j < 3; j++) {
    for (let i = 0; i < answers.length; i++) {
      if (randomBool()) {
        if (i == answers.length - 1) {
          answers[i].parentNode.insertBefore(answers[0], answers[i]);
        } else {
          answers[i].parentNode.insertBefore(answers[i + 1], answers[i]);
        }
      }
    }
  }
}

// return randomly true or false
function randomBool() {
  if (Math.random() > 0.5) {
    return true;
  } else {
    return false;
  }
}

function handleButtonState() {
  if(idCurrentQuestion == 0) {
    prev_question_button.setAttribute('disabled', false);
  } else {
    prev_question_button.removeAttribute('disabled');
  }

  if(idCurrentQuestion == 9) {
    next_question_button.setAttribute('disabled', true);
  } else {
    next_question_button.removeAttribute('disabled');
  }
 }


 function seeAnsers() {
   rightAnswers.forEach((answer, i=0) => {
     let container = document.createElement('div');
     container.innerHTML = i+1 + " " + answer;
     console.log(rightAnswers);

     right_answers.appendChild(container);
   })
 }

