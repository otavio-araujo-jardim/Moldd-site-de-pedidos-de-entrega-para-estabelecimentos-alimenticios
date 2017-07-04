<?php

require_once 'models/ItemModel.php';
require_once 'models/PedidoModel.php';
require_once 'models/EstabelecimentoModel.php';

class ItemController {

	public function pagPedidoSucessoAction() {

        
        date_default_timezone_set('America/Sao_Paulo');        

        $pedido = new PedidoModel();
        $pedido->setId_Cliente($_SESSION['usuario']);
        $pedido->setId_Estabelecimento($_REQUEST['id']);
        $pedido->setId_Endereco($_POST["endereco"]);
        $pedido->setData_Entrega($_POST["dataentrega"]." ".$_POST["horaentrega"]);
        $pedido->setData_Realizacao(date('Y-m-d H:i:s'));
        $pedido->cadastrarPedido();
        
		$existe = true;

        	$id = $_REQUEST['id'];

        	for ($i=0; $existe == true ; $i++) { 
        		
        		if (isset($_POST["produto-".$i])) {        			

                    $item = new ItemModel();
                    $item->setId_Produto($_POST["produto-".$i]);
                    $item->setId_Pedido($pedido->getid());
                    $item->setQuantidade($_POST["quant-".$i]);
                    $item->setSolicitacao($_POST["soli-".$i]);
                    $item->setPreco($_POST["preco-".$i]);
                    $item->cadastrarItem();

        		} else {
        			$existe = false;
        		}
        	}

        $estabelecimento = new EstabelecimentoModel();
        $estabelecimento->setId($_SESSION['usuario']);
        $listaEstabelecimento = $estabelecimento->carregarEstabelecimentosRecentes();

    	$view = new view('views/pedidoSucesso.php');
        $view->setParams(array('listaEstabelecimento' => $listaEstabelecimento));
		$view->mostrarConteudo();
    }
	
}

?>