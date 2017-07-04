<?php
    $params = $this->getParams();
    $usuario = $params['usuario'];
    $cliente = $params['cliente'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Configurações</title>

    <link rel="stylesheet" href="views/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/base.css">
    <link rel="stylesheet" href="views/css/configuracaoUsuario.css">
    <link rel="stylesheet" href="views/css/menuPadrao.css">
    <link rel="stylesheet" href="views/css/rodape.css">
    <link rel="stylesheet" href="views/css/parallax.css">
</head>
<body>
<?php
    require_once 'menuPadraoCliente.php';
?>

<div class="layout-configuracao">
    <div class="container">
        <div class="configuracao">
            <form action="#" method="post" class="clearfix">

                <h1 class="configuracao__titulo">Configurações</h1>

                <div class="row">

                    <div class="col-xs-12 col-sm-4" align="center">
                        <div class="configuracao__foto-perfil" align="center">
                        
                            <?php if (file_exists('views/imagem-Perfil/imagem-Perfil-Cliente//perfil-cliente-'. $_SESSION['usuario'].'.png')) { 

                                      echo "<img class='img-responsive' src='views/imagem-Perfil/imagem-Perfil-Cliente//perfil-cliente-". $_SESSION['usuario'].".png'>";

                                  } else { ?>

                                <img class="img-responsive" src="https://api.adorable.io/avatars/250/fotoPerfilUsuario.png">

                            <?php } ?>

                            <a href="?controle=cliente&acao=pagMudarFoto" class="configuracao__mudar-foto">Mudar foto</a>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-8">
                        <div class="configuracao__painel">

                            <div class="panel panel-default configuracao__painel-grupo">

                                <div class="panel-heading configuracao__painel-cabecalho">
                                    <h4 class="panel-title">
                                        <strong>Nome : </strong><?php echo $cliente->getNome()?>
                                        <a href="#painel-editar-nome" class="configuracao__botao-editar" data-toggle="collapse" data-parent="#accordion">
                                            <span class="glyphicon glyphicon-edit"></span>
                                            Editar
                                        </a>
                                    </h4>
                                </div>

                                <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-nome">
                                    <div class="panel-body">

                                        <div class="col-xs-12">
                                            <div class="form-group configuracao__campo">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-user"></span>
                                                    </div>
                                                    <?php echo "<input type='text' name='nome' class='form-control' required='required' value='".$cliente->getNome() ."'>"?>
                                                </div>
                                            </div>
                                        </div>                                        

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="configuracao__painel-outros clearfix">
                        <div class="col-xs-12 col-lg-7">

                            <div class="panel panel-default ">

                                <div class="panel-heading configuracao__painel-cabecalho">
                                    <h4 class="panel-title">
                                        <strong>E-mail : </strong><?php echo $usuario->getEmail()?>
                                        <a href="#painel-editar-email" class="configuracao__botao-editar" data-toggle="collapse" data-parent="#accordion">
                                            <span class="glyphicon glyphicon-edit"></span>
                                            Editar
                                        </a>
                                    </h4>
                                </div>

                                <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-email">
                                    <div class="panel-body">                                        

                                        <div class="col-xs-12">
                                            <div class="form-group configuracao__campo">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-envelope"></span>
                                                    </div>
                                                    <?php echo "<input type='text' name='email' class='form-control' required='required' value='".$usuario->getEmail() ."'>"?>
                                                </div>
                                            </div>
                                        </div>                                            

                                    </div>
                                </div>

                            </div>

                        </div>                        

                        <div class="col-xs-12 col-sm-5">

                            <div class="panel panel-default ">

                                <div class="panel-heading configuracao__painel-cabecalho">
                                    <h4 class="panel-title">
                                        <strong>Telefone : </strong><?php echo $cliente->getTelefone()?>
                                        <a href="#painel-editar-Telefone" class="configuracao__botao-editar" data-toggle="collapse" data-parent="#accordion">
                                            <span class="glyphicon glyphicon-edit"></span>
                                            Editar
                                        </a>
                                    </h4>
                                </div>

                                <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-Telefone">
                                    <div class="panel-body">

                                        <div class="col-xs-12">
                                            <div class="form-group configuracao__campo">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-earphone"></span>
                                                    </div>
                                                    <?php echo "<input type='text' name='telefone' class='form-control mascaraTelefoneDDD' required='required' value='".$cliente->getTelefone() ."'>"?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-offset-3 col-sm-6">
                    Digite sua senha para salvar as alterações
                    <input type="password" name="senha" class="form-control" placeholder="Senha" required="required">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-offset-4 col-sm-4">
                        <input type='hidden' name='controle' value='cliente'>
                        <input type='hidden' name='acao' value='salvarAlteracoes'>                        
                        <input type="submit" value="Salvar Alterações" class="botao botao--vermelho configuracao__botao">
                    </div>
                </div>
            </form>

            <div class="layout-mudar-senha">
                <div class="row">
                    <div class="col-xs-12 col-sm-offset-3 col-sm-6">

                        <div class="panel panel-default ">

                            <div class="panel-heading configuracao__painel-cabecalho configuracao__painel-cabecalho--senha">
                                <h4 class="panel-title" align="center">
                                    <a href="#painel-editar-senha" class="configuracao__botao-editar" data-toggle="collapse" data-parent="#accordion">
                                        <span class="glyphicon glyphicon-edit"></span>
                                        Mudar<strong> Senha</strong>
                                    </a>
                                </h4>
                            </div>

                            <div class="panel-collapse collapse mudar-senha" id="painel-editar-senha">
                                <div class="panel-body">

                                    <form action="#" method="post" class="clearfix">

                                        <div class="form-group formulario">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-option-horizontal"></span>
                                                    <label for="senhaatual">Senha Atual</label>
                                                </div>
                                                <input type="password" name="senhaatual" class="form-control" placeholder="Senha Atual" required="required">
                                            </div>
                                        </div>

                                        <div class="form-group formulario">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-option-horizontal"></span>
                                                    <label for="senhanova">Senha Nova</label>
                                                </div>
                                                <input type="password" name="senhanova" class="form-control mudar-senha__campo" placeholder="Senha Nova" required="required">
                                            </div>
                                        </div>

                                        <div class="form-group formulario">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-option-horizontal"></span>
                                                    <label for="senhaconfirmar">Confirmar Senha Nova</label>
                                                </div>
                                                <input type="password" name="senhaconfirmar" class="form-control mudar-senha__campo" placeholder="Confirmar Senha Nova" required="required">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-offset-1 col-sm-10">
                                                <input type='hidden' name='controle' value='cliente'>
                                                <input type='hidden' name='acao' value='mudarSenha'>                        
                                                <input type="submit" value="Salvar senha nova" class="botao botao--vermelho mudar-senha__botao">
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="layout-endereco clearfix">
                    <div class="col-xs-12 col-sm-4 col-sm-offset-2" align="center">
                        <div align="center">
                            <img class="img-responsive" src="views/imagens/Endereco.png">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4">
                        <div class="endereco">
                            <a href="?controle=endereco&acao=pagAdicionarExcluirEndereco" class="botao botao--amarelo endereco__botao">Adicionar/Excluir Endereços</a>
                        </div>
                    </div>
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
<script src="views/js/jquery.mask.min.js"></script>
<script src="views/js/inputMascara.js"></script>
<script src="views/js/parallax.js"></script>
<script src="views/js/voltarTopo.js"></script>
</body>
</html>