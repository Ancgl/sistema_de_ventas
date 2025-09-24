 <?php
include ('../app/config.php');

$id_venta_get = isset($_GET['id_venta']) ? $_GET['id_venta'] : null;
if (!$id_venta_get) die("ID de venta no especificado");

$sql_venta = "SELECT 
                v.nro_venta,
                v.total_pagado,
                v.fyh_creacion,
                c.nombre_cliente,
                c.nit_ci_cliente,
                c.celular_cliente,
                c.email_cliente
              FROM tb_ventas v
              INNER JOIN tb_clientes c ON v.id_cliente = c.id_cliente
              WHERE v.id_venta = :id_venta";
$query_venta = $pdo->prepare($sql_venta);
$query_venta->bindParam(':id_venta', $id_venta_get, PDO::PARAM_INT);
$query_venta->execute();
$venta = $query_venta->fetch(PDO::FETCH_ASSOC);
if (!$venta) die("Venta no encontrada");

$sql_productos = "SELECT 
                    carr.cantidad,
                    pro.nombre AS nombre_producto,
                    pro.descripcion,
                    pro.precio_venta
                  FROM tb_carrito carr
                  INNER JOIN tb_almacen pro ON carr.id_producto = pro.id_producto
                  WHERE carr.nro_venta = :nro_venta";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->bindParam(':nro_venta', $venta['nro_venta'], PDO::PARAM_INT);
$query_productos->execute();
$productos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

$empresa = [
    "ruc" => "2000000001",
    "razon" => "BODEGA DA´MART",
    "atencion" => "Cristian Ancgl",
    "telefono" => "+51 958 123 456",
    "email" => "bodegadamart@gmail.com",
    
];

$cliente = [
    "nombre" => $venta['nombre_cliente'],
    "otros" => $venta['nit_ci_cliente'],
    "telefono" => $venta['celular_cliente'],
    "email" => $venta['email_cliente']
];

