// Sélectionnez le header
var header = document.getElementById("main-header");

// Récupérez la position de défilement de la fenêtre
var sticky = header.offsetTop;

// Ajoutez la classe "header-hidden" lorsque vous faites défiler vers le bas
function scrollFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("header-hidden");
    } else {
        header.classList.remove("header-hidden");
    }
}

// Définissez l'événement de défilement
window.onscroll = function() {scrollFunction()};