//Author: Freddy Solis
//Date: February 4th, 2015
//Description: This file will host all functions that will
//animate the start.php file as well as handle validation of page inputs


//show error modal with custom message
function showError(message) {
    document.getElementById("errorCode").innerHTML = message;
    $("#validationFailed").modal('show');   
}

//hide error modal and remove custom message
function closeError() {
    document.getElementById("errorCode").innerHTML = "";
    $("#validationFailed").modal('hide');
}

//show continuation modal
function showContinuation(url) {
    var finalUrl = "test.php" + url;
    var finalButton = document.getElementById("finalButton");
    finalButton.setAttribute("href",finalUrl);
    $("#continueModal").modal('show');
}

//hide continuation modal
function closeContinueModal() {
    var finalButton = document.getElementById("finalButton");
    finalButton.removeAttribute("href");
    $("#continueModal").modal('hide');
}

//change active difficulty button 
function changeActiveButton(name) {
    "use strict";
     var buttons = document.getElementsByName("difficulty");
    var i, length = buttons.length;
    for (i = 0; i < length; i += 1) {
        if (buttons[i].hasAttribute('id', 'chosen')) {
            buttons[i].removeAttribute('id', 'chosen');
        }
        if (buttons[i].innerHTML === name) {
            buttons[i].setAttribute('id', 'chosen');
        }
    }
}

//check to see if passed array has duplicate values
function checkIfDuplicates(passedArray) {
    "use strict";
    
    var sorted_arr = passedArray.sort();
    for (var i = 0; i < sorted_arr.length - 1; i += 1) {
        if (sorted_arr[i + 1] == sorted_arr[i]) {
            //return true that a duplicate was found
            return true;
        }
    }
    //no duplicate was found
    return false;   
}

//retrieve selected languages
function getLanguages() {
    "use strict";
    var language1 = document.getElementById("language1").value;
    var language2 = document.getElementById("language2").value;
    var language3 = document.getElementById("language3").value;
    var language4 = document.getElementById("language4").value;
    var language5 = document.getElementById("language5").value;
    var numberOfValid = 0;
    var checkDuplicates = new Array();
    var final = "?type=startQuiz";
    if (language1 > 0) {
        numberOfValid += 1;
        final = final + "&1LangId=" + language1;
        checkDuplicates.push(language1);
    }
    if (language2 > 0) {
        if (numberOfValid < 1) {
            showError("Invalid order of chosen topics.");
            return "failed";
        } else {
            numberOfValid += 1;
            final = final + "&2LangId=" + language2;
            checkDuplicates.push(language2);
        }
    }
    if (language3 > 0) {
        if (numberOfValid < 2) {
            showError("Invalid order of chosen topics.");
            return "failed";
        } else {
            numberOfValid += 1;
            final = final + "&3LangId=" + language3;
            checkDuplicates.push(language3);
        }
    }
    if (language4 > 0) {
        if (numberOfValid < 3) {
            showError("Invalid order of chosen topics.");
            return "failed";
        } else {
            numberOfValid += 1;
            final = final + "&4LangId=" + language4;
            checkDuplicates.push(language4);
        }
    }
    if (language5 > 0) {
        if (numberOfValid < 4) {
            showError("Invalid order of chosen topics.");
            return "failed";
        } else {
            numberOfValid += 1;
            final = final + "&5LangId=" + language5;
            checkDuplicates.push(language5);
        }
    }
    
    if (numberOfValid === 0) {
        showError("Please choose a topic.");
        return "failed";
    } else if (checkIfDuplicates(checkDuplicates)) {
        showError("Duplicate topics chosen. Please choose one of each.");
        return "failed";
    }else {
        final = final + "&numberOfTopics=" + numberOfValid;
        return final;
    }
}

//retrieve difficulty of questions
function getDifficulty() {
    "use strict";
    var buttons = document.getElementsByName("difficulty");
    var i, length = buttons.length;
    for (i = 0; i < length; i += 1) {
        if (buttons[i].hasAttribute('id', 'chosen')) {
            var name = buttons[i].innerHTML;
            if (name === "Entry Level") {
                return "&difficulty=1";   
            } else if (name === "Experienced") {
                return "&difficulty=2";   
            } else if (name === "Advanced") {
                return "&difficulty=3";   
            } else if (name === "Senior Level") {
                return "&difficulty=4";   
            }
        }
    }
    showError("Please select a difficulty");
    return "failed";
}

//this retrieves the selected test size
function getSize() {
    "use strict";
    var size = "&size=" + document.getElementById("size").value;
    return size;
}

//starts validation, user has clicked submit
function submitClicked() {
    "use strict";
    var languages = getLanguages();
    if (languages !== "failed") {
        var difficulty = getDifficulty();
        if (difficulty !== "failed") {
            var size = getSize();
            var url = languages + difficulty + size;
            showContinuation(url);
        }
    }
    
}