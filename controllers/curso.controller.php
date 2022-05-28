<?php
session_start();
date_default_timezone_set("America/Lima");

require_once '../model/Curso.php';
$curso = new Curso();
//Post en lugar de get porque enviaremos una imagen
if(isset($_POST['op'])){

    //Registro del curso
    if($_POST['op'] == 'registrarCurso'){
        $value = intval($_POST["idclasificacion"]);
        $fechaActual = date('YmdGis');
        $nuevoNombre = md5($fechaActual) . ".jpg";

        $anio   =   date('Y');
        $mes    =   date('m');
        $ruta   =   $anio . "/" . $mes . "/" . $nuevoNombre;
        $datosEnviar = [
            "titulo"        =>  $_POST["titulo"],
            "descripcion"   =>  $_POST["descripcion"],
            "imagencurso"   =>  $ruta,
            "idregistrador" =>  $_SESSION["idusuario"],
            "idresponsable" =>  $_SESSION["idusuario"],
            "idclasificacion" => $value
        ];
        
        
        if(move_uploaded_file($_FILES['imagencurso']['tmp_name'], "../imagenes/" . $ruta)){
            $curso->registrarCurso($datosEnviar);
        }else{
            echo "No se pudo completar el proceso";
        }

    }

    //Actualizar datos del Curso
    if($_POST['op'] == 'actualizarCurso'){
        $value = intval($_POST["idclasificacion"]);
        $fechaActual = date('YmdGis');
        $nuevoNombre = md5($fechaActual) . ".jpg";

        $anio   =   date('Y');
        $mes    =   date('m');
        $ruta   =   $anio . "/" . $mes . "/" . $nuevoNombre;
        if(isset($_POST['imagencurso'])){
            
            $datosEnviar = [
                "idcurso"           =>  $_SESSION['card-row1'],
                "titulo"            =>  $_POST["titulo"],
                "descripcion"       =>  $_POST["descripcion"],
                "imagencurso"       =>  "",
                "idresponsable"     =>  $_SESSION["idusuario"],
                "idclasificacion"   => $value,
                "estado"            => $_POST["estado"]
            ];

            
            $curso->actualizarCurso($datosEnviar);
            
        }else{
            $datosEnviar = [
                "idcurso"           =>  $_SESSION['card-row1'],
                "titulo"            =>  $_POST["titulo"],
                "descripcion"       =>  $_POST["descripcion"],
                "imagencurso"       =>  $ruta,
                "idresponsable"     =>  $_SESSION["idusuario"],
                "idclasificacion"   => $value,
                "estado"            => $_POST["estado"]
            ];
            
            if(move_uploaded_file($_FILES['imagencurso']['tmp_name'], "../imagenes/" . $ruta)){
                $curso->actualizarCurso($datosEnviar);
            }else{
                echo "No se pudo completar el proceso";
            }
        }

    }

}

