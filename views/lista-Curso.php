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
    <title>Lista Cursos</title>
    <?php require('layout/lib-head.php')?>
</head>
<body>

    <?php require('layout/navbar.php') ?>

    <div class="container vh-100">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h3 id="titulo" class="text-center">Lista de Cursos - Activos</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 d-flex justify-content-between align-items-center"">
                <div class="btn-group">
                    <button id="activo" class="btn btn-sm btn-success" type="button">Activo</button>
                    <button id="inactivo" class="btn btn-sm btn-warning" type="button">Inactivo</button>
                    <button id="finalizado" class="btn btn-sm btn-danger" type="button">Finalizado</button>
                </div>
                
                <a class="btn btn-dark"  href="../reports/reportCursos.php"><i class="fa-solid fa-file-lines"></i> Generar PDF</a>
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-3">
                <table class="table table-sm table-striped" id="tabla-cursos">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre del curso</th>
                            <th>Descripcion</th>
                            <th>Responsable</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
        <div class="modal fade" id="modalEstado" aria-hidden="true" aria-labelledby="idLabelEstado" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="idLabelEstado">Titulo del modal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-dismiss="modal" >Salir</button>
                    </div>
                </div>
            </div>
        </div>


    <?php require('layout/footer.php') ?>
    
    <?php require('layout/lib-script.php')?>
    <!-- JS -->
    <script src="js/lista-Curso.js"></script>
</body>
</html>