<?php
include ('../../config.php');
session_start();

$id_cliente = $_GET['id_cliente'] ?? null;

if (!$id_cliente) {
    $_SESSION['mensaje'] = "ID de cliente no proporcionado";
    $_SESSION['icono'] = "error";
    header("Location: ".$URL."/clientes/");
    exit;
}

$id_cliente = (int) $id_cliente;

try {
    $sentencia = $pdo->prepare("DELETE FROM tb_clientes WHERE id_cliente = :id_cliente");
    $sentencia->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);

    if ($sentencia->execute()) {
        $_SESSION['mensaje'] = "Cliente eliminado correctamente";
        $_SESSION['icono'] = "success";
    } else {
        $_SESSION['mensaje'] = "Error al eliminar cliente";
        $_SESSION['icono'] = "error";
    }
} catch (PDOException $e) {
    $_SESSION['mensaje'] = "Error: ".$e->getMessage();
    $_SESSION['icono'] = "error";
}

header("Location: ".$URL."/clientes/");
exit;
