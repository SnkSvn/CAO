$(document).ready(function(){
    var limite = 0;
    function getCards(){
        $.ajax({
            url: '../controllers/curso.controller.php',
            type: 'GET',
            data: {
                op:  'listarCardsLimit',
                limite: limite
                },
            success: function(result){
                $("#vista-cursos").html(result);
            }
        });
    }
    
    function actualizar(){
        $.ajax({
            url: '../controllers/curso.controller.php',
            type: 'GET',
            data: {op:  'iniciarCards'}
        });
    }
    

    $("#idnavcursos").click(actualizar);
    $("#nextCard").click(getCards);
    $("#previousCard").click(actualizar);
    getCards();
    
});