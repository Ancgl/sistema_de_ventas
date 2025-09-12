<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

// Controlador que obtiene los datos del cliente
include ('../app/controllers/clientes/update_cliente.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar cliente</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-5">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos con cuidado</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-12">

                                    <form action="../app/controllers/clientes/update.php" method="post">
                                        <input type="text" name="id_cliente" value="<?php echo $id_cliente_get; ?>" hidden>

                                        <div class="form-group">
                                            <label for="">Nombre completo</label>
                                            <input type="text" name="nombre_cliente" class="form-control"
                                                   value="<?php echo $nombre_cliente; ?>"
                                                   placeholder="Escriba aquí el nombre del cliente..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Documento (CI/NIT)</label>
                                            <input type="text" name="nit_ci_cliente" class="form-control"
                                                   value="<?php echo $nit_ci_cliente; ?>"
                                                   placeholder="Documento de identidad o NIT..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="text" name="celular_cliente" class="form-control"
                                                   value="<?php echo $celular_cliente; ?>"
                                                   placeholder="Número de contacto del cliente">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Correo electrónico</label>
                                            <input type="email" name="email_cliente" class="form-control"
                                                   value="<?php echo $email_cliente; ?>"
                                                   placeholder="Correo electrónico del cliente">
                                        </div>

                                        <hr>
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-warning">Actualizar</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>
