<?php

require_once '../core/model.master.php';


class Curso extends ModelMaster{

    public function registrarCurso(array $datosEnviar){
        try{
            parent::execProcedure($datosEnviar, "spu_cursos_registrar" ,false);
        }catch(Exception $error){
            die($error->getMessage());
        }
        
    }

    public function listarEstados(array $datosEnviar){
        try{
            return parent::execProcedure($datosEnviar, "spu_cursos_listar" ,true);
        }catch(Exception $error){
            die($error->getMessage());
        }
        
    }

    public function listarCartasLimitado(array $datosEnviar){
        try{
            return parent::execProcedure($datosEnviar, "spu_listar_cartas_limit" ,true);
        }catch(Exception $error){
            die($error->getMessage());
        }
        
    }

    public function actualizarCurso(array $datosEnviar){
        try{
            parent::execProcedure($datosEnviar, "spu_cursos_actualizar", false);
        }catch(Exception $error){
            die($error->getMessage());
        }
        
    }

    public function listarCursosPDF(array $datosEnviar){
        try{
            return parent::execProcedure($datosEnviar, "spu_listar_PDF",true);
        }catch(Exception $error){
            die($error->getMessage());
        }
        
    }

    public function datosCurso(array $datosEnviar){
        try{
            return parent::execProcedure($datosEnviar, "spu_curso_vista" ,true);
        }catch(Exception $error){
            die($error->getMessage());
        }
        
    }

    //Datos de un curso sin importar el estado
    public function cursoSinEstado(array $datosEnviar){
        try{
            return parent::execProcedure($datosEnviar, "spu_cursos_datos" ,true);
        }catch(Exception $error){
            die($error->getMessage());
        }
        
    }

}

?>