<?php

require_once '../core/model.master.php';

class Usuario extends ModelMaster{
    
    public function login(array $datosLogin){
        try{
            return parent::execProcedure($datosLogin, "spu_usuarios_login", true);   //true porque retorna datos
        }catch (Exception $error){
            die($error->getMessage());
        }

    }

    public function actualizarDatos(array $datosActualizar){
        try{
            return parent::execProcedure($datosActualizar, "spu_usuarios_actualizardatos",false);
        }catch(Exception $error){
            die($erro->getMessage());
        }
    }
    
    public function actualizarClave(array $datosEnviar){
        try{
            parent::execProcedure($datosEnviar, "spu_usuarios_actualizarclave",false);
        }catch (Exception $error){
            die($error->getMessage());
        }
    }


    public function registrarUsuario(array $datosRegistro){
        try{
            parent::execProcedure($datosRegistro, "spu_usuarios_registro", false); #Array, Procedimiento almacenado, sin retorno
        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function buscarUsuario(array $datosEnviar){
        try{
            return parent::execProcedure($datosEnviar, "spu_usuarios_buscar_correo", true);
        }catch (Exception $error){
            die($error->getMessage());
        }
    }
    

}

?>