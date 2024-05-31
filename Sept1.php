<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Tiles - Résultats</title>
    <script src="https://kit.fontawesome.com/0beb06bd15.js" crossorigin="anonymous"></script>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Lato:400,700);

        body {
            background: #F2F2F2;
            padding: 0;
            margin: 0;
            position: relative; /* Pour que la boîte des statistiques soit relative à la page */
        }

        #stats-container {
            position: fixed;
            top: 0;
            bottom: 0; /* Prend toute la hauteur de la page */
            right: 0;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Fond semi-transparent */
            border-left: 1px solid #ccc; /* Ligne séparatrice */
            overflow-y: auto; /* Ajoute une barre de défilement si nécessaire */
            z-index: 999; /* Assure que la boîte reste au-dessus des tuiles */
        }

        #price {
            justify-content: space-around;
            margin-right: 300px; /* Laisse suffisamment d'espace pour la boîte des statistiques */
            display: flex;
            flex-wrap: wrap;
            padding-bottom: 20px; /* Ajoute un espace en bas pour laisser de la place pour la boîte des statistiques */
        }

        .plan {
            display: inline-block;
            margin: 10px 1%;
            font-family: 'Lato', Arial, sans-serif;
            position: relative; /* Pour que les tuiles soient positionnées relativement */
            z-index: 1; /* Assure que les tuiles restent en dessous de la boîte des statistiques */
        }

        .plan-inner {
            background: #fff;
            min-width: 280px;
            max-width: 280px;
            position:relative;
            z-index: 1; /* Assure que les tuiles restent en dessous de la boîte des statistiques */
        }

        .entry-title {
            background: #B0B0B0;
            height: 140px;
            position: relative;
            text-align: center;
            color: #fff;
            margin-bottom: 30px;
        }

        .entry-title>h3 {
            background: #7F7F7F;
            font-size: 20px;
            padding: 5px 0;
            text-transform: uppercase;
            font-weight: 700;
            margin: 0;
        }

        .entry-title .price {
            position: absolute;
            bottom: -25px;
            background: #7F7F7F;
            height: 95px;
            width: 95px;
            margin: 0 auto;
            left: 0;
            right: 0;
            overflow: hidden;
            border-radius: 50px;
            border: 5px solid #fff;
            line-height: 95px;
            font-size: 23px;
            font-weight: 700;
        }

        .price span {
            position: absolute;
            font-size: 9px;
            bottom: -10px;
            left: 30px;
            font-weight: 400;
        }

        .entry-content {
            color: #323232;
        }

        .entry-content ul {
            margin: 0;
            padding: 0;
            list-style: none;
            text-align: center;
        }

        .entry-content li {
            border-bottom: 1px solid #E5E5E5;
            padding: 10px 10px;
        }

        .btn {
            padding: 3em 0;
            text-align: center;
        }

        .btn a {
            margin:auto;
            padding: 10px 30px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 700;
            text-decoration: none;
            display: block;
            width: 70%;
        }

        .green .entry-title {
            background: #82E0AA;
        }

        .green .entry-title > h3 {
            background: #58D68D;
        }

        .green .price {
            background: #58D68D;
        }

        .blue .entry-title {
            background: #4484c1;
        }

        .blue .entry-title > h3 {
            background: #3772aa;
        }

        .blue .price   {
            background: #3772aa;
        }

        .orange .entry-title > h3 {
            background: #f0ad4e;
        }

        .orange .entry-title {
            background: #fbc068;
        }

        .orange .price {
            background: #f0ad4e;
        }

        .suivantbutton {
            background: #4484c1;
            color: #fff;
            border: none;
            padding: 10px 30px;
            cursor: pointer;
            text-transform: uppercase;
            font-weight: 700;
        }

        .toggle-button {
            position: relative;
        }

        .toggle-button::after {
            content: attr(data-tooltip);
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            background-color: #333;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .toggle-button:hover::after {
            opacity: 1;
        }

        /* Ajout de la marge à droite */
        .margin-right {
            margin-right: 20px;
        }

    </style>
</head>
<body>
<div id="stats-container">
    <div class="margin-right">
        <p>Taux de complétion : <span id="completion-rate"></span>%</p>
    </div>
    <div class="margin-right">
        <p>Nombre d'ESRS verts : <span id="green-count"></span></p>
    </div>
    <div class="margin-right">
        <p>Nombre d'ESRS bleus : <span id="blue-count"></span></p>
    </div>
    <div>
        <p>Nombre d'ESRS oranges : <span id="orange-count"></span></p>
    </div>
