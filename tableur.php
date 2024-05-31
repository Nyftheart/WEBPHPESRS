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
        function addRow(impactValue, insertAfterId) {
            var table = document.getElementById("data-table");
            var insertAfterRow = document.getElementById(insertAfterId);
            var rowIndex = insertAfterRow.rowIndex;
            var row = table.insertRow(rowIndex + 1);

            var cellName = row.insertCell(0);
            cellName.innerHTML = impactValue.toUpperCase();

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
            }

            for (var i = 1; i < 5; i++) {
                row.cells[i].querySelector("input").addEventListener("input", updateMaterialityResult);
            }
            row.cells[6].querySelector("input").addEventListener("input", updateGreaterThan20Result);

            updateMaterialityResult();
            updateGreaterThan20Result();
        }

        function addSelectedRow(selectorId, selectId) {
            var impactValue = document.getElementById(selectId).value;
            if (impactValue) addRow(impactValue, selectorId + "-row");
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
    <tr id="impact1-row">
        <td>
            <form>
                <label for="impact1">Adaptation au changement climatique Risques et opportunités liés :</label>
                <select id="impact1">
                    <option value="Température">Température</option>
                    <option value="Vent">Vent</option>
                    <option value="Eau">Eau</option>
                    <option value="Masses solides">Masses solides</option>
                    <option value="Politique et juridique">Politique et juridique</option>
                    <option value="Technologie">Technologie</option>
                    <option value="Marché">Marché</option>
                    <option value="Réputation">Réputation</option>

                </select>
                <br>
                <button type="button" onclick="addSelectedRow('impact1', 'impact1')">Ajouter</button>
            </form>
        </td>
        <td colspan="4"></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr id="impact2-row">
        <td>
            <form>
                <label for="impact2">Sélectionnez un autre impact :</label>
                <select id="impact2">
                    <option value="Scope 1">Scope 1</option>
                    <option value="Scope 2">Scope 2</option>
                    <option value="Scope 3">Scope 3</option>
                </select>
                <br>
                <button type="button" onclick="addSelectedRow('impact2', 'impact2')">Ajouter</button>
            </form>
        </td>
        <td colspan="4"></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr id="impact3-row">
        <td>
            <form>
                <label for="impact3">Sélectionnez un autre impact :</label>
                <select id="impact3">
                    <option value="sources fossiles">sources fossiles</option>
                    <option value="sources nucléaires">sources nucléaires</option>
                    <option value="sources renouvelables">sources renouvelables</option>
                </select>
                <br>
                <button type="button" onclick="addSelectedRow('impact3', 'impact3')">Ajouter</button>
            </form>
        </td>
        <td colspan="4"></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

</table>
<form action="Sept1.php" method="post">
    <!-- Vous pouvez ajouter d'autres champs dans le formulaire si nécessaire -->
    <input type="submit" value="Valider">
</form>
</body>
</html>
