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
	<link rel="stylesheet" href="views/css/comentariosEstabelecimento.css">
	<link rel="stylesheet" href="views/css/cabecalhoPadrao.css">
	<link rel="stylesheet" href="views/css/rodape.css">
	<link rel="stylesheet" href="views/css/parallax.css">
</head>
<body>

<?php
    $titulo = "Comentários Referentes A Este Estabelecimento";
	require_once 'cabecalhoPadrao.php';
?>
	
	<div class="container">

		<div class="layout-comentario">

		<?php
			if ($listaComentarios != false) {
				foreach(array_reverse($listaComentarios) as $comentario) {		
		?>

		

			<div class="comentario">
				
				<div class="row">

					<div class="col-xs-12 col-sm-5 col-md-2" align="center">


						<?php
						if ($comentario['imgExiste']) { 

	                        echo '<img class="img-responsive item__img" src="views/imagem-Perfil/imagem-Perfil-Cliente/perfil-cliente-'. $comentario['id_cliente'] .'.png">';

	                    } else { ?>

	                   		<img class="img-responsive" src="https://api.adorable.io/avatars/250/fotoPerfilUsuario.png">

	                    <?php } ?>
							
					</div>	

					<div class="col-xs-12 col-sm-7 col-md-10">

						<div class="comentario__caixa">

							<h4 class="comentario__nome"><?php echo $comentario['nome'] ?></h4>
							<p class="comentario__texto"><?php echo $comentario['texto'] ?></p>

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