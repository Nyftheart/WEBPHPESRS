<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau Justification de la Matérialité</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            background-color: #ffcc99;
        }
        .subheader {
            background-color: #ff9999;
        }
        .result, .risk-opportunity, .financial-result {
            background-color: #cc99ff;
        }
        .slider {
            width: 100%;
        }
        .subheader2 {
            background-color: #cc99ff;
        }
        .dynamic-row {
            background-color: lightgreen;
        }
        /* Style de la popup */
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

        /* Contenu de la popup */
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

        /* Bouton pour fermer la popup */
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

    </style>
</head>
<body>

<table id="data-table">
    <tr>
        <th></th>
        <th colspan="10" class="header">JUSTIFICATION DE LA MATÉRIALITÉ</th>
    </tr>
    <tr>
        <th rowspan="2"></th>
        <th colspan="3" class="subheader">MATERIALITE D'IMPACT NÉGATIF</th>
        <th colspan="2" class="subheader">MATERIALITE D'IMPACT POSITIF</th>
        <th rowspan="2" class="result">Résultat de la matérialité d'impact</th>
        <th colspan="2" class="subheader2">Effets financiers attendus des risques</th>
        <th rowspan="2" class="risk-opportunity">Effets financiers attendus des opportunités</th>
        <th rowspan="2" class="financial-result">Résultat de la matérialité financière</th>
    </tr>
    <tr>
        <td>AMPLEUR <sup><img src="images/img.png" style="height: 20px"></sup></td>
        <td>ÉTENDUE</td>
        <td>CARACTÈRE IRRÉMÉDIABLE</td>
        <td>AMPLEUR</td>
        <td>ÉTENDUE</td>
        <td>PATRIMOINE</td>
        <td>ACTIVITE</td>
    </tr>
    <tbody id="table-body">
    <!-- Les lignes de données seront générées ici -->
    </tbody>
</table>

<button onclick="getAllSliderValues()">Récupérer toutes les valeurs</button>


<div id="myModal" class="modal">
    <div class="modal-content">
        <p id="questionText">Chargement de la question...</p>
        <button id="confirmButton">Oui</button>
        <button id="cancelButton">Non</button>
    </div>
</div>

