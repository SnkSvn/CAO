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
    <title>Cursos</title>
    <?php require('layout/lib-head.php')?>
</head>
<body>

    <?php require('layout/navbar.php') ?>
    

    <!-- Cursos -->

        <div class="container vh-100 mt-5">
            <div class="row">
                <div id="vista-cursos" class="col-md-12 mt-4">
                        <!-- Cards listadas  -->
                </div>

            

            </div>


            <div class="d-flex justify-content-center">
                <div>
                        <ul class="pagination">
                            <li class="page-item">
                            
                            <a  id="previous" class="page-link bg-dark text-light rounded"><i id="previousCard" class="fa-solid fa-angles-left"></i></a>
                            </li>
                            <li style="margin-left: 0.5vw; margin-right:  0.5vw;">

                            </li>
                            <li class="page-item">
                            <a id="next" class="page-link bg-dark text-light rounded"><i id="nextCard" class="fa-solid fa-angles-right"></i></a>
                            </li>
                        </ul>
                </div>

            </div>

        </div>

        
    
    <!-- Cursos -->


    <?php require('layout/footer.php') ?>
    <?php require('layout/lib-script.php')?>

    <script src="js/cursos.js"></script>
</body>
</html>
