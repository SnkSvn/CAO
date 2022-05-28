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

            <div id="vista-curso"  class="col-12 col-lg-6 bg-dark min-vh-50 shadow-lg">
                
                <!-- Informacion del Curso -->

                <!-- Informacion del Curso -->

                

            </div>
            
            
            <div class="col-12 col-lg-6 position-relative min-vh-50 shadow-lg ">
                    

                    <div id="idacordeon" class="mt-5 pt-5 accordion position-absolute top-50 start-50 translate-middle" style='width: 80%; height: 100%;'>
                        
                        <!-- Acordion -->
                                
                        <!-- Acordion -->


                    </div>

                    
            
            </div>
            

        </div>
    </div>

    <!-- Modals -->
    <div id="idmodales"></div>

    <div class="modal fade" id="modalCalificar" aria-hidden="true" aria-labelledby="idLabelModalCalificar" tabindex="-1" >
            <div class="modal-dialog modal-fullscreen-sm-down " >
                <div class="modal-content" >
                    <div class="modal-header">
                        <h5 class="modal-title" id="idLabelModalCalificar">Opinion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body min-vh-25">
                        <div class="container-fluid">
                        <form class="estrellas" action='http://localhost/cao/controllers/opinion.controller.php?' method='get' autocomplete='off'>
                            <div class="form-group">
                                
                                
                            </div>
                            <div class="col-12">
                                <p class="clasificacion">
                                    <input name='op' type='hidden' value='calificarCurso'>
                                    <input id="radio1" type="radio" name="estrellas" value="5"><!--
                                    --><label for="radio1">★</label><!--
                                    --><input id="radio2" type="radio" name="estrellas" value="4"><!--
                                    --><label for="radio2">★</label><!--
                                    --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                                    --><label for="radio3">★</label><!--
                                    --><input id="radio4" type="radio" name="estrellas" value="2"><!--
                                    --><label for="radio4">★</label><!--
                                    --><input id="radio5" type="radio" name="estrellas" value="1"><!--
                                    --><label for="radio5">★</label>
                                </p>
                            </div>
                            <textarea name='comentario' class="form-control" rows="3" placeholder="Agregue un comentario..."></textarea>
                            <div class='d-flex justify-content-between align-items-center pt-3' >
                                
                                <button class='btn btn-outline-warning btn-sm' type='submit'>Enviar</button>
                                <button class='btn btn-outline-secondary btn-sm' type='reset'>Borrar</button>
                            </div>
                            
                        </form>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-dismiss="modal" >Salir</button>
                    </div>
                </div>
            </div>
    </div>

    <div class="modal fade" id="modalVerCalificaciones" aria-hidden="true" aria-labelledby="idLabelModalCalificar" tabindex="-1" >
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" >
                <div class="modal-content" >

                    <div class="modal-header">
                        <h5 class="modal-title" id="idLabelModalCalificar">Opiniones</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body min-vh-25">
                        <div class="container">

                            <div id='opinionesListadas' class="form-group">
                                
                                <!-- Cargado -->
                                <!-- <figure class='text-end border' style='padding: 1em; padding-bottom: 0;'>
                                    <blockquote class='blockquote text-start'>
                                        <p class='fa'>4<i href='' class='fa-solid' style='color: orange;'></i> Axel Farfan</p>
                                        <p>Esta es mi opinion</p>
                                    </blockquote>
                                    <figcaption class='blockquote-footer'>
                                        Fecha de Publicacion: <cite title='Source Title'>10/02/2022</cite>
                                    </figcaption>
                                </figure> -->
                                <!-- Cargado -->
                                
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-dismiss="modal" >Salir</button>
                    </div>
                </div>
            </div>
    </div>

    
    <!-- Modals -->

    <?php require('layout/footer.php') ?>
    
    <?php require('layout/lib-script.php')?>

    <!-- JS -->
    <script src="js/plantillaCurso.js"></script>

</body>
</html>