</div>
<div id="price"></div>
<div class="progress" id="progress"></div>
<script>
    // Récupérer les données du localStorage et générer les tuiles correspondantes
    function generateTilesFromLocalStorage() {
        var esrsData = JSON.parse(localStorage.getItem('esrsConcernes'));

        if (esrsData) {
            esrsData.forEach(function(esrs) {
                if (esrs.concerned) {
                    generateTile(esrs.code, esrs.name, esrs.color, esrs.content);
                }
            });
        }

        // Calcul du taux de complétion et du nombre d'ESRS par couleur
        var greenCount = 0;
        var blueCount = 0;
        var orangeCount = 0;
        var totalCompleted = 0;
        esrsData.forEach(function(esrs) {
            if (esrs.concerned) {
                if (localStorage.getItem(esrs.code)) {
                    totalCompleted++;
                    switch(esrs.color) {
                        case 'green':
                            greenCount++;
                            break;
                        case 'blue':
                            blueCount++;
                            break;
                        case 'orange':
                            orangeCount++;
                            break;
                    }
                }
            }
        });

        // Affichage du taux de complétion et du nombre d'ESRS par couleur
        document.getElementById('completion-rate').textContent = (totalCompleted / esrsData.length * 100).toFixed(2);
        document.getElementById('green-count').textContent = greenCount;
        document.getElementById('blue-count').textContent = blueCount;
        document.getElementById('orange-count').textContent = orangeCount;
    }

    // Générer une tuile
    function generateTile(id, title, color, content) {
        var planDiv = document.createElement('div');
        planDiv.className = 'plan'; // Convertir la couleur en minuscules
        planDiv.id = id;

        var planInnerDiv = document.createElement('div');
        planInnerDiv.className = 'plan-inner '  + color.toLowerCase();

        var entryTitleDiv = document.createElement('div');
        entryTitleDiv.className = 'entry-title btn-header-link ' + color.toLowerCase();
        entryTitleDiv.innerHTML = '<h3>' + title + '</h3>';

        var priceDiv = document.createElement('div');
        priceDiv.className = 'price';
        priceDiv.textContent = id;

        var entryContentDiv = document.createElement('div');
        entryContentDiv.className = 'entry-content';

        // Récupérer les données du stockage local pour la clé esrs.code
        var localStorageData = JSON.parse(localStorage.getItem(id));

        if (localStorageData) {
            // Construire la liste avec les données récupérées du stockage local
            var listHTML = '<ul>';
            localStorageData.forEach(function(item) {
                listHTML += '<li><strong>' + item + '</strong></li>';
            });
            listHTML += '</ul>';

            // Assigner la liste à entryContentDiv
            entryContentDiv.innerHTML = listHTML;
        } else {
            // Si aucune donnée n'est trouvée dans le stockage local, afficher un message par défaut
            entryContentDiv.innerHTML = '<p>Le dossier ' + id + ' n\'a pas encore été complété.</p>';
        }

        // Ajouter le contenu de la tuile à planInnerDiv
        planInnerDiv.appendChild(entryTitleDiv);
        entryTitleDiv.appendChild(priceDiv);
        planInnerDiv.appendChild(entryContentDiv);

        // Créer le bouton avec l'état correspondant
        var buttonLink = document.createElement('a');
        buttonLink.href = 'tableur.php?code=' + encodeURIComponent(id);
        if (localStorageData) {
            // Si des données sont disponibles, afficher "Complété" et le bouton vert
            buttonLink.textContent = 'Complété';
            buttonLink.style.backgroundColor = 'green';
            buttonLink.style.color = 'white';
        } else {
            // Sinon, afficher "Non Complété" et le bouton bleu
            buttonLink.textContent = 'Non Complété';
            buttonLink.style.backgroundColor = 'red';
            buttonLink.style.color = 'white';
        }
        var buttonDiv = document.createElement('div');
        buttonDiv.className = 'btn';
        buttonDiv.appendChild(buttonLink);
        planInnerDiv.appendChild(buttonDiv);

        // Ajouter planInnerDiv à planDiv
        planDiv.appendChild(planInnerDiv);

        // Ajouter planDiv à l'élément parent
        document.getElementById('price').appendChild(planDiv);
    }

    // Générer les tuiles à partir du localStorage lors du chargement de la page
    document.addEventListener('DOMContentLoaded', function() {
        generateTilesFromLocalStorage();
    });
</script>
</body>
</html>

