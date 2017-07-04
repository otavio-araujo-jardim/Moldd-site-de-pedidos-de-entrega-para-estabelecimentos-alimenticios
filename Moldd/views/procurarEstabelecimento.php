<?php
	$params = $this->getParams();
	$listaEnderecos = $params['listaEnderecos'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Procurar Restaurante</title>

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/base.css">
	<link rel="stylesheet" href="views/css/procurarEstabelecimento.css">
	<link rel="stylesheet" href="views/css/rodape.css">
	<link rel="stylesheet" href="views/css/parallax.css">
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCsNU4DCMa9fdT-aU0UmGJu4vOQDpTJGs" async defer></script>
	<script src="views/js/jquery-3.1.1.min.js"></script>
   
    <script type="text/javascript">

    	

    	function CalculaDistancia(enderecoEstabelecimento, enderecoCliente) {
	        // Instancia o DistanceMatrixService.
	        var service = new google.maps.DistanceMatrixService();
	        // Executa o DistanceMatrixService.
	        service.getDistanceMatrix({
	            origins: [enderecoCliente], // Origem
	            destinations: enderecoEstabelecimento, // Destino
	            travelMode: google.maps.TravelMode.DRIVING, // Modo (DRIVING | WALKING | BICYCLING)
	            unitSystem: google.maps.UnitSystem.METRIC // Sistema de medida (METRIC | IMPERIAL)
	        }, callback); // Vai chamar o callback
	    }    


	    // Tratar o retorno do DistanceMatrixService
	    function callback(response, status) {
	        // Verificar o status.
	        
	        if (status == 'OK') {
			    var origins = response.originAddresses;
			    var destinations = response.destinationAddresses;

			    for (var i = 0; i < origins.length; i++) {
			      var results = response.rows[i].elements;
			      for (var j = 0; j < results.length; j++) {

			      	 var element = results[j];
			        
			        $("#dist-"+j).html( element.distance.text);

			        $("#temp-"+j).html( element.duration.text);

			      }
			    }
			  } else {
			  	$("#txtOrigemResultado").html(status);
			  }
	    }	    

    	function filtrar(pagina, nome, estrelas, tipo, total) {

    		if (!nome) {   nome = $("#nome").val();   }
			if (!estrelas) {   estrelas = $("#estrelas").val();   }
			if (!tipo) {   tipo = $("#tipo").val();   }

    		$.ajax({
    			method: "POST",
    			url: "index.php",
				dataType: "Json",
    			data: { acao : "ajax",controle : "Estabelecimento", nome : nome, estrelas : estrelas, tipo : tipo , pagina : pagina, total : total},
    			async: false
    		}).done(function( retorno ) {

    			console.log(retorno);

				$('#lista-estabelecimento').html("");

				
				$('#paginacao').html("");

				$('#sem-resultado').html("");
				

				if (retorno) {

					if (retorno['listaEstabelecimentos']) {

						enderecoEstabelecimento = [];

						for(var i = 0; i < retorno['listaEstabelecimentos'].length; i++) {						

							//CalculaDistancia(retorno['listaEstabelecimentos'][i].numero+","+retorno['listaEstabelecimentos'][i].endereco+","+retorno['listaEstabelecimentos'][i].cep,enderecoCliente);
							
							var caixaEstabelecimento = "";

							caixaEstabelecimento = "<div class='layout-estabelecimento'>";
							caixaEstabelecimento += "<div class='container'>";
							caixaEstabelecimento += "<div class='estabelecimento'>";
							caixaEstabelecimento += "<div class='row'>";
							caixaEstabelecimento += "<div class='col-xs-12 col-sm-4 col-md-3' align='center'>";
							caixaEstabelecimento += "<div class='estabelecimento__foto'>";
							caixaEstabelecimento += "<div id='perfil-estabelecimento-" + retorno['listaEstabelecimentos'][i].id + "'></div>";


							if ( retorno['listaEstabelecimentos'][i].existe ) {
								caixaEstabelecimento += "<img class='img-responsive' src='views/imagem-Perfil/imagem-Perfil-Estabelecimento/perfil-estabelecimento-"+ retorno['listaEstabelecimentos'][i].id +".png'>";
							} else {
								caixaEstabelecimento += "<img class='img-responsive' src=https://api.adorable.io/avatars/200/imagemPerfilEstabelecimento.png'>";
							}

							

							
							caixaEstabelecimento += "</div>";
							caixaEstabelecimento += "</div>";

							caixaEstabelecimento += "<div class='col-xs-12 col-sm-8 col-md-9'>";
							caixaEstabelecimento += "<div class='estabelecimento-informacao'>";
							caixaEstabelecimento += "<h2>" + retorno['listaEstabelecimentos'][i].nome + "</h2>";
							caixaEstabelecimento += "<h4><strong>Tipo</strong>: " + retorno['listaEstabelecimentos'][i].tipo + "</h4>";
							caixaEstabelecimento += "<img src='views/imagens/"+  Math.round(retorno['listaEstabelecimentos'][i].estrelas)  +"-estrelas.png'>";
							caixaEstabelecimento += "<p><strong>Estado</strong>: " + retorno['listaEstabelecimentos'][i].estado + "</p>";
							caixaEstabelecimento += "<p><strong>Endereço</strong>: " + retorno['listaEstabelecimentos'][i].endereco + "</p>";
							caixaEstabelecimento += "<p><strong>Numero</strong>: " + retorno['listaEstabelecimentos'][i].numero + "</p>";
							caixaEstabelecimento += "<p><strong>Complemento</strong>: " + retorno['listaEstabelecimentos'][i].complemento + "</p>";
							caixaEstabelecimento += "<p><strong>Distancia</strong>: <span id='dist-"+i+"'></span> </p>";
							caixaEstabelecimento += "<p><strong>Tempo de Viagem</strong>: <span id='temp-"+i+"'></span> </p>";
							caixaEstabelecimento += "</div>";
							caixaEstabelecimento += "</div>";
							caixaEstabelecimento += "</div>";

							caixaEstabelecimento += "<div class='row'>";
							caixaEstabelecimento += "<div class='estabelecimento-botoes clearfix' align='center'>";
							caixaEstabelecimento += "<div class='col-xs-12 col-sm-6 col-lg-4 col-lg-offset-5'>";
							caixaEstabelecimento += "<a href='?controle=estabelecimento&acao=pagGaleria&id="+ retorno['listaEstabelecimentos'][i].id +"' class='botao botao--amarelo'>Imagens Do Estabelecimento</a>";
							caixaEstabelecimento += "</div>";

							caixaEstabelecimento += "<div class='col-xs-12 col-sm-6 col-lg-3'>";
							caixaEstabelecimento += "<a href='?controle=estabelecimento&acao=pagCardapio&id="+ retorno['listaEstabelecimentos'][i].id +"&endereco="+ $("#enderecoCliente").val() +"' class='botao botao--vermelho'>Ver Cardápio</a>";
							caixaEstabelecimento += "</div>";
							caixaEstabelecimento += "</div>";

							caixaEstabelecimento += "</div>";
							caixaEstabelecimento += "</div>";
							caixaEstabelecimento += "</div>";
							caixaEstabelecimento += "</div>";

							$('#lista-estabelecimento').append(caixaEstabelecimento);

							enderecoEstabelecimento.push(retorno['listaEstabelecimentos'][i].numero+","+retorno['listaEstabelecimentos'][i].endereco+","+retorno['listaEstabelecimentos'][i].cep);

						}
							enderecoCliente = $("#enderecoCliente").text();

							CalculaDistancia(enderecoEstabelecimento,enderecoCliente);						
					}

					if (retorno['numPaginas']) {

						

						var caixaPaginacao = "";

						caixaPaginacao += '<nav aria-label="Page navigation example">';
						caixaPaginacao +=   '<ul class="pagination" id="lista-paginacao">';

						if (retorno['pagina'] > 1 ) {

							caixaPaginacao +=     '<li class="page-item">';
							caixaPaginacao +=       '<a class="page-link paginacao__pag" aria-label="Voltar" onclick="javascript:filtrar('+ (retorno['pagina'] - 1) +", '"+ retorno['nome'] +"', '"+ retorno['estrelas'] +"', '"+ retorno['tipo'] +"', "+ retorno['total'] +');">';
							caixaPaginacao +=         '<span aria-hidden="true">&laquo;</span>';
							caixaPaginacao +=         '<span class="sr-only">Voltar</span>';
							caixaPaginacao +=       '</a>';
							caixaPaginacao +=     '</li>';

						} else {

							caixaPaginacao +=     '<li class="page-item disabled">';
							caixaPaginacao +=       '<a class="page-link paginacao__pag" aria-label="Voltar">';
							caixaPaginacao +=         '<span aria-hidden="true">&laquo;</span>';
							caixaPaginacao +=         '<span class="sr-only">Voltar</span>';
							caixaPaginacao +=       '</a>';
							caixaPaginacao +=     '</li>';

						}						
						

						caixaPaginacao +=   '</ul>';
						caixaPaginacao += '</nav>';

						$('#paginacao').append(caixaPaginacao);

						for(var i = 1; i <= retorno['numPaginas']; i++) {
							
							listaPaginacao = '';

							if (retorno['pagina'] != i) {

								listaPaginacao +=     '<li class="page-item">';


								listaPaginacao += 	  	  '<a class="page-link paginacao__pag"  onclick="javascript:filtrar('+i+", '"+ retorno['nome'] +"', '"+ retorno['estrelas'] +"', '"+ retorno['tipo'] +"', "+ retorno['total'] +');" >';


								listaPaginacao +=		  	  i;
								listaPaginacao +=		  '</a>';
								listaPaginacao +=	  '</li>';

							} else {

								listaPaginacao +=     '<li class="page-item active">';
								listaPaginacao += 	  	  '<a class="page-link paginacao__pag">';
								listaPaginacao +=		  	  i+'<span class="sr-only">(Pagina Atual)</span>';
								listaPaginacao +=		  '</a>';
								listaPaginacao +=	  '</li>';
								
							}

							

							$('#lista-paginacao').append(listaPaginacao);							

						}

						if (retorno['pagina'] < retorno['numPaginas'] ) {

							$paginaProsseguir = parseInt(retorno['pagina']) + 1;

							caixaPaginacao  =     '<li class="page-item">';
							caixaPaginacao +=       '<a class="page-link paginacao__pag" aria-label="Prosseguir" onclick="javascript:filtrar('+ $paginaProsseguir +", '"+ retorno['nome'] +"', '"+ retorno['estrelas'] +"', '"+ retorno['tipo'] +"', "+ retorno['total'] +');" >';
							caixaPaginacao +=         '<span aria-hidden="true">&raquo;</span>';
							caixaPaginacao +=         '<span class="sr-only">Prosseguir</span>';
							caixaPaginacao +=       '</a>';
							caixaPaginacao +=     '</li>';

						} else {

							caixaPaginacao =     '<li class="page-item disabled">';
							caixaPaginacao +=       '<a class="page-link paginacao__pag" aria-label="Prosseguir">';
							caixaPaginacao +=         '<span aria-hidden="true">&raquo;</span>';
							caixaPaginacao +=         '<span class="sr-only">Prosseguir</span>';
							caixaPaginacao +=       '</a>';
							caixaPaginacao +=     '</li>';

						}

						$('#lista-paginacao').append(caixaPaginacao);

					}
				} else {

						caixaEstabelecimento +=	'<div class="row alerta">';
						caixaEstabelecimento +=		'<div class="col-xs-12 col-md-offset-3 col-sm-6">';
						caixaEstabelecimento +=			'<div class="alert alert-warning">';
						caixaEstabelecimento +=				'<span class="glyphicon glyphicon-info-sign barra__icone"></span>';
						caixaEstabelecimento +=				'&nbsp&nbsp Nenhum estabelecimento encontrado.';
						caixaEstabelecimento +=			'</div>';
						caixaEstabelecimento +=		'</div>';
						caixaEstabelecimento +=	'</div>';

						$('#lista-estabelecimento').append(caixaEstabelecimento);

					}

    		});	
    	}

    </script>


</head>
<body>



<?php

    require_once 'menuPadraoCliente.php';

    ?>



    <h1 class="titulo-pag">Procurar Estabelecimentos</h1>

<?php

    if ($listaEnderecos != false) {
?>




<div class="layout-aviso-adicionar-endereco parallax" data-speed="10">
	<div class="container">
		<div class="row">
			<div class="aviso-adicionar-endereco">
				<div class="col-xs-12 col-md-5 col-md-offset-2">
					<p align="center" class="texto-novo-endereco">Caso esteja em um endereço diferente dos cadastrados em sua conta, adicione-o agora!</p>
				</div>

				<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-3 col-md-offset-0">
					<a href="?controle=endereco&acao=pagAdicionarExcluirEndereco" class="botao botao--amarelo">Adicionar Um Novo Endereço</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="layout-filtro">
	<div class="container">

		<div class="filtro">
			<h1 class="filtro__titulo">Filtro</h1>			
			<form action="javascript:void(0);" method="post" class="clearfix">

				<div class="row">

					<div class="col-xs-12 col-md-8 filtro__campo">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-home"></span>
								</div>
								<select id="enderecoCliente" class="form-control" name="endereco">

									<?php
										foreach ($listaEnderecos as $endereco1) {
											echo '<option value="'.$endereco1->getId().'">'. $endereco1->getEndereco() .', '. $endereco1->getNumero() .', '. $endereco1->getEstado() .', '. $endereco1->getCep() .'</option>';
										}
									?>
								</select></p>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-4 filtro__campo">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-star-empty"></span>
								</div>
								<select id="estrelas" class="form-control" name="estrelas" id="estrelas">
									<option value="qualquer">Qualquer quantidade</option>
									<option value="5">5 Estrelas</option>
									<option value="4">4 Estrelas</option>
									<option value="3">3 Estrelas</option>
									<option value="2">2 Estrelas</option>
									<option value="1">1 Estrela</option>
									<option value="0">0 Estrela</option>
								</select></p>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-4 filtro__campo">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-filter"></span>
								</div>
								<select  class="form-control" name="tipo" id="tipo">
									<option value="qualquer">Qualquer Tipo</option>
									<option value="Restaurante">Restaurante</option>
									<option value="Delivery">Delivery</option>
									<option value="Comida congelada">Comida congelada</option>
									<option value="Salgados e doces p/ festas">Salgados e doces p/ festas</option>
									<option value="Bar ou pub">Bar ou pub</option>
									<option value="Cafeteria ou lanches">Cafeteria ou lanches</option>
									<option value="Hotel">Hotel</option>
									<option value="Fast-food">Fast-food</option>
									<option value="Praça de Alimentação">Praça de Alimentação</option>
									<option value="Food Truck">Food Truck</option>
									<option value="Drive Thru">Drive Thru</option>
								</select></p>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-md-8 filtro__campo">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-search"></span>
								</div>
								<input type="text" name="nome" id="nome" class="form-control" placeholder="Pesquisar pelo nome do estabelecimento">
							</div>
						</div>
					</div>

				</div>

				<div class="row">

					<div class="col-xs-12  col-md-10">
						<p class="filtro__recado">	&lowast; Não é obrigatório o preenchimento de nenhum campo, com exceção do campo de endereço.</p>
					</div>

					<div class="col-xs-12  col-md-2">						
						<button class="botao botao--vermelho" onclick="javascript:filtrar(1, null, null, null, null);">Procurar</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</div>

<div id="lista-estabelecimento">
</div>

<div id="sem-resultado">
</div>

<div id="paginacao" align="center">
</div>

<?php
    } else {

		//mensagem para quando não ha endereços cadastrados dizendo para adicionar um

		echo '<div class="row alerta">
					<div class="col-xs-12 col-md-offset-3 col-sm-6">
						<div class="alert alert-danger">
							<span class="glyphicon glyphicon-info-sign barra__icone"></span>
							&nbsp&nbsp Cadastre no minimo um endereço antes de procurar estabelecimentos. <a href="?controle=endereco&acao=pagAdicionarExcluirEndereco">Clique aqui para cadastrar um endereço</a>
						</div>
					</div>
				</div>';

    }
?>

	<button type="button" id="botao-voltar-topo" class="botao-voltar-topo">
		<span class="glyphicon glyphicon-chevron-up"></span>
	</button>

	<footer class="layout-rodape">
		Direitos Autorais
	</footer>


	<script src="views/js/bootstrap.min.js"></script>
	<script src="views/js/parallax.js"></script>
	<script src="views/js/voltarTopo.js"></script>
</body>
</html>


<script type="text/javascript">

    	$("#menu__item-procurar-estabelecimento").addClass('menu__item-selecionado');

</script>