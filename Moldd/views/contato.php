<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Como Funciona</title>

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/base.css">
	<link rel="stylesheet" href="views/css/contato.css">
	<link rel="stylesheet" href="views/css/cabecalhoPadrao.css">
	<link rel="stylesheet" href="views/css/rodape.css">
	<link rel="stylesheet" href="views/css/parallax.css">
</head>
<body>

<?php
    $titulo = "Contactar os administradores do Moldd";
	require_once 'cabecalhoPadrao.php';
?>

	<div class="layout-formContato">
		<div class="container">
		
			<div class="formContato">
				
				<div class="row">
					
					<div class="col-xs-12 col-md-4" align="center">
						<img class="img-responsive" src="views/imagens/Contato.png">
					</div>

					<div class="col-xs-12 col-md-8">
						<form method="POST" action="#">

							<div class="formulario">

								<h3 class="formulario__titulo"> Formulario para contactar os administradores do Moldd</h3>

								<div class="row">
									
									<div class="col-xs-12 col-md-7">
										
									</div>

								</div>

								<div class="form-group">
		                            <div class="input-group">
		                                <div class="input-group-addon">
		                                    <span class="glyphicon glyphicon-user"></span>
		                                    <label for="emailr">Nome</label>
		                                </div>
										<input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required="required">
									</div>
								</div>

								<div class="form-group">
		                            <div class="input-group">
		                                <div class="input-group-addon">
		                                    <span class="glyphicon glyphicon-envelope"></span>
		                                    <label for="emailr">E-Mail para comunicação</label>
		                                </div>
										<input type="email" id="email" name="email" class="form-control" placeholder="E-Mail para comunicação" required="required">
									</div>
								</div>

								<div class="row">
									<div class="col-xs-12 col-md-6">
										<div class="form-group">
				                            <div class="input-group">
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-earphone"></span>
				                                    <label for="emailr">Telefone</label>
				                                </div>
												<input type="tel" id="telefone" name="telefone" class="form-control mascaraTelefoneDDD" placeholder="Telefone" required="required">
											</div>
										</div>
									</div>
								</div>								

								<div class="form-group">
		                            <div class="input-group">
		                                <div class="input-group-addon">
		                                    <span class="glyphicon glyphicon-question-sign"></span>
		                                    <label for="emailr">Assunto</label>
		                                </div>
										<input type="text" id="assunto" name="assunto" class="form-control" placeholder="Assunto" required="required">
									</div>
								</div>

								<div class="form-group">
  									<label for="formulario__textarea">Mensagem:</label>
										<textarea rows="4" class="form-control formulario__textarea" name="mensagem" id="mensagem" class="item__texto"></textarea>
								</div>

								<input type="hidden" name="controle" value="usuario">
								<input type="hidden" name="acao" value="enviarMensagem">

					        	<input type="submit" value="Concluir Pedido" class="botao botao--amarelo">

							</div>

						</form>
					</div>

				</div>

			</div>

		</div>
	</div>
	
	<footer class="layout-rodape">
		Direitos Autorais
	</footer>

<script src="views/js/jquery-3.1.1.min.js"></script>
<script src="views/js/bootstrap.min.js"></script>
<script src="views/js/parallax.js"></script>
<script src="views/js/jquery.mask.min.js"></script>
<script src="views/js/inputMascara.js"></script>
</body>
</html>