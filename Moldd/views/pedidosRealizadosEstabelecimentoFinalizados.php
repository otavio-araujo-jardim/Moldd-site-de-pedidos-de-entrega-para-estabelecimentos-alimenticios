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
	<link rel="stylesheet" href="views/css/pedidosRealizadosEstabelecimentoFinalizados.css">
	<link rel="stylesheet" href="views/css/cabecalhoPadrao.css">
	<link rel="stylesheet" href="views/css/rodape.css">
	<link rel="stylesheet" href="views/css/parallax.css">
</head>
<body>

<?php
            $titulo = "Pedidos Finalizados";
            require_once 'cabecalhoPadrao.php';
        ?>
	<?php
		if ($infoPedidos != false) {
		
			foreach ($infoPedidos as $infoPedido) {

	?>
	<div class="layout-pedido">
		<div class="container">
			
			<article class="pedido clearfix">
				<div class="col-xs-12 col-md-4" align="center">
					<section class="pedido__cliente">

						<?php
						if (file_exists('views/imagem-Perfil/imagem-Perfil-Cliente/perfil-cliente-'. $infoPedido[5] .'.png')) { 

	                        echo '<img class="img-responsive pedido__cliente-img" src="views/imagem-Perfil/imagem-Perfil-Cliente/perfil-cliente-'. $infoPedido[5] .'.png">';

	                    } else { ?>

	                   		<img class="img-responsive pedido__cliente-img" src="https://api.adorable.io/avatars/250/fotoPerfilUsuario.png">

	                    <?php } ?>

						<h4 class="pedido__cliente-item"><?php echo $infoPedido[1] ?></h4>
						<h5 class="pedido__cliente-item"><strong>Telefone: </strong> <?php echo $infoPedido[2] ?></h5>
					</section>					
				</div>

				<div class="col-xs-12 col-md-8">
					<section class="pedido__dados">
						<section class="pedido__secao">
							
							<h5><strong>CEP : </strong> <?php echo $infoPedido[3]->getCep() ?></h5>
							<h5><strong>Endereço : </strong> <?php echo $infoPedido[3]->getEndereco() ?></h5>							

							
							<h5><strong>Número : </strong> <?php echo $infoPedido[3]->getNumero() ?></h5>
								
							<h5><strong>Complemento : </strong> <?php echo $infoPedido[3]->getComplemento() ?></h5>
						</section>

						<section class="pedido__secao">
							
							<h5><strong>Data de Entrega : </strong> <?php $data = new DateTime($infoPedido[0]->getData_entrega());                 
																		  echo $data->format('d-m-Y');?></h5>							

							
							<h5><strong>Hora de Entrega : </strong> <?php $data = new DateTime($infoPedido[0]->getData_entrega());                 
																		  echo $data->format('H:i:s');?></h5>
							
						</section>

						<section class="clearfix">

							<div class="col-xs-12 col-md-offset-3 col-md-6">
								<?php echo '<button type="button" class="botao botao--amarelo" data-toggle="modal" data-target="#id-lista'.$infoPedido[0]->getId().'">
												Produtos
											</button>'?>							
							</div>							
							
							<?php echo '<div class="modal fade lista" id="id-lista'.$infoPedido[0]->getId().'">'?>
								<div class="modal-dialog lista__janela">
									<div class="modal-content">

										<div class="modal-header">

											<button type="button" data-dismiss="modal" class="close lista__botao-fechar">
												<span>&times;</span>
											</button>
											<h2 class="lista__titulo">Pedido de <?php echo $infoPedido[1] ?></h2>

										</div>

										<div class="modal-body">
											<div class="lista__itens">	
													<?php
														foreach ($infoPedido[4] as $item) {

													?>
														
														<div class="item">
															<div class="row">
																
																<div class="col-xs-12 col-md-3" align="center">
																	
																	<?php
																	if (file_exists('views\produtos-Estabelecimentos/produtos-Estabelecimentos-'. $_SESSION['usuario'] .'-'. $item[1]->getId() .'.png')) { 

												                        echo '<img class="img-responsive pedido__cliente-img" src="views\produtos-Estabelecimentos/produtos-Estabelecimentos-'. $_SESSION['usuario'] .'-'. $item[1]->getId() .'.png">';

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
							
						</section>
					</section>
				</div>
			</article>

		</div>
	</div>
	<?php

			}
		} else {
			//recado dizendo que não há pedidos finalizados

			echo '<div class="row alerta">
					<div class="col-xs-12 col-md-offset-3 col-sm-6">
						<div class="alert alert-danger">
							<span class="glyphicon glyphicon-info-sign barra__icone"></span>
							&nbsp&nbsp Não há pedidos finalizados.
						</div>
					</div>
				</div>';
		}
	?>


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