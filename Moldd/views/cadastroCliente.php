<?php 

    if (isset($_SESSION['usuario'])) {
         header("location:?controle=cliente&acao=pagProcurarEstabelecimentos");
    } else {

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Cadastro de Usuário</title>

        <link rel="stylesheet" href="views/css/bootstrap.min.css">
        <link rel="stylesheet" href="views/css/base.css">
        <link rel="stylesheet" href="views/css/cadastroCliente.css">
        <link rel="stylesheet" href="views/css/rodape.css">
        <link rel="stylesheet" href="views/css/parallax.css">
    </head>
    <body>
        
		<?php
            $titulo = "Cadastrar Cliente";
			require_once 'cabecalhoPadrao.php';
		?>

        <main class="layout-cadastro">
            <div class="container">
                <div class="cadastro">			

                    <div class="row">                        

                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="formulario">
                                <h3 class="formulario__titulo"> Cliente</h3>
                                <form action="#" method="post" class="clearfix">						
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <div class="input-group">           				
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-user"></span>
                                                    <label for="nome">Nome</label>
                                                </div>
                                                <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <div class="input-group">           				
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-envelope"></span>
                                                    <label for="email">E-Mail</label>
                                                </div>
                                                <input type="email" id="email" name="email" class="form-control" placeholder="E-Mail" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">           				
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-option-horizontal"></span>
                                                    <label for="senha">Senha</label>
                                                </div>
                                                <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">           				
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-earphone"></span>
                                                    <label for="telefone">Telefone</label>
                                                </div>
                                                <input type="tel" id="telefone" name="telefone" class="form-control mascaraTelefoneDDD" maxlength="12" placeholder="Telefone" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <input type='hidden' name='usuario' value='123'>
                                    <input type='hidden' name='controle' value='cliente'>
                                    <input type='hidden' name='acao' value='manterCliente'>

                                    <div class="col-xs-12 col-sm-3 col-sm-offset-9">
                                        <input type="submit" value="Cadastrar" class="botao botao--vermelho">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </main>

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


<?php

    }

?>