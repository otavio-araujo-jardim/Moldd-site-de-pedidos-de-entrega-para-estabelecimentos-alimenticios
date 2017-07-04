<link rel="stylesheet" href="views/css/menuPadrao.css">

<header>


    <div class="layout-barra-usuario">
        <div class="container">
            <nav class="barra clearfix">
                <div  align="center">
                    <ul class="barra__itens">
                        <li class="barra__item">

                            <span class="barra__nome"><?php echo $_SESSION['nome']?> <span class="caret"></span></span>                                

                            <ul class="barra__itens-escondidos">
                                <li class="barra__item-escondido">
                                    <a href="?controle=estabelecimento&acao=pagConfiguracao">
                                        <span class="glyphicon glyphicon-cog barra__icone"></span>
                                        Configurações
                                    </a>
                                </li>
                                <li class="barra__item-escondido">
                                    <a href="?controle=produto&acao=pagAdicionarExcluirProdutos">
                                    <span class="glyphicon glyphicon-cutlery barra__icone"></span>
                                    Adicionar/Excluir produtos
                                    </a>
                                </li>

                                <li class="barra__item-escondido">
                                    <a href="?controle=pedido&acao=pagpedidosRealizados">
                                    <span class="glyphicon glyphicon-cutlery barra__icone"></span>
                                    Pedidos Realizados
                                    </a>
                                </li>

                                <li class="barra__item-escondido">
                                    <a href="?controle=pedido&acao=pagPedidosFinalizados">
                                    <span class="glyphicon glyphicon-cutlery barra__icone"></span>
                                    Pedidos Finalizados
                                    </a>
                                </li>

                                <li class="barra__item-escondido">
                                    <a href="?controle=estabelecimento&acao=pagAlterarCardapio">
                                    <span class="glyphicon glyphicon-list-alt barra__icone"></span>
                                    Alterar Cardápio
                                    </a>
                                </li>
                                <li class="barra__item-escondido">
                                   <a href="?controle=usuario&acao=sair">
                                       <span class="glyphicon glyphicon-log-out barra__icone"></span>
                                       Sair
                                   </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    
    <div class="layout-cabecalho parallax" data-speed="10">

        <div class="container">
            <div class="layout-banner">

                <div class="banner">

                    <a class="banner__link" href="index.php"><img  class="banner__logo" src="views/imagens/LogoMoldd.png" alt=""></a>

                    <img class="banner__img" src="views/imagens/ChefeMoldd.png">

                </div>

            </div>
        </div>
    </div>

    <nav class="navbar navbar-inverse layout-menu">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#idmenu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse menu" id="idmenu">
                <ul class="nav navbar-nav">

                    <li id="menu__item-inicio">
                        <a href="?controle=estabelecimento&acao=pagInicio" class="menu__item">INICIO</a>
                    </li>

                    <li>
                        <a href="?controle=usuario&acao=pagComoFunciona" class="menu__item">COMO FUNCIONA</a>
                    </li>

                    <li>
                        <a href="?controle=pedido&acao=pagpedidosRealizados" class="menu__item">PEDIDOS REALIZADOS</a>
                    </li>

                    <li>
                        <a href="?controle=comentario&acao=pagcomentariosEstabelecimento" class="menu__item">COMENTÁRIOS</a>
                    </li>

                    <li>
                        <a href="?controle=usuario&acao=pagContato" class="menu__item">CONTATO</a>
                    </li>

                </ul>
            
            </div>

        </div>
    </nav>

</header>