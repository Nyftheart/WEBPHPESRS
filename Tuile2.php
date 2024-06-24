<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESRS Environnement</title>
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #F5F5DC;
            padding: 50px 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .header .logo-container {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        .header img.logo {
            height: 90px;
        }
        .header .icons {
            display: flex;
            gap: 20px;
            margin-left: auto;
        }
        .header .icons img {
            height: 60px;
            cursor: pointer;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #e7f5ef70;
            margin: 0;
            padding: 0;
            color: #333;


        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #FEFAE0;
            padding: 1em;
            border-bottom: 1px solid #ccc;
        }

        header .back-button {
            font-size: 1.5em;
            cursor: pointer;
        }

        header .logo {
            font-size: 1.2em;
            font-weight: bold;
        }

        header .user-icon {
            font-size: 1.5em;
        }

        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 2em;
            padding-top: 50px;
            gap: 4em;
            max-width: 1000px;
            margin: auto;
        }

        .card {
            background-color: #B7E4C7;
            border-radius: 8px;
            padding: 1.5em;
            width: 200px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            font-size: 1.2em;
            margin: 0 0 0.5em 0;
        }

        .card p {
            font-size: 1em;
            margin: 0 0 1em 0;
        }

        button {
            display: flex;
            justify-content: center;
            width: 100%;
            margin: 0.5em 0;
            padding: 0.5em;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;

        }

        button.concerned {
            background-color: #38B000;
            color: white;
        }

        button.not-concerned {
            background-color: #D00000;
            color: white;
        }

        button.completed {
            background-color: #95D5B2;
            color: white;
        }

        button.not-completed {
            background-color: #D00000;
            color: white;
        }
        .headerText{
            align-items: center;
            margin : auto;
            min-height: 130px;
            max-height: 130px;
        }
    </style>
</head>
<body>
<header class="header">
    <div class="logo-container">
        <img src="./images/v312_47.png" alt="Logo" class="logo">
    </div>
</header>
<h1 style="display: flex; justify-content: center; margin: auto; margin-top:25px;" >Liste des ESRS concernées en fonction de vos enjeux</h1>
<main>

    <div class="card" id="ESRS S1">
        <div class="headerText">
            <h2>Personnel de l'entreprise</h2>
            <p>(ESRS S1)</p>
        </div>
        <button class="not-concerned">Non Concerné</button>
        <button class="completed">Complété</button>
    </div>
    <div class="card" id="ESRS S2">
        <div class="headerText">
            <h2>Travailleurs dans la chaîne de valeur</h2>
            <p>(ESRS S2)</p>
        </div>
        <button class="not-concerned">Non Concerné</button>
        <button class="completed">Complété</button>
    </div>
    <div class="card" id="ESRS S3">
        <div class="headerText">
            <h2>Communauté affectées</h2>
            <p>(ESRS S3)</p>
        </div>
        <button class="not-concerned">Non Concerné</button>
        <button class="completed">Complété</button>
    </div>
    <div class="card" id="ESRS S4">
        <div class="headerText">
            <h2>Consommateurs et utilisateurs finaux</h2>
            <p>(ESRS S4)</p>
        </div>
        <button class="not-concerned">Non Concerné</button>
        <button class="completed">Complété</button>
    </div>
</main>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const esrsKeys = ['ESRS S1', 'ESRS S2', 'ESRS S3', 'ESRS S4'];

        esrsKeys.forEach(key => {
            const card = document.getElementById(key);
            const data = JSON.parse(localStorage.getItem(key)) || [];

            let isConcerned = data.some(item => item.resultImpact === '✅' || item.resultImpact2 === '✅');

            const concernedButton = card.querySelector('.not-concerned, .concerned');
            if (isConcerned) {
                concernedButton.textContent = "Concerné";
                concernedButton.classList.remove('not-concerned');
                concernedButton.classList.add('concerned');
            } else {
                concernedButton.textContent = "Non Concerné";
                concernedButton.classList.remove('concerned');
                concernedButton.classList.add('not-concerned');
            }

            // Check if completed (assuming that key existence means completion)
            const isCompleted = localStorage.getItem(key);
            const completedButton = card.querySelector('.completed');
            if (!isCompleted) {
                completedButton.textContent = "Non Complété";
                completedButton.classList.remove('completed');
                completedButton.classList.add('not-completed');
            }
        });
    });
</script>
</body>
</html>
