<?php
session_start();

require_once '../model/Clasificacion.php';

$clasificacion = new Clasificacion();
if(isset($_GET['op'])){

    if($_GET['op'] == 'listarClasificaciones'){
        $arrayClasificaciones = $clasificacion->listarClasificaciones();
        

        if($arrayClasificaciones){
            foreach($arrayClasificaciones as $row){
                echo "<option value='$row->idclasificacion'>$row->clasificacion</option>";
            }
        }
    }










}


?>