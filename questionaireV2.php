<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Step Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            font-size: 1.5em;
            margin-bottom: 1em;
        }

        .option {
            margin-bottom: 1em;
            border-radius: 4px;
            display: flex;
            align-items: center;
        }

        .option input {
            display: none;
        }

        .option label {
            padding: 10px;
            background-color: #e0f7fa;
            border: 2px solid transparent;
            border-radius: 4px;
            width: 100%;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .option input:checked + label {
            background-color: #b2ebf2;
            border-color: #00bcd4;
        }

        .options-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .option {
            flex: 1 1 calc(50% - 10px);
        }

        label {
            display: block;
            margin-top: 1em;
            font-size: 1em;
        }

        input[type="text"], input[type="email"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 0.5em;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #6200ea;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
            margin-top: 1em;
        }

        button:hover {
            background-color: #3700b3;
        }

    </style>
</head>
<body>

<div class="container">
    <form id="multiStepForm">
        <!-- Étape 1 -->
        <div id="typeStep">
            <h2>1. Bienvenue chez ETIPLANET 🌎 Vous êtes :</h2>
                <div class="option">
                    <input type="radio" id="TPE" name="type" value="TPE">
                    <label for="TPE">TPE (1 - 9 Collaborateurs)</label>
                </div>
                <div class="option">
                    <input type="radio" id="PME" name="type" value="PME">
                    <label for="PME">PME (10 - 249 Collaborateurs)</label>
                </div>
                <div class="option">
                    <input type="radio" id="ETI" name="type" value="ETI">
                    <label for="ETI">ETI (250 - 5000 Collaborateurs)</label>
                </div>
                <div class="option">
                    <input type="radio" id="Grands Groupes" name="type" value="Grands Groupes">
                    <label for="Grands Groupes">Grands Groupes ( >5000 Collaborateurs)</label>
                </div>
            <button type="button" id="nextButton">Next</button>
        </div>

        <!-- Étape 2 -->
        <div id="sectorStep" style="display: none;">
            <h2>2. 🤩 Super ! Quelle est votre secteur d'activité ?</h2>
            <div class="options-container">
                <div class="option">
                    <input type="radio" id="A" name="sector" value="Construction & Immobilier">
                    <label for="A">Construction & Immobilier</label>
                </div>
                <div class="option">
                    <input type="radio" id="B" name="sector" value="Conseil & Service">
                    <label for="B">Conseil & Service</label>
                </div>
                <div class="option">
                    <input type="radio" id="C" name="sector" value="Énergie & Environnement">
                    <label for="C">Énergie & Environnement</label>
                </div>
                <div class="option">
                    <input type="radio" id="D" name="sector" value="Événement & Tourisme">
                    <label for="D">Événement & Tourisme</label>
                </div>
                <div class="option">
                    <input type="radio" id="E" name="sector" value="Finance">
                    <label for="E">Finance</label>
                </div>
                <div class="option">
                    <input type="radio" id="F" name="sector" value="Agroalimentaire">
                    <label for="F">Agroalimentaire</label>
                </div>
                <div class="option">
                    <input type="radio" id="G" name="sector" value="Santé">
                    <label for="G">Santé</label>
                </div>
                <div class="option">
                    <input type="radio" id="H" name="sector" value="Assurance">
                    <label for="H">Assurance</label>
                </div>
                <div class="option">
                    <input type="radio" id="I" name="sector" value="Logistique & Mobilité">
                    <label for="I">Logistique & Mobilité</label>
                </div>
                <div class="option">
                    <input type="radio" id="J" name="sector" value="Industrie">
                    <label for="J">Industrie</label>
                </div>
                <div class="option">
                    <input type="radio" id="K" name="sector" value="Média & Communication">
                    <label for="K">Média & Communication</label>
                </div>
                <div class="option">
                    <input type="radio" id="L" name="sector" value="Service Publique & Éducation">
                    <label for="L">Service Publique & Éducation</label>
                </div>
                <div class="option">
                    <input type="radio" id="M" name="sector" value="Retail & E-Commerce">
                    <label for="M">Retail & E-Commerce</label>
                </div>
                <div class="option">
                    <input type="radio" id="N" name="sector" value="Technologie & IT">
                    <label for="N">Technologie & IT</label>
                </div>
            </div>
            <button type="button" id="nextButton2">Next</button>
        </div>

        <!-- Étape 3 -->
        <div id="detailsStep" style="display: none;">
            <h2>3. Entrez vos détails</h2>
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name"><br>
            <label for="surname">Prénom:</label>
            <input type="text" id="surname" name="surname"><br>
            <button type="button" id="nextButton3">Next</button>
        </div>

        <div id="contacStep" style="display: none;">
            <h2>3. Entrez vos contact</h2>
            <label for="name">Email:</label>
            <input type="text" id="Email" name="Email"><br>
            <label for="surname">Numéro de téléphone:</label>
            <input type="text" id="Numéro" name="Numéro"><br>
            <button type="button" id="nextButton4">Next</button>
        </div>

        <!-- Ajoutez d'autres étapes ici -->

        <!-- Étape finale -->
        <div id="confirmationStep" style="display: none;">
            <h2>Acceptez les conditions</h2>
            <div class="option">
                <input type="checkbox" id="acceptConditions" name="acceptConditions" required>
                <label for="acceptConditions">J'accepte les <a href="#">conditions d'utilisation</a></label>
            </div>
            <button type="button" id="submitButton">Submit</button>
            <!-- Ajoutez d'autres champs de confirmation ici -->
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const typeStep = document.getElementById('typeStep');
        const sectorStep = document.getElementById('sectorStep');
        const detailsStep = document.getElementById('detailsStep');
        const contacStep = document.getElementById('contacStep');
        const confirmationStep = document.getElementById('confirmationStep');
        const nextButton = document.getElementById('nextButton');
        const nextButton2 = document.getElementById('nextButton2');
        const nextButton3 = document.getElementById('nextButton3');
        const nextButton4 = document.getElementById('nextButton4');
        const submitButton = document.getElementById('submitButton'); // Bouton "Submit" à l'étape de confirmation
        const form = document.getElementById('multiStepForm');

        nextButton.addEventListener('click', function () {
            typeStep.style.display = 'none';
            sectorStep.style.display = 'block';
        });

        nextButton2.addEventListener('click', function () {
            sectorStep.style.display = 'none';
            detailsStep.style.display = 'block';
        });

        nextButton3.addEventListener('click', function () {
            detailsStep.style.display = 'none';
            contacStep.style.display = 'block';
        });
        nextButton4.addEventListener('click', function () {
            contacStep.style.display = 'none';
            confirmationStep.style.display = 'block';
        });

        submitButton.addEventListener('click', function () {
            // Effectuer la redirection vers la page PHP après la soumission du formulaire
            window.location.href = 'Sept1.php'; // Assurez-vous que le chemin est correct
        });

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            // Récupérer et afficher les données du formulaire
            const formData = new FormData(this);
            const formValues = {};
            for (const [key, value] of formData.entries()) {
                formValues[key] = value;
            }
            document.getElementById('typeConfirmation').textContent = formValues['type'];
            document.getElementById('sectorConfirmation').textContent = formValues['sector'];
            document.getElementById('nameConfirmation').textContent = formValues['name'];
            document.getElementById('surnameConfirmation').textContent = formValues['surname'];
        });
    });



</script>

</body>
</html>
