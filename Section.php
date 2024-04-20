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
    // Récupérer les données POST du formulaire précédent
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';
    $entreprise = $_POST['entreprise'] ?? '';
    $telephone = $_POST['telephone'] ?? '';

    // Faire la requête à l'API pour obtenir les sections
    $url = "https://api-esrs.azurewebsites.net/Section.php";
    $sections = json_decode(file_get_contents($url), true);

    // Afficher les sections et ajouter un formulaire pour chaque section
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

        // Ajouter les valeurs reçues en tant que champs cachés
        echo "<input type='hidden' name='nom' value='" . $nom . "'>";
        echo "<input type='hidden' name='prenom' value='" . $prenom . "'>";
        echo "<input type='hidden' name='email' value='" . $email . "'>";
        echo "<input type='hidden' name='entreprise' value='" . $entreprise . "'>";
        echo "<input type='hidden' name='telephone' value='" . $telephone . "'>";

        echo "<input type='hidden' name='section_id' value='" . $section['ID_Section'] . "'>"; // Ajouter un champ caché pour transmettre l'ID de la section
        echo "<input type='submit' value='Envoyer'>";
        echo "</form>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
