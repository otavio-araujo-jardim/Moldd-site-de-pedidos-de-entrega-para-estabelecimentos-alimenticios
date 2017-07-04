<?php 

    if (isset($_SESSION['usuario'])) {
         header("location:?controle=estabelecimento&acao=pagInicio");
    } else {

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Cadastrar Estabelecimento</title>

    <link rel="stylesheet" href="views/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/base.css">
    <link rel="stylesheet" href="views/css/cadastroEstabelecimento.css">
    <link rel="stylesheet" href="views/css/cabecalhoPadrao.css">
    <link rel="stylesheet" href="views/css/rodape.css">
    <link rel="stylesheet" href="views/css/parallax.css">

    <script type="text/javascript">

        

        function salvar() {
           
            if ( $("#domingo").prop("checked")  || 
                 $("#segunda").prop("checked")  ||
                 $("#terca").prop("checked")    ||
                 $("#quarta").prop("checked")   ||
                 $("#quinta").prop("checked")   ||
                 $("#sexta").prop("checked")    ||
                 $("#sabado").prop("checked")) {

                $("#form-cadastro").find('#form-cadastro-submit').trigger('click');

            } else {

                setTimeout(function(){
                    $(".formulario__categoria--horario").css("background-color", "#ff9c9c");
                    $(".formulario__caixa-dia").css("background-color", "#ffcaca");
                    $(".formulario__texto-dias").css("color", "#7b0000");
                    $(".formulario__titulo--horario").css("color", "#d20000");
                    $(".formulario__titulo--horario").css("border-bottom", "1px solid #d20000");
                }, 5);

            }

        }


    </script>

</head>
<body>

        <?php
            $titulo = "Cadastrar Estabelecimento";
            require_once 'cabecalhoPadrao.php';
        ?>

<main class="layout-cadastro">
    <div class="container">
        <div class="cadastro">

            <form method="post" id="form-cadastro" class="clearfix">

                <div class="row">

                    <div class="col-xs-12" align="center">
                        <div class="formulario">

                            <h3 class="formulario__titulo">Representante</h3>

                            <div class="row">

                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-user"></span>
                                                <label for="nomer">Nome do Representante</label>
                                            </div>
                                            <input type="text" id="nomer" name="nomer" class="form-control" placeholder="Nome do Representante" required="required">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-envelope"></span>
                                                <label for="emailr">E-Mail do Representante</label>
                                            </div>
                                            <input type="email" id="emailr" name="emailr" class="form-control" placeholder="E-Mail do Representante" required="required">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-8">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-earphone"></span>
                                                <label for="telefoner">Telefone do Representante</label>
                                            </div>
                                            <input type="tel" id="telefoner" name="telefoner" class="form-control mascaraTelefoneDDD" placeholder="Telefone do Representante" required="required"/>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <h3 class="formulario__titulo">Estabelecimento</h3>

                            <div class="row">

                                <div class="formulario__categoria clearfix">

                                    <div class="col-xs-12 col-md-7">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-envelope"></span>
                                                    <label for="emaile">E-Mail</label>
                                                </div>
                                                <input type="email" id="emaile" name="emaile" class="form-control" placeholder="E-Mail" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-5">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-option-horizontal"></span>
                                                    <label for="senhae">Senha</label>
                                                </div>
                                                <input type="password" id="senhae" name="senhae" class="form-control" placeholder="Senha" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-user"></span>
                                                    <label for="nomee">Nome</label>
                                                </div>
                                                <input type="text" id="nomee" name="nomee" class="form-control" placeholder="Nome" required="required">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="formulario__categoria clearfix">

                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-earphone"></span>
                                                    <label for="telefonee">Telefone</label>
                                                </div>
                                                <input type="tel" id="telefonee" name="telefonee" class="form-control mascaraTelefoneDDD" placeholder="Telefone" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-cutlery"></span>
                                                    <label for="tipoe">Tipo</label>
                                                </div>
                                                <select  class="form-control" name="tipoe" id="tipoe" required="required">
                                                    <option value="Restaurante">Restaurante</option>
                                                    <option value="Delivery">Delivery</option>
                                                    <option value="ComidaCongelada">Comida congelada</option>
                                                    <option value="SalgadosDocesFestas">Salgados e doces p/ festas</option>
                                                    <option value="BarPub">Bar ou pub</option>
                                                    <option value="CafeteriaLanches">Cafeteria ou lanches</option>
                                                    <option value="Hotel">Hotel</option>
                                                    <option value="FastFood">Fast-food</option>
                                                    <option value="PracaAlimentação">Praça de Alimentação</option>
                                                    <option value="FoodTruck">Food Truck</option>
                                                    <option value="DriveThru">Drive Thru</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-home"></span>
                                                    <label for="cnpje">CNPJ</label>
                                                </div>
                                                <input type="text" id="cnpje" name="cnpje" class="form-control mascaraCnpj" placeholder="CNPJ" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-usd"></span>
                                                    <label for="fretee">Preço do Frete</label>
                                                </div>
                                                <input type="text" id="fretee" name="fretee" class="form-control mascaraDinheiro" placeholder="Frete" required="required">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <h3 class="formulario__titulo formulario__titulo--horario ">Dias e Horários</h3>

                                <div class="formulario__categoria formulario__categoria--horario clearfix">

                                    <p class="formulario__texto-dias">* Selecione os dias em que este estabelecimento realiza entregas.  Após selecionar aparecerá dois campos, onde deverá  ser colocado a hora de início e de encerramento em que são realizadas as entregas no dia escolhido. </p>

                                    <p class="formulario__texto-dias">* Selecione no mínimo um dia. </p>

                                    <div class="col-xs-12 col-md-6 ">

                                        <div class="formulario__caixa-dia"> <!--   Domingo   -->

                                            <div class="row">                                            
                                            

                                                <div class="col-xs-12 ">
                                                    <div class="checkbox">                                            
                                                        <label>
                                                            <input type="checkbox" id="domingo" class="formulario__checkbox" name="domingo">Domingo
                                                        </label>                                            
                                                    </div>
                                                </div>

                                                <div id="formulario__domingo" class="formulario__domingo formulario__dia">

                                                    <!--   Input Domingo   -->

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-xs-12 col-md-6 ">

                                        <div class="formulario__caixa-dia"> <!--   Segunda-Feira   -->

                                            <div class="row">                                            
                                            

                                                <div class="col-xs-12 ">
                                                    <div class="checkbox">                                            
                                                        <label>
                                                            <input type="checkbox" id="segunda" class="formulario__checkbox" name="segunda">Segunda-Feira
                                                        </label>                                            
                                                    </div>
                                                </div>

                                                <div id="formulario__segunda" class="formulario__segunda formulario__dia">

                                                    <!--   Input Segunda-Feira   -->

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-xs-12 col-md-6 ">

                                        <div class="formulario__caixa-dia"> <!--   Terça-Feira   -->

                                            <div class="row">                                            
                                            

                                                <div class="col-xs-12 ">
                                                    <div class="checkbox">                                            
                                                        <label>
                                                            <input type="checkbox" id="terca" class="formulario__checkbox" name="terca">Terça-Feira
                                                        </label>                                            
                                                    </div>
                                                </div>

                                                <div id="formulario__terca" class="formulario__terca formulario__dia">

                                                    <!--    Input Terça-Feira   -->

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-xs-12 col-md-6 ">

                                        <div class="formulario__caixa-dia"> <!--   Quarta-Feira   -->

                                            <div class="row">                                            
                                            

                                                <div class="col-xs-12 ">
                                                    <div class="checkbox">                                            
                                                        <label>
                                                            <input type="checkbox" id="quarta" class="formulario__checkbox" name="quarta">Quarta-Feira
                                                        </label>                                            
                                                    </div>
                                                </div>

                                                <div id="formulario__quarta" class="formulario__quarta formulario__dia">

                                                    <!--   Input Quarta-Feira   -->

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-xs-12 col-md-6 ">

                                        <div class="formulario__caixa-dia"> <!--   Quinta-Feira   -->

                                            <div class="row">                                            
                                            

                                                <div class="col-xs-12 ">
                                                    <div class="checkbox">                                            
                                                        <label>
                                                            <input type="checkbox" id="quinta" class="formulario__checkbox" name="quinta">Quinta-Feira
                                                        </label>                                            
                                                    </div>
                                                </div>

                                                <div id="formulario__quinta" class="formulario__quinta formulario__dia">

                                                    <!--   Input Quinta-Feira   -->

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-xs-12 col-md-6 ">

                                        <div class="formulario__caixa-dia"> <!--   Sexta-Feira   -->

                                            <div class="row">                                            
                                            

                                                <div class="col-xs-12 ">
                                                    <div class="checkbox">                                            
                                                        <label>
                                                            <input type="checkbox" id="sexta" class="formulario__checkbox" name="sexta">Sexta-Feira
                                                        </label>                                            
                                                    </div>
                                                </div>

                                                <div id="formulario__sexta" class="formulario__sexta formulario__dia">

                                                    <!--   Input Sexta-Feira   -->

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-xs-12 col-md-6 ">

                                        <div class="formulario__caixa-dia"> <!--   Sabado   -->

                                            <div class="row">                                            
                                            

                                                <div class="col-xs-12 ">
                                                    <div class="checkbox">                                            
                                                        <label>
                                                            <input type="checkbox" id="sabado" class="formulario__checkbox" name="sabado">Sabado
                                                        </label>                                            
                                                    </div>
                                                </div>

                                                <div id="formulario__sabado" class="formulario__sabado formulario__dia">

                                                    <!--   Input Sabado   -->

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <h3 class="formulario__titulo">Endereço do Estabelecimento</h3>

                                <div class="formulario__categoria clearfix">

                                    <div class="col-xs-12 col-md-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-globe"></span>
                                                    <label for="cepe">CEP</label>
                                                </div>
                                                <input type="text" id="cepe" name="cepe" class="form-control mascaraCep" placeholder="CEP" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-8">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-road"></span>
                                                    <label for="estadoe">Estado</label>
                                                </div>
                                                <input type="text" id="estadoe" name="estadoe" class="form-control" placeholder="Estado" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-8">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-map-marker"></span>
                                                    <label for="enderecoe">Endereço</label>
                                                </div>
                                                <input type="text" id="enderecoe" name="enderecoe" class="form-control" placeholder="Endereço" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-home"></span>
                                                    <label for="numeroe">Número</label>
                                                </div>
                                                <input type="number" id="numeroe" name="numeroe" class="form-control" placeholder="Número" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-question-sign"></span>
                                                    <label for="complementoe">Complemento</label>
                                                </div>
                                                <input type="text" id="complementoe" name="complementoe" class="form-control" placeholder="Complemento" required="required">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <input type='hidden' name='controle' value='estabelecimento'>
                            <input type='hidden' name='acao' value='manterEstabelecimento'>

                            <button type="submit" id="form-cadastro-submit" class="hide"></button>

                            <div class="col-xs-12 col-sm-3 col-sm-offset-9">
                                <button type="button" onclick="javascript:salvar();" class="botao botao--vermelho">Cadastrar</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
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

<script type="text/javascript">
    $(document).ready(function(){

        $("#domingo").click(function(evento){

            if ($("#domingo").prop("checked")){
                $("#formulario__domingo").css("display", "block");

                conteudo = '<div class="col-xs-12">';
                conteudo +=     '<div class="form-group">';
                conteudo +=         '<div class="input-group">';
                conteudo +=             '<div class="input-group-addon">';
                conteudo +=                 '<span class="glyphicon glyphicon-time"></span>';
                conteudo +=                 '<label for="inicioDom">Inicio</label>';
                conteudo +=             '</div>';
                conteudo +=             '<input type="time" id="id-inicioDom" name="inicioDome" class="form-control" required >';
                conteudo +=         '</div>';
                conteudo +=     '</div>';
                conteudo += '</div>';

                conteudo += '<div class="col-xs-12">';
                conteudo +=     '<div class="form-group">';
                conteudo +=         '<div class="input-group">';
                conteudo +=             '<div class="input-group-addon">';
                conteudo +=                 '<span class="glyphicon glyphicon-time"></span>';
                conteudo +=                 '<label for="encerramentoDom">Encerramento</label>';
                conteudo +=             '</div>';
                conteudo +=             '<input type="time" id="id-encerramentoDom" name="encerramentoDome" class="form-control" required >'
                conteudo +=         '</div>';
                conteudo +=     '</div>';
                conteudo += '</div>';

                $("#formulario__domingo").append(conteudo);

                setTimeout(function(){
                    $("#formulario__domingo").css("opacity", "1")
                }, 5);
            }else{
                $("#formulario__domingo").css("display", "none");
                
                $("#formulario__domingo").html("");

                setTimeout(function(){
                    $("#formulario__domingo").css("opacity", "0")
                }, 5);
            }

        });

        $("#segunda").click(function(evento){

            if ($("#segunda").prop("checked")){
                $("#formulario__segunda").css("display", "block");
               
                conteudo = '<div class="col-xs-12">';
                conteudo +=     '<div class="form-group">';
                conteudo +=         '<div class="input-group">';
                conteudo +=             '<div class="input-group-addon">';
                conteudo +=                 '<span class="glyphicon glyphicon-time"></span>';
                conteudo +=                 '<label for="inicioSeg">Inicio</label>';
                conteudo +=             '</div>';
                conteudo +=             '<input type="time" id="id-inicioSeg" name="inicioSege" class="form-control" required >';
                conteudo +=         '</div>';
                conteudo +=     '</div>';
                conteudo += '</div>';

                conteudo += '<div class="col-xs-12">';
                conteudo +=     '<div class="form-group">';
                conteudo +=         '<div class="input-group">';
                conteudo +=             '<div class="input-group-addon">';
                conteudo +=                 '<span class="glyphicon glyphicon-time"></span>';
                conteudo +=                 '<label for="encerramentoSeg">Encerramento</label>';
                conteudo +=             '</div>';
                conteudo +=             '<input type="time" id="id-encerramentoSeg" name="encerramentoSege" class="form-control" required >'
                conteudo +=         '</div>';
                conteudo +=     '</div>';
                conteudo += '</div>';

                $("#formulario__segunda").append(conteudo);

                setTimeout(function(){
                    $("#formulario__segunda").css("opacity", "1")
                }, 5);
            }else{
                $("#formulario__segunda").css("display", "none");

                $("#formulario__segunda").html("");

                setTimeout(function(){
                    $("#formulario__segunda").css("opacity", "0")
                }, 5);
            }

        });

        $("#terca").click(function(evento){

            if ($("#terca").prop("checked")){
                $("#formulario__terca").css("display", "block");

                conteudo = '<div class="col-xs-12">';
                conteudo +=     '<div class="form-group">';
                conteudo +=         '<div class="input-group">';
                conteudo +=             '<div class="input-group-addon">';
                conteudo +=                 '<span class="glyphicon glyphicon-time"></span>';
                conteudo +=                 '<label for="inicioTer">Inicio</label>';
                conteudo +=             '</div>';
                conteudo +=             '<input type="time" id="id-inicioTer" name="inicioTere" class="form-control" required >';
                conteudo +=         '</div>';
                conteudo +=     '</div>';
                conteudo += '</div>';

                conteudo += '<div class="col-xs-12">';
                conteudo +=     '<div class="form-group">';
                conteudo +=         '<div class="input-group">';
                conteudo +=             '<div class="input-group-addon">';
                conteudo +=                 '<span class="glyphicon glyphicon-time"></span>';
                conteudo +=                 '<label for="encerramentoTer">Encerramento</label>';
                conteudo +=             '</div>';
                conteudo +=             '<input type="time" id="id-encerramentoTer" name="encerramentoTere" class="form-control" required >'
                conteudo +=         '</div>';
                conteudo +=     '</div>';
                conteudo += '</div>';

                $("#formulario__terca").append(conteudo);

                setTimeout(function(){
                    $("#formulario__terca").css("opacity", "1")
                }, 5);
            }else{
                $("#formulario__terca").css("display", "none");                

                $("#formulario__terca").html("");

                setTimeout(function(){
                    $("#formulario__terca").css("opacity", "0")
                }, 5);
            }

        });

        $("#quarta").click(function(evento){

            if ($("#quarta").prop("checked")){
                $("#formulario__quarta").css("display", "block");

                conteudo = '<div class="col-xs-12">';
                conteudo +=     '<div class="form-group">';
                conteudo +=         '<div class="input-group">';
                conteudo +=             '<div class="input-group-addon">';
                conteudo +=                 '<span class="glyphicon glyphicon-time"></span>';
                conteudo +=                 '<label for="inicioQua">Inicio</label>';
                conteudo +=             '</div>';
                conteudo +=             '<input type="time" id="id-inicioQua" name="inicioQuae" class="form-control" required >';
                conteudo +=         '</div>';
                conteudo +=     '</div>';
                conteudo += '</div>';

                conteudo += '<div class="col-xs-12">';
                conteudo +=     '<div class="form-group">';
                conteudo +=         '<div class="input-group">';
                conteudo +=             '<div class="input-group-addon">';
                conteudo +=                 '<span class="glyphicon glyphicon-time"></span>';
                conteudo +=                 '<label for="encerramentoQua">Encerramento</label>';
                conteudo +=             '</div>';
                conteudo +=             '<input type="time" id="id-encerramentoQua" name="encerramentoQuae" class="form-control" required >'
                conteudo +=         '</div>';
                conteudo +=     '</div>';
                conteudo += '</div>';

                $("#formulario__quarta").append(conteudo);

                setTimeout(function(){
                    $("#formulario__quarta").css("opacity", "1")
                }, 5);
            }else{
                $("#formulario__quarta").css("display", "none");

                $("#formulario__quarta").html("");

                setTimeout(function(){
                    $("#formulario__quarta").css("opacity", "0")
                }, 5);
            }

        });

        $("#quinta").click(function(evento){

            if ($("#quinta").prop("checked")){
                $("#formulario__quinta").css("display", "block");

                conteudo = '<div class="col-xs-12">';
                conteudo +=     '<div class="form-group">';
                conteudo +=         '<div class="input-group">';
                conteudo +=             '<div class="input-group-addon">';
                conteudo +=                 '<span class="glyphicon glyphicon-time"></span>';
                conteudo +=                 '<label for="inicioQui">Inicio</label>';
                conteudo +=             '</div>';
                conteudo +=             '<input type="time" id="id-inicioQui" name="inicioQuie" class="form-control" required >';
                conteudo +=         '</div>';
                conteudo +=     '</div>';
                conteudo += '</div>';

                conteudo += '<div class="col-xs-12">';
                conteudo +=     '<div class="form-group">';
                conteudo +=         '<div class="input-group">';
                conteudo +=             '<div class="input-group-addon">';
                conteudo +=                 '<span class="glyphicon glyphicon-time"></span>';
                conteudo +=                 '<label for="encerramentoQui">Encerramento</label>';
                conteudo +=             '</div>';
                conteudo +=             '<input type="time" id="id-encerramentoQui" name="encerramentoQuie" class="form-control" required >'
                conteudo +=         '</div>';
                conteudo +=     '</div>';
                conteudo += '</div>';

                $("#formulario__quinta").append(conteudo);

                setTimeout(function(){
                    $("#formulario__quinta").css("opacity", "1")
                }, 5);
            }else{
                $("#formulario__quinta").css("display", "none");

                $("#formulario__quinta").html("");

                setTimeout(function(){
                    $("#formulario__quinta").css("opacity", "0")
                }, 5);
            }

        });

        $("#sexta").click(function(evento){

            if ($("#sexta").prop("checked")){
                $("#formulario__sexta").css("display", "block");

                conteudo = '<div class="col-xs-12">';
                conteudo +=     '<div class="form-group">';
                conteudo +=         '<div class="input-group">';
                conteudo +=             '<div class="input-group-addon">';
                conteudo +=                 '<span class="glyphicon glyphicon-time"></span>';
                conteudo +=                 '<label for="inicioSex">Inicio</label>';
                conteudo +=             '</div>';
                conteudo +=             '<input type="time" id="id-inicioSex" name="inicioSexe" class="form-control" required >';
                conteudo +=         '</div>';
                conteudo +=     '</div>';
                conteudo += '</div>';

                conteudo += '<div class="col-xs-12">';
                conteudo +=     '<div class="form-group">';
                conteudo +=         '<div class="input-group">';
                conteudo +=             '<div class="input-group-addon">';
                conteudo +=                 '<span class="glyphicon glyphicon-time"></span>';
                conteudo +=                 '<label for="encerramentoSex">Encerramento</label>';
                conteudo +=             '</div>';
                conteudo +=             '<input type="time" id="id-encerramentoSex" name="encerramentoSexe" class="form-control" required >'
                conteudo +=         '</div>';
                conteudo +=     '</div>';
                conteudo += '</div>';

                $("#formulario__sexta").append(conteudo);

                setTimeout(function(){
                    $("#formulario__sexta").css("opacity", "1")
                }, 5);
            }else{
                $("#formulario__sexta").css("display", "none");

                $("#formulario__sexta").html("");

                setTimeout(function(){
                    $("#formulario__sexta").css("opacity", "0")
                }, 5);
            }

        });

        $("#sabado").click(function(evento){

            if ($("#sabado").prop("checked")){
                $("#formulario__sabado").css("display", "block");

                conteudo = '<div class="col-xs-12">';
                conteudo +=     '<div class="form-group">';
                conteudo +=         '<div class="input-group">';
                conteudo +=             '<div class="input-group-addon">';
                conteudo +=                 '<span class="glyphicon glyphicon-time"></span>';
                conteudo +=                 '<label for="inicioSab">Inicio</label>';
                conteudo +=             '</div>';
                conteudo +=             '<input type="time" id="id-inicioSab" name="inicioSabe" class="form-control" required >';
                conteudo +=         '</div>';
                conteudo +=     '</div>';
                conteudo += '</div>';

                conteudo += '<div class="col-xs-12">';
                conteudo +=     '<div class="form-group">';
                conteudo +=         '<div class="input-group">';
                conteudo +=             '<div class="input-group-addon">';
                conteudo +=                 '<span class="glyphicon glyphicon-time"></span>';
                conteudo +=                 '<label for="encerramentoSab">Encerramento</label>';
                conteudo +=             '</div>';
                conteudo +=             '<input type="time" id="id-encerramentoSab" name="encerramentoSabe" class="form-control" required >'
                conteudo +=         '</div>';
                conteudo +=     '</div>';
                conteudo += '</div>';

                $("#formulario__sabado").append(conteudo);

                setTimeout(function(){
                    $("#formulario__sabado").css("opacity", "1")
                }, 5);
            }else{
                $("#formulario__sabado").css("display", "none");

                $("#formulario__sabado").html("");

                setTimeout(function(){
                    $("#formulario__sabado").css("opacity", "0")
                }, 5);
            }

        });

    });

</script>
</body>
</html>


<?php

    }

?>