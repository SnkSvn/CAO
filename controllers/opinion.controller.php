<?php
session_start();

require_once '../model/Opinion.php';

$opinion = new Opinion();

if(isset($_GET['op'])){


    if($_GET['op'] == 'calificarCurso'){

        $datosEnviar = [
            "idcurso"       =>  $_SESSION["card-row1"],
            "idusuario"       =>  $_SESSION["idusuario"],
            "estrellas"     =>  intval($_GET["estrellas"]),
            "comentario"    =>  $_GET["comentario"]
        ];
        //Consulta para ver si el usuario ya tiene una opinion en el curso
        $result = $opinion->buscarOpinion([
            "idcurso" => $_SESSION['card-row1'],
            "idusuario" => $_SESSION["idusuario"]
        ]);

        
        if(empty($result)){     //Si el array de la consulta esta vacio...
            $opinion->guardarOpinion($datosEnviar);         //Guardar
        }else{                  //Si el array de la consulta contiene datos...
            $opinion->actualizarOpinion($datosEnviar);      //Actualizar
        }
        //Redireccionar a la pagina del curso
        header("Location: ../views/plantillaCurso.php?idcurso=".$_SESSION['card-row1']);
        
    }

    if($_GET['op'] == 'listarOpiniones'){
        $opinionesListadas = $opinion->listarOpinion(['idcurso' => $_SESSION['card-row1']]);

        if($opinionesListadas){
            foreach($opinionesListadas as $row){
                
                echo "  
                    <figure class='text-end border' style='padding: 1em; padding-bottom: 0;'>
                        <blockquote class='blockquote text-start'>
                            <p class='fa'>{$row['estrellas']}<i href='' class='fa-solid' style='color: orange;'></i> {$row['nombres']} {$row['apellidos']}</p>
                            <p>{$row['comentario']}</p>
                        </blockquote>
                        <figcaption class='blockquote-footer'>
                            Fecha de Publicacion: <cite title='Source Title'>{$row['fecha']}</cite>
                        </figcaption>
                    </figure>
                ";
                
            }
        }else{
            echo "<br><p>No se encontraron opiniones de este curso.</p>";         
        }
    }

}

?>