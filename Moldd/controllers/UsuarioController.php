<?php

require_once 'models/UsuarioModel.php';
require_once 'Controllers/ClienteController.php';
require_once 'Controllers/EstabelecimentoController.php';
require_once 'Models/ClienteModel.php';
require_once 'Models/EstabelecimentoModel.php';

class UsuarioController{

	/**
	 * Método que verifica que os dados de login estão corretos,
	 * caso estejam atribui o e-mail e tipo do usuario na SESSION
	 */
    public function logarAction () {
    	if (isset($_POST['email'])) {
    		$email = $_POST['email'];

    		$usuario =  new UsuarioModel();
	    	if ( $usuario->existente($email) ) {
	    		$senha = $_POST['senha'];	    		

	    		if ($usuario->validar($senha)) {
	    			
	    			$_SESSION['usuario'] = $usuario->getId();

	    			/**
				     * Redireciona para a pagina ProcurarEstabelecimento caso seu tipo seja  C,
				     * ou para a pagina InicioEstabelecimento caso seu tipo seja E
				     */
	    			$listar = $usuario->redirecionar();
	    			if ($listar->tipo == "C") {
        				
        				$_SESSION['tipo'] = "C";
        				$ClienteController = new ClienteController();
                        $ClienteModel = new ClienteModel();
                        $ClienteInfos = $ClienteModel->adquirirInfo($usuario->getId());
                        $_SESSION['nome'] = $ClienteInfos['cliente']->getNome();
        				$retorno = $ClienteController->pagProcurarEstabelecimentosAction();	    				

	        		} else if ($listar->tipo == "E") {

	        			$_SESSION['tipo'] = "E";
                        $EstabelecimentoController = new EstabelecimentoController();
                        $EstabelecimentoModel = new EstabelecimentoModel();
                        $EstabelecimentoInfos = $EstabelecimentoModel->adquirirInfo($usuario->getId());
                        $_SESSION['nome'] = $EstabelecimentoInfos['estabelecimento']->getNome();
	        			$EstabelecimentoController->pagInicioAction();
	        		}
	    		} else {
	    			echo "<script language='javascript' type='text/javascript'>" .
	                        "alert('Senha Incorreta');" .
	                     "</script>";
	                $view = new view('views/login.php');
		    		$view->mostrarConteudo();
	    		}

	    	} else {
	    		echo "<script language='javascript' type='text/javascript'>" .
                        "alert('Este E-Mail não está cadastrado');" .
                     "</script>";
                $view = new view('views/login.php');
	    		$view->mostrarConteudo();
	    	}
    	}
    	
    }

    public function salvarSenha() {
        try {
            $consulta = $this->pdo->prepare("UPDATE usuario SET senha = :senha WHERE id_usuario = :id"); 
            $consulta->bindValue(":senha",$this->getSenha());
            $consulta->bindValue(":id",$this->getId());
            $consulta->execute();          

            return true;

        } catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
            exit();
        }
    }

    public function sairAction() {
    	$_SESSION['usuario'] = null;
    	$_SESSION['tipo'] = null;

    	$view = new view('views/login.php');
        $view->mostrarConteudo();
    }

    public function pagComoFuncionaAction() {
        $view = new view('views/comoFunciona.php');
        $view->mostrarConteudo();
    }

    public function pagContatoAction() {
        $view = new view('views/Contato.php');
        $view->mostrarConteudo();
    }

    public function enviarMensagemAction() {//destinatário

        $remetente = "MOLDDremetente@pao.com";
        $destinatario = "MOLDDDestinatario@pao.com";
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];
        $assunto = $_POST['assunto'];

        $headers  = "From: $remetente\r\n" .
                    "Reply-To: $email\r\n" .
                    "X-Mailer: PHP/" . phpversion() . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      
        $envio = mail($destinatario, $assunto, $mensagem, $headers);

        if ($envio) {
            echo "Mensagem enviada com sucesso";
        } else {
            echo "A mensagem não pode ser enviada";
        }

        $view = new view('views/login.php');
        $view->mostrarConteudo();

    }

}