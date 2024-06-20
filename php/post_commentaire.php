<?php
                        // Récupérer les commentaires depuis la base de données
                        $result = $connexion->query("SELECT id, contenu, date_creation FROM commentaire ORDER BY date_creation DESC");

                        // Afficher les commentaires existants
                        while ($row = $result->fetch_assoc()) {
                            echo "<li class='comment' style='position:relative'>";
                            echo "<p>" . htmlspecialchars($row["contenu"]) . "</p>";
                            echo "<small style='position: absolute;
                            right: 10px;
                            font-size: 11px;
                            color: #555;
                            bottom: 4px;'>" . htmlspecialchars($row["date_creation"]) . "</small>";
                            echo "</li>";
                        }
                    ?>