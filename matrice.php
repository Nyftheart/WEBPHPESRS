<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matérialité</title>
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
            margin: 0;
            padding: 0;
            background-color: #e7f5ef70;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
        }

        header .logo {
            height: 50px;
        }

        .profile-icon {
            width: 50px;
            height: 50px;
            background-color: #ddd;
            border-radius: 50%;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 5%;
        }

        .matrix-container {
            display: flex;
            align-items: center;
            justify-content: end;
            padding-right: 25px;
        }

        .matrix {
            display: grid;
            grid-template-columns: auto 50px;
            grid-template-rows: auto auto;
            position: relative;
        }

        .axis-label {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            position: absolute;
        }

        .y-axis {
            transform: rotate(-90deg);
            left: -110px;
            top: 50%;
        }

        .x-axis {
            top: 600px;
            left: 33%;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(4, 140px);
            grid-template-rows: repeat(4, 139.5px);
            gap: 5px;
            border: 2px solid #000;
            position: relative;
        }

        .cell {
            border: 1px solid #000;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            height: 100%;
            margin-bottom: 3px;
            overflow: hidden;
        }

        .cell::before {
            content: " ";
            width: 15px;
            height: 15px;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .item1::before { background-color: #FFFF00; }
        .item2::before { background-color: #FFD700; }
        .item3::before { background-color: #FF0000; }
        .item5::before { background-color: #00FF00; }
        .item6::before { background-color: #00BFFF; }
        .item8::before { background-color: #1E90FF; }

        .legend {
            max-width: 30%;
            padding: 10px;
            margin-left: 20px;
            background-color: white;
        }

        .legend ul {
            list-style: none;
            padding: 0;
        }

        .legend li {
            margin: 5px 0;
            display: flex;
            align-items: center;
        }

        .legend li::before {
            content: "●";
            font-size: 20px;
            margin-right: 5px;
        }

        .colorcell {
            background-color: #D8D3FB;
        }

        .whitecell {
            background-color: white;
        }

        .item {
            position: absolute;
            width: 30px; /* Adjust size */
            height: 30px; /* Adjust size */
            border-radius: 50%;
            border: 1px solid black; /* Add border for better visibility */
        }

        .item1 { background-color: #FFFF00; }
        .item2 { background-color: #FFD700; }
        .item3 { background-color: #FF0000; }
        .item4 { background-color: #00FF00; }
        .item5 { background-color: #00BFFF; }
        .item6 { background-color: #1E90FF; }
    </style>
</head>
<body>
<header class="header">
    <div class="logo-container">
        <img src="./images/v312_47.png" alt="Logo" class="logo">
        <img src="./images/title_ecriture.png" alt="Logo" class="logo">
    </div>
</header>
<h1 style="margin: auto;
    display: flex;
    justify-content: center;
    margin-top: 50px;">Matrice de matérialité </h1>
<main>

    <div class="matrix-container">
        <div class="matrix">
            <div class="axis-label y-axis">Matérialité d'impact</div>
            <div class="grid">
                <div class="cell colorcell" data-row="1" data-col="1"></div>
                <div class="cell colorcell" data-row="1" data-col="2"></div>
                <div class="cell colorcell" data-row="1" data-col="3"></div>
                <div class="cell colorcell" data-row="1" data-col="4"></div>

                <div class="cell whitecell" data-row="2" data-col="1"></div>
                <div class="cell whitecell" data-row="2" data-col="2"></div>
                <div class="cell whitecell" data-row="2" data-col="3"></div>
                <div class="cell colorcell" data-row="2" data-col="4"></div>

                <div class="cell whitecell" data-row="3" data-col="1"></div>
                <div class="cell whitecell" data-row="3" data-col="2"></div>
                <div class="cell whitecell" data-row="3" data-col="3"></div>
                <div class="cell colorcell" data-row="3" data-col="4"></div>

                <div class="cell whitecell" data-row="4" data-col="1"></div>
                <div class="cell whitecell" data-row="4" data-col="2"></div>
                <div class="cell whitecell" data-row="4" data-col="3"></div>
                <div class="cell colorcell" data-row="4" data-col="4"></div>
            </div>
            <div class="axis-label x-axis">Matérialité financière</div>
        </div>
        <div class="legend">
            <ul id="legend-list">
                <!-- Dynamically populated legend items will appear here -->
            </ul>
        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const legendList = document.getElementById('legend-list');

        // Récupérer la chaîne de requête de l'URL actuelle
        const queryString = window.location.search;

        // Utiliser URLSearchParams pour récupérer le paramètre 'code'
        const urlParams = new URLSearchParams(queryString);
        const code = urlParams.get('code');

        // Define the keys for valeur 1 and valeur 2
        const valeur1Keys = ['negatif-ampleur', 'negatif-etendu', 'positif-ampleur', 'negatif-caractere', 'positif-etendu'];
        const valeur2Keys = ['financiers-activite', 'financiers-opportunites', 'financiers-patrimoine'];

        // Function to retrieve the data from local storage and populate the legend
        function populateLegendFromLocalStorage() {
            // Parcourir le localStorage
            for (let i = 0; i < localStorage.length; i++) {
                let key = localStorage.key(i);

                // Vérifier si la clé commence par le code
                if (key.startsWith(code)) {
                    let value = localStorage.getItem(key);

                    // Transformer la valeur en objet JavaScript
                    let data = JSON.parse(value);

                    // Vérifier si les données sont un tableau
                    if (Array.isArray(data)) {
                        // Parcourir les éléments du tableau
                        data.forEach(item => {
                            // Initialize highest values for the current item
                            let highestImpact = Number.NEGATIVE_INFINITY;
                            let highestFiscal = Number.NEGATIVE_INFINITY;

                            // Check for the highest values in valeur1Keys and valeur2Keys
                            valeur1Keys.forEach(k => {
                                if (item.sliders[k] !== undefined) {
                                    highestImpact = Math.max(highestImpact, parseInt(item.sliders[k]));
                                }
                            });
                            valeur2Keys.forEach(k => {
                                if (item.sliders[k] !== undefined) {
                                    highestFiscal = Math.max(highestFiscal, parseInt(item.sliders[k]));
                                }
                            });

                            // Determine row and column indices based on highestImpact and highestFiscal
                            let rowIndex, colIndex;

                            if (highestImpact === 100) {
                                rowIndex = 1;
                            } else if (highestImpact >= 75) {
                                rowIndex = 2;
                            } else if (highestImpact >= 50) {
                                rowIndex = 3;
                            } else if (highestImpact >= 25) {
                                rowIndex = 4;
                            } else {
                                rowIndex = 4;
                            }

                            if (highestFiscal === 100) {
                                colIndex = 4;
                            } else if (highestFiscal >= 75) {
                                colIndex = 3;
                            } else if (highestFiscal >= 50) {
                                colIndex = 2;
                            } else if (highestFiscal >= 25) {
                                colIndex = 1;
                            } else {
                                colIndex = 1;
                            }

                            // Check if rowIndex is 2 or higher and colIndex is 3
                            if (rowIndex <= 2 || colIndex >= 3) {
                                // Créer un élément de légende pour chaque texte
                                let listItem = document.createElement('li');
                                listItem.innerHTML = item.text;
                                legendList.appendChild(listItem);

                                // Find the corresponding cell and add the item
                                let cell = findCell(highestImpact, highestFiscal);
                                if (cell) {
                                    // Create multiple points randomly positioned within the cell
                                    for (let j = 0; j < 1; j++) { // Adjust the number of points as needed
                                        let itemElement = document.createElement('div');
                                        itemElement.classList.add('item');
                                        let color = getItemColor(item.text);
                                        itemElement.style.backgroundColor = color;
                                        placeItemInCell(itemElement, cell);

                                        // Ajouter la couleur de l'item à la légende
                                        listItem.style.color = color;
                                    }
                                }
                            }
                        });
                    } else {
                        console.error('Les données pour la clé ' + key + ' ne sont pas au format attendu.');
                    }
                }
            }
        }

        // Function to find the corresponding cell based on highestImpact and highestFiscal
        function findCell(highestImpact, highestFiscal) {
            // Determine row and column indices based on highestImpact and highestFiscal
            let rowIndex, colIndex;

            if (highestImpact === 100) {
                rowIndex = 1;
            } else if (highestImpact >= 75) {
                rowIndex = 2;
            } else if (highestImpact >= 50) {
                rowIndex = 3;
            } else if (highestImpact >= 25) {
                rowIndex = 4;
            } else {
                rowIndex = 4;
            }

            if (highestFiscal === 100) {
                colIndex = 4;
            } else if (highestFiscal >= 75) {
                colIndex = 3;
            } else if (highestFiscal >= 50) {
                colIndex = 2;
            } else if (highestFiscal >= 25) {
                colIndex = 1;
            } else {
                colIndex = 1;
            }

            // Return the corresponding cell element
            return document.querySelector(`.cell[data-row="${rowIndex}"][data-col="${colIndex}"]`);
        }

        // Function to place an item randomly within a cell
        function placeItemInCell(itemElement, cell) {
            const cellRect = cell.getBoundingClientRect();
            const itemSize = 20; // Size of the item element

            // Calculate random position within the cell
            let posX = Math.random() * (cellRect.width - itemSize - 10);
            let posY = Math.random() * (cellRect.height - itemSize - 10);

            // Set position styles
            itemElement.style.position = 'absolute';
            itemElement.style.left = `${posX}px`;
            itemElement.style.top = `${posY}px`;

            // Append the item to the cell
            cell.appendChild(itemElement);
        }

        // Function to determine color based on item text (to be implemented based on your color logic)
        // Set pour stocker les couleurs déjà utilisées
        const usedColors = new Set();

        function getItemColor(itemText) {
            let color;

            // Tant que la couleur générée est déjà utilisée, continuez à générer une nouvelle couleur
            do {
                // Générer des valeurs RGB aléatoires
                const r = Math.floor(Math.random() * 256);
                const g = Math.floor(Math.random() * 256);
                const b = Math.floor(Math.random() * 256);

                // Construire le code couleur hexadécimal
                color = `#${r.toString(16).padStart(2, '0')}${g.toString(16).padStart(2, '0')}${b.toString(16).padStart(2, '0')}`;
            } while (usedColors.has(color)); // Vérifier si la couleur est déjà utilisée

            // Ajouter la couleur à l'ensemble des couleurs utilisées
            usedColors.add(color);

            return color;
        }


        // Call the function to generate the legend and find the highest values when the page loads
        populateLegendFromLocalStorage();
    });


</script>
</body>
</html>
