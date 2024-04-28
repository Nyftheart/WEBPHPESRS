<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Tiles</title>
    <script src="https://kit.fontawesome.com/0beb06bd15.js" crossorigin="anonymous"></script>
    <style>
        /* */

        @import url(https://fonts.googleapis.com/css?family=Lato:400,700);

        body {
            background: #F2F2F2;
            padding: 0;
            maring: 0;
        }

        #price {
            text-align: center;
            justify-content: space-around;
            display: flex;
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
        .hot {
            position: absolute;
            top: -7px;
            background: #F80;
            color: #fff;
            text-transform: uppercase;
            z-index: 2;
            padding: 2px 5px;
            font-size: 9px;
            border-radius: 2px;
            right: 10px;
            font-weight: 700;
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
        .buttonliste{
            padding: 10px 0;
        }
        .suivantbutton {

        }

        .toggle-button {
            position: relative; /* Assurez-vous que le positionnement est relatif pour permettre la positionnement absolu du pseudo-élément */
        }

        .toggle-button::after {
            content: attr(data-tooltip); /* Affiche le contenu de l'attribut data-tooltip */
            position: absolute;
            top: 100%; /* Place l'info-bulle en dessous du bouton */
            left: 50%; /* Centre l'info-bulle horizontalement par rapport au bouton */
            transform: translateX(-50%); /* Centre l'info-bulle horizontalement par rapport à son propre contenu */
            background-color: #333;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            opacity: 0; /* Masque l'info-bulle par défaut */
            transition: opacity 0.3s; /* Ajoute une transition d'opacité pour une apparition en douceur */
        }

        .toggle-button:hover::after {
            opacity: 1; /* Affiche l'info-bulle lorsqu'on passe la souris dessus */
        }

    </style>
</head>
<body>
<div id="page1" class="page">
    <div id="price">
        <!--price tab-->
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
                        <ul >

                        </ul>
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
                        <ul >

                        </ul>
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
        <div style="margin-top:7%" class="plan">
            <button onclick="showPage(2)" class="suivantbutton">
                <p>suivant <i class="fas fa-chevron-right"></i></p> <!-- Icône de flèche -->
            </button>
        </div>

    </div>
</div>

<div id="page2" class="page" style="display: none;">
    <div id="price">
        <!--price tab-->
        <div class="plan">
            <div class="plan-inner basic">
                <div class="entry-title">
                    <h3>Exigences générales</h3>
                    <div class="price">ESRS-E1</div>
                </div>
                <div class="entry-content">
                    <ul id="">
                        <li><strong>Gouvernance </strong><span class="tooltip" title="Information sur la gouvernance."><i class="fa-solid fa-circle-info"></i></span></li>
                        <li><strong>Plan de transition pour l’atténuation du changement climatique </strong><span class="tooltip" title="Information sur le plan de transition pour l’atténuation du changement climatique."><i class="fa-solid fa-circle-info"></i></span></li>
                        <li><strong>Politiques liées à l’atténuation du changement climatique et à l'adaptation à celui-ci </strong><span class="tooltip" title="Information sur les politiques liées à l’atténuation du changement climatique et à l'adaptation à celui-ci."><i class="fa-solid fa-circle-info"></i></span></li>
                        <li><strong>Actions et ressources en rapport avec les politiques en matière de changement climatique </strong><span class="tooltip" title="Information sur les actions et ressources en rapport avec les politiques en matière de changement climatique."><i class="fa-solid fa-circle-info"></i></span></li>
                    </ul>
                    <div id="options3">
                        <ul >

                        </ul>
                        <div class="buttonliste">
                            <button onclick="toggleOptions('options3', [
                                { label: 'Cibles liées au changement climatique', tooltip: 'Informations sur les cibles liées au changement climatique.' },
                                { label: 'Consommation d’énergie et mix énergétique', tooltip: 'Informations sur la consommation d’énergie et le mix énergétique.' },
                                { label: 'Emissions brutes de GES', tooltip: 'Informations sur les émissions brutes de GES.' },
                                { label: 'Projets d\'absorption et d’atténuation des GES financés au moyen de crédits carbone', tooltip: 'Informations sur les projets d\'absorption et d’atténuation des GES financés au moyen de crédits carbone.' },
                                { label: 'Tarification interne du carbone', tooltip: 'Informations sur la tarification interne du carbone.' },
                                { label: 'Incidences financières escomptées des risques physiques et de transition importants et opportunités potentielles liées au changement climatique', tooltip: 'Informations sur les incidences financières escomptées des risques physiques et de transition importants et opportunités potentielles liées au changement climatique.' }
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
            <div class="plan-inner basic">
                <div class="entry-title">
                    <h3>Informations générales</h3>
                    <div class="price">ESRS-E2</div>
                </div>
                <div class="entry-content">
                    <ul>
                        <li><strong>1x</strong> option 1</li>
                        <li><strong>2x</strong> option 2</li>
                        <li><strong>3x</strong> option 3</li>
                        <li><strong>Free</strong> option 4</li>

                    </ul>
                    <div id="options4">
                        <ul >

                        </ul>
                        <div class="buttonliste">
                            <button onclick="toggleOptions('options4')">Voir plus</button>
                        </div>
                    </div>


                </div>
                <div class="btn">
                    <a href="#" id="ESRS-E2">Non Concerne</a>
                </div>
            </div>

        </div>
        <div class="plan">
            <div class="plan-inner basic">
                <div class="entry-title">
                    <h3>Informations générales</h3>
                    <div class="price">ESRS-E3</div>
                </div>
                <div class="entry-content">
                    <ul>
                        <li><strong>1x</strong> option 1</li>
                        <li><strong>2x</strong> option 2</li>
                        <li><strong>3x</strong> option 3</li>
                        <li><strong>Free</strong> option 4</li>

                    </ul>
                    <div id="options5">
                        <ul >

                        </ul>
                        <div class="buttonliste">
                            <button onclick="toggleOptions('options5')">Voir plus</button>
                        </div>
                    </div>


                </div>
                <div class="btn">
                    <a href="#" id="ESRS-E3">Non Concerne</a>
                </div>
            </div>

        </div>
        <div class="plan">
            <div class="plan-inner basic">
                <div class="entry-title">
                    <h3>Informations générales</h3>
                    <div class="price">ESRS-E4</div>
                </div>
                <div class="entry-content">
                    <ul>
                        <li><strong>1x</strong> option 1</li>
                        <li><strong>2x</strong> option 2</li>
                        <li><strong>3x</strong> option 3</li>
                        <li><strong>Free</strong> option 4</li>

                    </ul>
                    <div id="options6">
                        <ul >

                        </ul>
                        <div class="buttonliste">
                            <button onclick="toggleOptions('options6')">Voir plus</button>
                        </div>
                    </div>


                </div>
                <div class="btn">
                    <a href="#" id="ESRS-E4">Non Concerne</a>
                </div>
            </div>

        </div>
        <div class="plan">
            <div class="plan-inner basic">
                <div class="entry-title">
                    <h3>Informations générales</h3>
                    <div class="price">ESRS-E5</div>
                </div>
                <div class="entry-content">
                    <ul>
                        <li><strong>1x</strong> option 1</li>
                        <li><strong>2x</strong> option 2</li>
                        <li><strong>3x</strong> option 3</li>
                        <li><strong>Free</strong> option 4</li>

                    </ul>
                    <div id="options7">
                        <ul >

                        </ul>
                        <div class="buttonliste">
                            <button onclick="toggleOptions('options7')">Voir plus</button>
                        </div>
                    </div>


                </div>
                <div class="btn">
                    <a href="#" id="ESRS-E5">Non Concerne</a>
                </div>
            </div>

        </div>
        <div style="margin-top:7%" class="plan">
            <button onclick="showPage(1)" class="suivantbutton">
                <p>Previous <i class="fas fa-chevron-right"></i></p> <!-- Icône de flèche -->
            </button>
        </div>

    </div>
</div>

<script>
    function showPage(pageNumber) {
        // Cacher toutes les pages
        var pages = document.querySelectorAll('.page');
        pages.forEach(function (page) {
            page.style.display = 'none';
        });

        // Afficher la page spécifiée
        var pageToShow = document.getElementById('page' + pageNumber);
        if (pageToShow) {
            pageToShow.style.display = 'block';
        }
    }
    function toggleOptions(sectionId, options) {
        var optionsContainer = document.getElementById(sectionId).querySelector('ul');
        var button = document.querySelector('#' + sectionId + ' button');

        if (optionsContainer.classList.contains('expanded')) {
            // Réduire les options supplémentaires
            optionsContainer.classList.remove('expanded');
            button.textContent = 'Voir plus';
            // Supprimer les options supplémentaires
            optionsContainer.innerHTML = ''; // Vide le contenu de la liste ul
        } else {
            // Ajouter les options supplémentaires
            options.forEach(function(option) {
                var listItem = document.createElement('li');
                listItem.innerHTML = '' + option.label + ' ';
                var tooltip = option.tooltip.trim(); // Supprime les espaces vides avant et après le texte
                if (tooltip !== '') { // Vérifie si le tooltip n'est pas vide
                    var tooltipSpan = document.createElement('span');
                    tooltipSpan.className = 'tooltip';
                    tooltipSpan.title = tooltip;
                    var infoIcon = document.createElement('i');
                    infoIcon.className = 'fa-solid fa-circle-info';
                    tooltipSpan.appendChild(infoIcon);
                    listItem.appendChild(tooltipSpan);
                }
                optionsContainer.appendChild(listItem);
            });
            // Afficher les options supplémentaires
            optionsContainer.classList.add('expanded');
            button.textContent = 'Réduire';
        }
    }





    function toggleButton(buttonId) {
        var button = document.getElementById(buttonId);
        var isConcerne = button.getAttribute('data-is-concerne') === 'true';

        if (isConcerne) {
            button.style.backgroundColor = 'red';
            button.textContent = 'Non Concerne';
        } else {
            button.style.backgroundColor = 'green';
            button.textContent = 'Concerne';
        }

        button.setAttribute('data-is-concerne', (!isConcerne).toString());
    }

    document.getElementById('ESRS-1').addEventListener('click', function() {
        toggleButton('ESRS-1');
    });

    document.getElementById('ESRS-2').addEventListener('click', function() {
        toggleButton('ESRS-2');
    });

    document.getElementById('ESRS-E1').addEventListener('click', function() {
        toggleButton('ESRS-E1');
    });

    document.getElementById('ESRS-E2').addEventListener('click', function() {
        toggleButton('ESRS-E2');
    });
    document.getElementById('ESRS-E3').addEventListener('click', function() {
        toggleButton('ESRS-E3');
    });

    document.getElementById('ESRS-E4').addEventListener('click', function() {
        toggleButton('ESRS-E4');
    });

    document.getElementById('ESRS-E5').addEventListener('click', function() {
        toggleButton('ESRS-E5');
    });




</script>
</body>
</html>