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
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #fff;
            color: #555;
            font-size: 16px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        select::-ms-expand {
            display: none;
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
        .conditional-message {
            font-style: italic;
            color: #777;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Formulaire Écologique</h2>
    <form method="POST" action="test.php" onsubmit="return validateForm()">
        <label for="q1">L’entreprise produit-elle ou utilise-t-elle des substances toxiques ?</label><br>
        <select id="q1" name="q1" required onchange="showConditionalMessage('q1', this.value)">
            <option value="">Sélectionner</option>
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select><br>
        <p id="conditional-message-q1" class="conditional-message" style="display: none;">Vous n'êtes pas concernés par ESRS E2</p>

        <label for="q2">L’utilisation de l’eau (usage quotidien du personnel) est-elle un enjeu majeur pour l’entreprise ?</label><br>
        <select id="q2" name="q2" required onchange="showConditionalMessage('q2', this.value)">
            <option value="">Sélectionner</option>
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select><br>
        <p id="conditional-message-q2" class="conditional-message" style="display: none;">Vous n'êtes pas concernés par ESRS E3</p>

        <label for="q3">Quelle est le nombre de salariés de l’entreprise ?</label><br>
        <select id="q3" name="q3" required onchange="showConditionalMessage('q3', this.value)">
            <option value="">Sélectionner</option>
            <option value="moins_de_750">Moins de 750</option>
            <option value="plus_de_750">Plus de 750</option>
        </select><br>
        <p id="conditional-message-q3" class="conditional-message" style="display: none;">Vous n'êtes pas concernés par ESRS E4 avant 2 ans</p>

        <label for="q4">L’activité de l’entreprise entraîne-t-elle une modification de la biodiversité et des écosystèmes ?</label><br>
        <select id="q4" name="q4" required>
            <option value="">Sélectionner</option>
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select><br>

        <label for="q5">Les ressources, déchets et leurs recyclages sont-ils un enjeu majeur pour l’entreprise ?</label><br>
        <select id="q5" name="q5" required>
            <option value="">Sélectionner</option>
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select><br>

        <input type="submit" value="Soumettre">
    </form>
</div>

<script>
    function showConditionalMessage(questionId, answer) {
        var messageElement = document.getElementById("conditional-message-" + questionId);
        if (questionId === 'q3' && answer === 'moins_de_750') {
            messageElement.style.display = "block";
        } else if (answer === "non") {
            messageElement.style.display = "block";
        } else {
            messageElement.style.display = "none";
        }
    }

    function validateForm() {
        var q1 = document.getElementById("q1").value;
        var q2 = document.getElementById("q2").value;
        var q3 = document.getElementById("q3").value;

        // Ajoutez d'autres variables pour les autres questions ici

        // Vérifier que les réponses aux questions écologiques ne sont pas vides
        if (q1.trim() === "" || q2.trim() === "" || q3.trim() === "") {
            alert("Veuillez répondre à toutes les questions écologiques.");
            return false;
        }

        // Si toutes les vérifications sont passées, retourner true pour soumettre le formulaire
        return true;
    }
</script>
</body>
</html>
