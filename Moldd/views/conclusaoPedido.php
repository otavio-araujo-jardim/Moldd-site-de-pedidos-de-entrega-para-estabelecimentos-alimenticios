<?php
	$params = $this->getParams();
	$listaItens = $params['listaItens'];
	$listaEnderecos = $params['listaEnderecos'];
	$estabelecimento = $params['estabelecimento'];

	date_default_timezone_set('America/Sao_Paulo');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Conclusão Pedido</title>

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/base.css">
	<link rel="stylesheet" href="views/css/conclusaoPedido.css">
	<link rel="stylesheet" href="views/css/menuPadrao.css">
	<link rel="stylesheet" href="views/css/rodape.css">
	<link rel="stylesheet" href="views/css/parallax.css">
	<link rel="stylesheet" href="views/css/bootstrap-datepicker3.min.css">

	<script type="text/javascript">


		function obterHorario(dia) {
			
			$.ajax({
    			method: "POST",
    			url: "index.php",
				dataType: "Json",
    			data: { acao : "obterHorario", controle : "estabelecimento", dia : dia, id : <?php echo $_GET['id'] ?> },
    			async: false
    		}).done(function( retorno ) {

				if (retorno) {

					console.log(retorno);

					conteudo =   '<div class="form-group">';

					conteudo += 	'<input type="time" name="horaentrega" id="id-horaentrega" class="form-control"  min="' + retorno['hora_inicio'] + '" max="' + retorno['hora_encerramento'] + '" required="required" />';	

					conteudo += '</div>';

					$('#hora_do_dia').html( conteudo );

				}
				
    		});

		}


		var produtos = [];

		function carregarCarrinho() {

			calcularTotal();					

			$('#idEstabelecimentoCardapio').html("");

			for (i=0; i < produtos.length; i++) {

				conteudo =	"<div class='item' id='item-'"+produtos[i].id+"'>";
				conteudo +=		"<div class='row'>";

				conteudo +=			"<div class='col-xs-12 col-md-2'>";
				conteudo +=				"<div class='item__caixa-botao-retirar'>";
				conteudo +=					"<button onclick='removerProduto("+produtos[i].id+","+i+")' class='item__botao item__botao--retirar'>";
				conteudo +=						"<span class='glyphicon glyphicon-remove'></span>";
				conteudo +=					"</button>";
				conteudo +=				"</div>";
				conteudo +=			"</div>";

				conteudo +=			"<div class='col-xs-12 col-md-2' align='center'>";
				conteudo +=				"<img class='img-responsive item__img' src='https://api.adorable.io/avatars/150/ImagenComida.png'>";
				conteudo +=			"</div>";

				conteudo +=			"<div class='col-xs-12 col-md-6'>";
				conteudo +=				"<div class='item__info clearfix'>";
				conteudo +=					"<div class='item__cabecalho'>";
				conteudo +=						"<h4 class='item__nome'>"+produtos[i].nome+"</h4>";
				conteudo +=						"<h4 class='item__preco'><strong>R$ </strong>"+produtos[i].preco+"</h4>";
				conteudo +=					"</div>";
				conteudo +=					"<textarea  placeholder='Digite sua solçicitação aqui.' rows='4' name='soli-"+i+"' id='soli-"+i+"' class='item__texto'>"+produtos[i].solicitacao+"</textarea>";
				conteudo +=				"</div>";
				conteudo +=			"</div>";

				conteudo +=			"<div class='col-xs-12 col-md-2' align='center'>";
				conteudo +=				"<div class='item__caixa-botoes'>";
				conteudo +=					"<div class='item__botoes'>";
				conteudo +=					"<p class='item__quant'>Quantidade:</p>";
				conteudo +=						"<button type='button' onclick='removerQuant("+i+")' class='item__botao'>-</button>";
				conteudo +=						"<span class='item__quantidade'><strong>"+produtos[i].quant+"</strong></span>";
				conteudo +=						"<button type='button' onclick='addQuant("+i+")' class='item__botao'>+</button>";
				conteudo +=					"</div>";
				conteudo +=				"</div>";
				conteudo +=			"</div>";

				conteudo +=		"</div>";
				conteudo +=		"<input type='hidden' name='produto-"+ i +"' value='"+ produtos[i].id +"'>";
				conteudo +=		"<input type='hidden' name='quant-"+ i +"' value='"+ produtos[i].quant +"'>";
				conteudo +=		"<input type='hidden' name='preco-"+ i +"' value='"+ produtos[i].preco +"'>";
				conteudo +=	"</div>";

				$("#idEstabelecimentoCardapio").append(conteudo);


			}

		}

    	function calcularTotal() {

    		var total = 0;

    		for (i=0; i < produtos.length; i++) {
    			total += (	((produtos[i].quant)*(produtos[i].preco))	);
    		}

    		$('#total').html((total.toFixed(2)).replace(".", ","));
	    }

	    function removerProduto(idPro , i) {
	    	produtos.splice(i,1);
	    	salvarSolicitacao( i );
    		carregarCarrinho();
    		calcularTotal();
	    }

	    function addQuant(i) {
	    	produtos[i].quant += 1;
	    	salvarSolicitacao( false );
	    	carregarCarrinho();
	    	calcularTotal();
	    }

	    function removerQuant(i) {
	    	if (produtos[i].quant > 1) {
		    	produtos[i].quant -= 1;
		    	salvarSolicitacao( false );
		    	carregarCarrinho();
		    	calcularTotal();
	    	}
	    }

	    function salvarSolicitacao( i ) {
	    	/*conteudo = $("#solicitacao-"+i).val();
	    	produtos[i].solicitacao = conteudo;
	    	carregarCarrinho();*/

	    	if (i != false) {

		    	contador = 0;

		    	for (e=0; e < (produtos.length + 1); e++) {

					if ( e != i ) {

						if ( $("#soli-"+e).val() ) {
				    		produtos[contador].solicitacao = $("#soli-"+e).val();
				    	}

				    	contador++;

					}

				}

			} else {

				for (e=0; e < produtos.length; e++) {

					if ( $("#soli-"+e).val() ) {
			    		produtos[e].solicitacao = $("#soli-"+e).val();
			    	}				

				}

			}

	    }	    

	    
    </script>
