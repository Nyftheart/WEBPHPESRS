<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accordion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 80%;
            margin: 0 auto; /* Pour centrer le contenu */
            padding: 20px;
            border-radius: 5px;
        }

        .accordion {
            border: 0;
        }

        .card {
            margin-bottom: 30px;
            border: 0;
        }

        .card-header {
            border: 0;
            box-shadow: 0 0 20px 0 rgba(213, 213, 213, 0.5);
            border-radius: 2px;
            padding: 0;
        }

        .btn-header-link {
            color: #fff;
            display: block;
            text-align: left;
            padding: 20px;
            cursor: pointer;
            position: relative;
            transition: background-color 0.3s;
        }

        .btn-header-link:after {
            content: "\f107";
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            float: right;
        }

        .btn-header-link.collapsed:after {
            content: "\f106";
        }

        .card-body {
            display: none;
            line-height: 30px;
            padding: 20px;
            border-radius: 0 0 5px 5px;
            color: white;
            font-weight: 600;
            font-size: 18px; /* Réduit la taille de la police pour mieux s'adapter au contenu */
        }

        .card-body.show {
            display: block;
        }

        /* Couleurs spécifiques */
        .gray .btn-header-link {
            background: #999;
        }

        .green .btn-header-link {
            background: #5cb85c;
        }

        .orange .btn-header-link {
            background: #f0ad4e;
        }

        .blue .btn-header-link {
            background: #5bc0de;
        }

        .gray .card-body {
            background: #a7a7a7;
        }

        .green .card-body {
            background: #71d560;
        }

        .orange .card-body {
            background: #fbc068;
        }

        .blue .card-body {
            background: #78d2e1;
        }

        .concern-button {
            margin-top: 10px;
            background-color: #fff;
            color: #333;
            border: 1px solid #333;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .concern-button:hover {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="accordion" id="faq">
        <!-- Les sections d'accordéon seront générées ici -->
    </div>
</div>
<script>
    // ESRS Data
    // ESRS Data
    let esrsData;

    // Fonction pour inverser l'état concerné d'un ESRS
    function toggleConcern(button, esrs) {
        esrs.concerned = !esrs.concerned; // Inverse l'état de la propriété concerned
        updateConcernButton(button, esrs); // Met à jour le texte du bouton
    }

    // Fonction pour générer les sections d'accordéon
    function generateAccordion() {
        const accordion = document.getElementById('faq');

        esrsData.forEach(esrs => {
            const card = document.createElement('div');
            card.classList.add('card', esrs.color);

            const header = document.createElement('div');
            header.classList.add('card-header');

            const link = document.createElement('div');
            link.classList.add('btn-header-link', 'collapsed');
            link.dataset.toggle = 'collapse';
            link.dataset.target = `#faq${esrs.code}`;
            link.setAttribute('aria-expanded', 'false');
            link.setAttribute('aria-controls', `faq${esrs.code}`);
            link.textContent = `ESRS ${esrs.code} : ${esrs.name}`;

            const body = document.createElement('div');
            body.id = `faq${esrs.code}`;
            body.classList.add('collapse');
            body.setAttribute('aria-labelledby', `faqhead${esrs.code}`);
            body.dataset.parent = '#faq';

            const bodyContent = document.createElement('div');
            bodyContent.classList.add('card-body', esrs.color);
            bodyContent.textContent = esrs.content;

            const concernButton = document.createElement('button');
            concernButton.classList.add('concern-button');
            updateConcernButton(concernButton, esrs); // Met à jour le texte du bouton
            concernButton.addEventListener('click', () => toggleConcern(concernButton, esrs)); // Utilise toggleConcern avec esrs

            accordion.appendChild(card);
            card.appendChild(header);
            header.appendChild(link);
            card.appendChild(body);
            body.appendChild(bodyContent);
            body.appendChild(concernButton); // Ajoute le bouton après le contenu
        });

        // JavaScript pour la fonctionnalité de l'accordéon
        const accItems = document.querySelectorAll('.btn-header-link');
        accItems.forEach((item) => {
            item.addEventListener('click', function() {
                const currentItem = this;
                const parent = currentItem.closest('.card');
                const body = parent.querySelector('.card-body');

                accItems.forEach((accItem) => {
                    if (accItem !== currentItem) {
                        accItem.classList.remove('collapsed');
                        const parentNotCurrent = accItem.closest('.card');
                        const bodyNotCurrent = parentNotCurrent.querySelector('.card-body');
                        bodyNotCurrent.classList.remove('show');
                    }
                });

                currentItem.classList.toggle('collapsed');
                body.classList.toggle('show');
            });
        });
    }

    // Fonction pour mettre à jour le texte du bouton concernant l'ESRS
    function updateConcernButton(button, esrs) {
        const defaultState = esrs.concerned ? 'Concerne' : 'Non Concerne';
        button.textContent = `${defaultState} par ${esrs.code}`;
    }

    // Charger les données JSON
    fetch('Data.json')
        .then(response => response.json())
        .then(data => {
            // Stocker les données JSON dans esrsData
            esrsData = data;
            // Générer les sections d'accordéon après avoir chargé les données
            generateAccordion();
        })
        .catch(error => {
            console.error('Une erreur s\'est produite lors du chargement du fichier JSON :', error);
        });

</script>
<div class="container">
    <!-- Bouton de redirection vers la prochaine page -->
    <button id="redirectionButton" class="styled-button">Cliquez ici pour passer à la prochaine page</button>
</div>
<script>
    // Récupérer les ESRS concernés et stocker localement, puis rediriger vers la prochaine page
    document.getElementById('redirectionButton').addEventListener('click', function(event) {
        // Filtrer les ESRS concernés
        const esrsConcernes = esrsData.filter(esrs => esrs.concerned);

        // Stocker les ESRS concernés localement
        localStorage.setItem('esrsConcernes', JSON.stringify(esrsConcernes));

        // Rediriger vers la prochaine page
        window.location.href = 'result.php';
    });
</script>
</body>
</html>
