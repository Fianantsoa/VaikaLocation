// script.js
document.addEventListener("DOMContentLoaded", function () {
    const content = document.querySelector(".content");
    const scrollUpButton = document.getElementById("scroll-up1");
    const scrollDownButton = document.getElementById("scroll-down1");
    const scrollPosition = document.getElementById("scroll-position1");

    scrollUpButton.addEventListener("click", function () {
        content.scrollTop -= 500; // Défilement vers le haut par 50 pixels
        updateScrollPosition();
    });

    scrollDownButton.addEventListener("click", function () {
        content.scrollTop += 500; // Défilement vers le bas par 50 pixels
        updateScrollPosition();
    });

    function updateScrollPosition() {
        const scrollTop = content.scrollTop;
        const scrollHeight = content.scrollHeight - content.clientHeight;
        const scrollPercentage = (scrollTop / scrollHeight) * 100;
        scrollPosition.textContent = `${scrollPercentage.toFixed(2)/100}`;
    }

    // Mettez à jour l'indice de position lorsque la page est chargée
    updateScrollPosition();
});