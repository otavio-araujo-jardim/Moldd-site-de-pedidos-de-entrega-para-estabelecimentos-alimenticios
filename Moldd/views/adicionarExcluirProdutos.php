<?php
	$params = $this->getParams();
	$listaProdutos = $params['listaProdutos'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Cadastrar/excluir produtos</title>

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/base.css">
	<link rel="stylesheet" href="views/css/adicionarExcluirProdutos.css">
	<link rel="stylesheet" href="views/css/cabecalhoPadrao.css">
	<link rel="stylesheet" href="views/css/rodape.css">
	<link rel="stylesheet" href="views/css/parallax.css">
</head>
<body>

<?php
	$titulo = "Adicionar/Excluir produtos";
	require_once 'cabecalhoPadrao.php';
?>

<div class="layout-abas">
	<div class="abas">

		<div class="container">
			<main class="formulario">
				<h3 class="formulario_titulo-principal">Adicionar Produtos</h3>
				<form action="#" method="post" class="clearfix" enctype="multipart/form-data">

					<div class="row">

						<div class="col-xs-12 formulario__campo">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-cutlery"></span>
										<label for="nome">Nome</label>
									</div>
									<input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required="required">
								</div>
							</div>
						</div>

					</div>

					<div class="row">						

						<div class="col-xs-12 col-md-9 formulario__campo">
							<div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-picture"></span>
                                        <label for="id-botao-img">Imagem do Produto</label>
                                    </div>
                                    <input type="file" id="id-botao-img" class="form-control botao-img" name="imagem" accept="image/png">
                                </div>
                            </div>
						</div>

						<div class="col-xs-12 col-md-3 formulario__campo">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-usd"></span>
										<label for="preco">Preço</label>
									</div>
									<input type="text" id="preco" name="preco" class="form-control mascaraDinheiro" placeholder="Preço" required="required">
								</div>
							</div>
						</div>						

					</div>

					<input type="hidden" name="controle" value="produto">
					<input type="hidden" name="acao" value="cadastrar">

					<input type="submit" value="Cadastrar" class="botao botao--vermelho">
				</form>
			</main>
		</div>

		<div class="layout-fundo">

			<?php
				
				if ($listaProdutos != false) {


				foreach ($listaProdutos as $produto) {

				?>
			<div class="layout-lista">
				<div class="container">
					<div class="item">
						<div class="row">
							<div class="col-xs-12 col-sm-4 col-md-3" align="center">
								<div class="item__mudar">



								<?php if (file_exists('views/produtos-Estabelecimentos/produtos-Estabelecimentos-'. $_SESSION['usuario'].'-'.$produto->getId().'.png')) { 

                                    echo "<img class='img-responsive' src='views/produtos-Estabelecimentos/produtos-Estabelecimentos-". $_SESSION['usuario'].'-'.$produto->getId().".png'>";

                                } else { ?>

                               		<img class="img-responsive" src="https://api.adorable.io/avatars/250/fotoPerfilUsuario.png">

                                <?php } ?>   

									<div class="pedido__caixa-botao" align="center">
										<?php echo '<button class="item__mudar-foto" data-toggle="modal" data-target="#mudar-imagem-'.$produto->getId().'">Mudar Imagem</button>'?>
									</div>

								</div>


								<?php echo '<div class="modal fade carrinho" id="mudar-imagem-'.$produto->getId().'">'?>
									<div class="modal-dialog carrinho__janela">
										<div class="modal-content">

											<div class="modal-header">

												<button type="button" data-dismiss="modal" class="close carrinho__botao-fechar">
													<span>&times;</span>
												</button>
												<h2 class="carrinho__titulo">Mudar Imagem do Produto</h2>

											</div>



											<form action="#" method="post" class="clearfix" enctype="multipart/form-data">

												<div class="modal-body">
													<div class="formulario formulario--imagem">

														<div class="row">						

															<div class="col-xs-12 formulario__campo">
																<div class="form-group">
										                            <div class="input-group">
										                                <div class="input-group-addon">
										                                    <span class="glyphicon glyphicon-picture"></span>
										                                    <label for="id-botao-img">Imagem do Produto</label>
										                                </div>
										                                <input type="file" id="id-botao-img" class="form-control botao-img" name="imagem" accept="image/png">
										                            </div>
										                        </div>
															</div>

														</div>
													</div>

												</div>

												<div class="modal-footer">
													
													<input type="hidden" name="controle" value="produto">
													<input type="hidden" name="acao" value="salvarImagemProduto">
													<?php echo '<input type="hidden" name="idProduto" value="'.$produto->getId().'">'?>

													<input type="submit" value="Salvar" class="botao botao--vermelho botao--imagem">

												</div>

											</form>

										</div>
									</div>
								</div>

							</div>

							<div class="col-xs-12 col-sm-8 col-md-9">
								<div class="item__informaçoes">
									<h2><?php echo $produto->getNome() ?></h2>
									<h4><strong>Preço: </strong>R$ <?php echo str_replace(".",",", $produto->getPreco()) ?></h4>
								</div>
							</div>
						</div>

						<div class="row">

							<div class="item__botoes clearfix" align="center">

								<div class="col-xs-12 col-sm-3 col-sm-offset-9 col-lg-2 col-lg-offset-10">
									<?php 

										echo  '<button type="button" data-toggle="modal" data-target="#id-excluir-'.$produto->getId().'" class="botao botao--vermelho item__botao">												  
												  Excluir
											  </button>';

									?>
								</div>	
								
							</div>

							<div class="excluir-pro">
									<?php echo 
									'<div class="modal fade" id="id-excluir-'.$produto->getId().'">'?>
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" data-dismiss="modal" class="close excluir-pro__botao-fechar">
														<span>&times;</span>
													</button>
													<h3 class="modal-title excluir-pro__titulo">Excluir produto</h3>
												</div>

												<div class="modal-body">
													Deseja realmente excluir este produto ?
												</div>

												<div class="modal-footer">
													<div class="row">
														<div class="col-xs-12 col-sm-6">
															<button type="button" data-dismiss="modal" class="botao botao--amarelo excluir-pro__botao"> Cancelar </button>
														</div>

														<div class="col-xs-12 col-sm-6">
															<?php

																echo "<a href='?controle=produto&acao=excluir&idProduto=".$produto->getId()."' class='botao botao--vermelho excluir-pro__botao'>Excluir</a>";

															?>
														</div>											
													</div>
												</div>
											</div>
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
								&nbsp&nbsp Não há produtos cadastrados ainda.
							</div>
						</div>
					</div>';

			 }

			?>

		</div>

	</div>
</div>

<?php
	
	if ($listaProdutos != false) {

?>

<div class="layout-botao-alterar">
	<div class="botao-alterar">
		<div class="container">
			<button class="botao botao--amarelo botao-alterar__botao">
				<span class="glyphicon glyphicon-cutlery"></span>
				Alterar Cardapio
			</button>
		</div>
	</div>
</div>

<?php

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
<script src="views/js/jquery.mask.min.js"></script>
<script src="views/js/inputMascara.js"></script>
<script src="views/js/parallax.js"></script>
<script src="views/js/voltarTopo.js"></script>
</body>
</html>