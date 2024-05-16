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
        }

        .accordion {
            border: 0;
        }

        .card {
            border: 0;
            box-shadow: 0 0 20px 0 rgba(213, 213, 213, 0.5);


            overflow: hidden;
        }

        .card-body {
            display:flex;
            justify-content: space-between;
            line-height: 30px;
            padding: 20px;
            border-radius: 5px;
            color: white;
            font-weight: 600;
            font-size: 18px; /* Réduit la taille de la police pour mieux s'adapter au contenu */
        }
        .card-body_bis {
            display:flex;
            justify-content: space-between;
            line-height: 30px;
            padding: 20px;

            color: white;
            font-weight: 600;
            font-size: 18px; /* Réduit la taille de la police pour mieux s'adapter au contenu */
        }
        /* Couleurs spécifiques */
        .gray {
            background: #999;
        }
        .gray_bis{
            background: #a7a7a7;
        }

        .green {
            background: #5cb85c;
        }
        .green_bis{
            background: #71d560;
        }

        .orange {
            background: #f0ad4e;
        }
        .orange_bis{
            background: #fbc068;
        }

        .blue {
            background: #5bc0de;
        }
        .blue_bis{
            background: #78d2e1;
        }
        /* Ajoutez cette règle CSS pour masquer la section d'accordéon par défaut */
        button{
            margin-bottom: 30px;
        }


    </style>
</head>
<body>
<div class="container">
    <div class="accordion" id="faq">
        <!-- Les sections d'accordéon seront générées ici -->
    </div>
    <button id="redirectionButton" class="styled-button">Cliquez ici pour passer à la prochaine page</button>
</div>
<script>
    // ESRS Data
    let esrsData;

    function generateAccordion() {
        const accordion = document.getElementById('faq');

        esrsData.forEach(esrs => {
            esrs.content.forEach(contentItem => { // Boucle à travers la liste content de chaque ESRS
                const card = document.createElement('div');
                card.classList.add('card', esrs.color);

                const body = document.createElement('div');
                body.classList.add('card-body');
                body.textContent = contentItem.item; // Ajoute le texte de l'élément de contenu à la carte

                const description = document.createElement('div');
                description.classList.add('card-body_bis', esrs.color + "_bis");
                description.textContent = contentItem.description; // Ajoute la description à la carte
                description.style.display = 'none'; // Masque la description par défaut

                const header = document.createElement('div');
                header.classList.add('card-header');

                const link = document.createElement('div');
                link.classList.add('btn-header-link', 'collapsed');
                link.dataset.toggle = 'collapse';
                link.dataset.target = `#faq${esrs.code}`;
                link.setAttribute('aria-expanded', 'false');
                link.setAttribute('aria-controls', `faq${esrs.code}`);

                const icon = document.createElement('i');
                icon.classList.add('fas', 'fa-chevron-down'); // Assurez-vous que ces classes correspondent à celles utilisées par Font Awesome pour afficher votre icône
                link.appendChild(icon); // Ajoutez l'icône à votre bouton

                const concernButton = document.createElement('button');
                concernButton.textContent = 'Non concerne';
                concernButton.dataset.esrsCode = esrs.code; // Ajoutez cet attribut personnalisé pour stocker le code ESRS
                concernButton.dataset.sectionTitle = contentItem.item; // Ajoutez un attribut de données pour stocker le titre de la section
                concernButton.classList.add('concern-button'); // Ajoutez une classe pour identifier facilement les boutons "Concerne/Non concerne"

                body.appendChild(link); // Ajoute le bouton à la carte
                card.appendChild(body);
                card.appendChild(description); // Ajoute la description à la carte
                accordion.appendChild(card); // Ajoute la carte au conteneur de l'accordéon
                accordion.appendChild(concernButton);
                // Gérer le clic sur le bouton pour afficher/masquer la description
                link.addEventListener('click', () => {
                    if (description.style.display === 'none') {
                        description.style.display = 'block';
                        icon.classList.remove('fa-chevron-down');
                        icon.classList.add('fa-chevron-up');
                    } else {
                        description.style.display = 'none';
                        icon.classList.remove('fa-chevron-up');
                        icon.classList.add('fa-chevron-down');
                    }
                });
                concernButton.addEventListener('click', () => {
                    if (concernButton.textContent === 'Concerne') {
                        concernButton.textContent = 'Non concerne';
                    } else {
                        concernButton.textContent = 'Concerne';
                    }
                });
            });
        });
    }


    // Charger les données JSON
    fetch('esrsData.json')
        .then(response => response.json())
        .then(data => {
            // Stocker les données JSON dans esrsData
            esrsData = data;

            // Récupérer le code ESRS depuis l'URL
            const urlParams = new URLSearchParams(window.location.search);
            const esrsCode = urlParams.get('code');

            // Filtrer les ESRS en fonction du code de l'URL
            if (esrsCode) {
                const filteredESRS = esrsData.filter(esrs => esrs.code === esrsCode);

                // Vérifier si des ESRS ont été trouvés
                if (filteredESRS.length > 0) {
                    // Générer les sections d'accordéon avec les ESRS filtrés
                    esrsData = filteredESRS;
                    generateAccordion();
                } else {
                    console.log('Aucun ESRS correspondant au code trouvé.');
                }
            } else {
                console.log('Aucun code ESRS n\'a été fourni.'); // Afficher un message si aucun code n'a été fourni
            }
        })
        .catch(error => {
            console.error('Une erreur s\'est produite lors du chargement du fichier JSON :', error);
        });


    // Fonction pour enregistrer le choix dans le stockage local
    function enregistrerChoixLocalStorage() {
        // Récupérer tous les boutons "Concerne/Non concerne"
        var concernButtons = document.querySelectorAll('.concern-button');

        // Créer un objet pour stocker les choix
        var choicesList = {};

        // Parcourir chaque bouton
        concernButtons.forEach(function(button) {
            // Vérifier si le bouton est considéré comme "Concerne"
            if (button.textContent === 'Concerne') {
                // Récupérer le code ESRS associé à ce bouton
                var esrsCode = button.dataset.esrsCode;

                // Récupérer le titre de la section associée à ce bouton
                var sectionTitle = button.dataset.sectionTitle;

                // Afficher les valeurs récupérées pour le débogage
                console.log("ESRS Code:", esrsCode);
                console.log("Section Title:", sectionTitle);

                // Ajouter le choix à l'objet choicesList
                if (!choicesList[esrsCode]) {
                    choicesList[esrsCode] = [sectionTitle];
                } else {
                    choicesList[esrsCode].push(sectionTitle);
                }
            }
        });

        // Afficher les choix pour le débogage
        console.log("Choices List:", choicesList);

        // Enregistrer les choix dans le stockage local
        for (var code in choicesList) {
            localStorage.setItem(code, JSON.stringify(choicesList[code]));
        }
    }

    // Gestionnaire d'événements pour le clic sur le bouton
    document.getElementById("redirectionButton").addEventListener("click", function() {
        // Appeler la fonction pour enregistrer les choix dans le stockage local
        enregistrerChoixLocalStorage();

        // Rediriger vers la prochaine page (remplacez "PAGE_SUIVANTE" par l'URL de votre prochaine page)
        window.location.href = "result.php";
    });











</script>


</body>
</html>
