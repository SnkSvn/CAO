<?php

require_once '../core/model.master.php';

class Tema extends ModelMaster{
    public function listarTemas(array $datosEnviar){
        try{
            return parent::execProcedure($datosEnviar, "spu_temas_listar", true);
        }catch(Exception $error){
            die($error->getMessage());
        }
    }

    public function registrarTema(array $datosEnviar){
        try{
            parent::execProcedure($datosEnviar, "spu_temas_crear", false);
        }catch(Exception $error){
            die($error->getMessage());
        }
    }
    
    public function editarTema(array $datosEnviar){
        try{
            parent::execProcedure($datosEnviar, "spu_temas_editar", false);
        }catch(Exception $error){
            die($error->getMessage());
        }
    }


}

?>