<?php
session_start();

if (isset($_SESSION['acceso'])){        //Si la variable acceso existe:
    if($_SESSION['acceso'] == true){    //Si la sesion está activa:
        header('Location:views/');      //Regresar a la carpeta views/
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAO</title>

        <!-- BOOTSTRAP 5 -->
        <link rel="stylesheet" href="libs/bootstrap-5.1.3-dist/css/bootstrap.css">
        <!-- Estilo css -->
        <link href="views/css/style.css" rel="stylesheet" type="text/css">
        <script src="https://kit.fontawesome.com/0dcb90cae3.js" crossorigin="anonymous"></script>
</head>
<body class="bg-img">


    <div class="container">
        <div class="row centrar-login">

            <div class="col-auto col-lg-5 shadow-lg rounded p-3 mt-5 div-form">
                
                <h1 class="text-center">Inicio de sesion</h1>
                <hr>
                <form action="" autocomplete="off">

                
                <div class="form-group mt-4">
                    
                    
                      
                    <div class="row">
                        
                        
                        <div class="col-1"></div>
                        <div class="col-1 text-center" style="display: table;" >
                            <i class="fa-solid fa-envelope text-center " style="display: table-cell;vertical-align: middle;"></i>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" id="correousuario" placeholder="Correo" autocomplete="off">  
                        </div>
                    </div>
                    
                </div>
                <div class="form-group mt-4" >
                    
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-1" style="display: table;">
                            <i class="fa-solid fa-lock text-center" style="display: table-cell;vertical-align: middle;"></i>
                        </div>
                        <div class="col-8">
                            <input type="password" class="form-control input-font" placeholder="Contraseña" id="claveacceso" autocomplete="off">
                        </div>
                    </div>
                    
                </div>
                <hr>
                
                <div class="d-grid">
                    <button id="acceder" class="btn btn-outline-success" type="button">Iniciar sesion</button>
                </div>
                <label for="" class="mt-3">¿No tienes una cuenta? <a href="views/registro.php">Registrate aquí</a>.</label>

                </form>
                </div> 
            
        </div>
    </div>  

    <!-- Bootstrap y Jquery -->
    <script src="libs/bootstrap-5.1.3-dist/js/jquery-3.6.0.min.js"></script>
    <script src="libs/bootstrap-5.1.3-dist/js/popper.min.js"></script>  <!-- siempre antes de bootstrap.min.js -->
    <script src="libs/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <!-- JS -->
    <script src="views/js/index.js"> </script>
</body>
</html>