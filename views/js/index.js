$(document).ready(function(){

    function iniciarSesion(){
        if($("#correousuario").val() != "" && $("#claveacceso").val() != ""){
            $.ajax({
                url: 'controllers/usuario.controller.php',
                type: 'GET',
                data:{
                    op          :   'login',
                    correo      :   $("#correousuario").val(),
                    clave       :   $("#claveacceso").val(),
                    
                },
                success: function(result){
                    
                    if($.trim(result) == ""){ //cambiar por el true de acceso
                        window.location.href = 'views/'
                    }else{
                        if($.trim(result) == ""){
                            
                        }
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'No se pudo iniciar sesion',
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 1500
                            })
                        
                    }
                    
                }
            });
        }

    }

    $("#claveacceso").keypress(function(event){
        if(event.keyCode == 13){    //keycode 13 = Enter
            iniciarSesion();
        }
        
    });
    $("#acceder").click(iniciarSesion);
});