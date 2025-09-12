<?php
include ('../../config.php');
session_start();

$id_cliente      = $_POST['id_cliente'] ?? null;
$nombre_cliente  = trim($_POST['nombre_cliente'] ?? '');
$nit_ci_cliente  = trim($_POST['nit_ci_cliente'] ?? '');
$celular_cliente = trim($_POST['celular_cliente'] ?? '');
$email_cliente   = trim($_POST['email_cliente'] ?? '');

if (!$id_cliente || !$nombre_cliente || !$nit_ci_cliente) {
    $_SESSION['mensaje'] = "Faltan datos obligatorios";
    $_SESSION['icono'] = "warning";
    header("Location: ".$URL."/clientes/");
    exit;
}

try {
    $sentencia = $pdo->prepare("UPDATE tb_clientes 
        SET nombre_cliente = :nombre_cliente,
            nit_ci_cliente = :nit_ci_cliente,
            celular_cliente = :celular_cliente,
            email_cliente = :email_cliente
        WHERE id_cliente = :id_cliente");

    $sentencia->bindParam(':nombre_cliente', $nombre_cliente);
    $sentencia->bindParam(':nit_ci_cliente', $nit_ci_cliente);
    $sentencia->bindParam(':celular_cliente', $celular_cliente);
    $sentencia->bindParam(':email_cliente', $email_cliente);
    $sentencia->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);

    if ($sentencia->execute()) {
        $_SESSION['mensaje'] = "Cliente actualizado correctamente";
        $_SESSION['icono'] = "success";
    } else {
        $_SESSION['mensaje'] = "Error al actualizar cliente";
        $_SESSION['icono'] = "error";
    }
} catch (PDOException $e) {
    $_SESSION['mensaje'] = "Error: ".$e->getMessage();
    $_SESSION['icono'] = "error";
}

header("Location: ".$URL."/clientes/");
exit;
