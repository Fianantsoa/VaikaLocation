<?php
    echo '<div class="table-responsive" style="height:400px">';
    echo '<p id="resol_img" style="color:red;font-size:12px;display:none;margin-bottom:5px">
        Pour une expérience optimale, nous vous recommandons de choisir une 
        image avec une résolution de <b>2000x700</b> pixels pour une qualité d\'affichage exceptionnelle sur le site.
        </p>';
    echo '<table class="table">';
        echo '<thead>';
            echo '<tr>';
                echo '<th scope="col">Rang</th>';
                echo '<th scope="col">Image</th>';
                echo '<th scope="col">Titre</th>';
                echo '<th scope="col">Sous-titre</th>';
            echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
    include("connexion.php");
    // Étape 2 : Exécutez la requête SQL pour récupérer les données de la table "reservation"
    $sql = "SELECT * FROM img_slide";
    $result = $connexion->query($sql);
    echo '<style>
            .icon_cam{
                position: absolute;
                margin-left: -110px;
                margin-top: 23px;
                cursor: pointer;opacity: 0.4;}
            .image_slide_post:hover{
                cursor:pointer;
                opacity:0.8;
            }.input_slide{
                border:none;
                resize:none;
            }
        </style>';
    // Vérifier s'il y a des résultats
    if ($result->num_rows > 0) {
        // Étape 3 : Parcourez les résultats et affichez-les avec l'écart de date
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<form action="php/update_slide.php" method="post" enctype="multipart/form-data">';
            echo '<input type="number" value="' . $row["id"] . '" style="display:none" name="id_slide">';
            echo '<th scope="row">' . $row["id"] . '</th>';
            echo '<td>  
                        <label for="input_img_a" class="file_label_photo">
                        <img src="data:image/jpeg;base64,' . base64_encode($row["image_slide"]) . '" width="200" class="image_slide_post">
                        
                            <img style="width: 20px;" src="./css/vendor/bootstrap-icons/camera.svg" alt="Photo" class="icon_cam">
                        </label>
                        <input name="image' . $row["id"] . '" type="file" id="input_img_a" class="file-input" accept="image/*">
                    </td>';
            echo '<th scope="row"><textarea cols="20" rows="3" class="titre' . $row["id"] . ' input_slide" name="titre' . $row["id"] . '" readonly>' . $row["titre"] . '</textarea></th>';
            echo '<th scope="row"><textarea cols="30" rows="3" class="description' . $row["id"] . ' input_slide" name="description' . $row["id"] . '" readonly>' . $row["description"] . '</textarea></th>';
            echo '<td>';
            echo '<button type="button" style="background-color:yellow" class="btn edit-button edit-slide'.$row['id'].'"><i class="bi bi-brush"></i></button>';

            // Bouton de confirmation de modification (initialement caché)
            echo '<button type="button" class="btn cancel-edit-slide'.$row['id'].'" style="display:none;background-color: #fa5838;"><i class="bi bi-x-lg"></i></button>';
            echo '<button type="submit" class="btn btn-success confirm-edit-button'.$row['id'].'" style="display:none;"><i class="bi bi-check"></i></button>';
            echo '</td>';
            echo '</tr>';
            echo '<script>
                const editSlide'.$row['id'].' = document.querySelector(".edit-slide'.$row['id'].'");
                const cancel_editSlide'.$row['id'].' = document.querySelector(".cancel-edit-slide'.$row['id'].'");
                const confirm_editSlide'.$row['id'].' = document.querySelector(".confirm-edit-button'.$row['id'].'");
                const titre'.$row['id'].' = document.querySelector(".titre' . $row["id"] . '");
                const description' . $row["id"] . ' = document.querySelector(".description' . $row["id"] . '");
                editSlide'.$row['id'].'.addEventListener("click", function () {
                    document.querySelector("#resol_img").style.display = "block";
                    editSlide'.$row['id'].'.style.display = "none";
                    cancel_editSlide'.$row['id'].'.style.display = "block";
                    confirm_editSlide'.$row['id'].'.style.display = "block";
                    titre'.$row['id'].'.removeAttribute("readonly");
                    description' . $row["id"] . '.removeAttribute("readonly");
                    titre'.$row['id'].'.classList.remove("input_slide");
                    description' . $row["id"] . '.classList.remove("input_slide");
                });
                cancel_editSlide'.$row['id'].'.addEventListener("click", function () {
                    document.querySelector("#resol_img").style.display = "none";
                    editSlide'.$row['id'].'.style.display = "block";
                    cancel_editSlide'.$row['id'].'.style.display = "none";
                    confirm_editSlide'.$row['id'].'.style.display = "none";
                    titre'.$row['id'].'.setAttribute("readonly", true);
                    description' . $row["id"] . '.setAttribute("readonly", true);
                    titre'.$row['id'].'.setAttribute("class", "input_slide");
                    description' . $row["id"] . '.setAttribute("class", "input_slide");
                });
            </script>';
            echo '</form>';
            
        }
        echo '</tbody>';
    echo '</table>';
    echo '</div>';
    } else {
        echo "Aucun résultat trouvé dans la table.";
    }

    // Fermer la connexion à la base de données
    $connexion->close();
?>
