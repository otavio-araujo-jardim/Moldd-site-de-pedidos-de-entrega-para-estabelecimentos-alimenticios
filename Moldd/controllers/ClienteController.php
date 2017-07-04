<?php

require_once 'models/ClienteModel.php';
require_once 'models/EnderecoModel.php';
require_once 'models/EstabelecimentoModel.php';

class ClienteController {

    public function pagCadastrarAction() {
        //redirecionando para a pagina de cadastro de usuario
        $view = new view('views/cadastroCliente.php');
        $view->mostrarConteudo();
    }

    public function pagProcurarEstabelecimentosAction() {

    	$endereco = new EnderecoModel();

    	if (isset($_SESSION['usuario'])) {
			$endereco->setId_cliente($_SESSION['usuario']);
		}

		$listaEnderecos = $endereco->listar();

		$estabelecimento = new EstabelecimentoModel();
		$estabelecimento->setId($_SESSION['usuario']);
		$listaEstabelecimento = $estabelecimento->carregarEstabelecimentosRecentes();
		
		$view = new view('views/procurarEstabelecimento.php');
		$view->setParams(array('listaEnderecos' => $listaEnderecos, 'listaEstabelecimento' => $listaEstabelecimento));
		$view->mostrarConteudo();
		
    }

    public function manterClienteAction () {    	
       	$cliente = new ClienteModel();
		
	    if (isset($_POST['nome'],$_POST['email'],$_POST['senha'],
	    		  $_POST['telefone'])) {
	    	$cliente->setNome($_POST['nome']);
			$cliente->setEMail($_POST['email']);
			$cliente->setSenha($_POST['senha']);
			$cliente->setTelefone($_POST['telefone']);

			if ($cliente->salvar() == false) {
				echo "<script language='javascript' type='text/javascript'>" .
		                "alert('Este E-Mail já existe!');" .
		            "</script>";

	            echo "<script>javascript:history.back(-2)</script>";
			} else {
				echo "<script language='javascript' type='text/javascript'>" .
		                "alert('Conta cadastrada com sucesso!');" .
		            "</script>";

	            $_SESSION['usuario'] = $cliente->getId();
	            $_SESSION['tipo'] = "C";
	            $_SESSION['nome'] = $cliente->getNome();

		    	$this->pagMudarFotoAction();
			}

		}
    }

    public function pagMudarFotoAction() {
    	$view = new view('views/mudarImagem.php');
		$view->mostrarConteudo();
    }

    public function salvarImagemAction() {
    	$diretorio = 'views/imagem-Perfil/imagem-Perfil-Cliente/';

    	$arquivo = $diretorio.'perfil-cliente-'. $_SESSION['usuario'].'.png';
    	if (move_uploaded_file($_FILES['imagem']['tmp_name'],$arquivo)) {

    		echo "<script language='javascript' type='text/javascript'>" .
	                "alert('Imagem válida e salva com sucesso!');" .
	             "</script>";
	        $this->pagProcurarEstabelecimentosAction();
    	} else {
    		echo "<script language='javascript' type='text/javascript'>" .
	                "alert('Não foi possivel salvar esta imagem');" .
	             "</script>";

	        echo "<script>javascript:history.back(-2)</script>";
    	}
    }

    public function filtrarAction() {
    	$retorno = $this->pagProcurarEstabelecimentos();
    	$retorno['filtrar'] = true;
		
		$cliente = new ClienteModel();
    	$retorno['listaEstabelecimentos'] = $cliente->filtrarEstabelecimentos();
    	
		// echo '<pre>';
		// var_dump($retorno['listaEstabelecimentos']);
		// echo '</pre>';

		$retorno['enderecoCliente'] = isset( $_POST[ 'endereco' ] ) ?  addslashes($_POST[ 'endereco' ]) : null;

		$view = new view('views/procurarEstabelecimento.php');
		$view->setParams(array('retorno' => $retorno));
		$view->mostrarConteudo();

	}

	public function pagConfiguracaoAction()	{
		$clienteInfo = new ClienteModel();
		$infos = $clienteInfo->adquirirInfo(false);

		$estabelecimento = new EstabelecimentoModel();
		$estabelecimento->setId($_SESSION['usuario']);
		$listaEstabelecimento = $estabelecimento->carregarEstabelecimentosRecentes();

		$view = new view('views/configuracaoUsuario.php');
		$view->setParams( array("usuario" => $infos['usuario'], "cliente" => $infos['cliente'], "listaEstabelecimento" => $listaEstabelecimento));
		$view->mostrarConteudo();

	}

	public function salvarAlteracoesAction() {
		$cliente = new ClienteModel();
		if ($cliente->verificarSenha($_POST[ 'senha' ])) {
			// this.manterClienteAction();		

		    $cliente->setEmail($_POST[ 'email' ]);

		    $cliente->setNome($_POST[ 'nome' ]);
		    $cliente->setTelefone($_POST[ 'telefone' ]);

	        if ($cliente->manterAlteracoes()) {
	        	echo "<script language='javascript' type='text/javascript'>" .
	                "alert('Alterações salvas com sucesso');" .
	             "</script>";
	        }
		} else {
			echo "<script language='javascript' type='text/javascript'>" .
	                "alert('Senha Invalida');" .
	             "</script>";
		}

		$this->pagConfiguracaoAction();
	}
	public function mudarSenhaAction() {
		$cliente1 = new ClienteModel();
		if ($cliente1->verificarSenha($_POST[ 'senhaatual' ])) {
			if ($_POST[ 'senhanova' ] ==$_POST[ 'senhaconfirmar' ]) {
				$cliente1->setSenha($_POST[ 'senhanova' ]);
				$cliente1->salvarSenha();

				echo "<script language='javascript' type='text/javascript'>" .
				"alert('Senha salva com sucesso');" .
				"</script>";

			} else {
				echo "<script language='javascript' type='text/javascript'>" .
				"alert('Senhas não conferem');" .
				"</script>";
			}
		} else {
			echo "<script language='javascript' type='text/javascript'>" .
	                "alert('Senha Invalida');" .
	             "</script>";
		}

		$this->pagConfiguracaoAction();
	}


	
}

?>