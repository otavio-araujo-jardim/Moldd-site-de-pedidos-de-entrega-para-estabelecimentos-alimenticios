<?php
	$params = $this->getParams();
	$estabelecimento = $params['estabelecimento'];
	$listaProdutos = $params['listaProdutos'];
	$listaComentarios = $params['listaComentarios'];
	$estrelas = $params['quantEstrelas'];
	date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Cardapio</title>

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/base.css">
	<link rel="stylesheet" href="views/css/cardapioEstabelecimento.css">
	
	<link rel="stylesheet" href="views/css/rodape.css">
	<link rel="stylesheet" href="views/css/parallax.css">

	<script type="text/javascript">
		var produtos = [];

		function carregarCarrinho() {

			if (produtos.length == 0 ) {
				document.getElementById("botao-concluir").disabled=true;
			} else {
				document.getElementById("botao-concluir").disabled=false;
			}

			$('#carrinho__lista').html("");
			$('#lista-produtos').html("");

			for (i=0; i < produtos.length; i++) {

				conteudo =	"<div class='item' id='item-"+produtos[i].id+"'>";
				conteudo +=		"<div class='row'>";

				conteudo +=			"<div class='col-xs-12 col-md-1' align='center'>";
				conteudo +=				"<div class='item__caixa-botao-retirar'>";
				conteudo +=					"<button type='button' onclick='removerProduto("+produtos[i].id+","+i+")' class='item__botao item__botao--retirar'>";
				conteudo +=						"<span class='glyphicon glyphicon-remove'></span>";
				conteudo +=					"</button>";
				conteudo +=				"</div>";
				conteudo +=			"</div>";

				conteudo +=			"<div class='col-xs-12 col-md-3' align='center'>";
				conteudo +=				"<img class='img-responsive item__img' src='https://api.adorable.io/avatars/150/ImagenBebida.png'>";
				conteudo +=			"</div>";

				conteudo +=			"<div class='col-xs-12 col-md-6'>";
				conteudo +=				"<div class='item__info clearfix'>";
				conteudo +=					"<div class='item__cabecalho'>";
				conteudo +=						"<h4 class='item__nome'>"+produtos[i].nome+"</h4>";
				conteudo +=						"<h4 class='item__preco'>"+produtos[i].preco+"</h4>";
				conteudo +=					"</div>";
				conteudo +=				"</div>";
				conteudo +=			"</div>";

				conteudo +=			"<div class='col-xs-12 col-md-2' align='center'>";
				conteudo +=				"<div class='item__caixa-botoes'>";
				conteudo +=					"<div class='item__botoes'>";
				conteudo +=					"<p class='item__quant'>Quantidade:</p>";
				conteudo +=						"<button type='button' onclick='removerQuant("+i+")' class='item__botao'>-</button>";
				conteudo +=						"<span class='item__quantidade'><strong>"+produtos[i].quant+"</strong></span>";
				conteudo +=						"<button type='button' onclick='AddQuant("+i+")' class='item__botao'>+</button>";
				conteudo +=					"</div>";
				conteudo +=				"</div>";
				conteudo +=			"</div>";

				conteudo +=		"</div>";
				conteudo +=		"<input type='hidden' name='produto-"+ i +"' value='"+ produtos[i].id +"'>";
				conteudo +=		"<input type='hidden' name='quant-"+ i +"' value='"+ produtos[i].quant +"'>";
				conteudo +=	"</div>";

				$('#carrinho__lista').append(conteudo);


			}

		}

    	function addProduto(id,nome,preco) {
    		if (!document.getElementById("item-"+id)) {

    			produtoInfo = {id:id,nome:nome,preco:preco,quant:1};

    			produtos.push(produtoInfo);
    			var botao = "botao-item-"+id;
    			document.getElementById(botao).disabled=true;

    			$("#js-carrinho").addClass('caixa-carrinho__aceso');
    			document.getElementById("caixa-carrinho__img").src="views/imagens/carrinho-botao-aceso.png";    

    			setTimeout(function() {

    				$("#js-carrinho").removeClass('caixa-carrinho__aceso');
    				document.getElementById("caixa-carrinho__img").src="views/imagens/carrinho-botao.png";

				}, 500);

			}
	    }

	    function removerProduto(idPro , i) {
	    	produtos.splice(i,1);
	    	var botao = "botao-item-"+idPro;
    		document.getElementById(botao).disabled=false;
    		carregarCarrinho();
	    }

	    function AddQuant(i) {
	    	produtos[i].quant += 1;
	    	carregarCarrinho();
	    }

	    function removerQuant(i) {
	    	if (produtos[i].quant > 1) {
		    	produtos[i].quant -= 1;
		    	carregarCarrinho();
	    	}
	    }

	    function salvarComentario() {

	    	if ($("#texto").val() != "") {

	    		var texto = $("#texto").val();

	    		$.ajax({
	    			method: "POST",
	    			url: "index.php",
					dataType: "Json",
	    			data: { acao : "salvar", controle : "comentario", texto : texto, id : <?php echo $estabelecimento->getId()?>},
	    			async: false
	    		}).done(function( retorno ) {

					if (retorno) {

						

						$('#listaComentarios').html("");

						for(var i = 0; i < retorno.length; i++) {

							conteudoComentario = '';

							conteudoComentario += 	'<div id="id-comentario-' + retorno[i].id_comentario + '">';

							if (<?php echo $_SESSION['usuario'] ?> == retorno[i].id_cliente) {										
								conteudoComentario += 	 '<div class="comentarios__comentario comentarios__comentario--proprio">';
							} else {
								conteudoComentario +=	 '<div class="comentarios__comentario">';
							}

								
								conteudoComentario +=		  '<div class="row">';
								conteudoComentario +=			  '<div class="col-xs-12 col-md-3">';


								if (retorno[i].imgExiste) {

									conteudoComentario +=				  '<img class="img-responsive item__img" src="views/imagem-Perfil/imagem-Perfil-Cliente/perfil-cliente-'+retorno[i].id_cliente+'.png">';

								} else {

									conteudoComentario += '<img class="img-responsive" src="https://api.adorable.io/avatars/250/fotoPerfilUsuario.png">';

								}


								conteudoComentario +=			  '</div>';


								if (<?php echo $_SESSION['usuario'] ?> == retorno[i].id_cliente) {

									conteudoComentario +=		  '<div class="col-xs-12 col-md-7">';
									conteudoComentario +=			  '<h5 class="comentarios__cabecalho">'+ retorno[i].nome+'</h5>';
									conteudoComentario +=			  '<p class="comentarios__texto">'+ retorno[i].texto+'</p>';
									conteudoComentario +=		  '</div>';



									conteudoComentario += 	  	  '<div class="col-xs-12 col-md-2 comentarios__botao-excluir-caixa" align="center">';
									conteudoComentario += 			  '<button onclick="javascript:excluirComentario(' + retorno[i].id_comentario + ');" class="botao comentarios__botao-excluir">';
									conteudoComentario += 				  '<span class="glyphicon glyphicon-remove"></span>';
									conteudoComentario += 			  '</button>';
									conteudoComentario += 		  '</div>';
									

								} else {

									conteudoComentario +=		  '<div class="col-xs-12 col-md-9">';
									conteudoComentario +=			  '<h5 class="comentarios__cabecalho">'+ retorno[i].nome+'</h5>';
									conteudoComentario +=			  '<p class="comentarios__texto">'+ retorno[i].texto+'</p>';
									conteudoComentario +=		  '</div>';

								}						


								


										
								conteudoComentario +=	  		'</div>';
								conteudoComentario +=  		'</div>';

								conteudoComentario +=  '</div>';

								$('#listaComentarios').append(conteudoComentario);

								var texto = $("#texto").val("");
								

						}

					}

					alert('Comentario salvo com sucesso!');
					
	    		});

    		}

    	}

    	function salvarEstrelas(estrelas) {

    		$.ajax({
    			method: "POST",
    			url: "index.php",
    			data: { acao : "salvarVoto", 
    					controle : "Estrelas", 
    					estrelas : estrelas, 
    					id : <?php echo $estabelecimento->getId()?>},
    			async: false

    		}).done(function( retorno ) {

				if (retorno) {

					$('#img-estrelas').html("<img class='estabelecimento-informacao__estrelas' src='views/imagens/"+retorno+"-estrelas.png'>");


					$("#0-estrelas").removeClass('estrelas__opacas');
					$("#0-estrelas").addClass('estrelas__translucidas');

					$("#1-estrelas").removeClass('estrelas__opacas');
					$("#1-estrelas").addClass('estrelas__translucidas');

					$("#2-estrelas").removeClass('estrelas__opacas');
					$("#2-estrelas").addClass('estrelas__translucidas');

					$("#3-estrelas").removeClass('estrelas__opacas');
					$("#3-estrelas").addClass('estrelas__translucidas');

					$("#4-estrelas").removeClass('estrelas__opacas');
					$("#4-estrelas").addClass('estrelas__translucidas');

					$("#5-estrelas").removeClass('estrelas__opacas');
					$("#5-estrelas").addClass('estrelas__translucidas');

    				$("#"+estrelas+"-estrelas").toggleClass('estrelas__opacas');

    				alert("Voto Salvo");

				}

    		});	
    	}

    	function excluirComentario(id_comentario) {

    		$('#id-comentario-' + id_comentario).html('');

    		$.ajax({
    			method: "POST",
    			url: "index.php",
    			data: { acao : "excluirComentario", 
    					controle : "Comentario", 
    					id_comentario : id_comentario
    				  },
    			async: false

    		}).done(function( retorno ) {

				alert("Comentario excluido com sucesso!");

    		});	
    		
    	}

    	function acenderCarrinho() {
    		setTimeout(myFunction, 3000);
    	}

    </script>

