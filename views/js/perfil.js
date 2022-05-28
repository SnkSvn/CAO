$(document).ready(function(){
            
    function reiniciarUI(){
        $("#formulario-actualizar-clave")[0].reset();
    }

    function actualizarClave(){
        const clave1 = $("#pass-actual").val();
        const clave2 = $("#pass-nueva").val();
        const clave3 = $("#pass-nueva2").val();

        if(clave1 == "" || clave2 == "" || clave3 == ""){
            
        }else{
            if(clave2 != clave3){
                
            }else{
                $.ajax({
                    url: '../controllers/usuario.controller.php',
                    type: 'GET',
                    data: {
                        op      :   'actualizarClave',
                        clave1  :   clave1,
                        clave2  :   clave2
                    },
                    success: function (result){
                        if($.trim(result) == ""){
                            
                            reiniciarUI();
                        }else{
                            
                            $("#clave1").focus();
                        }
                    }
                });
            }
        }
    }

    function actualizarDatos(){
        const nombres   = $("#nombres").val();
        const apellidos = $("#apellidos").val();
        const correo    = $("#correo").val();

        $.ajax({
            url: '../controllers/usuario.controller.php',
            type: 'GET',
            data:{
                op          :   'actualizarDatos',
                nombres     :   nombres,
                apellidos   :   apellidos,
                correo      :   correo
            },
            success: function (result){
                if($.trim(result) == ""){
                    
                    reiniciarUI();
                    window.location.href = 'perfil.php'
                }else{
                    
                    $("#nombres").focus();
                }
            }
        });

    }
    $("#actualizar-datos").click(actualizarDatos);
    $("#actualizar-clave").click(actualizarClave);
    
});