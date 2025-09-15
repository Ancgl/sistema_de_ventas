<?php
include ('app/config.php');
include ('layout/sesion.php');

include ('layout/parte1.php');
include ('app/controllers/usuarios/listado_de_usuarios.php');
include ('app/controllers/roles/listado_de_roles.php');
include ('app/controllers/categorias/listado_de_categoria.php');
include ('app/controllers/almacen/listado_de_productos.php');
include ('app/controllers/proveedores/listado_de_proveedores.php');
include ('app/controllers/compras/listado_de_compras.php');
include ('app/controllers/clientes/listado_de_clientes.php');
include ('app/controllers/ventas/listado_de_ventas.php');

?>
<style>
    .fondo-fijo {
    background-image: url('public/images/fondo2.jpg');
    background-size: cover;        /* Que cubra toda el área */
    background-position: center;   /* Centrada */
    background-repeat: no-repeat;  /* Que no se repita */
    background-attachment: fixed;  /* Opcional: efecto fijo */
    }


    .fondo-fijo::before {
        content: "";
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(17, 21, 224, 0.3); /* Color y opacidad de la capa */
        z-index: 1;
    }

    /* Para que el contenido no quede tapado */
    .fondo-fijo > * {
        position: relative;
        z-index: 2;
    }

    .titulo-blanco{
        color: white;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper fondo-fijo">
    
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 titulo-blanco">Bienvenido al SISTEMA de VENTAS - <?php echo $rol_sesion; ?> </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <h3 style="color: white;">Reportes de la Empresa</h3>
            <br>
            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box " style="background-color: #15867dff; color: white; border-radius: 2px;" >
                        <div class="inner">
                            <?php
                            $contador_de_usuarios = 0;
                            foreach ($usuarios_datos as $usuarios_dato){
                                $contador_de_usuarios = $contador_de_usuarios + 1;
                            }
                            ?>
                            <h3><?php echo $contador_de_usuarios;?></h3>
                            <p>Usuarios Registrados</p>
                        </div>
                        <a href="<?php echo $URL;?>/usuarios/create.php">
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL;?>/usuarios" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right" >
                            </i>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-6">
                    <div class="small-box " style="background-color: #15867dff; color: white;">
                        <div class="inner">
                            <?php
                            $contador_de_roles = 0;
                            foreach ($roles_datos as $roles_dato){
                                $contador_de_roles = $contador_de_roles + 1;
                            }
                            ?>
                            <h3><?php echo $contador_de_roles;?></h3>
                            <p>Roles Registrados</p>
                        </div>
                        <a href="<?php echo $URL;?>/roles/create.php">
                            <div class="icon">
                                <i class="fas fa-address-card"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL;?>/roles" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #15867dff; color: white;">
                        <div class="inner">
                            <?php
                            $contador_de_categorias = 0;
                            foreach ($categorias_datos as $categorias_dato){
                                $contador_de_categorias = $contador_de_categorias + 1;
                            }
                            ?>
                            <h3><?php echo $contador_de_categorias;?></h3>
                            <p>Categorías Registrados</p>
                        </div>
                        <a href="<?php echo $URL;?>/categorias">
                            <div class="icon">
                                <i class="fas fa-tags"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL;?>/categorias" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-6">
                    <div class="small-box " style="background-color: #15867dff; color: white;">
                        <div class="inner">
                            <?php
                            $contador_de_productos = 0;
                            foreach ($productos_datos as $productos_dato){
                                $contador_de_productos = $contador_de_productos + 1;
                            }
                            ?>
                            <h3><?php echo $contador_de_productos;?></h3>
                            <p>Productos Registrados</p>
                        </div>
                        <a href="<?php echo $URL;?>/almacen/create.php">
                            <div class="icon">
                                <i class="fas fa-list"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL;?>/almacen" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>





                <div class="col-lg-3 col-6">
                    <div class="small-box " style="background-color: #15867dff; color: white;">
                        <div class="inner">
                            <?php
                            $contador_de_proveedores = 0;
                            foreach ($proveedores_datos as $proveedores_dato){
                                $contador_de_proveedores = $contador_de_proveedores + 1;
                            }
                            ?>
                            <h3><?php echo $contador_de_proveedores;?></h3>
                            <p>Proveedores Registrados</p>
                        </div>
                        <a href="<?php echo $URL;?>/proveedores">
                            <div class="icon">
                                <i class="fas fa-car"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL;?>/proveedores" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>




                <div class="col-lg-3 col-6">
                    <div class="small-box " style="background-color: #15867dff; color: white;">
                        <div class="inner">
                            <?php
                            $contador_de_compras = 0;
                            foreach ($compras_datos as $compras_dato){
                                $contador_de_compras = $contador_de_compras + 1;
                            }
                            ?>
                            <h3><?php echo $contador_de_compras;?></h3>
                            <p>Compras Registradas</p>
                        </div>
                        <a href="<?php echo $URL;?>/compras">
                            <div class="icon">
                                <i class="fas fa-cart-plus"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL;?>/compras" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                

                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #15867dff; color: white;">
                        <div class="inner">
                            <?php
                            // Cuenta de forma segura (evita warning si $ventas_datos no está definida)
                            $contador_de_ventas = is_array($ventas_datos) ? count($ventas_datos) : 0;
                            ?>
                            <h3><?php echo $contador_de_ventas; ?></h3>
                            <p>Ventas Registradas</p>
                        </div>
                        <a href="<?php echo $URL; ?>/ventas">
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/ventas" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #15867dff; color: white;">
                        <div class="inner">
                            <?php
                            $contador_de_clientes = 0;
                            foreach ($clientes_datos as $clientes_dato){
                                $contador_de_clientes = $contador_de_clientes + 1;
                            }
                            ?>
                            <h3><?php echo $contador_de_clientes; ?></h3>
                            <p>Clientes Registrados</p>
                        </div>
                        <a href="<?php echo $URL; ?>/clientes">
                            <div class="icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/clientes" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>



            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include ('layout/parte2.php'); ?>







