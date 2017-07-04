<?php
    $params = $this->getParams();
    $usuario = $params['usuario'];
    $estabelecimento = $params['estabelecimento'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Configurações</title>

    <link rel="stylesheet" href="views/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/base.css">
    <link rel="stylesheet" href="views/css/configuracaoEstabelecimento.css">
    <link rel="stylesheet" href="views/css/menuPadrao.css">
    <link rel="stylesheet" href="views/css/rodape.css">
    <link rel="stylesheet" href="views/css/parallax.css">
</head>
<body>

    <?php
    require_once 'menuPadraoEstabelecimento.php';
    ?>

    <div class="layout-configuracao">
        <div class="container">
            <form action="#" method="post" class="clearfix">
                <div class="configuracao">

                    <h1 class="configuracao__titulo">Configurações</h1>

                    <div class="row">

                        <div class="col-xs-12 col-sm-4" align="center">
                            <h3 class="configuracao__titulo">Logomarca</h3>
                            <div class="configuracao__foto-perfil" align="center">
                                <?php if (file_exists('views/imagem-Perfil/imagem-Perfil-Estabelecimento/perfil-estabelecimento-'. $_SESSION['usuario'].'.png')) { 

                                    echo "<img class='img-responsive' src='views/imagem-Perfil/imagem-Perfil-Estabelecimento/perfil-estabelecimento-". $_SESSION['usuario'].".png'>";

                                } else { ?>
                                <img class="img-responsive" src="https://api.adorable.io/avatars/250/fotoPerfilUsuario.png">
                                <?php } ?>
                                <a href="?controle=estabelecimento&acao=pagMudarFoto" class="configuracao__mudar-foto">Mudar foto</a>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-8">
                            <h3 class="configuracao__titulo">Representante</h3>
                            <div class="configuracao__painel">

                                <div class="panel-group configuracao__painel-grupo" id="accordion">

                                    <div class="panel panel-default">

                                        <div class="panel-heading configuracao__painel-cabecalho">
                                            <h4 class="panel-title">
                                                <strong>Nome do Representante : </strong><?php echo $estabelecimento->getNomeRepresentante()?>
                                                <a href="#painel-editar-nomeRepresentante" class="configuracao__botao-editar" data-toggle="collapse" data-parent="#accordion">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                    Editar
                                                </a>
                                            </h4>
                                        </div>

                                        <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-nomeRepresentante">
                                            <div class="panel-body">

                                                <div class="form-group configuracao__campo">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-user"></span>
                                                        </div>
                                                        <?php echo "<input type='text' name='nomer' class='form-control' required='required' value='".$estabelecimento->getNomeRepresentante() ."'>" ?>
                                                    </div>
                                                </div>                                                                                   

                                            </div>
                                        </div>

                                    </div>

                                    <div class="panel panel-default">

                                        <div class="panel-heading configuracao__painel-cabecalho">
                                            <h4 class="panel-title">
                                                <strong>E-Mail do Representante : </strong><?php echo $estabelecimento->getEmailRepresentante()?>
                                                <a href="#painel-editar-emailRepresentante" class="configuracao__botao-editar" data-toggle="collapse" data-parent="#accordion">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                    Editar
                                                </a>
                                            </h4>
                                        </div>

                                        <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-emailRepresentante">
                                            <div class="panel-body">                                       

                                                <div class="form-group configuracao__campo">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-envelope"></span>
                                                        </div>
                                                        <?php echo"<input type='text' name='emailr' class='form-control'required='required' value='". $estabelecimento->getEmailRepresentante() ."'>"?>
                                                    </div>
                                                </div>                                                

                                            </div>
                                        </div>

                                    </div>

                                    <div class="panel panel-default">

                                        <div class="panel-heading configuracao__painel-cabecalho">
                                            <h4 class="panel-title">
                                                <strong>Telefone do Representante : </strong><?php echo $estabelecimento->getTelefoneRepresentante()?>
                                                <a href="#painel-editar-telefoneRepresentante" class="configuracao__botao-editar" data-toggle="collapse" data-parent="#accordion">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                    Editar
                                                </a>
                                            </h4>
                                        </div>

                                        <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-telefoneRepresentante">
                                            <div class="panel-body">

                                                <div class="form-group configuracao__campo">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-earphone"></span>
                                                        </div>
                                                        <?php echo "<input type='text' name='telefoner' class='form-control mascaraTelefoneDDD' required='required' value='". $estabelecimento->getTelefoneRepresentante() ."'>"?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="configuracao__painel-outros clearfix">
                        <h3 class="configuracao__titulo">Estabelecimento</h3>
                        <div class="row">

                            <div class="col-xs-12 col-lg-6">

                                <div class="panel panel-default ">

                                    <div class="panel-heading configuracao__painel-cabecalho">
                                        <h4 class="panel-title">
                                            <strong>Nome : </strong><?php echo $estabelecimento->getNome()?>
                                            <a href="#painel-editar-nome" class="configuracao__botao-editar" data-toggle="collapse">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                Editar
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-nome">
                                        <div class="panel-body">

                                            <div class="form-group configuracao__campo">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-user"></span>
                                                    </div>
                                                    <?php echo "<input type='text' name='nomee' class='form-control' required='required' value='".$estabelecimento->getNome() ."'>" ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12 col-lg-6">

                                <div class="panel panel-default ">

                                    <div class="panel-heading configuracao__painel-cabecalho">
                                        <h4 class="panel-title">
                                            <strong>E-mail : </strong><?php echo $usuario->getEmail()?>
                                            <a href="#painel-editar-email" class="configuracao__botao-editar" data-toggle="collapse">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                Editar
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-email">
                                        <div class="panel-body">
                                            <div class="form-group configuracao__campo">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-envelope"></span>
                                                    </div>
                                                    <?php echo "<input type='text' name='emaile' class='form-control' required='required' value='".$usuario->getEmail() ."'>"?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="configuracao__painel-outros clearfix">
                        <div class="row">

                            <div class="col-xs-12 col-md-6">

                                <div class="panel panel-default ">

                                    <div class="panel-heading configuracao__painel-cabecalho">
                                        <h4 class="panel-title">
                                            <strong>Telefone : </strong><?php echo $estabelecimento->getTelefone()?>
                                            <a href="#painel-editar-telefone" class="configuracao__botao-editar" data-toggle="collapse">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                Editar
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-telefone">
                                        <div class="panel-body">

                                            <div class="form-group configuracao__campo">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-earphone"></span>
                                                    </div>
                                                    <?php echo "<input type='text' name='telefonee' class='form-control mascaraTelefoneDDD' required='required' value='".$estabelecimento->getTelefone() ."'>"?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12 col-md-6">

                                <div class="panel panel-default ">

                                    <div class="panel-heading configuracao__painel-cabecalho">
                                        <h4 class="panel-title">
                                            <strong>CNPJ : </strong><?php echo $estabelecimento->getCnpj()?>
                                            <a href="#painel-editar-cnpj" class="configuracao__botao-editar" data-toggle="collapse">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                Editar
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-cnpj">
                                        <div class="panel-body">

                                            <div class="form-group configuracao__campo">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-home"></span>
                                                    </div>
                                                    <?php echo "<input type='text' name='cnpje' class='form-control mascaraCnpj' required='required' value='". $estabelecimento->getCnpj() ."'>"?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12 col-md-6">

                                <div class="panel panel-default ">

                                    <div class="panel-heading configuracao__painel-cabecalho">
                                        <h4 class="panel-title">
                                            <strong>Frete : </strong><?php echo $estabelecimento->getFrete()?>
                                            <a href="#painel-editar-frete" class="configuracao__botao-editar" data-toggle="collapse">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                Editar
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-frete">
                                        <div class="panel-body">

                                            <div class="form-group configuracao__campo">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-home"></span>
                                                    </div>
                                                    <?php echo "<input type='number' name='fretee' class='form-control' required='required' value='". $estabelecimento->getFrete() ."'>"?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>                            

                            <div class="col-xs-12 col-md-6">

                                <div class="panel panel-default ">

                                    <div class="panel-heading configuracao__painel-cabecalho">
                                        <h4 class="panel-title">
                                            <strong>Tipo : </strong><?php echo $estabelecimento->getTipo()?>
                                            <a href="#painel-editar-tipo" class="configuracao__botao-editar" data-toggle="collapse">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                Editar
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-tipo">
                                        <div class="panel-body">

                                            <div class="form-group configuracao__campo">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-cutlery"></span>
                                                    </div>
                                                    <p><select  class="form-control" name="tipoe" id="tipo">
                                                        
                                                        <?php 
                                                        echo "<option selected value='".$estabelecimento->getTipo()."'>".$estabelecimento->getTipo()."</option>";

                                                        if ( $estabelecimento->getTipo() != "Restaurante") {
                                                            echo "<option value='Restaurante'>Restaurante</option>";
                                                        }

                                                        if ( $estabelecimento->getTipo() != "Delivery") {
                                                            echo "<option value='Delivery'>Delivery</option>";
                                                        }
                                                       
                                                        if ( $estabelecimento->getTipo() != "Comida congelada") {
                                                            echo "<option value='Comida congelada'>Comida congelada</option>";
                                                        }
                                                        
                                                        if ( $estabelecimento->getTipo() != "Salgados e doces p/ festas") {
                                                            echo "<option value='Salgados e doces p/ festass'>Salgados e doces p/ festas</option>";
                                                        }
                                                        
                                                         if ( $estabelecimento->getTipo() != "Bar ou pub") {
                                                            echo "<option value='Bar ou pub'>Bar ou pub</option>";
                                                        }
                                                        
                                                         if ( $estabelecimento->getTipo() != "Cafeteria ou lanches") {
                                                            echo "<option value='Cafeteria ou lanches'>Cafeteria ou lanches</option>";
                                                        }
                                                        
                                                         if ( $estabelecimento->getTipo() != "Hotel") {
                                                            echo "<option value='Hotel'>Hotel</option>";
                                                        }
                                                        
                                                         if ( $estabelecimento->getTipo() != "Fast-food") {
                                                            echo "<option value='Fast-food'>Fast-food</option>";
                                                        }
                                                        
                                                         if ( $estabelecimento->getTipo() != "Praça de Alimentação") {
                                                            echo "<option value='Praça de Alimentação'>Praça de Alimentação</option>";
                                                        }
                                                        
                                                         if ( $estabelecimento->getTipo() != "Food Truck") {
                                                            echo "<option value='Food Truck'>Food Truck</option>";
                                                        }
                                                        
                                                         if ( $estabelecimento->getTipo() != "Drive Thru") {
                                                            echo "<option value='DriveThru'>Drive Thru</option>";   
                                                        }
                                                        ?>
                                                    </select></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="configuracao__painel-outros clearfix">

                        <div class="row">
                            
                            <div class="col-xs-12 col-md-6"> <!-- Domingo -->

                                <?php 

                                    if ($estabelecimento->getHora_inicio_dom() != false) {
                                        echo '<div id="configuracao__dia-domigo" class="configuracao__dia">';
                                    } else {
                                        echo '<div  id="configuracao__dia-domigo"class="configuracao__dia--nulo">';
                                    }
                                                     
                                ?> 


                                    <div class="row">
                                        
                                        <div class="col-xs-12">
                                                <?php 
                                                    if ($estabelecimento->getHora_inicio_dom() != false) {
                                                        echo   '<div class="configuracao__dia-checkbox">
                                                                    <div class="checkbox">                                            
                                                                        <label>
                                                                            <input type="checkbox" id="domingo" class="formulario__checkbox" name="domingo" checked >domingo
                                                                        </label>                                            
                                                                    </div>
                                                                </div>';
                                                    } else {
                                                        echo   '<div class="configuracao__dia-checkbox--nulo">
                                                                    <div class="checkbox">                                            
                                                                        <label>
                                                                            <input type="checkbox" id="domingo" class="formulario__checkbox" name="domingo">domingo
                                                                        </label>                                            
                                                                    </div>
                                                                </div>';
                                                    }
                                                     
                                                ?>                                                    
                                            
                                        </div>
                                    </div>

                                    <div id="formulario__domingo">

                                <?php

                                    if ($estabelecimento->getHora_inicio_dom() != false) {

                                ?>
                                        <div class="row">
                                            <div class="col-xs-12">

                                                <div class="panel panel-default ">

                                                    <div class="panel-heading configuracao__painel-cabecalho">
                                                        <h4 class="panel-title">
                                                            <strong>Inicio : </strong><?php echo $estabelecimento->getHora_inicio_dom() ?>
                                                            <a href="#painel-editar-hora_inicio_dom" class="configuracao__botao-editar" data-toggle="collapse">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                Editar
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-hora_inicio_dom">
                                                        <div class="panel-body">

                                                            <div class="form-group configuracao__campo">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-home"></span>
                                                                    </div>
                                                                    <?php echo "<input type='time' name='inicioDome' class='form-control' required='required' value='". $estabelecimento->getHora_inicio_dom() ."'>"?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-xs-12">

                                                <div class="panel panel-default ">

                                                    <div class="panel-heading configuracao__painel-cabecalho">
                                                        <h4 class="panel-title">
                                                            <strong>Encerramento : </strong><?php echo $estabelecimento->getHora_encerramento_dom() ?>
                                                            <a href="#painel-editar-hora_encerramento_dom" class="configuracao__botao-editar" data-toggle="collapse">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                Editar
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-hora_encerramento_dom">
                                                        <div class="panel-body">

                                                            <div class="form-group configuracao__campo">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-home"></span>
                                                                    </div>
                                                                    <?php echo "<input type='time' name='encerramentoDome' class='form-control' required='required' value='". $estabelecimento->getHora_encerramento_dom() ."'>"?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                <?php

                                    }

                                ?>

                                    </div>

                                    <!-- Input Domingo -->

                                </div>

                            </div>

                            <div class="col-xs-12 col-md-6"> <!-- Segunda-Feira -->

                                <?php 

                                    if ($estabelecimento->getHora_inicio_seg() != false) {
                                        echo '<div id="configuracao__dia-segunda" class="configuracao__dia">';
                                    } else {
                                        echo '<div id="configuracao__dia-segunda" class="configuracao__dia--nulo">';
                                    }
                                                     
                                ?> 


                                    <div class="row">
                                        
                                        <div class="col-xs-12">
                                                <?php 
                                                    if ($estabelecimento->getHora_inicio_seg() != false) {
                                                        echo   '<div class="configuracao__dia-checkbox">
                                                                    <div class="checkbox">                                            
                                                                        <label>
                                                                            <input type="checkbox" id="segunda" class="formulario__checkbox" name="segunda" checked >Segunda-Feira
                                                                        </label>                                            
                                                                    </div>
                                                                </div>';
                                                    } else {
                                                        echo   '<div class="configuracao__dia-checkbox--nulo">
                                                                    <div class="checkbox">                                            
                                                                        <label>
                                                                            <input type="checkbox" id="segunda" class="formulario__checkbox" name="segunda">Segunda-Feira
                                                                        </label>                                            
                                                                    </div>
                                                                </div>';
                                                    }
                                                     
                                                ?>                                                    
                                            
                                        </div>
                                    </div>

                                    <div id="formulario__segunda">

                                    <?php

                                        if ($estabelecimento->getHora_inicio_seg() != false) {

                                    ?>
                                        <div class="row">
                                            <div class="col-xs-12">

                                                <div class="panel panel-default ">

                                                    <div class="panel-heading configuracao__painel-cabecalho">
                                                        <h4 class="panel-title">
                                                            <strong>Inicio : </strong><?php echo $estabelecimento->getHora_inicio_seg() ?>
                                                            <a href="#painel-editar-hora_inicio_seg" class="configuracao__botao-editar" data-toggle="collapse">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                Editar
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-hora_inicio_seg">
                                                        <div class="panel-body">

                                                            <div class="form-group configuracao__campo">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-home"></span>
                                                                    </div>
                                                                    <?php echo "<input type='time' name='inicioSege' class='form-control' required='required' value='". $estabelecimento->getHora_inicio_seg() ."'>"?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-xs-12">

                                                <div class="panel panel-default ">

                                                    <div class="panel-heading configuracao__painel-cabecalho">
                                                        <h4 class="panel-title">
                                                            <strong>Encerramento : </strong><?php echo $estabelecimento->getHora_encerramento_seg() ?>
                                                            <a href="#painel-editar-hora_encerramento_seg" class="configuracao__botao-editar" data-toggle="collapse">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                Editar
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-hora_encerramento_seg">
                                                        <div class="panel-body">

                                                            <div class="form-group configuracao__campo">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-home"></span>
                                                                    </div>
                                                                    <?php echo "<input type='time' name='encerramentoSege' class='form-control' required='required' value='". $estabelecimento->getHora_encerramento_seg() ."'>"?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    <?php

                                        }

                                    ?>

                                </div>

                                    <!-- Input Segunda-Feira-->

                                </div>

                            </div>

                            <div class="col-xs-12 col-md-6"> <!-- Terça-Feira -->

                                <?php 

                                    if ($estabelecimento->getHora_inicio_ter() != false) {
                                        echo '<div id="configuracao__dia-terca" class="configuracao__dia">';
                                    } else {
                                        echo '<div id="configuracao__dia-terca" class="configuracao__dia--nulo">';
                                    }
                                                     
                                ?> 


                                    <div class="row">
                                        
                                        <div class="col-xs-12">
                                                <?php 
                                                    if ($estabelecimento->getHora_inicio_ter() != false) {
                                                        echo   '<div class="configuracao__dia-checkbox">
                                                                    <div class="checkbox">                                            
                                                                        <label>
                                                                            <input type="checkbox" id="terca" class="formulario__checkbox" name="terca" checked >Terça-Feira
                                                                        </label>                                            
                                                                    </div>
                                                                </div>';
                                                    } else {
                                                        echo   '<div class="configuracao__dia-checkbox--nulo">
                                                                    <div class="checkbox">                                            
                                                                        <label>
                                                                            <input type="checkbox" id="terca" class="formulario__checkbox" name="terca">Terça-Feira
                                                                        </label>                                            
                                                                    </div>
                                                                </div>';
                                                    }
                                                     
                                                ?>                                                    
                                            
                                        </div>
                                    </div>

                                    <div id="formulario__terca">

                                    <?php

                                        if ($estabelecimento->getHora_inicio_ter() != false) {

                                    ?>
                                        <div class="row">
                                            <div class="col-xs-12">

                                                <div class="panel panel-default ">

                                                    <div class="panel-heading configuracao__painel-cabecalho">
                                                        <h4 class="panel-title">
                                                            <strong>Inicio : </strong><?php echo $estabelecimento->getHora_inicio_ter() ?>
                                                            <a href="#painel-editar-hora_inicio_ter" class="configuracao__botao-editar" data-toggle="collapse">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                Editar
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-hora_inicio_ter">
                                                        <div class="panel-body">

                                                            <div class="form-group configuracao__campo">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-home"></span>
                                                                    </div>
                                                                    <?php echo "<input type='time' name='inicioTere' class='form-control' required='required' value='". $estabelecimento->getHora_inicio_ter() ."'>"?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-xs-12">

                                                <div class="panel panel-default ">

                                                    <div class="panel-heading configuracao__painel-cabecalho">
                                                        <h4 class="panel-title">
                                                            <strong>Encerramento : </strong><?php echo $estabelecimento->getHora_encerramento_ter() ?>
                                                            <a href="#painel-editar-hora_encerramento_ter" class="configuracao__botao-editar" data-toggle="collapse">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                Editar
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-hora_encerramento_ter">
                                                        <div class="panel-body">

                                                            <div class="form-group configuracao__campo">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-home"></span>
                                                                    </div>
                                                                    <?php echo "<input type='time' name='encerramentoTere' class='form-control' required='required' value='". $estabelecimento->getHora_encerramento_ter() ."'>"?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    <?php

                                        }

                                    ?>

                                </div>

                                    <!-- Input Terça-Feira -->

                                </div>

                            </div>

                            <div class="col-xs-12 col-md-6"> <!-- Quarta-Feira -->

                                <?php 

                                    if ($estabelecimento->getHora_inicio_Qua() != false) {
                                        echo '<div id="configuracao__dia-quarta" class="configuracao__dia">';
                                    } else {
                                        echo '<div id="configuracao__dia-quarta" class="configuracao__dia--nulo">';
                                    }
                                                     
                                ?> 


                                    <div class="row">
                                        
                                        <div class="col-xs-12">
                                                <?php 
                                                    if ($estabelecimento->getHora_inicio_Qua() != false) {
                                                        echo   '<div class="configuracao__dia-checkbox">
                                                                    <div class="checkbox">                                            
                                                                        <label>
                                                                            <input type="checkbox" id="quarta" class="formulario__checkbox" name="quarta" checked >Quarta-Feira
                                                                        </label>                                            
                                                                    </div>
                                                                </div>';
                                                    } else {
                                                        echo   '<div class="configuracao__dia-checkbox--nulo">
                                                                    <div class="checkbox">                                            
                                                                        <label>
                                                                            <input type="checkbox" id="quarta" class="formulario__checkbox" name="quarta">Quarta-Feira
                                                                        </label>                                            
                                                                    </div>
                                                                </div>';
                                                    }
                                                     
                                                ?>                                                    
                                            
                                        </div>
                                    </div>

                                    <div id="formulario__quarta">

                                    <?php

                                        if ($estabelecimento->getHora_inicio_Qua() != false) {

                                    ?>
                                        <div class="row">
                                            <div class="col-xs-12">

                                                <div class="panel panel-default ">

                                                    <div class="panel-heading configuracao__painel-cabecalho">
                                                        <h4 class="panel-title">
                                                            <strong>Inicio : </strong><?php echo $estabelecimento->getHora_inicio_Qua() ?>
                                                            <a href="#painel-editar-hora_inicio_Qua" class="configuracao__botao-editar" data-toggle="collapse">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                Editar
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-hora_inicio_Qua">
                                                        <div class="panel-body">

                                                            <div class="form-group configuracao__campo">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-home"></span>
                                                                    </div>
                                                                    <?php echo "<input type='time' name='inicioQuae' class='form-control' required='required' value='". $estabelecimento->getHora_inicio_Qua() ."'>"?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-xs-12">

                                                <div class="panel panel-default ">

                                                    <div class="panel-heading configuracao__painel-cabecalho">
                                                        <h4 class="panel-title">
                                                            <strong>Encerramento : </strong><?php echo $estabelecimento->getHora_encerramento_Qua() ?>
                                                            <a href="#painel-editar-hora_encerramento_Qua" class="configuracao__botao-editar" data-toggle="collapse">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                Editar
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-hora_encerramento_Qua">
                                                        <div class="panel-body">

                                                            <div class="form-group configuracao__campo">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-home"></span>
                                                                    </div>
                                                                    <?php echo "<input type='time' name='encerramentoQuae' class='form-control' required='required' value='". $estabelecimento->getHora_encerramento_Qua() ."'>"?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    <?php

                                        }

                                    ?>

                                </div>

                                    <!-- Input Quarta-Feira -->

                                </div>

                            </div>

                            <div class="col-xs-12 col-md-6"> <!-- Quinta-Feira -->

                                <?php 

                                    if ($estabelecimento->getHora_inicio_qui() != false) {
                                        echo '<div id="configuracao__dia-quinta" class="configuracao__dia">';
                                    } else {
                                        echo '<div id="configuracao__dia-quinta" class="configuracao__dia--nulo">';
                                    }
                                                     
                                ?> 


                                    <div class="row">
                                        
                                        <div class="col-xs-12">
                                                <?php 
                                                    if ($estabelecimento->getHora_inicio_qui() != false) {
                                                        echo   '<div class="configuracao__dia-checkbox">
                                                                    <div class="checkbox">                                            
                                                                        <label>
                                                                            <input type="checkbox" id="quinta" class="formulario__checkbox" name="quinta" checked >Quinta-Feira
                                                                        </label>                                            
                                                                    </div>
                                                                </div>';
                                                    } else {
                                                        echo   '<div class="configuracao__dia-checkbox--nulo">
                                                                    <div class="checkbox">                                            
                                                                        <label>
                                                                            <input type="checkbox" id="quinta" class="formulario__checkbox" name="quinta">Quinta-Feira
                                                                        </label>                                            
                                                                    </div>
                                                                </div>';
                                                    }
                                                     
                                                ?>                                                    
                                            
                                        </div>
                                    </div>

                                    <div id="formulario__quinta">

                                    <?php

                                        if ($estabelecimento->getHora_inicio_qui() != false) {

                                    ?>
                                        <div class="row">
                                            <div class="col-xs-12">

                                                <div class="panel panel-default ">

                                                    <div class="panel-heading configuracao__painel-cabecalho">
                                                        <h4 class="panel-title">
                                                            <strong>Inicio : </strong><?php echo $estabelecimento->getHora_inicio_qui() ?>
                                                            <a href="#painel-editar-hora_inicio_qui" class="configuracao__botao-editar" data-toggle="collapse">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                Editar
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-hora_inicio_qui">
                                                        <div class="panel-body">

                                                            <div class="form-group configuracao__campo">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-home"></span>
                                                                    </div>
                                                                    <?php echo "<input type='time' name='inicioQuie' class='form-control' required='required' value='". $estabelecimento->getHora_inicio_qui() ."'>"?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-xs-12">

                                                <div class="panel panel-default ">

                                                    <div class="panel-heading configuracao__painel-cabecalho">
                                                        <h4 class="panel-title">
                                                            <strong>Encerramento : </strong><?php echo $estabelecimento->getHora_encerramento_qui() ?>
                                                            <a href="#painel-editar-hora_encerramento_qui" class="configuracao__botao-editar" data-toggle="collapse">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                Editar
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-hora_encerramento_qui">
                                                        <div class="panel-body">

                                                            <div class="form-group configuracao__campo">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-home"></span>
                                                                    </div>
                                                                    <?php echo "<input type='time' name='encerramentoQuie' class='form-control' required='required' value='". $estabelecimento->getHora_encerramento_qui() ."'>"?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    <?php

                                        }

                                    ?>

                                </div>

                                    <!-- Input Quinta-Feira -->

                                </div>

                            </div> 

                            <div class="col-xs-12 col-md-6"> <!-- Sexta-Feira -->

                                <?php 

                                    if ($estabelecimento->getHora_inicio_sex() != false) {
                                        echo '<div id="configuracao__dia-sexta" class="configuracao__dia">';
                                    } else {
                                        echo '<div id="configuracao__dia-sexta" class="configuracao__dia--nulo">';
                                    }
                                                     
                                ?> 


                                    <div class="row">
                                        
                                        <div class="col-xs-12">
                                                <?php 
                                                    if ($estabelecimento->getHora_inicio_sex() != false) {
                                                        echo   '<div class="configuracao__dia-checkbox">
                                                                    <div class="checkbox">                                            
                                                                        <label>
                                                                            <input type="checkbox" id="sexta" class="formulario__checkbox" name="sexta" checked >Sexta-Feira
                                                                        </label>                                            
                                                                    </div>
                                                                </div>';
                                                    } else {
                                                        echo   '<div class="configuracao__dia-checkbox--nulo">
                                                                    <div class="checkbox">                                            
                                                                        <label>
                                                                            <input type="checkbox" id="sexta" class="formulario__checkbox" name="sexta">Sexta-Feira
                                                                        </label>                                            
                                                                    </div>
                                                                </div>';
                                                    }
                                                     
                                                ?>                                                    
                                            
                                        </div>
                                    </div>

                                    <div id="formulario__sexta">

                                    <?php

                                        if ($estabelecimento->getHora_inicio_sex() != false) {

                                    ?>
                                        <div class="row">
                                            <div class="col-xs-12">

                                                <div class="panel panel-default ">

                                                    <div class="panel-heading configuracao__painel-cabecalho">
                                                        <h4 class="panel-title">
                                                            <strong>Inicio : </strong><?php echo $estabelecimento->getHora_inicio_sex() ?>
                                                            <a href="#painel-editar-hora_inicio_sex" class="configuracao__botao-editar" data-toggle="collapse">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                Editar
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-hora_inicio_sex">
                                                        <div class="panel-body">

                                                            <div class="form-group configuracao__campo">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-home"></span>
                                                                    </div>
                                                                    <?php echo "<input type='time' name='inicioSexe' class='form-control' required='required' value='". $estabelecimento->getHora_inicio_sex() ."'>"?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-xs-12">

                                                <div class="panel panel-default ">

                                                    <div class="panel-heading configuracao__painel-cabecalho">
                                                        <h4 class="panel-title">
                                                            <strong>Encerramento : </strong><?php echo $estabelecimento->getHora_encerramento_sex() ?>
                                                            <a href="#painel-editar-hora_encerramento_sex" class="configuracao__botao-editar" data-toggle="collapse">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                Editar
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-hora_encerramento_sex">
                                                        <div class="panel-body">

                                                            <div class="form-group configuracao__campo">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-home"></span>
                                                                    </div>
                                                                    <?php echo "<input type='time' name='encerramentoSexe' class='form-control' required='required' value='". $estabelecimento->getHora_encerramento_sex() ."'>"?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    <?php

                                        }

                                    ?>

                                </div>

                                    <!-- Input Sexta-Feira -->

                                </div>

                            </div>

                            <div class="col-xs-12 col-md-6"> <!-- Sabado-Feira -->

                                <?php 

                                    if ($estabelecimento->getHora_inicio_sab() != false) {
                                        echo '<div id="configuracao__dia-sabado" class="configuracao__dia">';
                                    } else {
                                        echo '<div id="configuracao__dia-sabado" class="configuracao__dia--nulo">';
                                    }
                                                     
                                ?> 


                                    <div class="row">
                                        
                                        <div class="col-xs-12">
                                                <?php 
                                                    if ($estabelecimento->getHora_inicio_sab() != false) {
                                                        echo   '<div class="configuracao__dia-checkbox">
                                                                    <div class="checkbox">                                            
                                                                        <label>
                                                                            <input type="checkbox" id="sabado" class="formulario__checkbox" name="sabado" checked >Sabado-Feira
                                                                        </label>                                            
                                                                    </div>
                                                                </div>';
                                                    } else {
                                                        echo   '<div class="configuracao__dia-checkbox--nulo">
                                                                    <div class="checkbox">                                            
                                                                        <label>
                                                                            <input type="checkbox" id="sabado" class="formulario__checkbox" name="sabado">Sabado-Feira
                                                                        </label>                                            
                                                                    </div>
                                                                </div>';
                                                    }
                                                     
                                                ?>                                                    
                                            
                                        </div>
                                    </div>

                                    <div id="formulario__sabado">

                                    <?php

                                        if ($estabelecimento->getHora_inicio_sab() != false) {

                                    ?>
                                        <div class="row">
                                            <div class="col-xs-12">

                                                <div class="panel panel-default ">

                                                    <div class="panel-heading configuracao__painel-cabecalho">
                                                        <h4 class="panel-title">
                                                            <strong>Inicio : </strong><?php echo $estabelecimento->getHora_inicio_sab() ?>
                                                            <a href="#painel-editar-hora_inicio_sab" class="configuracao__botao-editar" data-toggle="collapse">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                Editar
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-hora_inicio_sab">
                                                        <div class="panel-body">

                                                            <div class="form-group configuracao__campo">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-home"></span>
                                                                    </div>
                                                                    <?php echo "<input type='time' name='inicioSabe' class='form-control' required='required' value='". $estabelecimento->getHora_inicio_sab() ."'>"?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-xs-12">

                                                <div class="panel panel-default ">

                                                    <div class="panel-heading configuracao__painel-cabecalho">
                                                        <h4 class="panel-title">
                                                            <strong>Encerramento : </strong><?php echo $estabelecimento->getHora_encerramento_sab() ?>
                                                            <a href="#painel-editar-hora_encerramento_sab" class="configuracao__botao-editar" data-toggle="collapse">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                Editar
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-hora_encerramento_sab">
                                                        <div class="panel-body">

                                                            <div class="form-group configuracao__campo">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-home"></span>
                                                                    </div>
                                                                    <?php echo "<input type='time' name='encerramentoSabe' class='form-control' required='required' value='". $estabelecimento->getHora_encerramento_sab() ."'>"?>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    <?php

                                        }

                                    ?>

                                </div>

                                    <!-- Input Sabado-Feira -->

                                </div>

                            </div> 

                        </div>

                    </div>

                    <div class="configuracao__painel-outros clearfix">
                        <div class="row">

                            <div class="col-xs-12 col-md-6 col-lg-5">

                                <div class="panel panel-default ">

                                    <div class="panel-heading configuracao__painel-cabecalho">
                                        <h4 class="panel-title">
                                            <strong>CEP : </strong><?php echo $estabelecimento->getCep()?>
                                            <a href="#painel-editar-cep" class="configuracao__botao-editar" data-toggle="collapse">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                Editar
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-cep">
                                        <div class="panel-body">

                                            <div class="form-group configuracao__campo">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-globe"></span>
                                                    </div>
                                                    <?php echo "<input type='text' name='cepe' class='form-control mascaraCep' required='required' value='". $estabelecimento->getCep() ."'>"?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            

                            <div class="col-xs-12 col-md-6 col-lg-7">

                                <div class="panel panel-default ">

                                    <div class="panel-heading configuracao__painel-cabecalho">
                                        <h4 class="panel-title">
                                            <strong>Endereço : </strong><?php echo $estabelecimento->getEndereco()?>
                                            <a href="#painel-editar-endereco" class="configuracao__botao-editar" data-toggle="collapse">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                Editar
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-endereco">
                                        <div class="panel-body">

                                            <div class="form-group configuracao__campo">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-map-marker"></span>
                                                    </div>
                                                    <?php echo "<input type='text' name='enderecoe' class='form-control' required='required' value='". $estabelecimento->getEndereco() ."'>"?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-7">

                                <div class="panel panel-default ">

                                    <div class="panel-heading configuracao__painel-cabecalho">
                                        <h4 class="panel-title">
                                            <strong>Estado : </strong><?php echo $estabelecimento->getEstado()?>
                                            <a href="#painel-editar-estado" class="configuracao__botao-editar" data-toggle="collapse">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                Editar
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-estado">
                                        <div class="panel-body">

                                            <div class="form-group configuracao__campo">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-map-marker"></span>
                                                    </div>
                                                    <?php echo "<input type='text' name='estadoe' class='form-control' required='required' value='". $estabelecimento->getEstado() ."'>"?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-5">

                                <div class="panel panel-default ">

                                    <div class="panel-heading configuracao__painel-cabecalho">
                                        <h4 class="panel-title">
                                            <strong>Número : </strong><?php echo $estabelecimento->getNumero()?>
                                            <a href="#painel-editar-numero" class="configuracao__botao-editar" data-toggle="collapse">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                Editar
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-numero">
                                        <div class="panel-body">

                                            <div class="form-group configuracao__campo">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-home"></span>
                                                    </div>
                                                    <?php echo "<input type='text' name='numeroe' class='form-control' required='required' value='". $estabelecimento->getNumero() ."'>" ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12">

                                <div class="panel panel-default ">

                                    <div class="panel-heading configuracao__painel-cabecalho">
                                        <h4 class="panel-title">
                                            <strong>Complemento : </strong><?php echo $estabelecimento->getComplemento()?>
                                            <a href="#painel-editar-complemento" class="configuracao__botao-editar" data-toggle="collapse">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                Editar
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse collapse configuracao__painel-corpo" id="painel-editar-complemento">
                                        <div class="panel-body">

                                            <div class="form-group configuracao__campo">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-question-sign"></span>
                                                    </div>
                                                    <?php echo "<input type'=text' name='complementoe' class='form-control' required='required' value='". $estabelecimento->getComplemento() ."'>" ?>
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
                            <div class="configuracao__salvar">
                                Digite sua senha para salvar as alterações
                                <input type="password" name="senha" class="form-control" placeholder="Senha" required="required">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-offset-4 col-sm-4">
                            <input type='hidden' name='controle' value='estabelecimento'>
                            <input type='hidden' name='acao' value='salvarAlteracoes'>                        
                            <input type="submit" value="Salvar Alterações" class="botao botao--vermelho configuracao__botao">
                        </div>
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
                                                <input type='hidden' name='controle' value='estabelecimento'>
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
                <div class="layout-configuracao-parte-dois clearfix">                    

                    <div class="col-xs-12 col-sm-4">
                        <div class="configuracao-parte-dois" align="center">
                            <img class="img-responsive" src="views/imagens/cadastrarAlimentos.png">
                            <a href="?controle=produto&acao=pagAdicionarExcluirProdutos" class="botao botao--vermelho configuracao-parte-dois__botao">Adicionar/Excluir produtos </a>
                        </div>
                    </div>

                    
                    <div class="col-xs-12 col-sm-4">
                        <div class="configuracao-parte-dois" align="center">
                            <img class="img-responsive" src="views/imagens/imagens.png">
                            <a   href="?controle=estabelecimento&acao=pagAdicionarImagem"  class="botao botao--amarelo configuracao-parte-dois__botao">Adicionar Imagens do Estabelecimento</a>
                        </div>
                    </div>
                    

                    <div class="col-xs-12 col-sm-4">
                        <div class="configuracao-parte-dois" align="center">
                            <img class="img-responsive" src="views/imagens/alterarCardapio.jpg">
                            <a   href="?controle=estabelecimento&acao=pagAlterarCardapio"  class="botao botao--vermelho configuracao-parte-dois__botao">Alterar Cardápio</a>
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

    <script type="text/javascript">

    function inserirInput(dia, diaAbre) {

        conteudo  = '<div class="row">';
        conteudo +=     '<div class="col-xs-12">';

        conteudo +=        '<div class="form-group configuracao__campo">';
        conteudo +=            '<div class="input-group">';
        conteudo +=                '<div class="input-group-addon">';
        conteudo +=                    '<span class="glyphicon glyphicon-home"></span>';
        conteudo +=                '</div>';
        conteudo +=                '<input type="time" name="inicio' + diaAbre + 'e" class="form-control" required="required" >';
        conteudo +=            '</div>';
        conteudo +=        '</div>';

        conteudo +=    '</div>';

        conteudo +=    '<div class="col-xs-12">';

        conteudo +=        '<div class="form-group configuracao__campo">';
        conteudo +=            '<div class="input-group">';
        conteudo +=                '<div class="input-group-addon">';
        conteudo +=                    '<span class="glyphicon glyphicon-home"></span>';
        conteudo +=                '</div>';
        conteudo +=                '<input type="time" name="encerramento' + diaAbre + 'e" class="form-control" required="required" ';
        conteudo +=            '</div>';
        conteudo +=        '</div>';
        conteudo +=    '</div>';
        conteudo +='</div>';

        $("#formulario__" + dia ).html(conteudo);    
    }

    $(document).ready(function(){

        $("#domingo").click(function(evento){

            if ($("#domingo").prop("checked")){


                inserirInput("domingo", "Dom");
                

                setTimeout(function(){
                    $("#formulario__domingo").css("opacity", "1")
                    $("#configuracao__dia-domigo").addClass("configuracao__dia");
                    $("#configuracao__dia-domigo").removeClass("configuracao__dia--nulo");
                }, 5);
            }else{
                
                $("#formulario__domingo").html("");


                setTimeout(function(){
                    $("#formulario__domingo").css("opacity", "0")
                    $("#configuracao__dia-domigo").addClass("configuracao__dia--nulo");
                    $("#configuracao__dia-domigo").removeClass("configuracao__dia");
                }, 5);
            }

        });

        $("#segunda").click(function(evento){

            if ($("#segunda").prop("checked")){


                inserirInput("segunda", "Seg");
                

                setTimeout(function(){
                    $("#formulario__segunda").css("opacity", "1")
                    $("#configuracao__dia-segunda").addClass("configuracao__dia");
                    $("#configuracao__dia-segunda").removeClass("configuracao__dia--nulo");

                }, 5);
            }else{
                
                $("#formulario__segunda").html("");

                setTimeout(function(){
                    $("#formulario__segunda").css("opacity", "0")
                    $("#configuracao__dia-segunda").addClass("configuracao__dia--nulo");
                    $("#configuracao__dia-segunda").removeClass("configuracao__dia");
                }, 5);
            }

        });

        $("#terca").click(function(evento){

            if ($("#terca").prop("checked")){


                inserirInput("terca", "Ter");
                

                setTimeout(function(){
                    $("#formulario__terca").css("opacity", "1")
                    $("#configuracao__dia-terca").addClass("configuracao__dia");
                    $("#configuracao__dia-terca").removeClass("configuracao__dia--nulo");
                }, 5);
            }else{
                
                $("#formulario__terca").html("");

                setTimeout(function(){
                    $("#formulario__terca").css("opacity", "0")
                    $("#configuracao__dia-terca").addClass("configuracao__dia--nulo");
                    $("#configuracao__dia-terca").removeClass("configuracao__dia");
                }, 5);
            }

        });

        $("#quarta").click(function(evento){

            if ($("#quarta").prop("checked")){


                inserirInput("quarta", "Qua");
                

                setTimeout(function(){
                    $("#formulario__quarta").css("opacity", "1")
                    $("#configuracao__dia-quarta").addClass("configuracao__dia");
                    $("#configuracao__dia-quarta").removeClass("configuracao__dia--nulo");
                }, 5);
            }else{
                
                $("#formulario__quarta").html("");

                setTimeout(function(){
                    $("#formulario__quarta").css("opacity", "0")
                    $("#configuracao__dia-quarta").addClass("configuracao__dia--nulo");
                    $("#configuracao__dia-quarta").removeClass("configuracao__dia");
                }, 5);
            }

        });

        $("#quinta").click(function(evento){

            if ($("#quinta").prop("checked")){


                inserirInput("quinta", "Qui");
                

                setTimeout(function(){
                    $("#formulario__quinta").css("opacity", "1")
                    $("#configuracao__dia-quinta").addClass("configuracao__dia");
                    $("#configuracao__dia-quinta").removeClass("configuracao__dia--nulo");
                }, 5);
            }else{
                
                $("#formulario__quinta").html("");

                setTimeout(function(){
                    $("#formulario__quinta").css("opacity", "0")
                    $("#configuracao__dia-quinta").addClass("configuracao__dia--nulo");
                    $("#configuracao__dia-quinta").removeClass("configuracao__dia");
                }, 5);
            }

        });

        $("#sexta").click(function(evento){

            if ($("#sexta").prop("checked")){


                inserirInput("sexta", "Sex");
                

                setTimeout(function(){
                    $("#formulario__sexta").css("opacity", "1")
                    $("#configuracao__dia-sexta").addClass("configuracao__dia");
                    $("#configuracao__dia-sexta").removeClass("configuracao__dia--nulo");
                }, 5);
            }else{
                
                $("#formulario__sexta").html("");

                setTimeout(function(){
                    $("#formulario__sexta").css("opacity", "0")
                    $("#configuracao__dia-sexta").addClass("configuracao__dia--nulo");
                    $("#configuracao__dia-sexta").removeClass("configuracao__dia");
                }, 5);
            }

        });

        $("#sabado").click(function(evento){

            if ($("#sabado").prop("checked")){


                inserirInput("sabado", "Sab");
                

                setTimeout(function(){
                    $("#formulario__sabado").css("opacity", "1")
                    $("#configuracao__dia-sabado").addClass("configuracao__dia");
                    $("#configuracao__dia-sabado").removeClass("configuracao__dia--nulo");
                }, 5);
            }else{
                
                $("#formulario__sabado").html("");

                setTimeout(function(){
                    $("#formulario__sabado").css("opacity", "0")
                    $("#configuracao__dia-sabado").addClass("configuracao__dia--nulo");
                    $("#configuracao__dia-sabado").removeClass("configuracao__dia");
                }, 5);
            }

        });

    });
</script>
</body>
</html>