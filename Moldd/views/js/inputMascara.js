$(document).ready(function () {

    $('.mascaraTelefoneDDD').mask('(00) 00000-0000');
    $('.mascaraCnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.mascaraCep').mask('00000-000');
    $('.mascaraDinheiro').mask("000.000.000.000.000,00", {reverse: true});
    
});