$total = 0;
foreach ($productos as $producto) {
    $subtotal = floatval($producto['precio_venta']) * intval($producto['cantidad']);
    $total += $subtotal;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="robots" content="noindex, nofollow">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Factura #00<?= $venta['nro_venta']; ?> - <?= time(); ?></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
body { font-family: 'Arial', sans-serif; background: #f5f6fa; margin: 0; padding: 0; }
.container { max-width: 900px; margin: 5px auto; background: #ffffffff; padding: 70px; border-radius: 5px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
.header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
.header img { width: 120px; }
.invoice-info { background: #344cb9ff; color: #fff; 
  padding: 10px 30px; border-radius: 2px; text-align: right; position: relative; max-width: 450px;     /* lo hace más ancho */
}
.invoice-info h1 { margin: 0; font-size: 15px; }
.invoice-info span { font-weight: 400; display: block; margin-top: 2px; font-size: 13px; }
.invoice-info i { margin-right: 5px;}
.invoice-info * { text-decoration: none !important; cursor: default !important; user-select: none !important; }
.info-section { display: flex; justify-content: space-between; margin-bottom: 30px; gap: 20px; }
.info-box { flex: 1; background: #f7f9fc; padding: 10px 20px; border-radius: 2px; }
.info-box h3 { margin-top: 0; color: #000000ff; border-bottom: 2px solid #000000ff; display: inline-block; padding-bottom: 4px; }
.info-box i { color: #000000ff; margin-right: 8px; }
table { width: 100%; border-collapse: collapse; margin-top: 20px; }
th, td { padding: 14px; text-align: center; font-size: 14px; }
th { background: #344cb9ff; color: #fff; font-weight: 500; border: none; }
td { border-bottom: 1px solid #ddd; }
td.description { text-align: left; }
tr:hover { background: #f1fdf7; }
.summary { display: flex; justify-content: flex-end; margin-top: 15px; }
.summary-box { background: #344cb9ff; color: #fff; padding: 15px 20px; border-radius: 2px; font-size: 15px; font-weight: bold; display: flex; align-items: center; gap: 5px; }
.notes { margin-top: 30px; background: #f7f9fc; padding: 20px; border-left: 5px solid #344cb9ff; border-radius: 2px; font-size: 13px; }
button { padding: 12px 25px; background: #344cb9ff; border: none; color: #fff; border-radius: 2px; font-weight: bold; cursor: pointer; margin-top: 20px; display: flex; align-items: center; gap: 8px; }
button:hover { background: #344cb9ff; }
@media print { 
    button { display: none; } 
    body { background: #fff; } 
    .container { box-shadow: none; margin: 0; padding: 20px; } 
    @page { margin: 0; }
    body { -webkit-print-color-adjust: exact; }
    * { -webkit-print-color-adjust: exact !important; }
    a[href]:after { content: none !important; }
    a { text-decoration: none !important; }
    *:after { content: none !important; }
    *:before { content: none !important; }
    .invoice-info * { text-decoration: none !important; cursor: default !important; user-select: none !important; }
}
</style>
</head>
<body>
<div class="container" id="factura">
    <div class="header">
        <img src="https://static.vecteezy.com/system/resources/previews/008/214/517/non_2x/abstract-geometric-logo-or-infinity-line-logo-for-your-company-free-vector.jpg" alt="Logo Empresa" >
        <div class="invoice-info">
            <h1><center><i class="fa-solid fa-file-invoice"></i>BV / FAC</center></h1>
            <hr>
            <div style="text-align: center;">
                <div style="text-align: left; text-decoration: none !important; cursor: default !important; user-select: none !important;">N°# :  00000<?= $venta['nro_venta']; ?></div>
                <div style="text-align: left; text-decoration: none !important; cursor: default !important; user-select: none !important;">RUC: <?= $empresa['ruc'] ?></div>
                <div style="text-align: left; text-decoration: none !important; cursor: default !important; user-select: none !important;">Fecha: <?= date('d/m/Y', strtotime($venta['fyh_creacion'])); ?></div>
            </div>
        </div>
    </div>
    <div class="info-section">
        <div class="info-box">
            <h3><i class="fa fa-building"></i>Emisor</h3><br>
            <i class="" style="color: #000"></i><strong><?= $empresa['razon'] ?></strong>
            <hr>
            <i class="fa-solid fa-user"></i>Atención: <?= $empresa['atencion'] ?><br>
            <i class="fa-solid fa-phone"></i>Tel    : <?= $empresa['telefono'] ?><br>
            <i class="fa-solid fa-envelope"></i>Email  : <?= $empresa['email'] ?><br>
            
            
        </div>
        <div class="info-box">
            <h3><i class="fa-solid fa-user"></i>Cliente</h3><br>
            <strong><?= $cliente['nombre'] ?></strong><br>
            <hr>
            <i class="fa-solid fa-hashtag"></i>Documento: <?= $cliente['otros'] ?><br>
            <i class="fa-solid fa-phone"></i>Tel: <?= $cliente['telefono'] ?><br>
            <i class="fa-solid fa-envelope"></i>Email: <?= $cliente['email'] ?><br>
        </div>
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
        <?php 
        $contador = 0;
        foreach ($productos as $producto): 
            $contador++;
            $subtotal = floatval($producto['precio_venta']) * intval($producto['cantidad']);
        ?>
        <tr>
            <td><?= $contador ?></td>
            <td><?= $producto['cantidad'] ?></td>
            <td>UND</td>
            <td class="description">
                <strong><?= htmlspecialchars($producto['nombre_producto']) ?></strong><br>
                <small><?= htmlspecialchars($producto['descripcion']) ?></small>
            </td>
            <td>S/ <?= number_format(floatval($producto['precio_venta']), 2) ?></td>
            <td>S/ <?= number_format($subtotal, 2) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div class="summary">
        <div class="summary-box">
            <i class="" ></i>TOTAL : S/ <?= number_format($total, 2) ?>
        </div>
    </div>
    <div class="notes">
        <strong>Notas:</strong><br>
        - Gracias por su compra vuelva pronto.<br>
        - Revise su vuelto antes de salir.<br>
        
    </div>
    
    <button onclick="imprimirFactura()"><i class="fa-solid fa-print"></i>Imprimir</button>
    
</div>

<script>
function imprimirFactura() {
    window.print();
}
</script>
</body>
</html>