

function usernameFailed() {
    "use strict";
    var submitButton = document.getElementById("submitbutton");
    var username = document.getElementById("usernamefeedback");
    var usernameFeedback = document.getElementById("usernamesybmol");
    submitButton.disabled = true;
    username.setAttribute("class", "form-group has-error has-feedback");
    
}

function usernamePassed() {
    "use strict";
    var submitButton = document.getElementById("submitbutton");
    var username = document.getElementById("usernamefeedback");
    var email = document.getElementById("emailfeedback");
    if (email.className !== "form-group has-error has-feedback") {
        submitButton.disabled = false;
        username.setAttribute("class", "form-group has-success has-feedback");
    } else {
        username.setAttribute("class", "form-group has-success has-feedback");
    }
}

function emailFailed() {
    "use strict";
    var submitButton = document.getElementById("submitbutton");
    var email = document.getElementById("emailfeedback");
    submitButton.disabled = true;
    email.setAttribute("class", "form-group has-error has-feedback");
}

function emailPassed() {
    "use strict";
    var submitButton = document.getElementById("submitbutton");
    var username = document.getElementById("usernamefeedback");
    var email = document.getElementById("emailfeedback");
    if (username.className !== "form-group has-error has-feedback") {
        submitButton.disabled = false;
        email.setAttribute("class", "form-group has-success has-feedback");
    } else {
        email.setAttribute("class", "form-group has-success has-feedback");
    }
}


function submitUser() {
    "use strict";
    var submitButton = document.getElementById("submitbutton");
    submitButton.disabled = true;
    startLoading();
    var variables = validateInput();
    if (variables.length > 0) {
        
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
                    setTimeout ( "stopLoading()", 2000 );
                    setTimeout ( "$('#failedModal').modal('show')",2000);
                } else if (response === "0") {
                    submitButton.disabled = false;//success
                    var welcome = document.getElementById("welcomeMessage");
                    welcome.innerHTML = "Welcome, " + $("input[name=firstName]").val();
                    setTimeout ( "stopLoading()", 2000 );
                    setTimeout ( "$('#successModal').modal('show')",2000);
                }
            }
        }
    } else {
        setTimeout ( "stopLoading()", 2000 );
        
    }
} //end submit button press

function validateInput() {
    "use strict";
    var username = $("input[name=username]").val();
    var password = $("input[name=password]").val();
    var firstName = $("input[name=firstName]").val();
    var lastName = $("input[name=lastName]").val();
    var email = $("input[name=email]").val();
    var variables = "type=register&username=";
    var passed = true;
    if (username.length <= 0) {
        passed = false;
    } else if (password.length <= 0) {
        passed = false;
    } else if (firstName.length <= 0) {
        passed = false;
    } else if (lastName.length <= 0) {
        passed = false;
    } else if (email.length <= 0) {
        passed = false; 
    }
    if (passed) {
          return "type=register&username=" + username + "&password=" + password + "&firstName=" + firstName + "&lastName=" + lastName + "&email=" + email;
    } else {
          return "";   
    }
}

function closeModal() {
    $('#failedModal').modal('hide');
    var submitButton = document.getElementById("submitbutton");
    submitButton.disabled = false;
}



$(document).ready(function () {
    "use strict";
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


function startLoading() {
    var opts = {
      lines: 9, // The number of lines to draw
      length: 24, // The length of each line
       width: 11, // The line thickness
      radius: 26, // The radius of the inner circle
      corners: 1, // Corner roundness (0..1)
      rotate: 0, // The rotation offset
      direction: 1, // 1: clockwise, -1: counterclockwise
      color: '#000', // #rgb or #rrggbb or array of colors
      speed: 0.9, // Rounds per second
      trail: 37, // Afterglow percentage
      shadow: false, // Whether to render a shadow
      hwaccel: false, // Whether to use hardware acceleration
      className: 'spinner', // The CSS class to assign to the spinner
      zIndex: 2e9, // The z-index (defaults to 2000000000)
      top: '50%', // Top position relative to parent
      left: '50%' // Left position relative to parent
    };
    var target = document.getElementById('loadingbody');
    var spinner = new Spinner(opts).spin(target);   
    $('#loadingModal').modal('show');
}

function stopLoading() {
    
    $('#loadingModal').modal('hide');
}