<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Sistema Ventas</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/dist/css/adminlte.min.css">

    <!-- Libreria Sweetallert2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- jQuery -->
    <script src="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>

</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">SISTEMA DE VENTAS - DA´MART</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item" style="display: flex; align-items: center;">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
                <!-- Falta colocar un Swet Alert Aqui Para cerrar Secion -->
                <a href="<?php echo $URL;?>/app/controllers/login/cerrar_sesion.php" 
                                            class="nav-link" style="background-color: rgb(90, 95, 99); color: white; margin-left: 10px; border-radius: 2px; padding: 6px 15px; ">
                    <i class="fas fa-sign-out-alt"> Cerrar Sesion</i>
                </a>
                
                <!-- Falta colocar un Swet Alert Aqui Para cerrar Secion -->
            </li>
        </ul>

    
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4"  >
        <!-- Brand Logo -->
        <a href="<?php echo $URL;?>" class="brand-link">
            <img src="<?php echo $URL;?>/public/images/logo2.jpg" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-bold" >Da´Mart</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo $URL;?>/public/images/usuario.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $nombres_sesion;?></a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           

                    <li class="nav-item ">
                        <a href="#" class="nav-link active" style="background-color:rgba(23, 6, 99, 1); color: white; border-radius: 2px;">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Usuarios
                                <i class="right fas fa-hand-point-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/usuarios" class="nav-link">
                                    <i class="fas fa-check nav-icon" style="font-size: 0.8rem; color: #fff;"></i>
                                    <p style="color: #fff">Usuarios Registrados</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/usuarios/create.php" class="nav-link">
                                    <i class="fas fa-check nav-icon" style="font-size: 0.8rem; color: #fff;"></i>
                                    <p style="color: #fff">Registrar Usuario</p>
                                </a>
                            </li>
                        </ul>
                    </li>




                    <li class="nav-item ">
                        <a href="#" class="nav-link active" style="background-color:rgba(23, 6, 99, 1); color: white; border-radius: 2px;">
                            <i class="nav-icon fas fa-address-card"></i>
                            <p>
                                Roles
                                <i class="right fas fa-hand-point-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/roles" class="nav-link">
                                    <i class="fas fa-check nav-icon" style="font-size: 0.8rem; color: #fff;"></i>
                                    <p style="color: #fff">Roles Registrados</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/roles/create.php" class="nav-link">
                                    <i class="fas fa-check nav-icon" style="font-size: 0.8rem; color: #fff;"></i>
                                    <p style="color: #fff">Crear Nuevo Rol</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    


                    <li class="nav-item ">
                        <a href="#" class="nav-link active" style="background-color:  rgb(23, 6, 99, 1); color: white; border-radius: 2px;">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Categorías
                                <i class="right fas fa-hand-point-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/categorias" class="nav-link">
                                    <i class="fas fa-check nav-icon" style="font-size: 0.8rem; color: #fff;"></i>
                                    <p style="color: #fff">Lista de Categorías</p>
                                </a>
                            </li>
                        </ul>
                    </li>




                    <li class="nav-item ">
                        <a href="#" class="nav-link active" style="background-color:rgb(23, 6, 99, 1); color: white; border-radius: 2px;">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Almacen
                                <i class="right fas fa-hand-point-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/almacen" class="nav-link">
                                    <i class="fas fa-check nav-icon" style="font-size: 0.8rem; color: #fff;"></i>
                                    <p style="color: #fff">Listado de Productos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/almacen/create.php" class="nav-link">
                                    <i class="fas fa-check nav-icon" style="font-size: 0.8rem; color: #fff;"></i>
                                    <p style="color: #fff">Registrar Producto</p>
                                </a>
                            </li>
                        </ul>
                    </li>




                    <li class="nav-item ">
                        <a href="#" class="nav-link active" style="background-color:rgb(23, 6, 99, 1); color: white; border-radius: 2px;">
                            <i class="nav-icon fas fa-cart-plus"></i>
                            <p>
                                Compras
                                <i class="right fas fa-hand-point-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/compras" class="nav-link">
                                    <i class="fas fa-check nav-icon" style="font-size: 0.8rem; color: #fff;"></i>
                                    <p style="color: #fff">Compras Realizadas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/compras/create.php" class="nav-link">
                                    <i class="fas fa-check nav-icon" style="font-size: 0.8rem; color: #fff;"></i>
                                    <p style="color: #fff">Realizar Una Compra</p>
                                </a>
                            </li>
                        </ul>
                    </li>




                    <li class="nav-item ">
                        <a href="#" class="nav-link active" style="background-color: rgb(23, 6, 99, 1); color: white; border-radius: 2px;">
                            <i class="nav-icon fas fa-car"></i>
                            <p>
                                Proveedores
                                <i class="right fas fa-hand-point-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/proveedores" class="nav-link">
                                    <i class="fas fa-check nav-icon" style="font-size: 0.8rem; color: #fff;"></i>
                                    <p style="color: #fff">Proveedores Registrados</p>
                                </a>
                            </li>
                        </ul>
                    </li>




                    <li class="nav-item ">
                        <a href="#" class="nav-link active" style="background-color:rgb(23, 6, 99, 1); color: white; border-radius: 2px;">
                            <i class="nav-icon fas fa-shopping-basket"></i>
                            <p>
                                Ventas
                                <i class="right fas fa-hand-point-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/ventas" class="nav-link">
                                    <i class="fas fa-check nav-icon" style="font-size: 0.8rem; color: #fff;"></i>
                                    <p style="color: #fff">Ventas Generadas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/ventas/create.php" class="nav-link">
                                    <i class="fas fa-check nav-icon" style="font-size: 0.8rem; color: #fff;"></i>
                                    <p style="color: #fff">Realizar Nueva venta</p>
                                </a>
                            </li>
                        </ul>
                    </li>




                    <li class="nav-item ">
                        <a href="#" class="nav-link active" style="background-color: rgb(23, 6, 99, 1); color: white; border-radius: 2px;">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Clientes
                                <i class="right fas fa-hand-point-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/clientes" class="nav-link">
                                    <i class="fas fa-check nav-icon" style="font-size: 0.8rem; color: #fff;"></i>
                                    <p style="color: #fff">Listado de Clientes</p>
                                </a>
                            </li>
                            
                        </ul>
                    </li> 
                    
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <style>
        .main-sidebar {
            background: linear-gradient(to right, rgba(0, 38, 255, 0.9), rgba(31, 48, 141, 0.9), transparent) !important;
        }

        /* Opcional: mantener contraste en los enlaces */
        .nav-sidebar>.nav-item>.nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
        }
        .nav-sidebar>.nav-item>.nav-link:hover {
            background-color: rgba(135, 13, 165, 0.2) !important;
        }

        .sidebar .info a {
            color: white !important;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        /* Da´Mart */
        .brand-text {
            color: white !important;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5); /* le da un pequeño brillo */
        }

        /* Más espacio entre los items del menú */
        .nav-sidebar .nav-item {
            margin-bottom: 5px;   /* espacio debajo de cada item */
        }

        /* Opcional: hacer que los enlaces sean un poco más altos */
        .nav-sidebar .nav-link {
            padding-top: 10px;
            padding-bottom: 10px;
        }

    </style>


