function closeSubmit() {
    "use strict";
    $('#addLanguageModal').modal('hide');
}

function refreshPage() {
    "use strict";
    window.location.href = 'http://localhost/interviewQuest/add.php';
}

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



function newLanguage() {
    "use strict";
    $('#addLanguageModal').modal('show');
}

function submitNewLanguage() {
    "use strict";
    verifyNewLanguage();
}



function makeVisible(element) {
    document.getElementById("singleAnswerForm").className = "invisible";
    document.getElementById("multipleChoiceForm").className = "invisible";
    document.getElementById("multipleAnswerForm").className = "invisible";
    element.className = "visible";
}

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
                alert("Error Submitting Question.");
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
        var variables = "type=singleAnswerQuestion&question=" +
                question + "&answer=" + answer + "&languageId=" + getLanguage();
        submitValidated(variables);
    } else {
        //form did not pass validation, cannot submit empty or null values
        document.getElementById("errorcodeQuestions").innerHTML = "Invalid Input.";
    }
}

function getRadioChecked() {
    "use strict";
    var radios = document.getElementsByName("inlineRadioOptions");
    var i, length = radios.length;
    for (i = 0; i < length; i += 1) {
        if (radios[i].checked) {
            // do whatever you want with the checked radio
            return radios[i].value;
        }
    }
    return "";
}

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
        var variables = "type=multipleChoiceQuestion&question=" + question + "&answer1=" + answer1 + "&answer2=" + answer2 + "&answer3=" + answer3 + "&answer4=" + answer4 + "&correctAnswer=" + correctAnswer + "&languageId=" + getLanguage();
        submitValidated(variables);
    } else {
        //form did not pass validation, cannot submit empty or null values
        document.getElementById("multipleChoiceError").innerHTML = "Invalid Input, All Inputs Are Required.";
    }
}

function getLanguage() {
    "use strict";
    var languageId = document.getElementById("language").value;
    return languageId;
}


