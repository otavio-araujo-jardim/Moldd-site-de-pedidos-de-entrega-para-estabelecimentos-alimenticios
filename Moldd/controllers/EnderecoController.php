<?php

require_once 'models/EnderecoModel.php';
require_once 'controllers/ClienteController.php';

class EnderecoController {

    public function pagAdicionarExcluirEnderecoAction () {
    	if ($_SESSION['tipo'] == 'C') {
	    	$endereco = new EnderecoModel();
	    	$endereco->setId_cliente($_SESSION['usuario']);
	    	$listaEnderecos = $endereco->listar();

	        //redirecionando para a pagina Adicionar/Excluir Endereço
	        $view = new view('views/adicionarExcluirEndereco.php');
	        $view->setParams(array('listaEnderecos' => $listaEnderecos));
			$view->mostrarConteudo();
		} else {
			$view = new view('views/inicioEstabelecimento.php');
			$view->mostrarConteudo();
		}
    }

    public function manterEnderecoAction () {    	
       	$endereco = new EnderecoModel();
		
	    if (isset($_POST['cep'],$_POST['estado'],$_POST['endereco'],
	    		  $_POST['numero'],$_POST['complemento'],$_SESSION['usuario'])) {
	    	$endereco->setCep($_POST['cep']);
			$endereco->setEstado($_POST['estado']);
			$endereco->setEndereco($_POST['endereco']);
			$endereco->setNumero($_POST['numero']);
			$endereco->setComplemento($_POST['complemento']);	
			$endereco->setId_cliente($_SESSION['usuario']);
			

			$endereco->salvar();

			echo "<script language='javascript' type='text/javascript'>" .
			"alert('Endereço cadastrado com sucesso!');" .
			"</script>";			

			$cliente = new ClienteController();
			$retorno = $cliente->pagProcurarEstabelecimentosAction();			
			

		}
    }

    public function excluirEnderecoAction() {

    	$endereco = new EnderecoModel();
	    $endereco->setId($_GET['id']);
	    $endereco->excluirEndereco();

    	$this->pagAdicionarExcluirEnderecoAction();
    }

}

?>