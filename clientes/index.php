<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/clientes/listado_de_clientes.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Clientes Registrados</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Clientes registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body" style="display: block;">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nombres</center></th>
                                    <th><center>Documento </center></th>
                                    <th><center>Celular</center></th>
                                    <th><center>Email</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador = 0;
                                foreach ($clientes_datos as $clientes_dato){
                                    $id_cliente = $clientes_dato['id_cliente']; ?>
                                    <tr>
                                        <td><center><?php echo $contador = $contador + 1;?></center></td>
                                        <td><?php echo $clientes_dato['nombre_cliente'];?></td>
                                        <td><center><?php echo $clientes_dato['nit_ci_cliente'];?></center></td>
                                        <td><center><?php echo $clientes_dato['celular_cliente'];?></center></td>
                                        <td><?php echo $clientes_dato['email_cliente'];?></td>
                                        <td>
                                            
                                            <center>
                                                <a href="update.php?id_cliente=<?php echo $id_cliente; ?>" class="btn" style="background-color: #ffae00ff; color: #fff; border: none;"><i class="fa fa-pencil-alt"></i> </a>
                                                <a href="delete.php?id_cliente=<?php echo $id_cliente;?>" class="btn bnt-circle" style="background-color: #f80303ff; color: #f3f1f1ff; border: none;"><i class="fa fa-trash"></i> </a>
                                            </center>
                                           

                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                                
                            </table>
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

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Clientes",
                "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Clientes",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [
                    {text: 'Copiar', extend: 'copy'},
                    {extend: 'pdf'},
                    {extend: 'csv'},
                    {extend: 'excel'},
                    {text: 'Imprimir', extend: 'print'}
                ]
            },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
