
$(document).ready(function(){

    function registrarUsuario(){
        
        let nombres     = $("#nombres").val();
        let apellidos   = $("#apellidos").val();
        let correo      = $("#correo").val();
        let clave       = $("#clave1").val();
        let claveVerificacion = $("#clave-verificacion").val();
        
        if(claveVerificacion == clave){
            let validacionCorrecta = true;
                if (validacionCorrecta){
                    
                    // Creamos un arreglo asociativo
                    var datosRegistro = {
                        "op"            : "registrarUsuario",
                        "nombres"       : nombres,
                        "apellidos"     : apellidos,
                        "correo"        : correo,
                        "clave"         : clave,
                    };
                    //Enviamos el arreglo asociativo de JS por Ajax
                    $.ajax({
                        url:    '../controllers/usuario.controller.php',
                        type:   'GET',
                        data:   datosRegistro,
                        success: function(result){
                            $("#form-registro")[0].reset(); //Se reinicia el formulario
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Cuenta creada exitosamente',
                                showConfirmButton: false,
                                timerProgressBar: true,
                                timer: 1500
                                })
                        }
                    });

                    
                }
        }else{
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Las contraseñas no coinciden',
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 1500
                })
            //Contraseñas diferentes
        }
    }
    $("#registrar-usuario").click(registrarUsuario);
    
});