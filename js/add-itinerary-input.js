document.addEventListener("DOMContentLoaded", function () {
    const addButton = document.getElementById("add_itinerary");
    const formContainer = document.querySelector(".itinerary form");
    const lieuInput1 = document.getElementById("lieuInput1");

    addButton.addEventListener("click", function (event) {
        event.preventDefault();

        const newInput = document.createElement("input");
        newInput.type = "text";

        formContainer.insertBefore(newInput, addButton);
    });
});