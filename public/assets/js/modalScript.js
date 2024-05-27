// Récupérez la modal
var modal = document.getElementById("myModal");

// Récupérez le bouton de fermeture
var closeBtn = document.getElementsByClassName("close")[0];

// Récupérez le bouton de d'ouverture
var openExplication = document.getElementsByClassName("openExplication")[0];

// Lorsque l'utilisateur clique sur le bouton, ouvre la modal 
openExplication.onclick = function() {
  modal.style.display = "block";
}
function openModal() {
  modal.style.display = "block";
}

// Lorsque l'utilisateur clique sur <span> (x), ferme la modal
closeBtn.onclick = function() {
  modal.style.display = "none";
}

// Lorsque l'utilisateur clique en dehors de la modal, ferme la modal
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}