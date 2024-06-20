<?php

function post_car_admin($place)
{
    include("connexion.php");
    if ($place == "All_cars") {
        $sql = "SELECT * FROM cars";
        $resultat = $connexion->query($sql);
        $connexion->set_charset("utf8");
        if ($resultat->num_rows > 0) {
            echo '<div class="table-responsive" style="overflow-y:scroll;height: 440px;">';
            echo '<table class="table table-striped">';
            echo '<caption>Liste des voitures</caption>';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">id</th>';
            echo '<th scope="col">Image</th>';
            echo '<th scope="col">Modèle</th>';
            echo '<th scope="col">Prix</th>';
            echo '<th scope="col">Cat. de place</th>';
            echo '<th scope="col">Places</th>';
            echo '<th scope="col">Carburant</th>';
            echo '<th scope="col">Consommation</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<style>
                    .edit-button {
                        background-color: yellow; /* Style du bouton initial */
                    }
                    .confirm-edit-button {
                        background-color: green; /* Style du bouton de confirmation */
                    }
                </style>';

            // Parcourir les résultats de la requête
            while ($ligne = $resultat->fetch_assoc()) {

                echo '<tr id="carRow' . $ligne['id'] . '">';
                echo '<form action="php/update_cars.php" method="POST" enctype="multipart/form-data">'; // Créez un formulaire d'édition
                echo '<input type="number" name="id" style="display:none;" value="' . $ligne['id'] . '">';
                echo '<th scope="row">' . $ligne['id'] . '</th>';
                echo '<td><img src="data:image/jpeg;base64,' . base64_encode($ligne['image']) . '" width="100"></td>';
                echo '<td><input class="input_car" style="width:145px" type="text" name="modele" value="' . $ligne['modele'] . '" id="input_modele' . $ligne['id'] . '" readonly></td>'; // Champ de formulaire pour le modèle
                echo '<td><input class="input_car" style="width:75px" type="text" name="prix" value="' . $ligne['prix'] . '" id="input_prix' . $ligne['id'] . '" readonly></td>'; // Champ de formulaire pour le prix
                echo '<td><input class="input_car" style="width:85px" type="text" name="places" value="' . $ligne['places'] . '" id="input_place' . $ligne['id'] . '" readonly></td>';

                echo '<td><input class="input_car" style="width:65px" type="text" name="places_car" value="' . $ligne['places_car'] . '" id="input_place_reel' . $ligne['id'] . '" readonly></td>';
                echo '<td><input class="input_car" style="width:100px" type="text" name="carburant" value="' . $ligne['carburant'] . '" id="input_carburant' . $ligne['id'] . '" readonly></td>';
                echo '<td><input class="input_car" style="width:100px" type="number" name="consommation" value="' . $ligne['consommation'] . '" id="input_consommation' . $ligne['id'] . '" readonly></td>';
                echo '<td style="width: 73px;">';

                // Bouton initial
                echo '<button type="button" class="btn edit-button edit-button' . $ligne['id'] . '"><i class="bi bi-brush"></i></button>';

                // Bouton de confirmation de modification (initiallement caché)
                echo '<button type="button" class="btn cancel-button' . $ligne['id'] . '" style="display:none;background-color: #fa5838;"><i class="bi bi-x-lg"></i></button>';
                echo '<button type="submit" class="btn btn-success confirm-edit-button' . $ligne['id'] . '" style="display:none;"><i class="bi bi-check"></i></button>';
                echo '<a href="php/delete_car.php?id=' . $ligne['id'] . '" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette voiture ?\')" class="btn btn-danger delete' . $ligne['id'] . '"><i class="bi bi-trash"></i></a>';
                echo '</td>';
                echo '</form>'; // Fermez le formulaire
                echo '</tr>';
                echo '<script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const editButtons' . $ligne['id'] . ' = document.querySelector(".edit-button' . $ligne['id'] . '");
                            const confirmEditButtons' . $ligne['id'] . ' = document.querySelector(".confirm-edit-button' . $ligne['id'] . '");
                            const cancelButton' . $ligne['id'] . ' = document.querySelector(".cancel-button' . $ligne['id'] . '");
                            const delete' . $ligne['id'] . ' = document.querySelector(".delete' . $ligne['id'] . '");
                            const input_modele' . $ligne['id'] . ' = document.getElementById("input_modele' . $ligne['id'] . '");
                            const input_prix' . $ligne['id'] . ' = document.getElementById("input_prix' . $ligne['id'] . '");
                            const input_place' . $ligne['id'] . ' = document.getElementById("input_place' . $ligne['id'] . '");
                            const input_place_reel' . $ligne['id'] . ' = document.getElementById("input_place_reel' . $ligne['id'] . '");
                            const input_carburant' . $ligne['id'] . ' = document.getElementById("input_carburant' . $ligne['id'] . '");
                            const input_consommation' . $ligne['id'] . ' = document.getElementById("input_consommation' . $ligne['id'] . '");
                            const carRow' . $ligne['id'] . ' = document.getElementById("carRow' . $ligne['id'] . '");

                                editButtons' . $ligne['id'] . '.addEventListener("click", function () {
                                    editButtons' . $ligne['id'] . '.style.display = "none";
                                    delete' . $ligne['id'] . '.style.display = "none";
                                    cancelButton' . $ligne['id'] . '.style.display = "block";
                                    confirmEditButtons' . $ligne['id'] . '.style.display = "block";
                                    input_modele' . $ligne['id'] . '.removeAttribute("readonly");
                                    input_prix' . $ligne['id'] . '.removeAttribute("readonly");
                                    input_place' . $ligne['id'] . '.removeAttribute("readonly");
                                    input_place_reel' . $ligne['id'] . '.removeAttribute("readonly");
                                    input_carburant' . $ligne['id'] . '.removeAttribute("readonly");
                                    input_consommation' . $ligne['id'] . '.removeAttribute("readonly");
                                    input_modele' . $ligne['id'] . '.setAttribute("class", ".input_car_edit");
                                    input_prix' . $ligne['id'] . '.setAttribute("class", ".input_car_edit");
                                    input_place' . $ligne['id'] . '.setAttribute("class", ".input_car_edit");
                                    input_place_reel' . $ligne['id'] . '.setAttribute("class", ".input_car_edit");
                                    input_carburant' . $ligne['id'] . '.setAttribute("class", ".input_car_edit");
                                    input_consommation' . $ligne['id'] . '.setAttribute("class", ".input_car_edit");
                                });
                                cancelButton' . $ligne['id'] . '.addEventListener("click", function () {
                                    editButtons' . $ligne['id'] . '.style.display = "block";
                                    delete' . $ligne['id'] . '.style.display = "block";
                                    cancelButton' . $ligne['id'] . '.style.display = "none";
                                    confirmEditButtons' . $ligne['id'] . '.style.display = "none";
                                    input_modele' . $ligne['id'] . '.setAttribute("readonly", true);
                                    input_prix' . $ligne['id'] . '.setAttribute("readonly", true);
                                    input_place' . $ligne['id'] . '.setAttribute("readonly", true);
                                    input_place_reel' . $ligne['id'] . '.setAttribute("readonly", true);
                                    input_carburant' . $ligne['id'] . '.setAttribute("readonly", true);
                                    input_consommation' . $ligne['id'] . '.setAttribute("readonly", true);
                                    input_modele' . $ligne['id'] . '.setAttribute("class", "input_car");
                                    input_prix' . $ligne['id'] . '.setAttribute("class", "input_car");
                                    input_place' . $ligne['id'] . '.setAttribute("class", "input_car");
                                    input_place_reel' . $ligne['id'] . '.setAttribute("class", "input_car");
                                    input_carburant' . $ligne['id'] . '.setAttribute("class", "input_car");
                                    input_consommation' . $ligne['id'] . '.setAttribute("class", "input_car");
                                });
                        });
                    </script>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo "Aucune donnée trouvée dans la base de données.";
        }
    }
    if (is_numeric($place)) {
        $sql = "SELECT * FROM cars WHERE places = $place";
        $resultat = $connexion->query($sql);
        if ($resultat->num_rows > 0) {
            echo '<div class="table-responsive" style="overflow-y:scroll;height: 440px;">';
            echo '<table class="table table-striped">';
            echo '<caption>Liste des voitures</caption>';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">id</th>';
            echo '<th scope="col">Image</th>';
            echo '<th scope="col">Modèle</th>';
            echo '<th scope="col">Prix</th>';
            echo '<th scope="col">Cat. de place</th>';
            echo '<th scope="col">Places</th>';
            echo '<th scope="col">Carburant</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<style>
                    .edit-button {
                        background-color: yellow; /* Style du bouton initial */
                    }
                    .confirm-edit-button {
                        background-color: green; /* Style du bouton de confirmation */
                    }
                </style>';
            // Parcourir les résultats de la requête
            while ($ligne = $resultat->fetch_assoc()) {
                echo '<tr id="carRow' . $ligne['id'] . '" style="overflow-x: scroll;">';

                echo '<form action="php/update_cars.php" method="POST">'; // Créez un formulaire d'édition
                echo '<input type="number" name="id" style="display:none;" value="' . $ligne['id'] . '">';
                echo '<th scope="row">' . $ligne['id'] . '</th>';
                echo '<td><img src="data:image/jpeg;base64,' . base64_encode($ligne['image']) . '" width="100"></td>';
                echo '<td><input class="input_car" type="text" name="modele" value="' . htmlspecialchars($ligne['modele']) . '" id="input_modele' . $ligne['id'] . 'class" readonly></td>'; // Champ de formulaire pour le modèle
                echo '<td><input class="input_car" type="text" name="prix" value="' . $ligne['prix'] . '" id="input_prix' . $ligne['id'] . 'class" readonly></td>'; // Champ de formulaire pour le prix
                echo '<td><input class="input_car" type="text" name="places" value="' . $ligne['places'] . '" id="input_place' . $ligne['id'] . 'class" readonly></td>';
                echo '<td><input class="input_car" type="text" name="places_car" value="' . $ligne['places_car'] . '" id="input_place_reel' . $ligne['id'] . 'class" readonly></td>';
                echo '<td><input class="input_car" type="text" name="carburant" value="' . $ligne['carburant'] . '" id="input_carburant' . $ligne['id'] . 'class" readonly></td>'; // Champ de formulaire pour les places
                echo '<td style="width: 73px;">';

                // Bouton initial
                echo '<button type="button" class="btn edit-button edit-button' . $ligne['id'] . 'class"><i class="bi bi-brush"></i></button>';

                // Bouton de confirmation de modification (initiallement caché)
                echo '<button type="button" class="btn cancel-button' . $ligne['id'] . 'class" style="display:none;background-color: #fa5838;"><i class="bi bi-x-lg"></i></button>';
                echo '<button type="submit" class="btn btn-success confirm-edit-button' . $ligne['id'] . 'class" style="display:none;"><i class="bi bi-check"></i></button>';
                echo '<a href="php/delete_car.php?id=' . $ligne['id'] . '" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cet élément ?\')" class="btn btn-danger delete' . $ligne['id'] . 'class"><i class="bi bi-trash"></i></a>';
                echo '</td>';
                echo '</form>'; // Fermez le formulaire
                echo '</tr>';
                echo '<script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const editButtons' . $ligne['id'] . 'class = document.querySelector(".edit-button' . $ligne['id'] . 'class");
                            const confirmEditButtons' . $ligne['id'] . 'class = document.querySelector(".confirm-edit-button' . $ligne['id'] . 'class");
                            const cancelButton' . $ligne['id'] . 'class = document.querySelector(".cancel-button' . $ligne['id'] . 'class");
                            const delete' . $ligne['id'] . 'class = document.querySelector(".delete' . $ligne['id'] . 'class");
                            const input_modele' . $ligne['id'] . 'class = document.getElementById("input_modele' . $ligne['id'] . 'class");
                            const input_prix' . $ligne['id'] . 'class = document.getElementById("input_prix' . $ligne['id'] . 'class");
                            const input_place' . $ligne['id'] . 'class = document.getElementById("input_place' . $ligne['id'] . 'class");
                            
                                editButtons' . $ligne['id'] . 'class.addEventListener("click", function () {
                                    editButtons' . $ligne['id'] . 'class.style.display = "none";
                                    delete' . $ligne['id'] . 'class.style.display = "none";
                                    cancelButton' . $ligne['id'] . 'class.style.display = "block";
                                    confirmEditButtons' . $ligne['id'] . 'class.style.display = "block";
                                    input_modele' . $ligne['id'] . 'class.removeAttribute("readonly");
                                    input_prix' . $ligne['id'] . 'class.removeAttribute("readonly");
                                    input_place' . $ligne['id'] . 'class.removeAttribute("readonly");
                                    input_place_reel' . $ligne['id'] . 'class.removeAttribute("readonly");
                                    input_carburant' . $ligne['id'] . 'class.removeAttribute("readonly");
                                    input_modele' . $ligne['id'] . 'class.setAttribute("class", ".input_car_edit");
                                    input_prix' . $ligne['id'] . 'class.setAttribute("class", ".input_car_edit");
                                    input_place' . $ligne['id'] . 'class.setAttribute("class", ".input_car_edit");
                                    input_place_reel' . $ligne['id'] . 'class.setAttribute("class", ".input_car_edit");
                                    input_carburant' . $ligne['id'] . 'class.setAttribute("class", ".input_car_edit");
                                });
                                cancelButton' . $ligne['id'] . 'class.addEventListener("click", function () {
                                    editButtons' . $ligne['id'] . 'class.style.display = "block";
                                    delete' . $ligne['id'] . 'class.style.display = "block";
                                    cancelButton' . $ligne['id'] . 'class.style.display = "none";
                                    confirmEditButtons' . $ligne['id'] . 'class.style.display = "none";
                                    input_modele' . $ligne['id'] . 'class.setAttribute("readonly", true);
                                    input_prix' . $ligne['id'] . 'class.setAttribute("readonly", true);
                                    input_place' . $ligne['id'] . 'class.setAttribute("readonly", true);
                                    input_modele' . $ligne['id'] . 'class.setAttribute("class", "input_car");
                                    input_prix' . $ligne['id'] . 'class.setAttribute("class", "input_car");
                                    input_place_reel' . $ligne['id'] . '.setAttribute("readonly", true);
                                    input_carburant' . $ligne['id'] . '.setAttribute("readonly", true);
                                    input_place' . $ligne['id'] . 'class.setAttribute("class", "input_car");
                                    input_place_reel' . $ligne['id'] . 'class.setAttribute("class", "input_car");
                                    input_carburant' . $ligne['id'] . 'class.setAttribute("class", "input_car");
                                });
                        });
                    </script>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo "Aucune donnée trouvée dans la base de données.";
        }
    }

    // Vérifier s'il y a des résultats

    // Fermer la connexion à la base de données
    $connexion->close();
}
