


<?php
require_once('../../TCPDF-main/tcpdf.php');
include('../../config.php');

// Crear nuevo PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Información del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tu Empresa');
$pdf->SetTitle('Cotización');
$pdf->SetSubject('Factura / Cotización');
$pdf->SetKeywords('Factura, Cotización, PDF');

// Quitar header/footer automáticos
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Márgenes
$pdf->SetMargins(10, 10, 10);
$pdf->SetAutoPageBreak(TRUE, 10);

// Agregar página
$pdf->AddPage();

// ------------------- DATOS DE PRUEBA -------------------
$empresa = [
    'nombre' => 'A & M GLOBAL SOLUTIONS COMPANY S.A.C.',
    'ruc' => '20611753994',
    'direccion' => 'Av. Ejemplo 123, Lima - Perú',
    'telefono' => '999-999-999',
    'email' => 'ventas@empresa.com',
];

$cliente = [
    'nombre' => 'KIT DE B/55900',
    'direccion' => 'Dirección Cliente',
    'telefono' => '999-000-000',
    'correo' => 'cliente@correo.com',
    'fecha_emision' => date('d/m/Y'),
];

$items = [
    ['cant' => 3, 'desc' => 'Panel Solar Bifacial Monocristalino TENSTE 610W 24V TYPE N', 'unit' => 450.00, 'total' => 1350.00],
    ['cant' => 1, 'desc' => 'Inversor Cargador 3500W 24V MPPT 100AH SUNGIFT MICROS', 'unit' => 1190.00, 'total' => 1190.00],
    ['cant' => 2, 'desc' => 'Batería Solar GEL 12V-250AH TENSTE', 'unit' => 1120.00, 'total' => 2240.00],
];

$total_general = 5840.00;

// ------------------- DISEÑO HTML -------------------
$html = '
<style>
    .titulo { font-size:16px; font-weight:bold; color:#006600; }
    .table { border-collapse: collapse; width: 100%; }
    .table th, .table td {
        border: 1px solid #000;
        padding: 4px;
        font-size: 10px;
    }
    .right { text-align: right; }
    .center { text-align: center; }
</style>

<table width="100%">
    <tr>
        <td width="50%">
            <img src="logo.png" height="50"><br>
            <strong>'.$empresa['nombre'].'</strong><br>
            RUC: '.$empresa['ruc'].'<br>
            Dirección: '.$empresa['direccion'].'<br>
            Tel: '.$empresa['telefono'].'<br>
            Email: '.$empresa['email'].'
        </td>
        <td width="50%" align="right" style="border:1px solid #000;">
            <strong>RUC: '.$empresa['ruc'].'</strong><br>
            <span class="titulo">COTIZACIÓN</span><br>
            Nº 010853-2025
        </td>
    </tr>
</table>
<br><br>

<table width="100%">
    <tr>
        <td width="50%">
            <strong>Cliente:</strong> '.$cliente['nombre'].'<br>
            <strong>Dirección:</strong> '.$cliente['direccion'].'<br>
            <strong>Teléfono:</strong> '.$cliente['telefono'].'<br>
            <strong>Correo:</strong> '.$cliente['correo'].'
        </td>
        <td width="50%">
            <strong>Fecha Emisión:</strong> '.$cliente['fecha_emision'].'<br>
            <strong>Moneda:</strong> SOLES<br>
            <strong>Validez:</strong> 15 días
        </td>
    </tr>
</table>
<br><br>

<table class="table">
    <tr>
        <th width="5%">#</th>
        <th width="10%">Cant</th>
        <th width="55%">Descripción</th>
        <th width="15%">P. Unit</th>
        <th width="15%">Total</th>
    </tr>';

$i = 1;
foreach ($items as $item) {
    $html .= '
    <tr>
        <td class="center">'.$i.'</td>
        <td class="center">'.$item['cant'].'</td>
        <td>'.$item['desc'].'</td>
        <td class="right">S/ '.number_format($item['unit'],2).'</td>
        <td class="right">S/ '.number_format($item['total'],2).'</td>
    </tr>';
    $i++;
}

$html .= '
    <tr>
        <td colspan="4" class="right"><strong>TOTAL</strong></td>
        <td class="right"><strong>S/ '.number_format($total_general,2).'</strong></td>
    </tr>
</table>
<br><br>

<small><strong>Notas:</strong><br>
- Incluye servicio de preinstalado y montaje de caja IP66.<br>
- Incluye servicio de ayuda remota de instalación del kit solar.<br>
</small>
';

// Generar el contenido HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Salida del PDF
$pdf->Output('cotizacion.pdf', 'I');

