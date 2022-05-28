$(document).ready(function(){
            
    function listarCursos(estado){
        $.ajax({
            url:    '../controllers/curso.controller.php',
            type: 'GET',
            data: {
                op          :   'listarEstados',
                estado      :   estado
            },
            success: function (result){
                $("#tabla-cursos tbody").html(result);
            }
        });
    }

    $("#activo").click(function(){
        $("#titulo").html("Lista de Cursos - Activos")
        listarCursos("A");
    });

    $("#inactivo").click(function(){
        $("#titulo").html("Lista de Cursos - Inactivos")
        listarCursos("X");
    });

    $("#finalizado").click(function(){
        $("#titulo").html("Lista de Cursos - Finalizados")
        listarCursos("F");
    });

    listarCursos("A");
});