var offset = $('#js-carrinho').offset().top;

var $carrinho = $('#js-carrinho'); // guardar o elemento na memoria para melhorar performance

$(document).on('scroll', function () {
    if (offset <= $(window).scrollTop()) {
        $carrinho.addClass('caixa-carrinho-fixado');
    } else {
        $carrinho.removeClass('caixa-carrinho-fixado');
    }
});