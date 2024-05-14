<?php
// Démarrer la session PHP
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Écologique</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Formulaire Écologique</h2>
    <form method="POST" action="Test-Design.php" onsubmit="return validateForm()">
        <label for="q1">Combien de fois par semaine utilisez-vous des moyens de transport en commun ?</label>
        <input type="text" id="q1" name="q1" required>

        <label for="q2">Quelle est votre consommation annuelle approximative d'électricité en kWh ?</label>
        <input type="text" id="q2" name="q2" required>

        <label for="q3">Pratiquez-vous le tri sélectif des déchets ?</label>
        <input type="text" id="q3" name="q3" required>

        <label for="q4">Combien de litres d'eau utilisez-vous en moyenne par jour ?</label>
        <input type="text" id="q4" name="q4" required>

        <input type="submit" value="Soumettre">
    </form>
</div>

<script>
    function validateForm() {
        var nom = document.getElementById("nom").value;
        var prenom = document.getElementById("prenom").value;
        var email = document.getElementById("email").value;
        var q1 = document.getElementById("q1").value;
        var q2 = document.getElementById("q2").value;
        var q3 = document.getElementById("q3").value;
        var q4 = document.getElementById("q4").value;

        // Vérifier que le nom et le prénom ne contiennent que des lettres
        var letters = /^[A-Za-z]+$/;
        if (!nom.match(letters) || !prenom.match(letters)) {
            alert("Veuillez entrer un nom et un prénom valides (lettres uniquement).");
            return false;
        }

        // Vérifier que l'email est valide
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email.match(emailPattern)) {
            alert("Veuillez entrer une adresse email valide.");
            return false;
        }

        // Vérifier que les réponses aux questions écologiques ne sont pas vides
        if (q1.trim() === "" || q2.trim() === "" || q3.trim() === "" || q4.trim() === "") {
            alert("Veuillez répondre à toutes les questions écologiques.");
            return false;
        }

        // Si toutes les vérifications sont passées, retourner true pour soumettre le formulaire
        return true;
    }
</script>
</body>
</html>
