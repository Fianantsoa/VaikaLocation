<?php
include("connexion.php");

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Requête SQL pour récupérer les données de la table "cars"
$sql = "SELECT id, img, name_user, email_c FROM customer";
$resultat = $connexion->query($sql);

// Vérifier s'il y a des résultats
if ($resultat->num_rows > 0) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-striped">';
    echo '<caption>Liste des utilisateurs</caption>';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">id</th>';
    echo '<th scope="col">Image</th>';
    echo '<th scope="col">Nom</th>';
    echo '<th scope="col">Email</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    // Parcourir les résultats de la requête
    while ($ligne = $resultat->fetch_assoc()) {
        echo '<tr>';
        echo '<th scope="row">' . $ligne['id'] . '</th>';
        if(isset($ligne['img']) && !empty($ligne['img'])){
            echo '<td><img src="data:image/jpeg;base64,' . base64_encode($ligne['img']) . '" width="100"></td>';
        }else{
            echo '<td><img src="./img/profil.png" width="100"></td>';
        }
        echo '<td>' . $ligne['name_user'] . '</td>';
        echo '<td>' . $ligne['email_c'] . '</td>';
        echo '<td>
                    <a href="php/delete_customer.php?id='.$ligne['id'].'" 
                        onclick="return confirm(\'Êtes-vous sûr de vouloir bannir cet utilisateur ?\')" 
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
