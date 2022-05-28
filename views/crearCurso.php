<!-- session_start();$_GET['op']='confirmarSesion'; -->
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
    <title>Creacion de cursos</title>
    <?php require('layout/lib-head.php')?>
</head>
<body>
    
    <?php require('layout/navbar.php') ?>

    <!-- Formulario -->

    <div class="container vh-100">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1 class="mt-5 mb-5 text-center">Registrar curso</h1>
            <div class="card border-dark mb-3 shadow" style="max-width: 100vh;">
            <div class="card-header">
                <h5 class="card-title mt-2">Datos del curso</h5>
            </div>
            <div class="card-body text-dark">
                <form id="formulario-crear-curso" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label class="card-text mb-1" for="titulo">Titulo del curso:</label>
                    <input type="text" class="form-control" id="titulo"  placeholder="Ingrese un titulo">
                    
                </div>
                <div class="form-group mb-3">
                    <label for="descripcion" class="form-label">Descripcion:</label>
                    <textarea class="form-control" id="descripcion" rows="3" placeholder="Ingrese una descripcion del curso"></textarea>
                </div>

                <div class="row form-group mb-3">
                    <div class="col-lg-4 col-sm-12">
                        <label for="correoresponsable" class="form-label">Clasificacion: </label>
                        <select class="form-select" id="idclasificacion">
                            
                        </select>
                    </div>
                    <div class="col-lg-8 col-sm-12">
                        <label for="imagencurso" class="form-label">Imagen de portada:</label>
                        <input class="form-control" type="file" id="imagencurso" accept=".jpg, .jpeg ,.png">
                    </div>
                </div>
                </form>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <label></label>
                <div>
                    <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
                    <button type="button" class="btn btn-outline-secondary" id="cancelar">Cancelar</button>
                </div>
            </div>

            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

    </div>

    <!-- Formulario -->


    <?php require('layout/footer.php') ?>
    
    <?php require('layout/lib-script.php')?>
    
    <!-- JS -->
    <script src="js/crearCurso.js"></script>

</body>
</html>
