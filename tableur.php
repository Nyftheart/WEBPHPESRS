<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Justification de la Matérialité</title>
</head>
<body>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        box-sizing: border-box;
    }

    .container {
        width: 100%;
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    th, td {
        border: 1px solid #ccc;
        text-align: center;
        padding: 10px;
    }

    th {
        background-color: #f0f0f0;
    }

    thead th {
        background-color: #d8bfd8;
    }

    .gauge {
        width: 100%;
        height: 20px;
        background-color: #eee;
        position: relative;
        border-radius: 10px;
        overflow: hidden;
    }

    .gauge::after {
        content: '';
        display: block;
        height: 100%;
        background-color: #3498db;
        width: 0;
        border-radius: 10px;
        transition: width 0.5s;
    }

    .gauge[data-value="20"]::after { width: 20%; }
    .gauge[data-value="30"]::after { width: 30%; }
    .gauge[data-value="10"]::after { width: 10%; }
    .gauge[data-value="0"]::after { width: 0%; }
    .gauge[data-value="50"]::after { width: 50%; }
    .gauge[data-value="70"]::after { width: 70%; }
    .gauge[data-value="40"]::after { width: 40%; }

    .results {
        display: flex;
        justify-content: space-around;
    }

    .result {
        width: 100px;
        height: 50px;
        margin: 10px;
    }

    .result-yellow {
        background-color: yellow;
    }

    .result-green {
        background-color: green;
    }

</style>
<div class="container">
    <table>
        <thead>
        <tr>
            <th colspan="3">IMPACT NÉGATIF</th>
            <th colspan="2" rowspan="2">JUSTIFICATION DE LA MATÉRIALITÉ</th>
            <th rowspan="2">RISQUES ET OPPORTUNITÉS FINANCIÈRES</th>
        </tr>
        <tr>
            <th>AMPLEUR</th>
            <th>ÉTENDUE</th>
            <th>CARACTÈRE IRRÉMÉDIABLE</th>
            <th>AMPLEUR</th>
            <th>ÉTENDUE</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><div class="gauge" data-value="20"></div></td>
            <td><div class="gauge" data-value="30"></div></td>
            <td><div class="gauge" data-value="10"></div></td>
            <td><div class="gauge" data-value="0"></div></td>
            <td><div class="gauge" data-value="50"></div></td>
            <td><div class="gauge" data-value="70"></div></td>
        </tr>
        <tr>
            <td><div class="gauge" data-value="0"></div></td>
            <td><div class="gauge" data-value="0"></div></td>
            <td><div class="gauge" data-value="40"></div></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td style="background-color: yellow;"></td>
            <td style="background-color: green;"></td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const gaugeConfigs = [
            { id: 'gauge1', value: 20 },
            { id: 'gauge2', value: 30 },
            { id: 'gauge3', value: 10 },
            { id: 'gauge4', value: 0 },
            { id: 'gauge5', value: 50 },
            { id: 'gauge6', value: 70 },
            { id: 'gauge7', value: 0 },
            { id: 'gauge8', value: 40 },
            { id: 'gauge9', value: 0 }
        ];

        gaugeConfigs.forEach(config => {
            const ctx = document.getElementById(config.id).getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [config.value, 100 - config.value],
                        backgroundColor: ['#3498db', '#eee'],
                        borderWidth: 0
                    }]
                },
                options: {
                    rotation: 1 * Math.PI,
                    circumference: 1 * Math.PI,
                    cutoutPercentage: 70,
                    tooltips: { enabled: false },
                    hover: { mode: null },
                    plugins: {
                        doughnutlabel: {
                            labels: [{
                                text: `${config.value}%`,
                                font: {
                                    size: 20,
                                    weight: 'bold'
                                },
                                color: '#000'
                            }]
                        }
                    }
                }
            });
        });
    });

</script>
</body>
</html>
