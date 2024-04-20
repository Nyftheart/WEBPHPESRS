<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section Viewer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        h2 {
            margin-top: 20px;
        }
        select, input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        select:hover, input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
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
</div>
</body>
</html>
