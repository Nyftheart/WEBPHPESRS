<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Tableau Justification de la Matérialité</title>
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #F5F5DC;
            padding: 50px 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            margin-bottom: 50px;
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
        table {
            top: 100px;
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: center;
        }
        th {
            background-color: #ffffff;
        }
        .header-table {
            background-color: #309168;
            color: white;
        }
        .subheader {
            background-color: #ff9999;
            border-bottom: white 1px solid;
            border-right: white 1px solid;
        }
        .result, .risk-opportunity, .financial-result {
        }
        .subheader2 {
            border-bottom: white 1px solid;
            border-right: white 1px solid;
            background-color: #cc99ff;
        }
        .dynamic-row {
            background-color: lightgreen;
        }
        .gauge-container {
            margin: auto;
            max-width: 104px;
            position: relative;
            display: flex;
            align-items: center;
        }
        .gauge {
            display: flex;
            border-radius: 25px;
            overflow: hidden;
            border: 2px solid black;
            width: 100px;
            height: 20px;
        }
        .gauge-segment {
            flex: 1;
            height: 100%;
            cursor: pointer;
        }
        .green {
            background-color: #8cd98c;
        }
        .yellow {
            background-color: #ffff99;
        }
        .orange {
            background-color: #ffd966;
        }
        .red {
            background-color: #ff6666;
        }
        .triangle {
            position: absolute;
            top: 25px;
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 12px solid black;
            transform: translateX(-50%) rotate(0deg);
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            text-align: center;
            position: relative;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .rowinter{
            border-bottom: 1px black solid;
        }
        .submenu td{
            border-right: white 1px solid;
        }
        .validate-button {
            margin-top: 2%;
            margin-left: 85%;
            background-color: #4CAF50; /* Fond vert */
            border: none; /* Retire les bordures */
            color: white; /* Texte blanc */
            padding: 15px 32px; /* Ajoute du padding */
            text-align: center; /* Centre le texte */
            text-decoration: none; /* Retire le soulignement */
            display: inline-block; /* Affiche en ligne */
            font-size: 16px; /* Augmente la taille de la police */
            cursor: pointer; /* Change le curseur au survol */
            font-family: 'Arial', sans-serif; /* Police */
            border-radius: 5px; /* Coins arrondis */
        }

        .validate-button:hover {
            background-color: #45a049; /* Fond vert plus foncé au survol */
        }

        .modal-content {
            font-size: 30px;
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            text-align: center;
            position: relative;
            border-radius: 10px; /* Ajout de coins arrondis */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Ajout d'une ombre */
        }

        .modal-content button {
            background-color: #4CAF50; /* Fond vert */
            border: none; /* Retire les bordures */
            color: white; /* Texte blanc */
            padding: 10px 20px; /* Ajoute du padding aux boutons */
            text-align: center; /* Centre le texte */
            text-decoration: none; /* Retire le soulignement */
            display: inline-block; /* Affiche en ligne */
            font-size: 16px; /* Taille de la police */
            cursor: pointer; /* Curseur */
            margin-top: 10px; /* Marge en haut des boutons */
            border-radius: 5px; /* Coins arrondis */
        }

        .modal-content button:hover {
            background-color: #45a049; /* Fond vert plus foncé au survol */
        }
        .tooltip {

            text-align: left;
            position: absolute;
            display: none;
            background-color: #caf4ca;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1;
            margin: auto;
            width: 600px; /* Ajustez la largeur selon votre contenu */
        }

        .tooltip-content {
            display: none;
            position: absolute;
            background-color: #caf4ca;
            border: 1px solid #ccc;
            padding: 10px;
            z-index: 1000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            white-space: pre-line; /* Allow line breaks */
        }


        .tooltip-content ul {
            list-style-type: none;
            padding: 0;
        }

        .tooltip-content ul li {
            margin-bottom: 5px;
        }

    </style>
</head>
<header class="header">
    <div class="logo-container">
        <img src="./images/v312_47.png" alt="Logo" class="logo">
        <img src="./images/title_ecriture.png" alt="Logo" class="logo">
    </div>
</header>

<body>

<table id="data-table">
    <tr>
        <th style="border: none"></th>
        <th colspan="10" class="header-table">JUSTIFICATION DE LA MATÉRIALITÉ</th>
    </tr>
    <tr style="border-bottom: white">
        <th rowspan="2" style="border: none"></th>
        <th colspan="3" class="subheader" style="background-color: #BADFCF;">MATERIALITE D'IMPACT NÉGATIF</th>
        <th colspan="2" class="subheader" style="background-color: #BADFCF">MATERIALITE D'IMPACT POSITIF</th>
        <th rowspan="2" class="result">Résultat de la matérialité d'impact</th>
        <th colspan="2" class="subheader2" style="background-color: #D1E1DB">Effets financiers attendus des risques</th>
        <th rowspan="2" class="risk-opportunity" style="background-color: #D1E1DB; cursor: pointer;" data-tooltip="show" data-tooltip-content="Évaluation des effets financiers sur des économies de coûts futures, taille du marché lié aux opportunités identifiées :<br>🟩 Peu ou pas d’impact<br>🟨 Impact modéré<br>🟧 Impact significatif<br>🟥 Impact majeur">Effets financiers attendus des opportunités <br><sup><img src="images/img.png" style="height: 20px"></sup></th>
        <th rowspan="2" class="result">Résultat de la matérialité financière</th>
    </tr>
    <tr style="border-bottom: 1px black solid; border-right: white 1px solid;" class="submenu">
        <td style="background-color: #BADFCF; cursor: pointer;" data-tooltip="show" data-tooltip-content="Importance de l’impact négatif sur les personnes ou l’environnement :<br>🟩 Peu ou pas d’impact<br>🟨 Impact visible mais modéré sur les ressources naturelles<br>🟧 Impact significatif sur la qualité/quantité des ressources naturelles affectées<br>🟥 Forte dégradation des ressources naturelles">AMPLEUR <br><sup><img src="images/img.png" style="height: 20px"></sup></td>
        <td style="background-color: #BADFCF; cursor: pointer;" data-tooltip="show" data-tooltip-content="Dans quelle mesure les impacts négatifs sont répandus :<br>🟩 Impact très localisé<br>🟨 Impact régional<br>🟧 Impact national<br>🟥 Impact multi-pays">ÉTENDUE <br><sup><img src="images/img.png" style="height: 20px"></sup></td>
        <td style="background-color: #BADFCF; cursor: pointer;" data-tooltip="show" data-tooltip-content="Si et dans quelle mesure les impacts négatifs peuvent être réparés :<br>🟩 Impact non significatif<br>🟨 Impact nécessitant peu de ressources pour y remédier (humaines, technologiques, financières, ...)<br>🟧 Impact nécessitant de ressources importantes pour y remédier<br>🟥 Impact définitif">CARACTÈRE IRRÉMÉDIABLE <br><sup><img src="images/img.png" style="height: 20px"></sup></td>
        <td style="background-color: #BADFCF; cursor: pointer;" data-tooltip="show" data-tooltip-content="Dans quelle mesure les impacts positifs sont répandus :<br>🟩 Impact très localisé<br>🟨 Impact régional<br>🟧 Impact national<br>🟥 Impact multi-pays">AMPLEUR POSITIVE <br><sup><img src="images/img.png" style="height: 20px"></sup></td>
        <td style="background-color: #BADFCF; cursor: pointer;" data-tooltip="show" data-tooltip-content="Bénéfice lié à l’impact positif sur les personnes ou l’environnement :<br>🟩 Peu ou pas d’impact<br>🟨 Impact visible mais modéré sur les ressources naturelles<br>🟧 Impact significatif sur la qualité/quantité des ressources naturelles affectées<br>🟥 Forte dégradation des ressources naturelles">ÉTENDUE POSITIVE <br><sup><img src="images/img.png" style="height: 20px"></sup></td>
        <td style="background-color: #D1E1DB; cursor: pointer;" data-tooltip="show" data-tooltip-content="Évaluation des effets financiers sur la part du chiffre d'affaires et la localisation des activités exposées :<br>🟩 Peu ou pas d’impact<br>🟨 Impact modéré<br>🟧 Impact significatif<br>🟥 Impact majeur">EFFETS FINANCIERS <sup><img src="images/img.png" style="height: 20px"></sup></td>
        <td style="background-color: #D1E1DB; cursor: pointer;" data-tooltip="show" data-tooltip-content="Évaluation des effets financiers potentiels sur la part et la localisation des actifs exposés, classification des actifs par classe d'efficacité énergétique, sorties de ressources futures :<br>🟩 Peu ou pas d’impact<br>🟨 Impact modéré<br>🟧 Impact significatif<br>🟥 Impact majeur">LOCALISATION DES ACTIFS <br><sup><img src="images/img.png" style="height: 20px"></sup></td>
    </tr>



    <tbody id="table-body">
    <!-- Les lignes de données seront générées ici -->
    </tbody>
</table>

<button onclick="" id="saveButton" class="validate-button">VALIDER</button>

<div id="myModal" class="modal">
    <div class="modal-content">
        <p id="questionText">Chargement de la question...</p>
        <button id="confirmButton">Oui</button>
        <button id="cancelButton">Non</button>
    </div>
</div>

<script>
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    function createGauge(id) {
        return `
        <div class="gauge-container" id="container-${id}" >
            <div class="gauge" id="gauge-${id}">
                <div class="gauge-segment green" data-value="25"></div>
                <div class="gauge-segment yellow" data-value="50"></div>
                <div class="gauge-segment orange" data-value="75"></div>
                <div class="gauge-segment red" data-value="100"></div>
            </div>
            <div class="triangle" id="triangle-${id}"></div>
        </div>
    `;
    }

    function createTableRow(data, index) {
        const row = document.createElement('tr');
        row.id = `impact${index + 1}-row`;
        row.className = "rowinter"

        const resultImpact = (data['negatif-ampleur'] > 50 || data['negatif-etendu'] > 50 || data['positif-caractere'] > 50 || data['positif-ampleur'] > 50) ? '✅' : '❌';

        const columns = `
        <td style="border: none; border-bottom: solid 1px black; background-color: #309168; color: white">${data.text}</td>
        <td>${createGauge(`negatif-ampleur-${index}`)}</td>
        <td>${createGauge(`negatif-etendu-${index}`)}</td>
        <td>${createGauge(`negatif-caractere-${index}`)}</td>
        <td>${createGauge(`positif-ampleur-${index}`)}</td>
        <td>${createGauge(`positif-etendu-${index}`)}</td>
        <td id="result-impact-${index}">${resultImpact}</td>
        <td>${createGauge(`financiers-patrimoine-${index}`)}</td>
        <td>${createGauge(`financiers-activite-${index}`)}</td>
        <td>${createGauge(`financiers-opportunites-${index}`)}</td>
        <td id="result2-impact-${index}">${resultImpact}</td>
    `;

        row.innerHTML = columns;
        return row;
    }

    function loadTableData() {
        const codeParam = getUrlParameter('code');

        fetch('table.json')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('table-body');
                const filteredData = data.filter(item => item.code.includes(codeParam));
                filteredData.forEach((item, index) => {
                    const row = createTableRow(item, index);
                    tableBody.appendChild(row);
                });

                // Initialiser les jauges après avoir ajouté les lignes au tableau
                initializeGauges();
            })
            .catch(error => console.error('Erreur lors du chargement des données JSON:', error));
    }

    function initializeGauges() {
        document.querySelectorAll('.gauge-container').forEach((gaugeContainer) => {
            const segments = gaugeContainer.querySelectorAll('.gauge-segment');
            const triangle = gaugeContainer.querySelector('.triangle');
            const id = gaugeContainer.id.split('-')[1];

            function setPosition(index) {
                const segmentWidth = gaugeContainer.clientWidth / segments.length;
                const newLeft = segmentWidth * (index + 0.5); // Position the triangle in the center of the segment
                triangle.style.left = `${newLeft}px`;
                triangle.dataset.value = segments[index].dataset.value;
                updateResults();
            }

            segments.forEach((segment, index) => {
                segment.addEventListener('click', () => {
                    setPosition(index);
                });
            });

            // Set default position to the first segment (green)
            setPosition(0);
        });

        updateResults(); // Initial call to set the correct initial state
    }

    function updateResults() {
        const rows = document.querySelectorAll('#data-table tr[id^="impact"]');
        rows.forEach((row, rowIndex) => {
            const gauges = row.querySelectorAll('.gauge-container .triangle');
            let resultImpactValid = false;
            let resultImpact2Valid = false;

            gauges.forEach((triangle) => {
                const value = parseInt(triangle.dataset.value, 10);

                if (value > 50) {
                    const id = triangle.id.split('-')[1];
                    if (id.includes('negatif') || id.includes('positif')) {
                        resultImpactValid = true;
                    } else {
                        resultImpact2Valid = true;
                    }
                }
            });

            document.getElementById(`result-impact-${rowIndex}`).textContent = resultImpactValid ? '✅' : '❌';
            document.getElementById(`result2-impact-${rowIndex}`).textContent = resultImpact2Valid ? '✅' : '❌';
        });
    }

    function showModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "block";
    }

    function hideModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    document.getElementById("confirmButton").onclick = function() {
        hideModal();
        loadTableData();
    };

    document.getElementById("cancelButton").onclick = function() {
        hideModal();

        const rows = document.querySelectorAll('#data-table tr[id^="impact"]');
        const allData = [];

        rows.forEach(function(row, index) {
            const text = row.cells[0].textContent.trim();
            const sliders = row.querySelectorAll('.gauge-container .triangle');
            const sliderData = {};

            sliders.forEach(function(slider) {
                const name = slider.id.split('-')[0];
                const value = parseInt(slider.dataset.value, 10);
                sliderData[name] = value;
            });

            const resultImpact = document.getElementById(`result-impact-${index}`).textContent;
            const resultImpact2 = document.getElementById(`result2-impact-${index}`).textContent;

            allData.push({ text: text, sliders: sliderData, resultImpact: resultImpact, resultImpact2: resultImpact2 });
        });

        saveAndRedirect(allData);
    };

    function loadQuestionFromJSON() {
        const codeParam = getUrlParameter('code');

        fetch('question.json')
            .then(response => response.json())
            .then(data => {
                const question = data.find(item => item.code === codeParam);
                if (question) {
                    document.getElementById('questionText').textContent = question.question;
                    showModal();
                } else {
                    console.error(`Question non trouvée pour le code : ${codeParam}`);
                    loadTableData();
                }
            })
            .catch(error => {
                console.error('Erreur lors du chargement de la question JSON:', error);
            });
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        loadQuestionFromJSON();
    });

    function getAllSliderValues() {
        const rows = document.querySelectorAll('#data-table tr[id^="impact"]');
        const allData = [];

        rows.forEach((row, index) => {
            const text = row.cells[0].textContent.trim();

            // Obtenir les valeurs des sliders
            const sliders = {};
            sliders['negatif-ampleur'] = getSliderValue(`negatif-ampleur-${index}`);
            sliders['negatif-etendu'] = getSliderValue(`negatif-etendu-${index}`);
            sliders['negatif-caractere'] = getSliderValue(`negatif-caractere-${index}`);
            sliders['positif-ampleur'] = getSliderValue(`positif-ampleur-${index}`);
            sliders['positif-etendu'] = getSliderValue(`positif-etendu-${index}`);
            sliders['financiers-patrimoine'] = getSliderValue(`financiers-patrimoine-${index}`);
            sliders['financiers-activite'] = getSliderValue(`financiers-activite-${index}`);
            sliders['financiers-opportunites'] = getSliderValue(`financiers-opportunites-${index}`);

            // Obtenir les résultats d'impact
            const resultImpact = document.getElementById(`result-impact-${index}`).textContent;
            const resultImpact2 = document.getElementById(`result2-impact-${index}`).textContent;

            // Créer un objet contenant toutes les données de la ligne
            const rowData = {
                code: getUrlParameter('code'), // Supposons que vous récupérez le code à partir de l'URL
                text: text,
                sliders: sliders,
                resultImpact: resultImpact,
                resultImpact2: resultImpact2
            };

            allData.push(rowData); // Ajouter cet objet à la liste des données
        });

        return allData; // Retourner le tableau d'objets contenant toutes les données
    }

    // Fonction pour récupérer la valeur d'une jauge spécifique
    function getSliderValue(id) {
        const triangle = document.getElementById(`triangle-${id}`);
        return triangle.dataset.value || ""; // Renvoie la valeur du dataset ou une chaîne vide par défaut
    }



    function saveAndRedirect(data) {
        const codeParam = getUrlParameter('code');
        localStorage.setItem(codeParam, JSON.stringify(data));
        window.location.href = 'Sept1.php';
    }

    // Example usage of getAllSliderValues function
    document.getElementById("saveButton").onclick = function() {
        const allData = getAllSliderValues();
        saveAndRedirect(allData);
        window.location.href = 'Sept1.php';
    };


</script>
<script src="tableur.js"></script>
</body>
</html>
