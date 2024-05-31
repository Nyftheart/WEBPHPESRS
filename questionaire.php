<?php
// Démarrer la session PHP
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Formulaire</h2>
    <form method="POST" action="Sept1.php" onsubmit="return validateForm()">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="email">Adresse email :</label>
        <input type="email" id="email" name="email" required>

        <label for="entreprise">Entreprise :</label>
        <input type="text" id="entreprise" name="entreprise">

        <label for="telephone">Numéro de téléphone :</label>
        <input type="tel" id="telephone" name="telephone" required>
        <span id="tel-error" style="color: red; display: none;">Veuillez entrer un numéro de téléphone valide (10 chiffres).</span>

        <input type="submit" value="Soumettre">
    </form>
</div>

<script>
    function validateForm() {
        var nom = document.getElementById("nom").value;
        var prenom = document.getElementById("prenom").value;
        var email = document.getElementById("email").value;
        var telephone = document.getElementById("telephone").value;

        // Vérifier que le nom et le prénom ne contiennent que des lettres
        var letters = /^[A-Za-z]+$/;
        if (!nom.match(letters) || !prenom.match(letters)) {
            alert("Veuillez entrer un nom et un prénom valides (lettres uniquement).");
            return false;
        }

        // Vérifier que l'email est valide
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email.match(emailPattern)) {
            alert("Veuillez entrer une adresse email valide.");
            return false;
        }

        // Vérifier que le numéro de téléphone est composé de 10 chiffres
        var phonePattern = /^\d{10}$/;
        if (!telephone.match(phonePattern)) {
            document.getElementById("tel-error").style.display = "block";
            return false;
        }

        // Si toutes les vérifications sont passées, stocker les données dans le localStorage
        var data = [
            {"code":"ESRS E1","name":"Changement climatique","color":"green","content":"ESRS E1 est la première norme du volet environnemental des normes ESRS. Elle a\npour objet le changement climatique.\n\nElle recouvre 3 sujets : l'atténuation du changement climatique, l'adaptation à\nses effets via la réduction des émissions de gaz à effet de serre, ainsi que la\nquestion de l'énergie.\n\nPour satisfaire à cet ESRS E1, les entreprises concernées doivent fournir des\ninformations complètes sur l'impact du changement climatique sur leurs\nactivités et expliquer comment elles anticipent et s’adaptent au réchauffement\nclimatique.\n\nElles doivent aussi expliquer leur plan d’action pour atteindre un objectif en\ntermes d’émissions de gaz à effet de serre compatible avec un scénario à\nmaximum + 1,5°C prévu par les Accords de Paris.\n\nUne entreprise qui choisit de ne pas faire figurer le volet climat dans son\nreporting doit justifier que ce sujet ne la concerne pas. En pratique, il sera très\ndifficile voire impossible pour les entreprises de ne pas reporter sur le volet\nclimat puisque la plupart voire la totalité des activités humaines conduisent à\némettre des gaz à effet de serre.\n\nESRS E1 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 9 et le nombre de points\nde données (indicateurs) est de 220.","concerned":true},{"code":"ESRS E2","name":"Pollution","color":"green","content":"La norme ESRS E2 est la deuxième norme du volet environnemental des ESRS.\nElle aborde la question centrale de la pollution de l'air, de l'eau et du sol. Elle\nexige également des entreprises qu'elles communiquent sur les substances\npréoccupantes et extrêmement préoccupantes qu'elles utilisent ou produisent.\n\nESRS E2 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 6 et le nombre de points\nde données (indicateurs) est de 68.","concerned":true},{"code":"ESRS E3","name":"Ressources aquatiques et marines","color":"green","content":"Dans la lutte contre le réchauffement climatique, et la création d'une économie\nplus durable, les ressources en eau et les ressources marines occupent une place\ncruciale. C'est donc pour cela que l’ESRS E3 est dédié à cette thématique.\n\nLa norme a pour objet les eaux de surface (fleuves, lacs, eaux de ruissellement,\nmers et océans, zones humides...) et les eaux souterraines (qui se trouvent sous\nle sol dans les aquifères). Elle s'intéresse notamment à leur utilisation, à leur\nrejet et aux activités économiques liées à la mer.\n\nLes informations à communiquer portent sur :\n\n- La façon dont l'entreprise affecte l'eau et les ressources marines via son\nactivité, qu'il s'agisse d'un impact positif, négatif, réels ou potentiels\n\n- Les mesures prises pour réduire l'impact négatif de l'activité sur les ressources\naquatiques et marines, y compris en ce qui concerne la réduction de la\nconsommation d’eau\n\n- Une planification de la façon dont l'entreprise peut adapter sa stratégie ou son\nmodèle, pour réduire son impact et valoriser les ressources marines,\n\n- Pointer les risques et opportunités financières du point de vue des ressources\nen eau et des ressources marines.\n\nESRS E3 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 5 et le nombre de points\nde données (indicateurs) est de 48.","concerned":true},{"code":"ESRS E4","name":"Biodiversité & écosystèmes","color":"green","content":"La norme ESRS E4 a pour objet les habitats terrestres, marins et d'eau douce,\nainsi que la diversité de la faune et de la flore. Elle vise à permettre de\ncomprendre :\n\n- les incidences positives et négatives, réelles comme potentielles, de\nl’entreprise sur la biodiversité et les écosystèmes, ainsi que la mesure dans\nlaquelle cette dernière contribue aux facteurs de perte et de dégradation de la\nbiodiversité et des écosystèmes ;\n\n- les actions menées pour prévenir ou atténuer les impacts négatifs, protéger et\nrestaurer la biodiversité et les écosystèmes, ainsi que traiter les risques et\nopportunités ;\n\n- les plans et la capacité de l’entreprise à adapter sa stratégie et son modèle\néconomique conformément aux éléments cités dans la notice ;\n\n- la nature, le type et l’ampleur des risques, dépendances et opportunités liés à\nla\n\nbiodiversité et aux écosystèmes, ainsi que la manière dont l’entreprise les gère ;\n\n- les incidences financières sur l’entreprise, à court, moyen et long terme, des\nrisques et opportunités liés aux incidences et dépendances de l’entreprise vis-\nà-vis de la biodiversité et des écosystèmes.\n\nESRS E4 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 6 et le nombre de points\nde données (indicateurs) est de 120.","concerned":true},{"code":"ESRS E5","name":"Utilisation des ressources & économie circulaire","color":"green","content":"la norme ESRS E5 a pour objet de permettre aux investisseurs d'évaluer si\nl'entreprise optimise ses ressources, et œuvre en faveur d'une économie\ncirculaire. C'est une thématique clé en matière de durabilité. Les informations\ncommuniquées concernent :\n\n- Le bilan de l'utilisation des ressources, y compris des ressources non\nrenouvelables (entrées et sorties de ressources ainsi que des déchets générés\npar le fonctionnement de l'entreprise),\n\n- Les mesures prises par l'entreprise pour économiser des ressources ou\ncontribuer à une économie circulaire (notions de hiérarchisation des déchets et\nde recyclage),\n\n- Les risques et les opportunités pour l'activité, comme une éventuelle possibilité\nde rupture de matière non renouvelable.\n\nESRS E5 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 6 et le nombre de points\nde données (indicateurs) est de 84.","concerned":true},{"code":"ESRS S1","name":"Personnel de l’entreprise","color":"blue","content":"La norme ESRS S1 fait partie du volet social des normes ESRS.\n\nElle concerne les effectifs de l'entreprise et leurs conditions de travail : dialogue\nsocial, salaires décents, formation, inclusivité, santé et sécurité, équilibre vie\nprofessionnelle/vie privée...\n\nLa norme s'applique au « personnel propre » de l'entreprise : les salariés, les\nintérimaires et les travailleurs extérieurs ayant conclu un contrat de prestation\nde service. Les travailleurs de la chaîne de valeur ne sont pas pris en compte ici\ncar ils font l'objet de la norme ESRS S2.\n\nESRS S1 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 17 et le nombre de\npoints de données (indicateurs) est de 190.","concerned":true},{"code":"ESRS S2","name":"Travailleurs dans la chaîne de valeur","color":"blue","content":"ESRS S2 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 17 et le nombre de\npoints de données (indicateurs) est de 190.","concerned":true},{"code":"ESRS S3","name":"Communautés affectées","color":"blue","content":"ESRS S3 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 17 et le nombre de\npoints de données (indicateurs) est de 190.","concerned":true},{"code":"ESRS S4","name":"Consommateurs et utilisateurs finaux","color":"blue","content":"ESRS S4 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 17 et le nombre de\npoints de données (indicateurs) est de 190.","concerned":true},{"code":"ESRS G1","name":"Conduite responsable des entreprises","color":"orange","content":"ESRS S4 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 17 et le nombre de\npoints de données (indicateurs) est de 190.","concerned":true}
        ];

        var jsonData = JSON.stringify(data);
        localStorage.setItem("esrsConcernes", jsonData);

        // Retourner true pour soumettre le formulaire
        return true;
    }
</script>