<script>
    // Fonction pour extraire les paramètres de l'URL
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    // Fonction pour créer et insérer des lignes de tableau
    function createTableRow(data, index) {
        const row = document.createElement('tr');
        row.id = `impact${index + 1}-row`;

        const resultImpact = (data['negatif-ampleur'] > 50 || data['negatif-etendu'] > 50 || data['positif-caractere'] > 50 || data['positif-ampleur'] > 50) ? '✅' : '❌';

        const columns = `
            <td>${data.text}</td>
            <td><input type="range" min="0" max="100" value="${data['negatif-ampleur']}" step="25" class="slider" id="negatif-ampleur-${index}" name="negatif-ampleur" onchange="updateImpactResult(${index})"></td>
            <td><input type="range" min="0" max="100" value="${data['negatif-etendu']}" step="25" class="slider" id="negatif-etendu-${index}" name="negatif-etendu" onchange="updateImpactResult(${index})"></td>
            <td><input type="range" min="0" max="100" value="${data['negatif-caractere']}" step="25" class="slider" id="negatif-caractere-${index}" name="negatif-caractere" onchange="updateImpactResult(${index})"></td>
            <td><input type="range" min="0" max="100" value="${data['positif-ampleur']}" step="25" class="slider" id="positif-ampleur-${index}" name="positif-ampleur" onchange="updateImpactResult(${index})"></td>
            <td><input type="range" min="0" max="100" value="${data['positif-etendu']}" step="25" class="slider" id="positif-etendu-${index}" name="positif-etendu" onchange="updateImpactResult(${index})"></td>
            <td id="result-impact-${index}">${resultImpact}</td>
            <td><input type="range" min="0" max="100" value="${data['financiers-patrimoine']}" step="25" class="slider" id="financiers-patrimoine-${index}" name="financiers-patrimoine" onchange="updateImpactResult2(${index})"></td>
            <td><input type="range" min="0" max="100" value="${data['financiers-activite']}" step="25" class="slider" id="financiers-activite-${index}" name="financiers-activite" onchange="updateImpactResult2(${index})"></td>
            <td><input type="range" min="0" max="100" value="${data['financiers-opportunites']}" step="25" class="slider" id="financiers-opportunites-${index}" name="financiers-opportunites" onchange="updateImpactResult2(${index})"></td>
            <td id="result2-impact-${index}">${resultImpact}</td>
        `;

        row.innerHTML = columns;
        return row;
    }

    // Fonction pour charger les données JSON et générer le tableau
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
            })
            .catch(error => console.error('Erreur lors du chargement des données JSON:', error));
    }

    // Fonction pour mettre à jour dynamiquement le résultat de la matérialité d'impact
    function updateImpactResult(index) {
        const negatifAmpleur = document.getElementById(`negatif-ampleur-${index}`).value;
        const negatifEtendu = document.getElementById(`negatif-etendu-${index}`).value;
        const positifCaractere = document.getElementById(`negatif-caractere-${index}`).value;
        const positifAmpleur = document.getElementById(`positif-ampleur-${index}`).value;
        const positifEtendu = document.getElementById(`positif-etendu-${index}`).value;

        const resultImpact = (negatifAmpleur > 50 || negatifEtendu > 50 || positifCaractere > 50 || positifAmpleur > 50 || positifEtendu > 50) ? '✅' : '❌';
        document.getElementById(`result-impact-${index}`).textContent = resultImpact;
    }
    function updateImpactResult2(index) {
        const financierspatrimoine = document.getElementById(`financiers-patrimoine-${index}`).value;
        const financiersactivite = document.getElementById(`financiers-activite-${index}`).value;
        const financiersopportunite = document.getElementById(`financiers-opportunites-${index}`).value;

        const resultImpact2 = (financierspatrimoine > 50 || financiersactivite > 50 || financiersopportunite > 50) ? '✅' : '❌';
        document.getElementById(`result2-impact-${index}`).textContent = resultImpact2;
    }

    // Fonction pour enregistrer les données dans le local storage
    function saveToLocalStorage(key, data) {
        localStorage.setItem(key, JSON.stringify(data));
    }

    // Fonction pour récupérer les valeurs des sliders
    function getAllSliderValues() {
        const rows = document.querySelectorAll('#data-table tr[id^="impact"]');
        const allData = [];
        const codeParam = getUrlParameter('code');

        rows.forEach(function(row, index) {
            const text = row.cells[0].textContent.trim();
            const sliders = row.querySelectorAll('.slider');
            const sliderData = {};

            sliders.forEach(function(slider) {
                const name = slider.name;
                const value = slider.value;
                sliderData[name] = value;
            });

            const resultImpact = document.getElementById(`result-impact-${index}`).textContent;
            const resultImpact2 = document.getElementById(`result2-impact-${index}`).textContent;

            allData.push({ code: codeParam, text: text, sliders: sliderData, resultImpact: resultImpact, resultImpact2: resultImpact2 });
        });

        console.log("Données de tous les sliders et code :", allData);

        // Enregistrer les données dans le local storage
        saveToLocalStorage(codeParam, allData);
        window.location.href = 'Sept1.php';
    }
    // Fonction pour afficher la popup
    function showModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "block";
    }

    // Fonction pour masquer la popup
    function hideModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    // Gestionnaire d'événement pour le bouton de confirmation
    document.getElementById("confirmButton").onclick = function() {
        hideModal(); // Cacher la popup
        loadTableData(); // Charger les données et générer le tableau
    };

    // Gestionnaire d'événement pour le bouton d'annulation
    function saveAndRedirect(data) {
        const codeParam = getUrlParameter('code');
        localStorage.setItem(codeParam, JSON.stringify(data));
        window.location.href = 'Sept1.php'; // Redirection vers une autre page
    }

    // Gestionnaire d'événement pour le bouton d'annulation
    document.getElementById("cancelButton").onclick = function() {
        hideModal(); // Cacher la popup

        const rows = document.querySelectorAll('#data-table tr[id^="impact"]');
        const allData = [];

        rows.forEach(function(row, index) {
            const text = row.cells[0].textContent.trim();
            const sliders = row.querySelectorAll('.slider');
            const sliderData = {};

            sliders.forEach(function(slider) {
                const name = slider.name;
                const value = slider.value;
                sliderData[name] = value;
            });

            const resultImpact = document.getElementById(`result-impact-${index}`).textContent;
            const resultImpact2 = document.getElementById(`result2-impact-${index}`).textContent;

            allData.push({ text: text, sliders: sliderData, resultImpact: resultImpact, resultImpact2: resultImpact2 });
        });

        saveAndRedirect(allData); // Appel de la fonction pour sauvegarder les données
    };
    // Fonction pour charger la question à partir du fichier JSON en utilisant le code de l'URL
    function loadQuestionFromJSON() {
        const codeParam = getUrlParameter('code');

        fetch('question.json')
            .then(response => response.json())
            .then(data => {
                const question = data.find(item => item.code === codeParam);
                if (question) {
                    document.getElementById('questionText').textContent = question.question;
                    showModal(); // Afficher la popup seulement si la question est trouvée
                } else {
                    console.error(`Question non trouvée pour le code : ${codeParam}`);
                    loadTableData();
                }
            })
            .catch(error => {
                console.error('Erreur lors du chargement de la question JSON:', error);
                // Afficher un message d'erreur dans la console ou gérer l'erreur selon vos besoins
            });
    }


    // Afficher la popup dès le chargement de la page
    loadQuestionFromJSON();
</script>

</body>
</html>
