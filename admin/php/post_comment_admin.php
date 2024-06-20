<?php
include("connexion.php");

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Requête SQL pour récupérer les données de la table "cars"
$sql = "SELECT * FROM commentaire";
$resultat = $connexion->query($sql);

// Vérifier s'il y a des résultats
if ($resultat->num_rows > 0) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-striped">';
    echo '<caption>Liste des commentaires</caption>';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">id</th>';
    echo '<th scope="col">Commentaire</th>';
    echo '<th scope="col">Date</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    // Parcourir les résultats de la requête
    while ($ligne = $resultat->fetch_assoc()) {
        echo '<tr>';
        echo '<th scope="row">' . $ligne['id'] . '</th>';
        echo '<td>' . $ligne['contenu'] . '</td>';
        echo '<td>' . $ligne['date_creation'] . '</td>';
        echo '<td>
                    <a href="php/delete_comment.php?id='.$ligne['id'].'" 
                        onclick="return confirm(\'Êtes-vous sûr de vouloir effacer cet commentaire ?\')" 
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
    echo "Aucune donnée trouvée dans la base de données.";
}

// Fermer la connexion à la base de données
$connexion->close();
?>
