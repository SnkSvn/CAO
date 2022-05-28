<?php
require_once '../core/model.master.php';

class Clasificacion extends ModelMaster{

    public function listarClasificaciones(){
        try{
            return parent::getRows("spu_clasificaciones_listar");
        }catch(Exception $error){
            die($error->getMessage());
        }
        
    }

}

?>