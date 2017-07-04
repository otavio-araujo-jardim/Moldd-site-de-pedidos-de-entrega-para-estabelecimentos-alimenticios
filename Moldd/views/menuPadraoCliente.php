<?php
	$listaEstabelecimento = $params['listaEstabelecimento'];
?>

<link rel="stylesheet" href="views/css/menuPadrao.css">

<header>


		<div class="layout-barra-usuario">
			<div class="container">
				<nav class="barra clearfix">
					<div  align="center">
						<ul class="barra__itens">
							<li class="barra__item">
								<span class="barra__nome"><?php echo $_SESSION['nome']?> <span class="caret"></span></span>
								<ul class="barra__itens-escondidos">
									<li class="barra__item-escondido">
										<a href="?controle=cliente&acao=pagConfiguracao">
											<span class="glyphicon glyphicon-cog barra__icone"></span>
											Configurações
										</a>
									</li>
									<li class="barra__item-escondido">
										<a href="?controle=pedido&acao=pagPedidosRealizadosCliente">
										<span class="glyphicon glyphicon-cutlery barra__icone"></span>
										Pedidos Realizados
										</a>
									</li>
									<li class="barra__item-escondido">
										<a href="?controle=endereco&acao=pagAdicionarExcluirEndereco">
										<span class="glyphicon glyphicon-map-marker barra__icone"></span>
										Adicionar/Excluir Endereços
										</a>
									</li>
									<li class="barra__item-escondido">
										<a href="?controle=usuario&acao=sair">
                                           <span class="glyphicon glyphicon-log-out barra__icone"></span>
                                           Sair
                                       </a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	<div class="layout-cabecalho parallax" data-speed="10">

		<div class="container">
			<div class="layout-banner">

				<div class="banner">

					<a class="banner__link" href="index.php"><img  class="banner__logo" src="views/imagens/LogoMoldd.png" alt=""></a>

					<img class="banner__img" src="views/imagens/ChefeMoldd.png">

				</div>

			</div>
		</div>
	</div>

	<nav class="navbar navbar-inverse layout-menu">
		<div class="container">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#idmenu">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse menu" id="idmenu">
				<ul class="nav navbar-nav">
					<li id="menu__item-procurar-estabelecimento">
						<a href="?controle=cliente&acao=pagProcurarEstabelecimentos" class="menu__item ">PROCURAR ESTABELECIMENTOS</a>
					</li>

					<li>
						<a href="?controle=usuario&acao=pagComoFunciona" class="menu__item">COMO FUNCIONA</a>
					</li>

					<li>
                        <a href="?controle=comentario&acao=pagcomentarios" class="menu__item">COMENTÁRIOS</a>
                    </li>

					<li>
						<a href="?controle=usuario&acao=pagContato" class="menu__item ">CONTATO</a>
					</li>

				</ul>

				<ul class="nav navbar-nav">
					<li>
						<a href="#" class="dropdown-toggle menu__botao-dropdown" data-toggle="dropdown">
							ESTABELECIMENTOS RECENTES
							<span class="caret"></span>
						</a>
						<div class="dropdown-menu menu__recentes">
							<ul class="list-unstyled">

							<?php

							foreach ($listaEstabelecimento as $Estabelecimento) {

							?>

								<li class="menu__item-recentes">
									<?php

									echo 
									'<a href="?controle=estabelecimento'.
											 '&acao=pagCardapio'.
											 '&id='.$Estabelecimento->getId().'">

										<span class="glyphicon glyphicon-cutlery barra__icone"></span>										 
										</br>'.
										$Estabelecimento->getNome(). 
										'</br>'. 
										$Estabelecimento->getCep().', '.
										$Estabelecimento->getEndereco().', '.
										$Estabelecimento->getNumero().'

										

									</a>'

									?>
								</li>

							<?php

							}
								
							?>

							</ul>
						</div>
					</li>
				</ul>

			</div>

		</div>
	</nav>

</header>