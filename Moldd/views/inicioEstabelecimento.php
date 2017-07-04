<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Inicio</title>

    <link rel="stylesheet" href="views/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/base.css">
    <link rel="stylesheet" href="views/css/inicioEstabelecimento.css">
    <link rel="stylesheet" href="views/css/menuPadrao.css">
    <link rel="stylesheet" href="views/css/rodape.css">
    <link rel="stylesheet" href="views/css/parallax.css">
</head>
<body>

<?php
    require_once 'menuPadraoEstabelecimento.php';
?>

<article class="layout-inicio">
    <div class="container">

        <div class="inicio clearfix">

            <div class="col-xs-12 col-md-4" align="center">
                <img class="img-responsive" src="views/imagens/pedidosRealizados.png">
                <a href="?controle=pedido&acao=pagpedidosRealizados" class="botao botao--vermelho inicio__botao">Pedidos Realizados</a>
            </div>

            <div class="col-xs-12 col-md-4 col-md-4" align="center">
                <img class="img-responsive" src="views/imagens/pedidosFinalizados.png">
                <a href="?controle=pedido&acao=pagPedidosFinalizados" class="botao botao--amarelo inicio__botao">Pedidos Finalizados</a>
            </div>

            <div class="col-xs-12 col-md-4 col-md-4" align="center">
                <img class="img-responsive" src="views/imagens/alterarCardapio.jpg">
                <a href="?controle=estabelecimento&acao=pagAlterarCardapio" class="botao botao--vermelho inicio__botao">Alterar Cardápio</a>
            </div>

        </div>

    </div>
</article>

<footer class="layout-rodape">
    Direitos Autorais
</footer>

<script src="views/js/jquery-3.1.1.min.js"></script>
<script src="views/js/bootstrap.min.js"></script>
<script src="views/js/parallax.js"></script>
</body>
</html>


<script type="text/javascript">

        $("#menu__item-inicio").addClass('menu__item-selecionado');

</script>