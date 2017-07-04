<?php
	$params = $this->getParams();
	$listaProdutos = $params['listaProdutos'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Alterar Cardápio</title>

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/base.css">
	<link rel="stylesheet" href="views/css/alterarCardapio.css">
	<link rel="stylesheet" href="views/css/cabecalhoPadrao.css">
	<link rel="stylesheet" href="views/css/rodape.css">
	<link rel="stylesheet" href="views/css/parallax.css">
</head>
<body>

<?php
	$titulo = "Alterar Cardápio";
	require_once 'cabecalhoPadrao.php';
?>

<div class="layout-lista-cardapio">
	<div class="lista-cardapio">

		<form action="" method="post" class="layout-fundo clearfix">
					<?php

					if ($listaProdutos != false) {

						$contador = 0;
						foreach ($listaProdutos as $produto) {

					?>
						<div class="layout-lista">
							<div class="container">
								<div class="item">
									<div class="row">

										<div class="col-xs-12 col-sm-4 col-md-3" align="center">
											<div class="item__foto">
												<img class="img-responsive" src="https://api.adorable.io/avatars/250/ImagenComida.png">
											</div>
										</div>

										<div class="col-xs-12 col-sm-5 col-md-7">
											<div class="item__informaçoes">
												<h2><?php echo $produto->getNome() ?></h2>
												<h4><?php echo $produto->getPreco() ?></h4>
											</div>
										</div>

										<div class="col-xs-12 col-sm-3 col-md-2 item_caixa-botao" align="center">
											<div class="btn-group item__botao" data-toggle="buttons">

												<?php 
												if ($produto->getAtivo()) {
														echo '<label class="btn item__botao-verde active">';
														echo '<input type="radio" name="colocar-'. $contador .'" value="1" checked autocomplete="off">';
													} else {
														echo '<label class="btn item__botao-verde">';
														echo '<input type="radio" name="colocar-'. $contador .'" value="1" autocomplete="off">';
													}
												?>
													<span class="glyphicon glyphicon-ok"></span>
												</label>

												<?php 
												if (!$produto->getAtivo()) {
														echo '<label class="btn item__botao-vermelho active">';
														echo '<input type="radio" name="colocar-'. $contador .'" value="0" checked autocomplete="off">';
													} else {
														echo '<label class="btn item__botao-vermelho">';
														echo '<input type="radio" name="colocar-'. $contador .'" value="0" autocomplete="off">';
													}
												?>
													<span class="glyphicon glyphicon-remove"></span>
												</label>

											</div>
										</div>

									</div>

									<?php echo '<input type="hidden" name="id-'. $contador .'" value="'. $produto->getId() .'">';?>
								</div>
							</div>
						</div>
					<?php
							$contador++;
						 }
					?>				

					<div class="layout-salvar">
						<div class="container">
							<div class="salvar">
								<input type="hidden" name="controle" value="produto">
								<input type="hidden" name="acao" value="alterarCardapio">

								<input type="submit" value="Salvar Alterações" class="botao botao--vermelho">
							</div>
						</div>
					</div>

				<?php

				} else {


						echo '<div class="row alerta">
								<div class="col-xs-12 col-md-offset-3 col-sm-6">
									<div class="alert alert-danger">
										<span class="glyphicon glyphicon-info-sign"></span>
										&nbsp&nbsp Não há produtos cadastrados ainda.
										<a href="?controle=produto&acao=pagAdicionarExcluirProdutos">Adicione um produto</a> antes de voltar a esta pagina.
									</div>
								</div>
							</div>';

				}

				?>

		</form>

	</div>
</div>
	
	<button type="button" id="botao-voltar-topo" class="botao-voltar-topo">
		<span class="glyphicon glyphicon-chevron-up"></span>
	</button>

	<footer class="layout-rodape">
		Direitos Autorais
	</footer>
	<script src="views/js/jquery-3.1.1.min.js"></script>
	<script src="views/js/bootstrap.min.js"></script>
	<script src="views/js/parallax.js"></script>
	<script src="views/js/voltarTopo.js"></script>
</body>
</html>