$(document).ready(function(){
    var idresponsable = -1;
    
    function registrarCurso(){
            const datosEnviar = new FormData();
            
            datosEnviar.append("op","registrarCurso");
            datosEnviar.append("titulo", $("#titulo").val());
            datosEnviar.append("descripcion", $("#descripcion").val());
            datosEnviar.append("idresponsable", idresponsable);
            datosEnviar.append("imagencurso", $("#imagencurso")[0].files[0]);
            datosEnviar.append("idclasificacion", $("#idclasificacion").val());
            $.ajax({
                
                url:            '../controllers/curso.controller.php',
                type:           'POST',
                data:           datosEnviar,
                contentType:    false,
                processData:    false,
                cache:          false,
                success: function(result){
                    $("#formulario-crear-curso")[0].reset();
                    if($.trim(result) == ""){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Curso creado exitosamente',
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 2500
                            })
                    }else{
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Algo salio mal',
                            text: 'Verifique los datos ingresados',
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 2500
                            })
                    }
                }
            });
        
    }

    function listarClasificaciones(){
        $.ajax({
            url: '../controllers/clasificacion.controller.php',
            type: 'GET',
            data: 'op=listarClasificaciones',
            success: function (result){
                $("#idclasificacion").html(result);
            }
        });
    }
    

    $("#imagencurso").change(function(){
        console.log($(this).val());
    });

    $("#correoresponsable").keypress(function(event){
        if(event.keyCode == 13){
            
            buscarUsuario();
        }
    });
    $("#guardar").click(registrarCurso);
    listarClasificaciones();

});