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

    // Afficher les noms des sections
    foreach ($sections as $section) {
        echo "<p>" . $section['Nom'] . "</p>";
    }
    ?>
</div>
</body>
</html>
