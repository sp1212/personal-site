$('.passwordVis').css('cursor', 'pointer');

var hidden = true;

var passwordVisibility = document.getElementById("passwordVisibility");
var passwordconfVisibility = document.getElementById("passwordconfVisibility");

var passwordField = document.getElementById("password");
var passwordconfField = document.getElementById("passwordconf");

function toggleVisibility() {
    if (hidden) {
        passwordVisibility.src = "./assets/images/eye.svg";
        passwordField.type = "text";
        passwordconfVisibility.src = "./assets/images/eye.svg";
        passwordconfField.type = "text";
        hidden = false;
    } else {
        passwordVisibility.src = "./assets/images/eye-slash.svg";
        passwordField.type = "password";
        passwordconfVisibility.src = "./assets/images/eye-slash.svg";
        passwordconfField.type = "password";
        hidden = true;
    }
}

passwordVisibility.onclick = function() { toggleVisibility() };
passwordconfVisibility.onclick = function() { toggleVisibility() };