$(document).ready(function(){

    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('#botao-voltar-topo').fadeIn();
        } else {
            $('#botao-voltar-topo').fadeOut();
        }
    });

    $('#botao-voltar-topo').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
    
});