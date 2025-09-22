<?php
require '../vendor/autoload.php'; // Ajusta la ruta según tu proyecto

use Dompdf\Dompdf;
use Dompdf\Options;

// Configurar Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true); // permite cargar imágenes externas
$options->set('defaultFont', 'Arial'); // fuente compatible
$dompdf = new Dompdf($options);

// Capturamos el HTML de factura.php
ob_start();
include "factura.php"; // reutiliza el HTML de tu factura
$html = ob_get_clean();

// Cargar contenido en Dompdf
$dompdf->loadHtml($html);

// Configurar tamaño y orientación
$dompdf->setPaper('A4', 'portrait');

// Renderizar PDF
$dompdf->render();

// Mostrar PDF en el navegador (con opción de descarga)
$dompdf->stream("factura.pdf", ["Attachment" => false]);
// Si quieres que descargue automáticamente: pon ["Attachment" => true]
