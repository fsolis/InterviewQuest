//Author: Freddy Solis
//Created: 2/8/2014
//Description: This file will validate and check all questions
//and their answers for a php rendered test

function disableButtons(nameOfButton, change, displayButton) {
    "use strict";
    var finalscore = document.getElementById("finalscore");
    var score = finalscore.innerHTML;
    if ((change - 0) === 1) {
        displayButton.className = "btn btn-success";
        finalscore.innerHTML = (score - 0) + 1;
    } else {
        displayButton.className = "btn btn-danger";
    }
    nameOfButton.style.display = "none";
}

function checkMultipleChoice(nameOfRadio, feedbackButton) {
    "use strict";
    var check = false;
    for( var i = 0; i < nameOfRadio.length; i++) {
        if( nameOfRadio[i].checked){
            if ((nameOfRadio[i].value - 0) === 1) {
                check = true;   
            }
        }
    }
    if(check === true) {
        if (feedbackButton.className === "btn btn-primary") {
            var finalScore = document.getElementById("finalscore");
            var score = finalScore.innerHTML;
            finalScore.innerHTML = (score - 0) + 1;
            feedbackButton.className = "btn btn-success";
        } else {
             feedbackButton.className = "btn btn-success";  
        }
    } else {
        feedbackButton.className = "btn btn-danger";    
    }
       
}

function checkMultipleAnswer(inputCheck, feedbackButton) {
    "use strict";   
    var check = true;
    for( var i = 0; i < inputCheck.length; i++) {
        if(inputCheck[i].checked) {
            if ((inputCheck[i].value - 0) === 0) {
                check = false;   
            }
        } else if ((inputCheck[i].value - 0) === 1){
               check = false;
        }
    }
    
    if(check === true) {
        if (feedbackButton.className === "btn btn-primary") {
            var finalScore = document.getElementById("finalscore");
            var score = finalScore.innerHTML;
            finalScore.innerHTML = (score - 0) + 1;
            feedbackButton.className = "btn btn-success";
        } else {
             feedbackButton.className = "btn btn-success";  
        }
    } else {
        feedbackButton.className = "btn btn-danger";
    }
}
