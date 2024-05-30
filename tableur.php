<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Justification de la Matérialité</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        width: 100%;
        padding: 20px;
    }

    .header {
        display: flex;
        justify-content: space-around;
        background-color: #f0f0f0;
        padding: 10px;
        border: 1px solid #ccc;
    }

    .section {
        text-align: center;
    }

    .title {
        font-weight: bold;
        background-color: #f4a460;
        padding: 5px;
    }

    .content {
        background-color: #d8bfd8;
        padding: 5px;
    }

    .gauges {
        display: flex;
        justify-content: space-around;
        margin: 20px 0;
        flex-wrap: wrap;
    }

    .gauge {
        width: 100px;
        height: 100px;
        position: relative;
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

    /* Gauge styles */
    .gauge .fill, .gauge .cover {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        position: absolute;
        top: 0;
        left: 0;
    }

    .gauge .fill {
        clip: rect(0, 50px, 100px, 0);
        background-color: #3498db;
    }

    .gauge .cover {
        clip: rect(0, 100px, 100px, 50px);
        background-color: #eee;
    }

    .gauge .inside {
        width: 80px;
        height: 80px;
        background-color: white;
        border-radius: 50%;
        position: absolute;
        top: 10px;
        left: 10px;
        text-align: center;
        line-height: 80px;
        font-weight: bold;
    }

</style>
<body>
<div class="container">
    <div class="header">
        <div class="section">
            <div class="title">IMPACT NÉGATIF</div>
            <div class="content">
                <div>AMPLEUR</div>
                <div>ÉTENDUE</div>
                <div>CARACTÈRE IRRÉMÉDIABLE</div>
            </div>
        </div>
        <div class="section">
            <div class="title">JUSTIFICATION DE LA MATÉRIALITÉ</div>
            <div class="content">
                <div>IMPACT POSITIF</div>
                <div>Résultat de matérialité</div>
                <div>50% ou plus => oui</div>
            </div>
        </div>
        <div class="section">
            <div class="title">RISQUES ET OPPORTUNITÉS FINANCIÈRES</div>
            <div class="content">
                <div>Résultat si >20% => oui</div>
            </div>
        </div>
    </div>
    <div class="gauges">
        <!-- Gauges -->
        <div class="gauge" data-value="20"></div>
        <div class="gauge" data-value="30"></div>
        <div class="gauge" data-value="10"></div>
        <div class="gauge" data-value="0"></div>
        <div class="gauge" data-value="50"></div>
        <div class="gauge" data-value="70"></div>
        <div class="gauge" data-value="0"></div>
        <div class="gauge" data-value="0"></div>
        <div class="gauge" data-value="40"></div>
        <div class="gauge" data-value="0"></div>
    </div>
    <div class="results">
        <div class="result result-yellow"></div>
        <div class="result result-green"></div>
        <div class="result result-yellow"></div>
        <div class="result result-green"></div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var gauges = document.querySelectorAll('.gauge');

        gauges.forEach(function(gauge) {
            var value = gauge.getAttribute('data-value');
            var angle = value * 1.8; // Convert percentage to degrees
            var fill = document.createElement('div');
            fill.className = 'fill';
            fill.style.transform = 'rotate(' + angle + 'deg)';

            var cover = document.createElement('div');
            cover.className = 'cover';

            var inside = document.createElement('div');
            inside.className = 'inside';
            inside.textContent = value + '%';

            gauge.appendChild(fill);
            gauge.appendChild(cover);
            gauge.appendChild(inside);
        });
    });

</script>
</body>
</html>
