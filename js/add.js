function closeSubmit() {
    "use strict";
    $('#addLanguageModal').modal('hide');
}

function refreshPage() {
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
    xmlhttp.open("GET", variables, true);
    xmlhttp.send();
            
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var response = xmlhttp.responseText;//gets response output
            var error = document.getElementById("errorcodeQuestions");
            if (response === "1") {
                //could not submit
                error.innerHTML = "Error Submitting Question.";
            } else if (response === "0") {
                //submition successful
                error.innerHTML = "Question Submitted.";
            }
        }
    }
}

function submitSingleAnswer() {
    "use strict";
    var question = document.getElementById("singleAnswerQuestion").value;
    var answer = document.getElementById("singleAnswerAnswer").value;
    if ((question.length) > 0 && (answer.length) > 0) {
        var variables = "http://localhost/interviewQuest/utilities.php?type=singleAnswerQuestion&question=" +
                question + "&answer=" + answer + "&type=SA&languageId=" + getLanguage();
        //submitValidated(variables);
    } else {
        document.getElementById("errorcodeQuestions").innerHTML = "Invalid Input.";
    }
}

function getLanguage() {
    "use strict";
    var languageId = document.getElementById("language").value;
    return languageId;
}

