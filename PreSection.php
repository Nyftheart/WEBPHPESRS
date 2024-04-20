<?php
// Démarrer la session PHP
session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les réponses du formulaire
    $responses = $_POST;

    // Stocker les réponses dans la session
    $_SESSION['pre_responses'] = $responses;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
<h2>Formulaire</h2>
<form method="POST" action="section.php">
    <label for="nom">Nom :</label><br>
    <input type="text" id="nom" name="nom" required><br><br>

    <label for="prenom">Prénom :</label><br>
    <input type="text" id="prenom" name="prenom" required><br><br>

    <label for="email">Adresse email :</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="entreprise">Entreprise :</label><br>
    <input type="text" id="entreprise" name="entreprise"><br><br>

    <label for="telephone">Numéro de téléphone :</label><br>
    <input type="tel" id="telephone" name="telephone"><br><br>

    <input type="submit" value="Soumettre">
</form>
</body>
</html>
