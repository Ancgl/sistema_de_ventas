<?php
include ('../app/config.php');
include ('../layout/sesion.php');
include ('../layout/parte1.php');

// 1. Obtener el ID del cliente desde la URL
$id_cliente = $_GET['id_cliente'] ?? null;
if (!$id_cliente) {
    $_SESSION['mensaje'] = "ID de cliente no proporcionado";
    $_SESSION['icono'] = "error";
    header("Location: index.php");
    exit;
}

// 2. Consultar datos del cliente
$sql = "SELECT * FROM tb_clientes WHERE id_cliente = :id_cliente";
$query = $pdo->prepare($sql);
$query->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
$query->execute();
$cliente = $query->fetch(PDO::FETCH_ASSOC);

if (!$cliente) {
    $_SESSION['mensaje'] = "Cliente no encontrado";
    $_SESSION['icono'] = "error";
    header("Location: index.php");
    exit;
}
?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Actualizar Cliente</h1>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Formulario de actualización</h3>
                        </div>
                        <div class="card-body">

                            <form action="../app/controllers/clientes/update_cliente.php" method="POST">
                                <input type="hidden" name="id_cliente" value="<?php echo $cliente['id_cliente']; ?>">

                                <div class="form-group">
                                    <label>Nombre del cliente</label>
                                    <input type="text" name="nombre_cliente" class="form-control" 
                                           value="<?php echo htmlspecialchars($cliente['nombre_cliente']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Documento</label>
                                    <input type="text" name="nit_ci_cliente" class="form-control" 
                                           value="<?php echo htmlspecialchars($cliente['nit_ci_cliente']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Celular</label>
                                    <input type="text" name="celular_cliente" class="form-control" 
                                           value="<?php echo htmlspecialchars($cliente['celular_cliente']); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email_cliente" class="form-control" 
                                           value="<?php echo htmlspecialchars($cliente['email_cliente']); ?>">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>
