/* Archivo de Scripts (Javascript) */

/* Script para animacion del menu en dispositivos moviles */
var navLinks = document.getElementById("navLinks");
function showMenu() {
  navLinks.style.right = "0";
}
function hideMenu() {
  navLinks.style.right = "-200px";
}

function notavailable() {
  alert("This information is not yet available. Try later.");
}

// Timer Function

function startTimer() {
  var hours = parseInt(document.getElementById("hoursInput").value) || 0;
  var minutes = parseInt(document.getElementById("minutesInput").value) || 0;
  var seconds = parseInt(document.getElementById("secondsInput").value) || 0;

  var totalSeconds = hours * 3600 + minutes * 60 + seconds;

  var timer = setInterval(function () {
    var hoursDisplay = Math.floor(totalSeconds / 3600);
    var minutesDisplay = Math.floor((totalSeconds % 3600) / 60);
    var secondsDisplay = Math.floor(totalSeconds % 60);

    document.getElementById("hours").textContent = padZero(hoursDisplay);
    document.getElementById("minutes").textContent = padZero(minutesDisplay);
    document.getElementById("seconds").textContent = padZero(secondsDisplay);

    if (totalSeconds <= 0) {
      alert("Time Up!");
      clearInterval(timer);
    } else {
      totalSeconds--;
    }
  }, 1000);
}

function padZero(num) {
  return (num < 10 ? "0" : "") + num;
}
