<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');
include ('../app/controllers/ventas/listado_de_ventas.php');
include ('../app/controllers/almacen/listado_de_productos.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Ventas</h1>
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
                            <?php
                            $contador_de_ventas = 0;
                             foreach ($ventas_datos as $ventas_dato) {
                                $contador_de_ventas = $contador_de_ventas + 1;
                             }
                            ?>

                            <h3 class="card-title"> <i class="fa fa-shopping-bag"></i> Venta Nro 
                                <input type="text" style="text-align: center" value=" <?php echo $contador_de_ventas + 1 ?>" disabled> </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body" >
                            <b>Carrito</b> 

                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                               data-target="#modal-buscar_producto">
                                           <i class="fa fa-search"></i>
                                           Buscar producto
                                       </button>
                                       <!-- modal para visualizar datos de los proveedor -->
                                       <div class="modal fade" id="modal-buscar_producto">
                                           <div class="modal-dialog modal-lg">
                                               <div class="modal-content">
                                                   <div class="modal-header" style="background-color: #1d36b6;color: white">
                                                       <h4 class="modal-title">Busqueda del producto</h4>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                       </button>
                                                   </div>
                                                   <div class="modal-body">
                                                       <div class="table table-responsive">
                                                           <table id="example1" class="table table-bordered table-striped table-sm">
                                                               <thead>
                                                               <tr>
                                                                   <th><center>Nro</center></th>
                                                                   <th><center>Selecionar</center></th>
                                                                   <th><center>Código</center></th>
                                                                   <th><center>Categoría</center></th>
                                                                   <th><center>Imagen</center></th>
                                                                   <th><center>Nombre</center></th>
                                                                   <th><center>Descripción</center></th>
                                                                   <th><center>Stock</center></th>
                                                                   <th><center>Precio compra</center></th>
                                                                   <th><center>Precio venta</center></th>
                                                                   <th><center>Fecha compra</center></th>
                                                                   <th><center>Usuario</center></th>
                                                               </tr>
                                                               </thead>
                                                               <tbody>
                                                               <?php
                                                               $contador = 0;
                                                               foreach ($productos_datos as $productos_dato){
                                                                   $id_producto = $productos_dato['id_producto']; ?>
                                                                   <tr>
                                                                       <td><?php echo $contador = $contador + 1; ?></td>
                                                                       <td>
                                                                           <button class="btn btn-info" id="btn_selecionar<?php echo $id_producto;?>">
                                                                               Selecionar
                                                                           </button>
                                                                           <script>
                                                                               $('#btn_selecionar<?php echo $id_producto;?>').click(function () {

                                                                                    
                                                                                   var id_producto = "<?php echo $id_producto;?>";
                                                                                   $('#id_producto').val(id_producto);
                                                                                   var producto = "<?php echo $productos_dato['nombre'];?>";
                                                                                   $('#producto').val(producto);
                                                                                   var descripcion = "<?php echo $productos_dato['descripcion'];?>";
                                                                                   $('#descripcion').val(descripcion);
                                                                                   var precio_venta = "<?php echo $productos_dato['precio_venta'];?>";
                                                                                   $('#precio_venta').val(precio_venta);
                                                                                   $('#cantidad').focus();

                                                                                   //$('#modal-buscar_producto').modal('toggle');

                                                                               });
                                                                           </script>
                                                                       </td>
                                                                       <td><?php echo $productos_dato['codigo'];?></td>
                                                                       <td><?php echo $productos_dato['categoria'];?></td>
                                                                       <td>
                                                                           <img src="<?php echo $URL."/almacen/img_productos/".$productos_dato['imagen'];?>" width="50px" alt="asdf">
                                                                       </td>
                                                                       <td><?php echo $productos_dato['nombre'];?></td>
                                                                       <td><?php echo $productos_dato['descripcion'];?></td>
                                                                       <td><?php echo $productos_dato['stock'];?></td>
                                                                       <td><?php echo $productos_dato['precio_compra'];?></td>
                                                                       <td><?php echo $productos_dato['precio_venta'];?></td>
                                                                       <td><?php echo $productos_dato['fecha_ingreso'];?></td>
                                                                       <td><?php echo $productos_dato['email'];?></td>
                                                                   </tr>
                                                                   <?php
                                                               }
                                                               ?>
                                                               </tbody>
                                                               </tfoot>
                                                           </table>

                                                           <div class="row">
                                                               <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input type="text" id="id_producto" hidden>
                                                                        <label for="">Producto</label>
                                                                        <input type="text" id="producto" class="form-control" disabled>
                                                                    </div>
                                                               </div>
                                                               <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label for="">Descripcion</label>
                                                                        <input type="text" id="descripcion" class="form-control" disabled>
                                                                    </div>
                                                               </div>
                                                               <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="">Cantidad</label>
                                                                        <input type="text" id="cantidad" class="form-control">
                                                                    </div>
                                                               </div>
                                                               <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="">Precio Unitario</label>
                                                                        <input type="text" id="precio_venta" class="form-control" disabled>
                                                                    </div>
                                                               </div>
                                                           </div>
                                                           <button id="btn_registar_carrito" style="float: right" class="btn btn-primary">Agregar</button>
                                                           <script>
                                                                $(btn_registar_carrito).click(function(){
                                                                    var id_venta = '<?php echo $contador_de_ventas + 1; ?>';
                                                                    var id_producto = $('#id_producto').val();
                                                                    var cantidad = $('#cantidad').val();
                                                                    
                                                                    if (id_producto=="") {
                                                                        alert("Debe de llenar los productos");
                                                                    }else if(cantidad=="") {
                                                                        alert("Debe de llenar la cantidad de los Productos");
                                                                    }else{
                                                                        alert ("Listo para agregar");
                                                                    }
                                                                });
                                                           </script>
                                                           <br><br>
                                                       </div>
                                                   </div>
                                               </div>
                                               <!-- /.modal-content -->
                                           </div>
                                           <!-- /.modal-dialog -->
                                       </div>

                                       <br><br>
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
                                                            <th style="background-color: #e7e7e7; text-align: center">Accion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         
                                                        <tr>
                                                            <th colspan="3" style="background-color: #e7e7e7; text-align: right;">Total</th>
                                                            <th><center>4</center></th>
                                                            <th><center>20</center></th>
                                                            <th><center>40</center></th>
                                                    </tbody>
                                            </table>
                                       </div>

                        </div>

                    </div>

                </div>
            </div>





            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> <i class="fa fa-user-check"></i> Datos del Cliente </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        

                        <div class="card-body" >
                            fdvbfcxv 
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
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

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });


    $(function () {
        $("#example2").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
                "infoEmpty": "Mostrando 0 a 0 de 0 Proveedores",
                "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Proveedores",
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

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

