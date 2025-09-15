 <?php
// Ejemplo de datos dinámicos (puedes traerlos desde tu BD)
$empresa = [
    "ruc" => "20611753994",
    "razon" => "A & M GLOBAL SOLUTIONS COMPANY S.A.C.",
    "atencion" => "Cristian Abel",
    "telefono" => "999742648",
    "email" => "amglobalsolutions@solarcityperu.com",
    "condicion" => "Contado/Transfer.",
    "entrega" => "10-12 días",
    "garantia" => "12 meses"
];

$cliente = [
    "nombre" => "Nuevo Cliente",
    "otros" => "0000989",
    "direccion" => "",
    "telefono" => "",
    "email" => ""
];

$items = [
    ["CABLE SOLAR FOTOVOLTAICO NX20H 10AWG - 6MM2 NEGRO", "UND", 20, 9.00],
    ["CABLE SOLAR FOTOVOLTAICO NX20H 10AWG - 6MM2 ROJO", "UND", 20, 9.00],
    ["CONECTOR PANEL SOLAR TERMINAL MC4 TWINSEIL X PAR", "UND", 1, 18.00],
    ["TABLERO ADOSABLE METALICO IP68 600x800x300 MM", "UND", 1, 300.00],
    ["SPD DC FEED 2P 600VDC 20KA-40KA", "UND", 1, 110.00],
    ["DC INTERRUPTOR FEED 2P 63A 550VDC", "UND", 1, 95.00],
    ["AC INTERRUPTOR FEED 2P 40A 230VAC", "UND", 1, 90.00],
    ["BORNERA UNIVERSAL 10MM2 TIPO TORNILLO", "UND", 1, 15.00],
    ["CABLE UNIFILAR 50MM2 CONEXION INVERSOR - BATERIAS", "UND", 10, 18.00],
    ["ESTRUCTURA 6 PANELES 144C 40MM COPLANAR FALCAT", "UND", 1, 1800.00],
    ["REJILLA C/FILTRO 204.5x204.5 MM - RAL7035", "UND", 2, 250.00],
    ["PANEL SOLAR PULS BIFACIAL DUAL GLASS MONOCRISTALINO 580W", "UND", 10, 350.00],
    ["INVERSOR CARGADOR FELICITY SOLAR OFF-GRID 8kVA/8kW", "UND", 1, 3500.00],
    ["BATERIA 300AH 48V 15KWH LITHIUM POWER BATTERY", "UND", 1, 6890.00],
];

$total = 0;
foreach ($items as $it) {
    $total += $it[2] * $it[3];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura / Cotización</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 13px; }
        .header { display: flex; justify-content: space-between; align-items: center; }
        .header img { width: 150px; }
        .box { border: 1px solid #000; padding: 8px; margin: 5px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: center; }
        th { background: #00A65A; color: #fff; }
        .total { text-align: right; font-size: 16px; font-weight: bold; margin-top: 20px; }
        .notas { margin-top: 15px; font-size: 12px; }
        .green { background: #00A65A; color: #fff; padding: 3px 10px; }
        @media print {
            button { display: none; }
        }
    </style>
</head>
<body>

<div class="header">
    <img src="logo.png" alt="LOGO">
    <div class="box">
        <b>RUC: <?= $empresa['ruc'] ?></b><br>
        <span class="green">COTIZACIÓN</span><br>
        <b>N° 010975-2025</b>
    </div>
</div>

<div class="box">
    <b>EMISOR:</b><br>
    <?= $empresa['razon'] ?><br>
    Atención: <?= $empresa['atencion'] ?><br>
    Tel: <?= $empresa['telefono'] ?><br>
    Email: <?= $empresa['email'] ?><br>
</div>

<div class="box">
    <b>CLIENTE:</b><br>
    <?= $cliente['nombre'] ?><br>
    Código: <?= $cliente['otros'] ?><br>
    Dirección: <?= $cliente['direccion'] ?><br>
    Tel: <?= $cliente['telefono'] ?><br>
    Email: <?= $cliente['email'] ?><br>
</div>

<table>
    <tr>
        <th>#</th>
        <th>Cant.</th>
        <th>U.M.</th>
        <th>Descripción</th>
        <th>P.Unit</th>
        <th>Total</th>
    </tr>
    <?php foreach ($items as $i => $it) { ?>
    <tr>
        <td><?= $i+1 ?></td>
        <td><?= $it[2] ?></td>
        <td><?= $it[1] ?></td>
        <td style="text-align: left;"><?= $it[0] ?></td>
        <td>S/ <?= number_format($it[3],2) ?></td>
        <td>S/ <?= number_format($it[2]*$it[3],2) ?></td>
    </tr>
    <?php } ?>
</table>

<div class="total">
    TOTAL: S/ <?= number_format($total,2) ?>
</div>

<div class="notas">
    <b>Notas:</b><br>
    - Los precios no incluyen instalación.<br>
    - Equipos en stock.<br>
    - Garantía <?= $empresa['garantia'] ?>.<br>
</div>

<button onclick="window.print()">Imprimir</button>

</body>
</html>
