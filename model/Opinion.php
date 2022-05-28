<?php
require_once '../core/model.master.php';

class Opinion extends ModelMaster{

    public function guardarOpinion(array $datosEnviar){
        try{
            parent::execProcedure( $datosEnviar, "spu_opinion_guardar", false);
        }catch(Exception $error){
            die($error->getMessage());
        }
        
    }

    public function actualizarOpinion(array $datosEnviar){
        try{
            parent::execProcedure( $datosEnviar, "spu_opinion_actualizar", false);
        }catch(Exception $error){
            die($error->getMessage());
        }
        
    }

    public function buscarOpinion(array $datosEnviar){
        try{
            return parent::execProcedure( $datosEnviar, "spu_opinion_buscar", true);
        }catch(Exception $error){
            die($error->getMessage());
        }
        
    }

    public function listarOpinion(array $datosEnviar){
        try{
            return parent::execProcedure( $datosEnviar, "spu_opinion_listar", true);
        }catch(Exception $error){
            die($error->getMessage());
        }
    }

    

}

?>