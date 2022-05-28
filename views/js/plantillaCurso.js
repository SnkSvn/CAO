$(document).ready(function(){
    var limite = 0;
    function cargarDatosCurso(){
        $.ajax({
            url: '../controllers/curso.controller.php',
            type: 'GET',
            data: {
                op:  'listarCurso',
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
                op:  'listarTemas'
                },
            success: function(result){
                $("#idacordeon").html(result);
            }
        });
    }

    function cargarTemasCursoModales(){
        $.ajax({
            url: '../controllers/tema.controller.php',
            type: 'GET',
            data: {
                op:  'listarTemasModales'
                },
            success: function(result){
                $("#idmodales").html(result);
            }
        });
    }

    function cargarOpiniones(){
        $.ajax({
            url: '../controllers/opinion.controller.php',
            type: 'GET',
            data: {
                op:  'listarOpiniones'
                },
            success: function(result){
                $("#opinionesListadas").html(result);
            }
        });
    }

    cargarOpiniones();
    cargarDatosCurso();
    cargarTemasCursoModales();
    cargarTemasCurso();
    
});