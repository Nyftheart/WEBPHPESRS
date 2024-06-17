<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESRS Environnement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2D6A4F;
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
            gap: 1em;
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
            display: block;
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
    </style>
</head>
<body>
<header>
    <div class="back-button">&#x21A9;</div>
    <div class="logo">ESRS Environnement</div>
    <div class="user-icon">&#x1F464;</div>
</header>
<main>
    <div class="card" id="ESRS E1">
        <h2>CHANGEMENT CLIMATIQUE</h2>
        <p>(ESRS E1)</p>
        <button class="not-concerned">Non Concerné</button>
        <button class="completed">Complété</button>
    </div>
    <div class="card" id="ESRS E2">
        <h2>POLLUTION</h2>
        <p>(ESRS E2)</p>
        <button class="not-concerned">Non Concerné</button>
        <button class="completed">Complété</button>
    </div>
    <div class="card" id="ESRS E3">
        <h2>RESSOURCES AQUATIQUES ET MARINES</h2>
        <p>(ESRS E3)</p>
        <button class="not-concerned">Non Concerné</button>
        <button class="completed">Complété</button>
    </div>
    <div class="card" id="ESRS E4">
        <h2>BIODIVERSITE & ECOSYSTEME</h2>
        <p>(ESRS E4)</p>
        <button class="not-concerned">Non Concerné</button>
        <button class="completed">Complété</button>
    </div>
    <div class="card" id="ESRS E5">
        <h2>UTILISATION DES RESSOURCES & ÉCONOMIE CIRCULAIRE</h2>
        <p>(ESRS E5)</p>
        <button class="not-concerned">Non Concerné</button>
        <button class="completed">Complété</button>
    </div>
</main>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const esrsKeys = ['ESRS E1', 'ESRS E2', 'ESRS E3', 'ESRS E4', 'ESRS E5'];

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
