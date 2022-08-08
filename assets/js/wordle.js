$("#guess").keyup(function (event) {
    if (event.keyCode === 13) {
        $("#addGuess").click();
    }
});

$("#addGuess").click(function () {
    var guess = document.getElementById('guess').value;
    if (!document.getElementById('guess').checkValidity() || guess.localeCompare("") == 0) {
        return;
    }

    for (let i = 0, row = "row0", guessId = "guess0"; i < 6; i++, row = row.substring(0, 3) + i, guessId = guessId.substring(0, 5) + i) {
        let children = document.getElementById(row).children;
        if (children[0].innerText.localeCompare("") == 0) {
            $("#" + guessId).val(guess);
            for (let k = 0; k < 5; k++) {
                children[k].classList.add("gray");
                document.getElementById("flattilecolors").value = document.getElementById("flattilecolors").value.substring(0, i * 5 + k) + "0" +  document.getElementById("flattilecolors").value.substring(i * 5 + k + 1);
                children[k].innerText = guess.substring(k, k + 1).toUpperCase();
            }
            $("#" + row).children().each(function () {
                $(this).click(function () {
                    if ($(this).hasClass("yellow")) {
                        $(this).toggleClass("yellow");
                        $(this).toggleClass("green");
                        document.getElementById("flattilecolors").value = document.getElementById("flattilecolors").value.substring(0, parseInt(this.id.substring(4))) + "2" +  document.getElementById("flattilecolors").value.substring(parseInt(this.id.substring(4)) + 1);
                    } else if ($(this).hasClass("green")) {
                        $(this).toggleClass("green");
                        $(this).toggleClass("gray");
                        document.getElementById("flattilecolors").value = document.getElementById("flattilecolors").value.substring(0, parseInt(this.id.substring(4))) + "0" +  document.getElementById("flattilecolors").value.substring(parseInt(this.id.substring(4)) + 1);
                    } else {
                        $(this).toggleClass("gray");
                        $(this).toggleClass("yellow");
                        document.getElementById("flattilecolors").value = document.getElementById("flattilecolors").value.substring(0, parseInt(this.id.substring(4))) + "1" +  document.getElementById("flattilecolors").value.substring(parseInt(this.id.substring(4)) + 1);
                    }
                });
            });
            break;
        }
    }

    document.getElementById('guess').value = "";
});