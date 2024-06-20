<?php
    include("connectionBDD.php");
    $query = "SELECT * FROM img_slide";
    $result = $connexion->query($query);
    if ($result) {
        $titre = "";
        $description = "";
        while ($row = $result->fetch_assoc()) {
            $titre = $titre . "\"" .$row['titre'] . "\", ";
            $description = $description . "\"" .$row['description'] . "\", ";
        }
        $titre = substr($titre, 0, -1);
        $titre = substr($titre, 0, -1);
        $description = substr($description, 0, -1);
        $description = substr($description, 0, -1);
        echo '<script defer>
        let numero_t = 0;
        const titre = ['.$titre.'];
        const description = ['.$description.'];
        function ChangeTexteSlide(sens) {
            numero_t += sens;

            if (numero_t < 0)
                numero_t = titre.length - 1;
            if (numero_t >= titre.length)
                numero_t = 0;

            document.getElementById("message").innerHTML = titre[numero_t];
            document.getElementById("under_message").innerHTML = description[numero_t];
        }

        setInterval(() => {
            ChangeTexteSlide(1);
            }, 10160);
            
        </script>';
    } else {
        echo "Aucune donnée trouvée.";
    }

    $connexion->close();
?>
