<?php
session_start();

require_once '../model/Usuario.php';

if (isset($_GET['op'])){
    $usuario = new Usuario();

    if ($_GET['op'] == 'login'){
        $datosLogin = ["correo" => $_GET['correo']];

        $resultado = $usuario -> login($datosLogin);

        if($resultado){
            $registro = $resultado[0];
            $claveValidar = $_GET['clave'];

            $claveencriptada = $registro['clave'];
            
            if (password_verify($claveValidar, $claveencriptada)){     // Verificacion con hash

                $_SESSION['acceso'] = true;
                
                $_SESSION['idusuario']  = $registro['idusuario'];
                $_SESSION['nombres']    = $registro['nombres'];
                $_SESSION['apellidos']  = $registro['apellidos'];
                $_SESSION['correo']     = $registro['correo'];
                $_SESSION['clave']      = $registro['clave'];
                $_SESSION['card-cursos'] = 0;
                $_SESSION['card-row1'] = 0;
                
                
                echo "";   //borrar
            }else{
                $_SESSION['acceso'] = false;
                $_SESSION['idusuario']  = '';
                $_SESSION['nombres']    = '';
                $_SESSION['apellidos']    = '';
                $_SESSION['correo']     = '';
                $_SESSION['clave'] = '';
                $_SESSION['card-cursos'] = '';
                $_SESSION['card-row1'] = '';
                echo "Clave incorrecta";
                
            }

            



        }else{
            $_SESSION['acceso'] = false;
            $_SESSION['idusuario']  = '';
            $_SESSION['nombres']    = '';
            $_SESSION['apellidos']    = '';
            $_SESSION['correo']     = '';
            $_SESSION['clave'] = '';
            $_SESSION['card-cursos'] = '';
            $_SESSION['card-row1'] = '';
            echo "No existe el usuario";    //borrar

        }
        //var_dump($resultado);
        
    }

    if ($_GET['op'] == 'cerrar-sesion'){
        session_destroy();
        session_unset();
        header('Location:../');
    }

    if ($_GET['op'] == 'actualizarClave'){

        $claveActual = $_GET['clave1'];
        $claveNueva = password_hash($_GET['clave2'], PASSWORD_BCRYPT);                  // clave nueva encriptada
        
        if(password_verify($claveActual, $_SESSION['clave'])){
            $claveSession = $_SESSION['clave'];
        }else{
            $claveSession = password_hash($_SESSION['clave'], PASSWORD_BCRYPT);   // Clave de de session
        }

        if(password_verify($claveActual, $claveSession)){
            $datosEnviar = [
                "idusuario" => $_SESSION['idusuario'],
                "clave" => $claveNueva
            ];
            
            $usuario->actualizarClave($datosEnviar);    //Actualizar clave en db
            $_SESSION['clave'] = $_GET['clave2'];       //Actualizar clave de session

            echo "";
        }else{
            echo "Las contraseñas son diferentes";
            
        }
    }

    if ($_GET['op'] == 'actualizarDatos'){

        if($_GET['nombres'] == ""){
            $nombres = $_SESSION['nombres'];
        }else{
            $nombres = $_GET['nombres'];
            $_SESSION['nombres'] = $nombres;
        }
        if($_GET['apellidos'] == ""){
            $apellidos = $_SESSION['apellidos'];
        }else{
            $apellidos = $_GET['apellidos'];
            $_SESSION['apellidos'] = $apellidos;
        }
        if($_GET['correo'] == ""){
            $correo = $_SESSION['correo'];
        }else{
            $correo = $_GET['correo'];
            $_SESSION['correo'] = $correo;
        }
        
        $datosActualizar = [
            "idusuario" => $_SESSION['idusuario'],
            "nombres"   => $nombres,
            "apellidos" => $apellidos,
            "correo"    => $correo,
        ];
        
        $usuario->actualizarDatos($datosActualizar);
        


    }

    if ($_GET['op'] == 'registrarUsuario'){
        $claveIngresada = password_hash($_GET['clave'], PASSWORD_BCRYPT);  
        $usuario->registrarUsuario([
            "nombres"       =>  $_GET['nombres'],
            "apellidos"     =>  $_GET['apellidos'],
            "correo"        =>  $_GET['correo'],
            "clave"         =>  $claveIngresada
        ]);
    }


    
    if($_GET['op'] == 'buscarUsuario'){
        $datosBusqueda = [
            "correo"    =>  $_GET['correo']
        ];
        $resultado = $usuario->buscarUsuario($datosBusqueda);
        
        if($resultado){
            echo json_encode($resultado[0]);
        }
    }
}

    

?>