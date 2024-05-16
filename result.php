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
        }

        #price {
            text-align: center;
            justify-content: space-around;
            display: flex;
            flex-wrap: wrap;
        }

        .plan {
            display: inline-block;
            margin: 10px 1%;
            font-family: 'Lato', Arial, sans-serif;
        }

        .plan-inner {
            background: #fff;
            margin: 0 auto;
            min-width: 280px;
            max-width: 280px;
            position:relative;
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
            background: red;
            padding: 10px 30px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 700;
            text-decoration: none
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
    </style>
</head>
<body>
<div id="price"></div>

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
    }

    // Générer une tuile
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
        entryContentDiv.innerHTML = '<p>' + content + '</p>';
        entryContentDiv.innerHTML = '<ul>' +
            '<li><strong>1x</strong> option 1</li>' +
            '<li><strong>2x</strong> option 2</li>' +
            '<li><strong>3x</strong> option 3</li>' +
            '<li><strong>Free</strong> option 4</li>' +
            '</ul>';

        var buttonDiv = document.createElement('div');
        buttonDiv.className = 'btn';
        var buttonLink = document.createElement('a');
        buttonLink.href = '#';
        buttonLink.id = id;
        buttonLink.textContent = 'Non Completé';
        buttonDiv.appendChild(buttonLink);

        planInnerDiv.appendChild(entryTitleDiv);
        entryTitleDiv.appendChild(priceDiv);
        planInnerDiv.appendChild(entryContentDiv);
        planInnerDiv.appendChild(buttonDiv);
        planDiv.appendChild(planInnerDiv);

        document.getElementById('price').appendChild(planDiv);
    }


    // Générer les tuiles à partir du localStorage lors du chargement de la page
    document.addEventListener('DOMContentLoaded', function() {
        generateTilesFromLocalStorage();
    });
</script>
</body>
</html>
