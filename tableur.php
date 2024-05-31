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
    </style>
    <script>
        function addRow() {
            var temperatureValue = document.getElementById("temperature").value;
            var table = document.getElementById("data-table");
            var row = table.insertRow(-1);

            var cellName = row.insertCell(0);
            cellName.innerHTML = temperatureValue.toUpperCase();

            for (var i = 1; i < 8; i++) {
                var cell = row.insertCell(i);
                cell.innerHTML = '<input type="range" min="0" max="100" value="50" step="25" class="slider">';
            }

            row.cells[5].innerHTML = '❌';
            row.cells[7].innerHTML = '❌';

            function updateMaterialityResult() {
                var cells = [1, 2, 3, 4].map(index => parseInt(row.cells[index].querySelector("input").value));
                var materialityCell = row.cells[5];
                if (cells.every(value => value <= 50)) {
                    materialityCell.innerHTML = '❌';
                } else {
                    materialityCell.innerHTML = '✅';
                    updateFirstRowResults();
                }

            }

            function updateGreaterThan20Result() {
                var value = parseInt(row.cells[6].querySelector("input").value);
                var resultCell = row.cells[7];
                if (value > 50) {
                    resultCell.innerHTML = '✅';
                } else {
                    resultCell.innerHTML = '❌';
                }
                updateFirstRowResults();
            }

            for (var i = 1; i < 5; i++) {
                row.cells[i].querySelector("input").addEventListener("input", updateMaterialityResult);
            }
            row.cells[6].querySelector("input").addEventListener("input", updateGreaterThan20Result);

            // Trigger the update functions initially to set the correct initial states
            updateMaterialityResult();
            updateGreaterThan20Result();
        }

        function updateFirstRowResults() {
            var table = document.getElementById("data-table");
            var materialityResult = false;
            var financialResult = false;

            // Parcours de toutes les lignes sauf les deux premières (titres)
            for (var i = 2; i < table.rows.length; i++) {
                // Vérifie si une cellule de résultat de matérialité est à '✅'
                if (table.rows[i].cells[5].innerHTML === '✅') {
                    materialityResult = true;
                    break; // Sortie de la boucle dès qu'une cellule est trouvée à '✅'
                }
            }

            // Parcours de toutes les lignes sauf les deux premières (titres)
            for (var i = 2; i < table.rows.length; i++) {
                // Vérifie si une cellule de résultat financier est à '✅'
                if (table.rows[i].cells[7].innerHTML === '✅') {
                    financialResult = true;
                    break; // Sortie de la boucle dès qu'une cellule est trouvée à '✅'
                }
            }

            // Met à jour les cellules de la première ligne en fonction des résultats obtenus
            var firstRowMaterialityCell = table.rows[1].cells[5];
            var firstRowFinancialCell = table.rows[1].cells[7];
            firstRowMaterialityCell.innerHTML = materialityResult ? '✅' : '❌';
            firstRowFinancialCell.innerHTML = financialResult ? '✅' : '❌';
        }


        function updateImpact() {
            var selectValue = document.getElementById("temperature").value;
            var impactCell = document.querySelector(".subheader");
            impactCell.innerHTML = selectValue.toUpperCase();
        }
    </script>
</head>
<body>

<table id="data-table">
    <tr>
        <th colspan="9" class="header">JUSTIFICATION DE LA MATÉRIALITÉ</th>
    </tr>
    <tr>
        <th rowspan="2" class="subheader">IMPACT</th>
        <th colspan="2" class="subheader">IMPACT NÉGATIF</th>
        <th colspan="2" class="subheader">IMPACT POSITIF</th>
        <th rowspan="2" class="result">Résultat de matérialité<br>50% ou plus => oui</th>
        <th rowspan="2" class="risk-opportunity">RISQUES ET OPPORTUNITÉS FINANCIÈRES</th>
        <th rowspan="2" class="financial-result">RÉSULTAT si >20% => oui</th>
    </tr>
    <tr>
        <td>AMPLEUR</td>
        <td>ÉTENDUE</td>
        <td>CARACTÈRE IRRÉMÉDIABLE</td>
        <td>AMPLEUR</td>
    </tr>
    <tr>
        <td>
            <form>
                <label for="temperature">Sélectionnez un impact :</label>
                <select id="temperature" onchange="updateImpact()">
                    <option value="Température">Température</option>
                    <option value="EAU">EAU</option>
                    <option value="AIR">AIR</option>
                </select>
                <br>
                <button type="button" onclick="addRow()">Ajouter</button>
            </form>
        </td>
        <td colspan="4"></td>
        <td>❌</td>
        <td></td>
        <td>❌</td>
    </tr>
</table>

</body>
</html>
