<?php
// Démarrer la session PHP
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
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
    <h2>Formulaire</h2>
    <form method="POST" action="section.php" onsubmit="return validateForm()">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="email">Adresse email :</label>
        <input type="email" id="email" name="email" required>

        <label for="entreprise">Entreprise :</label>
        <input type="text" id="entreprise" name="entreprise">

        <label for="telephone">Numéro de téléphone :</label>
        <input type="tel" id="telephone" name="telephone" required>
        <span id="tel-error" style="color: red; display: none;">Veuillez entrer un numéro de téléphone valide (10 chiffres).</span>

        <input type="submit" value="Soumettre">
    </form>
</div>

<script>
    function validateForm() {
        var nom = document.getElementById("nom").value;
        var prenom = document.getElementById("prenom").value;
        var email = document.getElementById("email").value;
        var telephone = document.getElementById("telephone").value;

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

        // Vérifier que le numéro de téléphone est composé de 10 chiffres
        var phonePattern = /^\d{10}$/;
        if (!telephone.match(phonePattern)) {
            document.getElementById("tel-error").style.display = "block";
            return false;
        }

        // Si toutes les vérifications sont passées, retourner true pour soumettre le formulaire
        return true;
    }
</script>
</body>
</html>
