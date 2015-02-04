//Author: Freddy Solis
//Created 2/2/2015
//Description: this file will allow the user to add a new language or 
//question to the database through ajax. This will also handle all 
//animations done to the page 


//open failed modal
function openFailedModal() {
    "use strict";
    $('#questionSubmitionFailed').modal('show');
}

//close failed modal
function closeFailedModal() {
    "use strict";
    $('#questionSubmitionFailed').modal('hide');
}

//close the add new language modal 
function closeSubmit() {
    "use strict";
    $('#addLanguageModal').modal('hide');
}

//refreshes page to show any changes done to php
function refreshPage() {
    "use strict";
    window.location.href = 'http://localhost/interviewQuest/add.php';
}

//this function submits a new language through ajax
function submitVerifiedLanguage() {
    "use strict";
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.open("GET", "http://localhost/interviewQuest/utilities.php?type=submitNewLanguage&languageName=" + $("input[name=newLanguageName]").val(), true);
    xmlhttp.send();
            
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var response = xmlhttp.responseText;//gets response output
            var error = document.getElementById("errorcode");
            if (response === "1") {
                //match found
                error.innerHTML = "Error Submitting New Language.";
            } else if (response === "0") {
                //match not found language is available
                error.innerHTML = "Language Submitted.";
                setTimeout(refreshPage(), 1000);
            }
        }
    }
}

//This function uses ajax to make sure that a language does not already exist
function verifyNewLanguage() {
    "use strict";
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.open("GET", "http://localhost/interviewQuest/utilities.php?type=checkLanguage&languageName=" + $("input[name=newLanguageName]").val(), true);
    xmlhttp.send();
            
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var response = xmlhttp.responseText;//gets response output
            var error = document.getElementById("errorcode");
            if (response === "1") {
                //match found
                error.innerHTML = "Language Already Exists";
            } else if (response === "0") {
                //match not found language is available
                error.innerHTML = "Submitting New Language...";
                submitVerifiedLanguage();
            }
        }
    }
}

//This function shows the new language modal 
function newLanguage() {
    "use strict";
    $('#addLanguageModal').modal('show');
}

//this function is called when the submit new language button is clicked
function submitNewLanguage() {
    "use strict";
    verifyNewLanguage();
}


//this shows a different form but hides other first
function makeVisible(element) {
    document.getElementById("singleAnswerForm").className = "invisible";
    document.getElementById("multipleChoiceForm").className = "invisible";
    document.getElementById("multipleAnswerForm").className = "invisible";
    element.className = "visible";
}

//this is called when the type of form element is changed
function questionTypeChange() {
    "use strict";
    var questionType = document.getElementById("questionType").value;
    if (questionType === "SA") {
        makeVisible(document.getElementById("singleAnswerForm"));
    } else if (questionType === "MC") {
        makeVisible(document.getElementById("multipleChoiceForm"));
    } else if (questionType === "MA") {
        makeVisible(document.getElementById("multipleAnswerForm"));
    }
}

//this submits validated question through ajax
function submitValidated(variables) {
    "use strict";
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.open("POST", "http://localhost/interviewQuest/utilities.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(variables);
            
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var response = xmlhttp.responseText;//gets response output
            if (response === "1") {
                //could not submit
                openFailedModal();
            } else if (response === "0") {
                //submition successful
                $("#questionSubmitted").modal('show');
            }
        }
    }
}

//This function retrieves values of single answer form and submit them to submitValidated
function submitSingleAnswer() {
    "use strict";
    var question = document.getElementById("singleAnswerQuestion").value;
    var answer = document.getElementById("singleAnswerAnswer").value;
    if ((question.length) > 0 && (answer.length) > 0) {
        var variables = "type=singleAnswerQuestion&question=" + question + "&answer=" + answer + "&languageId=" + getLanguage() + "&difficulty=" + getDifficulty();
        submitValidated(variables);
    } else {
        //form did not pass validation, cannot submit empty or null values
        document.getElementById("errorcodeQuestions").innerHTML = "Invalid Input.";
    }
}

//checks to see which answer was chosen as correct
function getRadioChecked() {
    "use strict";
    var radios = document.getElementsByName("multipleChoiceCorrectAnswer");
    var i, length = radios.length;
    for (i = 0; i < length; i += 1) {
        if (radios[i].checked) {
            // do whatever you want with the checked radio
            return radios[i].value;
        }
    }
    return "";
}

//validates the answers and questions of the multiple choice form 
function submitMultipleChoice() {
    "use strict";
    var question = document.getElementById("multipleChoiceQuestion").value;
    var answer1 = document.getElementById("multipleChoiceAnswer1").value;
    var answer2 = document.getElementById("multipleChoiceAnswer2").value;
    var answer3 = document.getElementById("multipleChoiceAnswer3").value;
    var answer4 = document.getElementById("multipleChoiceAnswer4").value;
    var correctAnswer = getRadioChecked();
    var validated = true;
    if (question.length <= 0) {
        validated = false;
    } else if (answer1.length <= 0) {
        validated = false;
    } else if (answer2.length <= 0) {
        validated = false;
    } else if (answer3.length <= 0) {
        validated = false;
    } else if (answer4.length <= 0) {
        validated = false;
    } else if (correctAnswer.length <= 0) {
        validated = false;
    }
    if (validated === true) {
        var variables = "type=multipleChoiceQuestion&question=" + question + "&answer1=" + answer1 + "&answer2=" + answer2 + "&answer3=" + answer3 + "&answer4=" + answer4 + "&correctAnswer=" + correctAnswer + "&languageId=" + getLanguage() + "&difficulty=" + getDifficulty();
        submitValidated(variables);
    } else {
        //form did not pass validation, cannot submit empty or null values
        document.getElementById("multipleChoiceError").innerHTML = "Invalid Input, All Inputs Are Required.";
    }
}

//this function retrieves 

//retrieves id of the language the question belongs to
function getLanguage() {
    "use strict";
    var languageId = document.getElementById("language").value;
    return languageId;
}

//retrieves value of difficulty of question
function getDifficulty() {
    "use strict";
    var difficulty = document.getElementById("difficulty").value;
    return difficulty;
}

