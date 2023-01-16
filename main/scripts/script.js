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
