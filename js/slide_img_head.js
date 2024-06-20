
function ChangeSlide(sens) {
    numero += sens;

    if (numero < 0)
        numero = slides.length - 1;
    if (numero >= slides.length)
        numero = 0;

    document.getElementById("slide").src = 'data:image/webp;base64,' + slides[numero];
}

let numero = 0;
let slides = [];
// Utilisation d'une requête AJAX pour récupérer les données depuis image_slide.php
fetch('./php/slide.php')
    .then(response => response.json())
    .then(data => {
        slides = data; // Stocke les données des images BLOB dans la variable slides

        // Initialise l'image actuelle
        document.getElementById("slide").src = 'data:image/webp;base64,' + slides[numero];
    })
    .catch(error => console.error('Erreur de chargement des données :', error));


    setInterval(() => {
        ChangeSlide(1);
    }, 10000); // Change d'image toutes les 5 secondes

    