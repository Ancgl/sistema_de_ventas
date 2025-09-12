<?php
require_once('../app/TCPDF-main/tcpdf.php');
include('../app/config.php');

$id_venta_get = $_GET['id_venta'];
$nro_venta_get = $_GET['nro_venta'];

// (ejemplo) consulta de datos de la venta, cliente y productos
$sql = "SELECT v.fecha_venta, c.nombre_cliente, c.nit_ci_cliente, c.celular_cliente, c.email_cliente,
               p.nombre_producto, dv.cantidad, dv.precio
        FROM tb_ventas v
        JOIN tb_clientes c ON v.id_cliente = c.id_cliente
        JOIN tb_detalle_ventas dv ON v.id_venta = dv.id_venta
        JOIN tb_productos p ON dv.id_producto = p.id_producto
        WHERE v.id_venta = :id_venta";

$query = $pdo->prepare($sql);
$query->bindParam(':id_venta', $id_venta_get, PDO::PARAM_INT);
$query->execute();
$ventas_datos = $query->fetchAll(PDO::FETCH_ASSOC);

$venta = $ventas_datos[0]; // datos generales
$fecha = date("d/m/Y H:i");

// --- PDF ---
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();
$pdf->setFont('helvetica', '', 10);

// Encabezado moderno
$html = '
<style>
h1 { color:#2F5597; text-align:center; }
.table-header td { background-color:#2F5597; color:#fff; font-weight:bold; }
.table-products th { background-color:#f2f2f2; }
</style>

<table border="0" cellpadding="4">
  <tr>
    <td width="60%">
      <b style="font-size:14px;">Sistema de Ventas Ancgl</b><br>
      Av. Alcázar Morod de Arica 512<br>
      Lima - PERÚ
    </td>
    <td width="40%" align="right">
      <b>RUC:</b> 2045272720 <br>
      <b>Factura Nro:</b> '.$nro_venta_get.' <br>
      <b>Fecha:</b> '.$fecha.'
    </td>
  </tr>
</table>

<h1>FACTURA</h1>

<table border="0" cellpadding="4">
  <tr>
    <td><b>Cliente:</b> '.$venta['nombre_cliente'].'</td>
    <td><b>Documento:</b> '.$venta['nit_ci_cliente'].'</td>
  </tr>
  <tr>
    <td><b>Celular:</b> '.$venta['celular_cliente'].'</td>
    <td><b>Email:</b> '.$venta['email_cliente'].'</td>
  </tr>
</table>

<br><br>

<table border="1" cellspacing="0" cellpadding="4" class="table-products">
  <thead>
    <tr>
      <th width="10%">Cant.</th>
      <th width="50%">Producto</th>
      <th width="20%">Precio</th>
      <th width="20%">Total</th>
    </tr>
  </thead>
  <tbody>';

$total_general = 0;
foreach ($ventas_datos as $item) {
    $subtotal = $item['cantidad'] * $item['precio'];
    $total_general += $subtotal;
    $html .= '
    <tr>
      <td>'.$item['cantidad'].'</td>
      <td>'.$item['nombre_producto'].'</td>
      <td align="right">'.number_format($item['precio'],2).'</td>
      <td align="right">'.number_format($subtotal,2).'</td>
    </tr>';
}

$html .= '
  </tbody>
</table>

<br><br>
<table border="0" cellpadding="4">
  <tr>
    <td width="70%"></td>
    <td width="30%" style="font-size:12px;">
      <b>Total: S/ '.number_format($total_general,2).'</b>
    </td>
  </tr>
</table>
';

$pdf->writeHTML($html, true, false, true, false, '');

// QR con datos dinámicos
$qr_text = "Factura Nro: $nro_venta_get \nCliente: ".$venta['nombre_cliente']."\nTotal: S/ ".number_format($total_general,2)."\nFecha: $fecha";
$style = array('border' => 0, 'vpadding' => 'auto', 'hpadding' => 'auto', 'fgcolor' => array(0,0,0), 'bgcolor' => false);
$pdf->write2DBarcode($qr_text, 'QRCODE,H', 160, 220, 40, 40, $style);

// salida
if (ob_get_length()) ob_end_clean();
$pdf->Output('factura_'.$nro_venta_get.'.pdf', 'I');
