<?php

require_once 'models/ComentarioModel.php';

class ComentarioController{

	public function salvarAction () {    	
       	$comentario = new ComentarioModel();
		
	    if (isset(  $_POST['texto'], $_POST['id']  )) {

	    	$comentario->setId_estabelecimento($_POST['id']);
			$comentario->setId_cliente($_SESSION['usuario']);
			$comentario->setTexto($_POST['texto']);
			

			$listaComentarios = $comentario->salvar();

			echo json_encode($listaComentarios, JSON_PRETTY_PRINT);	
			

		}
    }

    public function excluirComentarioAction() {
    	$comentario = new ComentarioModel();
		
	    if (isset(  $_POST['id_comentario'])) {

	    	$comentario->setId($_POST['id_comentario']);			

			$comentario->excluir();		

		}
    }

    public function pagcomentariosEstabelecimentoAction() {

    	$comentario = new ComentarioModel();
		$listaComentarios = $comentario->carregarComentarios($_SESSION['usuario'], false);

		$view = new view('views/comentariosEstabelecimento.php');
		$view->setParams(array("listaComentarios" => $listaComentarios));
		$view->mostrarConteudo();
	}

	public function pagcomentariosAction() {

    	$comentario = new ComentarioModel();
		$listaComentarios = $comentario->carregarComentarios($_SESSION['usuario'], true );

		$view = new view('views/comentarios.php');
		$view->setParams(array("listaComentarios" => $listaComentarios));
		$view->mostrarConteudo();
	}

}