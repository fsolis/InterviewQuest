$(document).ready(function () {
       
    $("input[name=username]").change(function () {
        var xmlhttp;
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.open("GET", "http://localhost/interviewQuest/utilities.php?type=checkusername&username=" + $("input[name=username]").val(), true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                var response = xmlhttp.responseText;//gets response output
                if (response === "1") {
                    //match was found
                    usernameFailed();
                    
                } else {
                    //match not found, username is available
                    usernamePassed();
                }
            }
        }
    });//end username.change
    
    $("input[name=email]").change(function () {
            
        var xmlhttp;
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.open("GET", "http://localhost/interviewQuest/utilities.php?type=checkemail&email=" + $("input[name=email]").val(), true);
        xmlhttp.send();
            
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                var response = xmlhttp.responseText;//gets response output
                var email = document.getElementById("emailfeedback");
                if (response === "1") {
                    //match found
                    emailFailed();
                } else {
                    //match not found email is available
                    emailPassed();
                }
            }
        }
        
    });//end email.change
    
        

});//end document.ready

function usernameFailed() {
    var submitButton = document.getElementById("submitbutton");
    var username = document.getElementById("usernamefeedback");
    var usernameFeedback = document.getElementById("usernamesybmol");
    submitButton.disabled = true;
    username.setAttribute("class", "form-group has-error has-feedback");
    
}

function usernamePassed() {
    var submitButton = document.getElementById("submitbutton");
    var username = document.getElementById("usernamefeedback");
    var email = document.getElementById("emailfeedback");
    if (email.className != "form-group has-error has-feedback") {
        submitButton.disabled = false;
        username.setAttribute("class", "form-group has-success has-feedback");
    } else {
        username.setAttribute("class", "form-group has-success has-feedback");
    }
}

function emailFailed() {
    var submitButton = document.getElementById("submitbutton");
    var email = document.getElementById("emailfeedback");
    submitButton.disabled = true;
    email.setAttribute("class", "form-group has-error has-feedback");
}

function emailPassed() {
    var submitButton = document.getElementById("submitbutton");
    var username = document.getElementById("usernamefeedback");
    var email = document.getElementById("emailfeedback");
    if (username.className != "form-group has-error has-feedback") {
        submitButton.disabled = false;
        email.setAttribute("class", "form-group has-success has-feedback");
    } else {
        email.setAttribute("class", "form-group has-success has-feedback");   
    }
}


function submitUser() {
    var submitButton = document.getElementById("submitbutton");
    submitButton.disabled = true;
    var username = $("input[name=username]").val();
    var password = $("input[name=password]").val();
    var firstName = $("input[name=firstName]").val();
    var lastName = $("input[name=lastName]").val();
    var email = $("input[name=email]").val();
    var variables = "type=register&username=" + username + "&password=" + password + "&firstName=" + firstName + "&lastName=" + lastName + "&email=" + email;
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
            if (response === "1") { //false
                submitButton.disabled = true;
                $('#failedModal').modal('show');
            } else if (response === "0") {
                submitButton.disabled = false;//success
                var welcome = document.getElementById("welcomeMessage");
                welcome.innerHTML = "Welcome, " + $("input[name=firstName]").val();    
                $("#successModal").modal('show');   
            }
        }
    }
} //end submit button press