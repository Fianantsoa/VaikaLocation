<?php
include("connexion.php");

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Requête SQL pour récupérer les données de la table "cars"
$sql = "SELECT * FROM smtp";
$resultat = $connexion->query($sql);
echo '<style>
            input{
                position:absolute;
                right:0;
                width: 245px;
                border-radius: 3px;
                height: 24px;
                margin-right: 31px;
            }label{
                margin-bottom:34px;
            }
            form{
                background-color: #333;
                color: white;
                padding: 31px 31px 31px 31px;
                width:55%;
                position:relative;
            }
        </style>';

// Vérifier s'il y a des résultats
if ($resultat->num_rows > 0) {
    
    
    // Parcourir les résultats de la requête
    while ($ligne = $resultat->fetch_assoc()) {
        echo '<form action="php/update_smtp.php" method="post">';
        echo '<label for="host">Host : 
                <input type="text" name="host" id="host" value="' . $ligne['host'] . '" readonly>
             </label><br>';
        echo '<label for="username">Nom d\'utilisateur : 
                <input type="text" name="username" id="username" value="' . $ligne['username'] . '" readonly>
              </label><br>';
        echo '<label for="password">Mot de passe : 
                <input type="password" name="password" id="password" readonly>
                <input type="checkbox" id="afficher_mot_de_passe" style="display:none;width:29px;right: -3px;height: 24px;top: 133px;">
              </label><br>';
        echo '<label for="sender_name">Email l\'expéditeur : 
                <input type="text" name="sender_name" id="sender_name" value="' . $ligne['sender_name'] . '" readonly>
              </label><br>';
        echo '<label for="mail_receiver">Email receveur : 
                <input type="text" name="mail_receiver" id="mail_receiver" value="' . $ligne['mail_receiver'] . '" readonly>
              </label><br>';
        echo '<label for="name_mail_receiver">Nom receveur : 
                <input type="text" name="name_mail_receiver" id="name_mail_receiver" value="' . $ligne['name_mail_receiver'] . '" readonly>
              </label><br>';
        echo '<button type="button" style="background-color:yellow" class="btn edit-button edit-slide" style="display:none;" id="edit"><i class="bi bi-brush"></i></button>';
        echo '<div style="position:relative;height: 36px;display:none" id="cancel_conf">'; 
        echo '<div style="position:absolute;right:0">';    
        echo '<button type="button" id="cancel" class="btn cancel-edit-slide" style="background-color: #fa5838;"><i class="bi bi-x-lg"></i></button>';
        echo '<button type="submit" class="btn btn-success confirm-edit-button"><i class="bi bi-check"></i></button>';
        echo '</div>';
        echo '</div>';
        echo '<script>
                var checkbox = document.getElementById("afficher_mot_de_passe");
                var inputPassword = document.getElementById("password");
                
                checkbox.addEventListener("change", function() {
                    if (checkbox.checked) {
                        inputPassword.type = "text"; // Si coché, affiche le mot de passe
                    } else {
                        inputPassword.type = "password"; // Sinon, masque le mot de passe
                    }
                });
                
            const host = document.getElementById("host");
            const username = document.getElementById("username");
            const password = document.getElementById("password");
            const sender_name = document.getElementById("sender_name");
            const mail_receiver = document.getElementById("mail_receiver");
            const name_mail_receiver = document.getElementById("name_mail_receiver");
            
            const cancel_conf = document.getElementById("cancel_conf");
            const cancel = document.getElementById("cancel");
            const edit = document.getElementById("edit");

            edit.addEventListener("click", function () {
                checkbox.style.display = "block";
                edit.style.display = "none";
                cancel_conf.style.display = "block";
                host.removeAttribute("readonly");
                username.removeAttribute("readonly");
                password.removeAttribute("readonly");
                sender_name.removeAttribute("readonly");
                mail_receiver.removeAttribute("readonly");
                name_mail_receiver.removeAttribute("readonly");
            });
            cancel.addEventListener("click", function () {
                checkbox.style.display = "none";
                edit.style.display = "block";
                cancel_conf.style.display = "none";
                host.setAttribute("readonly", true);
                username.setAttribute("readonly", true);
                password.setAttribute("readonly", true);
                sender_name.setAttribute("readonly", true);
                mail_receiver.setAttribute("readonly", true);
                name_mail_receiver.setAttribute("readonly", true);
                titre.setAttribute("readonly", true);
            });
        </script>';
        echo '</form>';
    }

    echo '</div>';
} else {
    echo "Aucune donnée trouvée dans la base de données.";
}



// Fermer la connexion à la base de données
$connexion->close();
?>
