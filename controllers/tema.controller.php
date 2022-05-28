<?php

session_start();
require_once '../model/Tema.php';

$tema = new Tema();
if(isset($_GET['op'])){

    //Listar temas
    if($_GET['op'] == 'listarTemas'){
        $arrayTemas = $tema->listarTemas(['idcurso' => $_SESSION['card-row1']]);

        //Variables para ID
        $idacordeon = 1;
        $idfija     = 'idacordeon';
        $idcollapse = 'idcollapse';
        $idmodal    = 'idmodal';
        
        echo "<h3>Temario</h3>";
        if($arrayTemas){
            foreach($arrayTemas as $row){
                //Aumentar variables para reutilizarlas
                $idcollapse = $idcollapse . $idacordeon;
                $idmodal    = $idmodal . $idacordeon;
                echo "  
                
                        <div class='accordion-item'>
                            <h2 class='accordion-header' id='$idacordeon'>
                            <button class='accordion-button bg-warning' type='button' data-bs-toggle='collapse' data-bs-target='#$idcollapse' aria-expanded='true' aria-controls='$idcollapse'>
                                {$row['titulo']}
                            </button>
                            </h2>
                            <div id='$idcollapse' class='accordion-collapse collapse text-info' aria-labelledby='$idacordeon' data-bs-parent='#$idfija'>
                            <div class='accordion-body bg-dark'> 
                                <p>Duracion: <code>{$row['duracion']} min.</code></p>
                                <p>{$row['descripcion']}</p>
                                <a class='btn btn-outline-primary btn-sm' data-bs-toggle='modal' href='#$idmodal' role='button'><i class='fa-solid fa-circle-play'></i> Ver video</a>
                            </div>
                            </div>
                        </div>
                ";
                //Aumentar para concatenar con los ID
                $idacordeon++;
            }
        }else{
            echo "<br><p>No hay temas disponibles.</p>";         
        }
    }

    //Listar Modales para temas
    if($_GET['op'] == 'listarTemasModales'){
        $arrayTemas = $tema->listarTemas(['idcurso' => $_SESSION['card-row1']]);

        //Variables para ID
        $idacordeon = 1;
        $idcollapse = 'idcollapse';
        $idmodal = 'idmodal';
        $idLabelModal = 'idLabelModal';
        
        if($arrayTemas){
            foreach($arrayTemas as $row){
                //Aumentar variables para reutilizarlas
                $idcollapse = $idcollapse . $idacordeon;
                $idmodal = $idmodal . $idacordeon;
                $idLabelModal = $idLabelModal . $idacordeon;
                echo "  
                        <div class='modal fade' id='$idmodal' aria-hidden='true' aria-labelledby='$idLabelModal' tabindex='-1'>
                            <div class='modal-dialog modal-lg modal-dialog-centered'>
                                <div class='modal-content bg-dark'>
                                <div class='modal-header'>
                                    <h5 class='modal-title text-info' id='$idLabelModal'>{$row['titulo']}</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <div class='container-fluid'>
                                        <iframe class='' width='100%' height='350rem' src='{$row['link']}' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>

                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button class='btn btn-outline-info text-primary' data-bs-dismiss='modal' >Salir</button>
                                </div>
                                </div>
                            </div>
                        </div>
                ";
                
                $idacordeon++;
            }
        }
    }

    if($_GET['op'] == 'cargarEditarTemas'){
        $arrayTemas = $tema->listarTemas(['idcurso' => $_SESSION['card-row1']]);

        //Variables para ID
        $idacordeon = 1;
        $idfija= 'idacordeon';
        $idcollapse = 'idcollapse';
        $idmodal = 'idmodal';

        echo "<h3>Temario</h3>";
        if($arrayTemas){
            foreach($arrayTemas as $row){
                
                echo "  
                        <form  action='http://localhost/cao/controllers/tema.controller.php?' method='get' autocomplete='off'>
                            <div class='accordion-item'>
                                <input name='op' type='hidden' value='EditarTemas'>
                                <input name='idtemas' type='hidden' value='{$row['idtemas']}'>
                                <h2 class='accordion-header' id='$idacordeon'>
                                <button class='accordion-button bg-warning' type='button' data-bs-toggle='collapse' data-bs-target='#$idcollapse' aria-expanded='true' aria-controls='$idcollapse'>
                                    <input name='titulo' class='form-control form-control-sm bg-warning border border-primary' placeholder='{$row['titulo']}'></input>
                                </button>
                                </h2>
                                <div id='$idcollapse' class='accordion-collapse collapse text-info' aria-labelledby='$idacordeon' data-bs-parent='#$idfija'>
                                <div class='accordion-body bg-dark'> 
                                    <div class='col-2'><input name='duracion' type='number' class='form-control form-control-sm bg-dark border border-info text-info' placeholder='{$row['duracion']}'></input></div>
                                    
                                    <textarea name='descripcion' class='form-control form-control-sm mt-1 mb-1 bg-dark border border-info text-info' placeholder='{$row['descripcion']}'></textarea>
                                    <input name='link' class='form-control form-control-sm mb-2 bg-dark border border-info text-info' placeholder='{$row['link']}'></input>

                                    <div class=' d-flex justify-content-between align-items-center'>
                                        <label></label>
                                        <div>
                                            <button type='submit' class='btn btn-primary rounded btn-sm ' >Guardar</button>
                                            <button type='reset' class='btn btn-secondary rounded btn-sm ' >Cancelar</button>
                                            
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                ";
                //Aumentar variables para reutilizarlas
                $idcollapse = $idcollapse . $idacordeon;
                $idmodal = $idmodal . $idacordeon;
                $idacordeon++;
            }
        echo "
            <div class='pt-3'>
                <a class='btn btn-outline-primary btn-sm' data-bs-toggle='modal' href='#ModalAgregarCurso' role='button'><i class='fa-solid fa-pen-to-square'></i> Agregar Curso</a>
            </div>
        ";
        }else{
            echo "<br><p>No hay temas disponibles.</p>

                <div class='pt-3'>
                    <a class='btn btn-outline-primary btn-sm' data-bs-toggle='modal' href='#ModalAgregarCurso' role='button'><i class='fa-solid fa-pen-to-square'></i> Agregar Curso</a>
                </div>
            ";   
                  
        }
    }
    
    if($_GET['op'] == 'EditarTemas'){
        $datosEnviar = [
            "idtemas"       =>  intval($_GET["idtemas"]),
            "titulo"        =>  $_GET["titulo"],
            "descripcion"   =>  $_GET["descripcion"],
            "duracion"      =>  intval($_GET["duracion"]),
            "link"          =>  $_GET["link"]
        ];
        header("Location: http://localhost/CAO/views/cursoEditar.php?idcurso=".$_SESSION['card-row1']);
        $tema->editarTema($datosEnviar);
    }

    if($_GET['op'] == 'crearTema'){ 
        $datosEnviar = [
            
            "titulo"        =>  $_GET["titulo"],
            "descripcion"   =>  $_GET["descripcion"],
            "duracion"      =>  intval($_GET["duracion"]),
            "idcurso"       =>  intval($_SESSION["card-row1"]),
            "link"          =>  $_GET["link"]
        ];
        header("Location: http://localhost/CAO/views/cursoEditar.php?idcurso=".$_SESSION['card-row1']);
        $tema->registrarTema($datosEnviar);
        
    }

}



?>