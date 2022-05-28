<?php
    session_start();
    
    if($_SESSION['acceso'] == false){
        header('Location:../');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <?php require('layout/lib-head.php')?>
</head>
<body>

    <!-- Navbar -->
    <?php require('layout/navbar.php') ?>
    <!-- Navbar -->

    <div class="container pt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="" id="formulario-actualizar-clave" autocomplete="off">
                    <h1 class="text-center">Configuracion de cuenta</h1>
                    <hr class="mt-4 mb-4">
                    <h4>Actualizar datos</h4>
                    <div class="row">
                        <div class="form-group mt-4 col-md-6">
                            <label for="">Nombres:</label>
                            <input type="text" class="form-control" id="nombres" autocomplete="off" placeholder="<?= $_SESSION['nombres'];?>">
                        </div>
                        <div class="form-group mt-4  col-md-6" >
                            <label for="">Apellidos:</label>
                            <input type="texto" class="form-control" id="apellidos" autocomplete="off" placeholder="<?= $_SESSION['apellidos'];?>">
                        </div>
                    </div>

                    <div class="form-group mt-4" >
                        <label for="">Correo:</label>
                        <input type="text" class="form-control" id="correo" autocomplete="off" placeholder="<?= $_SESSION['correo'];?>">
                    </div>
                    <div class="form-group mt-4" >
                    <div class="col-md-6"><button type="button" id="actualizar-datos" class="btn btn-outline-primary btn-sm btn-medida">Actualizar Datos</button></div>
                    </div>
                    <hr class="mt-4 mb-4">
                    
                    <h4>Actualizar contraseña</h3>
                    <div class="form-group mt-4" >
                        <label for="">Contraseña Actual:</label>
                        <input type="password" class="form-control" id="pass-actual" autocomplete="off">
                    </div>
                    <div class="form-group mt-4" >
                        <label for="">Contraseña Nueva:</label>
                        <input type="password" class="form-control" id="pass-nueva" autocomplete="off">
                    </div>

                    <div class="form-group mt-4" >
                        <label for="">Contraseña Nueva:</label>
                        <input type="password" class="form-control" id="pass-nueva2" autocomplete="off">
                    </div>

                    <div class="form-group mt-4 mb-4" >
                        <div class="col-md-6"><button type="button" id="actualizar-clave" class="btn btn-outline-danger btn-sm btn-medida">Cambiar contraseña</button></div>
                    </div>

                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    


    <?php require('layout/footer.php') ?>
    
    <?php require('layout/lib-script.php')?>

    <!-- JS -->
    <script src="js/perfil.js"></script>
    
</body>
</html>