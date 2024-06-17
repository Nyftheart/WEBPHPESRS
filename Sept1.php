<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESRS Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #309168;
            margin: 0;
            padding: 0;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #F5F5DC;
            padding: 50px 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .header .logo-container {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        .header img.logo {
            height: 125px;
        }
        .header .icons {
            display: flex;
            gap: 20px;
            margin-left: auto;
        }
        .header .icons img {
            height: 60px;
            cursor: pointer;
        }
        .container {
            text-align: center;
            padding: 20px;
        }
        .cards {
            display: flex;
            justify-content: space-around;
            margin: auto;
            width: 85%;
        }
        .card {
            background-color: white;
            border-radius: 10px;
            width: 25%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 0;
            overflow: hidden;
        }
        .card-header {
            padding: 20px;
            color: white;
        }
        .environnement {
            background-color: #2ecc71;
        }
        .social {
            background-color: #3498db;
        }
        .gouvernance {
            background-color: #f1c40f;
        }
        .card-body {
            padding: 20px;
            display: flex; /* Utilisation de flexbox pour aligner les éléments au bas */
            flex-direction: column; /* Définir la direction de flexbox en colonne */
            justify-content: space-between; /* Espacement égal pour aligner les éléments au bas */
            height: 70%;
        }
        .card h2 {
            margin: 0;
        }
        .card ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .card li a {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            text-align: left;
            align-items: center;
            text-decoration: none;
            color: black;
        }
        .card .status {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .card .completed {
            color: green;
        }
        .card .not-completed {
            color: red;
        }
        .card .restitution {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 40px;
            width: 40px;
            background-color: lightgray;
            border-radius: 50%;
            margin-left: auto;
        }
        .card .completed-text {
            color: white;
            background-color: green;
            border-radius: 5px;
            padding: 5px 10px;
            margin-top: auto;
        }
        .card .not-completed-text {
            color: white;
            background-color: red;
            border-radius: 5px;
            padding: 5px 10px;
            margin-top: auto;

        }
        /* Popup styles */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
            z-index: 1000;
        }
        .popup-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid lightgray;
            padding-bottom: 10px;
        }
        .popup-header h2 {
            margin: 0;
        }
        .popup-header span {
            cursor: pointer;
        }
        .popup-content {
            padding: 20px 0;
        }
        .popup-content p {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }
        .popup-content img {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<header class="header">
    <div class="logo-container">
        <img src="./images/v312_47.png" alt="Logo" class="logo">
    </div>
    <div class="icons">
        <img src="./images/img.png" alt="Info Icon" id="info-icon">
    </div>
</header>

<div class="container">
    <div class="cards">
        <div class="card">
            <div class="card-header environnement">
                <h2>Environnement</h2>
                <div class="status">ESRS</div>
            </div>
            <div class="card-body">
                <ul>
                    <li id="ESRS E1"><a href="tableur.php?code=ESRS%20E1" >ESRS E1: Changement Climatique <img src="images/img_1.png" style="height: 30px"></a></li>
                    <li id="ESRS E2"><a href="tableur.php?code=ESRS%20E2" >ESRS E2: Pollution <img src="images/img_1.png" style="height: 30px"></a></li>
                    <li id="ESRS E3"><a href="tableur.php?code=ESRS%20E3" >ESRS E3: Ressources aquatiques & marines <img src="images/img_1.png" style="height: 30px"></a></li>
                    <li id="ESRS E4"><a href="tableur.php?code=ESRS%20E4" >ESRS E4: Biodiversité & Écosystèmes <img src="images/img_1.png" style="height: 30px"></a></li>
                    <li id="ESRS E5"><a href="tableur.php?code=ESRS%20E5" >ESRS E5: Utilisation des ressources & économie circulaire <img src="images/img_1.png" style="height: 30px"></a></li>
                    <li>
                        <a href="#" id="restitutions">Restitutions <img src="images/img_4.png" style="height: 30px"></a>
                        <ul class="sub-menu" id="subMenuRestitutions" style="display: none;">
                            <li><a href="Tuile.php?code=ESRS%20E">Voir les tuiles</a></li>
                            <li><a href="matrice.php?code=ESRS%20E">Voir la matrice</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="not-completed-text">Non Complété</div>
            </div>
        </div>
        <div class="card">
            <div class="card-header social">
                <h2>Social</h2>
                <div class="status">ESRS</div>
            </div>
            <div class="card-body">
                <ul>
                    <li>ESRS S1: Personnel de l'entreprise <img src="images/img_1.png" style="height: 30px"></li>
                    <li>ESRS S2: Travailleurs dans la chaîne de valeur <img src="images/img_1.png" style="height: 30px"></li>
                    <li>ESRS S3: Communauté affectées <img src="images/img_1.png" style="height: 30px"></li>
                    <li>ESRS S4: Consommateurs et utilisateurs finaux <img src="images/img_1.png" style="height: 30px"></li>
                    <li>Restitution <img src="images/img_1.png" style="height: 30px"></li>
                </ul>
                <div class="not-completed-text">Non Complété</div>
            </div>
        </div>
        <div class="card">
            <div class="card-header gouvernance">
                <h2>Gouvernance</h2>
                <div class="status">ESRS</div>
            </div>
            <div class="card-body">
                <ul>
                    <li>ESRS G1: Personnel de l'entreprise <img src="images/img_1.png" style="height: 30px"></li>
                    <li>Restitution <img src="images/img_1.png" style="height: 30px"></li>
                </ul>
                <div class="not-completed-text">Non Complété</div>
            </div>
        </div>
    </div>
</div>

<!-- Popup HTML -->
<div class="popup" id="popup">
    <div class="popup-header">
        <h2>Informations</h2>
        <span id="close-popup">&times;</span>
    </div>
    <div class="popup-content">
        <p><img src="./images/img_2.png" alt="Check Icon" style="height: 30px"> Complété</p>
        <p><img src="./images/img_1.png" alt="Cross Icon" style="height: 30px"> Non complété</p>
        <p><img src="./images/img_4.png" alt="Not Accessible Icon" style="height: 30px"> Pas accessible</p>
        <p><img src="./images/img_3.png" alt="Accessible Icon" style="height: 30px"> Accessible</p>
    </div>
</div>

<script>
    document.getElementById("info-icon").addEventListener("click", function() {
        document.getElementById("popup").style.display = "block";
    });

    document.getElementById("close-popup").addEventListener("click", function() {
        document.getElementById("popup").style.display = "none";
    });

    window.addEventListener("click", function(event) {
        if (event.target == document.getElementById("popup")) {
            document.getElementById("popup").style.display = "none";
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        // Récupération des clés du local storage
        const keys = Object.keys(localStorage);

        // Liste des sections ESRS
        const sectionsESRS = ['ESRS E1', 'ESRS E2', 'ESRS E3', 'ESRS E4', 'ESRS E5'];

        // Vérification si toutes les sections ESRS sont présentes dans le local storage
        const toutesPresentes = sectionsESRS.every(section => keys.includes(section));

        // Variable pour simuler si une section est validée
        const sectionValidee = keys.some(key => key.startsWith('ESRS'));

        // Parcours des éléments <li> de la liste
        const lis = document.querySelectorAll('.card-body ul li');
        lis.forEach(li => {
            const id = li.getAttribute('id'); // Récupération de l'ID de l'élément <li>
            if (keys.includes(id)) { // Vérification si l'ID correspond à une clé du local storage
                // Remplacement de l'image par img_2.png
                const img = li.querySelector('img');
                if (img) {
                    img.src = 'images/img_2.png';
                }
            }
        });

        // Changement de l'image de restitution si une section est validée
        const restitutionImg = document.querySelector('#restitutions img');
        if (sectionValidee) {
            restitutionImg.src = 'images/img_3.png';
        }

        // Sélection du texte de statut
        const statusText = document.querySelector('.not-completed-text');

        // Changement du texte de statut en fonction de la présence des sections ESRS
        if (toutesPresentes) {
            statusText.textContent = 'Complété';
            statusText.classList.remove('not-completed-text'); // Retrait de la classe not-completed-text
            statusText.classList.add('completed-text'); // Ajout de la classe completed-text pour le style
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        // Récupération des clés du local storage
        const keys = Object.keys(localStorage);

        // Vérification si au moins une section ESRS est présente dans le local storage
        const auMoinsUneESRS = keys.some(key => key.startsWith('ESRS'));

        // Sélection de l'élément "Restitutions" et du sous-menu correspondant
        const restitutionLi = document.querySelector('#restitutions');
        const subMenuRestitutions = document.querySelector('#subMenuRestitutions');

        // Si aucune section ESRS n'est présente, cacher le sous-menu
        if (!auMoinsUneESRS) {
            subMenuRestitutions.style.display = 'none';
        }

        // Ajout d'un écouteur d'événements au clic sur "Restitutions"
        restitutionLi.addEventListener('click', function(e) {
            e.preventDefault(); // Empêche le comportement par défaut du lien
            // Afficher ou cacher le sous-menu seulement si au moins une section ESRS est présente
            if (auMoinsUneESRS) {
                subMenuRestitutions.style.display = (subMenuRestitutions.style.display === 'block') ? 'none' : 'block';
            }
        });


    });



</script>
</body>
</html>
