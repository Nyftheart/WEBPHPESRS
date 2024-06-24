<!DOCTYPE html>
<style>
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

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #e7f5ef70;
    }

    .container {

        display: flex;
        padding-top: 30px;
    }

    .left-section, .right-section {
        padding: 20px;
    }

    .left-section {
        border-radius: 30px;
        flex: 1;
        background-color: #ffffff;
        color: black;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-left: 10%;
        margin-right: 5%;
    }

    .left-section h1 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    .left-section p {
        font-size: 16px;
        margin-bottom: 20px;
    }

    .btn-start, .btn-video {
        display: block;
        margin-bottom: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn-start {
        background-color: #28a745;
        color: white;
    }

    .btn-video {
        background-color: white;
        color: #2c4b8e;
        border: 1px solid #2c4b8e;
    }

    .right-section {

        border-radius: 30px;
        margin: auto;
        height: 60%;
        max-height: 600px;
        flex: 1;
        background-color: #319082;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 40px;
        margin-right: 10%;
    }

    .right-section h2 {
        padding-bottom: 20px;
        font-size: 24px;
        margin:auto;
    }

    .demo-form{
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 18px;
        max-width: 400px;
    }

    .form-group {
        min-width: 160PX;
    }
    .special-form{
        width: 100%;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input, .form-group select {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #dcdbdb;
        color: black;
    }

    .phone-input {
        display: flex;
        align-items: center;
        background-color: #dcdbdb;
    }

    .flag-icon {
        color: #000;
        margin-right: 10px;
        margin-left: 10px;
    }



    .form-note {
        font-size: 12px;
        margin: 20px 0;
    }

    .form-note a {
        color: #28a745;
        text-decoration: none;
    }

    .btn-submit {
        width: 100%;
        padding: 10px;
        background-color: white;
        color: black;
        border: 1px solid #28a745;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-submit:hover {
        background-color: #28a745;
        color: white;
    }
    .checkbox-group {
        display: flex;
        align-items: flex-start;
    }

    .checkbox-group input {
        margin-right: 10px;
    }

    .checkbox-group label {
        flex: 1;
    }

    .checkbox-group a {
        color: #b3fbbd;
        text-decoration: none;
    }

    .questionaireimage{
        width: 60%;
        margin: auto;
        justify-content: center;

    }


</style>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<header class="header">
    <div class="logo-container">
        <img src="./images/v312_47.png" alt="Logo" class="logo">
        <img src="./images/title_ecriture.png" alt="Logo" class="logo" >
    </div>
</header>

<body>
<div class="container">
    <div class="left-section">
        <img src="./images/questimg.png" alt="img" class="questionaireimage">
        <p style="color: gray">Vous souhaitez essayer librement notre solution:</p>
        <div style="line-height: 10px">
            <p>✔️ Identifier vos ESRS pertinentes en fonction de vos enjeux</p>
            <p>✔️ Evaluer la matérialité pour déterminer vos enjeux de durabilité</p>
            <p>✔️ Générer votre matrice de matérialité</p>
            <p>✔️ Récupérer, <b>sans engagement</b>, vos données à l’issue de votre test</p>
        </div>

    </div>
    <div class="right-section">
        <form id="demo-form" class="demo-form" action="Sept1.php" method="POST">
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Livia">
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="Siphon">
                </div>
            <div class="form-group special-form">
                <label for="email">Email professionnel</label>
                <input type="email" id="email" name="email" placeholder="ex: john@mail.com">
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <div class="phone-input" style="max-width: 190px">
                    <span class="flag-icon">🇫🇷</span>
                    <input type="tel" id="telephone" name="telephone" placeholder="123456789">
                </div>
            </div>
            <div class="form-group">
                <label for="entreprise">Entreprise</label>
                <input type="text" id="entreprise" name="entreprise" placeholder="ex: Etiplanet">
            </div>
            <div class="form-group">
                <label for="employees">Nombre d'employés</label>
                <select id="employees" name="employees">
                    <option value="" disabled selected>-</option>
                    <option value="1-10" style="font-weight: 700">1-10</option>
                    <option value="11-50" style="font-weight: 700">11-50</option>
                    <option value="51-200" style="font-weight: 700">51-200</option>
                    <option value="201-500" style="font-weight: 700">201-500</option>
                    <option value="501+" style="font-weight: 700">501+</option>
                </select>
            </div>
            <div class="form-group">
                <label for="secteur">Secteur</label>
                <select id="secteur" name="secteur">
                    <option value="" disabled selected style="font-weight: 700">-</option>
                    <option value="tech" style="font-weight: 700">Technologie</option>
                    <option value="finance" style="font-weight: 700">Finance</option>
                    <option value="industrie" style="font-weight: 700">Industrie</option>
                    <option value="sante" style="font-weight: 700">Santé</option>
                    <option value="autre" style="font-weight: 700">Autre</option>
                </select>
            </div>
            <div class=" checkbox-group">
                <input type="checkbox" id="consent" name="consent" required>
                <label for="consent">J’accepte que mes informations personnelles saisies soient utilisées par Etiplanet à des fins de prospection commerciale. Pour plus d’information, cliquez <a href="#">ici</a>.</label>
            </div><button type="submit" class="btn-submit">Découvrir la suite</button>
        </form>
    </div>
</div>
</body>
</html>
