//Author: Freddy Solis
//Created: Jan 30, 2015
//This file contians the javascript functions that 
//allow the user to use Ajax to asychronosly log in

//this function displays error that username does not exist
function usernameFailed() {
    var username = document.getElementById("usernamefeedback");
    username.setAttribute("class", "form-group has-error has-feedback");
}

//this function displays success that username does exist
function usernamePassed() {
    var username = document.getElementById("usernamefeedback");
    username.setAttribute("class", "form-group has-success has-feedback");
}

//Jquery functions that listen to certain inputs
$(document).ready(function () {
       //this function listens to the username input field 
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
                    //match not found, username is available
                    usernamePassed();
                } else {
                    
                    //match was found
                    usernameFailed();
                }
            }
        }
    });//end username.change
    

});//end document.ready

//tries to log user into system using ajax
function attemptLogin() {
    var username = $("input[name=username]").val();
    var password = $("input[name=password]").val();
    var variables = "type=login&username=" + username + "&password=" + password;
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
                document.getElementById("errorcode").innerHTML="Wrong Username or Password";
            } else if (response === "0") {
                window.location = 'http://localhost/interviewQuest/index.php';
            }
        }
    }
    
}