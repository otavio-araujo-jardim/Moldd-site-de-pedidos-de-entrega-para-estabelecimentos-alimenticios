<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Nome do Site</title>

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/base.css">
	<link rel="stylesheet" href="views/css/login.css">
	<link rel="stylesheet" href="views/css/parallax.css">
	
</head>
<body class="parallax" data-speed="10">
	<header>
		<nav class="navbar navbar-inverse menu-login">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
					data-target="#menu">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<img class="menu-login__img" src="views/imagens/LogoMolddSimples.png">
				</div>
				<div class="collapse navbar-collapse menu-login__caixa" id="menu">
					<ul class="nav navbar-nav menu-login__lista">
						<li><a class="menu-login__item" href="index.php">LOGIN</a></li>
						<li><a class="menu-login__item" href="?controle=usuario&acao=pagComoFunciona">COMO FUNCIONA</a></li>
						<li><a class="menu-login__item" href="?controle=usuario&acao=pagContato">CONTATO</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<div class="container">	
		<div class="row">
			<div class="col-xs-12 col-md-7">
				<div class="texto-principal">
					<h1 class="texto-principal__titulo">Bem Vindo Ao Moldd</h1>
					<p class="texto-principal__conteudo">Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação -- Texto Apresentação.</p>
				</div>			
			</div>

			<div class="col-xs-12 col-md-5" align="center">
				<div class="formulario">
					<form method="post" class="clearfix">	
						
						<h1 class="formulario__titulo">Faça seu Login</h1>

						<div class="form-group">
                   			<div class="input-group">
	                       		<div class="input-group-addon">
	                           		<span class="glyphicon glyphicon-user"></span>
	                           		<label for="email">E-mail</label>
	                       		</div>
                      			<input type="email" name="email" class="form-control" placeholder="E-mail" required="required">
                  			</div>
              			</div>

              			<div class="form-group">
                    		<div class="input-group">
	    		                <div class="input-group-addon">
	    	                        <span class="glyphicon glyphicon-option-horizontal"></span>
	    	                        <label for="senha">Senha</label>
	     		                </div>
	     		                <input type="password" name="senha" class="form-control" placeholder="Senha" required="required">
       				        </div>
        			    </div>

        			    <input type="hidden" name="controle" value="usuario">
						<input type="hidden" name="acao" value="logar">

        			    <input type="submit" value="Login" class="botao botao--vermelho">
        			</form>

        			<div class="cadastro">
        				<h5 class="cadastro__titulo">Ou</h5>
						<div class="cadastro__sessao clearfix">
							<p>Cadastrar conta como <strong>Cliente</strong></p>
							<a href="?controle=cliente&acao=pagCadastrar" class="botao botao--amarelo">Cadastrar</a>
						</div>
								
						<div class="cadastro__sessao clearfix">
							<p>Cadastrar conta como <strong>Estabelecimento</strong></p>
							<a href="?controle=estabelecimento&acao=pagCadastrar" class="botao botao--amarelo">Cadastrar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="layout-video">
		<div class="container">
			<h1>Titulo Do Video</h1>
			<div class="video">
				<figure class="embed-responsive embed-responsive-16by9 video-apresentacao">
					<iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/11gU58YH2fA" frameborder="0" allowfullscreen></iframe>
				</figure>
			</div>		
		</div>
		
	</div>

	<footer class="layout-rodape">
		Direitos Autorais
	</footer>
	<script src="views/js/jquery-3.1.1.min.js"></script>
	<script src="views/js/bootstrap.min.js"></script>
	<script src="views/js/parallax.js"></script>
</body>
</html>