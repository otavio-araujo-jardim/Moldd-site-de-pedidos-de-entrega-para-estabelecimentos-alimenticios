<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Cadastro de Usuário</title>

        <link rel="stylesheet" href="views/css/bootstrap.min.css">
        <link rel="stylesheet" href="views/css/base.css">
        <link rel="stylesheet" href="views/css/adicionarImagem.css">
        <link rel="stylesheet" href="views/css/rodape.css">
        <link rel="stylesheet" href="views/css/parallax.css">
    </head>
    <body>
        
		<?php
            $titulo = "Adicionar Foto";
			require_once 'cabecalhoPadrao.php';
		?>

        <main class="layout-adicionar-imagem clearfix">
            
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-offset-2 col-sm-8" align="center">

                        <form enctype="multipart/form-data" method="post" class="clearfix">
                            <div class="formulario">

                                <h3 class="formulario__titulo">Foto Nova</h3>

                                <div class="formulario__caixa">
                                    <div class="formulario__campos clearfix">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-user"></span>
                                                    <label for="id-botao-img">Adicionar Imagem</label>
                                                </div>
                                                <input type="file" id="id-botao-img" class="form-control botao-img" name="imagem" accept="image">
                                            </div>
                                        </div>                                        
                                        

                                        <input type="hidden" name="controle" value="estabelecimento">

                                         
                                        <input type="hidden" name="acao" value="salvarimagemRestaurante">

                                        <div class="row">
                                            <div class="col-xs-12  col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-9">
                                                <input type="submit" value="Salvar" class="botao botao--vermelho">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </form>
                        
                    </div>
                </div>            

                <div class="row">

                        <div align="center">                    
                            <div class="layout-galeria">
                                <div class="container">
                                    <div class="galeria" align="center">                                       
                                        

                                    <?php                                        

                                        $files = glob('views/Imagens-Restaurantes/imagem-Restaurante-'.$_SESSION['usuario'].'-*'.'.png');


                                        for ($i=0; $i<count($files) ; $i++) {
                                        
                                            if (file_exists($files[$i])) {
                                                
                                                echo   '<div class="galeria__foto">
                                                            <div class="galeria__excluir" align="right">                                                               
                                                                <a href="?controle=estabelecimento&acao=ExcluirImagem&num='.$files[$i].'" class="galeria__botao-excluir">
                                                                    <span class="glyphicon glyphicon-remove"></span>
                                                                </a>

                                                            </div>
                                                            <button class="galeria__botao" data-toggle="modal" data-target="#foto'.$i.'">

                                                                <img class="galeria__botao-imagem img-responsive" src="'.$files[$i].'">

                                                                <div class="galeria__aviso">
                                                                    <img src="views/imagens/CliqueAqui.png">
                                                                    <p class="galeria__botao-texto">CLIQUE PARA VISUALIZAR A IMAGEM EM UM TAMANHO MAIOR</p>
                                                                </div>
                                                            </button>

                                                            <div class="modal fade" id="foto'.$i.'">
                                                    
                                                                <img class="galeria__imagem-original galeria__botao-imagem img-responsive" src="'.$files[$i].'">

                                                            </div>
                                                        </div>';


                                            }                                    
                                        } 
                                     ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            

        </main>        

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