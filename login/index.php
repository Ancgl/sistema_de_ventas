<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de ventas</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/templeates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../public/templeates/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/templeates/AdminLTE-3.2.0/dist/css/adminlte.min.css">

    <!-- Libreria Sweetallert2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body.login-page {
            background: url('../public/images/fondo1.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(24, 243, 42, 0.3); /* Cambia el color y la opacidad aquí */
        z-index: 1;
        }
        .login-box {
            position: relative;
            z-index: 2;
        }

        .card {
            background: rgba(255,255,255,0.8); /* Fondo blanco semitransparente */
            border: none; /* Opcional: sin borde */
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.9); /* Opcional: sombra suave */
        }

    </style>

</head>
<body class="hold-transition login-page">
<div class="overlay"></div>
<div class="login-box">
    <!-- /.login-logo -->


    <?php 
    session_start();
    if(isset($_SESSION['mensaje'])){
        $respuesta = $_SESSION['mensaje']; ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: '<?php echo $respuesta;?>',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php
    }
    ?>

    <center>
        <img src=""
            alt="" width="300px">
    </center>
    <br>
    <div class="card card-outline ">
        <div class="card-header text-center">
            <a href="../public/templeates/AdminLTE-3.2.0/index2.html" class="h1" style="color: #000;"><h2>Bienvenido al Sistema</h2></a>
            <a href="" style="color: #000;">Ingrese sus Datos Correctamente</a>
        </div>
        <div class="card-body">
            

            <form action="../app/controllers/login/ingreso.php" method="post">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password_user" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesion</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <hr>
            <a href="" style="color: #000;">Ancgl - 2025</a>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../public/templeates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../public/templeates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/templeates/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>
