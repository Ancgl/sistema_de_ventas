 <?php
// Incluye la librería principal TCPDF
require_once('../app/TCPDF-main/tcpdf.php');
include('../app/config.php');

$id_venta_get = $_GET['id_venta'];
$nro_venta_get = $_GET['nro_venta'];

// crea un nuevo documento PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(215, 279), true, 'UTF-8', false);

// información del documento
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Sistema de Venta');
$pdf->setTitle('Sistema de Venta');
$pdf->setSubject('Sistema de Venta');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// desactiva encabezado y pie predeterminados
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// establece la fuente monoespaciada predeterminada
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// márgenes
$pdf->setMargins(10, 10, 10);

// saltos automáticos de página
$pdf->setAutoPageBreak(true, 5);

// factor de escala de imagen
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// cadenas dependientes del idioma (opcional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// establece la fuente
$pdf->setFont('helvetica', '', 7);

// agrega una página
$pdf->AddPage();

// contenido HTML
$html = '
<table border="0" style="font-size: 10px;">
  <tr>
    <td style="text-align: center; width: 200px"> 
      <b>Sistema de Ventas Ancgl</b> <br>
      av.alcazar morod de arica 512 <br>
      00000001 - 65688827 <br>
      Lima - PERU
    </td>
    <td style="width: 200px"></td>
    <td style="font-size: 16px; width: 290px">
      <b>RUC:</b> 2045272720 <br>
      <b>Nro Factura:</b> 00001 <br>
      <b>Nro de Autorizacion:</b> 102983638
    </td>
  </tr>
</table>

<p style="text-align: center; font-size: 25px;"><b>FACTURA</b></p>

<div>
  <table>
    <tr>
      <td><b>Fecha:</b> </td>
    </tr>
  </table>
</div>

';

// escribe el contenido HTML
$pdf->writeHTML($html, true, false, true, false, '');

// estilo para el código QR
$style = array(
    'border' => 0,
    'vpadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1,  // ancho de módulo en puntos
    'module_height' => 1  // alto de módulo en puntos
);

$QR = 'Factura realizada por el sistema de ventas Cristiam Ancgl, al cliente Jhon Angl con Dni: 65478231
con el vehiculo con numero de placa 396-RDD y esta factura se genero en 02 de agosto de 2025 a hr: 14:30';

$pdf->write2DBarcode($QR, 'QRCODE,L', 22, 105, 35, 35, $style);

// limpia el buffer antes de generar el PDF
if (ob_get_length()) {
    ob_end_clean();
}

// genera y envía el PDF al navegador
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
