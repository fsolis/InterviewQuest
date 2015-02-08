

function disableButtons(nameOfButton,change) {
    "use strict";
    var finalscore = document.getElementById("finalscore");
    var score = finalscore.innerHTML;
   finalscore.innerHTML = (score - 0) + (change - 0);
    nameOfButton.style.display="none";
}