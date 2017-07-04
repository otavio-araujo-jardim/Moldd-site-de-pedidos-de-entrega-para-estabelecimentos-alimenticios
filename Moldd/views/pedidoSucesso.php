<?php
	$params = $this->getParams();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Sucesso</title>

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/base.css">
	<link rel="stylesheet" href="views/css/pedidoSucesso.css">
	<link rel="stylesheet" href="views/css/menuPadrao.css">
	<link rel="stylesheet" href="views/css/rodape.css">
	<link rel="stylesheet" href="views/css/parallax.css">
</head>
<body>

<?php
    require_once 'menuPadraoCliente.php';
?>


	<article class="sucesso clearfix" align="center">

		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4" align="center">
					<img class="img-responsive" src="views/imagens/like.png">
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="sucesso__caixa-texto">
						<div class="sucesso__texto">
							Pedido Feito Com <strong>Sucesso !</strong>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-md-4">
					<div class="sucesso__caixa-botao">
						<a href="?controle=pedido&acao=pagPedidosRealizadosCliente" class="botao botao--vermelho sucesso__botao">Pedidos Realizados</a>
					</div>
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