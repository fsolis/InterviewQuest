//Author: Freddy Solis
//Date: February 25, 2015
//Description: This script will validate data and process data 
// to properly send contact information over email. 

//this function uses a regualr expression to validate email.
function validateEmail(email) {
    "use strict";
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

//this function will make sure something was input into 
//each of the inputs
function validate(input) {
    "use strict";
    if (input.length <= 0) {
        return false;
    } else {
        return true;
    }
       
}

//this fucntion will display whatever error 
//is found to the modal
function setError(error) {
    "use strict";
    var errorElement = document.getElementById("errorcode");
    errorElement.innerHTML = error;
}


//this function will make sure inputs are valid and verify email
//will return false if non valid or a string ready for POST
function getVariables() {
    "use strict";
    var firstName, lastName, email, comments, final = "";
    firstName = $('#firstName').val();
    lastName = $('#lastName').val();
    email = $('#email').val();
    comments = $('#comments').val();
    if (validate(firstName)) {
        final = "type=email&firstName=" + firstName;
        if (validate(lastName)) {
            final = final + "&lastName=" + lastName;
            if (validate(email)) {
                if (validateEmail(email)) {
                    final = final + "&email=" + email;
                    if (validate(comments)) {
                        return final + "&comments=" + comments;
                    } else {
                        setError("Please enter a comment.");
                        return "";
                    }
                } else {
                    setError("Invalid email.");
                    return "";
                }
            } else {
                setError("Please enter an email.");
                return "";
            }
        } else {
            setError("Please enter your last name.");
            return "";
        }
    } else {
        setError("Please enter your first name.");
        return "";
    }
}



//this function gets called when send email button is clicked
function attemptContact() {
    "use strict";
    var variables = getVariables();
    if (variables) {
        sendEmail(variables);
    }
}


//hides contact modal
function hideContactForm() {
    $("#contact").modal('hide');
}

//shows feedback modal
function showFeedback() {
  $("#feedback").modal('show');
  document.getElementById("cancelButton2").innerHTML = "Sending..";
  $("#cancelButton2").prop('disabled',true);
}

//this function will send variables through ajax, which will submit the information
function sendEmail(variables) {
    "use strict";
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();   
    }
    
    xmlhttp.open("POST","http://localhost/interviewQuest/email.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(variables);
    hideContactForm();
    document.getElementById("feedbackText").innerHTML="This might take a few seconds. Thank you for submitting your comment.";
    showFeedback();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var response = xmlhttp.responseText;
            document.getElementById("feedbackText").innerHTML = response;
            $("#cancelButton2").prop('disabled', false);
            document.getElementById("cancelButton2").innerHTML = "Close";
            clearForm();
        }
    }
    
}