<?php
	$params = $this->getParams();
	$listaComentarios = $params['listaComentarios'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Como Funciona</title>

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/base.css">
	<link rel="stylesheet" href="views/css/comentarios.css">
	<link rel="stylesheet" href="views/css/cabecalhoPadrao.css">
	<link rel="stylesheet" href="views/css/rodape.css">
	<link rel="stylesheet" href="views/css/parallax.css">

<script type="text/javascript">

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

</script>
</head>
<body>

<?php
    $titulo = "Seus Comentários";
	require_once 'cabecalhoPadrao.php';
?>

	<div class="container">

		<div class="layout-comentario">

		<?php
		if ($listaComentarios != false) {
			foreach(array_reverse($listaComentarios) as $comentario) {		
		
				echo 
			'<div id="id-comentario-'. $comentario['id_comentario'] .'">';

		?>
				<div class="comentario">
					<div class="row">					

						<div class="col-xs-12 col-sm-5 col-md-2" align="center">


							<?php
							if ($comentario['imgExiste']) { 

		                        echo '<img class="img-responsive item__img" src="views/imagem-Perfil/imagem-Perfil-Estabelecimento/perfil-estabelecimento-'.$comentario['id_estabelecimento'].'.png">';

		                    } else { ?>

		                   		<img class="img-responsive" src="https://api.adorable.io/avatars/250/fotoPerfilUsuario.png">

		                    <?php } ?>
								
						</div>	

						<div class="col-xs-12 col-sm-5 col-md-8">

							<div class="comentario__caixa" align="right">

								<h4 class="comentario__nome" align="left">Comentários feito ao <?php echo $comentario['nome_estabelecimento'] ?></h4>
								<p class="comentario__texto" align="left"><?php echo $comentario['texto'] ?></p>

							</div>

						</div>

						<div class="col-xs-12 col-sm-2" align="center">
							<?php

							 echo 
							'<button onclick="javascript:excluirComentario('.$comentario['id_comentario'].');" class="botao comentario__botao-excluir">
								<span class="glyphicon glyphicon-remove"></span>
							</button>';

							?>

							<p>Excluir seu Comentário</p>

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