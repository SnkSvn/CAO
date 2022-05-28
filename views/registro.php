
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAO</title>
    <?php require('layout/lib-head.php')?>
    
</head>
<body class="bg-img">


<div class="container centrar-registro">
        <div class="row">
            <div class="col-auto shadow-lg p-3 mb-5 rounded div-form" >
                
                <h1 class="text-center">Registro</h1>
                <hr>
                <form id="form-registro" action="" autocomplete="off">

                <div class="form-group mt-4">   
                    <label for="">Nombres:</label>
                    <input type="text" class="form-control" autocomplete="off" id="nombres">
                </div>
                <div class="form-group mt-4">
                    <label for="">Apellidos:</label>
                    <input type="text" class="form-control" autocomplete="off" id="apellidos">
                </div>

                
                <div class="form-group mt-4">
                    <label for="">Correo:</label>
                    <input type="text" class="form-control" autocomplete="off" id="correo">
                </div>
                <div class="form-group mt-4" >
                    <label for="">Escriba su contraseña:</label>
                    <input type="password" class="form-control" autocomplete="off" id="clave1">
                </div>

                <div class="form-group mt-4" >
                    <label for="">Confirme su contraseña:</label>
                    <input type="password" class="form-control" autocomplete="off" id="clave-verificacion">
                </div>
                <hr>
                
                <div class="d-grid">
                    <button id="registrar-usuario" class="btn btn btn-outline-success" type="button">Registrar</button>
                </div>
                <label for="" class="mt-2">¿Ya tienes una cuenta? <a href="../index.php">Inicia sesión aquí</a>.</label>

                </form>
                </div> 
            
        </div>
    </div>  
    
    



    <!-- Bootstrap y Jquery -->
    <script src="../libs/bootstrap-5.1.3-dist/js/jquery-3.6.0.min.js"></script>
    <script src="../libs/bootstrap-5.1.3-dist/js/popper.min.js"></script>  <!-- siempre antes de bootstrap.min.js -->
    <script src="../libs/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- JS -->
    <script src="js/registro.js"></script>
    
</body>
</html>