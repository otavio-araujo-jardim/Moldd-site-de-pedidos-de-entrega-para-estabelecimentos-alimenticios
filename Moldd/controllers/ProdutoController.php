<?php

require_once 'Controllers/ClienteController.php';
require_once 'models/ProdutoModel.php';

class ProdutoController {

	public function pagAdicionarExcluirProdutosAction() {
    	if ($_SESSION['tipo'] == 'E') {
	    	$produto = new produtoModel();
	    	$produto->setId_estabelecimento($_SESSION['usuario']);
	    	$listaProdutos = $produto->carregarProdutos(false);

	        //redirecionando para a pagina Adicionar/Excluir Produto
	        $view = new view('views/adicionarExcluirProdutos.php');
	        $view->setParams(array('listaProdutos' => $listaProdutos));
			$view->mostrarConteudo();
		} else {
			$cliente = new ClienteController();
            $retorno = $cliente->pagProcurarEstabelecimentosAction();
		}
    }

    public function cadastrarAction() {
    	$produto = new produtoModel();
    	if (isset($_POST['nome'])) {
    		$produto->setNome($_POST['nome']);
   			if (isset($_POST['preco'])) {
		    	$produto->setPreco(str_replace(",",".", str_replace(".","", $_POST['preco'])));
		    	$produto->setId_estabelecimento($_SESSION['usuario']);
		    	$produto->salvar();
                $idProduto = $produto->obterId();

                $diretorio = 'views/produtos-Estabelecimentos/';

                $existe = true;


                for ($i=0; $existe == true ; $i++) {

                    $arquivo = $diretorio.'produtos-Estabelecimentos-'.  $_SESSION['usuario'].'-'. $idProduto .'.png';

                    if (!file_exists($arquivo)) {

                        $existe = false;
                        
                        if (move_uploaded_file($_FILES['imagem']['tmp_name'],$arquivo)) {

                            echo "<script language='javascript' type='text/javascript'>" .
                            "alert('Imagem válida e salva com sucesso!');" .
                            "</script>";

                        } else {

                            echo "<script language='javascript' type='text/javascript'>" .
                            "alert('Não foi possivel salvar esta imagem');" .
                            "</script>";

                        }

                    }

                }
                
	    	}
    	}

    	$this->pagAdicionarExcluirProdutosAction();
    }

    public function salvarImagemProdutoAction() {
        $diretorio = 'views/produtos-Estabelecimentos/';

        $arquivo = $diretorio.'produtos-Estabelecimentos-'.  $_SESSION['usuario'].'-'. $_POST['idProduto'] .'.png';

        if (move_uploaded_file($_FILES['imagem']['tmp_name'],$arquivo)) {

            echo "<script language='javascript' type='text/javascript'>" .
            "alert('Imagem válida e salva com sucesso!');" .
            "</script>";

        } else {

            echo "<script language='javascript' type='text/javascript'>" .
            "alert('Não foi possivel salvar esta imagem');" .
            "</script>";

        }

        $this->pagAdicionarExcluirProdutosAction();
    }

    public function excluirAction() {
    	$produto = new produtoModel();
    	if (isset($_REQUEST['idProduto'])) {
    		$produto->setId($_REQUEST['idProduto']);
    		$produto->excluir();
    	}

    	$this->pagAdicionarExcluirProdutosAction();
    }

    public function alterarCardapioAction() {
        
            $existe = true;

            for ($i=0; $existe == true ; $i++) { 
                
                if (isset($_POST["colocar-".$i])) {                    

                    $produto = new produtoModel();
                    $produto->setId($_POST["id-".$i]);
                    $produto->setAtivo($_POST["colocar-".$i]);
                    $produto->alterarCardapio();

                } else {
                    $existe = false;
                }
            }

            $produto = new ProdutoModel();
            $listaProdutos = $produto->carregarProdutos(false);

            $view = new view('views/alterarCardapio.php');
            $view->setParams(array("listaProdutos" => $listaProdutos));
            $view->mostrarConteudo();
    }

}