// Listar cursos propios para administrarlos
if(isset($_GET['op'])){

    if($_GET['op'] == 'listarEstados'){
        $result = $curso->listarEstados(["estado" => $_GET['estado'],'idresponsable' => $_SESSION['idusuario']]);
        
        if($result){
            $numeroFila = 1;
            foreach($result as $row){
                echo "
                    <tr>
                        <td>{$numeroFila}</td>
                        <td><a href='../imagenes/{$row['imagencurso']}' data-lightbox'Cursos' data-title='{$row['titulo']}' class='btn btn-outline-primary btn-sm'>Ver portada</a></td>
                        <td>{$row['titulo']}</td>
                        <td>{$row['descripcion']}</td>
                        <td>{$row['responsable']}</td>
                        <td><a class='btn btn-outline-success btn-sm' href='cursoEditar.php?idcurso={$row['idcurso']}'>Editar</a></td>
                        <td><a class='btn btn-outline-warning btn-sm' href='../reports/reportTemas.php?idcurso={$row['idcurso']}'><i class='fa-solid fa-file-lines'></i></a></td>
                    </tr>
                ";
                $numeroFila++;
            }
        }
    }
    // Listar los cursos en cards
    if($_GET['op'] == 'listarCards'){
        $result = $curso->listarEstados(["estado" => "A", "idresponsable"]);
        
        if($result){
            foreach($result as $row){
                
                echo "
                
                <div class='card card-lista-cursos bg-dark text-light text-justify' style='width: 18rem;'>
                        <img class='card-img-top cards-img img-fluid' src='../imagenes/{$row['imagencurso']}' alt=''>
                        
                        <div class='card-header h6 cards-head pt-2'>
                            <table style='height: 30px;'>
                                <tbody>
                                    <tr>
                                        <td class='align-middle'>{$row['titulo']}</td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                      </div>
                        <div class='card-body cards-body '>
                            
                            <p class='card-text'>
                                {$row['descripcion']}
                            </p>
                        </div>
                        
                        <div class='card-footer '>
                            <a class='text-light' href='#'>Ir al curso</a>
                        </div>
                    </div>

                    
                ";
            }

        }
    }

    // Listar los cursos en cards con cantidad limitada e ingresando indice
    if($_GET['op'] == 'listarCardsLimit'){
        $result = $curso->listarCartasLimitado([
            "desde" => $_SESSION['card-cursos'] + 1,
            "cantidad" => 8
        ]);
        if(empty($result)){
            echo "<p>No pudimos encontrar mas resultados.</p>";
        }else{
            $contador = 0;
            if($result){
                foreach($result as $row){
                    $_SESSION['card-cursos'] = $row['idcurso'];
                    if($contador == 0){
                        $_SESSION['card-row1'] = $row['idcurso'];
                    }
                    $contador++;
                    echo "
                    
                    <div class='card card-lista-cursos bg-dark text-light text-justify' style='width: 18rem;'>
                            <img class='card-img-top cards-img img-fluid' src='../imagenes/{$row['imagencurso']}' alt=''>
                            
                            <div class='card-header h6 cards-head pt-2'>
                                <table style='height: 30px;'>
                                    <tbody>
                                        <tr>
                                            <td class='align-middle'>{$row['titulo']}</td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                          </div>
                            <div class='card-body cards-body '>
                                
                                <p class='card-text'>
                                    {$row['descripcion']}
                                </p>
                            </div>
                            
                            <div class='card-footer '>
                                <a class='text-light' href='plantillaCurso.php?idcurso={$row['idcurso']}'>Ir al curso</a>
                            </div>
                        </div>
    
                        
                    ";
                    
                    
                }
                
            }
        }
        
        
    }

    if($_GET['op'] == 'listarCurso'){
        $result = $curso->datosCurso([
            "idcurso" => $_SESSION['card-row1']
        ]);
        if(empty($result)){
            echo "<p class='text-info pt-3'>No pudimos encontrar el curso.</p>";
        }else{
            $opinion=0;
            if($result){
                foreach($result as $row){
                    $_SESSION['card-cursos'] = $row['idcurso'];
                    if($row['Opinion'] == null ){
                        $opinion = '--';
                    }else{
                        $opinion = $row['Opinion'];
                    }
                    echo "
                        <h1 class='text-info pt-3 pb-3 rounded text-center'>{$row['titulo']}</h1>
                        <div class='container text-center pt-3 pb-3'><img class='img-fluid' style='' src='../imagenes/{$row['imagencurso']}' alt=''></div>
                        <div class='d-flex justify-content-between align-items-center' style='padding-right: 5%; padding-left: 5%; padding-bottom: 2%;'>
                            <a class='btn btn-outline-info btn-sm' data-bs-toggle='modal' href='#modalVerCalificaciones' role='button'><i class='fa-solid fa-award'></i> Ver Opiniones</a>
                            <a class='btn btn-outline-info btn-sm' data-bs-toggle='modal' href='#modalCalificar' role='button'><i class='fa-solid fa-pen-to-square'></i> Dar Opinion</a>
                        </div>

                        <div class='d-flex justify-content-between align-items-center' style='padding-right: 5%; padding-left: 5%; padding-bottom: 2%;'>
                            <i class='text-info fa-solid fa-lines-leaning pt-3'>{$row['clasificacion']}</i>
                            
                            <span class='text-info fa-solid pt-3'>$opinion <i href='' class='fa-solid' style='color: orange;'> </i></span>
                        </div>
                        
                        <textarea disabled class='form-control mt-3 pb-3 justify-text bg-dark text-info fs-4' style='height: 16%; font-family: Verdana;' id='' rows='3'>{$row['descripcion']}</textarea>
                        
                    ";
                    
                    
                }
                
            }
        }
        
        
    }

    if($_GET['op'] == 'listarCursoEditar'){ //Verificar uso
        $result = $curso->listarCartasLimitado([
            "desde" => $_SESSION['card-row1'],
            "cantidad" => 1
        ]);
        if(empty($result)){
            echo "<p>No pudimos encontrar mas resultados.</p>";
        }else{
            $contador = 0;
            if($result){
                foreach($result as $row){
                    $_SESSION['card-cursos'] = $row['idcurso'];
                    if($contador == 0){
                        $_SESSION['card-row1'] = $row['idcurso'];
                    }
                    $contador++;
                    echo "
                            <div class='form-group'>
                                <label class='col-form-label mt-4 text-info pt-3 pb-3 rounded' for='titulo'>Titulo:</label>
                                <input id='titulo' type='text' class='form-control pt-3 pb-3 rounded text-center' placeholder='{$row['titulo']}' >
                            </div>
                            
                            <div class='container text-center pt-3 pb-3'><img class='img-fluid' style='' src='../imagenes/{$row['imagencurso']}' alt=''></div>
                            
                            <i class='text-info fa-solid fa-lines-leaning pt-3 '> {$row['clasificacion']}</i>
                            
                            <textarea disabled class='form-control mt-3 pb-3 justify-text bg-dark text-info fs-4' style='height: 16%; font-family: Verdana;' id='' rows='3'>{$row['descripcion']}</textarea>
                            
                    ";
                    
                    
                }
                
            }
        }
        
        
    }

    if($_GET['op'] == 'listarCursoPlaceholder'){    //Comprobar
        $result = $curso->cursoSinEstado([
            "idcurso" => intval($_SESSION['card-row1'])
        ]);
        
        if(empty($result)){
            echo "<p>No pudimos encontrar mas resultados.</p>";
        }else{
            if($result){
                foreach($result as $row){
                    echo "
                        <h1 class='mt-3 text-center text-info'>Editar Curso</h1>
                        <div class='card border-dark bg-dark' style=''>
                        
                        <div class='card-body text-dark'>
                            <form id='formulario-actualizar-curso' enctype='multipart/form-data' autocomplete='off'>
                                <div class='form-group mb-3'>
                                    <label class='card-text text-info' for='titulo'>Titulo del curso:</label>
                                    <input type='text' class='form-control' id='titulo'  placeholder='{$row['titulo']}'>
                                    
                                </div>
                                
                                <div class='form-group'>
                                    <label for='descripcion' class='form-label text-info'>Descripcion:</label>
                                    <textarea class='form-control mb-3' id='descripcion' rows='3' placeholder='{$row['descripcion']}'></textarea>
                                </div>

                                <div class='row form-group '>

                                    <div class='form-group col-4 col-sm-4'>
                                        
                                        <label for='estado' class='form-label text-info'>Estado</label>

                                        <select class='form-select' id='estado'>
                                        <option value='A'>Activo</option>
                                        <option value='X'>Inactivo</option>
                                        <option value='F'>Finalizado</option>
                                        </select>
                                
                                    </div>
                                    <div class='col-auto col-sm-8'>
                                        <label for='imagencurso' class='form-label text-info'>Imagen del curso:</label>
                                        <input class='form-control' type='file' id='imagencurso' accept='.jpg, .jpeg ,.png'>
                                        
                                    </div>

                                </div>
                                
                            </form>
                        </div>
                    ";
                    
                    
                }
                
            }
        }
        
        
    }    

    if($_GET['op'] == 'iniciarCards'){
        $_SESSION['card-cursos'] = 0;
        $_SESSION['card-row1'] = 0;
    }

}

?>
