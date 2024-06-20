// Sélectionnez l'élément auquel vous souhaitez ajouter ou supprimer la classe
var monElement = document.querySelector(".itinerary");

// Fonction pour vérifier la largeur de la fenêtre et ajouter/supprimer la classe en conséquence
function ajusterClasse() {
  if (window.innerWidth < 715) {
    // Si la largeur de la fenêtre est inférieure à 715 pixels, enlevez la classe
    monElement.classList.remove("reveal1");
  } else {
    // Sinon, ajoutez la classe
    monElement.classList.add("reveal1");
  }
}

// Appelez la fonction d'ajustement de classe au chargement de la page et lors du redimensionnement de la fenêtre
ajusterClasse();

window.addEventListener("resize", ajusterClasse);
