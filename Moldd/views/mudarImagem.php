<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Mudar imagem</title>

        <link rel="stylesheet" href="views/css/bootstrap.min.css">
        <link rel="stylesheet" href="views/css/base.css">
        <link rel="stylesheet" href="views/css/mudarImagem.css">
        <link rel="stylesheet" href="views/css/rodape.css">
        <link rel="stylesheet" href="views/css/parallax.css">
    </head>
    <body>
        
		<?php
            $titulo = "Mudar Foto";
			require_once 'cabecalhoPadrao.php';
		?>

        <main class="layout-mudar-imagem clearfix">
            <div class="col-xs-12 col-sm-3 col-sm-offset-2" align="center">
                <h3 class="formulario__titulo">Foto Antiga</h3>
                <div align="center">

                    <?php 

                        if ($_SESSION['tipo'] == "C") {
                            if (file_exists('views/imagem-Perfil/imagem-Perfil-Cliente/perfil-cliente-'. $_SESSION['usuario'].'.png')) {
                                echo "<img class='img-responsive' src='views/imagem-Perfil/imagem-Perfil-Cliente/perfil-cliente-". $_SESSION['usuario'].".png'>";
                            } else {
                                echo "<img class='img-responsive' src='https://api.adorable.io/avatars/250/fotoPerfilUsuario.png'>";
                            }
                        } else {
                            if (file_exists('views/imagem-Perfil/imagem-Perfil-Estabelecimento/perfil-estabelecimento-'. $_SESSION['usuario'].'.png')) { 
                                echo "<img class='img-responsive' src='views/imagem-Perfil/imagem-Perfil-Estabelecimento/perfil-estabelecimento-". $_SESSION['usuario'].".png'>";
                            } else {
                                echo "<img class='img-responsive' src='https://api.adorable.io/avatars/250/fotoPerfilEstabelecimento.png'>";
                            }
                        }

                    ?>  

                </div>
            </div>

            <div class="col-xs-12 col-sm-5" align="center">

                <form enctype="multipart/form-data" method="post" class="clearfix">
                    <div class="formulario">

                        <h3 class="formulario__titulo">Foto Nova</h3>

                        <div class="formulario__caixa">
                            <div class="formulario__campos clearfix">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                            <label for="id-botao-img">Mudar Imagem</label>
                                        </div>
                                        <input type="file" id="id-botao-img" class="form-control botao-img" name="imagem" accept="image/*">
                                    </div>
                                </div>

                                
                                <?php if ($_SESSION['tipo'] == "C") { 

                                    echo "<input type='hidden' name='controle' value='cliente'>";

                                } else { 

                                    echo "<input type='hidden' name='controle' value='estabelecimento'>";

                                } ?> 
                                <input type="hidden" name="acao" value="salvarimagem">
                                
                                <div class="row">
                                    <div class="col-xs-12 col-sm-offset-6 col-sm-6">
                                        <input type="submit" value="Salvar" class="botao botao--vermelho">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </form>
                
            </div>
        </main>

        <div class="layout-pular clearfix">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">

               <a href="?controle=cliente&acao=pagProcurarEstabelecimentos" class="botao botao--amarelo">Ir para tela Principal</a>

           </div>
        </div>

        <footer class="layout-rodape">
            Direitos Autorais
        </footer>

        <script src="views/js/jquery-3.1.1.min.js"></script>
        <script src="views/js/bootstrap.min.js"></script>
        <script src="views/js/jquery.mask.min.js"></script>
        <script src="views/js/inputMascara.js"></script>
        <script src="views/js/parallax.js"></script>
    </body>
</html>