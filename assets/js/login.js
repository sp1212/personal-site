$('.passwordVis').css('cursor', 'pointer');

var hidden = true;
var passwordVisibility = document.getElementById("passwordVisibility");
var passwordField = document.getElementById("password");

passwordVisibility.onclick = function() {
    if (hidden) {
        passwordVisibility.src = "./assets/images/eye.svg";
        passwordField.type = "text";
        hidden = false;
    } else {
        passwordVisibility.src = "./assets/images/eye-slash.svg";
        passwordField.type = "password";
        hidden = true;
    }
}