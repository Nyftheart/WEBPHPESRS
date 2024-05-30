<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Justification de la Matérialité</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
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
        width: 100px;
        height: 100px;
    }

</style>
<body>
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
            <td><canvas id="gauge1" class="gauge"></canvas></td>
            <td><canvas id="gauge2" class="gauge"></canvas></td>
            <td><canvas id="gauge3" class="gauge"></canvas></td>
            <td><canvas id="gauge4" class="gauge"></canvas></td>
            <td><canvas id="gauge5" class="gauge"></canvas></td>
            <td><canvas id="gauge6" class="gauge"></canvas></td>
        </tr>
        <tr>
            <td><canvas id="gauge7" class="gauge"></canvas></td>
            <td><canvas id="gauge8" class="gauge"></canvas></td>
            <td><canvas id="gauge9" class="gauge"></canvas></td>
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