</head>
<body class="parallax" data-speed="10">

			<?php

			if ($listaItens != false) {
				foreach($listaItens as $item) {
						echo "<script language='javascript' type='text/javascript'>" .
				                 "produtoInfo = {id:".$item[1]->getId().",nome:'".$item[1]->getNome()."',preco:".$item[1]->getPreco().",quant:".$item[2].",solicitacao:''};".
    							 "produtos.push(produtoInfo);" .
				             "</script>";
				}
			}

			?>



<?php
    require_once 'menuPadraoCliente.php';    
?>



	<div class="container">

		<div class="aviso">
			<p>Verifique se o pedido foi feito corretamente e informe o endereço a data e a hora em que a entrega deverá ser faita.</p>
		</div>

		<form method="post" action="#" id="id-formulario">

			<div class="formulario">
				<div class="row formulario__campo">
					<div class="col-xs-12 col-sm-offset-1 col-sm-4 col-md-offset-2 col-md-3">
						<p class="formulario__texto">Endereço onde será feita a entrega: </p>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-6">

						<div class="form-group">

							<select id="enderecoCliente" class="form-control" name="endereco">									
								<?php
									foreach ($listaEnderecos as $endereco1) {

										if ( $_GET['endereco'] == $endereco1->getId() ) {

											echo '<option selected="selected" value="'. $endereco1->getId().'">'. $endereco1->getEndereco() .', '. $endereco1->getNumero() .', '. $endereco1->getEstado() .', '. $endereco1->getCep() .'</option>';

										} else {

											echo '<option value="'. $endereco1->getId().'">'. $endereco1->getEndereco() .', '. $endereco1->getNumero() .', '. $endereco1->getEstado() .', '. $endereco1->getCep() .'</option>';

										}
																											

									}
								?>
								
							</select>

						</div>

					</div>
				</div>

				<div class="row formulario__campo">
					<div class="col-xs-12 col-sm-offset-1 col-sm-4 col-md-offset-2 col-md-3">						
						<p class="formulario__texto">Data quando será feita a entrega: </p>
					</div>
				
					<div class="col-xs-12 col-sm-4 col-md-3">	

						<div class="form-group">
				            <div class='input-group date' id='datetimepicker'>
				                <input id="data_entrega" type='text' class="form-control" />
				                <span class="input-group-addon">
				                    <span class="glyphicon glyphicon-calendar">
				                    </span>
				                </span>
				            </div>
				        </div>

					</div>
				</div>

				<div class="row formulario__campo">
					<div class="col-xs-12 col-sm-offset-1 col-sm-4 col-md-offset-2 col-md-3">						
						<p class="formulario__texto">Horário quando será feita a entrega: </p>
					</div>
				
					<div class="col-xs-12 col-sm-4 col-md-2">

						<div id="hora_do_dia">

							<p class="formulario__aviso-hora">selecione a data antes de selecionar a hora.</p>

						</div>

					</div>
				</div>				

			</div>

			<div class="estabelecimento-cardapio" id="idEstabelecimentoCardapio">			

			</div>

			<div class="total clearfix">
				<div class="total__quantia">
					<strong>Total : </strong><span id="total"></span>
				</div>			
			</div>
			
			<div class="botao-concluir clearfix">
				<input type="hidden" name="controle" value="item">
				<input type="hidden" name="acao" value="pagPedidoSucesso">

	        	<input type="submit" value="Concluir Pedido" class="botao botao--amarelo">		
			</div>

		</form>
			
	</div>	
	
	<footer class="layout-rodape">
		Direitos Autorais
	</footer>

	<script src="views/js/jquery-3.1.1.min.js"></script>
	<script src="views/js/bootstrap.min.js"></script>
	<script src="views/js/parallax.js"></script>	
	<script src="views/js/bootstrap-datepicker.min.js"></script>
	<script src="views/js/bootstrap-datepicker.pt-BR.min.js"></script>

	<?php 

		$diasBloquear = Array();

		if (   $estabelecimento->getHora_inicio_dom() == null   ) {
			$diasBloquear[] = "0";
		}
        
        if (   $estabelecimento->getHora_inicio_seg() == null   ) {
        	$diasBloquear[] = "1";
        }
        
        if (   $estabelecimento->getHora_inicio_ter() == null   ) {
			$diasBloquear[] = "2";
        }
        
        if (   $estabelecimento->getHora_inicio_qua() == null   ) {
			$diasBloquear[] = "3";
        }
        
        if (   $estabelecimento->getHora_inicio_qui() == null   ) {
			$diasBloquear[] = "4";
        }
        
        if (   $estabelecimento->getHora_inicio_sex() == null   ) {
			$diasBloquear[] = "5";
        }
        
        if (   $estabelecimento->getHora_inicio_sab() == null   ) {
			$diasBloquear[] = "6";
        }
        
	?>

	<script type="text/javascript">
        $(document).ready(function(){

            $('#datetimepicker').datepicker({
                language: "pt-BR",
			    daysOfWeekDisabled: <?php echo "'" . implode( ' , ',$diasBloquear ) . "'" ?>,
    			todayHighlight: true,
    			daysOfWeekHighlighted:<?php echo "'" . implode( ' , ',$diasBloquear ) . "'" ?>,
    			startDate: <?php echo "'" . date('d/m/Y',strtotime('-1 days')) . "'" ?>
            });

			$('#data_entrega').change(function(){

				var dataVal = this.value;
		        var arr = dataVal.split("/").reverse();
		        var data = new Date(arr[0], arr[1] - 1, arr[2]);

			    obterHorario(data.getDay())

			});

        });
    </script>

	<script type="text/javascript">
		carregarCarrinho();
	</script>

</body>
</html>