<?php
// Démarrer la session PHP
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sous-section Viewer</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1>Sous-sections</h1>
<div id="sous-sections">
    <?php
    // Vérifier si le formulaire de Section.php a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $responses = $_POST;
        $hasResponses = false;

        // Vérifier s'il y a des réponses soumises
        foreach ($responses as $value) {
            if ($value == "oui") {
                $hasResponses = true;
                break;
            }
            if ($value == "non") {
                $hasResponses = true;
                break;
            }
        }

        if ($hasResponses) {
            // Récupérer les réponses du formulaire
            foreach ($responses as $key => $value) {
                // Si la réponse est "oui", récupérer les sous-sections correspondantes
                if ($value == "oui") {
                    // Faire la requête à l'API pour récupérer les sous-sections correspondantes
                    $url = "https://api-esrs.azurewebsites.net/Sous-section.php?section_id=" . substr($key, strrpos($key, '-') + 1);
                    $sous_sections = json_decode(file_get_contents($url), true);

                    $url2 = "https://api-esrs.azurewebsites.net/Question.php?";
                    $questions = json_decode(file_get_contents($url2), true);

                    // Afficher la question de la section principale
                    $section_id = substr($key, strrpos($key, '-') + 1);
                    echo "<h2>Question de la section :</h2>";

                    // Afficher les sous-sections sous forme de tableau
                    foreach ($sous_sections as $sous_section) {
                        echo "<table>";
                        echo "<tr><th>Question</th><th>Réponse</th><th>Justification</th></tr>";
                        echo "<tr><td>" . getQuestionSection($section_id) ."</td><td>$value</td><td></td></tr>";
                        echo "<tr><td>" . $sous_section['Nom'] . "</td>";
                        echo "<td>";
                        echo "<select class='response' name='response-" . $sous_section['ID_Sous_section'] . "'>";
                        echo "<option value='non'>Non</option>";
                        echo "<option value='oui'>Oui</option>";

                        echo "</select>";
                        echo "</td>";
                        echo "<td><input type='text' name='justification-" . $sous_section['ID_Sous_section'] . "'></td></tr>"; // Colonne Justification
                        // Ajout d'un identifiant unique pour chaque sous-section
                        echo "<tr class='additional-questions' id='additional-questions-" . $sous_section['ID_Sous_section'] . "' style='display:none;'><td colspan='3'>";
                        if (!empty($questions)) {
                            echo "<table>";
                            echo "<tr><th>Question</th><th>Réponse</th><th>Justification</th></tr>";
                            foreach ($questions as $question) {
                                echo "<tr>";
                                echo "<td>" . $question['Contenu'] . "</td>";
                                echo "<td><select name='response-" . $question['ID_Question'] . "'>";
                                echo "<option value='oui'>Oui</option>";
                                echo "<option value='non'>Non</option>";
                                echo "</select></td>";
                                echo "<td><input type='text' name='justification-" . $question['ID_Question'] . "'></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "<p>Aucune question supplémentaire trouvée.</p>";
                        }
                        echo "</td></tr>";
                        echo "</table>";
                    }

                }
                if ($value == "non") {
                    echo "<table>";
                    echo "<tr><th>Question</th><th>Réponse</th><th>Justification</th></tr>";
                    echo "<tr><td>" . getQuestionSection($section_id) ."</td><td>$value</td><td><input type='text' name='justification-" . $sous_section['ID_Sous_section'] . "'></td></tr>";
                    echo "</table>";
                }
            }
        }

    } else {
        // Afficher un message si aucune réponse n'a été soumise
    }

    function getQuestionSection($section_id) {
        // Faire la requête à l'API pour récupérer la question de la section
        $url = "https://api-esrs.azurewebsites.net/Section.php?section_id=" . $section_id;
        $section = json_decode(file_get_contents($url), true);
        return $section[0]['Nom'];
    }
    ?>
</div>
<script>
    // Récupérer tous les éléments de sélection de réponse
    var responseSelects = document.querySelectorAll('.response');
    // Ajouter un gestionnaire d'événement pour chaque sélection
    responseSelects.forEach(function(select) {
        select.addEventListener('change', function() {
            // Récupérer l'identifiant unique de la sous-section
            var sousSectionId = this.name.split('-')[1];
            // Récupérer l'élément de ligne supplémentaire pour cette sous-section
            var additionalQuestionsRow = document.getElementById('additional-questions-' + sousSectionId);
            // Afficher ou masquer les questions supplémentaires en fonction de la sélection
            if (this.value === 'oui') {
                additionalQuestionsRow.style.display = 'table-row';
            } else {
                additionalQuestionsRow.style.display = 'none';
            }
        });
    });
</script>
</body>
</html>
