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

        .basic .entry-title {
            background: #82E0AA;
        }

        .basic .entry-title > h3 {
            background: #58D68D;
        }

        .basic .price {
            background: #58D68D;
        }

        .standard .entry-title {
            background: #4484c1;
        }

        .standard .entry-title > h3 {
            background: #3772aa;
        }

        .standard .price {
            background: #3772aa;
        }

        .ultimite .entry-title > h3 {
            background: #DD4B5E;
        }

        .ultimite .entry-title {
            background: #F75C70;
        }

        .ultimite .price {
            background: #DD4B5E;
        }

        .buttonliste {
            padding: 10px 0;
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
<div id="price">
    <div class="plan">
        <div class="plan-inner">
            <div class="entry-title">
                <h3>Exigences générales</h3>
                <div class="price">ESRS-1</div>
            </div>
            <div class="entry-content">
                <ul>
                    <li><strong>1x</strong> option 1</li>
                    <li><strong>2x</strong> option 2</li>
                    <li><strong>3x</strong> option 3</li>
                    <li><strong>Free</strong> option 4</li>
                </ul>
                <div id="options">
                    <ul></ul>
                    <div class="buttonliste">
                        <button onclick="toggleOptions('options', ['Option supplémentaire 1', 'Option supplémentaire 2', 'Option supplémentaire 3'])">Voir plus</button>
                    </div>
                </div>
            </div>
            <div class="btn">
                <a href="#" id="ESRS-1">Non Concerne</a>
            </div>
        </div>
    </div>
    <div class="plan">
        <div class="plan-inner">
            <div class="entry-title">
                <h3>Informations générales</h3>
                <div class="price">ESRS-2</div>
            </div>
            <div class="entry-content">
                <ul>
                    <li><strong>1x</strong> option 1</li>
                    <li><strong>2x</strong> option 2</li>
                    <li><strong>3x</strong> option 3</li>
                    <li><strong>Free</strong> option 4</li>
                </ul>
                <div id="options2">
                    <ul></ul>
                    <div class="buttonliste">
                        <button onclick="toggleOptions('options2', ['Option supplémentaire 1', 'Option supplémentaire 2', 'Option supplémentaire 3'])">Voir plus</button>
                    </div>
                </div>
            </div>
            <div class="btn">
                <a href="#" id="ESRS-2">Non Concerne</a>
            </div>
        </div>
    </div>
    <div class="plan">
        <div class="plan-inner basic">
            <div class="entry-title">
                <h3>Exigences générales</h3>
                <div class="price">ESRS-E1</div>
            </div>
            <div class="entry-content">
                <ul>
                    <li><strong>Gouvernance</strong> <span class="tooltip" title="Information sur la gouvernance."><i class="fa-solid fa-circle-info"></i></span></li>
                    <li><strong>Plan de transition pour l’atténuation du changement climatique</strong> <span class="tooltip" title="Information sur le plan de transition pour l’atténuation du changement climatique."><i class="fa-solid fa-circle-info"></i></span></li>
                    <li><strong>Politiques liées à l’atténuation du changement climatique et à l'adaptation à celui-ci</strong> <span class="tooltip" title="Information sur les politiques liées à l’atténuation du changement climatique et à l'adaptation à celui-ci."><i class="fa-solid fa-circle-info"></i></span></li>
                    <li><strong>Actions et ressources en rapport avec les politiques en matière de changement climatique</strong> <span class="tooltip" title="Information sur les actions et ressources en rapport avec les politiques en matière de changement climatique."><i class="fa-solid fa-circle-info"></i></span></li>
                </ul>
                <div id="options3">
                    <ul></ul>
                    <div class="buttonliste">
                        <button onclick="toggleOptions('options3', [
                            { label: 'Cibles liées au changement climatique', tooltip: 'Informations sur les cibles liées au changement climatique.' },
                            { label: 'Consommation d’énergie et mix énergétique', tooltip: 'Informations sur la consommation d’énergie et le mix énergétique.' },
                            { label: 'Emissions brutes de gaz à effet de serre', tooltip: 'Informations sur les émissions brutes de gaz à effet de serre.' },
                            { label: 'Absorption des émissions nettes', tooltip: 'Informations sur l’absorption des émissions nettes.' },
                            { label: 'Intensité des émissions', tooltip: 'Informations sur l’intensité des émissions.' }
                        ])">Voir plus</button>
                    </div>
                </div>
            </div>
            <div class="btn">
                <a href="#" id="ESRS-E1">Non Concerne</a>
            </div>
        </div>
    </div>
    <div class="plan">
        <div class="plan-inner standard">
            <div class="entry-title">
                <h3>Informations générales</h3>
                <div class="price">ESRS-S1</div>
            </div>
            <div class="entry-content">
                <ul>
                    <li><strong>1x</strong> option 1</li>
                    <li><strong>2x</strong> option 2</li>
                    <li><strong>3x</strong> option 3</li>
                    <li><strong>Free</strong> option 4</li>
                </ul>
                <div id="options4">
                    <ul></ul>
                    <div class="buttonliste">
                        <button onclick="toggleOptions('options4', ['Option supplémentaire 1', 'Option supplémentaire 2', 'Option supplémentaire 3'])">Voir plus</button>
                    </div>
                </div>
            </div>
            <div class="btn">
                <a href="#" id="ESRS-S1">Non Concerne</a>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleOptions(elementId, options) {
        let optionsContainer = document.getElementById(elementId);
        let optionsList = optionsContainer.querySelector('ul');
        optionsList.innerHTML = '';
        options.forEach(option => {
            let listItem = document.createElement('li');
            listItem.innerHTML = option.label ? `${option.label} <span class="tooltip" title="${option.tooltip}"><i class="fa-solid fa-circle-info"></i></span>` : option;
            optionsList.appendChild(listItem);
        });
        optionsContainer.style.display = 'block';
    }
</script>
</body>
</html>
