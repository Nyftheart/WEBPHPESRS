<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Normes Européennes de Reporting en Matière de Durabilité (ESRS)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        header {
            background: linear-gradient(to right, #4CAF50, #2E7D32);
            color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li:last-child {
            margin-right: 0;
        }

        nav ul li a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #4CAF50;
        }

        .tile {
            padding: 20px;
            background-color: #fff;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .tile:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .hero-tile {
            background-image: url('hero-banner.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
            text-align: center;
            padding: 100px 0;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .hero-tile h2 {
            font-size: 3em;
            margin: 0;
        }

        .double-tile-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .double-tile {
            width: calc(50% - 40px);
            margin: 20px;
        }

        footer {
            background: linear-gradient(to right, #4CAF50, #2E7D32);
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 0;
        }

        footer p em {
            font-style: normal;
            color: #fff;
        }

        /* Media queries pour la responsivité */
        @media screen and (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }

            nav ul li {
                margin-bottom: 10px;
            }

            .hero-tile h2 {
                font-size: 2em;
            }

            .double-tile {
                width: calc(100% - 40px);
            }
        }
    </style>
</head>
<body>
<header>
    <h1>Normes Européennes de Reporting en Matière de Durabilité (ESRS)</h1>
    <nav>
        <ul>
            <li><a href="#about">À propos des ESRS</a></li>
            <li><a href="#compliance-test">Participez au test de conformité</a></li>
            <li><a href="#benefits">Pourquoi rejoindre les ESRS ?</a></li>
            <li><a href="#resources">Ressources et support</a></li>
            <li><a href="#contact">Contactez-nous</a></li>
        </ul>
    </nav>
</header>

<div class="hero-tile" style="background: linear-gradient(to right, #8BC34A, #4CAF50);">
    <h2>Bienvenue aux Normes Européennes de Reporting en Matière de Durabilité (ESRS)</h2>
</div>
<div class="tile" id="compliance-test">
    <h2>Participez au test de conformité</h2>
    <p>Évaluez votre niveau de conformité aux ESRS en participant à notre test de conformité en ligne. Découvrez dans quelle mesure votre entreprise ou organisation est concernée par ces normes et identifiez les domaines dans lesquels des améliorations peuvent être apportées.</p>
    <a href="questionaireV2.php?step=1" class="btn" onclick="">Accéder au test de conformité</a>
</div>
<div class="double-tile-container">
    <div class="double-tile">
        <div class="tile" id="about" style="background: linear-gradient(to right, #C5E1A5, #8BC34A);">
            <h2>À propos des ESRS</h2>
            <p>Les Normes Européennes de Reporting en Matière de Durabilité (ESRS) sont un cadre harmonisé pour la collecte, la mesure et la communication des informations sur la durabilité au sein de l'Union Européenne. Adoptées par la Commission Européenne, ces normes visent à renforcer la transparence et la responsabilité des entreprises et des organisations en matière de durabilité.</p>
        </div>
    </div>
    <div class="double-tile">
        <section id="contact" class="tile" style="background: linear-gradient(to right, #C5E1A5, #8BC34A);">
            <h2>Contactez-nous</h2>
            <p>Pour plus d'informations sur les ESRS ou pour obtenir de l'aide, n'hésitez pas à nous contacter. Notre équipe est là pour répondre à toutes vos questions et vous guider dans votre démarche vers la durabilité.</p>
            <!-- Ajoutez un formulaire de contact ici -->
        </section>

    </div>
</div>

<div class="double-tile-container">
    <div class="double-tile">
        <div class="tile" id="benefits" style="background: linear-gradient(to right, #C5E1A5, #8BC34A);">
            <h2>Pourquoi rejoindre les ESRS ?</h2>
            <p>En adoptant les ESRS, vous renforcez la confiance de vos parties prenantes et contribuez à la construction d'un avenir plus durable. Apprenez-en plus sur les avantages de l'adhésion aux ESRS et sur la manière dont ces normes peuvent vous aider à intégrer les principes de durabilité dans vos opérations et vos rapports.</p>
        </div>
    </div>
    <div class="double-tile">
        <div class="tile" id="resources" style="background: linear-gradient(to right, #C5E1A5, #8BC34A);">
            <h2>Ressources et support</h2>
            <p>Explorez nos ressources pour en savoir plus sur les ESRS et accédez à notre support pour vous aider à mettre en œuvre ces normes au sein de votre entreprise ou organisation.</p>
        </div>
    </div>
</div>

<footer style="background: linear-gradient(to right, #4CAF50, #2E7D32);">
    <p>Inscrivez-vous dès aujourd'hui pour rejoindre le mouvement pour la durabilité en Europe ! <em>🌱🌍</em></p>
</footer>
</body>
</html>