</head>
<body>

<?php

    require_once 'menuPadraoCliente.php';

?>

<div class="layout-cardapio">
	<div class="container">
		<div class="row">

			<div class="col-xs-12 col-md-9">
				<div class="estabelecimento-informacao">

					<div class="estabelecimento-informacao__cabecalho">					 

							

							<?php

								$horaInicio = null;
								$horaEncerramento = null;



								if ( date("w") == 0 && $estabelecimento->getHora_encerramento_dom() != null ) {

									$horaInicio = new DateTime($estabelecimento->getHora_inicio_dom());
									$horaEncerramento = new DateTime($estabelecimento->getHora_encerramento_dom());
								
									echo '<h5 class="estabelecimento-informacao__horario"><strong>Horario De Funcionamento de Hoje : &nbsp </strong>'.
											$horaInicio->format('H:i:s') . " - " . $horaEncerramento->format('H:i:s') . 
										 '</h5>';

								}


								if ( date("w") == 1 && $estabelecimento->getHora_encerramento_seg() != null ) {

									$horaInicio = new DateTime($estabelecimento->getHora_inicio_seg());
									$horaEncerramento = new DateTime($estabelecimento->getHora_encerramento_seg());
								
									echo '<h5 class="estabelecimento-informacao__horario"><strong>Horario De Funcionamento de Hoje : &nbsp </strong>'.
											$horaInicio->format('H:i:s') . " - " . $horaEncerramento->format('H:i:s') . 
										 '</h5>';

								}


								if ( date("w") == 2 && $estabelecimento->getHora_encerramento_ter() != null ) {

									$horaInicio = new DateTime($estabelecimento->getHora_inicio_ter());
									$horaEncerramento = new DateTime($estabelecimento->getHora_encerramento_ter());
								
									echo '<h5 class="estabelecimento-informacao__horario"><strong>Horario De Funcionamento de Hoje : &nbsp </strong>'.
											$horaInicio->format('H:i:s') . " - " . $horaEncerramento->format('H:i:s') . 
										 '</h5>';

								}


								if ( date("w") == 3 && $estabelecimento->getHora_encerramento_qua() != null ) {

									$horaInicio = new DateTime($estabelecimento->getHora_inicio_qua());
									$horaEncerramento = new DateTime($estabelecimento->getHora_encerramento_qua());
								
									echo '<h5 class="estabelecimento-informacao__horario"><strong>Horario De Funcionamento de Hoje : &nbsp </strong>'.
											$horaInicio->format('H:i:s') . " - " . $horaEncerramento->format('H:i:s') . 
										 '</h5>';

								}


								if ( date("w") == 4 && $estabelecimento->getHora_encerramento_qui() != null ) {

									$horaInicio = new DateTime($estabelecimento->getHora_inicio_qui());
									$horaEncerramento = new DateTime($estabelecimento->getHora_encerramento_qui());
								
									echo '<h5 class="estabelecimento-informacao__horario"><strong>Horario De Funcionamento de Hoje : &nbsp </strong>'.
											$horaInicio->format('H:i:s') . " - " . $horaEncerramento->format('H:i:s') . 
										 '</h5>';

								}


								if ( date("w") == 5 && $estabelecimento->getHora_encerramento_sex() != null ) {

									$horaInicio = new DateTime($estabelecimento->getHora_inicio_sex());
									$horaEncerramento = new DateTime($estabelecimento->getHora_encerramento_sex());
								
									echo '<h5 class="estabelecimento-informacao__horario"><strong>Horario De Funcionamento de Hoje : &nbsp </strong>'.
											$horaInicio->format('H:i:s') . " - " . $horaEncerramento->format('H:i:s') . 
										 '</h5>';

								}


								if ( date("w") == 6 && $estabelecimento->getHora_encerramento_sab() != null ) {

									$horaInicio = new DateTime($estabelecimento->getHora_inicio_sab());
									$horaEncerramento = new DateTime($estabelecimento->getHora_encerramento_sab());
								
									echo '<h5 class="estabelecimento-informacao__horario"><strong>Horario De Funcionamento de Hoje : &nbsp </strong>'.
											$horaInicio->format('H:i:s') . " - " . $horaEncerramento->format('H:i:s') . 
										 '</h5>';

								}  

								if ($horaInicio == null && $horaEncerramento == null) {

									echo '<h5 class="estabelecimento-informacao__fechado">
											Este estabelecimento 
											<strong>
												não realiza
											</strong>
											entrega de pedidos 
											<strong>
												hoje
											</strong>.
										 </h5>';

								}


								if ($horaInicio != null && $horaEncerramento != null) {
									

									$horaInicio = strtotime($horaInicio->format('H:i:s'));
									$horaEncerramento = strtotime($horaEncerramento->format('H:i:s'));
									$horaAtual = strtotime(date('H:i:s', time()));

									$aberto = false;


									if ($horaInicio >  $horaEncerramento) {										
										

										if ($horaAtual < $meiaNoite && $horaAtual > $horaInicio) {

											echo    '<h5 class="estabelecimento-informacao__aberto">
												Este Estabelecimento 
												
												<strong>
													realiza 
												</strong>
												
												entrega de pedidos 
												
												<strong>
														neste momento.
												</strong>

											</h5>';
											
											$aberto = true;

										} else if ($horaAtual < $meiaNoite && $horaAtual < $horaEncerramento) {

											echo    '<h5 class="estabelecimento-informacao__aberto">
												Este Estabelecimento 
												
												<strong>
													realiza 
												</strong>
												
												entrega de pedidos 
												
												<strong>
														neste momento.
												</strong>

											</h5>';

											$aberto = true;

										} else {

											echo    '<h5 class="estabelecimento-informacao__fechado">
												Este Estabelecimento
												
												<strong>
													não realiza
												</strong>
												
												entrega de pedidos 
												
												<strong>
														neste momento.
												</strong>

											</h5>';

											$aberto = false;

										}										


									} else if ($horaAtual > $horaInicio && $horaAtual < $horaEncerramento) {

										echo    '<h5 class="estabelecimento-informacao__aberto">
													Este Estabelecimento
													
													<strong>
														realiza 
													</strong>
													
													entrega de pedidos 
													
													<strong>
															neste momento.
													</strong>

												</h5>';

												$aberto = true;

									} else {

										echo    '<h5 class="estabelecimento-informacao__fechado">
													Este Estabelecimento
													
													<strong>
														não realiza
													</strong>
													
													entrega de pedidos 
													
													<strong>
															neste momento.
													</strong>

												</h5>';

												$aberto = false;


									}
								}

								?>
							

						<h2 class="estabelecimento-informacao__titulo"><strong><?php echo $estabelecimento->getNome()?></strong></h2>
						<h5 class="estabelecimento-informacao__tipo"><strong>tipo: </strong><?php echo $estabelecimento->getTipo()?></h5>
						<h5 class="estabelecimento-informacao__telefone"><strong>Telefone: </strong><?php echo $estabelecimento->getTelefone()?></h5>

						<div id="img-estrelas" class='estabelecimento-informacao__estrelas' >
							<?php echo "<img src='views/imagens/".round($estabelecimento->getEstrelas())."-estrelas.png'>";?>
						</div>
					</div>

					<div class="row">

						<div class="col-xs-12 col-sm-5" align="center">
							<?php


								 if (file_exists('views/imagem-Perfil/imagem-Perfil-Estabelecimento/perfil-estabelecimento-'. $estabelecimento->getId().'.png')) { 

                                    echo "<img class='img-responsive' src='views/imagem-Perfil/imagem-Perfil-Estabelecimento/perfil-estabelecimento-". $estabelecimento->getId().".png'>";

                                } else { ?>

                                <img class="img-responsive" src="https://api.adorable.io/avatars/250/fotoPerfil-estabelecimento.png">

                           	<?php 

                           		}

							?>
						</div>

						<div class="col-xs-12 col-sm-7">
							<div class="row">
								<div class=" col-xs-12 col-md-6 estabelecimento-informacao__endereco">
									<p><strong>CEP : </strong><?php echo $estabelecimento->getCep()?></p>
									<p><strong>Estado : </strong><?php echo $estabelecimento->getEstado()?></p>
								</div>

								<div class=" col-xs-12 col-md-6 estabelecimento-informacao__endereco">
									<p><strong>Endereço : </strong><?php echo $estabelecimento->getEndereco()?></p>
									<p><strong>Número : </strong><?php echo $estabelecimento->getNumero()?></p>
								</div>
							</div>

							<p class="estabelecimento-informacao__complemento"><strong>Complemento : </strong><?php echo $estabelecimento->getComplemento()?> 
							</p>
						</div>

					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-3">

				<div class="estrelas" align="center">

					<p class="estrelas__texto">Na sua opnião, quantas estrelas este  estabelecimento merece <strong>?</strong></p>

					<div class="estrelas__caixa">

					<?php

						if ($estrelas && round($estrelas->getNum_estrelas()) == 0) {

					?>

						<img id="0-estrelas" class="estrelas__opacas" onclick="javascript:salvarEstrelas(0);" data-toggle="tooltip" data-placement="right" title="0" src="views/imagens/0-estrelas.png">

					<?php

						} else {

					?>

						<img id="0-estrelas" class="estrelas__translucidas" onclick="javascript:salvarEstrelas(0);" data-toggle="tooltip" data-placement="right" title="0" src="views/imagens/0-estrelas.png">

					<?php

						}

					?>

					</div>

					<div class="estrelas__caixa">



					<?php

						if ($estrelas && round($estrelas->getNum_estrelas()) == 1) {

					?>

						<img id="1-estrelas" class="estrelas__opacas" onclick="javascript:salvarEstrelas(1);" data-toggle="tooltip" data-placement="right" title="1" src="views/imagens/1-estrelas.png">

					<?php

						} else {

					?>

						<img id="1-estrelas" class="estrelas__translucidas" onclick="javascript:salvarEstrelas(1);" data-toggle="tooltip" data-placement="right" title="1" src="views/imagens/1-estrelas.png">

					<?php

						}

					?>

					</div>

					<div class="estrelas__caixa">						
						<?php

						if ($estrelas && round($estrelas->getNum_estrelas()) == 2) {

					?>

						<img id="2-estrelas" class="estrelas__opacas" onclick="javascript:salvarEstrelas(2);" data-toggle="tooltip" data-placement="right" title="2" src="views/imagens/2-estrelas.png">

					<?php

						} else {

					?>

						<img id="2-estrelas" class="estrelas__translucidas" onclick="javascript:salvarEstrelas(2);" data-toggle="tooltip" data-placement="right" title="2" src="views/imagens/2-estrelas.png">

					<?php

						}

					?>
					</div>

					<div class="estrelas__caixa">						
						<?php

						if ($estrelas && round($estrelas->getNum_estrelas()) == 3) {

					?>

						<img id="3-estrelas" class="estrelas__opacas" onclick="javascript:salvarEstrelas(3);" data-toggle="tooltip" data-placement="right" title="3" src="views/imagens/3-estrelas.png">

					<?php

						} else {

					?>

						<img id="3-estrelas" class="estrelas__translucidas" onclick="javascript:salvarEstrelas(3);" data-toggle="tooltip" data-placement="right" title="3" src="views/imagens/3-estrelas.png">

					<?php

						}

					?>
					</div>

					<div class="estrelas__caixa">						
						<?php

						if ($estrelas && round($estrelas->getNum_estrelas()) == 4) {

					?>

						<img id="4-estrelas" class="estrelas__opacas" onclick="javascript:salvarEstrelas(4);" data-toggle="tooltip" data-placement="right" title="4" src="views/imagens/4-estrelas.png">

					<?php

						} else {

					?>

						<img id="4-estrelas" class="estrelas__translucidas" onclick="javascript:salvarEstrelas(4);" data-toggle="tooltip" data-placement="right" title="4" src="views/imagens/4-estrelas.png">

					<?php

						}

					?>
					</div>

					<div class="estrelas__caixa">						
						<?php

						if ($estrelas && round($estrelas->getNum_estrelas()) == 5) {

					?>

						<img id="5-estrelas" class="estrelas__opacas" onclick="javascript:salvarEstrelas(5);" data-toggle="tooltip" data-placement="right" title="5" src="views/imagens/5-estrelas.png">

					<?php

						} else {

					?>

						<img id="5-estrelas" class="estrelas__translucidas" onclick="javascript:salvarEstrelas(5);" data-toggle="tooltip" data-placement="right" title="5" src="views/imagens/5-estrelas.png">

					<?php

						}

					?>
					</div>

				</div>

				<div class="comentarios">
					
					<button type="button" data-toggle="modal" data-target="#id-comentarios" class="botao comentarios__botao">
						Comentários
					</button>

					<div class="modal fade" id="id-comentarios">						
						<div class="modal-dialog carrinho__janela">
							<div class="modal-content">

								<div class="modal-header">

									<h2 class="carrinho__titulo">Comentar</h2>
									<button type="button" data-dismiss="modal" class="close carrinho__botao-fechar">
										<span>&times;</span>
									</button>

								</div>

								<div class="modal-body comentarios__conteudo">
								
									<form action="#" method="post">
										<p class="comentarios__frase"><span class="glyphicon glyphicon-comment"></span> Comentar sobre este estabelecimento : </p>
										<div class="row">
											<div class="form-group">
												<div class="col-xs-12">
													<textarea rows="4" name="texto" id="texto" placeholder="Comentário" class="form-control comentarios__textarea"></textarea>
												</div>
												
												<div class="col-xs-12 col-sm-offset-6 col-sm-6 col-md-offset-8 col-md-4">

													<button type="button" class="botao botao--amarelo comentarios__botao-salvar" onclick="javascript:salvarComentario();">Salvar Comentário</button>


												</div>
											</div>
										</div>
									</form>

									<div id="listaComentarios">

										<?php
											if ($listaComentarios != false) {
												foreach($listaComentarios as $comentario) {						

										echo '<div id="id-comentario-'. $comentario['id_comentario'] .'">';

										?>
										

											<?php if ($_SESSION['usuario'] == $comentario['id_cliente']) {										
												echo '<div class="comentarios__comentario comentarios__comentario--proprio">';
											} else {
												echo '<div class="row comentarios__comentario">';
											}?>										
												<div class="row">

													<div class="col-xs-12 col-md-3" align="center">

														<?php
														if (file_exists('views/imagem-Perfil/imagem-Perfil-Cliente/perfil-cliente-'.$comentario['id_cliente'].'.png')) { 

						                                    echo '<img class="img-responsive item__img" src="views/imagem-Perfil/imagem-Perfil-Cliente/perfil-cliente-'.$comentario['id_cliente'].'.png">';

						                                } else { ?>

						                               		<img class="img-responsive" src="https://api.adorable.io/avatars/250/fotoPerfilUsuario.png">

						                                <?php } ?>
													</div>

													<?php if ($_SESSION['usuario'] == $comentario['id_cliente']) {										
														echo '<div class="col-xs-12 col-md-7">
																<h5 class="comentarios__cabecalho">'. $comentario['nome'] .'</h5>
																<p class="comentarios__texto">'. $comentario['texto'] .'</p>
															</div>

															<div class="col-xs-12 col-md-2 comentarios__botao-excluir-caixa" align="center">
																<button onclick="javascript:excluirComentario('.$comentario['id_comentario'].');" class="botao comentarios__botao-excluir">
																	<span class="glyphicon glyphicon-remove"></span>
																</button>
																<p class="comentarios__botao-texto">Excluir seu Comentário</p>
															</div>';
													} else {
														echo '<div class="col-xs-12 col-md-9">
																<h5 class="comentarios__cabecalho">'. $comentario['nome'] .'</h5>
																<p class="comentarios__texto">'. $comentario['texto'] .'</p>
															</div>';
													}?>



												</div>
														
												
											</div>
										</div>

									<?php
											}
										}						

									?>

								</div>
									

								</div>

							</div>
						</div>
					</div>

				</div>

				

				<div class="caixa-carrinho" id="js-carrinho" align="center">

					<button type="button" onclick="carregarCarrinho()" data-toggle="modal" data-target="#id-carrinho" class="caixa-carrinho__botao">
						<img id="caixa-carrinho__img" class="img-responsive caixa-carrinho__img" src="views/imagens/carrinho-botao.png">
						<p class="caixa-carrinho__texto">Carrinho</p>
					</button>

				</div>

				

			</div>

			<div class="modal fade carrinho" id="id-carrinho">
				<div class="modal-dialog carrinho__janela">
					<div class="modal-content">

						<form action="" method="post">

							<div class="modal-header">

								<h2 class="carrinho__titulo">Carrinho</h2>
								<button type="button" data-dismiss="modal" class="close carrinho__botao-fechar">
									<span>&times;</span>
								</button>

							</div>

							<div class="modal-body">

								<div class="carrinho__lista" id="carrinho__lista">						

									

								</div>

							</div>

							<div class="modal-footer">




								

								<input type="hidden" name="controle" value="estabelecimento">
								<input type="hidden" name="acao" value="pagConcluir">
								<?php echo "<input type='hidden' name='id' value='". $estabelecimento->getId() ."'>"?>

								<?php 

									if (isset( $_GET['endereco'] )) {
										echo "<input type='hidden' name='endereco' value='". $_GET['endereco'] ."'>";
									}

								?>

								<input type="submit" id="botao-concluir" value="Concluir Pedido" class="botao botao--amarelo">


							</div>
						</form>

					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-9">
				<div class="estabelecimento-cardapio">						

					<?php	
						if ($listaProdutos != false) {
							foreach($listaProdutos as $produto) {						
					
					?>

					<div class="item item--sem-borda">
						<div class="row">

							<div class="col-xs-12 col-md-3" align="center">
								<img class="img-responsive item__img" src="https://api.adorable.io/avatars/150/ImagenBebida.png">
							</div>

							<div class="col-xs-12 col-md-7">
								<div class="item__info clearfix">
									<div class="item__cabecalho">
										<h4 class="item__nome"><?php echo $produto->getNome()?></h4>
										<h4 class="item__preco"><strong>R$ </strong><?php echo $produto->getPreco()?></h4>
									</div>
								</div>
							</div>

							<div class="col-xs-12 col-md-2" align="center">
								<div class="item__caixa-botoes">
									<div class="item__botoes">
										<button onclick="addProduto(<?php echo "'".$produto->getId()."'" ?>,<?php echo "'".$produto->getnome()."'" ?>,<?php echo "'".$produto->getPreco()."'" ?>)" id="<?php echo "botao-item-".$produto->getId()?>" class="item__botao">
											<img class="item__img" src="views/imagens/carrinho.png">
											<p class="item__texto">Adicionar ao carrinho</p>
										</button>
										
									</div>
								</div>
							</div>

						</div>
					</div>

					<?php
							}
						}
					
					?>

				</div>
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
<script src="views/js/scroll.js"></script>
<script src="views/js/parallax.js"></script>
<script src="views/js/voltarTopo.js"></script>

<script>
	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip();   
	});
</script>

</body>
</html>