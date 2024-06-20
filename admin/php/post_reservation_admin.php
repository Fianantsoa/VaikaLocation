<?php
echo '<div class="table-responsive" style="height:360px">';
echo '<table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th scope="col">#</th>';
echo '<th scope="col">Modèles/Locataires</th>';
echo '<th scope="col">Détails</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
include("connexion.php");
// Étape 2 : Exécutez la requête SQL pour récupérer les données de la table "reservation"
$sql = "SELECT * FROM reservation ORDER BY date_r DESC";
$result = $connexion->query($sql);

// Vérifier s'il y a des résultats
if ($result->num_rows > 0) {
    // Étape 3 : Parcourez les résultats et affichez-les avec l'écart de date
    $compte = 0;
    while ($row = $result->fetch_assoc()) {
        $dateReservation = strtotime($row["date_r"]); // Convertir la date en timestamp
        $dateActuelle = time(); // Obtenir le timestamp de la date actuelle
        $ecartEnSecondes = $dateReservation - $dateActuelle;
        // Calculer l'écart en jours
        $ecartEnJours = - (floor($ecartEnSecondes / (60 * 60 * 24)));
        echo '<tr>';
        echo '<th scope="row">' . $row["id_r"] . "<br><br><br>";
        if ($ecartEnJours == -0) {
            echo '<i class="bi bi-clock-history"></i> J';
        } else {
            echo '<i class="bi bi-clock-history"></i> ' . $ecartEnJours . ' j';
        }

        echo '</th>';
        echo '<td><b>Modèles</b><br>' . $row["modele_car_r"] . "<br>" . $row["prix_car_r"] . ' Ar' . '<br><br>';
        echo '<b>Locataire </b><br>' . $row["email_r"] . "<br>" . $row["telephone_r"] . '';
        echo '</td>';
        echo '<td>' . $row["itineraire"] . "<br>
                  <b>Sujet </b>:" . $row["subject"] . "<br>
                  <b>Message </b>:" . $row["message"] . '<br>
                  <b>Date de location </b>:' . $row["date_depart"] . " à " . $row["date_retour"] . "<br>
                  </td>";
        echo '<td>
                    <a href="php/delete_reservation.php?id=' . $row['id_r'] . '" 
                        onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cet réservation ?\')" 
                        class="btn btn-danger delete">
                        <i class="bi bi-trash"></i>
                    </a>
                  </td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo "Aucun résultat trouvé dans la table.";
}

// Fermer la connexion à la base de données
$connexion->close();
