<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');


include ('../app/controllers/ventas/listado_de_ventas.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de ventas Realizadas</h1>
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
                            <h3 class="card-title">Ventas registrados</h3>
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
                                        <th><center>Nro de venta</center></th>
                                        <th><center>Productos</center></th>
                                        <th><center>Cliente</center></th>
                                        <th><center>Total Pagado</center></th>
                                        <th><center>Acciones</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($ventas_datos as $ventas_dato){
                                        $id_venta = $ventas_dato['id_venta']; 
                                        $id_cliente = $ventas_dato['id_cliente']; 
                                        $contador = $contador + 1;
                                        ?>
                                        <tr>
                                            <td><center><?php echo $contador ?></center></td>
                                            <td><center><?php echo $ventas_dato ['nro_venta'] ?></center></td>
                                            <td>
                                                <center>
                                                    <!-- Botón -->
                                                    <button type="button" class="btn btn-primary" 
                                                            data-toggle="modal" data-target="#Modal_productos<?php echo $id_venta;?>" style="border-radius: 2px; color: #000000ff;">
                                                        <i class="fa fa-shopping-basket"></i> Productos
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="Modal_productos<?php echo $id_venta;?>" tabindex="-1" role="dialog" 
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header" style="background-color: rgba(20, 114, 131, 0.73)">
                                                                <h5 class="modal-title" id="exampleModalLabel"> Productos de la Venta <?php echo $ventas_dato ['nro_venta'] ?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class ="table-responsive">
                                                                    <table class="table table-bordered table-sm table-hover table-striped" >
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="background-color: #e7e7e7; text-align: center">Nro</th>                                                         
                                                                                    <th style="background-color: #e7e7e7; text-align: center">Productos</th>
                                                                                    <th style="background-color: #e7e7e7; text-align: center">Descripcion</th>
                                                                                    <th style="background-color: #e7e7e7; text-align: center">Cantidad</th>
                                                                                    <th style="background-color: #e7e7e7; text-align: center">Precio Unitario</th>
                                                                                    <th style="background-color: #e7e7e7; text-align: center">Precio Subtotal</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php 
                                                                                $contador_de_carrito = 0;
                                                                                $cantidad_total= 0;
                                                                                $precio_unitario_total = 0;
                                                                                $precio_total = 0;

                                                                                $nro_venta = $ventas_dato['nro_venta'];

                                                                                $sql_carrito = "SELECT 
                                                                                                    carr.id_carrito,
                                                                                                    carr.cantidad,
                                                                                                    pro.nombre AS nombre_producto,
                                                                                                    pro.descripcion,
                                                                                                    pro.precio_venta,
                                                                                                    pro.stock,
                                                                                                    pro.id_producto
                                                                                                FROM tb_carrito AS carr
                                                                                                INNER JOIN tb_almacen AS pro 
                                                                                                    ON carr.id_producto = pro.id_producto
                                                                                                WHERE carr.nro_venta = :nro_venta
                                                                                                ORDER BY carr.id_carrito ASC";

                                                                                $query_carrito = $pdo->prepare($sql_carrito);
                                                                                $query_carrito->bindParam(':nro_venta', $nro_venta, PDO::PARAM_STR);
                                                                                $query_carrito->execute();
                                                                                $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);



                                                                                foreach ($carrito_datos as $carrito_dato) {
                                                                                    $id_carrito = $carrito_dato ['id_carrito'];
                                                                                    $contador_de_carrito = $contador_de_carrito + 1; 
                                                                                    $cantidad_total = $cantidad_total + $carrito_dato ['cantidad']; 
                                                                                    $precio_unitario_total = $precio_unitario_total + floatval($carrito_dato ['precio_venta']);
                                                                                    ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <center><?php echo $contador_de_carrito;?></center>
                                                                                        <input type="text" value="<?php echo $carrito_dato ['id_producto'] ;?>" id="id_producto<?php echo $contador_de_carrito;?>" hidden>
                                                                                    </td>
                                                                                    <td><?php echo $carrito_dato ['nombre_producto'];?></td>
                                                                                    <td><?php echo $carrito_dato ['descripcion'];?></td>
                                                                                    <td>
                                                                                        <center><span id="cantidad_carrito<?php echo $contador_de_carrito; ?>"><?php echo $carrito_dato ['cantidad'];?></span></center>
                                                                                        <input type="text" value="<?php echo $carrito_dato ['stock'];?>" id="stock_de_inventario<?php echo $contador_de_carrito;?>" hidden>
                                                                                    </td>
                                                                                    <td><center><?php echo $carrito_dato ['precio_venta'];?></center></td>
                                                                                    <td>
                                                                                        <center>
                                                                                            <?php 
                                                                                            $cantidad = floatval($carrito_dato ['cantidad']);
                                                                                            $precio_venta = floatval($carrito_dato ['precio_venta']);
                                                                                            echo $subtotal = $cantidad * $precio_venta;
                                                                                            $precio_total = $precio_total + $subtotal;
                                                                                            ?> 
                                                                                        </center>
                                                                                    </td>
                                                                                    
                                                                                </tr>
                                                                                <?php  
                                                                                }                                                      
                                                                                ?>
                                                                                
                                                                                <tr>
                                                                                    <th colspan="3" style="background-color: #e7e7e7; text-align: right;">Total :</th>
                                                                                    <th> <center> <?php echo $cantidad_total;?> </center> </th>
                                                                                    <th><center><?php echo $precio_unitario_total;?></center></th>
                                                                                    <th style="background-color: #b4d61dff;"><center><?php echo $precio_total?></center></th>
                                                                                    
                                                                                </tr>
                                                                            </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </center>
                                            </td>

                                            <!-- Modal de Clientes -->
                                            <td>
                                                <center>
                                                    <?php echo $ventas_dato['nombre_cliente']; ?>
                                                </center>
                                            </td> 
                                            <td>
                                                <center><?php echo "s/ ".$ventas_dato ['total_pagado'] ?></center>
                                            </td>
                                            <td>
                                                 
                                                <center>
                                                    <a href="show.php?id_venta=<?php echo $id_venta;?>" class="btn" style="background-color: #17a2b8; color: #000000ff;">
                                                        <i class="fa fa-binoculars"></i>
                                                    </a>

                                                    <a href="delete.php?id_venta=<?php echo $id_venta;?>&nro_venta=<?php echo $nro_venta;?>" class="btn" style="background-color: #ff0000ff; color: #000000ff;">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>

                                                    <a href="../app/controllers/ventas/imprimir_venta.php?id_venta=<?php echo $id_venta_get; ?>" target="_blank" class="btn" style="background-color: #0db10dff; color: #000000ff;">
                                                        <i class="fa fa-file-pdf"></i>
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


