function reserverClick(modele, prix, id) {
    var lieu1 = document.getElementById('lieuInput').value;
    var lieu2 = document.getElementById('lieuInput1').value;
    var date_depart = document.getElementById('date_depart').value;
    var date_retour = document.getElementById('date_retour').value;
    var erreurMessage = document.getElementById('erreurMessage');
    var itineraryBlock = document.getElementById('pop');

    if (lieu1 === '' || lieu2 === '') {
        // Afficher le message d'erreur sans animation

        erreurMessage.style.display = 'flex'; // Afficher le message

        // Cacher automatiquement le message d'erreur après 5 secondes
        setTimeout(function () {
            erreurMessage.style.display = 'none';
        }, 5000);

        var windowHeight = window.innerHeight;
        var offset = (100 * windowHeight) / 100;
        var blockHeight = itineraryBlock.clientHeight;
        var scrollToPosition = (blockHeight - windowHeight) / 2 + offset;
        window.scrollTo({
            top: scrollToPosition,
            behavior: 'smooth' // Pour une animation de défilement fluide
        });
    } else {
        var lieu3 = '';
        var lieu4 = '';

        var lieuInput2 = document.getElementById('lieuInput2');
        if (lieuInput2 !== null) {
            lieu3 = lieuInput2.value;
        }

        var lieuInput3 = document.getElementById('lieuInput3');
        if (lieuInput3 !== null) {
            lieu4 = lieuInput3.value;
        }

        // Cacher le message d'erreur s'il était précédemment affiché
        erreurMessage.style.display = 'none';

        // Rediriger vers la page d'affichage avec les paramètres dans l'URL
        window.location.href = 'contact.php?modele=' + modele + '&prix=' + prix +
            '&lieu1=' + lieu1 + '&lieu2=' + lieu2 +
            '&lieu3=' + lieu3 + '&lieu4=' + lieu4 + '&id=' + id + '&date_depart=' + date_depart + '&date_retour=' + date_retour;
    }
}
