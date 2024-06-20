// script.js
function addCarDetails(carID) {
    var carCode = '<?php post_car(' + carID + '); ?>';
    document.getElementById("place7").innerHTML = carCode;
}
