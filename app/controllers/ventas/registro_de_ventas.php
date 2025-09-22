<?php
include('../../config.php');

$nro_venta = $_GET['nro_venta'];
$id_cliente = $_GET['id_cliente'];
$total_a_cancelar = $_GET['total_a_cancelar'];

$fechaHora = date('Y-m-d H:i:s');

try {
    $pdo->beginTransaction();

    $sentencia = $pdo->prepare("INSERT INTO tb_ventas
        (nro_venta, id_cliente, total_pagado, fyh_creacion, fyh_actualizacion)
        VALUES (:nro_venta, :id_cliente, :total_pagado, :fyh_creacion, :fyh_actualizacion)");

    $sentencia->bindParam(':nro_venta', $nro_venta);
    $sentencia->bindParam(':id_cliente', $id_cliente);
    $sentencia->bindParam(':total_pagado', $total_a_cancelar);
    $sentencia->bindParam(':fyh_creacion', $fechaHora);
    $sentencia->bindParam(':fyh_actualizacion', $fechaHora);

    $sentencia->execute();
    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Se registró la venta correctamente";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas";
    </script>
    <?php
} catch (PDOException $e) {
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error al registrar la venta";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php";
    </script>
    <?php
}
