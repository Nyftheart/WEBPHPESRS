<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section Viewer</title>
</head>
<body>
<h1>Sections</h1>
<div id="sections">
    <?php
    // Faire la requête à l'API
    $url = "https://api-esrs.azurewebsites.net/Section.php";
    $sections = json_decode(file_get_contents($url), true);

    // Afficher les noms des sections et ajouter un formulaire pour chaque section
    foreach ($sections as $section) {
        echo "<div>";
        echo "<h2>" . $section['Nom'] . "</h2>";
        echo "<form method='post' action='sous-section.php'>";
        echo "<label for='response-" . $section['ID_Section'] . "'>Réponse :</label>";
        echo "<select id='response-" . $section['ID_Section'] . "' name='response-" . $section['ID_Section'] . "'>";
        echo "<option value='oui'>Oui</option>";
        echo "<option value='non'>Non</option>";
        echo "</select>";
        echo "<br>";
        echo "<input type='hidden' name='section_id' value='" . $section['ID_Section'] . "'>"; // Ajoutez un champ caché pour transmettre l'ID de la section
        echo "<input type='submit' value='Envoyer'>";
        echo "</form>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
