<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Step Form</title>
</head>

<body>

<?php
session_start();

$step = isset($_GET['step']) ? (int)$_GET['step'] : 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['form_data'] = array_merge($_SESSION['form_data'] ?? [], $_POST);
    $step++;
    if ($step > 6) {
        header("Location: Sept1.php");
        exit;
    } else {
        header("Location: questionaireV2.php?step=$step");
        exit;
    }
}

$form_data = $_SESSION['form_data'] ?? [];
?>
<script>
    var data = [
        [{"code":"ESRS E1","name":"Changement climatique","color":"green","content":"ESRS E1 est la première norme du volet environnemental des normes ESRS. Elle a\npour objet le changement climatique.\n\nElle recouvre 3 sujets : l'atténuation du changement climatique, l'adaptation à\nses effets via la réduction des émissions de gaz à effet de serre, ainsi que la\nquestion de l'énergie.\n\nPour satisfaire à cet ESRS E1, les entreprises concernées doivent fournir des\ninformations complètes sur l'impact du changement climatique sur leurs\nactivités et expliquer comment elles anticipent et s’adaptent au réchauffement\nclimatique.\n\nElles doivent aussi expliquer leur plan d’action pour atteindre un objectif en\ntermes d’émissions de gaz à effet de serre compatible avec un scénario à\nmaximum + 1,5°C prévu par les Accords de Paris.\n\nUne entreprise qui choisit de ne pas faire figurer le volet climat dans son\nreporting doit justifier que ce sujet ne la concerne pas. En pratique, il sera très\ndifficile voire impossible pour les entreprises de ne pas reporter sur le volet\nclimat puisque la plupart voire la totalité des activités humaines conduisent à\némettre des gaz à effet de serre.\n\nESRS E1 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 9 et le nombre de points\nde données (indicateurs) est de 220.","concerned":true},{"code":"ESRS E2","name":"Pollution","color":"green","content":"La norme ESRS E2 est la deuxième norme du volet environnemental des ESRS.\nElle aborde la question centrale de la pollution de l'air, de l'eau et du sol. Elle\nexige également des entreprises qu'elles communiquent sur les substances\npréoccupantes et extrêmement préoccupantes qu'elles utilisent ou produisent.\n\nESRS E2 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 6 et le nombre de points\nde données (indicateurs) est de 68.","concerned":true},{"code":"ESRS E3","name":"Ressources aquatiques et marines","color":"green","content":"Dans la lutte contre le réchauffement climatique, et la création d'une économie\nplus durable, les ressources en eau et les ressources marines occupent une place\ncruciale. C'est donc pour cela que l’ESRS E3 est dédié à cette thématique.\n\nLa norme a pour objet les eaux de surface (fleuves, lacs, eaux de ruissellement,\nmers et océans, zones humides...) et les eaux souterraines (qui se trouvent sous\nle sol dans les aquifères). Elle s'intéresse notamment à leur utilisation, à leur\nrejet et aux activités économiques liées à la mer.\n\nLes informations à communiquer portent sur :\n\n- La façon dont l'entreprise affecte l'eau et les ressources marines via son\nactivité, qu'il s'agisse d'un impact positif, négatif, réels ou potentiels\n\n- Les mesures prises pour réduire l'impact négatif de l'activité sur les ressources\naquatiques et marines, y compris en ce qui concerne la réduction de la\nconsommation d’eau\n\n- Une planification de la façon dont l'entreprise peut adapter sa stratégie ou son\nmodèle, pour réduire son impact et valoriser les ressources marines,\n\n- Pointer les risques et opportunités financières du point de vue des ressources\nen eau et des ressources marines.\n\nESRS E3 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 5 et le nombre de points\nde données (indicateurs) est de 48.","concerned":true},{"code":"ESRS E4","name":"Biodiversité & écosystèmes","color":"green","content":"La norme ESRS E4 a pour objet les habitats terrestres, marins et d'eau douce,\nainsi que la diversité de la faune et de la flore. Elle vise à permettre de\ncomprendre :\n\n- les incidences positives et négatives, réelles comme potentielles, de\nl’entreprise sur la biodiversité et les écosystèmes, ainsi que la mesure dans\nlaquelle cette dernière contribue aux facteurs de perte et de dégradation de la\nbiodiversité et des écosystèmes ;\n\n- les actions menées pour prévenir ou atténuer les impacts négatifs, protéger et\nrestaurer la biodiversité et les écosystèmes, ainsi que traiter les risques et\nopportunités ;\n\n- les plans et la capacité de l’entreprise à adapter sa stratégie et son modèle\néconomique conformément aux éléments cités dans la notice ;\n\n- la nature, le type et l’ampleur des risques, dépendances et opportunités liés à\nla\n\nbiodiversité et aux écosystèmes, ainsi que la manière dont l’entreprise les gère ;\n\n- les incidences financières sur l’entreprise, à court, moyen et long terme, des\nrisques et opportunités liés aux incidences et dépendances de l’entreprise vis-\nà-vis de la biodiversité et des écosystèmes.\n\nESRS E4 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 6 et le nombre de points\nde données (indicateurs) est de 120.","concerned":true},{"code":"ESRS E5","name":"Utilisation des ressources & économie circulaire","color":"green","content":"la norme ESRS E5 a pour objet de permettre aux investisseurs d'évaluer si\nl'entreprise optimise ses ressources, et œuvre en faveur d'une économie\ncirculaire. C'est une thématique clé en matière de durabilité. Les informations\ncommuniquées concernent :\n\n- Le bilan de l'utilisation des ressources, y compris des ressources non\nrenouvelables (entrées et sorties de ressources ainsi que des déchets générés\npar le fonctionnement de l'entreprise),\n\n- Les mesures prises par l'entreprise pour économiser des ressources ou\ncontribuer à une économie circulaire (notions de hiérarchisation des déchets et\nde recyclage),\n\n- Les risques et les opportunités pour l'activité, comme une éventuelle possibilité\nde rupture de matière non renouvelable.\n\nESRS E5 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 6 et le nombre de points\nde données (indicateurs) est de 84.","concerned":true},{"code":"ESRS S1","name":"Personnel de l’entreprise","color":"blue","content":"La norme ESRS S1 fait partie du volet social des normes ESRS.\n\nElle concerne les effectifs de l'entreprise et leurs conditions de travail : dialogue\nsocial, salaires décents, formation, inclusivité, santé et sécurité, équilibre vie\nprofessionnelle/vie privée...\n\nLa norme s'applique au « personnel propre » de l'entreprise : les salariés, les\nintérimaires et les travailleurs extérieurs ayant conclu un contrat de prestation\nde service. Les travailleurs de la chaîne de valeur ne sont pas pris en compte ici\ncar ils font l'objet de la norme ESRS S2.\n\nESRS S1 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 17 et le nombre de\npoints de données (indicateurs) est de 190.","concerned":true},{"code":"ESRS S2","name":"Travailleurs dans la chaîne de valeur","color":"blue","content":"ESRS S2 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 17 et le nombre de\npoints de données (indicateurs) est de 190.","concerned":true},{"code":"ESRS S3","name":"Communautés affectées","color":"blue","content":"ESRS S3 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 17 et le nombre de\npoints de données (indicateurs) est de 190.","concerned":true},{"code":"ESRS S4","name":"Consommateurs et utilisateurs finaux","color":"blue","content":"ESRS S4 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 17 et le nombre de\npoints de données (indicateurs) est de 190.","concerned":true},{"code":"ESRS G1","name":"Conduite responsable des entreprises","color":"orange","content":"ESRS S4 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 17 et le nombre de\npoints de données (indicateurs) est de 190.","concerned":true}
        ];

    var jsonData = JSON.stringify(data);
    localStorage.setItem("esrsConcernes", jsonData);
</script>

<div class="container">
    <form method="POST" action="questionaireV2.php?step=<?= $step ?>" id="multiStepForm">
        <?php if ($step == 1): ?>
            <h2>1. Bienvenue chez ETIPLANET 🌎 Vous êtes :</h2>
            <div class="option">
                <input type="radio" id="TPE" name="type" value="TPE" <?= (isset($form_data['type']) && $form_data['type'] == 'TPE') ? 'checked' : '' ?>>
                <label for="TPE">TPE (1 - 9 Collaborateurs)</label>
            </div>
            <div class="option">
                <input type="radio" id="PME" name="type" value="PME" <?= (isset($form_data['type']) && $form_data['type'] == 'PME') ? 'checked' : '' ?>>
                <label for="PME">PME (10 - 249 Collaborateurs)</label>
            </div>
            <div class="option">
                <input type="radio" id="ETI" name="type" value="ETI" <?= (isset($form_data['type']) && $form_data['type'] == 'ETI') ? 'checked' : '' ?>>
                <label for="ETI">ETI (250 - 5000 Collaborateurs)</label>
            </div>
            <div class="option">
                <input type="radio" id="Grands Groupes" name="type" value="Grands Groupes" <?= (isset($form_data['type']) && $form_data['type'] == 'Grands Groupes') ? 'checked' : '' ?>>
                <label for="Grands Groupes">Grands Groupes ( >5000 Collaborateurs)</label>
            </div>
        <?php elseif ($step == 2): ?>
            <h2>2. 🤩 Super ! Quelle est votre secteur d'activité ? </h2>
            <div class="options-container">
                <div class="option">
                    <input type="radio" id="A" name="sector" value="Construction & Immobilier" <?= (isset($form_data['sector']) && $form_data['sector'] == 'Construction & Immobilier') ? 'checked' : '' ?>>
                    <label for="A">Construction & Immobilier</label>
                </div>
                <div class="option">
                    <input type="radio" id="B" name="sector" value="Conseil & Service" <?= (isset($form_data['sector']) && $form_data['sector'] == 'Conseil & Service') ? 'checked' : '' ?>>
                    <label for="B">Conseil & Service</label>
                </div>
                <div class="option">
                    <input type="radio" id="C" name="sector" value="Énergie & Environnement" <?= (isset($form_data['sector']) && $form_data['sector'] == 'Énergie & Environnement') ? 'checked' : '' ?>>
                    <label for="C">Énergie & Environnement</label>
                </div>
                <div class="option">
                    <input type="radio" id="D" name="sector" value="Événement & Tourisme" <?= (isset($form_data['sector']) && $form_data['sector'] == 'Événement & Tourisme') ? 'checked' : '' ?>>
                    <label for="D">Événement & Tourisme</label>
                </div>
                <div class="option">
                    <input type="radio" id="E" name="sector" value="Finance" <?= (isset($form_data['sector']) && $form_data['sector'] == 'Finance') ? 'checked' : '' ?>>
                    <label for="E">Finance</label>
                </div>
                <div class="option">
                    <input type="radio" id="F" name="sector" value="Agroalimentaire" <?= (isset($form_data['sector']) && $form_data['sector'] == 'Agroalimentaire') ? 'checked' : '' ?>>
                    <label for="F">Agroalimentaire</label>
                </div>
                <div class="option">
                    <input type="radio" id="G" name="sector" value="Santé" <?= (isset($form_data['sector']) && $form_data['sector'] == 'Santé') ? 'checked' : '' ?>>
                    <label for="G">Santé</label>
                </div>
                <div class="option">
                    <input type="radio" id="H" name="sector" value="Assurance" <?= (isset($form_data['sector']) && $form_data['sector'] == 'Assurance') ? 'checked' : '' ?>>
                    <label for="H">Assurance</label>
                </div>
                <div class="option">
                    <input type="radio" id="I" name="sector" value="Logistique & Mobilité" <?= (isset($form_data['sector']) && $form_data['sector'] == 'Logistique & Mobilité') ? 'checked' : '' ?>>
                    <label for="I">Logistique & Mobilité</label>
                </div>
                <div class="option">
                    <input type="radio" id="J" name="sector" value="Industrie" <?= (isset($form_data['sector']) && $form_data['sector'] == 'Industrie') ? 'checked' : '' ?>>
                    <label for="J">Industrie</label>
                </div>
                <div class="option">
                    <input type="radio" id="K" name="sector" value="Média & Communication" <?= (isset($form_data['sector']) && $form_data['sector'] == 'Média & Communication') ? 'checked' : '' ?>>
                    <label for="K">Média & Communication</label>
                </div>
                <div class="option">
                    <input type="radio" id="L" name="sector" value="Service Publique & Éducation" <?= (isset($form_data['sector']) && $form_data['sector'] == 'Service Publique & Éducation') ? 'checked' : '' ?>>
                    <label for="L">Service Publique & Éducation</label>
                </div>
                <div class="option">
                    <input type="radio" id="M" name="sector" value="Retail & E-Commerce" <?= (isset($form_data['sector']) && $form_data['sector'] == 'Retail & E-Commerce') ? 'checked' : '' ?>>
                    <label for="M">Retail & E-Commerce</label>
                </div>
                <div class="option">
                    <input type="radio" id="N" name="sector" value="Technologie & IT" <?= (isset($form_data['sector']) && $form_data['sector'] == 'Technologie & IT') ? 'checked' : '' ?>>
                    <label for="N">Technologie & IT</label>
                </div>
            </div>
        <?php elseif ($step == 3): ?>
            <h2>Step 2: Enter your details</h2>
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($form_data['name'] ?? '') ?>"><br>
            <label for="surname">Prénom:</label>
            <input type="text" id="surname" name="surname" value="<?= htmlspecialchars($form_data['surname'] ?? '') ?>"><br>
        <?php elseif ($step == 4): ?>
            <h2>Step 2: Enter your details</h2>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($form_data['email'] ?? '') ?>"><br>
            <label for="phone">Numéro de téléphone:</label>
            <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($form_data['phone'] ?? '') ?>"><br>
        <?php elseif ($step == 5): ?>
            <h2>Step 4: Confirm your details</h2>
            <p>Entreprise: <?= htmlspecialchars($form_data['type'] ?? '') ?></p>
            <p>Secteur: <?= htmlspecialchars($form_data['sector'] ?? '') ?></p>
            <p>Nom: <?= htmlspecialchars($form_data['name'] ?? '') ?></p>
            <p>Prénom: <?= htmlspecialchars($form_data['surname'] ?? '') ?></p>
            <p>Numéro de téléphone: <?= htmlspecialchars($form_data['phone'] ?? '') ?></p>
            <p>Email: <?= htmlspecialchars($form_data['email'] ?? '') ?></p>
        <?php elseif ($step == 6): ?>
            <h2>Step 4: Accept the Terms and Conditions</h2>
            <div class="option">
                <input type="checkbox" id="terms" name="terms" <?= (isset($form_data['terms']) && $form_data['terms']) ? 'checked' : '' ?> required>
                <label for="terms">I accept the <a href="#">terms and conditions</a></label>
            </div>
        <?php endif; ?>
        <button type="submit" id="nextButton">Next</button>
    </form>
</div>



<script>
    document.getElementById('multiStepForm').addEventListener('submit', function(event) {
        var data = [
            {"code":"ESRS E1","name":"Changement climatique","color":"green","content":"ESRS E1 est la première norme du volet environnemental des normes ESRS. Elle a\npour objet le changement climatique.\n\nElle recouvre 3 sujets : l'atténuation du changement climatique, l'adaptation à\nses effets via la réduction des émissions de gaz à effet de serre, ainsi que la\nquestion de l'énergie.\n\nPour satisfaire à cet ESRS E1, les entreprises concernées doivent fournir des\ninformations complètes sur l'impact du changement climatique sur leurs\nactivités et expliquer comment elles anticipent et s’adaptent au réchauffement\nclimatique.\n\nElles doivent aussi expliquer leur plan d’action pour atteindre un objectif en\ntermes d’émissions de gaz à effet de serre compatible avec un scénario à\nmaximum + 1,5°C prévu par les Accords de Paris.\n\nUne entreprise qui choisit de ne pas faire figurer le volet climat dans son\nreporting doit justifier que ce sujet ne la concerne pas. En pratique, il sera très\ndifficile voire impossible pour les entreprises de ne pas reporter sur le volet\nclimat puisque la plupart voire la totalité des activités humaines conduisent à\némettre des gaz à effet de serre.\n\nESRS E1 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 9 et le nombre de points\nde données (indicateurs) est de 220.","concerned":true},{"code":"ESRS E2","name":"Pollution","color":"green","content":"La norme ESRS E2 est la deuxième norme du volet environnemental des ESRS.\nElle aborde la question centrale de la pollution de l'air, de l'eau et du sol. Elle\nexige également des entreprises qu'elles communiquent sur les substances\npréoccupantes et extrêmement préoccupantes qu'elles utilisent ou produisent.\n\nESRS E2 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 6 et le nombre de points\nde données (indicateurs) est de 68.","concerned":true},{"code":"ESRS E3","name":"Ressources aquatiques et marines","color":"green","content":"Dans la lutte contre le réchauffement climatique, et la création d'une économie\nplus durable, les ressources en eau et les ressources marines occupent une place\ncruciale. C'est donc pour cela que l’ESRS E3 est dédié à cette thématique.\n\nLa norme a pour objet les eaux de surface (fleuves, lacs, eaux de ruissellement,\nmers et océans, zones humides...) et les eaux souterraines (qui se trouvent sous\nle sol dans les aquifères). Elle s'intéresse notamment à leur utilisation, à leur\nrejet et aux activités économiques liées à la mer.\n\nLes informations à communiquer portent sur :\n\n- La façon dont l'entreprise affecte l'eau et les ressources marines via son\nactivité, qu'il s'agisse d'un impact positif, négatif, réels ou potentiels\n\n- Les mesures prises pour réduire l'impact négatif de l'activité sur les ressources\naquatiques et marines, y compris en ce qui concerne la réduction de la\nconsommation d’eau\n\n- Une planification de la façon dont l'entreprise peut adapter sa stratégie ou son\nmodèle, pour réduire son impact et valoriser les ressources marines,\n\n- Pointer les risques et opportunités financières du point de vue des ressources\nen eau et des ressources marines.\n\nESRS E3 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 5 et le nombre de points\nde données (indicateurs) est de 48.","concerned":true},{"code":"ESRS E4","name":"Biodiversité & écosystèmes","color":"green","content":"La norme ESRS E4 a pour objet les habitats terrestres, marins et d'eau douce,\nainsi que la diversité de la faune et de la flore. Elle vise à permettre de\ncomprendre :\n\n- les incidences positives et négatives, réelles comme potentielles, de\nl’entreprise sur la biodiversité et les écosystèmes, ainsi que la mesure dans\nlaquelle cette dernière contribue aux facteurs de perte et de dégradation de la\nbiodiversité et des écosystèmes ;\n\n- les actions menées pour prévenir ou atténuer les impacts négatifs, protéger et\nrestaurer la biodiversité et les écosystèmes, ainsi que traiter les risques et\nopportunités ;\n\n- les plans et la capacité de l’entreprise à adapter sa stratégie et son modèle\néconomique conformément aux éléments cités dans la notice ;\n\n- la nature, le type et l’ampleur des risques, dépendances et opportunités liés à\nla\n\nbiodiversité et aux écosystèmes, ainsi que la manière dont l’entreprise les gère ;\n\n- les incidences financières sur l’entreprise, à court, moyen et long terme, des\nrisques et opportunités liés aux incidences et dépendances de l’entreprise vis-\nà-vis de la biodiversité et des écosystèmes.\n\nESRS E4 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 6 et le nombre de points\nde données (indicateurs) est de 120.","concerned":true},{"code":"ESRS E5","name":"Utilisation des ressources & économie circulaire","color":"green","content":"la norme ESRS E5 a pour objet de permettre aux investisseurs d'évaluer si\nl'entreprise optimise ses ressources, et œuvre en faveur d'une économie\ncirculaire. C'est une thématique clé en matière de durabilité. Les informations\ncommuniquées concernent :\n\n- Le bilan de l'utilisation des ressources, y compris des ressources non\nrenouvelables (entrées et sorties de ressources ainsi que des déchets générés\npar le fonctionnement de l'entreprise),\n\n- Les mesures prises par l'entreprise pour économiser des ressources ou\ncontribuer à une économie circulaire (notions de hiérarchisation des déchets et\nde recyclage),\n\n- Les risques et les opportunités pour l'activité, comme une éventuelle possibilité\nde rupture de matière non renouvelable.\n\nESRS E5 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 6 et le nombre de points\nde données (indicateurs) est de 84.","concerned":true},{"code":"ESRS S1","name":"Personnel de l’entreprise","color":"blue","content":"La norme ESRS S1 fait partie du volet social des normes ESRS.\n\nElle concerne les effectifs de l'entreprise et leurs conditions de travail : dialogue\nsocial, salaires décents, formation, inclusivité, santé et sécurité, équilibre vie\nprofessionnelle/vie privée...\n\nLa norme s'applique au « personnel propre » de l'entreprise : les salariés, les\nintérimaires et les travailleurs extérieurs ayant conclu un contrat de prestation\nde service. Les travailleurs de la chaîne de valeur ne sont pas pris en compte ici\ncar ils font l'objet de la norme ESRS S2.\n\nESRS S1 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 17 et le nombre de\npoints de données (indicateurs) est de 190.","concerned":true},{"code":"ESRS S2","name":"Travailleurs dans la chaîne de valeur","color":"blue","content":"ESRS S2 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 17 et le nombre de\npoints de données (indicateurs) est de 190.","concerned":true},{"code":"ESRS S3","name":"Communautés affectées","color":"blue","content":"ESRS S3 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 17 et le nombre de\npoints de données (indicateurs) est de 190.","concerned":true},{"code":"ESRS S4","name":"Consommateurs et utilisateurs finaux","color":"blue","content":"ESRS S4 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 17 et le nombre de\npoints de données (indicateurs) est de 190.","concerned":true},{"code":"ESRS G1","name":"Conduite responsable des entreprises","color":"orange","content":"ESRS S4 prévoit un ensemble de données qui doivent être publiées par\nl'entreprise dans son rapport de durabilité. Ces exigences de divulgation\n(disclosure requirements ou « DR ») sont au nombre de 17 et le nombre de\npoints de données (indicateurs) est de 190.","concerned":true}
            ];

        const formElements = this.elements;
        const formData = JSON.parse(localStorage.getItem('user')) || {};

        for (let i = 0; i < formElements.length; i++) {
            const element = formElements[i];
            if (element.type !== 'submit') {
                formData[element.name] = element.value;
            }
        }

        localStorage.setItem('user', JSON.stringify(formData));


        var jsonData = JSON.stringify(data);
        localStorage.setItem("esrsConcernes", jsonData);

        this.submit();
    });

</script>



</body>
</html>



<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
    }

    h2 {
        font-size: 1.5em;
        margin-bottom: 1em;
    }

    .option {
        margin-bottom: 1em;
        border-radius: 4px;
        display: flex;
        align-items: center;
    }

    .option input {
        display: none;
    }

    .option label {
        padding: 10px;
        background-color: #e0f7fa;
        border: 2px solid transparent;
        border-radius: 4px;
        width: 100%;
        cursor: pointer;
        font-size: 1em;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .option input:checked + label {
        background-color: #b2ebf2;
        border-color: #00bcd4;
    }

    .options-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .option {
        flex: 1 1 calc(50% - 10px);
    }

    label {
        display: block;
        margin-top: 1em;
        font-size: 1em;
    }

    input[type="text"], input[type="email"] {
        width: calc(100% - 22px);
        padding: 10px;
        margin-top: 0.5em;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #6200ea;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 1em;
        cursor: pointer;
        margin-top: 1em;
    }

    button:hover {
        background-color: #3700b3;
    }

</style>
