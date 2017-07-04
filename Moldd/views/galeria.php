<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Galeria</title>

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/base.css">
	<link rel="stylesheet" href="views/css/galeria.css">
	<link rel="stylesheet" href="views/css/cabecalhoPadrao.css">
	<link rel="stylesheet" href="views/css/rodape.css">
	<link rel="stylesheet" href="views/css/parallax.css">
</head>
<body>

<?php
    $titulo = "Imagens Do Estabelecimento";
	require_once 'cabecalhoPadrao.php';
?>

	<div class="layout-galeria">
		<div class="container">
			<div class="galeria" align="center">
			<?php

			 $files = glob('views/Imagens-Estabelecimento/imagem-Restaurante-'.$_REQUEST['id'].'-*'.'.png');


                for ($i=0; $i<count($files) ; $i++) {
                                        
                    if (file_exists($files[$i])) {
						echo   '<button class="galeria__botao" data-toggle="modal" data-target="#foto'.$i.'">
									<img class="galeria__botao-imagem" src="'.$files[$i].'">
									<div class="galeria__aviso">
										<img src="views/imagens/CliqueAqui.png">
										<p class="galeria__botao-texto">CLIQUE PARA VISUALIZAR A IMAGEM EM SEU TEMANHO ORIGINAL</p>
									</div>
								</button>
								<div class="modal fade" id="foto'.$i.'">
									<img class="galeria__imagem-original" src="'.$files[$i].'">
								</div>';
					}
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