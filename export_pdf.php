<?php
// Inclure l'autoloader de Composer
require 'vendor/autoload.php';

// Instancier la classe Dompdf
use Dompdf\Dompdf;

// Créer une nouvelle instance de Dompdf
$dompdf = new Dompdf();

// Inclure le fichier Sous_section.php pour accéder à la variable $content
ob_start(); // Démarre la temporisation de sortie
include 'Sous_section.php'; // Exécute le fichier PHP et capture sa sortie dans le tampon de sortie
$html = ob_get_clean(); // Récupère le contenu du tampon de sortie et l'efface

// Charger le contenu HTML dans Dompdf
$dompdf->loadHtml($html);

// (Optionnel) Définir les options du PDF (par exemple, la taille du papier et l'orientation)
$dompdf->setPaper('A4', 'portrait');

// Rendre le HTML en PDF
$dompdf->render();

// Télécharger le PDF dans le navigateur
$dompdf->stream("export.pdf", array("Attachment" => false));
?>


