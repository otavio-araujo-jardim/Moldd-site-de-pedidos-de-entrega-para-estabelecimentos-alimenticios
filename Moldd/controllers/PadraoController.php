<?php
require_once 'Controllers/ClienteController.php';
/**
 * Controlador que deverá ser chamado quando não for
 * especificado nenhum outro
 */
class PadraoController
{
    /**
     * Ação que deverá ser executada quando
     * nenhuma outra for especificada, do mesmo jeito que o
     * arquivo Padrao.html ou Padrao.php é executado quando nenhum é
     * referenciado
     */
    public function PadraoAction() {                    
        if ((isset($_SESSION['usuario'])) && (isset($_SESSION['tipo']))) {
            if ($_SESSION['tipo'] == "C") {

                $cliente = new ClienteController();
                $retorno = $cliente->pagProcurarEstabelecimentosAction();

            } else if ($_SESSION['tipo'] == "E") {
                $view = new view("views/inicioEstabelecimento.php");
                $view->mostrarConteudo();

            }
        } else {
            //redirecionando para a pagina de Login
            $view = new view('views/login.php');
            $view->mostrarConteudo();
        }        
        
    }
}