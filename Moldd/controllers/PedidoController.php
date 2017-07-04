<?php

require_once 'models/ClienteModel.php';
require_once 'models/PedidoModel.php';
require_once 'models/EnderecoModel.php';
require_once 'models/ItemModel.php';
require_once 'models/ProdutoModel.php';
require_once 'models/EstabelecimentoModel.php';

class PedidoController {

	public function pagPedidosRealizadosAction() {
		$pedido = new pedidoModel();
		$pedido->setId_Estabelecimento($_SESSION['usuario']);
		$listaPedidos = $pedido->carregarPedidos(false);

		if ($listaPedidos != false) {

			$infoPedidos = array();

			foreach ($listaPedidos as $pedido) {
				$infoPedido = array();

				$cliente = new ClienteModel();
				$infos = $cliente->adquirirInfo($pedido->getId_cliente());
				$endereco = new EnderecoModel();
				$endereco->setId($pedido->getId_endereco());
				$infoEndereco = $endereco->adquirirEndereco();
				$item = new ItemModel();
				$item->setId_pedido($pedido->getId());
				$listaItens = $item->CarregarItens();

				$itens = array();

				foreach  ($listaItens as $item1) {

					$produto = new ProdutoModel();
					$produto1 = $produto->carregarItemProduto($item1->getId_produto());

					$infoItem = array($item1,$produto1);
					array_push($itens, $infoItem);
				}
				
				array_push($infoPedido, $pedido);
				array_push($infoPedido, $infos['cliente']->getNome());
				array_push($infoPedido, $infos['cliente']->getTelefone());
				array_push($infoPedido, $infoEndereco);
				array_push($infoPedido, $itens);
				array_push($infoPedido, $infos['cliente']->getId());

				array_push($infoPedidos, $infoPedido);
			}

		} else {
			$infoPedidos = false;
		}


		$view = new view("views/pedidosRealizadosEstabelecimento.php");		
	    $view->setParams(array('infoPedidos' => $infoPedidos));
        $view->mostrarConteudo();
	}

	public function finalizarAction() {
		$pedido = new pedidoModel();
		$pedido->setId($_REQUEST['id']);

		$pedido->finalizar();

		$this->pagPedidosRealizadosAction();
	}

	public function pagPedidosRealizadosClienteAction() {

		$pedido = new pedidoModel();
		$pedido->setId_cliente($_SESSION['usuario']);
		$listaPedidos = $pedido->carregarPedidos(2);

		if ($listaPedidos != false) {

			$infoPedidos = array();

			foreach ($listaPedidos as $pedido) {
				$infoPedido = array();

				$estabelecimento = new estabelecimentoModel();
				$infos = $estabelecimento->adquirirInfo($pedido->getId_estabelecimento());

				$item = new ItemModel();
				$item->setId_pedido($pedido->getId());
				$listaItens = $item->CarregarItens();

				$itens = array();

				foreach  ($listaItens as $item1) {

					$produto = new ProdutoModel();
					$produto1 = $produto->carregarItemProduto($item1->getId_produto());

					$infoItem = array($item1,$produto1);
					array_push($itens, $infoItem);

				}		

				array_push($infoPedido, $pedido);
				array_push($infoPedido, $infos['estabelecimento']->getNome());
				array_push($infoPedido, $itens);
				array_push($infoPedido, $infos['estabelecimento']->getId());

				array_push($infoPedidos, $infoPedido);
			}

		} else {
			$infoPedidos = false;
		}

		$estabelecimento = new EstabelecimentoModel();
		$estabelecimento->setId($_SESSION['usuario']);
		$listaEstabelecimento = $estabelecimento->carregarEstabelecimentosRecentes();

		$view = new view("views/pedidosRealizados.php");	
	    $view->setParams(array('infoPedidos' => $infoPedidos, 'listaEstabelecimento' => $listaEstabelecimento));
        $view->mostrarConteudo();
	}

	public function pagPedidosFinalizadosAction() {

		$pedido = new pedidoModel();
		$pedido->setId_Estabelecimento($_SESSION['usuario']);
		$listaPedidos = $pedido->carregarPedidos(true);

		$infoPedidos = array();

		if ($listaPedidos != false) {
			foreach ($listaPedidos as $pedido) {
				$infoPedido = array();

				$cliente = new ClienteModel();
				$infos = $cliente->adquirirInfo($pedido->getId_cliente());
				$endereco = new EnderecoModel();
				$endereco->setId($pedido->getId_endereco());
				$infoEndereco = $endereco->adquirirEndereco();
				$item = new ItemModel();
				$item->setId_pedido($pedido->getId());
				$listaItens = $item->CarregarItens();

				$itens = array();

				foreach  ($listaItens as $item1) {

					$produto = new ProdutoModel();
					$produto1 = $produto->carregarItemProduto($item1->getId_produto());

					$infoItem = array($item1,$produto1);
					array_push($itens, $infoItem);
				}
				
				array_push($infoPedido, $pedido);
				array_push($infoPedido, $infos['cliente']->getNome());
				array_push($infoPedido, $infos['cliente']->getTelefone());
				array_push($infoPedido, $infoEndereco);
				array_push($infoPedido, $itens);
				array_push($infoPedido, $infos['cliente']->getId());

				array_push($infoPedidos, $infoPedido);
			}
		} else {
			$infoPedidos = false;
		}

		$view = new view("views/pedidosRealizadosEstabelecimentoFinalizados.php");	
	    $view->setParams(array('infoPedidos' => $infoPedidos));
        $view->mostrarConteudo();
	}
	
}


?>