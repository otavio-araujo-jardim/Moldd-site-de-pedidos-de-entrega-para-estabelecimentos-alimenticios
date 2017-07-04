<?php
	$params = $this->getParams();
	$listaEnderecos = $params['listaEnderecos'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Adicionar/Excluir Endereço</title>

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/base.css">
	<link rel="stylesheet" href="views/css/adicionarExcluirEndereco.css">
	<link rel="stylesheet" href="views/css/cabecalhoPadrao.css">
	<link rel="stylesheet" href="views/css/rodape.css">
	<link rel="stylesheet" href="views/css/parallax.css">
</head>
<body>

<?php
	$titulo = "Adicionar/Excluir Endereço";
	require_once 'cabecalhoPadrao.php';
?>

<main class="layout-cadastro">
	<div class="container">
		<div class="cadastro">
			<form action="#" method="post" class="clearfix">

				<div class="row">
					<div class="col-xs-12 col-sm-3" align="center">
						<div class="cadastro__foto-perfil" align="center">
							<img class="img-responsive" src="views/imagens/Endereco.png">
						</div>
					</div>

					<div class="col-xs-12 col-sm-9 ">
						<div class="formulario">

							<div class="col-xs-12 col-md-4">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-globe"></span>
											<label for="cep">CEP</label>
										</div>
										<input type="text" id="cep" name="cep" class="form-control mascaraCep" maxlength="8" placeholder="CEP" required="required">
									</div>
								</div>
							</div>

							<div class="col-xs-12 col-md-8">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-road"></span>
											<label for="estado">Estado</label>
										</div>
										<input type="text" id="estado" name="estado" class="form-control" placeholder="Estado" required="required">
									</div>
								</div>
							</div>

							<div class="col-xs-12 col-md-8">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-map-marker"></span>
											<label for="endereco">Endereço</label>
										</div>
										<input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço" required="required">
									</div>
								</div>
							</div>

							<div class="col-xs-12 col-md-4">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-home"></span>
											<label for="numero">Núnero</label>
										</div>
										<input type="text" id="numero" name="numero" class="form-control" placeholder="Número" required="required">
									</div>
								</div>
							</div>

							<div class="col-xs-12">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-question-sign"></span>
											<label for="complemento">Complemento</label>
										</div>
										<input type="text" id="complemento" name="complemento" class="form-control" placeholder="Complemento">
									</div>
								</div>
							</div>

							<input type='hidden' name='controle' value='Endereco'>
                            <input type='hidden' name='acao' value='manterEndereco'>

							<div class="col-xs-12 col-sm-6 col-sm-offset-6">
								<input type="submit" value="Adicionar Endereço" class="botao botao--vermelho">
							</div>

						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</main>

<div class="layout-fundo clearfix">

	<div class="layout-lista">
		<div class="container">
			<div class="row">
				<?php
					if ($listaEnderecos != false) {						
					
						foreach ($listaEnderecos as $endereco) {					
				?>
					<div class="col-xs-12 col-md-6">
						<div class="item">
							

							<?php

							echo   '<button type="button" data-toggle="modal" data-target="#id-excluir-'.$endereco->getId().'" class="item__botao-excluir">
									  <span class="glyphicon glyphicon-remove"></span>
									  Excluir
								  </button>'; 

							?>							

							<div class="row">

								<div class="col-xs-12 col-md-4 item__simbolo">
									<span class="glyphicon glyphicon-map-marker"></span>
								</div>

								<div class="col-xs-12 col-md-8 item__informaçoes">

									<p class="item__cep"><strong>CEP: </strong><?php echo $endereco->getCep() ?></p>
									<p class="item__estado"><strong>Estado: </strong><?php echo $endereco->getEstado() ?></p>
									<p class="item__endereco"><strong>Endereço: </strong><?php echo $endereco->getEndereco() ?></p>
									<p class="item__numero"><strong>Número: </strong><?php echo $endereco->getNumero() ?></p>
									<p class="item__comp"><strong>Complemento: </strong><?php echo $endereco->getComplemento() ?></p>

								</div>

							</div>

						</div>
					</div>

					<div class="excluir-end">
						<?php echo 
						'<div class="modal fade" id="id-excluir-'.$endereco->getId().'">'?>
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" data-dismiss="modal" class="close excluir-end__botao-fechar">
											<span>&times;</span>
										</button>
										<h3 class="modal-title excluir-end__titulo">Excluir Endereço</h3>
									</div>

									<div class="modal-body">
										Deseja realmente excluir este endereço ?
									</div>

									<div class="modal-footer">
										<div class="row">
											<div class="col-xs-12 col-sm-6">
												<button type="button" data-dismiss="modal" class="botao botao--amarelo excluir-end__botao"> Cancelar </button>
											</div>

											<div class="col-xs-12 col-sm-6">
												<?php

													echo   '<a href="?controle=endereco&acao=excluirEndereco&id='.$endereco->getId().'" class="botao botao--vermelho excluir-end__botao">
																Excluir
															</a>';

												?>
											</div>											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				<?php
						}

					} else {

						echo '<div class="row alerta">
								<div class="col-xs-12 col-md-offset-3 col-sm-6">
									<div class="alert alert-danger">
										<span class="glyphicon glyphicon-info-sign barra__icone"></span>
										&nbsp&nbsp Não há endereços cadastrados ainda
									</div>
								</div>
							</div>';

					}
				?>

			</div>

		</div>
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
<script src="views/js/jquery.mask.min.js"></script>
<script src="views/js/inputMascara.js"></script>
<script src="views/js/parallax.js"></script>
<script src="views/js/voltarTopo.js"></script>
</body>
</html>