<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');


include ('../app/controllers/compras/listado_de_compras.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de compras actualizado</h1>
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
                            <h3 class="card-title">Compras registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <div class="table table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th><center>Nro</center></th>
                                        <th><center>Nro de la compra</center></th>
                                        <th><center>Producto</center></th>
                                        <th><center>Fecha de compra</center></th>
                                        <th><center>Proveedor</center></th>
                                        <th><center>Comprobante</center></th>
                                        <th><center>Usuario</center></th>
                                        <th><center>Precio compra</center></th>
                                        <th><center>Cantidad</center></th>
                                        <th><center>Acciones</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($compras_datos as $compras_dato){
                                        $id_compra = $compras_dato['id_compra']; ?>
                                        <tr>
                                            <td><?php echo $contador = $contador + 1;?></td>
                                            <td><?php echo $compras_dato['nro_compra'];?></td>
                                            <td><?php echo $compras_dato['nombre_producto'];?></td>
                                            <td><?php echo $compras_dato['fecha_compra'];?></td>
                                            <td><?php echo $compras_dato['nombre_proveedor'];?></td>
                                            <td><?php echo $compras_dato['comprobante'];?></td>
                                            <td><?php echo $compras_dato['nombres_usuario'];?></td>
                                            <td><?php echo $compras_dato['precio_compra'];?></td>
                                            <td><?php echo $compras_dato['cantidad'];?></td>
                                            <td>                                                
                                                <center>
                                                    <a href="show.php?id=<?php echo $id_item; ?>" class="btn btn-sm" style="background-color: #17a2b8; color: #000000ff;">
                                                        <i class="fa fa-binoculars"></i>
                                                    </a>

                                                    <a href="update.php?id=<?php echo $id_item; ?>" class="btn btn-sm" style="background-color: #ffae00ff; color: #000000ff;">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>

                                                    <a href="delete.php?id=<?php echo $id_item; ?>" class="btn btn-sm" style="background-color: #ff1100ff; color: #000000ff;">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </center>

                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- /.row -->
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Compras",
                "infoEmpty": "Mostrando 0 a 0 de 0 Compras",
                "infoFiltered": "(Filtrado de _MAX_ total Compras)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Compras",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                },{
                    extend: 'csv'
                },{
                    extend: 'excel'
                },{
                    text: 'Imprimir',
                    extend: 'print'
                }
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


