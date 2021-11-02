document.addEventListener("DOMContentLoaded", init)

function init() {
    document.getElementById('username').addEventListener("input", userCheck)
    document.getElementById('password1').addEventListener("input", passCheck)
    //document.getElementById('password2').addEventListener("keyup", pass2Check)
    document.getElementById('password2').addEventListener("change", pass2Check)
    document.getElementById('gonb').addEventListener("click", formEll)
}

var username = "";
var password1 = "";
var password2 = "";
var passError = "A két jelszó nem egyezik";

function userCheck() {
    username = document.getElementById('username').value;

    document.getElementById('userLength').innerHTML = ` ${username.length}/20`;
    if (username.length < 3 || username.length > 20) {
        document.getElementById('userLength').classList= "error";
    } else {
        document.getElementById('userLength').classList= "noError";
    }
 }

function passCheck() {
    password1 = document.getElementById('password1').value;
    document.getElementById('pass1Length').innerHTML = ` ${password1.length}/26`;
    if (password1.length < 8 || password1.length > 26) {
        document.getElementById('pass1Length').classList= "error";
    } else {
        document.getElementById('pass1Length').classList = "noError";
    }
}

function pass2Check() {
    password2 = document.getElementById('password2').value;
    
    if (password1 != password2) {
        document.getElementById('pass2Length').classList= "error";
        document.getElementById('pass2Length').innerHTML = ` ${passError}`;
    } else {
        document.getElementById('pass2Length').innerHTML = "";
    }
    /*document.getElementById('pass2Length').innerHTML = ` ${password2.length}/26`;
    if (password2.length < 8 || password1.length > 26) {
        document.getElementById('pass2Length').style.color = "red";
    } else {
        document.getElementById('pass2Length').style.color = "black";
    }*/
}

function formEll(e) {
    if (username == "" || 
        password1 == "" || 
        password2 == "" ||
        username.length < 3 || 
        username.length > 20 || 
        password1.length < 8 || 
        password1.length > 26 || 
        password1 != password2) {
        e.preventDefault();
    }
}


