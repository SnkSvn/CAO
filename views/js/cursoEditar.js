$(document).ready(function(){
    var limite = 0;
    var idresponsable = -1;
    
    // Cargar datos y temas del curso
    function cargarDatosCurso(){
        $.ajax({
            url: '../controllers/curso.controller.php',
            type: 'GET',
            data: {
                op:  'listarCursoPlaceholder',
                limite: limite
                },
            success: function(result){
                $("#vista-curso").html(result);
            }
        });
    }

    function cargarTemasCurso(){
        $.ajax({
            url: '../controllers/tema.controller.php',
            type: 'GET',
            data: {
                op:  'cargarEditarTemas'
                },
            success: function(result){
                $("#idacordeon").html(result);
            }
        });
    }

    //Cargar las clasificaciones que puede tener el curso
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

    // Editar Datos del curso
    function actualizarCurso(){ 
        const datosEnviar = new FormData();
        
        datosEnviar.append("op","actualizarCurso");
        datosEnviar.append("titulo", $("#titulo").val());
        datosEnviar.append("descripcion", $("#descripcion").val());
        datosEnviar.append("idresponsable", idresponsable);
        datosEnviar.append("imagencurso", $("#imagencurso")[0].files[0]);
        datosEnviar.append("idclasificacion", $("#idclasificacion").val());
        datosEnviar.append("estado",  $("#estado").val());

        $.ajax({
            
            url:            '../controllers/curso.controller.php',
            type:           'POST',
            data:           datosEnviar,
            contentType:    false,
            processData:    false,
            cache:          false,
            success: function(result){
                $("#formulario-actualizar-curso")[0].reset();
                if($.trim(result) == ""){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Curso editado',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 2500
                    })
                }else{
                    if(result){
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
            }
        });
        
    }

   


    $("#guardarCurso").click(actualizarCurso);
    $('#cancelar').click(function(){
        $("#formulario-actualizar-curso")[0].reset();
    });

    
    cargarDatosCurso();
    cargarTemasCurso();
    listarClasificaciones();
});

