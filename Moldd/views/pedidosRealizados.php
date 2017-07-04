<?php
	$params = $this->getParams();
	$infoPedidos = $params['infoPedidos'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Pedidos Realizados</title>

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/base.css">
	<link rel="stylesheet" href="views/css/pedidosRealizados.css">
	<link rel="stylesheet" href="views/css/menuPadrao.css">
	<link rel="stylesheet" href="views/css/rodape.css">
	<link rel="stylesheet" href="views/css/parallax.css">
</head>
<body>

<?php
    require_once 'menuPadraoCliente.php';
?>

	<div class="layout-pedidos">
		<div class="container">
			<div class="row">
				
				<?php

					if ($infoPedidos != false) {

						foreach ($infoPedidos as $infoPedido) {

				?>

				<div class="col-xs-12 col-md-6">
					<div class="pedido clearfix">
						<h4 class="pedido__titulo">Pedido Realizado Em &nbsp; <span><?php $data = new DateTime($infoPedido[0]->getData_Realizacao());                 																		  echo $data->format('d / m / Y');?></span> as <span><?php $data = new DateTime($infoPedido[0]->getData_Realizacao());                 
																		  echo $data->format('H:i');?></span></h4>

						<div class="pedido__logomarca" align="center">

							<?php
							if (file_exists('views/imagem-Perfil/imagem-Perfil-Estabelecimento/perfil-estabelecimento-'. $infoPedido[3] .'.png')) { 

		                        echo '<img class="img-responsive pedido__cliente-img" src="views/imagem-Perfil/imagem-Perfil-Estabelecimento/perfil-estabelecimento-'. $infoPedido[3] .'.png">';

		                    } else { ?>

		                   		<img class="img-responsive" src="https://api.adorable.io/avatars/200/ImagenEstabelecimento.png">
		                    <?php } ?>

							
							<h4 class="pedido__nome-estabelecimento"><?php echo $infoPedido[1] ?></h4>
						</div>

						<p class="pedido__informacao"><strong>Data da Entrega : </strong> <?php $data = new DateTime($infoPedido[0]->getData_Entrega());                 																		  echo $data->format('d / m / Y');?></p>
						<p class="pedido__informacao"><strong>Hora da Entrega : </strong> <?php $data = new DateTime($infoPedido[0]->getData_Entrega());                 
																		  echo $data->format('H:i');?></p>

						<div class="pedido__caixa-botao" align="center">
							<?php echo '<button class="botao botao--amarelo pedido__botao" data-toggle="modal" data-target="#pedido__modal'.$infoPedido[0]->getId().'">Ver Produtos</button>'?>
						</div>

						<?php echo '<div class="modal fade carrinho" id="pedido__modal'.$infoPedido[0]->getId().'">'?>
							<div class="modal-dialog carrinho__janela">
								<div class="modal-content">

									<div class="modal-header">

										<button type="button" data-dismiss="modal" class="close carrinho__botao-fechar">
											<span>&times;</span>
										</button>
										<h2 class="carrinho__titulo">Produtos</h2>

									</div>

									<div class="modal-body">
										<div class="carrinho__lista">
												<?php
													foreach ($infoPedido[2] as $item) {															

												?>
													<div class="item">
														<div class="row">
															
															<div class="col-xs-12 col-md-3" align="center">
																
																<?php
																	if (file_exists('views\produtos-Estabelecimentos/produtos-Estabelecimentos-'. $infoPedido[3] .'-'. $item[1]->getId() .'.png')) { 

												                        echo '<img class="img-responsive pedido__cliente-img" src="views\produtos-Estabelecimentos/produtos-Estabelecimentos-'. $infoPedido[3] .'-'. $item[1]->getId() .'.png">';

												                    } else { ?>

												                   		<img class="img-responsive item__img" src="https://api.adorable.io/avatars/150/ImagenComida.png">

												                    <?php } ?>

															</div>

															<div class="col-xs-12 col-md-7">
																<div class="item__info clearfix">
																	<div class="item__cabecalho">
																		<h4 class="item__nome"><?php echo $item[1]->getNome() ?></h4>
																		<h4 class="item__preco"><?php echo $item[1]->getPreco() ?></h4>
																	</div>
																	<h5><strong>Solicitação : </strong> <?php echo $item[0]->getSolicitacao() ?> </h5>
																</div>											
															</div>

															<div class="col-xs-12 col-md-2" align="center">
																<div class="item__caixa-botoes">
																	<div class="item__botoes">
																		<strong>Quantidade :</strong>
																		<span class="item__quantidade"><strong><?php echo $item[0]->getQuantidade() ?></strong></span>
																	</div>
																</div>								
															</div>

														</div>
													</div>

												<?php
													}
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
									&nbsp&nbsp nenhum pedido foi realizado.
								</div>
							</div>
						</div>';
					}

				?>

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
	<script src="views/js/parallax.js"></script>
	<script src="views/js/voltarTopo.js"></script>
</body>
</html>