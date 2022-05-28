<?php
    session_start();
    
    if($_SESSION['acceso'] == false){
        header('Location:../');
    }
    if($_GET['idcurso'] != ''){
        $_SESSION['card-row1'] = intval($_GET['idcurso']);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso</title>
    <?php require('layout/lib-head.php')?>
</head>
<body>
    <!-- Navbar -->
    <?php require('layout/navbar.php') ?>
    <!-- Navbar -->

    
    <div class="container" >
        <div class="row vh-100 mt-5 shadow-lg rounded" >

            <div  class="col-12 col-lg-6 bg-dark min-vh-50 shadow-lg">
                
                <div id="vista-curso">
                    <!-- Datos del curso -->

                    <!-- Datos del curso -->
                </div>
                
                <div>
                    <div class=" col-lg-6 col-sm-12 " style="margin-left: 1rem;">
                        <label for="correoresponsable" class="form-label text-info">Clasificacion: </label>
                        <select class="form-select" id="idclasificacion">
                        </select>
                    </div>
                </div>

                <div class=" d-flex justify-content-between align-items-center mb-2 mt-2">
                        <label></label>
                        <div>
                            <button type="button" class="btn btn-primary rounded" id="guardarCurso">Guardar</button>
                            <button type="button" class="btn btn-secondary rounded" id="cancelar">Cancelar</button>
                        </div>
                    </div>
                
                
            </div>

            
                    


            
            <div class="col-12 col-lg-6 position-relative min-vh-50 shadow-lg ">
                    

                    <div id="idacordeon" class="mt-5 pt-5 accordion position-absolute top-50 start-50 translate-middle" style='width: 80%; height: 100%;'>
                        
                        <!-- Acordion -->
                                
                        <!-- Acordion -->

                    </div>
                                
                    <!-- <button id="agregarTema" class="btn btn-warning">Agregar Tema</button>    -->

            </div>
            
                                
        </div>
    </div>

<!-- Modals -->
    
    
    <div class="modal fade" id="ModalAgregarCurso" aria-hidden="true" aria-labelledby="idLabelModalCalificar" tabindex="-1" >
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" >
                <div class="modal-content" >

                    <div class="modal-header">
                        <h5 class="modal-title" id="idLabelModalCalificar">Agregar Curso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body min-vh-25">
                        <div class="container">

                            <form id="formulario-crear-tema" enctype="multipart/form-data" action='http://localhost/cao/controllers/tema.controller.php?' method='get' autocomplete="off">
                                <div class="form-group mb-3">
                                    <input name='op' type='hidden' value='crearTema'>
                                    <label class="card-text mb-1" for="temaTitulo">Titulo del tema:</label>
                                    <input name="titulo" type="text" class="form-control" id="temaTitulo"  placeholder="Ingrese un titulo">
                                    
                                </div>
                                <div class="form-group mb-3">
                                    <label for="temaDescripcion" class="form-label">Descripcion:</label>
                                    <textarea name="descripcion" class="form-control" id="temaDescripcion" rows="3" placeholder="Ingrese una descripcion del tema"></textarea>
                                </div>

                                <div class="row form-group mb-3">
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="temaDuracion" class="form-label">Duracion: </label>
                                        <input name="duracion" class="form-control" type='number' id="temaDuracion">
                                            
                                        </select>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <label for="link" class="form-label">Link del video:</label>
                                        <input name="link" class="form-control" type="text" id="link" placeholder="Ingrese una URL">
                                    </div>
                                </div>

                                <div class=' d-flex justify-content-between align-items-center'>
                                        <label></label>
                                        <div>
                                            <button type='submit' class='btn btn-outline-primary rounded btn-sm ' >Guardar</button>
                                            <button type='reset' class='btn btn-outline-secondary rounded btn-sm ' >Cancelar</button>
                                            
                                        </div>
                                </div>
                            </form>

                        </div>
                    </div>
                   
                </div>
            </div>
    </div>

<!-- Modals -->

    <?php require('layout/footer.php') ?>
    
    <?php require('layout/lib-script.php')?>
    
    <!-- JS -->
    <script src="js/cursoEditar.js"></script>


</body>
</html>