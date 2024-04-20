<?php
// Inclure l'autoloader de Composer
require 'vendor/autoload.php';

// Instancier la classe Dompdf
use Dompdf\Dompdf;

// Créer une nouvelle instance de Dompdf
$dompdf = new Dompdf();

// Charger votre HTML dans Dompdf
$html = file_get_contents('Sous_Section.php');
$dompdf->loadHtml($html);

// (Optionnel) Définir les options du PDF (par exemple, la taille du papier et l'orientation)
$dompdf->setPaper('A4', 'portrait');

// Rendre le HTML en PDF
$dompdf->render();

// Télécharger le PDF dans le navigateur
$dompdf->stream("export.pdf", array("Attachment" => false));
?>
