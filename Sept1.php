<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESRS Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e7f5ef70;
            margin: 0;
            padding: 0;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #F5F5DC;
            padding: 30px 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .header .logo-container {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        .header img.logo {
            height: 90px;
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
            background-color: #caf4ca;
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
        <img src="./images/title_ecriture.png" alt="Logo" class="logo">
    </div>
    <div class="icons">
        <img src="./images/img.png" alt="Info Icon" id="info-icon">
        <a href="https://panel-esrs.vercel.app/">Pannel Gestion</a>
    </div>
</header>

<div class="container">
    <div class="cards">
        <div class="card environnementsec">
            <div class="card-header environnement">
                <h2>Environnement</h2>
                <div class="status">ESRS</div>
            </div>
            <div class="card-body">
                <ul>
                    <li id="ESRS E1"><a href="tableur.php?code=ESRS%20E1" >E1: Changement Climatique <img src="images/img_1.png" style="height: 30px"></a></li>
                    <li id="ESRS E2"><a href="tableur.php?code=ESRS%20E2" >E2: Pollution <img src="images/img_1.png" style="height: 30px"></a></li>
                    <li id="ESRS E3"><a href="tableur.php?code=ESRS%20E3" >E3: Ressources aquatiques & marines <img src="images/img_1.png" style="height: 30px"></a></li>
                    <li id="ESRS E4"><a href="tableur.php?code=ESRS%20E4" >E4: Biodiversité & Écosystèmes <img src="images/img_1.png" style="height: 30px"></a></li>
                    <li id="ESRS E5"><a href="tableur.php?code=ESRS%20E5" >E5: Utilisation des ressources & économie circulaire <img src="images/img_1.png" style="height: 30px"></a></li>
                    <li>
                        <a href="#" id="restitutions">Restitutions <img src="images/img_4.png" style="height: 30px"></a>
                        <ul class="sub-menu" id="subMenuRestitutions" style="display: none;">
                            <li><a href="Tuile.php?code=ESRS%20E">Voir le statut des ESRS</a></li>
                            <li><a href="matrice.php?code=ESRS%20E">Voir la matrice de matérialité</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="not-completed-text">Non Complété</div>
            </div>
        </div>
        <div class="card socialsec">
            <div class="card-header social">
                <h2>Social</h2>
                <div class="status">ESRS</div>
            </div>
            <div class="card-body">
                <ul>
                    <li id="ESRS S1"><a href="tableur.php?code=ESRS%20S1">S1: Personnel de l'entreprise <img src="images/img_1.png" style="height: 30px"></a></li>
                    <li id="ESRS S2"><a href="tableur.php?code=ESRS%20S2">S2: Travailleurs dans la chaîne de valeur <img src="images/img_1.png" style="height: 30px"></a></li>
                    <li id="ESRS S3"><a href="tableur.php?code=ESRS%20S3">S3: Communauté affectées <img src="images/img_1.png" style="height: 30px"></a></li>
                    <li id="ESRS S4"><a href="tableur.php?code=ESRS%20S4">S4: Consommateurs et utilisateurs finaux <img src="images/img_1.png" style="height: 30px"></a></li>
                    <li>
                        <a href="#" id="restitutions-social">Restitutions <img src="images/img_4.png" style="height: 30px"></a>
                        <ul class="sub-menu" id="subMenuRestitutionsSocial" style="display: none;">
                            <li><a href="Tuile2.php?code=ESRS%20S">Voir le statut des ESRS</a></li>
                            <li><a href="matrice.php?code=ESRS%20S">Voir la matrice de matérialité</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="not-completed-text">Non Complété</div>
            </div>
        </div>
        <div class="card gouvernancesec">
            <div class="card-header gouvernance">
                <h2>Gouvernance</h2>
                <div class="status">ESRS</div>
            </div>
            <div class="card-body">
                <ul>
                    <li id="ESRS G1"><a href="tableur.php?code=ESRS%20G1">G1: Conduite des Affaires <img src="images/img_1.png" style="height: 30px"></a></li>
                    <li>
                        <a href="#" id="restitutions-gouvernance">Restitutions <img src="images/img_4.png" style="height: 30px"></a>
                        <ul class="sub-menu" id="subMenuRestitutionsGouvernance" style="display: none;">
                            <li><a href="Tuile3.php?code=ESRS%20G">Voir le statut des ESRS</a></li>
                            <li><a href="matrice.php?code=ESRS%20G">Voir la matrice de matérialité</a></li>
                        </ul>
                    </li>
                </ul>

                <div class="not-completed-text">Non Complété</div>
            </div>
        </div>
    </div>
</div>

<!-- Popup HTML -->
<div class="popup" id="info-popup">
    <div class="popup-header">
        <h2>Informations</h2>
        <span id="popup-close">&times;</span>
    </div>
    <div class="popup-content">
        <p><img src="./images/img_2.png" alt="Check Icon" style="height: 30px"> Complété</p>
        <p><img src="./images/img_1.png" alt="Cross Icon" style="height: 30px"> Non complété</p>
        <p><img src="./images/img_4.png" alt="Not Accessible Icon" style="height: 30px"> Pas accessible</p>
        <p><img src="./images/img_3.png" alt="Accessible Icon" style="height: 30px"> Accessible</p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Récupération des clés du local storage
        const keys = Object.keys(localStorage);

        // Vérification si au moins une section ESRS est présente dans le local storage pour chaque type
        const auMoinsUneESRS_E = keys.some(key => key.startsWith('ESRS E'));
        const auMoinsUneESRS_S = keys.some(key => key.startsWith('ESRS S'));
        const auMoinsUneESRS_G = keys.some(key => key.startsWith('ESRS G'));

        // Fonction pour gérer l'affichage des sous-menus de restitution
        function toggleSubMenu(restitutionLi, subMenuRestitutions, auMoinsUneESRS) {
            if (auMoinsUneESRS) {
                subMenuRestitutions.style.display = (subMenuRestitutions.style.display === 'block') ? 'none' : 'block';
            }
        }

        // Sélection des éléments "Restitutions" et des sous-menus correspondants pour chaque type
        const restitutionLiEnvironnement = document.querySelector('#restitutions');
        const subMenuRestitutionsEnvironnement = document.querySelector('#subMenuRestitutions');

        const restitutionLiSocial = document.querySelector('#restitutions-social');
        const subMenuRestitutionsSocial = document.querySelector('#subMenuRestitutionsSocial');

        const restitutionLiGouvernance = document.querySelector('#restitutions-gouvernance');
        const subMenuRestitutionsGouvernance = document.querySelector('#subMenuRestitutionsGouvernance');

        // Initialisation de l'affichage des sous-menus en fonction de la présence des sections ESRS
        if (!auMoinsUneESRS_E) {
            subMenuRestitutionsEnvironnement.style.display = 'none';
        }
        if (!auMoinsUneESRS_S) {
            subMenuRestitutionsSocial.style.display = 'none';
        }
        if (!auMoinsUneESRS_G) {
            subMenuRestitutionsGouvernance.style.display = 'none';
        }

        // Ajout d'un écouteur d'événements au clic sur "Restitutions" pour chaque type
        restitutionLiEnvironnement.addEventListener('click', function(e) {
            e.preventDefault(); // Empêche le comportement par défaut du lien
            toggleSubMenu(restitutionLiEnvironnement, subMenuRestitutionsEnvironnement, auMoinsUneESRS_E);
        });

        restitutionLiSocial.addEventListener('click', function(e) {
            e.preventDefault(); // Empêche le comportement par défaut du lien
            toggleSubMenu(restitutionLiSocial, subMenuRestitutionsSocial, auMoinsUneESRS_S);
        });

        restitutionLiGouvernance.addEventListener('click', function(e) {
            e.preventDefault(); // Empêche le comportement par défaut du lien
            toggleSubMenu(restitutionLiGouvernance, subMenuRestitutionsGouvernance, auMoinsUneESRS_G);
        });

        // Mise à jour des icônes de restitution en fonction des sections validées
        const sectionsESRS = ['ESRS E1', 'ESRS E2', 'ESRS E3', 'ESRS E4', 'ESRS E5', 'ESRS S1', 'ESRS S2', 'ESRS S3', 'ESRS S4', 'ESRS G1'];

        sectionsESRS.forEach(section => {
            const li = document.getElementById(section);
            if (li && keys.includes(section)) {
                const img = li.querySelector('img');
                if (img) {
                    img.src = 'images/img_2.png'; // Met à jour l'icône pour indiquer que la section est complétée
                }
            }
        });

        // Mise à jour de l'icône de restitution pour enviroment si au moins une section est validée
        const restitutionImgEnviroment = document.querySelector('#restitutions img');
        if (auMoinsUneESRS_E) {
            restitutionImgEnviroment.src = 'images/img_3.png'; // Met à jour l'icône de restitution pour Social
        }

        const restitutionImgSocial = document.querySelector('#restitutions-social img');
        if (auMoinsUneESRS_S) {
            restitutionImgSocial.src = 'images/img_3.png'; // Met à jour l'icône de restitution pour Social
        }

        // Mise à jour de l'icône de restitution pour Gouvernance si au moins une section est validée
        const restitutionImgGouvernance = document.querySelector('#restitutions-gouvernance img');
        if (auMoinsUneESRS_G) {
            restitutionImgGouvernance.src = 'images/img_3.png'; // Met à jour l'icône de restitution pour Gouvernance
        }

        const colonnesESRS = [
            ['ESRS E1', 'ESRS E2', 'ESRS E3', 'ESRS E4', 'ESRS E5'], // Colonnes E
            ['ESRS S1', 'ESRS S2', 'ESRS S3', 'ESRS S4'], // Colonnes S
            ['ESRS G1'] // Colonnes G
        ];

        // Fonction pour vérifier si toutes les sections d'une colonne sont présentes
        function estColonneComplete(colonneESRS) {
            return colonneESRS.every(section => keys.includes(section));
        }

        // Sélection des éléments de texte à mettre à jour pour chaque colonne
        const statusTextColonneE = document.querySelector('.environnementsec .not-completed-text');
        const statusTextColonneS = document.querySelector('.socialsec .not-completed-text');
        const statusTextColonneG = document.querySelector('.gouvernancesec .not-completed-text');
        console.log("ok test");
        // Vérifiez que les éléments existent avant de les mettre à jour
        if (statusTextColonneE) {
            console.log("ok element");
            if (estColonneComplete(colonnesESRS[0])) {
                console.log("ok ESRS ");
                statusTextColonneE.textContent = 'Complété';
                statusTextColonneE.classList.remove('not-completed-text');
                statusTextColonneE.classList.add('completed-text');
            } else {
                console.log("ok ESRS ");
                statusTextColonneE.textContent = 'Non Complété';
                statusTextColonneE.classList.add('not-completed-text');
                statusTextColonneE.classList.remove('completed-text');
            }
        }

        if (statusTextColonneS) {
            if (estColonneComplete(colonnesESRS[1])) {
                statusTextColonneS.textContent = 'Complété';
                statusTextColonneS.classList.remove('not-completed-text');
                statusTextColonneS.classList.add('completed-text');
            } else {
                statusTextColonneS.textContent = 'Non Complété';
                statusTextColonneS.classList.add('not-completed-text');
                statusTextColonneS.classList.remove('completed-text');
            }
        }

        if (statusTextColonneG) {
            if (estColonneComplete(colonnesESRS[2])) {
                statusTextColonneG.textContent = 'Complété';
                statusTextColonneG.classList.remove('not-completed-text');
                statusTextColonneG.classList.add('completed-text');
            } else {
                statusTextColonneG.textContent = 'Non Complété';
                statusTextColonneG.classList.add('not-completed-text');
                statusTextColonneG.classList.remove('completed-text');
            }
        }
        const infoIcon = document.getElementById('info-icon');
        const infoPopup = document.getElementById('info-popup');
        const popupClose = document.getElementById('popup-close');

        // Fonction pour afficher la popup
        function showPopup() {
            infoPopup.style.display = 'block';
        }

        // Fonction pour masquer la popup
        function hidePopup() {
            infoPopup.style.display = 'none';
        }

        // Ajouter un écouteur d'événement pour ouvrir la popup lorsque l'utilisateur clique sur l'icône
        infoIcon.addEventListener('click', showPopup);

        // Ajouter un écouteur d'événement pour fermer la popup lorsque l'utilisateur clique sur le "x"
        popupClose.addEventListener('click', hidePopup);
    });


</script>
</body>
</html>
