<?php
function post_car($place)
{
    include("php/connectionBDD.php");
    $requete = "SELECT * FROM cars WHERE places=" . $place;
    $resultat = $connexion->query($requete);
    echo '<style>
        .button{
            border: 1px solid;
            padding: 2px 5px;
        }.button:hover{
            box-shadow: 0 0 3px rgba(122, 122, 122, 0.192);
        }.button:hover a{
            color: white
        }
        </style>';
    while ($ligne = $resultat->fetch_assoc()) {
        $id = $ligne["id"];
        $modele = htmlspecialchars($ligne["modele"]);
        $prix = $ligne["prix"];
        $image = $ligne["image"];
        $place_car = $ligne["places_car"];
        $carburant = $ligne["carburant"];
        $consommation = $ligne["consommation"];

        echo '<div class="car col-lg-3">
            <img src="data:image/webp;base64,' . base64_encode($image) . '" alt="car" width="30">';
        $prix_formate = number_format($prix, 0, ',', '.');
        echo '<p class="desc_car"><i class="bi bi-car-front-fill"> </i>' . $modele . '<br><i class="bi bi-cash"> </i> Ar' . $prix_formate . '/jour<br>
            <i class="bi bi-diagram-3-fill"> </i> ' . $place_car . ' places<br><i class="bi bi-ev-station-fill"> </i> ' . $carburant . ' &#x2243 ' . $consommation . 'l/100km</p>';
        echo '<input type="text" name="modele" value="' . $modele . '" style="display:none">';
        echo '<input type="text" name="prix" value="' . $prix . '"  style="display:none">';
        echo '<input type="text" name="id" value="' . $id . '"  style="display:none">';
        echo '<a href="javascript:void(0);" id="reserverLink' . $id . '" class="button" 
            onclick="reserverClick(\'' . $modele . '\', \'' . $prix . '\', \'' . $id . '\')">
                Réserver
            </a>';
        echo '</div>';
    }
}
